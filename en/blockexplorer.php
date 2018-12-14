<?php

/* Load configuration file */
require "../include/config.php";


/**
   Check which Network shell we provide information on

   By default, assume it is Mainnet on default RPC port TCP 6332,
   otherwise, set port to 16332 for the Testnet. No need to pro-
   vide information on Regtest network.
**/
if(isset($_GET['net'])) {
  $network = $_GET['net'];
  $port = ($network == "testnet") ? 16332 : $port;
} else {
  $network = "mainnet";
}


/* Autoload and register any classes not previously loaded */
spl_autoload_register(function ($class_name){
  $classFile = "../include/" . $class_name . ".php";
  if( is_file($classFile) && ! class_exists($class_name) )
    include $classFile;
});


/* Construct underlying RPC daemon connection credentials */
$server = "$proto://$host:$port";
$auth = "$rpcuser:$rpcpass";


/* Check if debug is of correct type (boolean) */
(is_bool($debug) === true) ? $debug : false;


/* Create a Block object */
$block = new Block($server, $auth, $debug);


/* Provide human readable number formatting */
function prettynum($val, $index = "K", $precision = 4) {

  $res =  "";

  switch($index) {

    case "K":
      $res = round(($val / 1024), $precision) . " K";
      break;
    case "M":
      $res = round(($val / pow(1024, 2)), $precision) . " M";
      break;
    case "G":
      $res = round(($val / pow(1024, 3)), $precision) . " G";
      break;
    case "P":
      $res = round(($val / pow(1024, 4)), $precision) . " P";
      break;
  }

  return $res;
}


/*
 * Prepare transaction inputs/outputs table.
 */
function displayTxTableInOut($block, $hash, $flag = "vout") {

  $str = "";
  $res = $block->getrawtransaction($hash, true);

  if ($flag == "vin") {
    for ($i = 0; $i < $block->getTxCountInOut($hash, $flag); $i++) {
      if (!isset($res[$flag][$i]["coinbase"])) {
        $addresses = $block->getTxVinAddress($res[$flag][$i]["txid"], $res[$flag][$i]["vout"]);
        for ($j = 0; $j < count($addresses); $j++) {
          $addresses_str = "<div>" . $addresses[$j] . "</div>";
        }
        $str .= "<tr>" .
                "<td>" . $block->getTxVinAmount($res[$flag][$i]["txid"], $res[$flag][$i]["vout"]) . " UMK</td>" .
                "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'><a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network . "&txid=" . $res[$flag][$i]["txid"] . "'>" . $res[$flag][$i]["txid"] . "</a></td>" .
                "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
                "</tr>";
      } else {
        $str .= "<tr'>" .
                "<td>" . $block->getreward($res["blockhash"], "hash") . " UMK</td>" .
                "<td>Block reward</td>" .
                "<td>Coinbase</td>" .
                "</tr>";
      }
    }

  } else {
    for ($i = 0; $i < $block->getTxCountInOut($hash, $flag); $i++) {
      if (isset($res[$flag][$i]["scriptPubKey"]["addresses"])) {
        for ($j = 0; $j < count($res[$flag][$i]["scriptPubKey"]["addresses"]); $j++) {
          $addresses_str = "<div>" . $res[$flag][$i]["scriptPubKey"]["addresses"][$j] . "</div>";
        }
      }
      $str .= "<tr>" .
              "<td>" . $res[$flag][$i]["value"] . " UMK</td>" .
              "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'>" . $res[$flag][$i]["scriptPubKey"]["hex"] . "</td>" .
              "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
              "</tr>";
    }
  }

  return $str;
}

?>

<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include 'head'; ?>
<title>Block Explorer - Umkoin</title>

