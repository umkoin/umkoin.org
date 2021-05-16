<?php


/*
 * Api class for Umkoin (SHA256) crypto currency
 *
 * Author:  vmta
 * Date:    06 May 2021
 * Version: 0.1.0
 *
 * Changelog:
 *
 * v0.1.0 (06.05.2021)
 * Sync functions with Umkoin Core v0.21.1 RPC calls.
 *
 * v0.0.2 (01.02.2018)
 * Introduce $debug variable to turn on/off debugging.
 * Implement JSON call exception interception.
 *
 * v0.0.1 (05.01.2018)
 * Initial code.
 *
 */


class Api {

  /*
   * $server variable of type string shall be of form:
   *     protocol :// host_address : port_number
   *
   */
  private $server;


  /*
   * $auth variable of type string shall be of form:
   *     rpcuser : rpcpass
   *
   */
  private $auth;


  /*
   * $args variable of type array will keep some handy
   * initial settings for JSON RPC call
   *
   * Array keys:
   *     jsonrpc
   *     id
   *     method
   *     params
   *
   */
  private $args;


  /*
   * $debug variable of type boolean sets whether to
   * generate debug info on calls or not
   *
   */
  private $debug;


  /*
   * Class constructor.
   *
   * Without arguments, assume that underlying daemon
   * is running with default config, i.e. has protocol
   * "http", on "localhost" and with rpc port 6332.
   *
   */
  public function __construct($server = "http://127.0.0.1:6332", $auth = "rpcuser:rpcpass", $debug = false) {
    $this->server = $server;
    $this->auth = $auth;
    $this->args = [ "jsonrpc" => "2.0", "id" => "curl", "method" => "", "params" => [] ];
    $this->debug = $debug;
  }


  /*
   * API call wrapper accepting single parameter of type array.
   *
   * Set CURL object packed with necessary options.
   * Perform curl exec on the CURL object.
   * Check and report on error.
   * Return decoded result on success.
   *
   */
  private function call($req) {

    $data = json_encode($req);

    static $ch = null;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $this->server);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: text/plain']);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, $this->auth);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $res = null;
    try {

      $res = curl_exec($ch);
      if ($res === FALSE)
        throw new Exception("Could not get reply: " . curl_error($ch));

    } catch (Exception $e) {

      if ($this->debug)
        print_r($e->getMessage());

    }

    $obj = null;
    try {

      $obj = json_decode($res, TRUE);
      if (!isset($obj["result"])) {

        if (isset($obj["error"])) {
          throw new Exception("Error(" . $obj["error"]["code"] . "): " . $obj["error"]["message"] . PHP_EOL);
        } else {
          throw new Exception("Unknown Error: " . $obj . PHP_EOL);
        }

      }

    } catch (Exception $e) {

      if ($this->debug)
        print_r($e->getMessage());

    }

    curl_close($ch);
    return $obj;
  }


  ////////////////////////////////////////
  //             BLOCKCHAIN             //
  ////////////////////////////////////////


  /*
   * dumptxoutset path
   *
   * Write the serizlized UTXO set to disk.
   *
   * Arguments:
   *  1 path        (string, required) Path to the output file. If relative,
   *                will be prefixed by datadir.
   *
   * Result:
   *  {
   *    "coins_written"  (numeric) The number of coins written in the snapshot.
   *    "base_hash"      (string) The hash of the base of the snapshot.
   *    "base_height"    (numeric) The height of the base of the snapshot.
   *    "path"           (string) The absolute path that the snapshot was
   *                     written to.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function dumptxoutset($path) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$path" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getbestblockhash
   *
   * Returns the hash of the best (tip) block in the longest blockchain.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  "hex"
   *  {
   *    "result": "0000000000181e0f3939ba5960e55ef853f9526348c9f3e51661fcaa1ad1d978"
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getbestblockhash() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblock "blockhash" (verbosity)
   *
   * If verbosity is 0, returns a string that is serialized, hex-encoded data
   * for block 'hash'. If verbosity is 1, returns an Object with information
   * about block <hash>. If verbosity is 2, returns an Object with information
   * about block <hash> and information about each transaction.
   *
   * Arguments:
   *  1. "blockhash" (string, required) The block hash
   *  2. verbosity   (numeric, optional, default = 1) 0 for hex encoded data,
   *                 1 for a json object, and 2 for json object with transaction
   *                 data.
   *
   * Result:
   *
   * (verbosity = 0):
   *  "data"        (string) A string that is serizlized, hex-encoded data for
   *                block 'hash'.
   *
   * (verbosity = 1):
   *  {
   *    "hash": "hash",      (string) The block hash (same as provided)
   *    "confirmations": n,  (numeric) The number of confirmations, or -1 if the
   *                         block is not on the main chain
   *    "size": n,           (numeric) The block size
   *    "strippedsize": n,   (numeric) The block size excluding withness data
   *    "weight": n,         (numeric) The block weight as defined in BIP 141
   *    "height": n,         (numeric) The block height or index
   *    "version": n,        (numeric) The block version
   *    "versionHex": "000", (string) The block version formatted in hexadecimal
   *    "merkleroot": "xxx", (string) The merkle root
   *    "tx": [              (array of string) The transaction ids
   *      "txid"             (string) The transaction id
   *      ,...
   *    ],
   *    "time": ttt,         (numeric) The block time in seconds since epoch
   *                         (Jan 1 1970 GMT)
   *    "mediantime": ttt,   (numeric) The median block time in seconds since
   *                         epoch (Jan 1 1970 GMT)
   *    "nonce": n,          (numeric) The nonce
   *    "bits": "1d00ffff",  (string) The bits
   *    "difficulty": n.nnn, (numeric) The difficulty
   *    "chainwork": "xxx",  (string) Expected number of hashes required to
   *                         produce the chain up to this block (in hex)
   *    "nTx": n,            (umeric) The number of transactions n the block
   *    "previousblockhash": "x", (string) The hash of the previous block
   *    "nextblockhash": "x" (string) The hash of the next block
   *  }
   *
   * (verbosity = 2):
   *  {
   *    ...,                 Same output as verbosity = 1.
   *    "tx": [              (array of Objects) The transactions in the format
   *                         of the getrawtransaction RPC. Different from
   *                         verbosity = 1 "tx" result.
   *      ,...
   *    ]
   *    ,...                 Same output as verbosity = 1
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getblock($blockhash = "00000000470b9e0dd4f6fb72c93e0c655f68069899a5b2a0b4e413ef8006469a", $verbosity = 1) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$blockhash", $verbosity ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblockchaininfo
   *
   * Returns an object containing various state info regarding blockchain
   * processing.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  {
   *    "chain": "main",   (string) Current network name as defined in BIP 70
   *                       (main, test, signet, regtest)
   *    "blocks": 2475,    (numeric) Current number of blocks processed
   *    "headers": 2475,   (numeric) Current number of validated headers
   *    "bestblockhash": "xxx", (string) The hash of the currently best block
   *    "difficulty": n.nnn, (numeric) Current difficulty
   *    "mediantime": n,   (numeric) Median time for the current best block
   *    "verificationprogress": n.nnn, (numeric) Estimate of verification
   *                       progress [0..1]
   *    "initialblockdownload": false, (boolean) Estimate of whether this node
   *                       is in Initial Block Download mode
   *    "chainwork": "xxx", (string) Total amount of work in active chain in
   *                       hexadecimal
   *    "size_on_disk": n, (numeric) Estimated size of the block and undo files
   *                       on disk
   *    "pruned": false,   (booleane) If the blocks are subject to pruning
   *    "pruneheight": n,  (numeric) Lowest height complete block stored (only
   *                       present if pruning is enabled)
   *    "automatic_pruning": xx, (boolean) Whether automatic pruning is
   *                       enabled (only present if pruning is enabled)
   *    "prune_target_size": n, (numeric) The target size used by pruning (only
   *                       present if pruning is enabled)
   *    "softforks": [     (array) Status of softforks in progress
   *      {
   *        "id": "bip34", (string) Softfork name
   *        "version": 2,  (numeric) Block version
   *        "reject": {    (object) Progress toward rejecting pre-softfork
   *                       blocks
   *          "status": true, (boolean) True if threshold reached
   *        }
   *      },
   *      {
   *        "id": "bip66",
   *        "version": 3,
   *        "reject": {
   *          "status": true
   *        }
   *      },
   *      {
   *        "id": "bip65",
   *        "version": 4,
   *        "reject": {
   *          "status": true
   *        }
   *      }
   *    ],
   *    "bip9_softforks": {  (object) Status of BIP9 softforks in progress
   *      "csv": {
   *        "status": "active",
   *        "startTime": 1511563812,
   *        "timeout": 1514112600,
   *        "since": 432
   *      },
   *      "segwit": {
   *        "status": "active",
   *        "startTime": 1511563812,
   *        "timeout": 1514112600,
   *        "since": 432
   *      }
   *    },
   *    "warnings": ""       (string) Any network and blockchain warnings
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getblockchaininfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblockcount
   *
   * Returns the number of blocks in the longest blockchain.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  n             (numeric) The current block count
   *
   * (0.21.1 RPC)
   *
   */
  public function getblockcount() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblockfilter "blockhsh" ( "filtertype" )
   *
   * Retrieve a BIP 157 content filter for a particular block.
   *
   * Arguments:
   *  1. bockhash   (string, required) The hash of the block.
   *  2. filtertype (string, optional, default = basic) The type name of the
   *                filter.
   *
   * Result:
   *  {                   (json object)
   *    "filter": "hex",  (string) The hex-encoded filter data
   *    "header": "hex"   (string) The hex-encoded filter header
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getblockfilter($blockhash, $filtertype = "basic") {

    $args = $this>args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$blockhash", "$filtertype" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblockhash height
   *
   * Returns hash of block in best-block-chain at height provided.
   *
   * Arguments:
   *  1. height     (numeric, required) The height index
   *
   * Result:
   *  "hash"        (string) The block hash
   *
   * (0.21.1 RPC)
   *
   */
  public function getblockhash($height = 0) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $height ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblockheader "hash" (verbose)
   *
   * If verbose is false, returns a string that is serialized, hex-encoded data
   * for blockheader 'hash'. If verbose is true, returns an Object with
   * information about blockheader 'hash'.
   *
   * Arguments:
   *  1. "hash"     (string, required) The block hash
   *  2. verbose    (boolean, optional, default = true) True for a JSON object,
   *                false for the hex-encoded data
   *
   * Result:
   *
   * (verbose = true):
   *  {
   *    "hash": "hash",     (string) The block hash (same as provided)
   *    "confirmations": n, (numeric) The number of confirmations, or -1 if the
   *                        block is not on the main chain
   *    "height": n,        (numeric) The block height or index
   *    "version": n,       (numeric) The block version
   *    "versionHex": "xx", (string) The block version formatted in hexadecimal
   *    "merkleroot": "xx", (string) The merkle root
   *    "time": n,          (numeric) The block time in seconds since epoch
   *                        (Jan 1 1970 GMT)
   *    "mediantime": n,    (numeric) The median block time in seconds since
   *                        epoch (Jan 1 1970 GMT)
   *    "nonce": n,         (numeric) The nonce
   *    "bits": "1d00ffff", (string) The bits
   *    "difficulty": n.nn, (numeric) The difficulty
   *    "chainwork": "xx",  (string) Expected number of hashes required to
   *                        produce the current chain in hexadecimal
   *    "nTx": n,           (numeric) The number of transactions in the block
   *    "previousblockhash": "xx", (string) The hash of the previous block
   *    "nextblockhash": "xx" (string) The hash of the next block
   *  }
   *
   * (verbose = false):
   *  "data"        (string) A string that is serialized, hex-encoded data for
   *                block 'hash'.
   *
   * (0.21.1 RPC)
   *
   */
  public function getblockheader($hash, $verbose = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hash", $verbose ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblockstats hash_or_height ( stats )
   *
   * Compute per block statistics for a given window. All amounts are in
   * satoshis. It won't work for some heights with pruning.
   *
   * Arguments:
   *  1. hash_or_height  (string or numeric, required) The block hash or height
   *                     of the target block
   *  2. stats           (json array, optional, default=all values) Values to
   *                     plot (see result below)
   *       [
   *         "height",     (string) Selected statistic
   *         "time",       (string) Selected statistic
   *         ...
   *       ]
   *
   * Result:
   *  {                              (json object)
   *    "avgfee" : n,                (numeric) Average fee in the block
   *    "avgfeerate" : n,            (numeric) Average feerate (in satoshis per
   *                                 virtual byte)
   *    "avgtxsize" : n,             (numeric) Average transaction size
   *    "blockhash" : "hex",         (string) The block hash (to check for
   *                                 potential reorgs)
   *    "feerate_percentiles" : [    (json array) Feerates at the 10th, 25th,
   *                                 50th, 75th, and 90th percentile weight unit
   *                                 (in satoshis per virtual byte)
   *      n,                         (numeric) The 10th percentile feerate
   *      n,                         (numeric) The 25th percentile feerate
   *      n,                         (numeric) The 50th percentile feerate
   *      n,                         (numeric) The 75th percentile feerate
   *      n                          (numeric) The 90th percentile feerate
   *    ],
   *    "height" : n,                (numeric) The height of the block
   *    "ins" : n,                   (numeric) The number of inputs (excluding
   *                                 coinbase)
   *    "maxfee" : n,                (numeric) Maximum fee in the block
   *    "maxfeerate" : n,            (numeric) Maximum feerate (in satoshis per
   *                                 virtual byte)
   *    "maxtxsize" : n,             (numeric) Maximum transaction size
   *    "medianfee" : n,             (numeric) Truncated median fee in the block
   *    "mediantime" : n,            (numeric) The block median time past
   *    "mediantxsize" : n,          (numeric) Truncated median transaction size
   *    "minfee" : n,                (numeric) Minimum fee in the block
   *    "minfeerate" : n,            (numeric) Minimum feerate (in satoshis per
   *                                 virtual byte)
   *    "mintxsize" : n,             (numeric) Minimum transaction size
   *    "outs" : n,                  (numeric) The number of outputs
   *    "subsidy" : n,               (numeric) The block subsidy
   *    "swtotal_size" : n,          (numeric) Total size of all segwit
   *                                 transactions
   *    "swtotal_weight" : n,        (numeric) Total weight of all segwit
   *                                 transactions
   *    "swtxs" : n,                 (numeric) The number of segwit transactions
   *    "time" : n,                  (numeric) The block time
   *    "total_out" : n,             (numeric) Total amount in all outputs
   *                                 (excluding coinbase and thus reward [ie
   *                                 subsidy + totalfee])
   *    "total_size" : n,            (numeric) Total size of all non-coinbase
   *                                 transactions
   *    "total_weight" : n,          (numeric) Total weight of all non-coinbase
   *                                 transactions
   *    "totalfee" : n,              (numeric) The fee total
   *    "txs" : n,                   (numeric) The number of transactions
   *                                 (including coinbase)
   *    "utxo_increase" : n,         (numeric) The increase/decrease in the
   *                                 number of unspent outputs
   *    "utxo_size_inc" : n          (numeric) The increase/decrease in size for
   *                                 the utxo index (not discounting op_return
   *                                 and similar)
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getblockstats($hash, $stats = []) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (is_string($hash))
      $args[ "params" ] = [ "$hash" ];
    else
      $args[ "params" ] = [ $hash ];

    if (!empty($stats))
      array_push($args[ "params" ], $stats);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getchaintips
   *
   * Returns information about all known tips in the block tree, including the
   * main chain as well as orphaned branches.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  [
   *    {
   *      "height": n,    (numeric) Height of the chain tip
   *      "hash": "hash", (string) Block hash of the tip
   *      "branchlen": 0, (numeric) Zero for main chain
   *      "status": "active" (string) "active" for the main chain
   *    },
   *    {
   *      "height": n,    (numeric) Height of the chain tip
   *      "hash": "hash", (string) Block hash of the tip
   *      "branchlen": 1, (numeric) Length of branch connecting the tip to the
   *                      main chain
   *      "status": "xx"  (string) status of the chain (active, valid-fork,
   *                      valid-headers, headers-only, invalid)
   *    }
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function getchaintips() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getchaintxstats (nblocks "hash")
   *
   * Compute statistics about total number and rate of transactions in the chain.
   *
   * Arguments:
   *  1. nblocks    (numeric, optional) Size of the window in number of blocks
   *                (default: about one month).
   *  2. "hash"     (string, optional) The hash of the block that ends the
   *                window.
   *
   * Result:
   *  {
   *    "time": n,      (numeric) The timestamp for the final block in the
   *                    window in UNIX format.
   *    "txcount": n,   (numeric) The total number of transactions in the chain
   *                    up to that point.
   *    "window_final_block_hash": "xx", (string) The hash of the finalblock in
   *                    the window.
   *    "window_block_count": n, (numeric) Size of the window in number of
   *                    blocks.
   *    "window_tx_count": n, (numeric) The number of transactions in the window.
   *                    Only returned if "window_block_count" is > 0.
   *    "window_interval": n, (numeric) The elapsed time in the window in seconds.
   *                    Only returned if "window_block_count" is > 0.
   *    "txrate": n.nn  (numeric) The average rate of transactions per seconds
   *                    in the window. Only returned if "window_interval" is > 0.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getchaintxstats($nblocks = 4096, $hash = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $nblocks ];
    if (!empty($hash))
      array_push($args[ "params" ], "$hash" );

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getdifficulty
   *
   * Returns the proof-of-work difficulty as a multiple of the minimum difficulty.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  n.nn          (numeric) The proof-of-work difficulty as a multiple of the
   *                minimum difficulty.
   *
   * (0.21.1 RPC)
   *
   */
  public function getdifficulty() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getmempoolancestors "txid" ( verbose )
   *
   * If txid is in the mempool, returns all in-mempool ancestors.
   *
   * Arguments:
   *  1. txid       (string, required) The transaction id (must be in mempool)
   *  2. verbose    (boolean, optional, default=false) True for a json object,
   *                false for array of transaction ids
   *
   * Result (for verbose = false):
   *  [           (json array)
   *    "hex",    (string) The transaction id of an in-mempool ancestor transaction
   *    ...
   *  ]
   *
   * Result (for verbose = true):
   *  {                          (json object)
   *    "transactionid" : {      (json object)
   *      "vsize" : n,           (numeric) virtual transaction size as defined
   *                             in BIP 141. This is different from actual
   *                             serialized size for witness transactions as
   *                             witness data is discounted.
   *      "weight" : n,          (numeric) transaction weight as defined in
   *                             BIP 141.
   *      "fee" : n,             (numeric) transaction fee in UMK (DEPRECATED)
   *      "modifiedfee" : n,     (numeric) transaction fee with fee deltas used
   *                             for mining priority (DEPRECATED)
   *      "time" : xxx,          (numeric) local time transaction entered pool
   *                             in seconds since 1 Jan 1970 GMT
   *      "height" : n,          (numeric) block height when transaction entered
   *                             pool
   *      "descendantcount" : n, (numeric) number of in-mempool descendant
   *                             transactions (including this one)
   *      "descendantsize" : n,  (numeric) virtual transaction size of
   *                             in-mempool descendants (including this one)
   *      "descendantfees" : n,  (numeric) modified fees (see above) of
   *                             in-mempool descendants (including this one)
   *                             (DEPRECATED)
   *      "ancestorcount" : n,   (numeric) number of in-mempool ancestor
   *                             transactions (including this one)
   *      "ancestorsize" : n,    (numeric) virtual transaction size of
   *                             in-mempool ancestors (including this one)
   *      "ancestorfees" : n,    (numeric) modified fees (see above) of
   *                             in-mempool ancestors (including this one)
   *                             (DEPRECATED)
   *      "wtxid" : "hex",       (string) hash of serialized transaction,
   *                             including witness data
   *      "fees" : {             (json object)
   *        "base" : n,          (numeric) transaction fee in UMK
   *        "modified" : n,      (numeric) transaction fee with fee deltas used
   *                             for mining priority in UMK
   *        "ancestor" : n,      (numeric) modified fees (see above) of
   *                             in-mempool ancestors (including this one) in
   *                             UMK.
   *        "descendant" : n     (numeric) modified fees (see above) of
   *                             in-mempool descendants (including this one) in
   *                             UMK.
   *      },
   *      "depends" : [          (json array) unconfirmed transactions used as
   *                             inputs for this transaction
   *        "hex",               (string) parent transaction id
   *        ...
   *      ],
   *      "spentby" : [          (json array) unconfirmed transactions spending
   *                             outputs from this transaction
   *        "hex",               (string) child transaction id
   *        ...
   *      ],
   *      "bip125-replaceable" : true|false,  (boolean) Whether this transaction
   *                             could be replaced due to BIP125 (replace-by-fee)
   *      "unbroadcast" : true|false  (boolean) Whether this transaction is
   *                             currently unbroadcast (initial broadcast not yet
   *                             acknowledged by any peers)
   *    },
   *    ...
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getmempoolancestors($txid = 0) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = ["$txid"];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getmempooldescendants "txid" ( verbose )
   *
   * If txid is in the mempool, returns all in-mempool descendants.
   *
   * Arguments:
   *  1. txid       (string, required) The transaction id (must be in mempool)
   *  2. verbose    (boolean, optional, default=false) True for a json object,
   *                false for array of transaction ids
   *
   * Result (for verbose = false):
   *  [           (json array)
   *    "hex",    (string) The transaction id of an in-mempool descendant
   *              transaction
   *    ...
   *  ]
   *
   * Result (for verbose = true):
   *  {                          (json object)
   *    "transactionid" : {      (json object)
   *      "vsize" : n,           (numeric) virtual transaction size as defined
   *                             in BIP 141. This is different from actual
   *                             serialized size for witness transactions as
   *                             witness data is discounted.
   *      "weight" : n,          (numeric) transaction weight as defined in
   *                             BIP 141.
   *      "fee" : n,             (numeric) transaction fee in UMK (DEPRECATED)
   *      "modifiedfee" : n,     (numeric) transaction fee with fee deltas used
   *                             for mining priority (DEPRECATED)
   *      "time" : xxx,          (numeric) local time transaction entered pool
   *                             in seconds since 1 Jan 1970 GMT
   *      "height" : n,          (numeric) block height when transaction entered
   *                             pool
   *      "descendantcount" : n, (numeric) number of in-mempool descendant
   *                             transactions (including this one)
   *      "descendantsize" : n,  (numeric) virtual transaction size of
   *                             in-mempool descendants (including this one)
   *      "descendantfees" : n,  (numeric) modified fees (see above) of
   *                             in-mempool descendants (including this one)
   *                             (DEPRECATED)
   *      "ancestorcount" : n,   (numeric) number of in-mempool ancestor
   *                             transactions (including this one)
   *      "ancestorsize" : n,    (numeric) virtual transaction size of
   *                             in-mempool ancestors (including this one)
   *      "ancestorfees" : n,    (numeric) modified fees (see above) of
   *                             in-mempool ancestors (including this one)
   *                             (DEPRECATED)
   *      "wtxid" : "hex",       (string) hash of serialized transaction,
   *                             including witness data
   *      "fees" : {             (json object)
   *        "base" : n,          (numeric) transaction fee in UMK
   *        "modified" : n,      (numeric) transaction fee with fee deltas used
   *                             for mining priority in UMK
   *        "ancestor" : n,      (numeric) modified fees (see above) of
   *                             in-mempool ancestors (including this one) in
   *                             UMK.
   *        "descendant" : n     (numeric) modified fees (see above) of
   *                             in-mempool descendants (including this one) in
   *                             UMK.
   *      },
   *      "depends" : [          (json array) unconfirmed transactions used as
   *                             inputs for this transaction
   *        "hex",               (string) parent transaction id
   *        ...
   *      ],
   *      "spentby" : [          (json array) unconfirmed transactions spending
   *                             outputs from this transaction
   *        "hex",               (string) child transaction id
   *        ...
   *      ],
   *      "bip125-replaceable" : true|false, (boolean) Whether this transaction
   *                             could be replaced due to BIP125 (replace-by-fee)
   *      "unbroadcast" : true|false  (boolean) Whether this transaction is
   *                             currently unbroadcast (initial broadcast not
   *                             yet acknowledged by any peers)
   *    },
   *    ...
   * }
   *
   * (0.21.1 RPC)
   *
   */
  public function getmempooldescendants($txid, $verbose = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid", $verbose ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getmempoolentry "txid"
   *
   * Returns mempool data for given transaction.
   *
   * Arguments:
   *  1. txid       (string, required) The transaction id (must be in mempool).
   *
   * Result:
   *  {                        (json object)
   *    "vsize" : n,           (numeric) virtual transaction size as defined in
   *                           BIP 141. This is different from actual
   *                           serialized size for witness transactions as
   *                           witness data is discounted.
   *    "weight" : n,          (numeric) transaction weight as defined in
   *                           BIP 141.
   *    "fee" : n,             (numeric) transaction fee in UMK (DEPRECATED)
   *    "modifiedfee" : n,     (numeric) transaction fee with fee deltas used
   *                           for mining priority (DEPRECATED)
   *    "time" : xxx,          (numeric) local time transaction entered pool in
   *                           seconds since 1 Jan 1970 GMT
   *    "height" : n,          (numeric) block height when transaction entered
   *                           pool
   *    "descendantcount" : n, (numeric) number of in-mempool descendant
   *                           transactions (including this one)
   *    "descendantsize" : n,  (numeric) virtual transaction size of in-mempool
   *                           descendants (including this one)
   *    "descendantfees" : n,  (numeric) modified fees (see above) of in-mempool
   *                           descendants (including this one) (DEPRECATED)
   *    "ancestorcount" : n,   (numeric) number of in-mempool ancestor
   *                           transactions (including this one)
   *    "ancestorsize" : n,    (numeric) virtual transaction size of in-mempool
   *                           ancestors (including this one)
   *    "ancestorfees" : n,    (numeric) modified fees (see above) of in-mempool
   *                           ancestors (including this one) (DEPRECATED)
   *    "wtxid" : "hex",       (string) hash of serialized transaction,
   *                           including witness data
   *    "fees" : {             (json object)
   *      "base" : n,          (numeric) transaction fee in UMK
   *      "modified" : n,      (numeric) transaction fee with fee deltas used
   *                           for mining priority in UMK
   *      "ancestor" : n,      (numeric) modified fees (see above) of in-mempool
   *                           ancestors (including this one) in UMK
   *      "descendant" : n     (numeric) modified fees (see above) of in-mempool
   *                           descendants (including this one) in UMK
   *    },
   *    "depends" : [          (json array) unconfirmed transactions used as
   *                           inputs for this transaction
   *      "hex",               (string) parent transaction id
   *      ...
   *    ],
   *    "spentby" : [          (json array) unconfirmed transactions spending
   *                           outputs from this transaction
   *      "hex",               (string) child transaction id
   *      ...
   *    ],
   *    "bip125-replaceable" : true|false, (boolean) Whether this transaction
   *                           could be replaced due to BIP125 (replace-by-fee)
   *    "unbroadcast" : true|false  (boolean) Whether this transaction is
   *                           currently unbroadcast (initial broadcast not yet
   *                           acknowledged by any peers)
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getmempoolentry($txid) {

    if ( empty($txid) ) $txid = $this->getrawmempool[0];

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getmempoolinfo
   *
   * Returns details on the active state of the TX memory pool.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  {                         (json object)
   *    "loaded" : true|false,  (boolean) True if the mempool is fully loaded.
   *    "size" : n,             (numeric) Current tx count.
   *    "bytes" : n,            (numeric) Sum of all virtual transaction sizes
   *                            as defined in BIP 141. Differs from actual
   *                            serialized size because witness data is
   *                            discounted.
   *    "usage" : n,            (numeric) Total memory usage for the mempool.
   *    "maxmempool" : n,       (numeric) Maximum memory usage for the mempool
   *    "mempoolminfee" : n,    (numeric) Minimum fee rate in UMK/kB for tx to
   *                            be accepted. Is the maximum of minrelaytxfee
   *                            and minimum mempool fee.
   *    "minrelaytxfee" : n,    (numeric) Current minimum relay fee for
   *                            transactions.
   *    "unbroadcastcount" : n  (numeric) Current number of transactions that
   *                            haven't passed initial broadcast yet.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getmempoolinfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getrawmempool ( verbose mempool_sequence )
   *
   * Returns all transaction ids in memory pool as a json array of string
   * transaction ids.
   *
   * Hint: use getmempoolentry to fetch a specific transaction from the mempool.
   *
   * Arguments:
   *  1. verbose          (boolean, optional, default=false) True for a json
   *                      object, false for array of transaction ids.
   *  2. mempool_sequence (boolean, optional, default=false) If verbose=false,
   *                      returns a json object with transaction list and
   *                      mempool sequence number attached.
   *
   * Result (for verbose = false):
   *  [           (json array)
   *    "hex",    (string) The transaction id
   *    ...
   *  ]
   *
   * Result (for verbose = true):
   *  {                          (json object)
   *    "transactionid" : {      (json object)
   *      "vsize" : n,           (numeric) virtual transaction size as defined
   *                             in BIP 141. This is different from actual
   *                             serialized size for witness transactions as
   *                             witness data is discounted.
   *      "weight" : n,          (numeric) transaction weight as defined in
   *                             BIP 141.
   *      "fee" : n,             (numeric) transaction fee in UMK (DEPRECATED)
   *      "modifiedfee" : n,     (numeric) transaction fee with fee deltas
   *                             used for mining priority (DEPRECATED)
   *      "time" : xxx,          (numeric) local time transaction entered pool
   *                             in seconds since 1 Jan 1970 GMT
   *      "height" : n,          (numeric) block height when transaction entered
   *                             pool
   *      "descendantcount" : n, (numeric) number of in-mempool descendant
   *                             transactions (including this one)
   *      "descendantsize" : n,  (numeric) virtual transaction size of
   *                             in-mempool descendants (including this one)
   *      "descendantfees" : n,  (numeric) modified fees (see above) of
   *                             in-mempool descendants (including this one)
   *                             (DEPRECATED)
   *      "ancestorcount" : n,   (numeric) number of in-mempool ancestor
   *                             transactions (including this one)
   *      "ancestorsize" : n,    (numeric) virtual transaction size of
   *                             in-mempool ancestors (including this one)
   *      "ancestorfees" : n,    (numeric) modified fees (see above) of
   *                             in-mempool ancestors (including this one)
   *                             (DEPRECATED)
   *      "wtxid" : "hex",       (string) hash of serialized transaction,
   *                             including witness data
   *      "fees" : {             (json object)
   *        "base" : n,          (numeric) transaction fee in UMK
   *        "modified" : n,      (numeric) transaction fee with fee deltas used
   *                             for mining priority in UMK
   *        "ancestor" : n,      (numeric) modified fees (see above) of
   *                             in-mempool ancestors (including this one) in
   *                             UMK.
   *        "descendant" : n     (numeric) modified fees (see above) of
   *                             in-mempool descendants (including this one) in
   *                             UMK.
   *      },
   *      "depends" : [          (json array) unconfirmed transactions used as
   *                             inputs for this transaction
   *        "hex",               (string) parent transaction id
   *        ...
   *      ],
   *      "spentby" : [          (json array) unconfirmed transactions spending
   *                             outputs from this transaction
   *        "hex",               (string) child transaction id
   *        ...
   *      ],
   *      "bip125-replaceable" : true|false, (boolean) Whether this transaction
   *                             could be replaced due to BIP125 (replace-by-fee)
   *      "unbroadcast" : true|false  (boolean) Whether this transaction is
   *                             currently unbroadcast (initial broadcast not
   *                             yet acknowledged by any peers).
   *    },
   *    ...
   *  }
   *
   * Result (for verbose = false and mempool_sequence = true):
   *  {                            (json object)
   *    "txids" : [                (json array)
   *      "hex",                   (string) The transaction id
   *      ...
   *    ],
   *    "mempool_sequence" : n     (numeric) The mempool sequence value.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getrawmempool($verbose = false, $mempool_sequence = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $verbose, $mempool_sequence ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * gettxout "txid" n ( include_mempool )
   *
   * Returns details about an unspent transaction output.
   *
   * Arguments:
   *  1. txid            (string, required) The transaction id
   *  2. n               (numeric, required) vout number
   *  3. include_mempool (boolean, optional, default = true) Whether to include
   *                     the mempool. Note that an unspent output that is spent
   *                     in the mempool won't appear.
   *
   * Result:
   *  {                      (json object)
   *    "bestblock" : "hex", (string) The hash of the block at the tip of the
   *                         chain
   *    "confirmations" : n, (numeric) The number of confirmations
   *    "value" : n,         (numeric) The transaction value in UMK
   *    "scriptPubKey" : {   (json object)
   *      "asm" : "hex",     (string)
   *      "hex" : "hex",     (string)
   *      "reqSigs" : n,     (numeric) Number of required signatures
   *      "type" : "hex",    (string) The type, eg pubkeyhash
   *      "addresses" : [    (json array) array of umkoin addresses
   *        "str",           (string) umkoin address
   *        ...
   *      ]
   *    },
   *    "coinbase" : true|false  (boolean) Coinbase or not
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function gettxout($txid, $vout, $include_mempool = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = ["$txid", $vout, $include_mempool];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * gettxoutproof ["txid",...] ( "blockhash" )
   *
   * Returns a hex-encoded proof that "txid" was included in a block.
   *
   * NOTE: By default this function only works sometimes. This is when there is an
   * unspent output in the utxo for this transaction. To make it always work,
   * you need to maintain a transaction index, using the -txindex command line option or
   * specify the block in which the transaction is included manually (by blockhash).
   *
   * Arguments:
   *  1. txids          (json array, required) The txids to filter
   *       [
   *         "txid",    (string) A transaction hash
   *         ...
   *       ]
   *  2. blockhash      (string, optional) If specified, looks for txid in the block with this hash
   *
   * Result:
   *  "str"    (string) A string that is a serialized, hex-encoded data for the proof.
   *
   * (0.21.1 RPC)
   *
   */
  public function gettxoutproof($txid, $hash) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = ["$txid"];

    if (!empty($hash))
      $args[ "params" ][] = "$hash";

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * gettxoutsetinfo ( "hash_type" )
   *
   * Returns statistics about the unspent transaction output set.
   * Note this call may take some time.
   *
   * Arguments:
   *  1. hash_type  (string, optional, default=hash_serialized_2) Which UTXO set
   *                hash should be calculated. Options: 'hash_serialized_2' (the
   *                legacy algorithm), 'none'.
   *
   * Result:
   *  {                      (json object)
   *    "height" : n,        (numeric) The current block height (index)
   *    "bestblock" : "hex", (string) The hash of the block at the tip of the
   *                         chain
   *    "transactions" : n,  (numeric) The number of transactions with unspent
   *                         outputs
   *    "txouts" : n,        (numeric) The number of unspent transaction outputs
   *    "bogosize" : n,      (numeric) A meaningless metric for UTXO set size
   *    "hash_serialized_2" : "hex",  (string) The serialized hash (only present
   8                         if 'hash_serialized_2' hash_type is chosen)
   *    "disk_size" : n,     (numeric) The estimated size of the chainstate on
   *                         disk
   *    "total_amount" : n   (numeric) The total amount
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function gettxoutsetinfo($hash_type = "hash_serialized_2") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hash_type" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * invalidateblock blockhash
   *
   * Permanently marks a block as invalid, as if it violated a consensus rule.
   *
   * Arguments:
   *  1. blockhash  (string, required) The hash of the block to mark as
   *                invalid.
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function invalidateblock($blockhash) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$blockhash" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }



  /*
   * preciousblock "blockhash"
   *
   * Treats a block as if it were received before others with the same work.
   * A later preciousblock call can override the effect of an earlier one.
   * The effects of preciousblock are not retained across restarts.
   *
   * Arguments:
   * 1. "blockhash" (string, required) the hash of the block to mark as precious
   *
   * (0.21.1 RPC)
   *
   */
  public function preciousblock($hash) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hash" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * pruneblockchain height
   *
   * Prune blockchain upto the block at specified height or older than a given
   * timestamp.
   *
   * Arguments:
   * 1. height      (numeric, required) The block height to prune up to. May be
   *                set to a descreet height, or a UNIX timestamp to prune
   *                blocks whose block time is at least 2 hours older than the
   *                provided timestamp.
   *
   * Result:
   * n              (numeric) Height of the last block pruned.
   *
   * (0.21.1 RPC)
   *
   */
  public function pruneblockchain($height = 0) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $height ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * reconsiderblock blockhash
   *
   * Removes invalidity status of a block, its ancestors and its descendants,
   * reconsider them for activation. This can be used to undo the effects of
   * invalidateblock.
   *
   * Arguments:
   *  1. blockhash    (string, required) The hash of the block to reconsider.
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function reconsiderblock($blockhash) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$blockhash" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * savemempool
   *
   * Dumps the mempool to disk. It will fail until the previous dump is fully
   * loaded.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function savemempool() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * scantxoutset "action" ( [scanobjects,...] )
   *
   * EXPERIMENTAL warning: this call may be removed or changed in future
   * releases.
   *
   * Scans the unspent transaction output set for entries that match certain
   * output descriptors.
   *
   * Examples of output descriptors are:
   *    addr(<address>)     Outputs whose scriptPubKey corresponds to the
   *                        specified address (does not include P2PK)
   *    raw(<hex script>)   Outputs whose scriptPubKey equals the specified hex
   *                        scripts
   *    combo(<pubkey>)     P2PK, P2PKH, P2WPKH, and P2SH-P2WPKH outputs for the
   *                        given pubkey
   *    pkh(<pubkey>)       P2PKH outputs for the given pubkey
   *    sh(multi(<n>,<pubkey>,<pubkey>,...)) P2SH-multisig outputs for the given
   *                        threshold and pubkeys
   *
   * In the above, <pubkey> either refers to a fixed public key in hexadecimal notation, or to an xpub/xprv optionally followed by one
   * or more path elements separated by "/", and optionally ending in "/*" (unhardened), or "/*'" or "/*h" (hardened) to specify all
   * unhardened or hardened child keys.
   * In the latter case, a range needs to be specified by below if different from 1000.
   * For more information on output descriptors, see the documentation in the doc/descriptors.md file.
   *
   * Arguments:
   *  1. action              (string, required) The action to execute
   *                         "start" for starting a scan
   *                         "abort" for aborting the current scan (returns true
   *                         when abort was successful)
   *                         "status" for progress report (in %) of the current
   *                         scan
   *  2. scanobjects         (json array) Array of scan objects. Required for
   *                         "start" action
   *                         Every scan object is either a string descriptor or
   *                         an object:
   *       [
   *         "descriptor",   (string) An output descriptor
   *         {               (json object) An object with output descriptor and
   *                         metadata
   *           "desc": "str", (string, required) An output descriptor
   *           "range": n or [n,n], (numeric or array, optional, default=1000)
   *                         The range of HD chain indexes to explore (either
   *                         end or [begin,end])
   *         },
   *         ...
   *       ]
   *
   * Result:
   *  {                      (json object)
   *    "success" : true|false, (boolean) Whether the scan was completed
   *    "txouts" : n,        (numeric) The number of unspent transaction outputs
   *                         scanned
   *    "height" : n,        (numeric) The current block height (index)
   *    "bestblock" : "hex", (string) The hash of the block at the tip of the
   *                         chain
   *    "unspents" : [       (json array)
   *      {                  (json object)
   *        "txid" : "hex",  (string) The transaction id
   *        "vout" : n,      (numeric) The vout value
   *        "scriptPubKey" : "hex", (string) The script key
   *        "desc" : "str",  (string) A specialized descriptor for the matched
   *                         scriptPubKey
   *        "amount" : n,    (numeric) The total amount in UMK of the unspent
   *                         output
   *        "height" : n     (numeric) Height of the unspent transaction output
   *      },
   *      ...
   *    ],
   *    "total_amount" : n   (numeric) The total amount of all found unspent
   *                         outputs in UMK
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function scantxoutset($action, $scanobjects) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$action", $scanobjects ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * syncwithvalidationinterfacequeue
   *
   * Waits for the validation interface queue to catch up on everything that
   * was there when we entered this function.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function syncwithvalidationinterfacequeue() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * verifychain (checklevel nblocks )
   *
   * Verifies blockchain database.
   *
   * Arguments:
   *  1. checklevel (numeric, optional, default = 3, range = 0-4) How thorough
   *                the block verification is:
   *                - level 0 reads the blck from disk
   *                - level 1 verifies block validity
   *                - level 2 verifies undo data
   *                - level 3 checks disconnection of tip blocks
   *                - level 4 tries to reconnect the blocks
   *                - each level includes the checks of the previous levels
   *  2. nblocks    (numeric, optional, default = 6, 0 = all) The number of
   *                blocks to check.
   *
   * Result:
   *  true|false    (boolean) Verified or not.
   *
   * (0.21.1 RPC)
   *
   */
  public function verifychain($checklevel = 3, $nblocks = 6) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $checklevel, $nblocks ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * verifytxoutproof "proof"
   *
   * Verifies that a proof points to a transaction in a block, returning the
   * transaction it commits to and throwing an RPC error if the block is not
   * in our best chain.
   *
   * Arguments:
   *  1. "proof"    (string, required) The hex-encoded proof generated by
   *                gettxoutproof.
   *
   * Result:
   *  [             (json array)
   *    "txid",     (string) The txid(s) which the proof commits to, or empty
   *    ...         array if the proof can not be validated.
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function verifytxoutproof($proof) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$proof" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * waitforblock blockhash timeout
   *
   * Waits for a specific new block and returns useful info about it. Returns
   * the current block on timeout or exit.
   *
   * Arguments:
   *  1. blockhash  (string, required) Block hash to wait for.
   *  2. timeout    (numeric, optional, default=0) Time in milliseconds to wait
   *                for a response. 0 indicates no timeout.
   *
   * Result:
   *  {
   *    "hash": "hash",  (string) The block hash.
   *    "height": n      (numeric) Height of the block.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function waitforblock($blockhash, $timeout = 0) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$blockhash", $timeout ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * waitforblockheight height timeout
   *
   * Waits for (at least) block height and returns the height and hash of the
   * current tip. Returns the current block on timeout or exit.
   *
   * Arguments:
   *  1. height     (numeric, required) Block height to wait for.
   *  2. timeout    (numeric, optional, default=0) Time in milliseconds to wait
   *                for a response. 0 indicates no timeout.
   *
   * Result:
   *  {
   *    "hash": "hash",  (string) The block hash.
   *    "height": n      (numeric) Height of the block.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function waitforblockheight($height, $timeout) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $height, $timeout ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * waitfornewblock timeout
   *
   * Waits for a specific new block and returns useful info about it. Returns
   * the current block on timeout or exit.
   *
   * Arguments:
   *  1. timeout    (numeric, optional, default=0) Time in milliseconds to wait
   *                for a response. 0 indicates no timeout.
   *
   * Result:
   *  {
   *    "hash": "hash",  (string) The block hash.
   *    "height": n      (numeric) Height of the block.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function waitfornewblock($timeout = 0) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $timeout ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //              CONTROL               //
  ////////////////////////////////////////


  /*
   * echo arg0 arg1 arg2 arg3 arg4 arg5 arg6 arg7 arg8 arg9
   *
   * Simply echo back the input arguments. This command is for testing. It will
   * return an internal bug report when arg9='trigger_internal_bug' is passed.
   * The difference between echo and echojson is that echojson has argument
   * conversion enabled in the client-side table in umkcoin-cli and the GUI.
   * There is no server-side difference.
   *
   * Arguments:
   *  1. arg0       (string, optional)
   *  2. arg1       (string, optional)
   *  3. arg2       (string, optional)
   *  4. arg3       (string, optional)
   *  5. arg4       (string, optional)
   *  6. arg5       (string, optional)
   *  7. arg6       (string, optional)
   *  8. arg7       (string, optional)
   *  9. arg8       (string, optional)
   *  10. arg9      (string, optional)
   *
   * Result:
   *  [           (json object) Returns whatever was passed in.
   *    "str0"
   *    ,...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function echo($arg0 = "", $arg1 = "", $arg2 = "", $arg3 = "", $arg4 = "", $arg5 = "", $arg6 = "", $arg7 = "", $arg8 = "", $arg9 = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$arg0", "$arg1", "$arg2", "$arg3", "$arg4", "$arg5", "$arg6", "$arg7", "$arg8", "$arg9" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * echoipc arg
   *
   * Echo back the input argument, passing it through a spawned process in a
   * multiprocess build. This command is for testing.
   *
   * Arguments:
   *  1. arg        (string, required) The string to echo.
   *
   * Result:
   *  str           (string) The echoed string.
   *
   * (0.21.1 RPC)
   *
   */
  public function echoipc($arg) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$arg" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * echojson arg
   *
   * Echo back the input json object argument. This command is for testing.
   *
   * Arguments:
   *  1. arg        (json object, required) The json object to echo.
   *
   * Result:
   *  obj           (json object) The echoed json object.
   *
   * (0.21.1 RPC)
   *
   */
  public function echojson($arg) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $arg ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getmemoryinfo ( "mode" )
   *
   * Returns an object containing information about memory usage.
   *
   * Arguments:
   *  1. "mode" determines what kind of information is returned. This argument
   *     is optional, the default mode is "stats".
   *     - "stats" returns general statistics about memory usage in the daemon.
   *     - "mallocinfo" returns an XML string describing low-level heap state
   *       (only available if compiled with glibc 2.10+).
   *
   * Result (mode "stats"):
   *  {
   *   "locked": {            (json object) Information about locked memory
   *                          manager
   *     "used": xxxx,        (numeric) Number of bytes used
   *     "free": xxxx,        (numeric) Number of bytes available in current
   *                          arenas
   *     "total": xxxxxx,     (numeric) Total number of bytes managed
   *     "locked": xxxxx,     (numeric) Amount of bytes that succeeded locking.
   *                          If this number is smaller than total, locking
   *                          pages failed at some point and key data could be
   *                          swapped to disk.
   *     "chunks_used": xxxx, (numeric) Number allocated chunks
   *     "chunks_free": xxxx, (numeric) Number unused chunks
   *   }
   * }
   *
   * Result (mode "mallocinfo"):
   *  "<malloc version="1">..."
   *
   * (0.21.1 RPC)
   *
   */
  public function getmemoryinfo($mode = "stats") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$mode" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getrpcinfo
   *
   * Returns details of the RPC server.
   *
   * Result:
   *  {                        (json object)
   *    "active_commands" : [  (json array) All active commands
   *      {                    (json object) Information about an active
   *                           command
   *        "method" : "str",  (string) The name of the RPC command
   *        "duration" : n     (numeric) The running time in microseconds
   *      },
   *      ...
   *    ],
   *    "logpath" : "str"      (string) The complete file path to the debug log
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getrpcinfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * help ( "command" )
   *
   * List all commands, or get help for a specified command.
   *
   * Arguments:
   * 1. "command"   (string, optional) The command to get help on.
   *
   * Result:
   * "text"         (string) The help text.
   *
   * (0.21.1 RPC)
   *
   */
  public function help($command = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (!empty($command))
      $args[ "params" ] = [ "$command" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * logging ( <include> <exclude> )
   *
   * Gets and sets the logging configuration. When called without an argument,
   * returns the list of categories with status that are currently being debug
   * logged or not. When called with arguments, adds or removes categories from
   * debug logging and return the lists above. The arguments are evaluated in
   * order "include", "exclude". If an item is both included and excluded, it
   * will thus end up being excluded. The valid logging categories are:
   * - net
   * - tor
   * - mempool
   * - http
   * - bench
   * - zmq
   * - db
   * - rpc
   * - estimatefee
   * - addrman
   * - selectcoins
   * - reindex
   * - cmpctblock
   * - rand
   * - prune
   * - proxy
   * - mempoolrej
   * - libevent
   * - coindb
   * - qt
   * - leveldb
   * In addition, the following are available as category names with special
   * meanings:
   * - "all", "1"  : represent all logging categories
   * - "none", "0" : even of other logging categories are specified, ignore all
   *                 of them.
   *
   * Arguments:
   * 1. "include"   (array of strings, optional) A json array of categories to
   *                add debug logging
   *  [
   *   "category"   (string) The valid logging category
   *   ,...
   *  ]
   * 2. "exclude"   (array of strings, optional) A json array of categories to
   *                remove debug logging
   *  [
   *   "category"   (string) The valid logging category
   *   ,...
   *  ]
   *
   * Result:
   * {             (json object) Where keys are the logging categories, and
   *               values indicates its status
   *  "category": 0|1,  (numeric) If being debug logged or not.
   *                    0:inactive, 1:active
   *  ...
   * }
   *
   * (0.21.1 RPC)
   *
   */
  public function logging($incl = [], $excl = []) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (!empty($incl))
      $args[ "params" ] = [ $incl ];
    if (!empty($excl))
      array_push($args[ "params" ], $excl);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * mockscheduler delta_time
   *
   * Bump the scheduler into the future (-regtest only).
   *
   * Arguments:
   *  1. delta_time  (numeric, required) Number of seconds to forward the
   *                 scheduler into the future.
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function mockscheduler($delta_time) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $delta_time ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * setmocktime timestamp
   *
   * Set the local time to given timestamp (-regtest only).
   *
   * Arguments:
   *  1. delta_time  (numeric, required) Number of seconds expressed in UNIX
   *                 epoch time format (Jan 1 1970 GMT). Pass 0 to go back to
   *                 using the system time.
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function setmocktime($timestamp) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $timestamp ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * stop
   *
   * Stops the underlying daemon. (You're warned!)
   *
   * (0.21.1 RPC)
   *
   */
  public function stop() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * uptime
   *
   * Returns the total uptime of the server.
   *
   * Result:
   * ttt            (numeric) The number of seconds that the server has been
   *                running.
   *
   * (0.21.1 RPC)
   *
   */
  public function uptime() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //              GENERATE              //
  ////////////////////////////////////////


  /*
   * generateblock "output" ["rawtx/txid",...]
   *
   * Mine a block with a set of ordered transactions immediately to a specified
   * address or descriptor (before the RPC call returns).
   *
   * Arguments:
   *  1. output        (string, required) The address or descriptor to send the
   *                   newly generated umkoin to.
   *  2. transactions  (json array, required) An array of hex strings which are
   *                   either txids or raw transactions. Txids must reference
   *                   transactions currently in the mempool. All transactions
   *                   must be valid and in valid order, otherwise the block
   *                   will be rejected.
   *     [
   *       "rawtx/txid",  (string)
   *       ...
   *     ]
   *
   * Result:
   *  {                (json object)
   *    "hash" : "hex" (string) hash of generated block
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function generateblock($output, $transactions) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$output", $transactions ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * generatetoaddress nblocks address (maxtries)
   *
   * Mine blocks immediately to a specified address (before the RPC call returns)
   *
   * Arguments:
   *  1. nblocks    (numeric, required) How many blocks are generated immediately.
   *  2. address    (string, required) The address to send the newly generated
   *                coins to.
   *  3. maxtries   (numeric, optional) How many iterations to try (default =
   *                1000000).
   *
   * Result:
   *  {             (array) Hashes of generated blocks.
   *    [
   *       "blockhash"
   *       ,...
   *    ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function generatetoaddress($nblocks, $address, $maxtries = 1000000) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $nblocks, $address, $maxtries ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * generatetodescriptor nblocks "descriptor" ( maxtries )
   *
   * Mine blocks immediately to a specified descriptor (before the RPC call
   * returns)
   *
   * Arguments:
   *  1. nblocks    (numeric, required) How many blocks are generated
   *                immediately.
   *  2. descriptor (string, required) The descriptor to send the newly
   *                generated umkoin to.
   *  3. maxtries   (numeric, optional, default = 1000000) How many iterations
   *                to try.
   *
   * Result:
   *  [             (json array) hashes of blocks generated
   *    "hex",      (string) blockhash
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function generatetodescriptor($nblocks, $descriptor, $maxtries = 1000000) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $nblocks, $descriptor, $maxtries ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //                MINING              //
  ////////////////////////////////////////


  /*
   * estimaterawfee
   *
   * WARNING: This interface is unstable and may disappear or change!
   *
   * WARNING: This is an advanced API call that is tightly coupled to the
   * specific implementation of fee estimation. The parameters it can be called
   * with and the results it returns will change if the internal implementation
   * changes.
   *
   * Estimates the approximate fee per kilobyte needed for a transaction to
   * begin confirmation within conf_target blocks if possible. Uses virtual
   * transaction size as defined in BIP 141 (witness data is discounted).
   *
   * Arguments:
   *  1. conf_target    (numeric, required) Confirmation target in blocks
   *                    (1 - 1008).
   *  2. threshold      (numeric, optional, default=0.95) The proportion of
   *                    transactions in a given feerate range that must have
   *                    been confirmed within conf_target in order to consider
   *                    those feerates as high enough and proceed to check
   *                    lower buckets.
   *
   * Result:
   *  {
   *    "short": {         (json object) Estimate for short time horizon
   *      "decay": 0.962,  (numeric) Exponential decay (per block) for
   *                       historical moving average of confirmation data
   *      "scale": 1,      (numeric) The resolution of confirmation targets at
   *                       this time horizon
   *      "pass": {        (json object, optional) Information about the lowest
   *                       range of feerates to succeed in meeting the threshold
   *      },
   *      "fail": {        (json object, optional) Information about the highest
   *                       range of feerates to fail to meet the threshold
   *        "startrange": 0,  (numeric) Start of feerate range
   *        "endrange": 1e+99,  (numeric) End of feerate range
   *        "withintarget": 13.07,  (numeric) Number of txs over history
   *                       horizon in the feerate range that were confirmed
   *                       within target
   *        "totalconfirmed": 13.07,  (numeric) Number of txs over history
   *                       horizon in the feerate range that were confirmed at
   *                       any point
   *        "inmempool": 0,  (numeric) Current number of txs in mempool in the
   *                       feerate range unconfirmed for at least target blocks
   *        "leftmempool": 0  (numeric) Number of txs over history horizon in
   *                       the feerate range that left mempool unconfirmed
   *                       after target
   *      },
   *      "errors": [      (json object) Errors encountered during processing
   *                       (if there are any)
   *        "Insufficient data or no feerate found which meets threshold"
   *      ]
   *    },
   *    "medium": {        (json object) Estimate for medium time horizon
   *      "feerate": 0.00001000,
   *      "decay": 0.9952,
   *      "scale": 2,
   *      "pass": {
   *        "startrange": 0,
   *        "endrange": 1e+99,
   *        "withintarget": 26.59,
   *        "totalconfirmed": 26.59,
   *        "inmempool": 0,
   *        "leftmempool": 0
   *      }
   *    },
   *    "long": {          (json object) Estimate for long time horizon
   *      "decay": 0.99931,
   *      "scale": 24,
   *      "fail": {
   *        "startrange": 0,
   *        "endrange": 1e+99,
   *        "withintarget": 43.35,
   *        "totalconfirmed": 43.35,
   *        "inmempool": 0,
   *        "leftmempool": 0
   *      },
   *      "errors": [
   *        "Insufficient data or no feerate found which meets threshold"
   *      ]
   *    }
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function estimaterawfee($conf_target, $threshold = 0.95) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $conf_target, $threshold ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getblocktemplate ( "template_request" )
   *
   * If the request parameters include a 'mode' key, that is used to explicitly
   * select between the default 'template' request or a 'proposal'.
   * It returns data needed to construct a block to work on.
   *
   * Arguments:
   *  1. template_request     (json object, optional, default={}) Format of the
   *                          template
   *       {
   *         "mode": "str",   (string, optional) This must be set to "template",
   *                          "proposal" (see BIP 23), or omitted
   *         "capabilities": [ (json array, optional) A list of strings
   *           "str",         (string) client side supported feature,
   *                          'longpoll', 'coinbasevalue', 'proposal',
   *                          'serverlist', 'workid'
   *           ...
   *         ],
   *         "rules": [       (json array, required) A list of strings
   *           "segwit",      (string, required) (literal) indicates client side
   *                          segwit support
   *           "str",         (string) other client side supported softfork
   *                          deployment
   *           ...
   *         ],
   *       }
   *
   * Result:
   *  {                       (json object)
   *    "version" : n,        (numeric) The preferred block version
   *    "rules" : [           (json array) specific block rules that are to be
   *                          enforced
   *      "str",              (string) name of a rule the client must understand
   *                          to some extent; see BIP 9 for format
   *      ...
   *    ],
   *    "vbavailable" : {     (json object) set of pending, supported versionbit
   *                          (BIP 9) softfork deployments
   *      "rulename" : n,     (numeric) identifies the bit number as indicating
   *                          acceptance and readiness for the named softfork
   *                          rule
   *      ...
   *    },
   *    "vbrequired" : n,     (numeric) bit mask of versionbits the server
   *                          requires set in submissions
   *    "previousblockhash" : "str",  (string) The hash of current highest block
   *    "transactions" : [    (json array) contents of non-coinbase transactions
   *                          that should be included in the next block
   *      {                   (json object)
   *        "data" : "hex",   (string) transaction data encoded in hexadecimal
   *                          (byte-for-byte)
   *        "txid" : "hex",   (string) transaction id encoded in little-endian
   *                          hexadecimal
   *        "hash" : "hex",   (string) hash encoded in little-endian hexadecimal
   *                          (including witness data)
   *        "depends" : [     (json array) array of numbers
   *          n,              (numeric) transactions before this one (by 1-based
   *                          index in 'transactions' list) that must be present
   *                          in the final block if this one is
   *          ...
   *        ],
   *        "fee" : n,        (numeric) difference in value between transaction
   *                          inputs and outputs (in satoshis); for coinbase
   *                          transactions, this is a negative Number of the
   *                          total collected block fees (ie, not including the
   *                          block subsidy); if key is not present, fee is
   *                          unknown and clients MUST NOT assume there isn't
   *                          one
   *        "sigops" : n,     (numeric) total SigOps cost, as counted for
   *                          purposes of block limits; if key is not present,
   *                          sigop cost is unknown and clients MUST NOT assume
   *                          it is zero
   *        "weight" : n      (numeric) total transaction weight, as counted
   *                          for purposes of block limits
   *      },
   *      ...
   *    ],
   *    "coinbaseaux" : {     (json object) data that should be included in the
   *                          coinbase's scriptSig content
   *      "key" : "hex",      (string) values must be in the coinbase (keys may
   *                          be ignored)
   *      ...
   *    },
   *    "coinbasevalue" : n,  (numeric) maximum allowable input to coinbase
   *                          transaction, including the generation award and
   *                          transaction fees (in satoshis)
   *    "longpollid" : "str", (string) an id to include with a request to
   *                          longpoll on an update to this template
   *    "target" : "str",     (string) The hash target
   *    "mintime" : xxx,      (numeric) The minimum timestamp appropriate for
   *                          the next block time, expressed in UNIX epoch time
   *    "mutable" : [         (json array) list of ways the block template may
   *                          be changed
   *      "str",              (string) A way the block template may be changed,
   *                          e.g. 'time', 'transactions', 'prevblock'
   *      ...
   *    ],
   *    "noncerange" : "hex", (string) A range of valid nonces
   *    "sigoplimit" : n,     (numeric) limit of sigops in blocks
   *    "sizelimit" : n,      (numeric) limit of block size
   *    "weightlimit" : n,    (numeric) limit of block weight
   *    "curtime" : xxx,      (numeric) current timestamp in UNIX epoch time
   *    "bits" : "str",       (string) compressed target of next block
   *    "height" : n,         (numeric) The height of the next block
   *    "default_witness_commitment" : "str" (string, optional) a valid witness
   *                          commitment for the unmodified block template
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getblocktemplate($template_request = []) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $template_request ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getmininginfo
   *
   * Returns a JSON object containing mining-related information.
   *
   * Result:
   * {                         (json object)
   *  "blocks": n,             (numeric) The current block
   *  "currentblockweight": n, (numeric) The last block weight
   *  "currentblocktx": n,     (numeric) The last block transaction
   *  "difficulty": n.nnn,     (numeric) The current difficulty
   *  "networkhashps": n.nnn,  (numeric) The network hashes per second
   *  "pooledtx": n,           (numeric) The size of the mempool
   *  "chain": "x",            (string) current network name as defined in BIP70
   *                           (main, test, signet, regtest)
   *  "warnings": "x"          (string) Any network and blockchain warnings
   * }
   *
   * (0.21.1 RPC)
   *
   */
  public function getmininginfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getnetworkhashps ( nblocks height )
   *
   * Returns the estimated network hashes per second based on the last n blocks.
   * Pass in [blocks] to override number of blocks, -1 specifies since last
   * difficulty change. Pass in [height] to estimate the network speed at the
   * time when a certain block was found.
   *
   * Arguments:
   *  1. nblocks    (numeric, optional, default = 120) The number of blocks, or
   *                -1 for blocks since last difficulty change.
   *  2. height     (numeric, optional, default = -1) To estimate at the time
   *                of the given height.
   *
   * Result:
   *  n             (numeric) Hashes per second estimated
   *
   * (0.21.1 RPC)
   *
   */
  public function getnetworkhashps($nblocks = 120, $height = -1) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $nblocks, $height ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * prioritisetransaction "txid" ( dummy ) fee delta
   *
   * Accepts the transaction into mined blocks at a higher (or lower) priority.
   *
   * Arguments:
   *  1. "txid"     (string, required) The transaction id.
   *  2. dummy      (numeric, optional) API-Compatibility for previous API. Must
   *                be zero or null. DEPRECATED. For forward compatibility use
   *                named arguments and omit this parameter.
   *  3. fee_delta  (numeric, required) The fee value (in satoshis) to add (or
   *                subtract, if negative). The fee is not actually paid, only
   *                the algorithm for selecting transactions into a block
   *                considers the transaction as it would have paid a higher (or
   *                lower) fee.
   *
   * Result:
   *  true          (boolean) Returns true
   *
   * (0.21.1 RPC)
   *
   */
  public function prioritisetransaction($txid, $dummy, $feedelta) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid", 0, $feedelta ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * submitblock "hexdata"  ( "dummy" )
   *
   * Attempts to submit new block to network.
   *
   * Arguments:
   *  1. "hexdata"  (string, required) The hex-encoded block data to submit.
   *  2. "dummy"    (optional) Dummy value, for compatibility with BIP22. This
   *                value is ignored.
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function submitblock($hexdata, $dummy = "dummy") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexdata", "$dummy" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * submitheader "hexdata"
   *
   * Decode the given hexdata as a header and submit it as a candidate chain tip
   * if valid. Throws when the header is invalid.
   *
   * Arguments:
   *  1. hexdata    (string, required) the hex-encoded block header data
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function submitheader($hexdata) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexdata" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //               NETWORK              //
  ////////////////////////////////////////


  /*
   * addconnection address connection_type
   *
   * Open an outbound connection to a specified node. This RPC is for testing
   * only.
   *
   * Arguments:
   *  1. address          (string, required) The IP address and port to attempt
   *                      connecting to.
   *  2. connection_type  (string, required) Type of connection to open, either
   *                      "outbound-full-relay" or "block-relay-only".
   *
   * Result:
   *  {
   *    "address"         (string) Address of newly added connection.
   *    "connection_type" (string) Type of connection opened.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function addconnection($address, $connection_type) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", "$connection_type" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * addnode "node" "add|remove|onetry"
   *
   * Attempts to add or remove a node from the addnode list. Or try a connection
   * to a node once. Nodes added using addnode (or -connect) are protected from
   * DoS disconnection and are not required to be full nodes/support SegWit as
   * other outbound peers are (hough such peers will not be synced from).
   *
   * Arguments:
   *  1. "node"     (string, required) The node (see getpeerinfo for nodes)
   *  2. "command"  (string, required) "Add" to add a node to the list, "Remove"
   *                to remove a node from the list, "Onetry" to try a connection
   *                to the node once.
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function addnode($node, $cmd = "onetry") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$node", "$cmd" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * addpeeraddress address port
   *
   * Add the address of a potential peer to the address manager. This RPC is
   * for testing only.
   *
   * Arguments:
   *  1. address    (string, required) The IP address of the peer.
   *  2. port       (numeric, required) The port of the peer.
   *
   * Result:
   *  success       (boolean) Whether the peer address was successfully added
   *                to the address manager.
   *
   * (0.21.1 RPC)
   *
   */
  public function addpeeraddress($address, $port) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", $port ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * clearbanned
   *
   * Clear all banned IPs.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function clearbanned() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * disconnectnode "[address]" [nodeid]
   *
   * Immediately disconnects from the specified peer node. Strictly one out of
   * 'address' and 'nodeid' can be provided to identify the node. To disconnect
   * by nodeid, either set 'address' to the empty string, or call using the
   * named 'nodeid' argument only.
   *
   * Arguments:
   *  1. "address"  (string, optional) The IP address/port of the node.
   *  2. "nodeid"   (number, optional) The node ID (see getpeerinfo for node
   *                IDs).
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function disconnectnode($address, $nodeid) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (!empty($address))
      $args[ "params" ] = [ "$address" ];
    else
      $args[ "params" ] = [ "", $nodeid ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getaddednodeinfo "node"
   *
   * Returns information about the given added node, or all added nodes.
   * Note: if "node" is undefined, information on all added nodes is
   *       returned as an array.
   * Note: if "node" is defined but such a node is not on the added
   *       node list, an error is returned.
   * Note: "node" shall exactly match added node address:port.
   *
   * Arguments:
   *  1. "node"     (string, optional) If provided, return information about
   *                this specific node, otherwise all nodes are returned.
   *
   * Result:
   *  [             (json array)
   *    {           (json object)
   *      "addednode": "192.168.1.1:6333", (string) The node IP address or name
   *                                       (as provided to addnode)
   *      "connected": true,               (boolean) If connected
   *      "addresses": [                   (list of objects) Only when
   *                                       connected = true
   *        {
   *          "address": "192.168.1.1:6333", (string) The umkoin server IP and
   *                                       port we're connected to
   *          "connected": "outbound"      (string) Connection, inbound or
   *                                       outbound.
   *        }
   *      ]
   *    }
   *    ,...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function getaddednodeinfo($node = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (!empty($node))
      $args[ "params" ] = [ "$node" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getconnectioncount
   *
   * Returns the number of connections to other nodes.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  n             (numeric) The connection count.
   *
   * (0.21.1 RPC)
   *
   */
  public function getconnectioncount() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getnettotals
   *
   * Returns information about network traffic, including bytes in, bytes out,
   * and current time.
   *
   * Result:
   *  {                             (json object)
   *    "totalbytesrecv" : n,       (numeric) Total bytes received
   *    "totalbytessent" : n,       (numeric) Total bytes sent
   *    "timemillis" : xxx,         (numeric) Current UNIX epoch time in
   *                                milliseconds
   *    "uploadtarget" : {          (json object)
   *      "timeframe" : n,          (numeric) Length of the measuring timeframe
   *                                in seconds
   *      "target" : n,             (numeric) Target in bytes
   *      "target_reached" : true|false,  (boolean) True if target is reached
   *      "serve_historical_blocks" : true|false, (boolean) True if serving
   *                                historical blocks
   *      "bytes_left_in_cycle" : n, (numeric) Bytes left in current time cycle
   *      "time_left_in_cycle" : n  (numeric) Seconds left in current time cycle
   *    }
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getnettotals() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getnetworkinfo
   *
   * Returns an object containing various state info regarding P2P networking.
   *
   * Result:
   *  {                            (json object)
   *    "version" : n,             (numeric) the server version
   *    "subversion" : "str",      (string) the server subversion string
   *    "protocolversion" : n,     (numeric) the protocol version
   *    "localservices" : "hex",   (string) the services we offer to the network
   *    "localservicesnames" : [   (json array) the services we offer to the
   *                               network, in human-readable form
   *      "str",                   (string) the service name
   *      ...
   *    ],
   *    "localrelay" : true|false, (boolean) true if transaction relay is
   *                               requested from peers
   *    "timeoffset" : n,          (numeric) the time offset
   *    "connections" : n,         (numeric) the total number of connections
   *    "connections_in" : n,      (numeric) the number of inbound connections
   *    "connections_out" : n,     (numeric) the number of outbound connections
   *    "networkactive" : true|false, (boolean) whether p2p networking is
   *                               enabled
   *    "networks" : [             (json array) information per network
   *      {                        (json object)
   *        "name" : "str",        (string) network (ipv4, ipv6 or onion)
   *        "limited" : true|false, (boolean) is the network limited using
   *                               -onlynet?
   *        "reachable" : true|false, (boolean) is the network reachable?
   *        "proxy" : "str",       (string) ("host:port") the proxy that is used
   *                               for this network, or empty if none
   *        "proxy_randomize_credentials" : true|false (boolean) Whether
   *                               randomized credentials are used
   *      },
   *      ...
   *    ],
   *    "relayfee" : n,            (numeric) minimum relay fee for transactions
   *                               in UMK/kB
   *    "incrementalfee" : n,      (numeric) minimum fee increment for mempool
   *                               limiting or BIP 125 replacement in UMK/kB
   *    "localaddresses" : [       (json array) list of local addresses
   *      {                        (json object)
   *        "address" : "str",     (string) network address
   *        "port" : n,            (numeric) network port
   *        "score" : n            (numeric) relative score
   *      },
   *      ...
   *    ],
   *    "warnings" : "str"         (string) any network and blockchain warnings
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getnetworkinfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getnodeaddresses ( count )
   *
   * Return known addresses which can potentially be used to find new nodes in
   * the network.
   *
   * Arguments:
   *  1. count      (numeric, optional, default=1) The maximum number of
   *                addresses to return. Specify 0 to return all known
   *                addresses.
   *
   * Result:
   *  [                      (json array)
   *    {                    (json object)
   *      "time" : xxx,      (numeric) The UNIX epoch time of when the node was
   *                         last seen
   *      "services" : n,    (numeric) The services offered
   *      "address" : "str", (string) The address of the node
   *      "port" : n         (numeric) The port of the node
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function getnodeaddresses($count = 1) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $count ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getpeerinfo
   *
   * Returns data about each connected network node as a json array of objects.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  [                               (json array)
   *    {                             (json object)
   *      "id" : n,                   (numeric) Peer index
   *      "addr" : "str",             (string) (host:port) The IP address and
   *                                  port of the peer
   *      "addrbind" : "str",         (string) (ip:port) Bind address of the
   *                                  connection to the peer
   *      "addrlocal" : "str",        (string) (ip:port) Local address as
   *                                  reported by the peer
   *      "network" : "str",          (string) Network (ipv4, ipv6, or onion)
   *                                  the peer connected through
   *      "mapped_as" : n,            (numeric) The AS in the BGP route to the
   *                                  peer used for diversifying peer selection
   *                                  (only available if the asmap config flag
   *                                  is set)
   *      "services" : "hex",         (string) The services offered
   *      "servicesnames" : [         (json array) the services offered, in
   *                                  human-readable form
   *        "str"                     (string) the service name if it is
   *                                  recognised
   *        ,...
   *      ],
   *      "relaytxes" : true|false,   (boolean) Whether peer has asked us to
   *                                  relay transactions to it
   *      "lastsend" : xxx,           (numeric) The UNIX epoch time of the last
   *                                  send
   *      "lastrecv" : xxx,           (numeric) The UNIX epoch time of the last
   *                                  receive
   *      "last_transaction" : xxx,   (numeric) The UNIX epoch time of the last
   *                                  valid transaction received from this peer
   *      "last_block" : xxx,         (numeric) The UNIX epoch time of the last
   *                                  block received from this peer
   *      "bytessent" : n,            (numeric) The total bytes sent
   *      "bytesrecv" : n,            (numeric) The total bytes received
   *      "conntime" : xxx,           (numeric) The UNIX epoch time of the
   *                                  connection
   *      "timeoffset" : n,           (numeric) The time offset in seconds
   *      "pingtime" : n,             (numeric) ping time (if available)
   *      "minping" : n,              (numeric) minimum observed ping time (if
   *                                  any at all)
   *      "pingwait" : n,             (numeric) ping wait (if non-zero)
   *      "version" : n,              (numeric) The peer version, such as 70001
   *      "subver" : "str",           (string) The string version
   *      "inbound" : true|false,     (boolean) Inbound (true) or Outbound
   *                                  (false)
   *      "addnode" : true|false,     (boolean) Whether connection was due to
   *                                  addnode/-connect or if it was an
   *                                  automatic/inbound connection
   *                                  (DEPRECATED, returned only if the config
   *                                  option -deprecatedrpc=getpeerinfo_addnode
   *                                  is passed)
   *      "connection_type" : "str",  (string) Type of connection:
   *                                  outbound-full-relay (default automatic
   *                                  connections),
   *                                  block-relay-only (does not relay
   *                                  transactions or addresses),
   *                                  inbound (initiated by the peer),
   *                                  manual (added via addnode RPC or
   *                                  -addnode/-connect configuration options),
   *                                  addr-fetch (short-lived automatic
   *                                  connection for soliciting addresses),
   *                                  feeler (short-lived automatic connection
   *                                  for testing addresses).
   *                                  Please note this output is unlikely to be
   *                                  stable in upcoming releases as we iterate
   *                                  to best capture connection behaviors.
   *      "startingheight" : n,       (numeric) The starting height (block) of
   *                                  the peer
   *      "banscore" : n,             (numeric) The ban score (DEPRECATED,
   *                                  returned only if config option
   *                                  -deprecatedrpc=banscore is passed)
   *      "synced_headers" : n,       (numeric) The last header we have in
   *                                  common with this peer
   *      "synced_blocks" : n,        (numeric) The last block we have in common
   *                                  with this peer
   *      "inflight" : [              (json array)
   *        n,                        (numeric) The heights of blocks we're
   8                                  currently asking from this peer
   *        ...
   *      ],
   *      "whitelisted" : true|false, (boolean, optional) Whether the peer is
   *                                  whitelisted with default permissions
   *                                  (DEPRECATED, returned only if config option
   *                                  -deprecatedrpc=whitelisted is passed)
   *      "permissions" : [           (json array) Any special permissions that
   *                                  have been granted to this peer
   *        "str",                    (string) bloomfilter (allow requesting
   *                                  BIP37 filtered blocks and transactions),
   *                                  noban (do not ban for misbehavior; implies
   *                                  download),
   *                                  forcerelay (relay transactions that are
   *                                  already in the mempool; implies relay),
   *                                  relay (relay even in -blocksonly mode, and
   *                                  unlimited transaction announcements),
   *                                  mempool (allow requesting BIP35 mempool
   *                                  contents),
   *                                  download (allow getheaders during IBD, no
   *                                  disconnect after maxuploadtarget limit),
   *                                  addr (responses to GETADDR avoid hitting
   *                                  the cache and contain random records with
   *                                  the most up-to-date info).
   *
   *        ...
   *      ],
   *      "minfeefilter" : n,         (numeric) The minimum fee rate for
   *                                  transactions this peer accepts
   *      "bytessent_per_msg" : {     (json object)
   *        "msg" : n,                (numeric) The total bytes sent aggregated
   *                                  by message type
   *                                  When a message type is not listed in this
   *                                  json object, the bytes sent are 0.
   *                                  Only known message types can appear as
   *                                  keys in the object.
   *        ...
   *      },
   *      "bytesrecv_per_msg" : {     (json object)
   *        "msg" : n                 (numeric) The total bytes received
   *                                  aggregated by message type
   *                                  When a message type is not listed in this
   *                                  json object, the bytes received are 0.
   *                                  Only known message types can appear as
   *                                  keys in the object and all bytes received
   *                                  of unknown message types are listed under
   *                                  '*other*'.
   *      }
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function getpeerinfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listbanned
   *
   * List all manually banned IPs/Subnets.
   *
   * Arguments:
   *  None
   *
   * Result:
   *  [                      (json array)
   *    {                    (json object)
   *      "address": "str",  (string)
   *      "banned_until": n, (numeric)
   *      "ban_created": n   (numeric)
   *    }
   *    ,...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listbanned() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * ping
   *
   * Requests that a ping be sent to all other nodes, to measure ping time.
   * Results provided in getpeerinfo, pingtime and pingwait fields are
   * decimal seconds.
   * Ping command is handled in queue with all other commands, so it
   * measures processing backlog, not just network ping.
   *
   * Arguments:
   *  None
   *
   * Results:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function ping() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * setban "subnet" "command" ( bantime absolute )
   *
   * Attempts to add or remove an IP/Subnet from the banned list.
   *
   * Arguments:
   *  1. subnet     (string, required) The IP/Subnet (see getpeerinfo for nodes
   *                IP) with an optional netmask (default is /32 = single IP).
   *  2. command    (string, required) 'add' to add an IP/Subnet to the list,
   *                'remove' to remove an IP/Subnet from the list.
   *  3. bantime    (numeric, optional, default = 0) time in seconds how long
   *                (or until when if [absolute] is set) the IP is banned (0 or
   *                empty means using the default time of 24h which can also be
   *                overwritten by the -bantime startup argument).
   *  4. absolute   (boolean, optional, default = false) If set, the bantime
   *                must be an absolute timestamp in seconds since epoch
   *                (Jan 1 1970 GMT).
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function setban($subnet, $command = "add", $bantime = 0, $absolute = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$subnet", "$command", $bantime, $absolute ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * setnetworkactive state
   *
   * Disable/enable all p2p network activity.
   *
   * Arguments:
   *  1. state      (boolean, required) True to enable, false to disable.
   *
   * Result:
   *  true|false    (boolean) The value that was passed in.
   *
   * (0.21.1 RPC)
   *
   */
  public function setnetworkactive($state = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $state ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //            RAWTRANSACTIONS         //
  ////////////////////////////////////////


  /*
   * analyzepsbt "psbt"
   *
   * Analyzes and provides information about the current status of a PSBT and its inputs
   *
   * Arguments:
   *  1. psbt       (string, required) A base64 string of a PSBT
   *
   * Result:
   *  {                        (json object)
   *    "inputs" : [           (json array)
   *      {                    (json object)
   *        "has_utxo" : true|false,  (boolean) Whether a UTXO is provided
   *        "is_final" : true|false,  (boolean) Whether the input is finalized
   *        "missing" : {      (json object, optional) Things that are missing
   *                           that are required to complete this input
   *          "pubkeys" : [    (json array, optional)
   *            "hex",         (string) Public key ID, hash160 of the public
   *                           key, of a public key whose BIP 32 derivation path
   *                           is missing
   *            ...
   *          ],
   *          "signatures" : [ (json array, optional)
   *            "hex",         (string) Public key ID, hash160 of the public
   *                           key, of a public key whose signature is missing
   *            ...
   *          ],
   *          "redeemscript" : "hex",  (string, optional) Hash160 of the
   *                                   redeemScript that is missing
   *          "witnessscript" : "hex"  (string, optional) SHA256 of the
   *                                   witnessScript that is missing
   *        },
   *        "next" : "str"     (string, optional) Role of the next person that
   *                           this input needs to go to
   *      },
   *      ...
   *    ],
   *    "estimated_vsize" : n, (numeric, optional) Estimated vsize of the final
   *                           signed transaction
   *    "estimated_feerate" : n,  (numeric, optional) Estimated feerate of the
   *                           final signed transaction in UMK/kB. Shown only if
   *                           all UTXO slots in the PSBT have been filled
   *    "fee" : n,             (numeric, optional) The transaction fee paid.
   *                           Shown only if all UTXO slots in the PSBT have
   *                           been filled
   *    "next" : "str",        (string) Role of the next person that this psbt
   *                           needs to go to
   *    "error" : "str"        (string, optional) Error message (if there is
   *                           one)
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function analyzepsbt($psbt) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$psbt" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * combinepsbt ["psbt",...]
   *
   * Combine multiple partially signed umkoin transactions into one
   * transaction. Implements the Combiner role.
   *
   * Arguments:
   *  1. txs        (json array, required) The base64 strings of partially
   *                signed transactions
   *     [
   *       "psbt",  (string) A base64 string of a PSBT
   *       ...
   *     ]
   *
   * Result:
   *  "str"         (string) The base64-encoded partially signed transaction
   *
   * (0.21.1 RPC)
   *
   */
  public function combinepsbt($txs) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $txs ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * combinerawtransaction ["hexstring",...]
   *
   * Combine multiple partially signed transactions into one transaction. The
   * combined transaction may be another partially signed transaction or a
   * fully signed transaction.
   *
   * Arguments:
   *  1. txs        (json array, required) The hex strings of partially signed
   *                transactions
   *     [
   *       "hexstring",  (string) A hex-encoded raw transaction
   *       ...
   *     ]
   *
   * Result:
   *  "str"         (string) The hex-encoded raw transaction with signature(s)
   *
   * (0.21.1 RPC)
   *
   */
  public function combinerawtransaction($txs) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $txs ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * converttopsbt "hexstring" ( permitsigdata iswitness )
   *
   * Converts a network serialized transaction to a PSBT. This should be used
   * only with createrawtransaction and fundrawtransaction createpsbt and
   * walletcreatefundedpsbt should be used for new applications.
   *
   * Arguments:
   *  1. hexstring      (string, required) The hex string of a raw transaction
   *  2. permitsigdata  (boolean, optional, default=false) If true, any
   *                    signatures in the input will be discarded and conversion
   *                    will continue. If false, RPC will fail if any signatures
   *                    are present.
   *  3. iswitness      (boolean, optional, default=depends on heuristic tests)
   *                    Whether the transaction hex is a serialized witness
   *                    transaction.
   *                    If iswitness is not present, heuristic tests will be
   *                    used in decoding.
   *                    If true, only witness deserialization will be tried.
   *                    If false, only non-witness deserialization will be
   *                    tried.
   *                    This boolean should reflect whether the transaction has
   *                    inputs (e.g. fully valid, or on-chain transactions), if
   *                    known by the caller.
   *
   * Result:
   *  "str"         (string) The resulting raw transaction (base64-encoded
   *                string)
   *
   * (0.21.1 RPC)
   *
   */
  public function converttopsbt($hexstring, $permitsigdata = false, $iswitness = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring", $permitsigdata, $iswitness ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * createpsbt [{"txid":"hex","vout":n,"sequence":n},...]
   *            [{"address":amount},{"data":"hex"},...]
   *            ( locktime replaceable )
   *
   * Creates a transaction in the Partially Signed Transaction format.
   * Implements the Creator role.
   *
   * Arguments:
   *  1. inputs              (json array, required) The json objects
   *     [
   *       {                 (json object)
   *         "txid": "hex",  (string, required) The transaction id
   *         "vout": n,      (numeric, required) The output number
   *         "sequence": n,  (numeric, optional, default=depends on the value
   *                         of the 'replaceable' and 'locktime' arguments)
   *                         The sequence number
   *       },
   *       ...
   *     ]
   *  2. outputs             (json array, required) The outputs (key-value
   *                         pairs), where none of the keys are duplicated.
   *                         That is, each address can only appear once and
   *                         there can only be one 'data' object.
   *                         For compatibility reasons, a dictionary, which
   *                         holds the key-value pairs directly, is also
   *                         accepted as second parameter.
   *     [
   *       {                 (json object)
   *         "address": amount, (numeric or string, required) A key-value pair.
   *                         The key (string) is the umkoin address, the value
   *                         (float or string) is the amount in UMK
   *       },
   *       {                 (json object)
   *         "data": "hex",  (string, required) A key-value pair. The key must
   *                         be "data", the value is hex-encoded data
   *       },
   *       ...
   *     ]
   *  3. locktime            (numeric, optional, default=0) Raw locktime. Non-0
   *                         value also locktime-activates inputs
   *  4. replaceable         (boolean, optional, default=false) Marks this
   *                         transaction as BIP125 replaceable.
   *                         Allows this transaction to be replaced by a
   *                         transaction with higher fees. If provided, it is an
   *                         error if explicit sequence numbers are
   *                         incompatible.
   *
   * Result:
   *  "str"         (string) The resulting raw transaction (base64-encoded
   *                string)
   *
   * (0.21.1 RPC)
   *
   */
  public function createpsbt($hexstring, $permitsigdata = false, $iswitness = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring", $permitsigdata, $iswitness ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * createrawtransaction [{"txid":"hex","vout":n,"sequence":n},...]
   *                      [{"address":amount},{"data":"hex"},...]
   *                      ( locktime replaceable )
   *
   * Create a transaction spending the given inputs and creating new outputs.
   * Outputs can be addresses or data. Returns hex-encoded raw transaction.
   * Note that the transaction's inputs are not signed, and it is not stored in
   * the wallet or transmitted to the network.
   *
   * Arguments:
   *  1. inputs         (json array, required) The inputs
   *      [
   *        {           (json object)
   *          "txid": "hex", (string, required) The transaction id
   *          "vout": n,     (numeric, required) The output number
   *          "sequence": n, (numeric, optional, default=depends on the value of
   *                         the 'replaceable' and 'locktime' arguments) The
   *                         sequence number
   *        },
   *        ...
   *      ]
   *  2. outputs        (json array, required) The outputs (key-value pairs),
   *                    where none of the keys are duplicated.
   *                    That is, each address can only appear once and there can
   *                    only be one 'data' object.
   *                    For compatibility reasons, a dictionary, which holds the
   *                    key-value pairs directly, is also accepted as second
   *                    parameter.
   *      [
   *        {           (json object)
   *          "address": amount, (numeric or string, required) A key-value pair.
   *                    The key (string) is the umkoin address, the value
   *                    (float or string) is the amount in UMK
   *        },
   *        {           (json object)
   *          "data": "hex",  (string, required) A key-value pair. The key must
   *                    be "data", the value is hex-encoded data
   *        },
   *        ...
   *      ]
   *  3. locktime       (numeric, optional, default=0) Raw locktime. Non-0 value
   *                    also locktime-activates inputs
   *  4. replaceable    (boolean, optional, default=false) Marks this
   *                    transaction as BIP125-replaceable.
   *                    Allows this transaction to be replaced by a transaction
   *                    with higher fees. If provided, it is an error if
   *                    explicit sequence numbers are incompatible.
   *
   * Result:
   *  "hex"         (string) hex string of the transaction
   *
   * (0.21.1 RPC)
   *
   */
  public function createrawtransaction($inputs, $outputs, $locktime = 0, $replaceable = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $inputs, $outputs, $locktime, $replaceable ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * decodepsbt "psbt"
   *
   * Return a JSON object representing the serialized, base64-encoded partially
   * signed umkoin transaction.
   *
   * Arguments:
   *  1. psbt    (string, required) The PSBT base64 string
   *
   * Result:
   *  {                  (json object)
   *   "tx" : {          (json object) The decoded network-serialized unsigned
   *                     transaction.
   *     ...             The layout is the same as the output of
   *                     decoderawtransaction.
   *   },
   *   "unknown" : {     (json object) The unknown global fields
   *     "key" : "hex",  (string) (key-value pair) An unknown key-value pair
   *     ...
   *   },
   *   "inputs" : [      (json array)
   *     {               (json object)
   *       "non_witness_utxo" : {  (json object, optional) Decoded network
   *                               transaction for non-witness UTXOs
   *         ...
   *       },
   *       "witness_utxo" : {    (json object, optional) Transaction output for
   *                             witness UTXOs
   *         "amount" : n,       (numeric) The value in UMK
   *         "scriptPubKey" : {  (json object)
   *           "asm" : "str",    (string) The asm
   *           "hex" : "hex",    (string) The hex
   *           "type" : "str",   (string) The type, eg 'pubkeyhash'
   *           "address" : "str" (string)  umkoin address if there is one
   *         }
   *       },
   *       "partial_signatures" : { (json object, optional)
   *         "pubkey" : "str",      (string) The public key and signature that
   *                                corresponds to it.
   *         ...
   *       },
   *       "sighash" : "str",   (string, optional) The sighash type to be used
   *       "redeem_script" : {  (json object, optional)
   *         "asm" : "str",     (string) The asm
   *         "hex" : "hex",     (string) The hex
   *         "type" : "str"     (string) The type, eg 'pubkeyhash'
   *       },
   *       "witness_script" : { (json object, optional)
   *         "asm" : "str",     (string) The asm
   *         "hex" : "hex",     (string) The hex
   *         "type" : "str"     (string) The type, eg 'pubkeyhash'
   *       },
   *       "bip32_derivs" : [   (json array, optional)
   *         {                  (json object, optional) The public key with the
   *                            derivation path as the value.
   *           "master_fingerprint" : "str",   (string) The fingerprint of the
   *                            master key
   *           "path" : "str"   (string) The path
   *         },
   *         ...
   *       ],
   *       "final_scriptsig" : { (json object, optional)
   *         "asm" : "str",      (string) The asm
   *         "hex" : "str"       (string) The hex
   *       },
   *       "final_scriptwitness" : [ (json array)
   *         "hex",              (string) hex-encoded witness data (if any)
   *         ...
   *       ],
   *       "unknown" : {         (json object) The unknown global fields
   *         "key" : "hex",      (string) (key-value pair) An unknown key-value
   *                             pair
   *         ...
   *       }
   *     },
   *     ...
   *   ],
   *   "outputs" : [             (json array)
   *     {                       (json object)
   *       "redeem_script" : {   (json object, optional)
   *         "asm" : "str",      (string) The asm
   *         "hex" : "hex",      (string) The hex
   *         "type" : "str"      (string) The type, eg 'pubkeyhash'
   *       },
   *       "witness_script" : {  (json object, optional)
   *         "asm" : "str",      (string) The asm
   *         "hex" : "hex",      (string) The hex
   *         "type" : "str"      (string) The type, eg 'pubkeyhash'
   *       },
   *       "bip32_derivs" : [    (json array, optional)
   *         {                   (json object)
   *           "pubkey" : "str", (string) The public key this path corresponds
   *                             to
   *           "master_fingerprint" : "str",   (string) The fingerprint of the
   *                             master key
   *           "path" : "str"    (string) The path
   *         },
   *         ...
   *       ],
   *       "unknown" : {         (json object) The unknown global fields
   *         "key" : "hex",      (string) (key-value pair) An unknown key-value
   *                             pair
   *         ...
   *       }
   *     },
   *     ...
   *   ],
   *   "fee" : n                 (numeric, optional) The transaction fee paid if
   *                             all UTXOs slots in the PSBT have been filled.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function decodepsbt($psbt) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$psbt" ];

    $res = $this->call($args);
    if ($res)
      return $res[ $result ];
  }


  /*
   * decoderawtransaction "hexstring" ( iswitness )
   *
   * Return a JSON object representing the serialized, hex-encoded transaction.
   *
   * Arguments:
   *  1. hexstring  (string, required) The transaction hex string
   *  2. iswitness  (boolean, optional, default=depends on heuristic tests)
   *                Whether the transaction hex is a serialized witness
   *                transaction.
   *                If iswitness is not present, heuristic tests will be used in
   *                decoding.
   *                If true, only witness deserialization will be tried.
   *                If false, only non-witness deserialization will be tried.
   *                This boolean should reflect whether the transaction has
   *                inputs (e.g. fully valid, or on-chain transactions), if
   *                known by the caller.
   *
   * Result:
   *  {                      (json object)
   *   "txid" : "hex",       (string) The transaction id
   *   "hash" : "hex",       (string) The transaction hash (differs from txid
   *                         for witness transactions)
   *   "size" : n,           (numeric) The transaction size
   *   "vsize" : n,          (numeric) The virtual transaction size (differs
   *                         from size for witness transactions)
   *   "weight" : n,         (numeric) The transaction's weight (between
   *                         vsize*4 - 3 and vsize*4)
   *   "version" : n,        (numeric) The version
   *   "locktime" : xxx,     (numeric) The lock time
   *   "vin" : [             (json array)
   *     {                   (json object)
   *       "txid" : "hex",   (string) The transaction id
   *       "vout" : n,       (numeric) The output number
   *       "scriptSig" : {   (json object) The script
   *         "asm" : "str",  (string) asm
   *         "hex" : "hex"   (string) hex
   *       },
   *       "txinwitness" : [ (json array)
   *         "hex",          (string) hex-encoded witness data (if any)
   *         ...
   *       ],
   *       "sequence" : n    (numeric) The script sequence number
   *     },
   *     ...
   *   ],
   *   "vout" : [            (json array)
   *     {                   (json object)
   *       "value" : n,      (numeric) The value in UMK
   *       "n" : n,          (numeric) index
   *       "scriptPubKey" : {  (json object)
   *         "asm" : "str",  (string) the asm
   *         "hex" : "hex",  (string) the hex
   *         "reqSigs" : n,  (numeric) The required sigs
   *         "type" : "str", (string) The type, eg 'pubkeyhash'
   *         "addresses" : [ (json array)
   *           "str",        (string) umkoin address
   *           ...
   *         ]
   *       }
   *     },
   *     ...
   *   ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function decoderawtransaction($hexstring, $iswitness = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring", $iswitness ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * decodescript "hexstring"
   *
   * Decode a hex-encoded script.
   *
   * Arguments:
   *  1. hexstring  (string, required) the hex-encoded script
   *
   * Result:
   *  {                 (json object)
   *   "asm" : "str",   (string) Script public key
   *   "type" : "str",  (string) The output type (e.g. nonstandard, pubkey,
   *                    pubkeyhash, scripthash, multisig, nulldata,
   *                    witness_v0_scripthash, witness_v0_keyhash,
   *                    witness_v1_taproot, witness_unknown)
   *   "reqSigs" : n,   (numeric) The required signatures
   *   "addresses" : [  (json array)
   *     "str",         (string) umkoin address
   *     ...
   *   ],
   *   "p2sh" : "str",  (string) address of P2SH script wrapping this redeem
   *                    script (not returned if the script is already a P2SH)
   *   "segwit" : {     (json object) Result of a witness script public key
   *                    wrapping this redeem script (not returned if the script
   *                    is a P2SH or witness)
   *     "asm" : "str", (string) String representation of the script public key
   *     "hex" : "hex", (string) Hex string of the script public key
   *     "type" : "str", (string) The type of the script public key (e.g.
   *                    witness_v0_keyhash or witness_v0_scripthash)
   *     "reqSigs" : n, (numeric) The required signatures (always 1)
   *     "addresses" : [ (json array) (always length 1)
   *       "str",       (string) segwit address
   *       ...
   *     ],
   *     "p2sh-segwit" : "str" (string) address of the P2SH script wrapping this
   *                           witness redeem script
   *   }
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function decodescript($hexstring) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * finalizepsbt "psbt" ( extract )
   *
   * Finalize the inputs of a PSBT. If the transaction is fully signed, it will
   * produce a network serialized transaction which can be broadcast with
   * sendrawtransaction. Otherwise a PSBT will be created which has the
   * final_scriptSig and final_scriptWitness fields filled for inputs that are
   * complete. Implements the Finalizer and Extractor roles.
   *
   * Arguments:
   *  1. psbt       (string, required) A base64 string of a PSBT
   *  2. extract    (boolean, optional, default=true) If true and the
   *                transaction is complete, extract and return the complete
   *                transaction in normal network serialization instead of the
   *                PSBT.
   *
   * Result:
   *  {                         (json object)
   *   "psbt" : "str",          (string) The base64-encoded partially signed
   *                            transaction if not extracted
   *   "hex" : "hex",           (string) The hex-encoded network transaction if
   *                            extracted
   *   "complete" : true|false  (boolean) If the transaction has a complete set
   *                            of signatures
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function finalizepsbt($psbt, $extract = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$psbt", $extract ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * fundrawtransaction "hexstring" ( options iswitness )
   *
   * If the transaction has no inputs, they will be automatically selected to
   * meet its out value. It will add at most one change output to the outputs.
   * No existing outputs will be modified unless "subtractFeeFromOutputs" is
   * specified. Note that inputs which were signed may need to be resigned after
   * completion since in/outputs have been added. The inputs added will not be
   * signed, use signrawtransactionwithkey or signrawtransactionwithwallet for
   * that. Note that all existing inputs must have their previous output
   * transaction be in the wallet. Note that all inputs selected must be of
   * standard form and P2SH scripts must be in the wallet using importaddress or
   * addmultisigaddress (to calculate fees). You can see whether this is the
   * case by checking the "solvable" field in the listunspent output. Only
   * pay-to-pubkey, multisig, and P2SH versions thereof are currently supported
   * for watch-only
   *
   * Arguments:
   *  1. hexstring                   (string, required) The hex string of the
   *                                 raw transaction
   *  2. options                     (json object, optional) for backward
   *                                 compatibility: passing in a true instead of
   *                                 an object will result in
   *                                 { "includeWatching" : true }
   *      {
   *        "add_inputs": bool,      (boolean, optional, default=true) For a
   *                                 transaction with existing inputs,
   *                                 automatically include more if they are not
   *                                 enough.
   *        "changeAddress": "str",  (string, optional, default=pool address)
   *                                 The umkoin address to receive the change
   *        "changePosition": n,     (numeric, optional, default=random) The
   *                                 index of the change output
   *        "change_type": "str",    (string, optional, default=set by
   *                                 -changetype) The output type to use. Only
   *                                 valid if changeAddress is not specified.
   *                                 Options are "legacy", "p2sh-segwit", and
   *                                 "bech32".
   *        "includeWatching": bool, (boolean, optional, default=true for
   *                                 watch-only wallets, otherwise false) Also
   *                                 select inputs which are watch only. Only
   *                                 solvable inputs can be used. Watch-only
   *                                 destinations are solvable if the public key
   *                                 and/or output script was imported, e.g.
   *                                 with 'importpubkey' or 'importmulti' with
   *                                 the 'pubkeys' or 'desc' field.
   *        "lockUnspents": bool,    (boolean, optional, default=false) Lock
   *                                 selected unspent outputs
   *        "fee_rate": amount,      (numeric or string, optional, default=not
   *                                 set, fall back to wallet fee estimation)
   *                                 Specify a fee rate in sat/vB.
   *        "feeRate": amount,       (numeric or string, optional, default=not
   *                                 set, fall back to wallet fee estimation)
   *                                 Specify a fee rate in UMK/kvB.
   *        "subtractFeeFromOutputs": [ (json array, optional, default=empty
   *                                 array) The integers. The fee will be
   *                                 equally deducted from the amount of each
   *                                 specified output. Those recipients will
   *                                 receive less umkoins than you enter in
   *                                 their corresponding amount field. If no
   *                                 outputs are specified here, the sender pays
   *                                 the fee.
   *          vout_index,            (numeric) The zero-based output index,
   *                                 before a change output is added.
   *          ...
   *        ],
   *        "replaceable": bool,     (boolean, optional, default=wallet default)
   *                                 Marks this transaction as BIP125
   *                                 replaceable. Allows this transaction to be
   *                                 replaced by a transaction with higher fees
   *        "conf_target": n,        (numeric, optional, default=wallet
   *                                 -txconfirmtarget) Confirmation target in
   *                                 blocks
   *        "estimate_mode": "str",  (string, optional, default=unset) The fee
   *                                 estimate mode, must be one of (case
   *                                 insensitive):
   *                                    "unset"
   *                                    "economical"
   *                                    "conservative"
   *      }
   *  3. iswitness                   (boolean, optional, default=depends on
   *                                 heuristic tests) Whether the transaction
   *                                 hex is a serialized witness transaction. If
   *                                 iswitness is not present, heuristic tests
   *                                 will be used in decoding. If true, only
   *                                 witness deserialization will be tried. If
   *                                 false, only non-witness deserialization
   *                                 will be tried. This boolean should reflect
   *                                 whether the transaction has inputs (e.g.
   *                                 fully valid, or on-chain transactions), if
   *                                 known by the caller.
   *
   * Result:
   *  {                 (json object)
   *   "hex" : "hex",   (string) The resulting raw transaction (hex-encoded
   *                    string)
   *   "fee" : n,       (numeric) Fee in UMK the resulting transaction pays
   *   "changepos" : n  (numeric) The position of the added change output,
   *                    or -1
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function fundrawtransaction($hexstring, $options, $iswitness) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args["patams"] = [ "$hexstring", $iswitness ];
    if (!empty($options))
      array_push($args[ "params" ], $options);
    if(isset($iswitness))
      array_push($args[ "params" ], $iswitness);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getrawtransaction "txid" (verbose "blockhash")
   *
   * Return the raw transaction data.
   *
   * By default this function only works for mempool transactions. When called
   * with a blockhash argument, getrawtransaction will return the transaction
   * if the specified block is available and the transaction is found in that
   * block. When called without a blockhash argument, getrawtransaction will
   * return the transaction if it is in the mempool, or if -txindex is enabled
   * and the transaction is in a block in the blockchain.
   *
   * Hint: Use gettransaction for wallet transactions.
   *
   * If verbose is 'true', returns an Object with information about 'txid'.
   * If verbose is 'false' or omitted, returns a string that is serialized,
   * hex-encoded data for 'txid'.
   *
   * Arguments:
   *  1. txid       (string, required) The transaction id
   *  2. verbose    (boolean, optional, default=false) If false, return a
   *                string, otherwise return a json object
   *  3. blockhash  (string, optional) The block in which to look for the
   *                transaction
   *
   * Result (if verbose is not set or set to false):
   *  "str"         (string) The serialized, hex-encoded data for 'txid'
   *
   * Result (if verbose is set to true):
   *  {                      (json object)
   *   "in_active_chain" : true|false,  (boolean) Whether specified block is in
   *                         the active chain or not (only present with explicit
   *                         "blockhash" argument)
   *   "hex" : "hex",        (string) The serialized, hex-encoded data for
   *                         'txid'
   *   "txid" : "hex",       (string) The transaction id (same as provided)
   *   "hash" : "hex",       (string) The transaction hash (differs from txid
   *                         for witness transactions)
   *   "size" : n,           (numeric) The serialized transaction size
   *   "vsize" : n,          (numeric) The virtual transaction size (differs
   *                         from size for witness transactions)
   *   "weight" : n,         (numeric) The transaction's weight (between
   *                         vsize*4-3 and vsize*4)
   *   "version" : n,        (numeric) The version
   *   "locktime" : xxx,     (numeric) The lock time
   *   "vin" : [             (json array)
   *     {                   (json object)
   *       "txid" : "hex",   (string) The transaction id
   *       "vout" : n,       (numeric) The output number
   *       "scriptSig" : {   (json object) The script
   *         "asm" : "str",  (string) asm
   *         "hex" : "hex"   (string) hex
   *       },
   *       "sequence" : n,   (numeric) The script sequence number
   *       "txinwitness" : [ (json array)
   *         "hex",          (string) hex-encoded witness data (if any)
   *         ...
   *       ]
   *     },
   *     ...
   *   ],
   *   "vout" : [            (json array)
   *     {                   (json object)
   *       "value" : n,      (numeric) The value in UMK
   *       "n" : n,          (numeric) index
   *       "scriptPubKey" : {  (json object)
   *         "asm" : "str",  (string) the asm
   *         "hex" : "str",  (string) the hex
   *         "reqSigs" : n,  (numeric) The required sigs
   *         "type" : "str", (string) The type, eg 'pubkeyhash'
   *         "addresses" : [ (json array)
   *           "str",        (string) umkoin address
   *           ...
   *         ]
   *       }
   *     },
   *     ...
   *   ],
   *   "blockhash" : "hex",  (string) the block hash
   *   "confirmations" : n,  (numeric) The confirmations
   *   "blocktime" : xxx,    (numeric) The block time expressed in UNIX epoch
   *                         time
   *   "time" : n            (numeric) Same as "blocktime"
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getrawtransaction($txid, $verbose = false, $blockhash = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid", $verbose ];
    if (!empty($blockhash))
      array_push($args[ "params" ], $blockhash);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * joinpsbts ["psbt",...]
   *
   * Joins multiple distinct PSBTs with different inputs and outputs into one
   * PSBT with inputs and outputs from all of the PSBTs No input in any of the
   * PSBTs can be in more than one of the PSBTs.
   *
   * Arguments:
   *  1. txs        (json array, required) The base64 strings of partially
   *                signed transactions
   *     [
   *       "psbt",  (string, required) A base64 string of a PSBT
   *       ...
   *     ]
   *
   * Result:
   *  "str"         (string) The base64-encoded partially signed transaction
   *
   * (0.21.1 RPC)
   *
   */
  public function joinpsbt($txs) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $txs ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * sendrawtransaction "hexstring" ( maxfeerate )
   *
   * Submit a raw transaction (serialized, hex-encoded) to local node and
   * network.
   *
   * Note that the transaction will be sent unconditionally to all peers, so
   * using this for manual rebroadcast may degrade privacy by leaking the
   * transaction's origin, as nodes will normally not rebroadcast non-wallet
   * transactions already in their mempool. Also see createrawtransaction and
   * signrawtransactionwithkey calls.
   *
   * Arguments:
   *  1. hexstring   (string, required) The hex string of the raw transaction
   *  2. maxfeerate  (numeric or string, optional, default=0.10) Reject
   *                 transactions whose fee rate is higher than the specified
   *                 value, expressed in UMK/kB. Set to 0 to accept any fee
   *                 rate.
   *
   * Result:
   *  "hex"          (string) The transaction hash in hex
   *
   * (0.21.1 RPC)
   *
   */
  public function sendrawtransaction($hexstring, $maxfeerate = 0.10) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring", $maxfeerate ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * signrawtransactionwithkey "hexstring" ["privatekey",...]
   *   ( [{"txid":"hex","vout":n,"scriptPubKey":"hex","redeemScript":"hex","witnessScript":"hex","amount":amount},...]
   *     "sighashtype" )
   *
   * Sign inputs for raw transaction (serialized, hex-encoded). The second
   * argument is an array of base58-encoded private keys that will be the only
   * keys used to sign the transaction. The third optional argument (may be
   * null) is an array of previous transaction outputs that this transaction
   * depends on but may not yet be in the block chain.
   *
   * Arguments:
   *  1. hexstring         (string, required) The transaction hex string
   *  2. privkeys          (json array, required) The base58-encoded private
   *                       keys for signing
   *      [
   *        "privatekey",  (string) private key in base58-encoding
   *        ...
   *      ]
   *  3. prevtxs           (json array, optional) The previous dependent
   *                       transaction outputs
   *      [
   *        {                    (json object)
   *          "txid": "hex",     (string, required) The transaction id
   *          "vout": n,         (numeric, required) The output number
   *          "scriptPubKey": "hex",  (string, required) script key
   *          "redeemScript": "hex",  (string) (required for P2SH) redeem script
   *          "witnessScript": "hex", (string) (required for P2WSH or P2SH-P2WSH)
   *                                  witness script
   *          "amount": amount,  (numeric or string) (required for Segwit inputs)
   *                             the amount spent
   *        },
   *        ...
   *      ]
   *  4. sighashtype       (string, optional, default=ALL) The signature hash
   *                       type. Must be one of:
   *                          "ALL"
   *                          "NONE"
   *                          "SINGLE"
   *                          "ALL|ANYONECANPAY"
   *                          "NONE|ANYONECANPAY"
   *                          "SINGLE|ANYONECANPAY"
   *
   * Result:
   *  {                    (json object)
   *   "hex" : "hex",      (string) The hex-encoded raw transaction with
   *                       signature(s)
   *   "complete" : true|false,  (boolean) If the transaction has a complete set
   *                             of signatures
   *   "errors" : [        (json array, optional) Script verification errors (if
   *                       there are any)
   *     {                 (json object)
   *       "txid" : "hex", (string) The hash of the referenced, previous
   *                       transaction
   *       "vout" : n,     (numeric) The index of the output to spent and used
   *                       as input
   *       "scriptSig" : "hex",  (string) The hex-encoded signature script
   *       "sequence" : n, (numeric) Script sequence number
   *       "error" : "str" (string) Verification or signing error related to the input
   *     },
   *     ...
   *   ]
   * }
   *
   * (0.21.1 RPC)
   *
   */
  public function signrawtransactionwithkey($hexstring, $privkeys, $prevtxs = [], $sighashtype = "ALL") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring", $privkeys, $prevtxs, "$sighashtype" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * testmempoolaccept ["rawtx",...] ( maxfeerate )
   *
   * Returns result of mempool acceptance tests indicating if raw transaction
   * (serialized, hex-encoded) would be accepted by mempool.
   *
   * This checks if the transaction violates the consensus or policy rules. See
   * sendrawtransaction call.
   *
   * Arguments:
   *  1. rawtxs      (json array, required) An array of hex strings of raw
   *                 transactions. Length must be one for now.
   *     [
   *       "rawtx",  (string)
   *       ...
   *     ]
   *  2. maxfeerate  (numeric or string, optional, default=0.10) Reject
   *                 transactions whose fee rate is higher than the specified
   *                 value, expressed in UMK/kB
   *
   * Result:
   *  [              (json array) The result of the mempool acceptance test for
   *                 each raw transaction in the input array. Length is exactly
   *                 one for now.
   *    {            (json object)
   *      "txid" : "hex",   (string) The transaction hash in hex
   *      "allowed" : true|false,  (boolean) If the mempool allows this tx to
   *                               be inserted
   *      "vsize" : n,      (numeric) Virtual transaction size as defined in
   *                        BIP 141. This is different from actual serialized
   *                        size for witness transactions as witness data is
   *                        discounted (only present when 'allowed' is true)
   *      "fees" : {        (json object) Transaction fees (only present if
   *                        'allowed' is true)
   *        "base" : n      (numeric) transaction fee in UMK
   *      },
   *      "reject-reason" : "str"  (string) Rejection string (only present when
   *                               'allowed' is false)
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function tetsmempoolaccept($rawtxs, $maxfeerate = 0.10) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $rawtxs, $maxfeerate ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * utxoupdatepsbt "psbt" ( ["",{"desc":"str","range":n or [n,n]},...] )
   *
   * Updates all segwit inputs and outputs in a PSBT with data from output
   * descriptors, the UTXO set or the mempool.
   *
   * Arguments:
   *  1. psbt           (string, required) A base64 string of a PSBT
   *  2. descriptors    (json array, optional) An array of either strings or
   *                    objects
   *     [
   *       "",          (string) An output descriptor
   *       {            (json object) An object with an output descriptor and
   *                    extra information
   *         "desc": "str",        (string, required) An output descriptor
   *         "range": n or [n,n],  (numeric or array, optional, default=1000)
   *                     Up to what index HD chains should be explored (either
   *                     end or [begin,end])
   *       },
   *       ...
   *     ]
   *
   * Result:
   *  "str"         (string) The base64-encoded partially signed transaction
   *                with inputs updated
   *
   * (0.21.1 RPC)
   *
   */
  public function utxoupdatepsbt($psbt, $descriptors = []) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$psbt" ];
    if (!empty($descriptors))
      array_push($args[ "params" ], $descriptors);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //                UTIL                //
  ////////////////////////////////////////


  /*
   * createmultisig nrequired ["key",...] ( "address_type" )
   *
   * Creates a multi-signature address with n signature of m keys required. It
   * returns a json object with the address and redeemScript.
   *
   * Arguments:
   *  1. nrequired     (numeric, required) The number of required signatures out
   *                   of the n keys.
   *  2. keys          (json array, required) The hex-encoded public keys.
   *     [
   *       "key",      (string) The hex-encoded public key
   *       ...
   *     ]
   *  3. address_type  (string, optional, default=legacy) The address type to
   *                   use. Options are "legacy", "p2sh-segwit", and "bech32".
   *
   * Result:
   * {                         (json object)
   *  "address" : "str",       (string) The value of the new multisig address.
   *  "redeemScript" : "hex",  (string) The string value of the hex-encoded
   *                           redemption script.
   *  "descriptor" : "str"     (string) The descriptor for this multisig
   * }
   *
   * (0.21.1 RPC)
   *
   */
  public function createmultisig($nrequired, $keys = [], $address_type = "legacy") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $nrequired, $keys, "$address_type" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * deriveaddresses "descriptor" ( range )
   *
   * Derives one or more addresses corresponding to an output descriptor.
   * Examples of output descriptors are:
   *    pkh(<pubkey>)                        P2PKH outputs for the given pubkey
   *    wpkh(<pubkey>)                       Native segwit P2PKH outputs for the
   *                                         given pubkey
   *    sh(multi(<n>,<pubkey>,<pubkey>,...)) P2SH-multisig outputs for the given
   *                                         threshold and pubkeys
   *    raw(<hex script>)                    Outputs whose scriptPubKey equals
   *                                         the specified hex scripts
   *
   * In the above, <pubkey> either refers to a fixed public key in hexadecimal
   * notation, or to an xpub/xprv optionally followed by one or more path
   * elements separated by "/", where "h" represents a hardened child key. For
   * more information on output descriptors, see the documentation in the
   * doc/descriptors.md file.
   *
   * Arguments:
   *  1. descriptor  (string, required) The descriptor.
   *  2. range       (numeric or array, optional) If a ranged descriptor is
   *                 used, this specifies the end or the range (in [begin,end]
   *                 notation) to derive.
   *
   * Result:
   *  [              (json array)
   *    "str",       (string) the derived addresses
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function deriveaddresses($descriptor, $range = 0) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$descriptor" ];
    if (!empty($range))
      array_push($args[ "params" ], $range);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * estimatesmartfee conf_target ("estimate_mode")
   *
   * Estimates the approximate fee per kilobyte needed for a transaction to
   * begin confirmation within conf_target blocks if possible and return the
   * number of blocks for which the estimate is valid. Uses virtual
   * transaction size as defined in BIP 141 (witness data is discounted).
   *
   * Arguments:
   *  1. conf_target     (numeric) Confirmation target in blocks (1 - 1008)
   *  2. estimate_mode   (string, optional, default=CONSERVATIVE) The fee
   *               estimate mode. Whether to return a more conservative
   *               estimate which also satisfies a longer history. A
   *               conservative estimate potentially returns a higher feerate
   *               and is more likely to be sufficient for the desired target,
   *               but is not as responsive to short term drops in the
   *               prevailing fee market.  Must be one of:
   *   "UNSET" (defaults to CONSERVATIVE)
   *   "ECONOMICAL"
   *   "CONSERVATIVE"
   *
   * Result:
   *  {
   *   "feerate" : x.x,     (numeric, optional) estimate fee rate in UMK/kB
   *   "errors": [ str... ] (json array of strings, optional) Errors encountered
   *                        during processing
   *   "blocks" : n         (numeric) block number where estimate was found
   *  }
   *
   * The request target will be clamped between 2 and the highest target
   * fee estimation is able to return based on how long it has been running.
   * An error is returned if not enough transactions and blocks
   * have been observed to make an estimate for any number of blocks.
   *
   */
  public function estimatesmartfee($conf_target, $estimate_mode = "CONSERVATIVE") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [$conf_target, "$estimate_mode"];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getdescriptorinfo "descriptor"
   *
   * Analyses a descriptor.
   *
   * Arguments:
   *  1. descriptor    (string, required) The descriptor.
   *
   * Result:
   *  {                               (json object)
   *   "descriptor" : "str",          (string) The descriptor in canonical form,
   *                                  without private keys
   *   "checksum" : "str",            (string) The checksum for the input
   *                                  descriptor
   *   "isrange" : true|false,        (boolean) Whether the descriptor is ranged
   *   "issolvable" : true|false,     (boolean) Whether the descriptor is
   *                                  solvable
   *   "hasprivatekeys" : true|false  (boolean) Whether the input descriptor
   *                                  contained at least one private key
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getdescriptorinfo($descriptor) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$descriptor" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getindexinfo ( "index_name" )
   *
   * Returns the status of one or all available indices currently running in
   * the node.
   *
   * Arguments:
   *  1. index_name    (string, optional) Filter results for an index with a
   *                   specific name.
   *
   * Result:
   *  {                            (json object)
   *    "name" : {                 (json object) The name of the index
   *      "synced" : true|false,   (boolean) Whether the index is synced or not
   *      "best_block_height" : n  (numeric) The block height to which the index
   *                               is synced
   *    }
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getindexinfo($index_name = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (!empty($index_name))
      $args[ "params" ] = [ "$index_name" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * signmessagewithprivkey "privkey" "message"
   *
   * Sign a message with the private key of an address
   *
   * Arguments:
   *  1. privkey   (string, required) The private key to sign the message with.
   *  2. message   (string, required) The message to create a signature of.
   *
   * Result:
   *  "str"        (string) The signature of the message encoded in base 64
   *
   * (0.21.1 RPC)
   *
   */
  public function signmessagewithprivkey($privkey, $message) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$privkey", "$message" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * validateaddress "address"
   *
   * Return information about the given umkoin address.
   *
   * Arguments:
   *  1. "address"     (string, required) The umkoin address to validate
   *
   * Result:
   *  {                           (json object)
   *    "isvalid" : true|false,   (boolean) If the address is valid or not. If
   *                              not, this is the only property returned.
   *    "address" : "str",        (string) The umkoin address validated
   *    "scriptPubKey" : "hex",   (string) The hex-encoded scriptPubKey
   *                              generated by the address
   *    "isscript" : true|false,  (boolean) If the key is a script
   *    "iswitness" : true|false, (boolean) If the address is a witness address
   *    "witness_version" : n,    (numeric, optional) The version number of the
   *                              witness program
   *    "witness_program" : "hex" (string, optional) The hex value of the
   *                              witness program
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function validateaddress($address) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * verifymessage "address" "signature" "message"
   *
   * Verify a signed message.
   *
   * Arguments:
   *  1. address     (string, required) The umkoin address to use for the
   *                 signature.
   *  2. signature   (string, required) The signature provided by the
   *                 signer in base 64 encoding (see signmessage).
   *  3. message     (string, required) The message that was signed.
   *
   * Result:
   *  true|false     (boolean) If the signature is verified or not.
   *
   * (0.21.1 RPC)
   *
   */
  public function verifymessage($address, $signature, $message) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", "$signature", "$message" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //               WALLET               //
  ////////////////////////////////////////


  /*
   * abandontransaction "txid"
   *
   * Mark in-wallet transaction <txid> as abandoned. This will mark this
   * transaction and all its in-wallet descendants as abandoned which will allow
   * for their inputs to be respent. It can be used to replace "stuck" or
   * evicted transactions. It only works on transactions which are not included
   * in a block and are not currently in the mempool. It has no effect on
   * transactions which are already conflicted or abandoned.
   *
   * Arguments:
   *  1. "txid"     (string, required) The transaction id
   *
   * Result:
   *  None
   *
   * (0.21.1 RPC)
   *
   */
  public function abandontransaction($txid) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * abortrescan
   *
   * Stops current wallet rescan triggered by an RPC call, e.g. by an
   * importprivkey call. Note: Use "getwalletinfo" to query the scanning
   * progress.
   *
   * Result:
   *  true|false    (boolean) Whether the abort was successful
   *
   * (0.21.1 RPC)
   *
   */
  public function abortrescan() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * addmultisigaddress nrequired ["key",...] ( "label" "address_type" )
   *
   * Add an nrequired-to-sign multisignature address to the wallet. Requires a
   * new wallet backup. Each key is a umkoin address or hex-encoded public key.
   * This functionality is only intended for use with non-watchonly addresses.
   * See `importaddress` for watchonly p2sh address support. If 'label' is
   * specified, assign address to that label.
   *
   * Arguments:
   *  1. nrequired       (numeric, required) The number of required signatures
   *                     out of the n keys or addresses.
   *  2. keys            (json array, required) The umkoin addresses or
   *                     hex-encoded public keys
   *     [
   *       "key",        (string) umkoin address or hex-encoded public key
   *       ...
   *     ]
   *  3. label           (string, optional) A label to assign the addresses to.
   *  4. address_type    (string, optional, default=set by -addresstype) The
   *                     address type to use. Options are:
   *                        "legacy",
   *                        "p2sh-segwit",
   *                        "bech32".
   *
   * Result:
   *  {                          (json object)
   *    "address" : "str",       (string) The value of the new multisig address
   *    "redeemScript" : "hex",  (string) The string value of the hex-encoded
   *                             redemption script
   *    "descriptor" : "str"     (string) The descriptor for this multisig
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function addmultisigaddress($nrequired, $key, $label = "", $address_type = "bech32") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $nrequired, $key, "$label", "$address_type" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * backupwallet "destination"
   *
   * Safely copies current wallet file to destination, which can be a directory
   * or a path with filename.
   *
   * Arguments:
   *  1. destination  (string, required) The destination directory or file
   *
   * Result:
   *  null            (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function backupwallet($destination) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$destination" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * bumpfee "txid" ( options )
   *
   * Bumps the fee of an opt-in-RBF transaction T, replacing it with a new
   * transaction B. An opt-in RBF transaction with the given txid must be in the
   * wallet. The command will pay the additional fee by reducing change outputs
   * or adding inputs when necessary. It may add a new change output if one does
   * not already exist. All inputs in the original transaction will be included
   * in the replacement transaction. The command will fail if the wallet or
   * mempool contains a transaction that spends one of T's outputs. By default,
   * the new fee will be calculated automatically using the estimatesmartfee
   * RPC. The user can specify a confirmation target for estimatesmartfee.
   * Alternatively, the user can specify a fee rate in sat/vB for the new
   * transaction. At a minimum, the new fee rate must be high enough to pay an
   * additional new relay fee (incrementalfee returned by getnetworkinfo) to
   * enter the node's mempool.
   *
   * WARNING: before version 0.21, fee_rate was in UMK/kvB.
   *          As of 0.21, fee_rate is in sat/vB.
   *
   * Arguments:
   *  1. txid       (string, required) The txid to be bumped
   *  2. options    (json object, optional)
   *     {
   *       "conf_target": n,       (numeric, optional, default=wallet
   *                               -txconfirmtarget) Confirmation target in
   *                               blocks
   *       "fee_rate": amount,     (numeric or string, optional, default=not
   *                               set, fall back to wallet fee estimation)
   *                               Specify a fee rate in sat/vB instead of
   *                               relying on the built-in fee estimator. Must
   *                               be at least 1.000 sat/vB higher than the
   *                               current transaction fee rate.
   *                               WARNING: before version 0.21, fee_rate was in
   *                               UMK/kvB. As of 0.21, fee_rate is in sat/vB.
   *       "replaceable": bool,    (boolean, optional, default=true) Whether the
   *                               new transaction should still be marked BIP 125
   *                               replaceable. If true, the sequence numbers in
   *                               the transaction will be left unchanged from
   *                               the original. If false, any input sequence
   *                               numbers in the original transaction that were
   *                               less than 0xfffffffe will be increased to
   *                               0xfffffffe so the new transaction will not be
   *                               explicitly bip-125 replaceable (though it may
   *                               still be replaceable in practice, for example
   *                               if it has unconfirmed ancestors which are
   *                               replaceable).
   *       "estimate_mode": "str", (string, optional, default=unset) The fee
   *                               estimate mode, must be one of (case
   *                               insensitive):
   *                                  "unset"
   *                                  "economical"
   *                                  "conservative"
   *     }
   *
   * Result:
   *  {                  (json object)
   *    "psbt" : "str",  (string) The base64-encoded unsigned PSBT of the new
   *                     transaction. Only returned when wallet private keys are
   *                     disabled. (DEPRECATED)
   *    "txid" : "hex",  (string) The id of the new transaction. Only returned
   *                     when wallet private keys are enabled.
   *    "origfee" : n,   (numeric) The fee of the replaced transaction.
   *    "fee" : n,       (numeric) The fee of the new transaction.
   *    "errors" : [     (json array) Errors encountered during processing (may
   *                     be empty).
   *      "str",         (string)
   *      ...
   *    ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function bumpfee($txid, $options = null) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid" ];
    if (!is_null($options))
      array_push($args[ "params" ], $options);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * createwallet "wallet_name" ( disable_private_keys blank "passphrase" avoid_reuse descriptors load_on_startup )
   *
   * Creates and loads a new wallet.
   *
   * Arguments:
   *  1. wallet_name          (string, required) The name for the new wallet. If
   *                          this is a path, the wallet will be created at the
   *                          path location.
   *  2. disable_private_keys (boolean, optional, default=false) Disable the
   *                          possibility of private keys (only watchonlys are
   *                          possible in this mode).
   *  3. blank                (boolean, optional, default=false) Create a blank
   *                          wallet. A blank wallet has no keys or HD seed. One
   *                          can be set using sethdseed.
   *  4. passphrase           (string) Encrypt the wallet with this passphrase.
   *  5. avoid_reuse          (boolean, optional, default=false) Keep track of
   *                          coin reuse, and treat dirty and clean coins
   *                          differently with privacy considerations in mind.
   *  6. descriptors          (boolean, optional, default=false) Create a native
   *                          descriptor wallet. The wallet will use descriptors
   *                          internally to handle address creation
   *  7. load_on_startup      (boolean, optional, default=null) Save wallet name
   *                          to persistent settings and load on startup. True
   *                          to add wallet to startup list, false to remove,
   *                          null to leave unchanged.
   *
   * Result:
   *  {                       (json object)
   *    "name" : "str",       (string) The wallet name if created successfully.
   *                          If the wallet was created using a full path, the
   *                          wallet_name will be the full path.
   *    "warning" : "str"     (string) Warning message if wallet was not loaded
   *                          cleanly.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function createwallet($wallet_name, $disable_private_keys = false, $blank = false, $passphrase = "", $avoid_reuse = false, $descriptors = false, $load_on_startup = null) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$wallet_name", $disable_private_keys, $blank, "$passphrase", $avoid_reuse, $descriptors, $load_on_startup ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * dumpprivkey "address"
   *
   * Reveals the private key corresponding to 'address'. Then the importprivkey
   * can be used with this output
   *
   * Arguments:
   *  1. "address"   (string, required) The umkoin address for the private key
   *
   * Result:
   *  "str"          (string) The private key
   *
   * (0.21.1 RPC)
   *
   */
  public function dumpprivkey($address) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * dumpwallet "filename"
   *
   * Dumps all wallet keys in a human-readable format to a server-side file.
   * This does not allow overwriting existing files. Imported scripts are
   * included in the dumpfile, but corresponding BIP173 addresses, etc. may not
   * be added automatically by importwallet. Note that if your wallet contains
   * keys which are not derived from your HD seed (e.g. imported keys), these
   * are not covered by only backing up the seed itself, and must be backed up
   * too (e.g. ensure you back up the whole dumpfile).
   *
   * Arguments:
   *  1. filename    (string, required) The filename with path (absolute path
   *                 recommended)
   *
   * Result:
   *  {                     (json object)
   *    "filename" : "str"  (string) The filename with full absolute path
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function dumpwallet($filename) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$filename" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * encryptwallet "passphrase"
   *
   * Encrypts the wallet with 'passphrase'. This is for first time encryption.
   * After this, any calls that interact with private keys such as sending or
   * signing  will require the passphrase to be set prior the making these
   * calls. Use the walletpassphrase call for this, and then walletlock call.
   * If the wallet is already encrypted, use the walletpassphrasechange call.
   *
   * Arguments:
   *  1. passphrase (string, required) The pass phrase to encrypt the wallet
   *                with. It must be at least 1 character, but should be
   *                long.
   *
   * Result:
   *  "str"         (string) A string with further instructions
   *
   * (0.21.1 RPC)
   *
   */
  public function encryptwallet($passphrase) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$passphrase" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getaddressesbylabel "label"
   *
   * Returns the list of addresses assigned the specified label.
   *
   * Arguments:
   *  1. label    (string, required) The label.
   *
   * Result:
   *  {                      (json object) json object with addresses as keys
   *    "address" : {        (json object) json object with information about
   *                         address
   *      "purpose" : "str"  (string) Purpose of address ("send" for sending
   *                         address, "receive" for receiving address)
   *    },
   *    ...
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getaddressesbylabel($label) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$label" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getaddressinfo "address"
   *
   * Return information about the given umkoin address. Some of the information
   * will only be present if the address is in the active wallet.
   *
   * Arguments:
   *  1. address    (string, required) The umkoin address for which to get
   *                information.
   *
   * Result:
   *  {                             (json object)
   *    "address" : "str",          (string) The umkoin address validated.
   *    "scriptPubKey" : "hex",     (string) The hex-encoded scriptPubKey
   *                                generated by the address.
   *    "ismine" : true|false,      (boolean) If the address is yours.
   *    "iswatchonly" : true|false, (boolean) If the address is watchonly.
   *    "solvable" : true|false,    (boolean) If we know how to spend coins sent
   *                                to this address, ignoring the possible lack
   *                                of private keys.
   *    "desc" : "str",             (string, optional) A descriptor for spending
   *                                coins sent to this address (only when
   *                                solvable).
   *    "isscript" : true|false,    (boolean) If the key is a script.
   *    "ischange" : true|false,    (boolean) If the address was used for change
   *                                output.
   *    "iswitness" : true|false,   (boolean) If the address is a witness
   *                                address.
   *    "witness_version" : n,      (numeric, optional) The version number of
   *                                the witness program.
   *    "witness_program" : "hex",  (string, optional) The hex value of the
   *                                witness program.
   *    "script" : "str",           (string, optional) The output script type.
   *                                Only if isscript is true and the
   *                                redeemscript is known. Possible types:
   *                                   nonstandard
   *                                   pubkey
   *                                   pubkeyhash
   *                                   scripthash
   *                                   multisig
   *                                   nulldata
   *                                   witness_v0_keyhash
   *                                   witness_v0_scripthash
   *                                   witness_unknown
   *    "hex" : "hex",              (string, optional) The redeemscript for the
   *                                p2sh address.
   *    "pubkeys" : [               (json array, optional) Array of pubkeys
   *                                associated with the known redeemscript (only
   *                                if script is multisig).
   *      "str",                    (string)
   *      ...
   *    ],
   *    "sigsrequired" : n,         (numeric, optional) The number of signatures
   *                                required to spend multisig output (only if
   *                                script is multisig).
   *    "pubkey" : "hex",           (string, optional) The hex value of the raw
   *                                public key for single-key addresses
   *                                (possibly embedded in P2SH or P2WSH).
   *    "embedded" : {              (json object, optional) Information about
   *                                the address embedded in P2SH or P2WSH, if
   *                                relevant and known.
   *      ...                       Includes all getaddressinfo output fields
   *                                for the embedded address, excluding metadata
   *                                (timestamp, hdkeypath, hdseedid)
   *                                and relation to the wallet (ismine,
   *                                iswatchonly).
   *    },
   *    "iscompressed" : true|false, (boolean, optional) If the pubkey is
   *                                compressed.
   *    "timestamp" : xxx,          (numeric, optional) The creation time of the
   *                                key, if available, expressed in UNIX epoch
   *                                time.
   *    "hdkeypath" : "str",        (string, optional) The HD keypath, if the
   *                                key is HD and available.
   *    "hdseedid" : "hex",         (string, optional) The Hash160 of the HD
   *                                seed.
   *    "hdmasterfingerprint" : "hex", (string, optional) The fingerprint of the
   *                                master key.
   *    "labels" : [                (json array) Array of labels associated with
   *                                the address. Currently limited to one label
   *                                but returned as an array to keep the API
   *                                stable if multiple labels are enabled in the
   *                                future.
   *      "str",                    (string) Label name (defaults to "").
   *      ...
   *    ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getaddressinfo($address) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getbalance ( "dummy" minconf include_watchonly avoid_reuse )
   *
   * Returns the total available balance. The available balance is what the
   * wallet considers currently spendable, and is thus affected by options
   * which limit spendability such as -spendzeroconfchange.
   *
   * Arguments:
   *  1. dummy              (string, optional) Remains for backward
   *                        compatibility. Must be excluded or set to "*".
   *  2. minconf            (numeric, optional, default=0) Only include
   *                        transactions confirmed at least this many times.
   *  3. include_watchonly  (boolean, optional, default=true for watch-only
   *                        wallets, otherwise false) Also include balance in
   *                        watch-only addresses (see 'importaddress')
   *  4. avoid_reuse        (boolean, optional, default=true) (only available
   *                        if avoid_reuse wallet flag is set) Do not include
   *                        balance in dirty outputs; addresses are considered
   *                        dirty if they have previously been used in a
   *                        transaction.
   *
   * Result:
   *  n             (numeric) The total amount in UMK received for this wallet.
   *
   * (0.21.1 RPC)
   *
   */
  public function getbalance($dummy = "*", $minconf = 0, $include_watchonly = false, $avoid_reuse = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$dummy", $minconf, $include_watchonly, $avoid_reuse ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getbalances
   *
   * Returns an object with all balances in UMK.
   *
   * Result:
   *  {                             (json object)
   *    "mine" : {                  (json object) balances from outputs that
   *                                the wallet can sign
   *      "trusted" : n,            (numeric) trusted balance (outputs created
   *                                by the wallet or confirmed outputs)
   *      "untrusted_pending" : n,  (numeric) untrusted pending balance (outputs
   *                                created by others that are in the mempool)
   *      "immature" : n,           (numeric) balance from immature coinbase
   *                                outputs
   *      "used" : n                (numeric) (only present if avoid_reuse is
   *                                set) balance from coins sent to addresses
   *                                that were previously spent from (potentially
   *                                privacy violating)
   *    },
   *    "watchonly" : {             (json object) watchonly balances (not
   *                                present if wallet does not watch anything)
   *      "trusted" : n,            (numeric) trusted balance (outputs created
   *                                by the wallet or confirmed outputs)
   *      "untrusted_pending" : n,  (numeric) untrusted pending balance (outputs
   *                                created by others that are in the mempool)
   *      "immature" : n            (numeric) balance from immature coinbase
   *                                outputs
   *    }
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getbalances() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getnewaddress ( "label" "address_type" )
   *
   * Returns a new Umkoin address for receiving payments. If 'label' is
   * specified, it is added to the address book so payments received with the
   * address will be associated with 'label'.
   *
   * Arguments:
   *  1. label         (string, optional) The label name for the address to be
   *                   linked to. If not provided, the default label "" is
   *                   used. It can also be set to the empty string "" to
   *                   represent the default label. The label does not need to
   *                   exist, it will be created if there is o label by the
   *                   given name.
   *  2. address_type  (string, optional) The address type to use. Options are
   *                   "legacy", "p2sh-segwit", and "bech32". Default is set
   *                   by -addresstype.
   *
   * Result:
   *  "address"        (string) The new umkoin address.
   *
   * (0.21.1 RPC)
   *
   */
  public function getnewaddress($label = "", $address_type = "bech32") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$label", "$address_type" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getrawchangeaddress ( "address_type" )
   *
   * Returns a new umkoin address, for receiving change. This is for use with
   * raw transactions, NOT normal use.
   *
   * Arguments:
   *  1. address_type  (string, optional) The address type to use. Options are
   *                   "legacy", "p2sh-segwit", and "bech32". Default is set
   *                   by -addresstype.
   *
   * Result:
   *  "address"        (string) The new address.
   *
   * (0.21.1 RPC)
   *
   */
  public function getrawchangeaddress($address_type = "bech32") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address_type" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getreceivedbyaddress "address" ( minconf )
   *
   * Returns the total amount received by the given address in transactions with
   * at least minconf confirmations.
   *
   * Arguments:
   *  1. address    (string, required) The umkoin address for transactions.
   *  2. minconf    (numeric, optional, default=1) Only include transactions
   *                confirmed at least this many times.
   *
   * Result:
   *  n             (numeric) The total amount in UMK received at this address.
   *
   * (0.21.1 RPC)
   *
   */
  public function getreceivedbyaddress($address, $minconf = 1) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", $minconf ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getreceivedbylabel "label" ( minconf )
   *
   * Returns the total amount received by addresses with <label> in transactions
   * with at least [minconf] confirmations.
   *
   * Arguments:
   *  1. label      (string, required) The selected label, may be the default
   *                label using "".
   *  2. minconf    (numeric, optional, default=1) Only include transactions
   *                confirmed at least this many times.
   *
   * Result:
   *  n             (numeric) The total amount in UMK received for this label.
   *
   * (0.21.1 RPC)
   *
   */
  public function getreceivedbylabel($label = "", $minconf = 1) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$label", $minconf ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * gettransaction "txid" ( include_watchonly verbose )
   *
   * Get detailed information about in-wallet transaction <txid>
   *
   * Arguments:
   *  1. txid               (string, required) The transaction id
   *  2. include_watchonly  (boolean, optional, default=true for watch-only
   *                        wallets, otherwise false) Whether to include
   *                        watch-only addresses in balance calculation and
   *                        details[]
   *  3. verbose            (boolean, optional, default=false) Whether to
   *                        include a `decoded` field containing the decoded
   *                        transaction (equivalent to RPC
   *                        decoderawtransaction)
   *
   * Result:
   *  {                     (json object)
   *    "amount" : n,       (numeric) The amount in UMK
   *    "fee" : n,          (numeric) The amount of the fee in UMK. This is
   *                        negative and only available for the 'send' category
   *                        of transactions.
   *    "confirmations" : n,  (numeric) The number of confirmations for the
   *                        transaction. Negative confirmations means the
   *                        transaction conflicted that many blocks ago.
   *    "generated" : true|false,  (boolean) Only present if transaction only
   *                        input is a coinbase one.
   *    "trusted" : true|false,   (boolean) Only present if we consider
   *                        transaction to be trusted and so safe to spend
   *                        from.
   *    "blockhash" : "hex",  (string) The block hash containing the
   *                        transaction.
   *    "blockheight" : n,  (numeric) The block height containing the
   *                        transaction.
   *    "blockindex" : n,   (numeric) The index of the transaction in the block
   *                        that includes it.
   *    "blocktime" : xxx,  (numeric) The block time expressed in UNIX epoch
   *                        time.
   *    "txid" : "hex",     (string) The transaction id.
   *    "walletconflicts" : [  (json array) Conflicting transaction ids.
   *      "hex",            (string) The transaction id.
   *      ...
   *    ],
   *    "time" : xxx,       (numeric) The transaction time expressed in UNIX
   *                        epoch time.
   *    "timereceived" : xxx,  (numeric) The time received expressed in UNIX
   *                        epoch time.
   *    "comment" : "str",  (string) If a comment is associated with the
   *                        transaction, only present if not empty.
   *    "bip125-replaceable" : "str",  (string) ("yes|no|unknown") Whether this
   *                        transaction could be replaced due to BIP125
   *                        (replace-by-fee); may be unknown for unconfirmed
   *                        transactions not in the mempool
   *    "details" : [       (json array)
   *      {                 (json object)
   *        "involvesWatchonly" : true|false,  (boolean) Only returns true if
   *                        imported addresses were involved in transaction.
   *        "address" : "str",  (string) The umkoin address involved in the
   *                        transaction.
   *        "category" : "str",  (string) The transaction category.
   *                           "send"      Transactions sent.
   *                           "receive"   Non-coinbase transactions received.
   *                           "generate"  Coinbase transactions received with
   *                                       more than 100 confirmations.
   *                           "immature"  Coinbase transactions received with
   *                                       100 or fewer confirmations.
   *                           "orphan"    Orphaned coinbase transactions
   *                                       received.
   *        "amount" : n,  (numeric) The amount in UMK
   *        "label" : "str",   (string) A comment for the address/transaction,
   *                       if any
   *        "vout" : n,    (numeric) the vout value
   *        "fee" : n,     (numeric) The amount of the fee in UMK. This is
   *                       negative and only available for the 'send' category
   *                       of transactions.
   *        "abandoned" : true|false  (boolean) 'true' if the transaction has
   *                       been abandoned (inputs are respendable). Only
   *                       available for the 'send' category of transactions.
   *      },
   *      ...
   *    ],
   *    "hex" : "hex",     (string) Raw data for transaction
   *    "decoded" : {      (json object) Optional, the decoded transaction
   *                       (only present when `verbose` is passed)
   *      ...              Equivalent to the RPC decoderawtransaction method, or
   *                       the RPC getrawtransaction method when `verbose` is
   *                       passed.
   *    }
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function gettransaction($txid, $include_watchonly = false, $verbose = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid", $include_watchonly, $verbose ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * getwalletinfo
   *
   * Returns an object containing various wallet state info.
   *
   * Result:
   *  {                       (json object)
   *    "walletname" : "str", (string) the wallet name
   *    "walletversion" : n,  (numeric) the wallet version
   *    "format" : "str",     (string) the database format (bdb or sqlite)
   *    "balance" : n,        (numeric) DEPRECATED. Identical to
   *                          getbalances().mine.trusted
   *    "unconfirmed_balance" : n,  (numeric) DEPRECATED. Identical to
   *                          getbalances().mine.untrusted_pending
   *    "immature_balance" : n,  (numeric) DEPRECATED. Identical to
   *                          getbalances().mine.immature
   *    "txcount" : n,        (numeric) the total number of transactions in the
   *                          wallet
   *    "keypoololdest" : xxx,  (numeric) the UNIX epoch time of the oldest
   *                          pre-generated key in the key pool. Legacy wallets
   *                          only.
   *    "keypoolsize" : n,    (numeric) how many new keys are pre-generated
   *                          (only counts external keys)
   *    "keypoolsize_hd_internal" : n,  (numeric) how many new keys are
   *                          pre-generated for internal use (used for change
   *                          outputs, only appears if the wallet is using this
   *                          feature, otherwise external keys are used)
   *    "unlocked_until" : xxx,  (numeric, optional) the UNIX epoch time until
   *                          which the wallet is unlocked for transfers, or 0
   *                          if the wallet is locked (only present for
   *                          passphrase-encrypted wallets)
   *    "paytxfee" : n,       (numeric) the transaction fee configuration, set
   *                          in UMK/kvB
   *    "hdseedid" : "hex",   (string, optional) the Hash160 of the HD seed
   *                          (only present when HD is enabled)
   *    "private_keys_enabled" : true|false,  (boolean) false if privatekeys are
   *                          disabled for this wallet (enforced watch-only
   *                          wallet)
   *    "avoid_reuse" : true|false,  (boolean) whether this wallet tracks
   *                          clean/dirty coins in terms of reuse
   *    "scanning" : {        (json object) current scanning details, or false
   *                          if no scan is in progress
   *      "duration" : n,     (numeric) elapsed seconds since scan start
   *      "progress" : n      (numeric) scanning progress percentage [0.0, 1.0]
   *    },
   *    "descriptors" : true|false  (boolean) whether this wallet uses
   *                          descriptors for scriptPubKey management
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function getwalletinfo() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * importaddress "address" ( "label" rescan p2sh )
   *
   * Adds an address or script (in hex) that can be watched as if it were in
   * your wallet but cannot be used to spend. Requires a new wallet backup.
   *
   * Note: This call can take over an hour to complete if rescan is true,
   * during that time, other rpc calls may report that the imported address
   * exists but related transactions are still missing, leading to temporarily
   * incorrect/bogus balances and unspent outputs until rescan completes. If
   * you have the full public key, you should call importpubkey instead of this.
   * Hint: use importmulti to import more than one address.
   *
   * Note: If you import a non-standard raw script in hex form, outputs sending
   * to it will be treated as change, and not show up in many RPCs.
   *
   * Note: Use "getwalletinfo" to query the scanning progress.
   *
   * Arguments:
   *  1. address    (string, required) The Umkoin address (or hex-encoded
   *                script)
   *  2. label      (string, optional, default = "") An optional label
   *  3. rescan     (boolean, optional, default = true) Rescan the wallet for
   *                transactions
   *  4. p2sh       (boolean, optional, default = false) Add the P2SH version
   *                of the script as well
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function importaddress($address, $label = "", $rescan = true, $p2sh = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", "$label", $rescan, $p2sh ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * importdescriptors "requests"
   *
   * Import descriptors. This will trigger a rescan of the blockchain based on
   * the earliest timestamp of all descriptors being imported. Requires a new
   * wallet backup.
   *
   * Note: This call can take over an hour to complete if using an early
   * timestamp; during that time, other rpc calls may report that the imported
   * keys, addresses or scripts exist but related transactions are still
   * missing.
   *
   * Arguments:
   *  1. requests                 (json array, required) Data to be imported
   *     [
   *       {                      (json object)
   *         "desc": "str",       (string, required) Descriptor to import.
   *         "active": bool,      (boolean, optional, default=false) Set this
   *                              descriptor to be the active descriptor for the
   *                              corresponding output type/externality
   *         "range": n or [n,n], (numeric or array) If a ranged descriptor is
   *                              used, this specifies the end or the range (in
   *                              the form [begin,end]) to import
   *         "next_index": n,     (numeric) If a ranged descriptor is set to
   *                              active, this specifies the next index to
   *                              generate addresses from
   *         "timestamp": timestamp | "now",  (integer / string, required) Time
   *                              from which to start rescanning the blockchain
   *                              for this descriptor, in UNIX epoch time. Use
   *                              the string "now" to substitute the current
   *                              synced blockchain time. "now" can be specified
   *                              to bypass scanning, for outputs which are
   *                              known to never have been used, and 0 can be
   *                              specified to scan the entire blockchain.
   *                              Blocks up to 2 hours before the earliest
   *                              timestamp of all descriptors being imported
   *                              will be scanned.
   *         "internal": bool,    (boolean, optional, default = false) Whether
   *                              matching outputs should be treated as not
   *                              incoming payments (e.g. change)
   *         "label": "str",      (string, optional, default = '') Label to
   *                              assign to the address, only allowed with
   *                              internal=false
   *       },
   *       ...
   *     ]
   *
   * Result:
   *  [                           (json array) Response is an array with the
   *                              same size as the input that has the execution
   *                              result
   *    {                         (json object)
   *      "success" : true|false, (boolean)
   *      "warnings" : [          (json array, optional)
   *        "str",                (string)
   *        ...
   *      ],
   *      "error" : {             (json object, optional)
   *        ...                   JSONRPC error
   *      }
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function importdescriptors($requests) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $requests ];

    $res = $this->call($args);
    if ($res)
       return $res[ "result" ];
  }


  /*
   * importmulti "requests" ( "options" )
   *
   * Import addresses/scripts (with private or public keys, redeem script
   * (P2SH)), optionally rescanning the blockchain from the earliest creation
   * time of the imported scripts. Requires a new wallet backup. If an
   * address/script is imported without all of the private keys required to
   * spend from that address, it will be watchonly. The 'watchonly' option must
   * be set to true in this case or a warning will be returned. Conversely, if
   * all the private keys are provided and the address/script is spendable, the
   * watchonly option must be set to false, or a warning will be returned.
   *
   * Note: This call can take over an hour to complete if rescan is true, during
   * that time, other rpc calls may report that the imported keys, addresses or
   * scripts exist but related transactions are still missing.
   *
   * Note: Use "getwalletinfo" to query the scanning progress.
   *
   * Arguments:
   *  1. requests         (json array, required) Data to be imported
   *      [
   *        {             (json object)
   *          "desc": "str",   (string) Descriptor to import. If using
   *                      descriptor, do not also provide address/scriptPubKey,
   *                      scripts, or pubkeys
   *          "scriptPubKey": "<script>" | { "address":"<address>" },
   *                      (string / json, required) Type of scriptPubKey (string
   *                      for script, json for address). Should not be provided
   *                      if using a descriptor
   *          "timestamp": timestamp | "now",  (integer / string, required)
   *                      Creation time of the key expressed in UNIX epoch time,
   *                      or the string "now" to substitute the current synced
   *                      blockchain time. The timestamp of the oldest key will
   *                      determine how far back blockchain rescans need to
   *                      begin for missing wallet transactions. "now" can be
   *                      specified to bypass scanning, for keys which are known
   *                      to never have been used, and 0 can be specified to
   *                      scan the entire blockchain. Blocks up to 2 hours
   *                      before the earliest key creation time of all keys
   *                      being imported by the importmulti call will be
   *                      scanned.
   *          "redeemscript": "str",  (string) Allowed only if the scriptPubKey
   *                      is a P2SH or P2SH-P2WSH address/scriptPubKey
   *          "witnessscript": "str",  (string) Allowed only if the scriptPubKey
   *                      is a P2SH-P2WSH or P2WSH address/scriptPubKey
   *          "pubkeys": [  (json array, optional, default=empty array) Array of
   *                      strings giving pubkeys to import. They must occur in
   *                      P2PKH or P2WPKH scripts. They are not required when
   *                      the private key is also provided (see the "keys"
   *                      argument).
   *            "pubKey",  (string)
   *            ...
   *          ],
   *          "keys": [   (json array, optional, default=empty array) Array of
   *                      strings giving private keys to import. The
   *                      corresponding public keys must occur in the output or
   *                      redeemscript.
   *            "key",    (string)
   *            ...
   *          ],
   *          "range": n or [n,n],  (numeric or array) If a ranged descriptor is
   *                      used, this specifies the end or the range (in the form
   *                      [begin,end]) to import
   *          "internal": bool, (boolean, optional, default=false) Stating
   *                      whether matching outputs should be treated as not
   *                      incoming payments (also known as change)
   *          "watchonly": bool, (boolean, optional, default=false) Stating
   *                      whether matching outputs should be considered
   *                      watchonly.
   *          "label": "str",  (string, optional, default='') Label to assign to
   *                      the address, only allowed with internal=false
   *          "keypool": bool,  (boolean, optional, default=false) Stating
   *                      whether imported public keys should be added to the
   *                      keypool for when users request new addresses. Only
   *                      allowed when wallet private keys are disabled
   *        },
   *        ...
   *      ]
   * 2. options           (json object, optional)
   *      {
   *        "rescan": bool,  (boolean, optional, default=true) Stating if should
   *                      rescan the blockchain after all imports
   *      }
   *
   * Result:
   *  [                   (json array) Response is an array with the same size
   *                      as the input that has the execution result
   *    {                 (json object)
   *      "success" : true|false,    (boolean)
   *      "warnings" : [  (json array, optional)
   *        "str",        (string)
   *        ...
   *      ],
   *      "error" : {     (json object, optional)
   *        ...           JSONRPC error
   *      }
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function importmulti($requests, $options = []) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $requests ];
    if(!empty($options))
      array_push($args[ "params" ], $options);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * importprivkey "privkey" ( "label" rescan )
   *
   * Adds a private key (as returned by dumpprivkey) to your wallet. Requires a
   * new wallet backup. Hint: use importmulti to import more than one private
   * key.
   *
   * Note: This call can take over an hour to complete if rescan is true, during
   * that time, other rpc calls may report that the imported key exists but
   * related transactions are still missing, leading to temporarily
   * incorrect/bogus balances and unspent outputs until rescan completes.
   *
   * Note: Use "getwalletinfo" to query the scanning progress.
   *
   * Arguments:
   *  1. privkey    (string, required) The private key (see dumpprivkey)
   *  2. label      (string, optional, default=current label if address exists,
   *                otherwise "") An optional label
   *  3. rescan     (boolean, optional, default=true) Rescan the wallet for
   *                transactions
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function importprivkey($privkey, $label = "", $rescan = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$privkey", "$label", $rescan ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * importprunedfunds "rawtransaction" "txoutproof"
   *
   * Imports funds without rescan. Corresponding address or script must
   * previously be included in wallet. Aimed towards pruned wallets. The
   * end-user is responsible to import additional transactions that
   * subsequently spend the imported outputs or rescan after the point in the
   * blockchain the transaction is included.
   *
   * Arguments:
   *  1. rawtransaction   (string, required) A raw transaction in hex funding
   *                      an already-existing address in wallet
   *  2. txoutproof       (string, required) The hex output from gettxoutproof
   *                      that contains the transaction
   *
   * Result:
   *  null                (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function importprunedfunds($rawtransaction, $txoutproof) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$rawtransaction", "$txoutproof" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * importpubkey "pubkey" ( "label" rescan )
   *
   * Adds a public key (in hex) that can be watched as if it were in your wallet
   * but cannot be used to spend. Requires a new wallet backup. Hint: use
   * importmulti to import more than one public key.
   *
   * Note: This call can take over an hour to complete if rescan is true, during
   * that time, other rpc calls may report that the imported pubkey exists but
   * related transactions are still missing, leading to temporarily
   * incorrect/bogus balances and unspent outputs until rescan completes.
   *
   * Note: Use "getwalletinfo" to query the scanning progress.
   *
   * Arguments:
   *  1. pubkey    (string, required) The hex-encoded public key
   *  2. label     (string, optional, default = "") An optional label
   *  3. rescan    (boolean, optional, default = true) Rescan the wallet for
   *               transactions
   *
   * Result:
   *  null         (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function importpubkey($pubkey, $label = "", $rescan = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$pubkey", "$label", $rescan ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * importwallet "filename"
   *
   * Imports keys from a wallet dump file (see dumpwallet). Requires a new
   * wallet backup to include imported keys.
   *
   * Note: Use "getwalletinfo" to query the scanning progress.
   *
   * Arguments:
   *  1. filename   (string, required) The wallet file
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function importwallet($filename) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$filename" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * keypoolrefill ( newsize )
   *
   * Fills the keypool. Requires wallet passphrase to be set with
   * walletpassphrase call if wallet is encrypted.
   *
   * Arguments:
   *  1. newsize    (numeric, optional, default=100) The new keypool size
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function keypoolrefill($newsize = 100) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $newsize ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listaddressgroupings
   *
   * Lists groups of addresses which have had their common ownership made public
   * by common use as inputs or as the resulting change in past transactions.
   *
   * Result:
   *  [               (json array)
   *    [             (json array)
   *      [           (json array)
   *        "str",    (string) The umkoin address
   *        n,        (numeric) The amount in UMK
   *        "str",    (string, optional) The label
   *        ...
   *      ],
   *      ...
   *    ],
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listaddressgroupings() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listlabels ( "purpose" )
   *
   * Returns the list of all labels, or labels that are assigned to addresses
   * with a specific purpose.
   *
   * Arguments:
   *  1. purpose    (string, optional) Address purpose to list labels for
   *                ('send','receive'). An empty string is the same as not
   *                providing this argument.
   *
   * Result:
   *  [             (json array)
   *    "str",      (string) Label name
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listlabels($purpose = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$purpose" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listlockunspent
   *
   * Returns list of temporarily unspendable outputs. See the lockunspent call
   * to lock and unlock transactions for spending.
   *
   * Result:
   *  [                      (json array)
   *    {                    (json object)
   *      "txid" : "hex",    (string) The transaction id locked
   *      "vout" : n         (numeric) The vout value
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listlockunspent() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listreceivedbyaddress ( minconf include_empty include_watchonly address_filter )
   *
   * List balances by receiving address.
   *
   * Arguments:
   *  1. minconf           (numeric, optional, default = 1) The minimum number of
   *                       confirmations before payments are included.
   *  2. include_empty     (bool, optional, default = false) Whether to include
   *                       addresses that haven't received any payments.
   *  3. include_watchonly (bool, optional, default = false) Whether to include
   *                       watch-only addresses (see 'importaddress').
   *  4. address_filter    (string, optional) If present, only return information
   *                       on this address.
   *
   * Result:
   *  [
   *   {
   *    "involvesWatchonly": true, (bool) Only returned if imported addresses
   *                       were involved in transaction
   *    "address": "receivingaddress", (string) The receiving address
   *    "amount": x.xxx,   (numeric) The total amount in UMK received by the
   *                       address
   *    "confirmations": n, (numeric) The number of confirmations of the most
   *                       recent transaction included
   *    "label" : "label", (string) The label of the receiving address. The
   *                       default label is "".
   *    "txids": [
   *      "txid",          (string) The ids of transactions received with the
   *                       address
   *      ...
   *    ]
   *   }
   *   ,...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listreceivedbyaddress($minconf = 1, $include_empty = false, $include_watchonly = false, $address_filter = "") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $minconf, $include_empty, $include_watchonly ];
    if (!empty($address_filter))
      array_push($args[ "params" ], $address_filter);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listreceivedbylabel ( minconf include_empty include watchonly )
   *
   * List balances by receiving labels.
   *
   * Arguments:
   *  1. minconf           (numeric, optional, default = 1) The minimum number of
   *                       confirmations before payments are included.
   *  2. include_empty     (boolean, optional, default = false) Whether to
   *                       include labels that haven't received any payments.
   *  3. include_watchonly (boolean, optional, default = false) Whether to
   *                       include watch-only addresses (see 'importaddress').
   *
   * Result:
   *  [
   *   {
   *    "involvesWatchonly": true, (bool) Only returned if imported addresses
   *                       were involved in transaction.
   *    "amount": x.xxx,   (numeric) The total amount received by addresses with
   *                       this label.
   *    "confirmations": n, (numeric) The number of confirmations of the most
   *                       recent transaction included.
   *    "label": "label"   (string) The label of the receiving address. The
   *                       default label is "".
   *   }
   *   ,...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listreceivedbylabel($minconf = 1, $include_empty = false, $include_watchonly = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $minconf, $include_empty, $include_watchonly ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listsinceblock ( "blockhash" target_confirmations include_watchonly include_removed )
   *
   * Get all transactions in blocks since block 'blockhash', or all transactions
   * if omitted. If 'blockhash' is no longer a part of the main chain,
   * transactions from the fork point onward are included. Additionally, if
   * include_removed is set, transactions affecting the wallet which were
   * removed are returned in the "removed" array.
   *
   * Arguments:
   *  1. blockhash   (string, optional) The block hash to list transactions since.
   *  2. target_confirmations (numeric, optional, default = 1) Return the nth
   *                 block hash from the main chain. E.g. 1 would mean the best
   *                 block hash. Note: this is not used as a filter, but only
   *                 affects "lastblock" in the return value.
   *  3. include_watchonly (boolean, optional, default = false) Include
   *                 transactions to watch-only addresses (see 'importaddress').
   *  4. include_removed  (boolean, optional, default = true) Show transactions
   *                 that were removed due to a reorg in the "removed" array.
   *                 Not guaranteed to work on pruned nodes.
   *
   * Result:
   *  {
   *   "transactions": [
   *     "address":"address", (string) The umkoin address of the transaction.
   *                          Not present for move transactions (category = move).
   *     "category":"send|receive",(string) The transaction category. 'send' has
   *                          negative amounts, 'receive' has positive amounts.
   *     "amount": x.xxx,     (numeric) The amount in UMK. This is negative for
   *                          the 'send' category, and for the 'move' category
   *                          for moves outbound. It is positive for the 'receive'
   *                          category, and for the 'move' category for inbound
   *                          funds.
   *     "vout" : n,          (numeric) the vout value
   *     "fee": x.xxx,        (numeric) The amount of the fee in UMK. This is
   *                          negative and only available for the 'send' category
   *                          of transactions.
   *     "confirmations": n,  (numeric) The number of confirmations for the
   *                          transaction. Available for 'send' and 'receive'
   *                          category of transactions. When it's < 0, it means
   *                          the transaction conflicted that many blocks ago.
   *     "blockhash": "hashvalue", (string) The block hash containing the
   *                          transaction. Available for 'send' and 'receive'
   *                          category of transactions.
   *     "blockindex": n,     (numeric) The index of the transaction in the block
   *                          that includes it. Available for 'send' and 'receive'
   *                          category of transactions.
   *     "blocktime": xxx,    (numeric) The block time in seconds since epoch
   *                          (1 Jan 1970 GMT).
   *     "txid": "txid",      (string) The transaction id. Available for 'send'
   *                          and 'receive' category of transactions.
   *     "walletconflicts": [],
   *     "time": xxx,         (numeric) The transaction time in seconds since
   *                          epoch (Jan 1 1970 GMT).
   *     "timereceived": xxx, (numeric) The time received in seconds since epoch
   *                          (Jan 1 1970 GMT). Available for 'send' and
   *                          'receive' category of transactions.
   *     "bip125-replaceable": "yes|no|unknown",  (string) Whether this
   *                          transaction could be replaced due to BIP125
   *                          (replace-by-fee); may be unknown for unconfirmed
   *                          transactions not in the mempool
   *     "abandoned": xxx,    (bool) 'true' if the transaction has been abandoned
   *                          (inputs are respendable). Only available for the
   *                          'send' category of transactions.
   *     "comment": "...",    (string) If a comment is associated with the
   *                          transaction.
   *     "label" : "label"    (string) A comment for the address/transaction, if
   *                          any.
   *     "to": "...",         (string) If a comment to is associated with the
   *                          transaction.
   *   ],
   *   "removed": [
   *      <structure is the same as "transactions" above, only present if
   *      include_removed=true>
   *      Note: transactions that were re-added in the active chain will appear
   *      as-is in this array, and may thus have a positive confirmation count.
   *   ],
   *   "lastblock": "hash"   (string) The hash of the block (target_confirmations-1)
   *                         from the best block on the main chain. This is
   *                         typically used to feed back into listsinceblock the
   *                         next time you call it. So you would generally use a
   *                         target_confirmations of say 6, so you will be
   *                         continually re-notified of transactions until
   *                         they've reached 6 confirmations plus any new ones.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function listsinceblock($blockhash = "", $target_confirmations = 1, $include_watchonly = false, $include_removed = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$blockhash", $target_confirmations, $include_watchonly, $include_removed ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listtransactions ( "label" count skip include_watchonly )
   *
   * If a label name is provided, this will return only incoming transactions
   * paying to addresses with the specified label.
   *
   * Returns up to 'count' most recent transactions skipping the first 'from'
   * transactions.
   *
   * Arguments:
   *  1. label       (string, optional) If set, should be a valid label name to
   *                 return only incoming transactions with the specified label,
   *                 or "*" to disable filtering and return all transactions.
   *  2. count       (numeric, optional, default = 10) The number of
   *                 transactions to return.
   *  3. skip        (numeric, optional, default = 0) The number of transactions
   *                 to skip.
   *  4. include_watchonly (boolean, optional, default=true for watch-only
   *                 wallets, otherwise false). Include transactions to
   *                 watch-only addresses (see 'importaddress')
   *
   * Result:
   *  [                        (json array)
   *    {                      (json object)
   *      "involvesWatchonly" : true|false,  (boolean) Only returns true if
   *                           imported addresses were involved in transaction.
   *      "address" : "str",   (string) The umkoin address of the transaction.
   *      "category" : "str",  (string) The transaction category.
   *                             "send"     Transactions sent.
   *                             "receive"  Non-coinbase transactions received.
   *                             "generate" Coinbase transactions received with
   *                                        more than 100 confirmations.
   *                             "immature" Coinbase transactions received with
   *                                        100 or fewer confirmations.
   *                             "orphan"   Orphaned coinbase transactions
   *                                        received.
   *      "amount" : n,        (numeric) The amount in UMK. This is negative for
   *                           the 'send' category, and is positive for all
   *                           other categories
   *      "label" : "str",     (string) A comment for the address/transaction,
   *                           if any
   *      "vout" : n,          (numeric) the vout value
   *      "fee" : n,           (numeric) The amount of the fee in UMK. This is
   *                           negative and only available for the 'send'
   *                           category of transactions.
   *      "confirmations" : n, (numeric) The number of confirmations for the
   *                           transaction. Negative confirmations means the
   *                           transaction conflicted that many blocks ago.
   *      "generated" : true|false,  (boolean) Only present if transaction only
   *                           input is a coinbase one.
   *      "trusted" : true|false,  (boolean) Only present if we consider
   *                           transaction to be trusted and so safe to spend
   *                           from.
   *      "blockhash" : "hex", (string) The block hash containing the
   *                           transaction.
   *      "blockheight" : n,   (numeric) The block height containing the
   *                           transaction.
   *      "blockindex" : n,    (numeric) The index of the transaction in the
   *                           block that includes it.
   *      "blocktime" : xxx,   (numeric) The block time expressed in UNIX epoch
   *                           time.
   *      "txid" : "hex",      (string) The transaction id.
   *      "walletconflicts" : [ (json array) Conflicting transaction ids.
   *        "hex",             (string) The transaction id.
   *        ...
   *      ],
   *      "time" : xxx,        (numeric) The transaction time expressed in UNIX
   *                           epoch time.
   *      "timereceived" : xxx,  (numeric) The time received expressed in UNIX
   *                           epoch time.
   *      "comment" : "str",   (string) If a comment is associated with the
   *                           transaction, only present if not empty.
   *      "bip125-replaceable" : "str",  (string) ("yes|no|unknown") Whether
   *                           this transaction could be replaced due to BIP125
   *                           (replace-by-fee); may be unknown for unconfirmed
   *                           transactions not in the mempool
   *      "abandoned" : true|false  (boolean) 'true' if the transaction has been
   *                           abandoned (inputs are respendable). Only
   *                           available for the 'send' category of transactions.
   *    },
   *    ...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listtransactions($label = "", $count = 10, $skip = 0, $include_watchonly = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$label", $count, $skip, $include_watchonly ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listunspent ( minconf maxconf ["address",...] include_unsafe query_options )
   *
   * Returns array of unspent transaction outputs with between minconf and
   * maxconf (inclusive) confirmations. Optionally filter to only include txouts
   * paid to specified addresses.
   *
   * Arguments:
   *  1. minconf             (numeric, optional, default=1) The minimum
   *                         confirmations to filter
   *  2. maxconf             (numeric, optional, default=9999999) The maximum
   *                         confirmations to filter
   *  3. addresses           (json array, optional, default=empty array) The
   *                         umkoin addresses to filter
   *     [
   *       "address",        (string) umkoin address
   *       ...
   *     ]
   *  4. include_unsafe      (boolean, optional, default=true) Include outputs
   *                         that are not safe to spend. See description of
   *                         "safe" attribute below.
   *  5. query_options       (json object, optional) JSON with query options
   *     {
   *       "minimumAmount": amount,  (numeric or string, optional, default = 0)
   *                         Minimum value of each UTXO in UMK
   *       "maximumAmount": amount,  (numeric or string, optional,
   *                         default = unlimited) Maximum value of each UTXO in
   *                         UMK
   *       "maximumCount": n,   (numeric, optional, default=unlimited) Maximum
   *                         number of UTXOs
   *       "minimumSumAmount": amount,  (numeric or string, optional,
   *                         default=unlimited) Minimum sum value of all UTXOs
   *                         in UMK
   *     }
   *
   * Result:
   *[                        (json array)
   *  {                      (json object)
   *    "txid" : "hex",      (string) the transaction id
   *    "vout" : n,          (numeric) the vout value
   *    "address" : "str",   (string) the umkoin address
   *    "label" : "str",     (string) The associated label, or "" for the
   *                         default label
   *    "scriptPubKey" : "str",  (string) the script key
   *    "amount" : n,        (numeric) the transaction output amount in UMK
   *    "confirmations" : n, (numeric) The number of confirmations
   *    "redeemScript" : "hex",  (string) The redeemScript if scriptPubKey is
   *                         P2SH
   *    "witnessScript" : "str",  (string) witnessScript if the scriptPubKey is
   *                         P2WSH or P2SH-P2WSH
   *    "spendable" : true|false,  (boolean) Whether we have the private keys
   *                         to spend this output
   *    "solvable" : true|false,  (boolean) Whether we know how to spend this
   *                         output, ignoring the lack of keys
   *    "reused" : true|false,  (boolean) (only present if avoid_reuse is set)
   *                         Whether this output is reused/dirty (sent to an
   *                         address that was previously spent from)
   *    "desc" : "str",      (string) (only when solvable) A descriptor for
   *                         spending this output
   *    "safe" : true|false  (boolean) Whether this output is considered safe to
   *                         spend. Unconfirmed transactions from outside keys
   *                         and unconfirmed replacement transactions are
   *                         considered unsafe and are not eligible for spending
   *                         by fundrawtransaction and sendtoaddress.
   *  },
   *  ...
   *]
   *
   * (0.21.1 RPC)
   *
   */
  public function listunspent($minconf = 1, $maxconf = 9999999, $addresses = [], $include_unsafe = true, $query_options = []) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $minconf, $maxconf, $addresses, $include_unsafe, $query_options ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listwalletdir
   *
   * Returns a list of wallets in the wallet directory.
   *
   * Result:
   *  {                        (json object)
   *    "wallets" : [          (json array)
   *      {                    (json object)
   *        "name" : "str"     (string) The wallet name
   *      },
   *      ...
   *    ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function listwalletdir() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * listwallets
   *
   * Returns a list of currently loaded wallets. For full information on the
   * wallet, use "getwalletinfo".
   *
   * Arguments:
   *  None
   *
   * Result:
   *  [               (json array of strings)
   *    "walletname"  (string) The wallet name
   *    ,...
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function listwallets() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * loadwallet "filename" ( load_on_startup )
   *
   * Loads a wallet from a wallet file or directory. Note that all wallet
   * command-line options used when starting umkoind will be applied to the new
   * wallet (eg -rescan, etc).
   *
   * Arguments:
   *  1. filename          (string, required) The wallet directory or .dat file.
   *  2. load_on_startup   (boolean, optional, default=null) Save wallet name to
   *                       persistent settings and load on startup. True to add
   *                       wallet to startup list, false to remove, null to
   *                       leave unchanged.
   *
   * Result:
   *  {                    (json object)
   *    "name" : "str",    (string) The wallet name if loaded successfully.
   *    "warning" : "str"  (string) Warning message if wallet was not loaded
   *                       cleanly.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function loadwallet($filename, $load_on_startup = NULL) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$filename" ];
    if (!is_null($load_on_startup))
      array_push($args[ "params" ], $load_on_startup);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * lockunspent unlock ([{"txid":"txid","vout":n},...])
   *
   * Updates list of temporarily unspendable outputs. Temporarily lock (unlock
   * = false) or unlock (unlock = true) specified transaction outputs. If no
   * ransaction outputs are specified when unlocking then all current locked
   * transaction outputs are unlocked. A locked transaction output will not be
   * chosen by automatic coin selection, when spending umkoins. Locks are
   * stored in memory only. Nodes start with zero locked outputs, and the locked
   * output list is always cleared (by virtue of process exit) when a node stops
   * or fails. Also see the listunspent call.
   *
   * Arguments:
   *  1. unlock      (boolean, required) Whether to unlock (true) or lock
   *                 (false) the specified transactions.
   *  2. txid        (string, optional) A json array of objects. Each object has
   *                 the txid (string), vout (numeric).
   *  [              (json array of json objects)
   *   {
   *    "txid":"id", (string) The transaction id
   *    "vout":n     (numeric) The output number
   *   }
   *  ]
   *
   * Result:
   *  true           (boolean) Whether the command was successful.
   *
   */
  public function lockunspent($unlock, $txid = NULL) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $unlock ];
    if (!is_null($txid))
      array_push($args[ "params" ], "$txid");

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * psbtbumpfee "txid" ( options )
   *
   * Bumps the fee of an opt-in-RBF transaction T, replacing it with a new
   * transaction B. Returns a PSBT instead of creating and signing a new
   * transaction. An opt-in RBF transaction with the given txid must be in the
   * wallet. The command will pay the additional fee by reducing change outputs
   * or adding inputs when necessary. It may add a new change output if one does
   * not already exist. All inputs in the original transaction will be included
   * in the replacement transaction. The command will fail if the wallet or
   * mempool contains a transaction that spends one of T's outputs. By default,
   * the new fee will be calculated automatically using the estimatesmartfee
   * RPC. The user can specify a confirmation target for estimatesmartfee.
   * Alternatively, the user can specify a fee rate in sat/vB for the new
   * transaction. At a minimum, the new fee rate must be high enough to pay an
   * additional new relay fee (incrementalfee returned by getnetworkinfo) to
   * enter the node's mempool.
   *
   * WARNING: before version 0.21, fee_rate was in UMK/kvB. As of 0.21, fee_rate
   * is in sat/vB.
   *
   * Arguments:
   *  1. txid                    (string, required) The txid to be bumped
   *  2. options                 (json object, optional)
   *     {
   *       "conf_target": n,     (numeric, optional, default=wallet
   *                             -txconfirmtarget) Confirmation target in blocks
   *       "fee_rate": amount,   (numeric or string, optional, default=not set,
   *                             fall back to wallet fee estimation). Specify a
   *                             fee rate in sat/vB instead of relying on the
   *                             built-in fee estimator. Must be at least 1.000
   *                             sat/vB higher than the current transaction fee
   *                             rate.
   *                             WARNING: before version 0.21, fee_rate was in
   *                             UMK/kvB. As of 0.21, fee_rate is in sat/vB.
   *       "replaceable": bool,  (boolean, optional, default=true) Whether the
   *                             new transaction should still be marked BIP125
   *                             replaceable. If true, the sequence numbers in
   *                             the transaction will be left unchanged from the
   *                             original. If false, any input sequence numbers
   *                             in the original transaction that were less than
   *                             0xfffffffe will be increased to 0xfffffffe so
   *                             the new transaction will not be explicitly
   *                             BIP125 replaceable (though it may still be
   *                             replaceable in practice, for example if it has
   *                             unconfirmed ancestors which are replaceable).
   *       "estimate_mode": "str",  (string, optional, default=unset) The fee
   *                             estimate mode, must be one of (case
   *                             insensitive):
   *                                  "unset"
   *                                  "economical"
   *                                  "conservative"
   *     }
   *
   * Result:
   *  {                    (json object)
   *    "psbt" : "str",    (string) The base64-encoded unsigned PSBT of the new
   *                       transaction.
   *    "origfee" : n,     (numeric) The fee of the replaced transaction.
   *    "fee" : n,         (numeric) The fee of the new transaction.
   *    "errors" : [       (json array) Errors encountered during processing
   *                       (may be empty).
   *      "str",           (string)
   *      ...
   *    ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function psbtbumpfee($txid, $options = NULL) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid" ];
    if (!is_null($options))
      array_push($args[ "params" ], $options);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * removeprunedfunds "txid"
   *
   * Deletes the specified transaction from the wallet. Meant for use with
   * pruned wallets and as a companion to importprunedfunds. This will affect
   * wallet balances.
   *
   * Arguments:
   *  1. "txid"     (string, required) The hex-encoded id of the transaction
   *                to be deleted.
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function removeprunedfunds($txid) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$txid" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * rescanblockchain ( start_height stop_height )
   *
   * Rescan the local blockchain for wallet related transactions. Note: Use
   * "getwalletinfo" to query the scanning progress.
   *
   * Arguments:
   *  1. start_height  (numeric, optional, default=0) block height where the
   *                   rescan should start
   *  2. stop_height   (numeric, optional) the last block height that should be
   *                   scanned. If none is provided it will rescan up to the tip
   *                   at return time of this call.
   *
   * Result:
   *  {                      (json object)
   *    "start_height" : n,  (numeric) The block height where the rescan started
   *                         (the requested height or 0)
   *    "stop_height" : n    (numeric) The height of the last rescanned block.
   *                         May be null in rare cases if there was a reorg and
   *                         the call didn't scan any blocks because they were
   *                         already scanned in the background.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function rescanblockchain($start_height = 0, $stop_height = NULL) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $start_height ];
    if (!is_null($stop_height) && $start_height < $stop_height)
      array_push($args[ "params" ], $stop_height);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * send [{"address":amount},{"data":"hex"},...] ( conf_target "estimate_mode" fee_rate options )
   *
   * EXPERIMENTAL warning: this call may be changed in future releases.
   *
   * Send a transaction.
   *
   * Arguments:
   *  1. outputs                  (json array, required) The outputs (key-value
   *                              pairs), where none of the keys are duplicated.
   *                              That is, each address can only appear once and
   *                              there can only be one 'data' object. For
   *                              convenience, a dictionary, which holds the
   *                              key-value pairs directly, is also accepted.
   *     [
   *       {                      (json object)
   *         "address": amount,   (numeric or string, required) A key-value
   *                              pair. The key (string) is the umkoin address,
   *                              the value (float or string) is the amount in
   *                              UMK.
   *       },
   *       {                      (json object)
   *         "data": "hex",       (string, required) A key-value pair. The key
   *                              must be "data", the value is hex-encoded data
   *       },
   *       ...
   *     ]
   *  2. conf_target              (numeric, optional, default=wallet
   *                              -txconfirmtarget) Confirmation target in
   *                              blocks
   *  3. estimate_mode            (string, optional, default=unset) The fee
   *                              estimate mode, must be one of (case
   *                              insensitive):
   *                                   "unset"
   *                                   "economical"
   *                                   "conservative"
   *  4. fee_rate                 (numeric or string, optional, default=not set,
   *                              fall back to wallet fee estimation) Specify a
   *                              fee rate in sat/vB.
   *  5. options                  (json object, optional)
   *     {
   *       "add_inputs": bool,    (boolean, optional, default=false) If inputs
   *                              are specified, automatically include more if
   *                              they are not enough.
   *       "add_to_wallet": bool, (boolean, optional, default=true) When false,
   *                              returns a serialized transaction which will
   *                              not be added to the wallet or broadcast
   *       "change_address": "hex",  (string, optional, default=pool address)
   *                              The umkoin address to receive the change
   *       "change_position": n,  (numeric, optional, default=random) The index
   *                              of the change output
   *       "change_type": "str",  (string, optional, default=set by -changetype)
   *                              The output type to use. Only valid if
   *                              change_address is not specified. Options are
   *                                   "legacy"
   *                                   "p2sh-segwit"
   *                                   "bech32".
   *       "conf_target": n,      (numeric, optional, default=wallet
   *                              -txconfirmtarget) Confirmation target in
   *                              blocks
   *       "estimate_mode": "str",  (string, optional, default=unset) The fee
   *                              estimate mode, must be one of (case
   *                              insensitive):
   *                                   "unset"
   *                                   "economical"
   *                                   "conservative"
   *       "fee_rate": amount,    (numeric or string, optional, default=not set,
   *                              fall back to wallet fee estimation) Specify a
   *                              fee rate in sat/vB.
   *       "include_watching": bool,  (boolean, optional, default=true for
   *                              watch-only wallets, otherwise false) Also
   *                              select inputs which are watch only. Only
   *                              solvable inputs can be used. Watch-only
   *                              destinations are solvable if the public key
   *                              and/or output script was imported, e.g. with
   *                              'importpubkey' or 'importmulti' with the
   *                              'pubkeys' or 'desc' field.
   *       "inputs": [            (json array, optional, default=empty array)
   *                              Specify inputs instead of adding them
   *                              automatically. A JSON array of JSON objects
   *         "txid",              (string, required) The transaction id
   *         vout,                (numeric, required) The output number
   *         sequence,            (numeric, required) The sequence number
   *         ...
   *       ],
   *       "locktime": n,         (numeric, optional, default=0) Raw locktime.
   *                              Non-0 value also locktime-activates inputs
   *       "lock_unspents": bool, (boolean, optional, default=false) Lock
   *                              selected unspent outputs
   *       "psbt": bool,          (boolean, optional, default=automatic) Always
   *                              return a PSBT, implies add_to_wallet=false.
   *       "subtract_fee_from_outputs": [  (json array, optional, default=empty
   *                              array) Outputs to subtract the fee from,
   *                              specified as integer indices. The fee will be
   *                              equally deducted from the amount of each
   *                              specified output. Those recipients will
   *                              receive less umkoins than you enter in their
   *                              corresponding amount field. If no outputs are
   *                              specified here, the sender pays the fee.
   *         vout_index,          (numeric) The zero-based output index, before
   *                              a change output is added.
   *         ...
   *       ],
   *       "replaceable": bool,   (boolean, optional, default=wallet default)
   *                              Marks this transaction as BIP125 replaceable.
   *                              Allows this transaction to be replaced by a
   *                              transaction with higher fees
   *     }
   *
   * Result:
   *  {                           (json object)
   *    "complete" : true|false,  (boolean) If the transaction has a complete
   *                              set of signatures
   *    "txid" : "hex",           (string) The transaction id for the send. Only
   *                              1 transaction is created regardless of the
   *                              number of addresses.
   *    "hex" : "hex",            (string) If add_to_wallet is false, the
   *                              hex-encoded raw transaction with signature(s)
   *    "psbt" : "str"            (string) If more signatures are needed, or if
   *                              add_to_wallet is false, the base64-encoded
   *                              (partially) signed transaction
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function send($outputs, $conf_target, $esitmate_mode, $fee_rate, $options) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $outputs, $conf_target, "$estimate_mode", $fee_rate, $options ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * sendmany "" {"address":amount} (
   *                                 minconf
   *                                 "comment"
   *                                 ["address",...]
   *                                 replaceable
   *                                 conf_target
   *                                 "estimate_mode"
   *                                 fee_rate
   *                                 verbose )
   *
   * Send multiple times. Amounts are double-precision floating point numbers.
   * Requires wallet passphrase to be set with walletpassphrase call if wallet
   * is encrypted.
   *
   * Arguments:
   *  1. dummy                (string, required) Must be set to "" for backwards
   *                          compatibility.
   *  2. amounts              (json object, required) The addresses and amounts
   *      {
   *        "address": amount,  (numeric or string, required) The umkoin address
   *                          is the key, the numeric amount (can be string) in
   *                          UMK is the value
   *      }
   *  3. minconf              (numeric, optional) Ignored dummy value
   *  4. comment              (string, optional) A comment
   *  5. subtractfeefrom      (json array, optional) The addresses. The fee will
   *                          be equally deducted from the amount of each
   *                          selected address. Those recipients will receive
   *                          less umkoins than you enter in their corresponding
   *                          amount field. If no addresses are specified here,
   *                          the sender pays the fee.
   *      [
   *        "address",        (string) Subtract fee from this address
   *        ...
   *      ]
   *  6. replaceable          (boolean, optional, default=wallet default) Allow
   *                          this transaction to be replaced by a transaction
   *                          with higher fees via BIP 125
   *  7. conf_target          (numeric, optional, default=wallet
   *                          -txconfirmtarget) Confirmation target in blocks
   *  8. estimate_mode        (string, optional, default=unset) The fee estimate
   *                          mode, must be one of (case insensitive):
   *                             "unset"
   *                             "economical"
   *                             "conservative"
   *  9. fee_rate             (numeric or string, optional, default=not set,
   *                          fall back to wallet fee estimation) Specify a fee
   *                          rate in sat/vB.
   *  10. verbose             (boolean, optional, default=false) If true, return
   *                          extra infomration about the transaction.
   *
   * Result (if verbose is not set or set to false):
   *  "hex"                   (string) The transaction id for the send. Only 1
   *                          transaction is created regardless of the number of
   *                          addresses.
   *
   * Result (if verbose is set to true):
   *  {                       (json object)
   *    "txid" : "hex",       (string) The transaction id for the send. Only 1
   *                          transaction is created regardless of the number
   *                          of addresses.
   *    "fee reason" : "str"  (string) The transaction fee reason.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function sendmany($dummy, $amounts, $minconf, $comment = "", $subtractfeefrom = [], $replaceable = true, $conf_target = 1, $estimate_mode = "unset", $fee_rate = 1000, $verbose = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "", $amounts, $minconf, "$comment", $subtractfeefrom, $replaceable, $conf_target, $estimate_mode, $fee_rate, $verbose ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * sendtoaddress "address" amount (
   *                                 "comment"
   *                                 "comment_to"
   *                                 subtractfeefromamount
   *                                 replaceable
   *                                 conf_target
   *                                 "estimate_mode"
   *                                 avoid_reuse )
   *
   * Send an amount to a given address.
   *
   * Arguments:
   *  1. address     (string, required) The umkoin address to send to.
   *  2. amount      (numeric or string, required) The amount in UMK to send.
   *  3. comment     (string, optional) A comment used to store what the
   *                 transaction is for. This is not part of the transaction,
   *                 just kept in your wallet.
   *  4. comment_to  (string, optional) A comment to store the name of the
   *                 person or organization to which you are sending the
   *                 transaction. This is not part of the transaction, just
   *                 kept in your wallet.
   *  5. subtractfeefromamount  (boolean, optional, default=false) The fee will
   *                 be deducted from the amount being sent. The recipient will
   *                 receive less umkoins than you enter in the amount field.
   *  6. replaceable (boolean, optional) Allow this transaction to be
   *                 replaced by a transaction with higher fees via BIP 125
   *  7. conf_target (numeric, optional) Confirmation target (in blocks)
   *  8. "estimate_mode" (string, optional, default=UNSET) The fee estimate mode,
   *                 must be one of:
   *                   "UNSET"
   *                   "ECONOMICAL"
   *                   "CONSERVATIVE"
   *  9. avoid_reuse  (boolean, optional, default=true) (only available if
   *                 avoid_reuse wallet flag is set) Avoid spending from dirty
   *                 addresses; addresses are considered dirty if they have
   *                 previously been used in a transaction.
   *
   * Result:
   * "txid"         (string) The transaction id.
   *
   * (0.21.1 RPC)
   *
   */
  public function sendtoaddress($address, $amount, $comment = "", $comment_to = "", $subtractfeefromamount = false, $replaceable = true, $conf_target = 6, $estimate_mode = "UNSET", $avoid_reuse = false) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", $amount, "$comment", "$comment_to", $subtractfeefromamount, $replaceable, $conf_target, "$estimate_mode", $avoid_reuse ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * sethdseed ( newkeypool "seed" )
   *
   * Set or generate a new HD wallet seed. Non-HD wallets will not be upgraded
   * to being a HD wallet. Wallets that are already HD will have a new HD seed
   * set so that new keys added to the keypool will be derived from this new
   * seed.
   *
   * Note that you will need to MAKE A NEW BACKUP of your wallet after setting
   * the HD wallet seed. Requires wallet passphrase to be set with
   * walletpassphrase call if wallet is encrypted.
   *
   * Arguments:
   *  1. newkeypool  (boolean, optional, default=true) Whether to flush old
   *                 unused addresses, including change addresses, from the
   *                 keypool and regenerate it. If true, the next address from
   *                 getnewaddress and change address from getrawchangeaddress
   *                 will be from this new seed. If false, addresses (including
   *                 change addresses if the wallet already had HD Chain Split
   *                 enabled) from the existing keypool will be used until it
   *                 has been depleted.
   *  2. seed        (string, optional, default=random seed) The WIF private key
   *                 to use as the new HD seed. The seed value can be retrieved
   *                 using the dumpwallet command. It is the private key marked
   *                 hdseed=1
   *
   * Result:
   *  null           (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function sethdseed($newkeypool = true, $seed = NULL) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $newkeypool ];
    if (!is_null($seed))
      array_push($args[ "params" ], $seed);

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * setlabel "address" "label"
   *
   * Sets the label associated with the given address.
   *
   * Arguments:
   *  1. address     (string, required) The umkoin address to be associated
   *                 with a label.
   *  2. label       (string, required) The label to assign to the address.
   *
   * Result:
   *  null           (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function setlabel($address, $label) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", "$label" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * settxfee amount
   *
   * Set the transaction fee per kB for this wallet. Overrides the global
   * -paytxfee command line parameter. Can be deactivated by passing 0 as the
   * fee. In that case automatic fee selection will be used by default.
   *
   * Arguments:
   *  1. amount    (numeric or string, required) The transaction fee in UMK/kvB
   *
   * Result:
   *  true|false   (boolean) Returns true if successful
   *
   * (0.21.1 RPC)
   *
   */
  public function settxfee($amount) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $amount ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * setwalletflag "flag" ( value )
   *
   * Change the state of the given wallet flag for a wallet.
   *
   * Arguments:
   *  1. flag       (string, required) The name of the flag to change. Current
   *                available flags: avoid_reuse
   *  2. value      (boolean, optional, default=true) The new state.
   *
   * Result:
   *  {                            (json object)
   *    "flag_name" : "str",       (string) The name of the flag that was
   *                               modified
   *    "flag_state" : true|false, (boolean) The new state of the flag
   *    "warnings" : "str"         (string) Any warnings associated with the
   *                               change
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function setwalletflag($flag, $value = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$flag", $value ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * signmessage "address" "message"
   *
   * Sign a message with the private key of an address.
   *
   * Arguments:
   *  1. address    (string, required) The umkoin address to use for the
   *                private key.
   *  2. message    (string, required) The message to create a signature for.
   *
   * Result:
   *  "signature"   (string) The signature of the message encoded in base 64.
   *
   * (0.21.1 RPC)
   *
   */
  public function signmessage($address, $message) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$address", "$message" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * signrawtransactionwithwallet "hexstring" (
   *                                           [{
   *                                             "txid":"hex",
   *                                             "vout":n,
   *                                             "scriptPubKey":"hex",
   *                                             "redeemScript":"hex",
   *                                             "witnessScript":"hex",
   *                                             "amount":amount},
   *                                           ...]
   *                                           "sighashtype" )
   *
   * Sign inputs for raw transaction (serialized, hex-encoded). The second
   * optional argument (may be null) is an array of previous transaction outputs
   * that this transaction depends on but may not yet be in the block chain.
   * Requires wallet passphrase to be set with walletpassphrase call if wallet
   * is encrypted.
   *
   * Arguments:
   *  1. hexstring      (string, required) The transaction hex string
   *  2. prevtxs        (json array, optional) The previous dependent transaction outputs
   *     [
   *       {                         (json object)
   *         "txid": "hex",          (string, required) The transaction id
   *         "vout": n,              (numeric, required) The output number
   *         "scriptPubKey": "hex",  (string, required) script key
   *         "redeemScript": "hex",  (string) (required for P2SH) redeem script
   *         "witnessScript": "hex", (string) (required for P2WSH or P2SH-P2WSH)
   *                                 witness script
   *         "amount": amount,       (numeric or string) (required for Segwit
   *                                 inputs) the amount spent
   *       },
   *       ...
   *     ]
   *  3. sighashtype             (string, optional, default=ALL) The signature
   *                             hash type. Must be one of:
   *                                 "ALL"
   *                                 "NONE"
   *                                 "SINGLE"
   *                                 "ALL|ANYONECANPAY"
   *                                 "NONE|ANYONECANPAY"
   *                                 "SINGLE|ANYONECANPAY"
   *
   * Result:
   *  {                          (json object)
   *    "hex" : "hex",           (string) The hex-encoded raw transaction with
   *                             signature(s)
   *    "complete" : true|false, (boolean) If the transaction has a complete set
   *                             of signatures
   *    "errors" : [             (json array, optional) Script verification
   *                             errors (if there are any)
   *      {                      (json object)
   *        "txid" : "hex",      (string) The hash of the referenced, previous
   *                             transaction
   *        "vout" : n,          (numeric) The index of the output to spent and
   *                             used as input
   *        "scriptSig" : "hex", (string) The hex-encoded signature script
   *        "sequence" : n,      (numeric) Script sequence number
   *        "error" : "str"      (string) Verification or signing error related
   *                             to the input
   *      },
   *      ...
   *    ]
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function signrawtransactionwithwallet($hexstring, $prevtxs, $sighashtype = "ALL") {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$hexstring", $prevtxs, "$sighashtype" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * unloadwallet ( "wallet_name" load_on_startup )
   *
   * Unloads the wallet referenced by the request endpoint otherwise unloads
   * the wallet specified in the argument. Specifying the wallet name on a
   * wallet endpoint is invalid.
   *
   * Arguments:
   *  1. wallet_name      (string, optional, default=the wallet name from the
   *                      RPC endpoint) The name of the wallet to unload. Must
   *                      be provided in the RPC endpoint or this parameter
   *                      (but not both).
   *  2. load_on_startup  (boolean, optional, default=null) Save wallet name to
   *                      persistent settings and load on startup. True to add
   *                      wallet to startup list, false to remove, null to leave
   *                      unchanged.
   *
   * Result:
   *  {                   (json object)
   *    "warning" : "str" (string) Warning message if wallet was not unloaded
   *                      cleanly.
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function unloadwallet($wallet_name = NULL, $load_on_startup = NULL) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    if (!is_null($wallet_name)) {
      $args[ "params" ] = [ "$wallet_name" ];
      if (!is_null($load_on_startup)) {
        array_push($args[ "params" ], $load_on_startup);
      }
    }

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * upgradewallet ( version )
   *
   * Upgrade the wallet. Upgrades to the latest version if no version number is
   * specified. New keys may be generated and a new wallet backup will need to
   * be made.
   *
   * Arguments:
   *  1. version    (numeric, optional, default=169900) The version number to
   *                upgrade to. Default is the latest wallet version.
   *
   * Result:
   *  {                         (json object)
   *    "wallet_name" : "str",  (string) Name of wallet this operation was
   *                            performed on
   *    "previous_version" : n, (numeric) Version of wallet before this
   *                            operation
   *    "current_version" : n,  (numeric) Version of wallet after this operation
   *    "result" : "str",       (string, optional) Description of result, if no
   *                            error
   *    "error" : "str"         (string, optional) Error message (if there is
   *                            one)
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function upgradewallet($version = 169900) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $version ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * walletcreatefundedpsbt ( [{"txid":"hex","vout":n,"sequence":n},...] ) [{"address":amount},{"data":"hex"},...] ( locktime options bip32derivs )
   *
   * Creates and funds a transaction in the Partially Signed Transaction format.
   * Implements the Creator and Updater roles.
   *
   * Arguments:
   *  1. inputs               (json array, optional) Leave empty to add inputs
   *                          automatically. See add_inputs option.
   *     [
   *       {                  (json object)
   *         "txid": "hex",   (string, required) The transaction id
   *         "vout": n,       (numeric, required) The output number
   *         "sequence": n,   (numeric, optional, default=depends on the value
   *                          of the 'locktime' and 'options.replaceable'
   *                          arguments) The sequence number
   *       },
   *       ...
   *     ]
   *  2. outputs              (json array, required) The outputs (key-value
   *                          pairs), where none of the keys are duplicated.
   *                          That is, each address can only appear once and
   *                          there can only be one 'data' object. For
   *                          compatibility reasons, a dictionary, which holds
   *                          the key-value pairs directly, is also accepted as
   *                          second parameter.
   *     [
   *       {                  (json object)
   *         "address": amount,  (numeric or string, required) A key-value pair.
   *                          The key (string) is the umkoin address, the value
   *                          (float or string) is the amount in UMK
   *       },
   *       {                  (json object)
   *         "data": "hex",   (string, required) A key-value pair. The key must
   *                          be "data", the value is hex-encoded data
   *       },
   *       ...
   *     ]
   *  3. locktime             (numeric, optional, default=0) Raw locktime. Non-0
   *                          value also locktime-activates inputs
   *  4. options              (json object, optional)
   *     {
   *       "add_inputs": bool,  (boolean, optional, default=false) If inputs are
   *                          specified, automatically include more if they are
   *                          not enough.
   *       "changeAddress": "hex",  (string, optional, default=pool address) The
   *                          umkoin address to receive the change
   *       "changePosition": n,  (numeric, optional, default=random) The index
   *                          of the change output
   *       "change_type": "str",  (string, optional, default=set by -changetype)
   *                          The output type to use. Only valid if
   *                          changeAddress is not specified. Options are
   *                             "legacy"
   *                             "p2sh-segwit"
   *                             "bech32".
   *       "includeWatching": bool,  (boolean, optional, default=true for
   *                          watch-only wallets, otherwise false) Also select
   *                          inputs which are watch only
   *       "lockUnspents": bool,  (boolean, optional, default=false) Lock
   *                          selected unspent outputs
   *       "fee_rate": amount,  (numeric or string, optional, default=not set,
   *                          fall back to wallet fee estimation) Specify a fee
   *                          rate in sat/vB.
   *       "feeRate": amount,  (numeric or string, optional, default=not set,
   *                          fall back to wallet fee estimation) Specify a fee
   *                          rate in UMK/kvB.
   *       "subtractFeeFromOutputs": [  (json array, optional, default=empty
   *                          array) The outputs to subtract the fee from. The
   *                          fee will be equally deducted from the amount of
   *                          each specified output. Those recipients will
   *                          receive less umkoins than you enter in their
   *                          corresponding amount field. If no outputs are
   *                          specified here, the sender pays the fee.
   *         vout_index,      (numeric) The zero-based output index, before a
   *                          change output is added.
   *         ...
   *       ],
   *       "replaceable": bool,  (boolean, optional, default=wallet default)
   *                          Marks this transaction as BIP125 replaceable.
   *                          Allows this transaction to be replaced by a
   *                          transaction with higher fees
   *       "conf_target": n,  (numeric, optional, default=wallet
   *                          -txconfirmtarget) Confirmation target in blocks
   *       "estimate_mode": "str",  (string, optional, default=unset) The fee
   *                          estimate mode, must be one of (case insensitive):
   *                              "unset"
   *                              "economical"
   *                              "conservative"
   *     }
   *  5. bip32derivs     (boolean, optional, default=true) Include BIP 32
   *                     derivation paths for public keys if we know them
   *
   * Result:
   *  {                  (json object)
   *    "psbt" : "str",  (string) The resulting raw transaction (base64-encoded
   *                     string)
   *    "fee" : n,       (numeric) Fee in UMK the resulting transaction pays
   *    "changepos" : n  (numeric) The position of the added change output, or
   *                     -1
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function walletcreatefundedpsbt($inputs, $outputs, $locktime, $options, $bip32derivs = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ $inputs, $outputs, $locktime, $options, $bip32derivs ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * walletlock
   *
   * Removes the wallet encryption key from memory, locking the wallet. After
   * calling this method, you will need to call walletpassphrase again before
   * being able to call any methods which require the wallet to be unlocked.
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function walletlock() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * walletpassphrase "passphrase" timeout
   *
   * Stores the wallet decryption key in memory for 'timeout' seconds. This is
   * needed prior to performing transactions related to private keys such as
   * sending bitcoins.
   *
   * Note: Issuing the walletpassphrase command while the wallet is already
   * unlocked will set a new unlock time that overrides the old one.
   *
   * Arguments:
   *  1. passphrase (string, required) The wallet passphrase
   *  2. timeout    (numeric, required) The time to keep the decryption key in
   *                seconds; capped at 100000000 (~3 years).
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function walletpassphrase($passphrase, $timeout = 100000000) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$passphrase", $timeout ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * walletpassphrasechange "oldpassphrase" "newpassphrase"
   *
   * Changes the wallet passphrase from 'oldpassphrase' to 'newpassphrase'.
   *
   * Arguments:
   *  1. oldpassphrase    (string, required) The current passphrase
   *  2. newpassphrase    (string, required) The new passphrase
   *
   * Result:
   *  null          (json null)
   *
   * (0.21.1 RPC)
   *
   */
  public function walletpassphrasechange($oldpassphrase, $newpassphrase) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$oldpassphrase", "$newpassphrase" ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  /*
   * walletprocesspsbt "psbt" ( sign "sighashtype" bip32derivs )
   *
   * Update a PSBT with input information from our wallet and then sign inputs
   * that we can sign for. Requires wallet passphrase to be set with
   * walletpassphrase call if wallet is encrypted.
   *
   * Arguments:
   *  1. psbt           (string, required) The transaction base64 string
   *  2. sign           (boolean, optional, default=true) Also sign the
   *                    transaction when updating
   *  3. sighashtype    (string, optional, default=ALL) The signature hash type
   *                    to sign with if not specified by the PSBT. Must be one
   *                    of:
   *                       "ALL"
   *                       "NONE"
   *                       "SINGLE"
   *                       "ALL|ANYONECANPAY"
   *                       "NONE|ANYONECANPAY"
   *                       "SINGLE|ANYONECANPAY"
   *  4. bip32derivs    (boolean, optional, default=true) Include BIP 32
   *                    derivation paths for public keys if we know them
   *
   * Result:
   *  {                            (json object)
   *    "psbt" : "str",            (string) The base64-encoded partially signed
   *                               transaction
   *    "complete" : true|false    (boolean) If the transaction has a complete
   *                               set of signatures
   *  }
   *
   * (0.21.1 RPC)
   *
   */
  public function walletprocesspsbt($psbt, $sign = true, $sighashtype = "ALL", $bip32derivs = true) {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;
    $args[ "params" ] = [ "$psbt", $sign, "$sighashtype", $bip32derivs ];

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


  ////////////////////////////////////////
  //                ZMQ                 //
  ////////////////////////////////////////


  /*
   * getzmqnotifications
   *
   * Returns information about the active ZeroMQ notifications.
   *
   * Result:
   *  [                        (json object)
   *    {
   *      "type": "pubhashtx", (string) Type of notification
   *      "address": "..."     (string) Address of the publisher
   *    }
   *  ]
   *
   * (0.21.1 RPC)
   *
   */
  public function getzmqnotifications() {

    $args = $this->args;
    $args[ "method" ] = __FUNCTION__;

    $res = $this->call($args);
    if ($res)
      return $res[ "result" ];
  }


}


?>