<script>
function displaySearch(type) {

  htmlString = "<form method='get' action='blockexplorer.php'>" +
               "<input hidden name='net' value='<?php echo $network; ?>'>" +
               "<input name='" + type + "' placeholder='Search for " + type + " in Blockchain'>" +
               "<button type='submit'><span><i class='fa fa-search'></i></span> Search</button>" +
               "</form>";

  document.getElementById("notifier").style.display = "none";
  document.getElementById("searcher").innerHTML = htmlString;
  document.getElementById("searcher").style.display = "block";
  if(document.getElementById("viewer") !== null) {
    document.getElementById("viewer").style.display = "none";
    document.getElementById("viewer").innerHTML = "";
  }

  clearTimeout(timerHide);
  timerHide = setTimeout(hideSearch, 60000);
}

function hideSearch() {

  document.getElementById("notifier").style.display = "block";
  document.getElementById("searcher").style.display = "none";
  document.getElementById("searcher").innerHTML = "";
  if(document.getElementById("viewer") !== null) {
    document.getElementById("viewer").style.display = "none";
    document.getElementById("viewer").innerHTML = "";
  }
}

var timerHide = setTimeout(hideSearch, 600000);
</script>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><i class="fa fa-search"></i> Umkoin Block Explorer</h1>

    <?php
    $holder = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network;

    if(!empty($_SERVER['QUERY_STRING'])) {
        $holder = $_SERVER['REQUEST_URI'];
    }

    $h2str = "<h2>Quick Statistics " .
             "<select style='border:0' onchange='if (this.value) window.location.href=this.value'>" .
             "    <option " . (($network == "mainnet") ? 'selected' : '') . " value='" . str_replace('testnet','mainnet',$holder) . "'>mainnet</option>" .
             "    <option " . (($network == "testnet") ? 'selected' : '') . " value='" . str_replace('mainnet','testnet',$holder) . "'>testnet</option>" .
             "</select>" .
             "</h2>";

    print($h2str);
    ?>

    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th onclick="displaySearch('block');"><i class="fa fa-cubes"></i> Block</th>
        <th onclick="displaySearch('txid');"><i class="fa fa-exchange"></i> Transaction</th>
        <th><i class="fa fa-bank"></i> Emission</th>
        <th><i class="fa fa-industry"></i> Mining</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span title="Blockchain height, total amount of blocks starting from zero."><i class="fa fa-signal"></i> Height - <?php print("<a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network . "&block=" . $block->getblockcount() . " '>" . $block->getblockcount() . "</a>"); ?></span>
        </td>
        <td>
          <span title="The number of transactions per seconds in the network."><i class="fa fa-dashboard"></i> Rate - <?php print(round($block->getTxRate(), 4)); ?></span>
        </td>
        <td>
          <span title="Percent of already emitted coins."><i class="fa fa-circle-o-notch"></i> Coverage - <?php print(round($block->getsupply() * 100 / 21000000, 4)); ?>%</span>
        </td>
        <td>
          <span title="Current estimated network hash rate."><i class="fa fa-dashboard"></i> Hash rate - <?php print(prettynum($block->getnetworkhashps(), "G", 3)); ?>H/s</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Last mined block difficulty. Ratio at which at the current hashing speed blocks are mined with 10 minute interval."><i class="fa fa-lock"></i> Difficulty - <?php print(prettynum($block->getdifficulty(), "K", 4)); ?></span>
        </td>
        <td>
          <span title="The number of transactions in the network."><i class="fa fa-database"></i> Total - <?php print($block->getTxCount()); ?></span>
        </td>
        <td>
          <span title="Total UMK supply in circulation."><i class="fa fa-money"></i> Supply - <?php print($block->getsupply()); ?> UMK</span>
        </td>
        <td>
          <span title="Current Reward (for last mined block)."><i class="fa fa-money"></i> Reward - <?php print($block->getreward()); ?> UMK</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Time elapsed for mining last block."><i class="fa fa-hourglass-start"></i> Solve time - <?php print(gmdate("H:i:s", $block->getsolvetime())); ?></span>
        </td>
        <td >
          <?php ($block->getUnconfirmedTxCount() > 0) ? print("<span title='Unconfirmed Transactions'><i class='fa fa-refresh'></i> Queued - " . $block->getUnconfirmedTxCount() . "</span>") : false; ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
    </table>

    <p id="notifier"><i class="fa fa-exclamation-triangle"></i> Click on the column head to get a search form.</p>

    <br>

    <div id="searcher" width="100%" style="text-align: center; display: none;"></div>

    <?php
      $str = "";
      if (isset($_GET['block'])) {

        // Check if block value is set as height or
        // hash and convert it to hash if needed.
        $reqval = "";

        if (preg_match("/[0-9]*[a-f].*/", $_GET["block"])) {
          $reqval = $_GET["block"];
        } else {
          $reqval = $block->getblockhash(intval($_GET["block"], 10));
        }

        $str .= "<div id='viewer' width='100%'>" .

                "<h2><i class='fa fa-cube'></i> Block " . $reqval . "</h2>" .
                "<div title='Block index in the chain, counting from zero (i.e. genesis block).'><i class='fa fa-signal'></i> Height: " . $block->getBlockHeight($reqval) . "</div>" .
                "<div title='Block timestamp displayed as UTC. The timestamp correctness is up to miner, who mined the block.'><i class='fa fa-clock-o'></i> Timestamp: " . date("M d, Y H:i:s", $block->getBlockTime($reqval)) . "</div>" .
                "<div title='How difficult it is to find a solution for the block. More specifically, it`s mathematical expectation for number of hashes someone needs to calculate in order to find a correct nonce value solving the block.'><i class='fa fa-lock'></i> Difficulty: " . $block->getBlockDifficulty($reqval) . "</div>" .
                "<div title='Number of transactions in the block, including coinbase transaction (which transfers block reward to the miner).'><i class='fa fa-exchange'></i> Transactions: " .  $block->getBlockTxCount($reqval) . "</div>" .
                "<div title='Cumulative size of all transactions in the block, including coinbase.'><i class='fa fa-arrows-h'></i> Total transactions size, bytes: " . $block->getblocktransactionssize($reqval) . "</div>" .
                "<div title='Size of the whole block, i.e. block header plus all transactions.'><i class='fa fa-arrows'></i> Total block size, bytes: " . $block->getBlockSize($reqval) . "</div>" .
                "<div title='Sum of values for all transactions in the block.'><i class='fa fa-money'></i> Transactions amount: " . $block->getBlockAmount($reqval) . "</div>" .
                "<div title='Sum of fees for all transactions in the block.'><i class='fa fa-money'></i> Transactions fee: " . $block->getBlockFee($reqval) . "</div>" .
                "<div title='Base value for calculating the block reward. Does not depend on how many transactions are included into the block. Also, this is how many coins the miner would receive if the block contains only coinbase transaction.'><i class='fa fa-money'></i> Base reward: " . $block->getbasereward($reqval, "hash") . "</div>" .
                "<div title='Actual amount of coins the miner received for finding the block.'><i class='fa fa-money'></i> Reward: " . $block->getreward($reqval, "hash") . "</div>" .

                "<h2><i class='fa fa-exchange'></i> Transactions</h2>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-paw'></i> Hash</th>" .
                    "<th><i class='fa fa-money'></i> Fee</th>" .
                    "<th><i class='fa fa-money'></i> Total Amount</th>" .
                    "<th><i class='fa fa-arrows-h'></i> Size</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  $block->getblocktransactionshtml($reqval, $network) .
                "</tbody>" .
                "</table>" .

                "</div>";



      } elseif (isset($_GET['txid'])) {

        // Check if txid value is set as hash.
        $reqval = "";

        if (preg_match("/[0-9]*[a-f].*/", $_GET["txid"])) {
          $reqval = $_GET["txid"];
        }

        // Check if block holding txid was mined and confirmed.
        if ($block->isConfirmed($reqval, "txid")) {
          $confirmtime = $block->getTxConfirmTime($reqval);
          $currenttime = time();
          $elapsed = $currenttime - $confirmtime;
          switch ($elapsed) {
            case $elapsed > 31536000:
              $elapsed = floor($elapsed / 31536000);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " year ago";
              else
                $elapsed_str = $elapsed . " years ago";
              break;
            case $elapsed > 86400:
              $elapsed = floor($elapsed / 86400);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " day ago";
              else
                $elapsed_str = $elapsed . " days ago";
              break;
            case $elapsed > 3600:
              $elapsed = floor($elapsed / 3600);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " hour ago";
              else
                $elapsed_str = $elapsed . " hours ago";
              break;
            case $elapsed > 60:
              $elapsed = floor($elapsed / 60);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " minute ago";
              else
                $elapsed_str = $elapsed . " minutes ago";
              break;
            default:
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " second ago";
              else
                $elapsed_str = $elapsed . " seconds ago";
              break;
          }
          $blockconfirmed = "<div title='The number of network confirmations.'>" .
                            "<i class='fa fa-legal'></i> Confirmations: " .
                            $block->getTxConfirmCount($reqval) .
                            ", since: <i class='fa fa-clock-o'></i> " .
                            date("M d, Y H:i:s", $block->getTxConfirmTime($reqval)) .
                            " (" . (isset($elapsed_str) ? $elapsed_str : "") . ")</div>";
        }

        $str .= "<div id='viewer' width='100%'>" .

                "<h2><i class='fa fa-exchange'></i> Transaction " . $reqval . "</h2>" .
                "<div title='Unique fingerprint of the transaction.'><i class='fa fa-paw'></i> Hash: " . $block->getTxHash($reqval) . "</div>" .
                (isset($blockconfirmed) ? $blockconfirmed : "<div><i class='fa fa-refresh'></i> Transaction is unconfirmed.</div>") .
                "<div title='Money that goes to the miner, who included this transaction into block.'><i class='fa fa-money'></i> Fee: " . $block->getTxFee($reqval) . "</div>" .
                "<div title='Total amount of all outputs in transaction. Note that this does not necessarily reflect the exact amount transferred between peers, since change is considered an output as well, even though it is sent back to the transaction initiator.'><i class='fa fa-money'></i> Sum of outputs: " . $block->getTxSum($reqval) . "</div>" .
                "<div title='Size of the transaction in bytes.'><i class='fa fa-arrows-h'></i> Size: " . $block->getTxSize($reqval) . "</div>" .

                "<h3><i class='fa fa-cube'></i> In block</h3>" .
                "<div><i class='fa fa-paw'></i> Hash: <a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network . "&block=" . $block->getBlockHashByTxid($reqval) . "'>" . $block->getBlockHashByTxid($reqval) . "</a></div>" .
                "<div><i class='fa fa-signal'></i> Height: " . $block->getBlockHeight($reqval, "txid") . "</div>" .
                "<div><i class='fa fa-clock-o'></i> Timestamp: " . date("M d, Y H:i:s", $block->getBlockTime($reqval, "txid")) . "</div>" .

                "<h3><i class='fa fa-sign-in'></i> Inputs (" . $block->getTxCountInOut($reqval, "vin") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Amount</th>" .
                    "<th><i class='fa fa-paw'></i> Hash</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Address</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  displayTxTableInOut($block, $reqval, "vin") .
                "</tbody>" .
                "</table>" .


                "<h3><i class='fa fa-sign-out'></i> Outputs (" . $block->getTxCountInOut($reqval, "vout") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Amount</th>" .
                    "<th><i class='fa fa-paw'></i> Hash</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Address</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  displayTxTableInOut($block, $reqval, "vout") .
                "</tbody>" .
                "</table>" .

                "</div>";

      }

      print($str);

    ?>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
