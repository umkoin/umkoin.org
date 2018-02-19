<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Developer Guide - Umkoin</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">

<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
      <a href="/en/">Umkoin</a>
      &gt;
      <a href="/en/developer-documentation.php">Developer Documentation</a>
      &gt;
      Guide
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Umkoin Developer Guide</h1>
    <p class="summary">Find detailed information about the Umkoin protocol and related specifications.</p>


    <div id="toc" class="toc">
      <div>

        <ul id="markdown-toc">
          <li><a href="#block-chain" id="markdown-toc-block-chain">Block Chain</a>
            <ul>
              <li><a href="#block-chain-overview" id="markdown-toc-block-chain-overview">Block Chain Overview</a></li>
              <li><a href="#proof-of-work" id="markdown-toc-proof-of-work">Proof Of Work</a></li>
              <li><a href="#block-height-and-forking" id="markdown-toc-block-height-and-forking">Block Height And Forking</a></li>
              <li><a href="#transaction-data" id="markdown-toc-transaction-data">Transaction Data</a></li>
              <li><a href="#consensus-rule-changes" id="markdown-toc-consensus-rule-changes">Consensus Rule Changes</a>
                <ul>
                  <li><a href="#detecting-forks" id="markdown-toc-detecting-forks">Detecting Forks</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#transactions" id="markdown-toc-transactions">Transactions</a>
            <ul>
              <li><a href="#p2pkh-script-validation" id="markdown-toc-p2pkh-script-validation">P2PKH Script Validation</a></li>
              <li><a href="#p2sh-scripts" id="markdown-toc-p2sh-scripts">P2SH Scripts</a></li>
              <li><a href="#standard-transactions" id="markdown-toc-standard-transactions">Standard Transactions</a>
                <ul>
                  <li><a href="#non-standard-transactions" id="markdown-toc-non-standard-transactions">Non-Standard Transactions</a></li>
                </ul>
              </li>
              <li><a href="#signature-hash-types" id="markdown-toc-signature-hash-types">Signature Hash Types</a></li>
              <li><a href="#locktime-and-sequence-number" id="markdown-toc-locktime-and-sequence-number">Locktime And Sequence Number</a></li>
              <li><a href="#transaction-fees-and-change" id="markdown-toc-transaction-fees-and-change">Transaction Fees And Change</a></li>
              <li><a href="#avoiding-key-reuse" id="markdown-toc-avoiding-key-reuse">Avoiding Key Reuse</a></li>
              <li><a href="#transaction-malleability" id="markdown-toc-transaction-malleability">Transaction Malleability</a></li>
            </ul>
          </li>
          <li><a href="#contracts" id="markdown-toc-contracts">Contracts</a>
            <ul>
              <li><a href="#escrow-and-arbitration" id="markdown-toc-escrow-and-arbitration">Escrow And Arbitration</a></li>
              <li><a href="#micropayment-channel" id="markdown-toc-micropayment-channel">Micropayment Channel</a></li>
              <li><a href="#coinjoin" id="markdown-toc-coinjoin">CoinJoin</a></li>
            </ul>
          </li>
          <li><a href="#wallets" id="markdown-toc-wallets">Wallets</a>
            <ul>
              <li><a href="#wallet-programs" id="markdown-toc-wallet-programs">Wallet Programs</a>
                <ul>
                  <li><a href="#full-service-wallets" id="markdown-toc-full-service-wallets">Full-Service Wallets</a></li>
                  <li><a href="#signing-only-wallets" id="markdown-toc-signing-only-wallets">Signing-Only Wallets</a>
                    <ul>
                      <li><a href="#offline-wallets" id="markdown-toc-offline-wallets">Offline Wallets</a></li>
                      <li><a href="#hardware-wallets" id="markdown-toc-hardware-wallets">Hardware Wallets</a></li>
                    </ul>
                  </li>
                  <li><a href="#distributing-only-wallets" id="markdown-toc-distributing-only-wallets">Distributing-Only Wallets</a></li>
                </ul>
              </li>
              <li><a href="#wallet-files" id="markdown-toc-wallet-files">Wallet Files</a>
                <ul>
                  <li><a href="#private-key-formats" id="markdown-toc-private-key-formats">Private Key Formats</a>
                    <ul>
                      <li><a href="#wallet-import-format-wif" id="markdown-toc-wallet-import-format-wif">Wallet Import Format (WIF)</a></li>
                      <li><a href="#mini-private-key-format" id="markdown-toc-mini-private-key-format">Mini Private Key Format</a></li>
                    </ul>
                  </li>
                  <li><a href="#public-key-formats" id="markdown-toc-public-key-formats">Public Key Formats</a></li>
                  <li><a href="#hierarchical-deterministic-key-creation" id="markdown-toc-hierarchical-deterministic-key-creation">Hierarchical Deterministic Key Creation</a>
                    <ul>
                      <li><a href="#hardened-keys" id="markdown-toc-hardened-keys">Hardened Keys</a></li>
                      <li><a href="#storing-root-seeds" id="markdown-toc-storing-root-seeds">Storing Root Seeds</a></li>
                    </ul>
                  </li>
                  <li><a href="#loose-key-wallets" id="markdown-toc-loose-key-wallets">Loose-Key Wallets</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#payment-processing" id="markdown-toc-payment-processing">Payment Processing</a>
            <ul>
              <li><a href="#pricing-orders" id="markdown-toc-pricing-orders">Pricing Orders</a></li>
              <li><a href="#requesting-payments" id="markdown-toc-requesting-payments">Requesting Payments</a>
                <ul>
                  <li><a href="#plain-text" id="markdown-toc-plain-text">Plain Text</a></li>
                  <li><a href="#umkoin-uri" id="markdown-toc-umkoin-uri">umkoin: URI</a></li>
                  <li><a href="#qr-codes" id="markdown-toc-qr-codes">QR Codes</a></li>
                  <li><a href="#payment-protocol" id="markdown-toc-payment-protocol">Payment Protocol</a></li>
                </ul>
              </li>
              <li><a href="#verifying-payment" id="markdown-toc-verifying-payment">Verifying Payment</a></li>
              <li><a href="#issuing-refunds" id="markdown-toc-issuing-refunds">Issuing Refunds</a></li>
              <li><a href="#disbursing-income-limiting-forex-risk" id="markdown-toc-disbursing-income-limiting-forex-risk">Disbursing Income (Limiting Forex Risk)</a>
                <ul>
                  <li><a href="#merge-avoidance" id="markdown-toc-merge-avoidance">Merge Avoidance</a></li>
                  <li><a href="#last-in-first-out-lifo" id="markdown-toc-last-in-first-out-lifo">Last In, First Out (LIFO)</a></li>
                  <li><a href="#first-in-first-out-fifo" id="markdown-toc-first-in-first-out-fifo">First In, First Out (FIFO)</a></li>
                </ul>
              </li>
              <li><a href="#rebilling-recurring-payments" id="markdown-toc-rebilling-recurring-payments">Rebilling Recurring Payments</a></li>
            </ul>
          </li>
          <li><a href="#operating-modes" id="markdown-toc-operating-modes">Operating Modes</a>
            <ul>
              <li><a href="#full-node" id="markdown-toc-full-node">Full Node</a></li>
              <li><a href="#simplified-payment-verification-spv" id="markdown-toc-simplified-payment-verification-spv">Simplified Payment Verification (SPV)</a>
                <ul>
                  <li><a href="#potential-spv-weaknesses" id="markdown-toc-potential-spv-weaknesses">Potential SPV Weaknesses</a></li>
                  <li><a href="#bloom-filters" id="markdown-toc-bloom-filters">Bloom Filters</a></li>
                  <li><a href="#application-of-bloom-filters" id="markdown-toc-application-of-bloom-filters">Application Of Bloom Filters</a></li>
                </ul>
              </li>
              <li><a href="#future-proposals" id="markdown-toc-future-proposals">Future Proposals</a></li>
            </ul>
          </li>
          <li><a href="#p2p-network" id="markdown-toc-p2p-network">P2P Network</a>
            <ul>
              <li><a href="#peer-discovery" id="markdown-toc-peer-discovery">Peer Discovery</a></li>
              <li><a href="#connecting-to-peers" id="markdown-toc-connecting-to-peers">Connecting To Peers</a></li>
              <li><a href="#initial-block-download" id="markdown-toc-initial-block-download">Initial Block Download</a>
                <ul>
                  <li><a href="#blocks-first" id="markdown-toc-blocks-first">Blocks-First</a></li>
                  <li><a href="#headers-first" id="markdown-toc-headers-first">Headers-First</a></li>
                </ul>
              </li>
              <li><a href="#block-broadcasting" id="markdown-toc-block-broadcasting">Block Broadcasting</a>
                <ul>
                  <li><a href="#orphan-blocks" id="markdown-toc-orphan-blocks">Orphan Blocks</a></li>
                </ul>
              </li>
              <li><a href="#transaction-broadcasting" id="markdown-toc-transaction-broadcasting">Transaction Broadcasting</a>
                <ul>
                  <li><a href="#memory-pool" id="markdown-toc-memory-pool">Memory Pool</a></li>
                </ul>
              </li>
              <li><a href="#misbehaving-nodes" id="markdown-toc-misbehaving-nodes">Misbehaving Nodes</a></li>
              <li><a href="#alerts" id="markdown-toc-alerts">Alerts</a></li>
            </ul>
          </li>
          <li><a href="#mining" id="markdown-toc-mining">Mining</a>
            <ul>
              <li><a href="#solo-mining" id="markdown-toc-solo-mining">Solo Mining</a></li>
              <li><a href="#pool-mining" id="markdown-toc-pool-mining">Pool Mining</a></li>
              <li><a href="#block-prototypes" id="markdown-toc-block-prototypes">Block Prototypes</a>
                <ul>
                  <li><a href="#getwork-rpc" id="markdown-toc-getwork-rpc">getwork RPC</a></li>
                  <li><a href="#getblocktemplate-rpc" id="markdown-toc-getblocktemplate-rpc">getblocktemplate RPC</a></li>
                  <li><a href="#stratum" id="markdown-toc-stratum">Stratum</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="goback"><li><a href="/en/developer-documentation.php">Return To Overview</a></li></ul>
        <ul class="reportissue"><li><a href="https://github.com/umkoin/umkoin.org/issues/new" onmouseover="updateIssue(event);">Report An Issue</a></li></ul>
        <ul class="editsource"><li><a href="https://github.com/umkoin/umkoin.org/tree/master/_includes" onmouseover="updateSource(event);">Edit On GitHub</a></li></ul>
      </div>
    </div>


    <div class="toccontent">

      <!--Temporary disclaimer BEGIN-->
      <div id="develdocdisclaimer" class="develdocdisclaimer">
        <div>
          <b>BETA</b>: This documentation has not been extensively reviewed by Umkoin experts and so likely contains numerous errors. Please use the <em>Issue</em> and <em>Edit</em> links on the bottom left menu to help us improve. To close this disclaimer
          <a href="#" onclick="disclaimerClose(event);">click here</a>
          <a class="develdocdisclaimerclose" onclick="disclaimerClose(event);">X</a>
        </div>
      </div>
      <script>disclaimerAutoClose();</script>
      <!--Temporary disclaimer END-->

      <p>The Developer Guide aims to provide the information you need to understand Umkoin and start building Umkoin-based applications, but it is <a href="/en/developer-reference#not-a-specification">not a specification</a>. To make the best use of this documentation, you may want to install the current version of Umkoin Core, either from <a href="https://github.com/umkoin/umkoin">source</a> or from a <a href="/en/download.php">pre-compiled executable</a>.</p>
      <p>In the following documentation, some strings have been shortened or wrapped: “[…]” indicates extra data was removed, and lines ending in a single backslash “\” are continued below. If you hover your mouse over a paragraph, cross-reference links will be shown in blue.  If you hover over a cross-reference link, a brief definition of the term will be displayed in a tooltip.</p>

      <h2 id="block-chain">Block Chain</h2>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>
      </div>
      <p>The <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> provides Umkoin’s public ledger, an ordered and timestamped record of transactions. This system is used to protect against <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double spending</a> and modification of previous transaction records.</p>
      <p>Each <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> in te Umkoin <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> independently stores a <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> containing only <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> validated by that <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. When several <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> all have the same <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> in their <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, they are considered to be in <a href="/en/glossary/consensus.php" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." id="term-consensus" class="term">consensus</a>. The <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">validation rules</a> these <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> follow to maintain <a href="/en/glossary/consensus.php" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." class="auto-link">consensus</a> are called <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." id="term-consensus-rules" class="term">consensus rules</a>. This section describes many of the <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> used by Umkoin Core.</p>

      <h3 id="block-chain-overview">Block Chain Overview</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>
      </div>
      <p><img src="/img/dev/en-blockchain-overview.svg" alt="Block Chain Overview" /></p>
      <p>The illustration above shows a simplified version of a <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. A <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." id="term-block" class="term">block</a> of one or more new transactions is collected into the transaction data part of a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. Copies of each transaction are hashed, and the hashes are then paired, hashed, paired again, and hashed again until a single hash remains, the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." id="term-merkle-root" class="term">merkle root</a> of a <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a>.</p>
      <p>The <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> is stored in the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a>. Each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> also stores the hash of the previous <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block’s</a> <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a>, chaining the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> together. This ensures a transaction cannot be modified without modifying the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> that records it and all following <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>.</p>
      <p>Transactions are also chained together. Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software gives the impression that <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are sent from and to <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>, but <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> really move from transaction to transaction. Each transaction spends the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> previously received in one or more earlier transactions, so the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> of one transaction is the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> of a previous transaction.</p>
      <p><img src="/img/dev/en-transaction-propagation.svg" alt="Transaction Propagation" /></p>
      <p>A single transaction can create multiple <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, as would be the case when sending to multiple <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>, but each <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> of a particular transaction can only be used as an <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> once in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. Any subsequent reference is a forbidden <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double spend</a>—an attempt to spend the same <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> twice.</p>
      <p><a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Outputs</a> are tied to <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." id="term-txid" class="term">transaction identifiers (TXIDs)</a>, which are the hashes of signed transactions.</p>
      <p>Because each <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> of a particular transaction can only be spent once, the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> of all transactions included in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> can be categorized as either <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spentnput in a new transaction." id="term-utxo" class="term">Unspent Transaction Outputs (UTXOs)</a> or spent transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>. For a payment to be valid, it must only use <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> as <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>.</p>
      <p>Ignoring <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transactions</a> (described later), if the value of a transaction’s <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> exceed its <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>, the transaction will be rejected—but if the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> exceed the value of the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, any difference in value may be claimed as a <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." id="term-transaction-fee" class="term">transaction fee</a> by the Umkoin <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." id="term-miner" class="term">miner</a> who creates the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> containing that transaction. For example, in the illustration above, each transaction spends 10,000 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> fewer than it receives from its combined <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>, effectively paying a 10,000 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshi</a> <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>.</p>

      <h3 id="proof-of-work">Proof Of Work</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>
      </div>
      <p>The <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> is collaboratively maintained by anonymous <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, so Umkoin requires that each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> prove a significant amount of work was invested in its creation to ensure that untrustworthy <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> who want to modify past <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> have to work harder than honest <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> who only want to add new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>
      <p>Chaining <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> together makes it impossible to modify transactions included in any <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> without modifying all following <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>. As a result, the cost to modify a particular <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> increases with every new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, magnifying the effect of the <a href="/en/glossary/proof-of-work.php" title="A hash blow a target value which can only be obtained, on average, by performing a certain amount of brute force work---therefore demonstrating proof of work." class="auto-link">proof of work</a>.</p>
      <p>The <a href="/en/glossary/proof-of-work.php" title="A hash below a target value which can only be obtained, on average, by performing a certain amount of brute force work---therefore demonstrating proof of work." id="term-proof-of-work" class="term">proof of work</a> used in Umkoin takes advantage of the apparently random nature of cryptographic hashes. A good cryptographic hash algorithm converts arbitrary data into a seemingly-random number. If the data is modified in any way and the hash re-run, a new seemingly-random number is produced, so there is no way to modify the data to make the hash number predictable.</p>
      <p>To prove you did some extra work to create a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, you must create a hash of the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> which does not exceed a certain value. For example, if the maximum possible hash value is <span class="math">2<sup>256</sup> − 1</span>, you can prove that you tried up to two combinations by producing a hash value less than <span class="math">2<sup>255</sup></span>.</p>
      <p>In the example given above, you will produce a successful hash on average every other try. You can even estimate the probability that a given hash attempt will generate a number below the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." id="term-target" class="term">target</a> threshold. Umkoin assumes a linear probability that the lower it makes the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a>, the more hash attempts (on average) will need to be tried.</p>
      <p>New <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> will only be added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> if their hash is at least as challenging as a <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." id="term-difficulty" class="term">difficulty</a> value expected by the <a href="/en/glossary/consensus.php" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." class="auto-link">consensus</a> protocol. Every 2,016 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> uses timestamps stored in each <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> to calculate the number of seconds elapsed between generation of the first and last of those last 2,016 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>. The ideal value is 1,209,600 seconds (two weeks).</p>

      <ul>
        <li>
          <p>If it took fewer than two weeks to generate the 2,016 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, the expected <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> value is increased proportionally (by as much as 300%) so that the next 2,016 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> should take exactly two weeks to generate if hashes are checked at the same rate.</p>
        </li>
        <li>
          <p>If it took more than two weeks to generate the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, the expected <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> value is decreased proportionally (by as much as 75%) for the same reason.</p>
        </li>
      </ul>

      <p>(Note: an off-by-one error in the Umkoin Core implementation causes the <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> to be updated every 2,01<em>6</em> <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> using timestamps from only 2,01<em>5</em> <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, creating a slight skew.)</p>
      <p>Because each <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> must hash to a value below the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a>, and because each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is linked to the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> that preceded it, it requires (on average) as much hashing power to propagate a modified <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> as the entire Umkoin <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> expended between the time the original <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> was created and the present time. Only if you acquired a majority of the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network’s</a> hashing power could you reliably execute such a <a href="/en/glossary/51-percent-attack.php" title="The ability of someone controlling a majority of network hash rate to revise transaction history and prevent new transactions from confirming." id="term-51-attack" class="term">51 percent attack</a> against transaction history (although, it should be noted, that even less than 50% of the hashing power still has a good chance of performing such attacks).</p>
      <p>The <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> provides several easy-to-modify fields, such as a dedicated nonce field, so obtaining new hashes doesn’t require waiting for new transactions. Also, only the 80-byte <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> is hashed for proof-of-work, so including a large volume of transaction data in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> does not slow down hashing with extra I/O, and adding additional transaction data only requires the recalculation of the ancestor hashes in the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a>.</p>

      <h3 id="block-height-and-forking">Block Height And Forking</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>
      </div>
      <p>Any Umkoin <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> who successfully hashes a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> to a value below the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> can add the entire <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> (assuming the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is otherwise valid). These <a href="/en/glossary/block.php" title="One or more trans prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> are commonly addressed by their <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." id="term-block-height" class="term">block height</a>—the number of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> between them and the first Umkoin <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> (<a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">block 0</a>, most commonly known as the <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." id="term-genesis-block" class="term">genesis block</a>). For example, <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 2016 is where <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> could have first been adjusted.</p>
      <p><img src="/img/dev/en-blockchain-fork.svg" alt="Common And Uncommon Block Chain Forks" /></p>
      <p>Multiple <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> can all have the same <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>, as is common when two or more <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> each produce a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> at roughly the same time. This creates an apparent <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." id="term-fork" class="term">fork</a> in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, as shown in the illustration above.</p>
      <p>When <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> produce simultaneous <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> at the end of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, each <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> individually chooses which <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to accept. In the absence of other considerations, discussed below, <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> usually use the first <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> they see.</p>
      <p>Eventually a <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> produces another <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> which attaches to only one of the competing simultaneously-mined <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>. This makes that side of the <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> stronger than the other side. Assuming a <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> only contains valid <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, normal <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> always follow the most difficult chain to recreate and throw away <a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." id="term-stale-block" class="term">stale blocks</a> belonging to shorter <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">forks</a>. (<a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">Stale blocks</a> are also sometimes called orphans or orphan blocks, but those terms are also used for true <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan blocks</a> without a known parent <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.)</p>
      <p>Long-term <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">forks</a> are possible if different <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are deices that mine or people who own those devices." class="auto-link">miners</a> work at cross-purposes, such as some <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> diligently working to extend the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> at the same time other <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> are attempting a <a href="/en/glossary/51-percent-attack.php" title="The ability of someone controlling a majority of network hash rate to revise transaction history and prevent new transactions from confirming." class="auto-link">51 percent attack</a> to revise transaction history.</p>
      <p>Since multiple <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> can have the same <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">height</a> during a <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a>, <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a> should not be used as a globally unique identifier. Instead, <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> are usually referenced by the hash of their <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> (often with the byte order reversed, and in hexadecimal).</p>

      <h3 id="transaction-data">Transaction Data</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>
      </div>
      <p>Every <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> must include one or more transactions. The first one of these transactions must be a <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>, also called a <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto->generation transaction</a>, which should collect and spend the <a href="/en/glossary/block-reward.php" title="The amount that miners may claim as a reward for creating a block. Equal to the sum of the block subsidy (newly available satoshis) plus the transactions fees paid by transactions included in the block." class="auto-link">block reward</a> (comprised of a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> subsidy and any <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a> paid by transactions included in this <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>).</p>
      <p>The <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> of a <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> has the special condition that it cannot be spent (used as an <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>) for at least 100 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>. This temporarily prevents a <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> from spending the <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a> and <a href="/en/glossary/block-reward.php" title="The amount that miners may claim as a reward for creating a block. Equal to the sum of the block subsidy (newly available satoshis) plus the transactions fees paid by transactions included in the block." class="auto-link">block reward</a> from a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> that may later be determined to be stale (and therefore the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> destroyed) after a <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a>.</p>
      <p><a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">Blocks</a> are not required to include any non-<a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transactions</a>, but <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> almost always do include additional transactions in order to collect their <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>.</p>
      <p>All transactions, including the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>, are encoded into <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> in binary rawtransaction format.</p>
      <p>The rawtransaction format is hashed to create the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">transaction identifier</a> (<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>). From these <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txids</a>, the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." id="term-merkle-tree" class="term">merkle tree</a> is constructed by pairing each <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> with one other <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> and then hashing them together. If there are an odd number of <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txids</a>, the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> without a partner is hashed with a copy of itself.</p>
      <p>The resulting hashes themselves are each paired with one other hash and hashed together. Any hash without a partner is hashed with itself. The process repeats until only one hash remains, the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a>.</p>
      <p>For example, if transactions were merely joined (not hashed), a five-transaction <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a> would look like the following text diagram:</p>
      <pre><code>       ABCDEEEE .......Merkle root
      /        \
   ABCD        EEEE
  /    \      /
 AB    CD    EE .......E is paired with itself
/  \  /  \  /
A  B  C  D  E .........Transactons
</code></pre>

      <p>As discussed in the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">Simplified Payment Verification</a> (<a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a>) subsection, the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a> allows clients to verify for themselves that a transaction was included in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> by obtaining the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> from a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> and a list of the intermediate hashes from a full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>. The full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> does not need to be trusted: it is expensive to fake <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a> and the intermediate hashes cannot be faked or the verification will fail.</p>
      <p>For example, to verify transaction D was added to the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, an <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> only needs a copy of the C, AB, and EEEE hashes in addition to the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a>; the client doesn’t need to know anything about any of the other transactions. If the five transactions in this <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> were all at the maximum size, downloading the entire <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> would require over 500,000 bytes—but downloading three hashes plus the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> requires only 140 bytes.</p>
      <p>Note: If identical <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-li>txids</a> are found within the same <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, there is a possibility that the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a> may collide with a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> with some or all duplicates removed due to how unbalanced <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle trees</a> are implemented (duplicating the lone hash). Since it is impractical to have separate transactions with identical <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txids</a>, this does not impose a burden on honest software, but must be checked if the invalid status of a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is to be cached; otherwise, a valid <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> with the duplicates eliminated could have the same <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> and <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> hash, but be rejected by the cached invalid outcome, resulting in security bugs such as <a href="https://en.bitcoin.it/wiki/CVEs#CVE-2012-2459" class="auto-link">CVE-2012-2459</a>.</p>

      <h3 id="consensus-rule-changes">Consensus Rule Changes</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>
      </div>

<!-- CONTINUE FROM HERE //-->
  <p>To maintain <a href="/en/glossary/consensus.php" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." class="auto-link">consensus</a>, all full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> validate <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> using the same
<a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a>. However, sometimes the <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> are changed to
introduce new features or prevent <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> abuse. When the new rules are
implemented, there will likely be a period of time when non-upgraded
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> follow the old rules and upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> follow the new rules,
creating two possible ways <a href="/en/glossary/consensus.php" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." class="auto-link">consensus</a> can break:</p>

  <ol>
    <li>
      <p>A <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> following the new <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> is accepted by upgraded
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> but rejected by non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. For example, a new
transaction feature is used within a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>: upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> understand
the feature and accept it, but non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> reject it because
it violates the old rules.</p>
    </li>
    <li>
      <p>A <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> violating the new <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> is rejected by upgraded
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> but accepted by non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. For example, an abusive
transaction feature is used within a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>: upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> reject it
because it violates the new rules, but non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> accept it
because it follows the old rules.</p>
    </li>
  </ol>

  <p>In the first case, rejection by non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>, <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software
which gets <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best bock chain." class="auto-link">block chain</a> data from those non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> refuses to
build on the same chain as <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software getting data from upgraded
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. This creates permanently divergent chains—one for non-upgraded
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> and one for upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>—called a <a href="/en/glossary/hard-fork" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." id="term-hard-fork" class="term">hard
fork</a>.</p>

  <p><img src="/img/dev/en-hard-fork.svg" alt="Hard Fork" /></p>

  <p>In the second case, rejection by upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>, it’s possible to keep
the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> from permanently diverging if upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> control a
majority of the hash rate. That’s because, in this case, non-upgraded
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> will accept as valid all the same <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> as upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>, so the
upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> can build a stronger chain that the non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>
will accept as the best valid <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. This is called a <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." id="term-soft-fork" class="term">soft
fork</a>.</p>

  <p><img src="/img/dev/en-soft-fork.svg" alt="Soft Fork" /></p>

  <p>Although a <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> is an actual divergence in <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chains</a>, changes to the
<a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> are often described by their potential to create either
a hard or <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft fork</a>. For example, “increasing the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> size above 1 MB
requires a <a href="/en/glossary/hard-fork" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." class="auto-link">hard fork</a>.” In this example, an actual <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> is
not required—but it is a possible outcome.</p>

  <p><a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">Consensus rule</a> changes may be activated in various ways. During Umkoin’s 
first two years, <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">Satoshi</a> Nakamoto performed several <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft forks</a> by just 
releasing the backwards-compatible change in a client that began immediately 
enforcing the new rule. Multiple <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft forks</a> such as <a href="https://github.com/bitcoin/bips/blob/master/bip-0030.mediawiki" class="auto-link">BIP30</a> have
been activated via a flag day where the new rule began to be enforced at a 
preset time or <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>. Such <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">forks</a> activated via a flag day are known as
<a href="/en/glossary/uasf" title="A Soft Fork activated by flag day or node enforcement instead of miner signalling." id="term-uasf" class="term">User Activated Soft Forks</a> (<a href="/en/glossary/uasf" title="A Soft Fork activated by flag day or node enforcement instead of miner signalling." class="auto-link">UASF</a>) as
they are dependent on having sufficient users (<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>) to enforce the new rules
after the flag day.</p>

  <p>Later <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft forks</a> waited for a majority of hash rate (typically 75% or 95%) 
to signal their readiness for enforcing the new <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a>. Once the signalling
threshold has been passed, all <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> will begin enforcing the new rules. Such
<a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">forks</a> are known as <a href="/en/glossary/masf" title="A Soft Fork activated by through miner signalling." id="term-masf" class="term">Miner Activated Soft Forks</a> (<a href="/en/glossary/masf" title="A Soft Fork activated by through miner signalling." class="auto-link">MASF</a>)
as they are dependent on <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> for activation.</p>

  <p><strong>Resources:</strong> <a href="https://github.com/bitcoin/bips/blob/master/bip-0016.mediawiki">BIP16</a>, <a href="https://github.com/bitcoin/bips/blob/master/bip-0030.mediawiki">BIP30</a>, and <a href="https://github.com/bitcoin/bips/blob/master/bip-0034.mediawiki">BIP34</a> were implemented as
changes which might have lead to <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft forks</a>. <a href="https://github.com/bitcoin/bips/blob/master/bip-0050.mediawiki">BIP50</a> describes both an
accidental <a href="/en/glossary/hard-fork" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." class="auto-link">hard fork</a>, resolved by temporary downgrading the capabilities
of upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>, and an intentional <a href="/en/glossary/hard-fork" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." class="auto-link">hard fork</a> when the temporary
downgrade was removed. A document from Gavin Andresen outlines <a href="https://gist.github.com/gavinandresen/2355445">how
future rule changes may be
implemented</a>.</p>

  <h4 id="detecting-forks">Detecting Forks</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/block_chain.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/block_chain.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/block_chain.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/block_chain.md%0A%0A">Report Issue</a>

</div>

  <p>Non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> may use and distribute incorrect information during
both types of <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">forks</a>, creating several situations which could lead to
financial loss. In particular, non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to toin network." class="auto-link">nodes</a> may relay and accept
transactions that are considered invalid by upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> and so will
never become part of the universally-recognized <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>.
Non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> may also refuse to relay <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> or transactions which
have already been added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>, or soon will be, and so
provide incomplete information.</p>

  <p>Umkoin Core includes code that detects a <a href="/en/glossary/hard-fork" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." class="auto-link">hard fork</a> by looking at <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block
chain</a> <a href="/en/glossary/proof-of-work.php" title="A hash below a target value which can only be obtained, on average, by performing a certain amount of brute force work---therefore demonstrating proof of work." class="auto-link">proof of work</a>. If a non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> receives <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a>
demonstrating at least six <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> more <a href="/en/glossary/proof-of-work.php" title="A hash below a target value which can only be obtained, on average, by performing a certain amount of brute force work---therefore demonstrating proof of work." class="auto-link">proof of work</a> than the best chain
it considers valid, the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> reports a warning in the <a href="/en/developer-reference#getnetworkinfo" class="auto-link"><code>getnetworkinfo</code> RPC</a>
results and runs the <code>-alertnotify</code> command if set.  This warns the
operator that the non-upgraded <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can’t switch to what is likely the
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that receded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>.</p>

  <p>Full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> can also check <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and transaction version numbers. If the
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> or transaction version numbers seen in several recent <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> are
higher than the version numbers the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> uses, it can assume it doesn’t
use the current <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a>. Umkoin Core reports this situation 
through the <a href="/en/developer-reference#getnetworkinfo" class="auto-link"><code>getnetworkinfo</code> RPC</a> and <code>-alertnotify</code> command if set.</p>

  <p>In either case, <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and transaction data should not be relied upon 
if it comes from a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> that apparently isn’t using the current 
<a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a>.</p>

  <p><a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV clients</a> which connect to full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> can detect a likely <a href="/en/glossary/hard-fork" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." class="auto-link">hard fork</a> by
connecting to several full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> and ensuring that they’re all on the
same chain with the same <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>, plus or minus several <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to
account for transmission delays and <a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">stale blocks</a>.  If there’s a
divergence, the client can disconnect from <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> with weaker chains.</p>

  <p><a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV clients</a> should also monitor for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and <a href="/en/developer-guide.php#term-transaction-version-number" title="A version number prefixed to transactions to allow upgrading&quot;" class="auto-link">transaction version number</a>
increases to ensure they process received transactions and create new
transactions using the current <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a>.</p>

  <h2 id="transactions">Transactions</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>

</div>

  <p>Transactions let users spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>. Each transaction is constructed
out of several parts which enable both simple direct payments and complex
transactions. This section will describe each part and
demonstrate how to use them together to build complete transactions.</p>

  <p>To keep things simple, this section pretends <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transactions</a> do
not exist. <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">Coinbase transactions</a> can only be created by Umkoin <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a>
and they’re an exception to many of the rules listed below. Instead of
pointing out the <a href="/en/glossary/coinbase" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase</a> exception to each rule, we invite you to read
about <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transactions</a> in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> section of this guide.</p>

  <p><img src="/img/dev/en-tx-overview.svg" alt="The Parts Of A Transaction" /></p>

  <p>The figure above shows the main parts of a Umkoin transaction. Each
transaction has at least one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> and one <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>. Each <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." id="term-input" class="term">input</a> spends the
<a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> paid to a previous <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>. Each <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." id="term-output" class="term">output</a> then waits as an Unspent
Transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Output</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>) until a later <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> spends it. When your
Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> tells you that you have a 10,000 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshi</a> balance, it really
means that you have 10,000 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> waiting in one or more <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>.</p>

  <p>Each transaction is prefixed by a four-byte <a href="/en/developer-guide.php#term-transaction-version-number" title="A version number prefixed to transactions to allow upgrading&quot;" id="term-transaction-version-number" class="term">transaction version number</a> which tells
Umkoin <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> and <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> which set of rules to use to validate it.  This
lets developers create new rules for future transactions without
invalidating previous transactions.</p>

  <p><img src="/img/dev/en-tx-overview-spending.svg" alt="Spending An Output" /></p>

  <p>An <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for iing what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> has an implied index number based on its location in the
transaction—the index of the first <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> is zero. The <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> also has an
amount in <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> which it pays to a conditional <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>. Anyone
who can satisfy the conditions of that <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> can spend up to the
amount of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> paid to it.</p>

  <p>An <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> uses a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">transaction identifier</a> (<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>) and an <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> number
(often called “vout” for <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> vector) to identify a particular <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> to
be spent. It also has a <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> which allows it to provide data
parameters that satisfy the conditionals in the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>. (The <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence
number</a> and <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> are related and will be covered together in
a later subsection.)</p>

  <p>The figures below help illustrate how these features are used by
showing the workflow Alice uses to send Bob a transaction and which Bob
later uses to spend that transaction. Both Alice and Bob will use the
most common form of the standard Pay-To-Public-Key-Hash (P2PKH) transaction
type. <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." id="term-p2pkh" class="term">P2PKH</a> lets Alice spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to a typical Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>,
and then lets Bob further spend those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> using a simple
cryptographic <a href="/en/developer-guide.php#term-key-pair" title="A private key and its derived public key" class="auto-link">key pair</a>.</p>

  <p><img src="/img/dev/en-creating-p2pkh-output.svg" alt="Creating A P2PKH Public Key Hash To Receive Payment" /></p>

  <p>Bob must first generate a private/public <a href="/en/developer-guide.php#term-key-pair" title="A private key and its derived public key" id="term-key-pair" class="term">key pair</a> before Alice can create the
first transaction. Umkoin uses the Elliptic Curve Digital <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">Signature</a> Algorithm (<a href="https://en.wikipedia.org/wiki/Elliptic_Curve_DSA" class="auto-link">ECDSA</a>) with
the <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> curve; <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." id="term-private-key" class="term">private keys</a> are 256 bits of random
data. A copy of that data is deterministically transformed into an <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the eypair." id="term-public-key" class="term">public
key</a>. Because the transformation can be reliably repeated later, the
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> does not need to be stored.</p>

  <p>The <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> (<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">pubkey</a>) is then cryptographically hashed. This <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> can
also be reliably repeated later, so it also does not need to be stored.
The hash shortens and obfuscates the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>, making manual
transcription easier and providing security against
unanticipated problems which might allow reconstruction of <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>
from <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> data at some later point.</p>

  <p>Bob provides the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> to Alice. <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">Pubkey hashes</a> are almost always
sent encoded as Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." id="term-address" class="term">addresses</a>, which are <a href="/en/glossary/base58check" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">base58</a>-encoded strings
containing an <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> version number, the hash, and an error-detection
checksum to catch typos. The <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> can be transmitted
through any medium, including one-way mediums which prevent the spender
from communicating with the receiver, and it can be further encoded
into another format, such as a QR code containing a <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code>
URI</a>.</p>

  <p>Once Alice has the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> and decodes it back into a standard hash, she
can create the first transaction. She creates a standard P2PKH
transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> containing instructions which allow anyone to spend that
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> if they can prove they control the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> corresponding to
Bob’s hashed <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>. These instructions are called the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." id="term-pubkey-script" class="term">pubkey script</a>
or <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">scriptPubKey</a>.</p>

  <p>Alice broadcasts the transaction and it is added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.
The <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> categorizes it as an Unspent Transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Output</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>), and Bob’s
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software displays it as a spendable balance.</p>

  <p>When, some time later, Bob decides to spend the <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>, he must create an
<a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> which references the transaction Alice created by its hash, called
a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">Transaction Identifier</a> (<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>), and the specific <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> she used by its
index number (<a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" id="term-output-index" class="term">output index</a>). He must then create a <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." id="term-signature-script" class="term">signature
script</a>—a
collection of data parameters which satisfy the conditions Alice placed
in the previous <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output’s</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>.  <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">Signature scripts</a> are also
called <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">scriptSigs</a>.</p>

  <p><a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">Pubkey scripts</a> and <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature scripts</a> combine <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">pubkeys</a>
and <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> with conditional logic, creating a programmable
authorization mechanism.</p>

  <p><img src="/img/dev/en-unlocking-p2pkh-output.svg" alt="Unlocking A P2PKH Output For Spending" /></p>

  <p>For a P2PKH-style <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, Bob’s <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> will contain the following two
pieces of data:</p>

  <ol>
    <li>
      <p>His full (unhashed) <a href="/en/glossary/public-key" title="The public portion of a keypai can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>, so the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> can check that it
hashes to the same value as the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> provided by Alice.</p>
    </li>
    <li>
      <p>An <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." id="term-signature" class="term">signature</a> made by using the <a href="https://en.wikipedia.org/wiki/Elliptic_Curve_DSA" class="auto-link">ECDSA</a> cryptographic formula to combine
certain transaction data (described below) with Bob’s <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>.
This lets the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> verify that Bob owns the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> which
created the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.</p>
    </li>
  </ol>

  <p>Bob’s <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">secp256k1 signature</a> doesn’t just prove Bob controls his <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>; it also
makes the non-<a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>-script parts of his transaction tamper-proof so Bob can safely
broadcast them over the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>.</p>

  <p><img src="/img/dev/en-signing-output-to-spend.svg" alt="Some Things Signed When Spending An Output" /></p>

  <p>As illustrated in the figure above, the data Bob signs includes the
<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> and <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> of the previous transaction, the previous
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output’s</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>, the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> Bob creates which will let the next
recipient spend this transaction’s <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, and the amount of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to
spend to the next recipient. In essence, the entire transaction is
signed except for any <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature scripts</a>, which hold the full <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> and
<a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">secp256k1 signatures</a>.</p>

  <p>After putting his <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> and <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> in the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>, Bob
broadcasts the transaction to Umkoin <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> through the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer
network</a>. Each <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> and <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> independently validates the transaction
before broadcasting it further or attempting to include it in a new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> of
transactions.</p>

  <h3 id="p2pkh-script-validation">P2PKH Script Validation</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>

</div>

  <p>The validation procedure requires evaluation of the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> and <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>.
In a <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH output</a>, the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> is:</p>

  <pre><code>OP_DUP OP_HASH160 &lt;PubkeyHash&gt; OP_EQUALVERIFY OP_CHECKSIG
</code></pre>

  <p>The spender’s <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> is evaluated and prefixed to the beginning of the
script. In a P2PKH transaction, the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> contains an <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">secp256k1 signature</a> (sig)
and full <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> (<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">pubkey</a>), creating the following concatenation:</p>

  <pre><code>&lt;Sig&gt; &lt;PubKey&gt; OP_DUP OP_HASH160 &lt;PubkeyHash&gt; OP_EQUALVERIFY OP_CHECKSIG
</code></pre>

  <p>The script language is a
<a href="https://en.wikipedia.org/wiki/Forth_%28programming_language%29">Forth-like</a>
stack-based language deliberately designed to be stateless and not
Turing complete. Statelessness ensures that once a transaction is added
to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, there is no condition which renders it permanently
unspendable. Turing-incompleteness (specifically, a lack of loops or
gotos) makes the script language less flexible and more ptable,
greatly simplifying the security model.</p>

  <p>To test whether the transaction is valid, <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> and <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> operations
are executed one item at a time, starting with Bob’s <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>
and continuing to the end of Alice’s <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>. The figure below shows the
evaluation of a standard <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH pubkey script</a>; below the figure is a description
of the process.</p>

  <p><img src="/img/dev/en-p2pkh-stack.svg" alt="P2PKH Stack Evaluation" /></p>

  <ul>
    <li>
      <p>The <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> (from Bob’s <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>) is added (pushed) to an empty stack.
Because it’s just data, nothing is done except adding it to the stack.
The <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> (also from the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>) is pushed on top of the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>.</p>
    </li>
    <li>
      <p>From Alice’s <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>, the <a href="/en/developer-reference#term-op-dup" title="Operation which duplicates the entry below it on the stack" class="auto-link"><code>OP_DUP</code></a> operation is executed. <a href="/en/developer-reference#term-op-dup" title="Operation which duplicates the entry below it on the stack" class="auto-link"><code>OP_DUP</code></a> pushes onto the stack
a copy of the data currently at the top of it—in this
case creating a copy of the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> Bob provided.</p>
    </li>
    <li>
      <p>The operation executed next, <a href="/en/developer-reference#term-op-hash160" title="Operation which converts the entry below it on the stack into a RIPEMD(SHA256()) hashed version of itself" class="auto-link"><code>OP_HASH160</code></a>, pushes onto the stack a hash
of the data currently on top of it—in this case, Bob’s <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.
This creates a hash of Bob’s <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.</p>
    </li>
    <li>
      <p>Alice’s <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> then pushes the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> that Bob gave her for the
first transaction.  At this point, there should be two copies of Bob’s
<a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> at the top of the stack.</p>
    </li>
    <li>
      <p>Now it gets interesting: Alice’s <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> executes <a href="/en/developer-reference#term-op-equalverify" title="Operation which terminates the script in failure unless the two entries below it on the stack are equivalent" class="auto-link"><code>OP_EQUALVERIFY</code></a>.
<a href="/en/developer-reference#term-op-equalverify" title="Operation which terminates the script in failure unless the two entries below it on the stack are equivalent" class="auto-link"><code>OP_EQUALVERIFY</code></a> is equivalent to executing <a href="/en/developer-reference#term-op-equal" title="Operation which returns true if the two entries below it on the stack are equivalent" class="auto-link"><code>OP_EQUAL</code></a> followed by <a href="/en/developer-reference#term-op-verify" title="Operation which terminates the script if the entry below it on the stack is non-true (zero)" class="auto-link"><code>OP_VERIFY</code></a> (not shown).</p>

      <p><a href="/en/developer-reference#term-op-equal" title="Operation which returns true if the two entries below it on the stack are equivalent" class="auto-link"><code>OP_EQUAL</code></a> (not shown) checks the two values at the top of the stack; in this
  case, it checks whether the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> generated from the full
  <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> Bob provided equals the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a> Alice provided when
  she created transaction #1. <a href="/en/developer-reference#term-op-equal" title="Operation which returns true if the two entries below it on the stack are equivalent" class="auto-link"><code>OP_EQUAL</code></a> pops (removes from the top of the stack)
  the two values it compared, and replaces them with the result of that comparison:
  zero (<em>false</em>) or one (<em>true</em>).</p>

      <p><a href="/en/developer-reference#term-op-verify" title="Operation which terminates the script if the entry below it on the stack is non-true (zero)" class="auto-link"><code>OP_VERIFY</code></a> (not shown) checks the value at the top of the stack. If
  the value is <em>false</em> it immediately terminates evaluation and
  the transaction validation fails. Otherwise it pops the <em>true</em> value off the stack.</p>
    </li>
    <li>
      <p>Finally, Alice’s <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> executes <a href="/en/developer-reference#term-op-checksig" title="Opcode which returns true if a signature signs the correct parts of a transaction and matches a provided public key" class="auto-link"><code>OP_CHECKSIG</code></a>, which checks the
<a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> Bob provided against the now-authenticated <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> he
also provided. If the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> matches the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> and was
generated using all of the data required to be signed, <a href="/en/developer-reference#term-op-checksig" title="Opcode which returns true if a signature signs the correct parts of a transaction and matches a provided public key" class="auto-link"><code>OP_CHECKSIG</code></a>
pushes the value <em>true</em> onto the top of the stack.</p>
    </li>
  </ul>

  <p>If <em>false</em> is not at the top of the stack after the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> has been
evaluated, the transaction is valid (provided there are no other
problems with it).</p>

  <h3 id="p2sh-scripts">P2SH Scripts</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.m">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>
</div>

  <p><a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">Pubkey scripts</a> are created by spenders who have little interest what
that script does. Receivers do care about the script conditions and, if
they want, they can ask spenders to use a particular <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>.
Unfortunately, custom <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a> are less convenient than short
Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> and there was no standard way to communicate them
between programs prior to widespread implementation of the <a href="https://github.com/bitcoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a> <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">Payment
Protocol</a> discussed later.</p>

  <p>To solve these problems, pay-to-script-hash
(<a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." id="term-p2sh" class="term">P2SH</a>) transactions were created in 2012 to let
a spender create a <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> containing a hash of a second
script, the
<a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." id="term-redeem-script" class="term">redeem script</a>.</p>

  <p>The basic P2SH workflow, illustrated below, looks almost identical to
the P2PKH workflow. Bob creates a <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> with whatever script he
wants, hashes the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>, and provides the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script
hash</a> to Alice. Alice creates a P2SH-style <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> containing
Bob’s <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script hash</a>.</p>

  <p><img src="/img/dev/en-creating-p2sh-output.svg" alt="Creating A P2SH Redeem Script And Hash" /></p>

  <p>When Bob wants to spend the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, he provides his <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> along with
the full (serialized) <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> in the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>. The
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a> ensures the full <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script hashes</a> to the same
value as the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">script hash</a> Alice put in her <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>; it then processes the
<a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> exactly as it would if it were the primary <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>, letting
Bob spend the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> if the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> does not return false.</p>

  <p><img src="/img/dev/en-unlocking-p2sh-output.svg" alt="Unlocking A P2SH Output For Spending" /></p>

  <p>The hash of the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> has the same properties as a <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey
hash</a>—so it can be transformed into the standard Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> format
with only one small change to differentiate it from a standard <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.
This makes collecting a P2SH-style <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> as simple as collecting a
P2PKH-style <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>. The hash also obfuscates any <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> in the
<a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>, so P2SH scripts are as secure as P2PKH <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hashes</a>.</p>

  <h3 id="standard-transactions">Standard Transactions</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>After the discovery of several dangerous bugs in early versions of
Umkoin, a test was added which only accepted transactions from the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> if their <a hglossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a> and <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature scripts</a> matched a small set of
believed-to-be-safe templates, and if the rest of the transaction didn’t
violate another small set of rules enforcing good <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> behavior. This
is the <code>IsStandard()</code> test, and transactions which pass it are called
<a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transactions</a>.</p>

  <p>Non-<a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transactions</a>—those that fail the test—may be accepted
by <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> not using the default Umkoin Core settings. If they are
included in <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, they will also avoid the IsStandard test and be
processed.</p>

  <p>Besides making it more difficult for someone to attack Umkoin for
free by broadcasting harmful transactions, the <a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transaction</a>
test also helps prevent users from creating transactions today that
would make adding new transaction features in the future more
difficult. For example, as described above, each transaction includes
a version number—if users started arbitrarily changing the version
number, it would become useless as a tool for introducing
backwards-incompatible features.</p>

  <p>As of Umkoin Core 0.9, the standard <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> types are:</p>

  <h4 class="no_toc" id="pay-to-public-key-hash-p2pkh">Pay To Public Key Hash (P2PKH)</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>P2PKH is the most common form of <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> used to send a transaction to one
or multiple Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>.</p>

  <pre><code>Pubkey script: OP_DUP OP_HASH160 &lt;PubKeyHash&gt; OP_EQUALVERIFY OP_CHECKSIG
Signature script: &lt;sig&gt; &lt;pubkey&gt;
</code></pre>

  <h4 class="no_toc" id="pay-to-script-hash-p2sh">Pay To Script Hash (P2SH)</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>P2SH is used to send a transaction to a <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">script hash</a>. Each of the standard
<a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a> can be used as a P2SH <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>, but in practice only the
<a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> makes sense until more transaction types are made standard.</p>

  <pre><code>Pubkey script: OP_HASH160 &lt;Hash160(redeemScript)&gt; OP_EQUAL
Signature script: &lt;sig&gt; [sig] [sig...] &lt;redeemScript&gt;
</code></pre>

  <h4 class="no_toc" id="multisig">Multisig</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>Although <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes.  Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig</a> is now generally used for <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> transactions, this base script
can be used to require multiple <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> before a <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> can be spent.</p>

  <p>In <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a>, called <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">m-of-n</a>, <em>m</em> is the <em>minimum</em> number of <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a>
which must match a <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>; <em>n</em> is the <em>number</em> of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> being
provided. Both <em>m</em> and <em>n</em> should be <a href="/en/glossary/op-code" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">opcodes</a> <code>OP_1</code> through <code>OP_16</code>,
corresponding to the number desired.</p>

  <p>Because of an off-by-one error in the original Umkoin implementation
which must be preserved for compatibility, <a href="/en/developer-reference#term-op-checkmultisig" title="Opcode which returns true if one or more provided signatures (m) sign the correct parts of a transaction and match one or more provided public keys (n)" class="auto-link"><code>OP_CHECKMULTISIG</code></a>
consumes one more value from the stack than indicated by <em>m</em>, so the
list of <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">secp256k1 signatures</a> in the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> must be prefaced with an extra value
(<code>OP_0</code>) which will be consumed but not used.</p>

  <p>The <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> must provide <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> in the same order as the
corresponding <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> appear in the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> or <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem
script</a>. See the description in <a href="/en/developer-reference#term-op-checkmultisig" title="Opcode which returns true if one or more provided signatures (m) sign the correct parts of a transaction and match one or more provided public keys (n)"><code>OP_CHECKMULTISIG</code></a>
for details.</p>

  <pre><code>Pubkey script: &lt;m&gt; &lt;A pubkey&gt; [B pubkey] [C pubkey...] &lt;n&gt; OP_CHECKMULTISIG
Signature script: OP_0 &lt;A sig&gt; [B sig] [C sig...]
</code></pre>

  <p>Although it’s not a separate transaction type, this is a <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes.  Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig</a> with 2-of-3:</p>

  <pre><code>Pubkey script: OP_HASH160 &lt;Hash160(redeemScript)&gt; OP_EQUAL
Redeem script: &lt;OP_2&gt; &lt;A pubkey&gt; &lt;B pubkey&gt; &lt;C pubkey&gt; &lt;OP_3&gt; OP_CHECKMULTISIG
Signature script: OP_0 &lt;A sig&gt; &lt;C sig&gt; &lt;redeemScript&gt;
</code></pre>

  <h4 class="no_toc" id="pubkey">Pubkey</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">Pubkey</a> <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> are a simplified form of the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH pubkey script</a>,
but they aren’t as
secure as P2PKH, so they generally
aren’t used in new transactions anymore.</p>

  <pre><code>Pubkey script: &lt;pubkey&gt; OP_CHECKSIG
Signature script: &lt;sig&gt;
</code></pre>

  <h4 class="no_toc" id="null-data">Null Data</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/null-data-transaction" title="A transaction type relayed and mined by default in Umkoin Core 0.9.0 and later that adds arbitrary data to a provably unspendable pubkey script that full nodes don't have to store in their UTXO database." id="term-null-data" class="term">Null data</a>
transaction type relayed and mined by default in <a href="/en/release/v0.9.0" class="auto-link">Umkoin Core 0.9.0</a> and
later that adds arbitrary data to a provably unspendable <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>
that full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> don’t have to store in their <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> database. It is
preferable to use <a href="/en/glossary/null-data-transaction" title="A transaction type relayed and mined by default in Umkoin Core 0.9.0 and later that adds arbitrary data to a provably unspendable pubkey script that full nodes don't have to store in their UTXO database." class="auto-link">null data transactions</a> over transactions that bloat
the <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> database because they cannot be automatically pruned; however,
it is usually even more preferable to store data outside transactions
if possible.</p>

  <p><a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">Consensus rules</a> allow null data <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> up to the maximum allowed <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey
script</a> size of 10,000 bytes provided they follow all other <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus
rules</a>, such as not having any data pushes larger than 520 bytes.</p>

  <p>Umkoin Core 0.9.x to 0.10.x will, by default, relay and <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mine</a> <a href="/en/glossary/null-data-transaction" title="A transaction type relayed and mined by default in Umkoin Core 0.9.0 and later that adds arbitrary data to a provably unspendable pubkey script that full nodes don't have to store in their UTXO database." class="auto-link">null data
transactions</a> with up to 40 bytes in a single data push and only one null
data <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> that pays exactly 0 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>:</p>

  <pre><code>Pubkey Script: OP_RETURN &lt;0 to 40 bytes of data&gt;
(Null data scripts cannot be spent, so there's no signature script.)
</code></pre>

  <p>Umkoin Core 0.11.x increases this default to 80 bytes, with the other
rules remaining the same.</p>

  <p>Umkoin Core 0.12.0 defaults
to relaying and mining null data outputs with up to 83 bytes with any
number of data pushes, provided the total byte limit is not exceeded.
There must still only be a single null data output and it must still pay
exactly 0 satoshis.</p>

  <p>The <code>-datacarriersize</code> Umkoin Core configuration option allows you to
set the maximum number of bytes in null data outputs that you will relay
or mine.</p>

  <h4 id="non-standard-transactions">Non-Standard Transactions</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>If you use anything besides a standard <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> in an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>
and <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> using the default Umkoin Core settings will neither
accept, broadcast, nor <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mine</a> your transaction. When you try to broadcast
your transaction to a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> running the default settings, you will
receive an error.</p>

  <p>If you create a <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>, hash it, and use the hash
in a <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH output</a>, the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> sees only the hash, so it will accept the
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must belled for those satoshis to be further spent." class="auto-link">output</a> as valid no matter what the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> says.
This allows payment to non-standard scripts, and as of Umkoin Core
0.11, almost all valid <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem scripts</a> can be spent. The exception is
scripts that use unassigned <a href="https://en.umkoin.it/wiki/Script#Reserved_words">NOP opcodes</a>; these <a href="/en/glossary/op-code" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">opcodes</a> are
reserved for future <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft forks</a> and can only be relayed or mined by <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>
that don’t follow the standard mempool policy.</p>

  <p>Note: <a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transactions</a> are designed to protect and help the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, not prevent you from making mistakes. It’s easy to create
<a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transactions</a> which make the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> sent to them unspendable.</p>

  <p>As of <a href="/en/release/v0.9.3" class="auto-link">Umkoin Core 0.9.3</a>, <a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transactions</a> must also meet the following
conditions:</p>

  <ul>
    <li>
      <p>The transaction must be finalized: either its <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> must be in the
past (or less than or equal to the current <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>), or all of its <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence
numbers</a> must be 0xffffffff.</p>
    </li>
    <li>
      <p>The transaction must be smaller than 100,000 bytes. That’s around 200
times larger than a typical single-<a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>, single-<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> P2PKH
transaction.</p>
    </li>
    <li>
      <p>Each of the transaction’s <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature scripts</a> must be smaller than 1,650 bytes.
That’s large enough to allow 15-of-15 <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> transactions in P2SH
using <a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public keys</a>.</p>
    </li>
    <li>
      <p>Bare (non-P2SH) <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> transactions which require more than 3 <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> are
currently non-standard.</p>
    </li>
    <li>
      <p>The transaction’s <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> must only push data to the script
evaluation stack. It cannot push new <a href="/en/glossary/op-code" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">opcodes</a>, with the exception of
<a href="/en/glossary/op-code" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">opcodes</a> which solely push data to the stack.</p>
    </li>
    <li>
      <p>The transaction must not include any <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> which receive fewer than
1/3 as many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> as it would take to spend it in a typical <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>.
That’s <a href="https://github.com/umkoin/umkoin/commit/6a4c196dd64da2fd33dc7ae77a8cdd3e4cf0eff1">currently 546 satoshis</a> for a
P2PKH or <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script tat Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH output</a> on a Umkoin Core <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> with the default <a href="/en/glossary/minimum-relay-fee" title="The minimum transaction fee a transaction must pay (if it isn't a high-priority transaction) for a full node to relay that transaction to other nodes. There is no one minimum relay fee---each node chooses its own policy." class="auto-link">relay fee</a>.
Exception: standard null data <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> must receive zero <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>
    </li>
  </ul>

  <h3 id="signature-hash-types">Signature Hash Types</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/developer-reference#term-op-checksig" title="Opcode which returns true if a signature signs the correct parts of a transaction and matches a provided public key" class="auto-link"><code>OP_CHECKSIG</code></a> extracts a non-stack argument from each <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> it
evaluates, allowing the signer to decide which parts of the transaction
to sign. Since the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> protects those parts of the transaction
from modification, this lets signers selectively choose to let other
people modify their transactions.</p>

  <p>The various options for what to sign are
called <a href="/en/glossary/signature-hash" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." id="term-signature-hash" class="term">signature hash</a> types. There are three base <a href="/en/glossary/signature-hash" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">SIGHASH</a> types
currently available:</p>

  <ul>
    <li>
      <p><a href="/en/glossary/sighash-all" title="Default signature hash type which signs the entire transaction except any signature scripts, preventing modification of the signed parts." id="term-sighash-all" class="term"><code>SIGHASH_ALL</code></a>, the default, signs all the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inp</a> and <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>,
protecting everything except the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature scripts</a> against modification.</p>
    </li>
    <li>
      <p><a href="/en/glossary/sighash-none" title="Signature hash type which only signs the inputs, allowing anyone to change the outputs however they'd like." id="term-sighash-none" class="term"><code>SIGHASH_NONE</code></a> signs all of the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> but none of the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>,
allowing anyone to change where the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are going unless other
<a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> using other <a href="/en/glossary/signature-hash" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">signature hash</a> flags protect the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>.</p>
    </li>
    <li>
      <p><a href="/en/glossary/sighash-single" title="Signature hash type that signs the output corresponding to this input (the one with the same index value), this input, and any other inputs partially. Allows modification of other outputs and the sequence number of other inputs." id="term-sighash-single" class="term"><code>SIGHASH_SINGLE</code></a>
the only <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> signed is the one corresponding to this <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> (the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>
with the same <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> number as this <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>), ensuring nobody can change
your part of the transaction but allowing other signers to change their part
of the transaction. The corresponding <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> must exist or the value “1” will
be signed, breaking the security scheme. This <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>, as well as other <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>,
are included in the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>. The <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence numbers</a> of other <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> are not
included in the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>, and can be updated.</p>
    </li>
  </ul>

  <p>The base types can be modified with the <a href="/en/glossary/sighash-anyonecanpay" title="A signature hash type which signs only the current input." id="term-sighash-anyonecanpay" class="term"><code>SIGHASH_ANYONECANPAY</code></a> (anyone can
pay) flag, creating three new combined types:</p>

  <ul>
    <li>
      <p><a href="/en/glossary/sighash-anyonecanpay" title="A signature hash type which signs only the current input." class="auto-link"><code>SIGHASH_ALL|SIGHASH_ANYONECANPAY</code></a> signs all of the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> but only
this one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>, and it also allows anyone to add or remove other
<a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>, so anyone can contribute additional <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> but they cannot
change how many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are sent nor where they go.</p>
    </li>
    <li>
      <p><a href="/en/glossary/sighash-anyonecanpay" title="A signature hash type which signs only the current input." class="auto-link"><code>SIGHASH_NONE|SIGHASH_ANYONECANPAY</code></a> signs only this one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> and
allows anyone to add or remove other <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> or <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, so anyone who
gets a copy of this <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> can spend it however they’d like.</p>
    </li>
    <li>
      <p><a href="/en/glossary/sighash-anyonecanpay" title="A signature hash type which signs only the current input." class="auto-link"><code>SIGHASH_SINGLE|SIGHASH_ANYONECANPAY</code></a> signs this one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> and its
corresponding <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>. Allows anyone to add or remove other <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>.</p>
    </li>
  </ul>

  <p>Because each <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> is signed, a transaction with multiple <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> can
have multiple <a href="/en/glossary/signature-hash" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">signature hash</a> types signing different parts of the transaction. For
example, a single-<a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the sinature script allows spending it." class="auto-link">input</a> transaction signed with <code>NONE</code> could have its
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> changed by the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> who adds it to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. On the other
hand, if a two-<a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> transaction has one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> signed with <code>NONE</code> and
one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> signed with <code>ALL</code>, the <code>ALL</code> signer can choose where to spend
the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> without consulting the <code>NONE</code> signer—but nobody else can
modify the transaction.</p>

  <h3 id="locktime-and-sequence-number">Locktime And Sequence Number</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>One thing all <a href="/en/glossary/signature-hash" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">signature hash</a> types sign is the transaction’s <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." id="term-locktime" class="term">locktime</a>.
(Called <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">nLockTime</a> in the Umkoin Core source code.)
The <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> indicates the earliest time a transaction can be added to
the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

  <p><a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">Locktime</a> allows signers to create time-locked transactions which will
only become valid in the future, giving the signers a chance to change
their minds.</p>

  <p>If any of the signers change their mind, they can create a new
non-<a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> transaction. The new transaction will use, as one of
its <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>, one of the same <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> which was used as an <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> to
the <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> transaction. This makes the <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> transaction
invalid if the new transaction is added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> before
the time lock expires.</p>

  <p>Care must be taken near the expiry time of a time lock. The <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer
network</a> allows <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> time to be up to two hours ahead of
real time, so a <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> transaction can be added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> up
to two hours before its time lock officially expires. Also, <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> are
not created at guaranteed intervals, so any attempt to cancel a valuable
transaction should be made a few hours before the time lock expires.</p>

  <p>Previous versions of Umkoin Core provided a feature which prevented
transaction signers from using the method described above to cancel a
time-locked transaction, but a necessary part of this feature was
disabled to prevent denial of service attacks. A legacy of this system are four-byte
<a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" id="term-sequence-number" class="term">sequence numbers</a> in every <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>. <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">Sequence numbers</a> were meant to allow
multiple signers to agree to update a transaction; when they finished
updating the transaction, they could agree to set every <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input’s</a>
<a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence number</a> to the four-byte unsigned maximum (0xffffffff),
allowing the transaction to be added to a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> even if its time lock
had not expired.</p>

  <p>Even today, setting all <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence numbers</a> to 0xffffffff (the default in
Umkoin Core) can still disable the time lock, so if you want to use
<a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a>, at least one <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> must have a <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence number</a> below the
maximum. Since <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence numbers</a> are not used by the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> for any
other purpose, setting any <a href="/en/glossary/sequence-number" title="Part of all transactions. A number intended to allow unconfirmed time-locked transactions to be updated before being finalized; not currently used except to disable locktime in a transaction" class="auto-link">sequence number</a> to zero is sufficient to
enable <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a>.</p>

  <p><span id="locktime_parsing_rules"><a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">Locktime</a>s an unsigned 4-byte integer which can be parsed two ways:</span></p>

  <ul>
    <li>
      <p>If less than 500 million, <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> is parsed as a <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>. The
transaction can be added to any <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> which has this <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">height</a> or higher.</p>
    </li>
    <li>
      <p>If greater than or equal to 500 million, <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> is parsed using the
<a href="https://en.wikipedia.org/wiki/Unix_time" class="auto-link">Unix epoch time</a> format (the number of seconds elapsed since
1970-01-01T00:00 UTC—currently over 1.395 billion). The transaction
can be added to any <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> whose <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> time is greater
than the <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a>.</p>
    </li>
  </ul>

  <h3 id="transaction-fees-and-change">Transaction Fees And Change</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>Transactions pay fees based on the total byte size of the signed transaction. Fees per byte are calculated based on current demand for space in mined <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> with fees rising as demand increases.  The <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> is given to the
Umkoin <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a>, as explained in the <a href="/en/developer-guide.php#block-chain">block chain section</a>, and so it is
ultimately up to each <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> to choose the minimum <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> they
will accept.</p>

  <p>There is also a concept of so-called “<a href="/en/glossary/high-priority-transaction" title="Transactions that don't have to pay a transaction fee because their inputs have been idle long enough to accumulated large amounts of priority.  Note: miners choose whether to accept free transactions." id="term-high-priority-transactions" class="term">high-priority transactions</a>” which spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> that have not moved for a long time.</p>

  <p>In the past, these “priority” transaction were often exempt from the normal fee requirements. Before Umkoin Core 0.12, 50 KB of each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> would be reserved for these <a href="/en/glossary/high-priority-transaction" title="Transactions that don't have to pay a transaction fee because their inputs have been idle long enough to accumulated large amounts of priority.  Note: miners choose whether to accept free transactions." class="auto-link">high-priority transactions</a>, however this is now set to 0 KB by default.  After the priority area, all transactions are prioritized based on their fee per byte, with higher-paying transactions being added in sequence until all of the available space is filled.</p>

  <p>As of Umkoin Core 0.9, a <a href="/en/glossary/minimum-relay-fee" title="The minimum transaction fee a transaction must pay (if it isn't a high-priority transaction) for a full node to relay that transaction to other nodes. There is no one minimum relay fee---each node chooses its own policy." id="term-minimum-fee" class="term">minimum fee</a> (currently 1,000 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>) has been required to
broadcast a transaction across the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>. Any transaction paying only the <a href="/en/glossary/minimum-relay-fee" title="The minimum transaction fee a transaction must pay (if it isn't a high-priority transaction) for a full node to relay that transaction to other nodes. There is no one minimum relay fee---each node chooses its own policy." class="auto-link">minimum fee</a>
should be prepared to wait a long time before there’s enough spare space
in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to include it. Please see the <a href="/en/developer-guide.php#verifying-payment">verifying payment section</a>
for why this could be important.</p>

  <p>Since each transaction spends Unspent Transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Outputs</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>) and
because a <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> can only be spent once, the full value of the included
<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> must be spent or given to a <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> as a <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>.  Few
people will have <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> that exactly match the amount they want to pay,
so most transactions include a <a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change output</a>.</p>

  <p><a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." id="term-change-output" class="term">Change outputs</a> are regular <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> which spend the surplus <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
from the <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> back to the spender.  They can reuse the same P2PKH <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a>
or P2SH <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">script hash</a> as was used in the <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>, but for the reasons
described in the <a href="#avoiding-key-reuse">next subsection</a>, it is highly recommended that <a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change
outputs</a> be sent to a new P2PKH or <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a>.</p>

  <h3 id="avoiding-key-reuse">Avoiding Key Reuse</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a hretps://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>In a transaction, the spender and receiver each reveal to each other all
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> or <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> used in the transaction. This allows either
person to use the public <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> to track past and future
transactions involving the other person’s same <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> or <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>.</p>

  <p>If the same <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> is reused often, as happens when people use
Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> (hashed <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>) as static payment <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>,
other people can easily track the receiving and spending habits of that
person, including how many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> they control in known <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>.</p>

  <p>It doesn’t have to be that way. If each <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> is used exactly
twice—once to receive a payment and once to spend that payment—the
user can gain a significant amount of financial privacy.</p>

  <p>Even better, using new <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> or <a href="/en/developer-guide.php#term-unique-address" title="Address which are only used once to protect privacy and increase security" id="term-unique-address" class="term">unique
addresses</a> when accepting payments or creating
<a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change outputs</a> can be combined with other techniques discussed later,
such as CoinJoin or <a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" class="auto-link">merge avoidance</a>, to make it extremely difficult to
use the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> by itself to reliably track how users receive and
spend their <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

  <p>Avoiding key reuse can also provide security against attacks which might
allow reconstruction of <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> from <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> (hypothesized) or
from <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> comparisons (possible today under certain circumstances
described below, with more general attacks hypothesized).</p>

  <ol>
    <li>
      <p>Unique (non-reused) P2PKH and <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH addresses</a> protect against the first
type of attack by keeping <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">ECDSA public keys</a> hidden (hashed) until the
first time <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> sent to those <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> are spent, so attacks
are effectively useless unless they can reconstruct <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> in
less than the hour or two it takes for a transaction to be well
protected by the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>
    </li>
    <li>
      <p>Unique (non-reused) <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> protect against the second type of
attack by only generating one <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created thatpublic key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> per <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, so attackers
never get a subsequent <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> to use in comparison-based attacks.
Existing comparison-based attacks are only practical today when
insufficient entropy is used in signing or when the entropy used
is exposed by some means, such as a
<a href="https://en.wikipedia.org/wiki/Side_channel_attack">side-channel attack</a>.</p>
    </li>
  </ol>

  <p>So, for both privacy and security, we encourage you to build your
applications to avoid <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> reuse and, when possible, to discourage
users from reusing <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>. If your application needs to provide a
fixed URI to which payments should be sent, please see the
<a href="/en/developer-guide.php#umkoin-uri"><code>umkoin:</code> URI section</a> below.</p>

  <h3 id="transaction-malleability">Transaction Malleability</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>None of Umkoin’s <a href="/en/glossary/signature-hash" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">signature hash</a> types protect the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>, leaving
the door open for a limited denial of service attack called <a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="term" id="term-transaction-malleability">transaction
malleability</a>. The <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>
contains the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">secp256k1 signature</a>, which can’t sign itself, allowing attackers to
make non-functional modifications to a transaction without rendering it
invalid. For example, an attacker can add some data to the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>
which will be dropped before the previous <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> is processed.</p>

  <p>Although the modifications are non-functional—so they do not change
what <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> the transaction uses nor what <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> it pays—they do
change the computed hash of the transaction. Since each transaction
links to previous transactions using hashes as a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">transaction
identifier</a> (<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>), a modified transaction will not have the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> its
creator expected.</p>

  <p>This isn’t a problem for most Umkoin transactions which are designed to
be added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> immediately. But it does become a problem
when the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> from a transaction is spent before that transaction is
added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

  <p>Umkoin developers have been working to reduce <a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">transaction malleability</a>
among <a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transaction</a> types, one outcome of those efforts is
<a href="https://github.com/bitcoin/bips/blob/master/bip-0141.mediawiki">BIP 141: Segregated Witness</a>,
which is supported by Umkoin Core and was activated in August 2017. 
When SegWit is not being used, new transactions should not depend on
previous transactions which have not been added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> yet,
especially if large amounts of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are at stake.</p>

  <p><a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">Transaction malleability</a> also affects payment tracking.  Umkoin Core’s
<a href="/en/developer-reference#remote-procedure-calls-rpcs" class="auto-link">RPC</a> interface lets you track transactions by their <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>—but if that
<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> changes because the transaction was modified, it may appear that
the transaction has disappeared from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>.</p>

  <p>Current best practices for transaction tracking dictate that a
transaction should be tracked by the transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>) it
spends as <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>, as they cannot be changed without invalidating the
transaction.</p>

  <p>Best practices further dictate that if a transaction does seem to
disappear from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> and needs to be reissued, that it be reissued
in a way that invalidates the lost transaction. One method which will
always work is to ensure the reissued payment spends all of the same
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> that the lost transaction used as <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>.</p>

  <h2 id="contracts">Contracts</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/contracts.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/contracts.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/contracts.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/contracts.md%0A%0A">Report Issue</a>


</div>

  <p>Contracts are
transactions which use the decentralized Umkoin system to enforce financial
agreements.
Umkoin contracts can often be crafted to minimize dependency on outside
agents, such as the court system, which significantly decreases the risk
of dealing with unknown entitinancial transactions.</p>

  <p>The following subsections will describe a variety of Umkoin contracts
already in use. Because contracts deal with real people, not just
transactions, they are framed below in story format.</p>

  <p>Besides the contract types described below, many other contract types
have been proposed. Several of them are collected on the <a href="https://en.umkoin.it/wiki/Contracts">Contracts
page</a> of the Umkoin Wiki.</p>

  <h3 id="escrow-and-arbitration">Escrow And Arbitration</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/contracts.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/contracts.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/contracts.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/contracts.md%0A%0A">Report Issue</a>


</div>

  <p>Charlie-the-customer wants to buy a product from Bob-the-businessman,
but neither of them trusts the other person, so they use a contract to
help ensure Charlie gets his merchandise and Bob gets his payment.</p>

  <p>A simple contract could say that Charlie will spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to an
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> which can only be spent if Charlie and Bob both sign the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>
spending it. That means Bob won’t get paid unless Charlie gets his
merchandise, but Charlie can’t get the merchandise and keep his payment.</p>

  <p>This simple contract isn’t much help if there’s a dispute, so Bob and
Charlie enlist the help of Alice-the-arbitrator to create an <a href="/en/glossary/escrow-contract" title="A transaction in which a spender and receiver place funds in a 2-of-2 (or other m-of-n) multisig output so that neither can spend the funds until they're both satisfied with some external outcome." id="term-escrow-contract" class="term">escrow
contract</a>. Charlie spends his <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
to an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> which can only be spent if two of the three people sign the
<a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>. Now Charlie can pay Bob if everything is ok, Bob can <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a>
Charlie’s money if there’s a problem, or Alice can arbitrate and decide
who should get the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> if there’s a dispute.</p>

  <p>To create a multiple-<a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> (<a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." id="term-multisig" class="term">multisig</a>)
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, they each give the others a <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>. Then Bob creates the
following <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes.  Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." id="term-p2sh-multisig" class="term">P2SH multisig</a> <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>:</p>

  <pre><code>OP_2 [A's pubkey] [B's pubkey] [C's pubkey] OP_3 OP_CHECKMULTISIG
</code></pre>

  <p>(<a href="/en/glossary/op-code" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">Opcodes</a> to push the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> onto the stack are not shown.)</p>

  <p><code>OP_2</code> and <code>OP_3</code> push the actual numbers 2 and 3 onto the
stack. <code>OP_2</code>
specifies that 2 <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> are required to sign; <code>OP_3</code> specifies that
3 <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> (unhashed) are being provided. This is a 2-of-3 <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a>
<a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>, more generically called a <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">m-of-n</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> (where <em>m</em> is the
<em>minimum</em> matching <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> required and <em>n</em> in the <em>number</em> of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public
keys</a> provided).</p>

  <p>Bob gives the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> to Charlie, who checks to make sure his
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> and Alice’s <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> are included. Then he hashes the
<a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> to create a P2SH <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> and pays the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to it. Bob
sees the payment get added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> and ships the merchandise.</p>

  <p>Unfortunately, the merchandise gets slightly damaged in transit. Charlie
wants a full <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a>, but Bob thinks a 10% <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> is sufficient. They
turn to Alice to resolve the issue. Alice asks for photo evidence from
Charlie along with a copy of the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> Bob created and
Charlie checked.</p>

  <p>After looking at the evidence, Alice thinks a 40% <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> is sufficient,
so she creates and signs a transaction with two <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis  pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, one that spends 60%
of the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to Bob’s <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> and one that spends the remaining
40% to Charlie’s <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.</p>

  <p>In the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> Alice puts her <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>
and a copy of the unhashed serialized <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>
that Bob created.  She gives a copy of the incomplete transaction to
both Bob and Charlie.  Either one of them can complete it by adding
his <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> to create the following <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a>:</p>

  <pre><code>OP_0 [A's signature] [B's or C's signature] [serialized redeem script]
</code></pre>

  <p>(<a href="/en/glossary/op-code" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">Opcodes</a> to push the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> and <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> onto the stack are
not shown. <code>OP_0</code> is a workaround for an off-by-one error in the original
implementation which must be preserved for compatibility.  Note that
the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> must provide <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> in the same order as the
corresponding <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> appear in the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>.  See the description in
<a href="/en/developer-reference#term-op-checkmultisig" title="Opcode which returns true if one or more provided signatures (m) sign the correct parts of a transaction and match one or more provided public keys (n)"><code>OP_CHECKMULTISIG</code></a> for details.)</p>

  <p>When the transaction is broadcast to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, each <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> checks the
<a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> against the <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH output</a> Charlie previously paid,
ensuring that the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> matches the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script hash</a> previously
provided. Then the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> is evaluated, with the two <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a>
being used as input data. Assuming the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>
validates, the two transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> show up in Bob’s and Charlie’s
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> as spendable balances.</p>

  <p>However, if Alice created and signed a transaction neither of them would
agree to, such as spending all the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to herself, Bob and Charlie
can find a new arbitrator and sign a transaction spending the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
to another 2-of-3 <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script hash</a>, this one including a <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public
key</a> from that second arbitrator. This means that Bob and Charlie never
need to worry about their arbitrator stealing their money.</p>

  <p><strong>Resource:</strong> <a href="https://www.bitrated.com/">BitRated</a> provides a <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> arbitration
service interface using HTML/JavaScript on a GNU AGPL-licensed website.</p>

  <h3 id="micropayment-channel">Micropayment Channel</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/contracts.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/contracts.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/contracts.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/contracts.md%0A%0A">Report Issue</a>


</div>

  <p>Alice also works part-time moderating forum posts for Bob. Every time
someone posts to Bob’s busy forum, Alice skims the post to make sure it
isn’t offensive or spam. Alas, Bob often forgets to pay her, so Alice
demands to be paid immediately after each post she approves or rejects.
Bob says he can’t do that because hundreds of small payments will cost
him thousands of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> in <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>, so Alice suggests they use a
<a href="/en/developer-guide.php#term-micropayment-channel" id="term-micropayment-channel" class="term">micropayment channel</a>.</p>

  <p>Bob asks Alice for her<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> and then creates two transactions.
The first transaction pays 100 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a> to a <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH output</a> whose
2-of-2 <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> requires <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> from both Alice and Bob.
This is the bond transaction.
Broadcasting this transaction would let Alice hold the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a>
hostage, so Bob keeps this transaction private for now and creates a
second transaction.</p>

  <p>The second transaction spends all of the first transaction’s <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a>
(minus a <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>) back to Bob after a 24 hour delay enforced
by <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a>. This is the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction. Bob can’t sign the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction by himself, so he gives
it to Alice to sign, as shown in the
illustration below.</p>

  <p><img src="/img/dev/en-micropayment-channel.svg" alt="Micropayment Channel Example" /></p>

  <p>Alice checks that the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction’s <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> is 24 hours in the
future, signs it, and gives a copy of it back to Bob. She then asks Bob
for the bond transaction and checks that the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction spends
the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> of the bond transaction. She can now broadcast the bond
transaction to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> to ensure Bob has to wait for the time lock
to expire before further spending his <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a>. Bob hasn’t actually
spent anything so far, except possibly a small <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>, and
he’ll be able to broadcast the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction in 24 hours for a
full <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a>.</p>

  <p>Now, when Alice does some work worth 1 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoin</a>, she asks Bob to create
and sign a new version of the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction.  Version two of the
transaction spends 1 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoin</a> to Alice and the other 99 back to Bob; it does
not have a <a href="/en/glossary/locktime" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a>, so Alice can sign it and spend it whenever she
wants.  (But she doesn’t do that immediately.)</p>

  <p>Alice and Bob repeat these work-and-pay steps until Alice finishes for
the day, or until the time lock is about to expire.  Alice signs the
final version of the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction and broadcasts it, paying
herself and refunding any remaining balance to Bob.  The next day, when
Alice starts work, they create a new <a href="/en/developer-guide.php#term-micropayment-channel" class="auto-link">micropayment channel</a>.</p>

  <p>If Alice fails to broadcast a version of the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> transaction before
its time lock expires, Bob can broadcast the first version and receive a
full <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a>. This is one reason <a href="/en/developer-guide.php#term-micropayment-channel" class="auto-link">micropayment channels</a> are best suited to
small payments—if Alice’s Internet service goes out for a few hours
near the time lock expiry, she could be cheated out of her payment.</p>

  <p><a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">Transaction malleability</a>, discussed above in the Transactions section,
is another reason to limit the value of <a href="/en/developer-guide.php#term-micropayment-channel" class="auto-link">micropayment channels</a>.
If someone uses <a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">transaction malleability</a> to break the link between the
two transactions, Alice could hold Bob’s 100 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a> hostage even if she
hadn’t done any work.</p>

  <p>For larger payments, Umkoin <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a> are very low as a
percentage of the total transaction value, so it makes more sense to
protect payments with immediately-broadcast separate transactions.</p>

  <p><strong>Resource:</strong> The <a href="http://umkoinj.github.io">umkoinj</a> Java library
provides a complete set of micropayment functions, an example
implementation, and <a href="https://umkoinj.github.io/working-with-micropayments">a
tutorial</a>
all under an Apache license.</p>

  <h3 id="coinjoin">CoinJoin</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/contracts.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/contracts.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/contracts.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/contracts.md%0A%0A">Report Issue</a>


</div>

  <p>Alice is concerned about her privacy.  She knows every transaction gets
added to the public <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, so when Bob and Charlie pay her, they
can each easily track those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to learn what Umkoin
<a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> she pays, how much she pays them, and possibly how many
<a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> she has left.</p>

  <p>Alice isn’t a criminal, she just wants plausible deniability about
where she has spent her <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One bitcs 100,000,000 satoshis." class="auto-link">satoshis</a> and how many she has left, so she
starts up the Tor anonymity service on her computer and logs into an
IRC chatroom as “AnonGirl.”</p>

  <p>Also in the chatroom are “Nemo” and “Neminem.”  They collectively
agree to transfer <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> between each other so no one besides them
can reliably determine who controls which <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.  But they’re faced
with a dilemma: who transfers their <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to one of the other two
pseudonymous persons first? The CoinJoin-style contract, shown in the
illustration below, makes this decision easy: they create a single
transaction which does all of the spending simultaneously, ensuring none
of them can steal the others’ <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

  <p><img src="/img/dev/en-coinjoin.svg" alt="Example CoinJoin Transaction" /></p>

  <p>Each contributor looks through their collection of Unspent Transaction
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Outputs</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>) for 100 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a> they can spend. They then each generate
a brand new <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> and give <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> details and <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hashes</a> to the
facilitator.  In this case, the facilitator is AnonGirl; she creates
a transaction spending each of the <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> to three equally-sized <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>.
One <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> goes to each of the contributors’ <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hashes</a>.</p>

  <p>AnonGirl then signs her <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> using <a href="/en/glossary/sighash-all" title="Default signature hash type which signs the entire transaction except any signature scripts, preventing modification of the signed parts." class="auto-link"><code>SIGHASH_ALL</code></a> to ensure nobody can
change the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> or <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> details.  She gives the partially-signed
transaction to Nemo who signs his <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> the same way and passes it
to Neminem, who also signs it the same way.  Neminem then broadcasts
the transaction to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>, mixing all of the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a> in
a single transaction.</p>

  <p>As you can see in the illustration, there’s no way for anyone besides
AnonGirl, Nemo, and Neminem to confidently determine who received
which <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, so they can each spend their <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> with plausible
deniability.</p>

  <p>Now when Bob or Charlie try to track Alice’s transactions through the
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, they’ll also see transactions made by Nemo and
Neminem.  If Alice does a few more CoinJoins, Bob and Charlie might
have to guess which transactions made by dozens or hundreds of people
were actually made by Alice.</p>

  <p>The complete history of Alice’s <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> is still in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>,
so a determined investigator could talk to the people AnonGirl
CoinJoined with to find out the ultimate origin of her <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and
possibly reveal AnonGirl as Alice. But against anyone casually browsing
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> history, Alice gains plausible deniability.</p>

  <p>The CoinJoin technique described above costs the participants a small
amount of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to pay the <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>.  An alternative
technique, purchaser CoinJoin, can actually save them <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and
improve their privacy at the same time.</p>

  <p>AnonGirl waits in the IRC chatroom until she wants to make a purchase.
She announces her intention to spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and waits until someone
else wants to make a purchase, likely from a different merchant. Then
they combine their <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> the same way as before but set the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>
to the separate merchant <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> so nobody will be able to figure
out solely from <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> history which one of them bought what from
the merchants.</p>

  <p>Since they would’ve had to pay a <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> to make their purchases
anyway, AnonGirl and her co-spenders don’t pay anything extra—but
because they reduced overhead by combining multiple transactions, saving
bytes, they may be able to pay a smaller aggregate <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="aink">transaction fee</a>,
saving each one of them a tiny amount of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

  <p><strong>Resource:</strong> An alpha-quality (as of this writing) implementation of decentralized
CoinJoin is <a href="http://coinmux.com/">CoinMux</a>, available under the Apache
license.</p>

  <h2 id="wallets">Wallets</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>A Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> can refer to either a <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program or a <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> file.
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">Wallet</a> programs create <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> to receive <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and use the
corresponding <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> to spend those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>. <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">Wallet</a> files
store <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> and (optionally) other information related to
transactions for the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program.</p>

  <p><a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">Wallet</a> programs and <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> files are addressed below in separate
subsections, and this document attempts to always make it clear whether
we’re talking about <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs or <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> files.</p>

  <h3 id="wallet-programs">Wallet Programs</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Permitting receiving and spending of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> is the only essential
feature of <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software—but a particular <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program doesn’t
need to do both things.  Two <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs can work together, one
program distributing <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> in order to receive <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and
another program signing transactions spending those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

  <p><a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">Wallet</a> programs also need to interact with the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a> to
get information from the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> and to broadcast new transactions.
However, the programs which distribute <a href="/en/glosary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> or sign transactions
don’t need to interact with the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a> themselves.</p>

  <p>This leaves us with three necessary, but separable, parts of a <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>
system: a <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> distribution program, a signing program, and a
networked program.  In the subsections below, we will describe common
combinations of these parts.</p>

  <p>Note: we speak about distributing <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> generically. In many
cases, P2PKH or P2SH hashes will be distributed instead of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>,
with the actual <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> only being distributed when the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>
they control are spent.</p>

  <h4 id="full-service-wallets">Full-Service Wallets</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>The simplest <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is a program which performs all three functions: it
generates <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>, derives the corresponding <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>, helps
distribute those <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> as necessary, monitors for <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> spent to
those <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>, creates and signs transactions spending those
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, and broadcasts the signed transactions.</p>

  <p><img src="/img/dev/en-wallets-full-service.svg" alt="Full-Service Wallets" /></p>

  <p>As of this writing, almost all popular <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> can be used as
full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>.</p>

  <p>The main advantage of full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> is that they are easy to use.
A single program does everything the user needs to receive and spend
<a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

  <p>The main disadvantage of full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> is that they store the
<a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> on a device connected to the Internet.  The compromise of
such devices is a common occurrence, and an Internet connection makes it
easy to transmit <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> from a compromised device to an attacker.</p>

  <p>To help protect against theft, many <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs offer users the
option of encrypting the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> files which contain the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>.
This protects the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> when they aren’t being used, but it
cannot protect against an attack designed to capture the encryption
key or to read the decrypted keys from memory.</p>

  <h4 id="signing-only-wallets">Signing-Only Wallets</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>To increase security, <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> can be generated and stored by a
separate <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program operating in a more secure environment. These
signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> work in conjunction with a networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> which
interacts with the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>.</p>

  <p>Signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> programs typically use deterministic key creation
(described in a later subsection) to create <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private and public
keys</a> which can create <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private and public keys</a>.</p>

  <p><img src="/img/dev/en-wallets-signing-only.svg" alt="Signing-Only Wallets" /></p>

  <p>When first run, the signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> creates a <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private key</a> and
transfers the corresponding <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> to the networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <p>The networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> uses the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> to derive <a href="/en/glossary/child-key" n HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public
keys</a>, optionally helps distribute them, monitors for <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> spent to
those <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>, creates unsigned transactions spending those <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>,
and transfers the unsigned transactions to the signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <p>Often, users are given a chance to review the unsigned transactions’ details
(particularly the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> details) using the signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <p>After the optional review step, the signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> uses the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent
private key</a> to derive the appropriate <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private keys</a> and signs the
transactions, giving the signed transactions back to the networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <p>The networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> then broadcasts the signed transactions to the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>.</p>

  <p>The following subsections describe the two most common variants of
signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>: offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> and hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>.</p>

  <h5 id="offline-wallets">Offline Wallets</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Several full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> programs will also operate as two separate
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>: one program instance acting as a signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> (often called an
“offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>”) and the other program instance acting as the networked
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> (often called an “online <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>” or “watching-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>”).</p>

  <p>The offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is so named because it is intended to be run on a
device which does not connect to any <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, greatly reducing the
number of attack vectors. If this is the case, it is usually up to the
user to handle all data transfer using removable media such as USB
drives.  The user’s workflow is something like:</p>

  <ol>
    <li>
      <p>(Offline) Disable all <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> connections on a device and install the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>
software. Start the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software in offline mode to create the
<a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private and public keys</a>.  Copy the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> to
removable media.</p>
    </li>
    <li>
      <p>(Online) Install the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software on another device, this one
connected to the Internet, and import the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> from the
removable media. As you would with a full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, distribute
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> to receive payment. When ready to spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, fill in
the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> details and save the unsigned transaction generated by the
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> to removable media.</p>
    </li>
    <li>
      <p>(Offline) Open the unsigned transaction in the offline instance,
review the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> details to make sure they spend the correct
amount to the correct <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>. This prevents malware on the online
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> from tricking the user into signing a transaction which pays
an attacker. After review, sign the transaction and save it to
removable media.</p>
    </li>
    <li>
      <p>(Online) Open the signed transaction in the online instance so it can
broadcast it to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions ocks" class="auto-link">peer-to-peer network</a>.</p>
    </li>
  </ol>

  <p>The primary advantage of offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> is their possibility for
greatly improved security over full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>.  As long as the
offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is not compromised (or flawed) and the user reviews all outgoing
transactions before signing, the user’s <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are safe even if the
online <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is compromised.</p>

  <p>The primary disadvantage of offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> is hassle. For maximum
security, they require the user dedicate a device to only offline tasks.
The offline device must be booted up whenever funds are to be spent, and
the user must physically copy data from the online device to the offline
device and back.</p>

  <h5 id="hardware-wallets">Hardware Wallets</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> are devices dedicated to running a signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.
Their dedication lets them eliminate many of the vulnerabilities
present in operating systems designed for general use, allowing them
to safely communicate directly with other devices so users don’t need to
transfer data manually.  The user’s workflow is something like:</p>

  <ol>
    <li>
      <p>(Hardware) Create <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private and public keys</a>. Connect hardware
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> to a networked device so it can get the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a>.</p>
    </li>
    <li>
      <p>(Networked) As you would with a full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, distribute
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> to receive payment. When ready to spend <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, fill in
the transaction details, connect the hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, and click
Spend.  The networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> will automatically send the transaction
details to the hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>
    </li>
    <li>
      <p>(Hardware) Review the transaction details on the hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet’s</a>
screen. Some hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> may prompt for a passphrase or PIN
number. The hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> signs the transaction and uploads it to
the networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>
    </li>
    <li>
      <p>(Networked) The networked <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> receives the signed transaction from
the hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> and broadcasts it to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>.</p>
    </li>
  </ol>

  <p>The primary advantage of hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> is their possibility for
greatly improved security over full-service <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> with much less
hassle than offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>.</p>

  <p>The primary disadvantage of hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> is their hassle. Even
though the hassle is less than that of offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>, the user must
still purchase a hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> device and carry it with them whenever
they need to make a transaction using the signing-only <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <p>An additional (hopefully temporary) disadvantage is that, as of this
writing, very few popular <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs support hardware
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>—although almost all popular <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs have announced
their intention to support at least one model of hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <h4 id="distributing-only-wallets">Distributing-Only Wallets</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">Wallet</a> programs which run in difficult-to-secure environments, such as
webservers, can be designed to distribute <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures math the private portion of the keypair." class="auto-link">public keys</a> (including P2PKH
or <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH addresses</a>) and nothing more.  There are two common ways to
design these minimalist <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>:</p>

  <p><img src="/img/dev/en-wallets-distributing-only.svg" alt="Distributing-Only Wallets" /></p>

  <ul>
    <li>
      <p>Pre-populate a database with a number of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> or <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>, and
then distribute on request a <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> or <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> using one of
the database entries. To <a href="/en/developer-guide.php#avoiding-key-reuse">avoid key reuse</a>, webservers should keep track
of used keys and never run out of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>. This can be made easier
by using <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public keys</a> as suggested in the next method.</p>
    </li>
    <li>
      <p>Use a <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> to create <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a>. To avoid key
reuse, a method must be used to ensure the same <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> isn’t
distributed twice. This can be a database entry for each key
distributed or an incrementing pointer to the <a href="/en/developer-guide.php#term-key-index" title="An index number used in the HD wallet formula to generate child keys from a parent key" class="auto-link">key
index</a> number.</p>
    </li>
  </ul>

  <p>Neither method adds a significant amount of overhead, especially if a
database is used anyway to associate each incoming payment with a
separate <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> for payment tracking. See the <a href="/en/developer-guide.php#payment-processing">Payment
Processing</a> section for details.</p>

  <h3 id="wallet-files">Wallet Files</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> at their core are a collection of <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>. These
collections are stored digitally in a file, or can even be physically
stored on pieces of paper.</p>

  <h4 id="private-key-formats">Private Key Formats</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">Private keys</a> are what are used to unlock <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> from a particular <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>. In Umkoin, a <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> in standard format is simply a 256-bit number, between the values:</p>

  <p>0x01 and 0xFFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFE BAAE DCE6 AF48 A03B BFD2 5E8C D036 4140, representing nearly the entire range of 2<sup>256</sup>-1 values. The range is governed by the <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> <a href="https://en.wikipedia.org/wiki/Elliptic_Curve_DSA" class="auto-link">ECDSA</a> encryption standard used by Umkoin.</p>

  <h5 id="wallet-import-format-wif">Wallet Import Format (WIF)</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>In order to make copying of <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> less prone to error, <a href="/en/glossary/wallet-import-format" title="A data interchange format designed to allow exporting and importing a single private key with a flag indicating whether or not it uses a compressed public key." id="term-wallet-import-format" class="term">Wallet Import Format</a> may be utilized. <a href="/en/glossary/wallet-import-format" title="A data interchange format designed to allow exporting and importing a single private key with a flag indicating whether or not it uses a compressed public key." class="auto-link">WIF</a> uses <a href="/en/glossary/base58check" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">base58Check</a> encoding on an <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, greatly decreasing the chance of copying error, much like standard Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>.</p>

  <ol>
    <li>
      <p>Take a <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>.</p>
    </li>
    <li>
      <p>Add a 0x80 byte in front of it for <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> or 0xef for <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>.</p>
    </li>
    <li>
      <p>Append a 0x01 byte after it if it should be used with <a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed
public keys</a> (described in a later subsection). Nothing is appended if
it is used with uncompressed <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>.</p>
    </li>
    <li>
      <p>Perform a SHA-256 hash on the extended key.</p>
    </li>
    <li>
      <p>Perform a SHA-256 hash on result of SHA-256 hash.</p>
    </li>
    <li>
      <p>Take the first four bytes of the second SHA-256 hash; this is the checksum.</p>
    </li>
    <li>
      <p>Add the four checksum bytes from point 5 at the end of the extended key from point 2.</p>
    </li>
    <li>
      <p>Convert the result from a byte string into a <a href="/en/glossary/base58check" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">Base58</a> string using <a href="/en/glossary/base58check" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">Base58Check</a> encodip>
    </li>
  </ol>

  <p>The process is easily reversible, using the <a href="/en/glossary/base58check" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">Base58</a> decoding function, and removing the padding.</p>

  <h5 id="mini-private-key-format">Mini Private Key Format</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Mini <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> format is a method for encoding a <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> in under 30 characters, enabling keys to be embedded in a small physical space, such as physical umkoin tokens, and more damage-resistant QR codes.</p>

  <ol>
    <li>
      <p>The first character of mini keys is ‘S’.</p>
    </li>
    <li>
      <p>In order to determine if a mini <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> is well-formatted, a question mark is added to the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>.</p>
    </li>
    <li>
      <p>The SHA256 hash is calculated. If the first byte produced is a `00’, it is well-formatted. This key restriction acts as a typo-checking mechanism. A user brute forces the process using random numbers until a well-formatted mini <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> is produced.</p>
    </li>
    <li>
      <p>In order to derive the full <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, the user simply takes a single SHA256 hash of the original mini <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>. This process is one-way: it is intractable to compute the mini <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> format from the derived key.</p>
    </li>
  </ol>

  <p>Many implementations disallow the character ‘1’ in the mini <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> due to its visual similarity to ‘l’.</p>

  <p><strong>Resource:</strong> A common tool to create and redeem these keys is the <a href="https://github.com/casascius/Umkoin-Address-Utility">Casascius Umkoin Address Utility</a>.</p>

  <h4 id="public-key-formats">Public Key Formats</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Umkoin <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">ECDSA public keys</a> represent a point on a particular Elliptic
Curve (EC) defined in <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a>. In their traditional uncompressed form,
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> contain an identification byte, a 32-byte X coordinate, and
a 32-byte Y coordinate. The extremely simplified illustration below
shows such a point on the elliptic curve used by Umkoin,
y<sup>2</sup> = x<sup>3</sup> + 7, over a field of
contiguous numbers.</p>

  <p><img src="/img/dev/en-ecdsa-compressed-public-key.svg" alt="Point On ECDSA Curve" /></p>

  <p>(<a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">Secp256k1</a> actually modulos coordinates by a large prime, which produces a
field of non-contiguous integers and a significantly less clear plot,
although the principles are the same.)</p>

  <p>An almost 50% reduction in <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> size can be realized without
changing any fundamentals by dropping the Y coordinate. This is possible
because only two points along the curve share any particular X
coordinate, so the 32-byte Y coordinate can be replaced with a single
bit indicating whether the point is on what appears in the illustration
as the “top” side or the “bottom” side.</p>

  <p>No data is lost by creating these <a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public keys</a>—only a small
amount of CPU is necessary to reconstruct the Y coordinate and access
the uncompressed <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>. Both uncompressed and <a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public
keys</a> are described in official <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> documentation and supported by
default in the widely-used OpenSSL library.</p>

  <p>Because they’re easy to use, and because they reduce almost by half
the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> space used to store <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> for every spent <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>,
<a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public keys</a> are the default in Umkoin Core and are the
recommended default for all Umkoin software.</p>

  <p>However, Umkoin Core prior to 0.6 used uncompressed keys.  This creates
a few complications, as the hashed form of an uncompressed key is
different than the hashed form of a compressed key, so the same key
works with two different <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH addresses</a>.   This also means that the key
must be submitted in the correct format in the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> so it
matches the hash in the previous <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output’s</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>.</p>

  <p>For this reason, Umkoin Core uses several different identifier bytes to
help programs identify how keys should be used:</p>

  <ul>
    <li>
      <p><a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">Private keys</a> meant to be used with <a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public keys</a> have 0x01
appended to them before being <a href="/en/glossary/base58check" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">Base-58</a> encoded. (See the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>
encoding section above.)</p>
    </li>
    <li>
      <p>Uncompressed <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> start with 0x04; <a href="/en/glossary/compressed-public-key" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public keys</a> begin
with 0x03 or 0x02 depending on whether they’re greater or less than
the midpoint of the curve.  These prefix bytes are all used in
official <a href="http://www.secg.org/sec2-v2.pdf" class="auto-link">secp256k1</a> documentation.</p>
    </li>
  </ul>

  <h4 id="hierarchical-deterministic-key-creation">Hierarchical Deterministic Key Creation</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <!-- 
For consistent word ong:
[normal|hardened|] [master|parent|child|grandchild] [extended|non-extended|] [private|public|chain] [key|code]
-->

  <p>The <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">hierarchical deterministic</a> key creation and transfer protocol (<a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." id="term-hd-protocol" class="term">HD
protocol</a>) greatly simplifies <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>
backups, eliminates the need for repeated communication between multiple
programs using the same <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, permits creation of child accounts which
can operate independently, gives each parent account the ability to
monitor or control its children even if the child account is
compromised, and divides each account into full-access and
restricted-access parts so untrusted users or programs can be allowed to
receive or monitor payments without being able to spend them.</p>

  <p>The <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> takes advantage of the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">ECDSA public key</a> creation
function, <a href="/en/developer-guide.php#term-point-function" title="The ECDSA function used to create a public key from a private key" id="term-point-function" class="term"><code>point()</code></a>,
which takes a large integer (the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>) and turns it into a graph
point (the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>):</p>

  <pre><code>point(private_key) == public_key
</code></pre>

  <p>Because of the way <a href="/en/developer-guide.php#term-point-function" title="The ECDSA function used to create a public key from a private key" class="auto-link"><code>point()</code></a> works, it’s possible to create a <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." id="term-child-public-key" class="term">child
public key</a> by combining an
existing <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." id="term-parent-public-key" class="term">(parent) public key</a> with another <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> created from any
integer (<em>i</em>) value. This <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public key</a> is the same <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> which
would be created by the <a href="/en/developer-guide.php#term-point-function" title="The ECDSA function used to create a public key from a private key" class="auto-link"><code>point()</code></a> function if you added the <em>i</em> value to
the original (parent) <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> and then found the remainder of that
sum divided by a global constant used by all Umkoin software (<em>p</em>):</p>

  <pre><code>point( (parent_private_key + i) % p ) == parent_public_key + point(i)
</code></pre>

  <p>This means that two or more independent programs which agree on a
sequence of integers can create a series of unique <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." id="term-child-key" class="term">child key</a> pairs from
a single <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." id="term-parent-key" class="term">parent key</a> pair without any further communication.
Moreover, the program which distributes new <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> for receiving
payment can do so without any access to the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>, allowing the
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> distribution program to run on a possibly-insecure platform such as
a public web server.</p>

  <p><a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">Child public keys</a> can also create their own <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a>
(grandchild <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>) by repeating the <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child key</a> derivation
operations:</p>

  <pre><code>point( (child_private_key + i) % p ) == child_public_key + point(i)
</code></pre>

  <p>Whether creating <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a> or further-descended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>, a
predictable sequence of integer values would be no better than using a
single <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> for all transactions, as anyone who knew one <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child
public key</a> could find all of the other <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a> created from
the same <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a>. Instead, a random seed can be used to
deterministically generate the sequence of integer values so that the
relationship between the <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a> is invisible to anyone
without that seed.</p>

  <p>The <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> uses a single <a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." class="auto-link">root seed</a> to create a hierarchy of
child, grandchild, and other descended keys with unlinkable
deterministically-generated integer values. Each <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child key</a> also gets
a deterministically-generated seed from its parent, called a <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" id="term-chain-code" class="term">chain
code</a>, so the compromising of one <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain
code</a> doesn’t necessarily compromise the integer sequence for the whole
hierarchy, allowing the <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." id="term-master-chain-code" class="term">master chain
code</a> to continue being useful
even if, for example, a web-based <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> distribution program
gets hacked.</p>

  <p><img src="/img/dev/en-hd-overview.svg" alt="Overview Of Hierarchical Deterministic Key Derivation" /></p>

  <p>As illustrated above, HD key derivation takes four inputs:</p>

  <ul>
    <li>
      <p>The <em><a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." id="term-parent-private-key" class="term">parent private key</a></em> and
<em><a href="/en/glossary/parent-key" title="In HD wallets, a keyused to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a></em> are regular uncompressed 256-bit <a href="https://en.wikipedia.org/wiki/Elliptic_Curve_DSA" class="auto-link">ECDSA</a> keys.</p>
    </li>
    <li>
      <p>The <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" id="term-parent-chain-code" class="term">parent chain code</a> is 256
bits of seemingly-random data.</p>
    </li>
    <li>
      <p>The <a href="/en/developer-guide.php#term-key-index" title="An index number used in the HD wallet formula to generate child keys from a parent key" id="term-key-index" class="term">index</a> number is a 32-bit integer specified by the program.</p>
    </li>
  </ul>

  <p>In the normal form shown in the above illustration, the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">parent chain
code</a>, the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a>, and the index number are fed into a one-way cryptographic hash
(<a href="https://en.wikipedia.org/wiki/HMAC">HMAC-SHA512</a>) to produce 512 bits of
deterministically-generated-but-seemingly-random data. The
seemingly-random 256 bits on the righthand side of the hash <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> are
used as a new <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">child chain code</a>. The seemingly-random 256 bits on the
lefthand side of the hash <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> are used as the integer value to be combined
with either the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private key</a> or <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> to,
respectively, create either a <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private key</a> or <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public key</a>:</p>

  <pre><code>child_private_key == (parent_private_key + lefthand_hash_output) % G
child_public_key == point( (parent_private_key + lefthand_hash_output) % G )
child_public_key == point(child_private_key) == parent_public_key + point(lefthand_hash_output)
</code></pre>

  <p>Specifying different index numbers will create different unlinkable
<a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child keys</a> from the same <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent keys</a>.  Repeating the procedure for the
<a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child keys</a> using the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">child chain code</a> will create unlinkable grandchild keys.</p>

  <p>Because creating <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child keys</a> requires both a key and a <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a>, the
key and <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a> together are called the <a href="/en/glossary/extended-key" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." id="term-extended-key" class="term">extended
key</a>. An <a href="/en/glossary/extended-key" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." id="term-extended-private-key" class="term">extended private
key</a> and its corresponding
<a href="/en/glossary/extended-key" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." id="term-extended-public-key" class="term">extended public key</a> have the
same <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a>. The (top-level parent) <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." id="term-master-private-key" class="term">master private
key</a> and <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master chain
code</a> are derived from random data,
as illustrated below.</p>

  <p><img src="/img/dev/en-hd-root-keys.svg" alt="Creating A Root Extended Key Pair" /></p>

  <p>A <a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." id="term-root-seed" class="term">root seed</a> is created from either 128
bits, 256 bits, or 512 bits of random data. This <a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." class="auto-link">root seed</a> of as little
as 128 bits is the the only data the user needs to backup in order to
derive every key created by a particular <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program using
particular settings.</p>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Warning:</strong> As of this writing, <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD wallet</a> programs are not expected to
be fully compatible, so users must only use the same <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD wallet</a> program
with the same HD-related settings for a particular <a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." class="auto-link">root seed</a>.</p>

  <p>The <a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." class="auto-link">root seed</a> is hashed to create 512 bits of seemingly-random data,
from which the <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master private key</a> and <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master chain code</a> are created
(together, the master extended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>). The master <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> is
derived from the <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master private key</a> using <a href="/en/developer-guide.php#term-point-function" title="The ECDSA function used to create a public key from a private key" class="auto-link"><code>point()</code></a>, which, together
with the <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master chain code</a>, is the master extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public
key</a>. The master <a href="/en/glossary/extended-key" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." class="auto-link">extended keys</a> are functionally equivalent to other
<a href="/en/glossary/extended-key" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." class="auto-link">extended keys</a>; it is only their location at the top of the hierarchy
which makes them special.</p>

  <h5 id="hardened-keys">Hardened Keys</h5>
  <div class="subhead-linkse" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/hardened-extended-key" title="A variation on HD wallet extended keys where only the hardened extended private key can derive child keys. This prevents compromise of the chain code plus any private key from putting the whole wallet at risk." class="auto-link">Hardened extended keys</a> fix a potential problem with normal <a href="/en/glossary/extended-key" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." class="auto-link">extended keys</a>.
If an attacker gets a normal <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">parent
chain code</a> and <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a>, he can brute-force all <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain
codes</a> deriving from it. If the attacker also obtains a child, grandchild, or
further-descended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, he can use the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a> to generate all
of the extended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> descending from that <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, as
shown in the grandchild and great-grandchild generations of the illustration below.</p>

  <p><img src="/img/dev/en-hd-cross-generational-key-compromise.svg" alt="Cross-Generational Key Compromise" /></p>

  <p>Perhaps worse, the attacker can reverse the normal <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private key</a>
derivation formula and subtract a <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">parent chain code</a> from a <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private
key</a> to recover the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private key</a>, as shown in the child and
parent generations of the illustration above.  This means an attacker
who acquires an extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> and any <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> descended from
it can recover that <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key’s</a> <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> and all keys descended from
it.</p>

  <p>For this reason, the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a> part of an extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> should be
better secured than standard <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> and users should be advised
against exporting even non-extended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> to
possibly-untrustworthy environments.</p>

  <p>This can be fixed, with some tradeoffs, by replacing the the normal
key derivation formula with a hardened key derivation formula.</p>

  <p>The normal key derivation formula, described in the section above, combines
together the index number, the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">parent chain code</a>, and the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent public key</a> to create the
<a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">child chain code</a> and the integer value which is combined with the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent
private key</a> to create the <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private key</a>.</p>

  <p><img src="/img/dev/en-hd-private-parent-to-private-child.svg" alt="Creating Child Public Keys From An Extended Private Key" /></p>

  <p>The hardened formula, illustrated above, combines together the index
number, the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and privte keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">parent chain code</a>, and the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private key</a> to create
the data used to generate the <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">child chain code</a> and <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child private key</a>.
This formula makes it impossible to create <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a> without
knowing the <a href="/en/glossary/parent-key" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent private key</a>. In other words, parent extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public
keys</a> can’t create hardened <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child public keys</a>.</p>

  <p>Because of that, a <a href="/en/glossary/hardened-extended-key" title="A variation on HD wallet extended keys where only the hardened extended private key can derive child keys. This prevents compromise of the chain code plus any private key from putting the whole wallet at risk." id="term-hardened-extended-private-key" class="term">hardened extended private
key</a> is much less
useful than a normal extended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>—however, 
<a href="/en/glossary/hardened-extended-key" title="A variation on HD wallet extended keys where only the hardened extended private key can derive child keys. This prevents compromise of the chain code plus any private key from putting the whole wallet at risk." class="auto-link">hardened extended private keys</a> create a firewall through which
multi-level key derivation compromises cannot happen. Because hardened
child extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> cannot generate grandchild <a href="/en/glossary/chain-code" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain codes</a> on
their own, the compromise of a parent extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> cannot be
combined with the compromise of a grandchild <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> to create
great-grandchild extended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>.</p>

  <p>The <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> uses different index numbers to indicate
whether a normal or hardened key should be generated. Index numbers from
0x00 to 0x7fffffff (0 to 2<sup>31</sup>-1) will generate a normal key; index
numbers from 0x80000000 to 0xffffffff will generate a hardened key. To
make descriptions easy, many developers use the <a href="https://en.wikipedia.org/wiki/Prime_%28symbol%29">prime symbol</a> to indicate
hardened keys, so the first normal key (0x00) is 0 and the first hardened
key (0x80000000) is 0´.</p>

  <p>(Umkoin developers typically use the ASCII apostrophe rather than
the unicode prime symbol, a convention we will henceforth follow.)</p>

  <p>This compact description is further combined with slashes prefixed by
<em>m</em> or <em>M</em> to indicate hierarchy and key type, with <em>m</em> being a <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private
key</a> and <em>M</em> being a <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>. For example, m/0’/0/122’ refers to the
123rd hardened private child (by index number) of the first normal child
(by index) of the first hardened child (by index) of the <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master private
key</a>. The following hierarchy illustrates prime notation and hardened key
firewalls.</p>

  <p><img src="/img/dev/en-hd-tree.svg" alt="Example HD Wallet Tree Using Prime Notation" /></p>

  <p><a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">Wallets</a> following the <a href="https://github.com/bitcoin/bips/blob/master/bip-0032.mediawiki" class="auto-link">BIP32</a> <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> only create hardened children of
the <a href="/en/glossary/master-chain-code-and-private-key" title="In HD wallets, the master chain code and master private key are the two pieces of data derived from the root seed." class="auto-link">master private key</a> (<em>m</em>) to prevent a compromised <a href="/en/glossary/child-key" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child key</a> from
compromising the master key. As there are no normal children for the
master keys, the master <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> is not used in <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD wallets</a>. All other
keys can have normal children, so the corresponding extended <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>
may be used instead.</p>

  <p>The <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> also describes a serialization format for extended
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> and extended <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>.  For details, please see the
<a href="/en/developer-reference#wallets">wallet section in the developer reference</a> or <a href="https://github.com/bitcoin/bips/blob/master/bip-0032.mediawiki" class="auto-link">BIP32</a>
for the full <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> specification.</p>

  <h5 id="storing-root-seeds">Storing Root Seeds</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." class="auto-link">Root seeds</a> in the <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD protocol</a> are 128, 256, or 512 bits of random data
which must be backed up precisely. To make it more convenient to use
non-digital backup methods, such as memorization or hand-copying, <a href="https://github.com/bitcoin/bips/blob/master/bip-0039.mediawiki" class="auto-link">BIP39</a>
defines a method for creating a 512-bit <a href="/en/glossary/hd-wallet-seed" title="A potentially-short value used as a seed to generate the master private key and master chain code for an HD wallet." class="auto-link">root seed</a> from a pseudo-sentence
(mnemonic) of common natural-language words which was itself created
from 128 to 256 bits of entropy and optionally protected by a password.</p>

  <p>The number of words generated correlates to the amount of entropy used:</p>

  <table>
    <thead>
      <tr>
        <th>Entropy Bits</th>
        <th>Words</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>128</td>
        <td>12</td>
      </tr>
      <tr>
        <td>160</td>
        <td>15</td>
      </tr>
      <tr>
        <td>192</td>
        <td>18</td>
      </tr>
      <tr>
        <td>224</td>
        <td>21</td>
      </tr>
      <tr>
        <td>256</td>
        <td>24</td>
      </tr>
    </tbody>
  </table>

  <p>The passphrase can be of any length.  It is simply appended to the mnemonic
pseudo-sentence, and then both the mnemonic and password are hashed
2,048 times using HMAC-SHA512, resulting in a seemingly-random 512-bit seed.  Because any
input to the hash function creates a seemingly-random 512-bit seed,
there is no fundaay to prove the user entered the correct
password, possibly allowing the user to protect a seed even when under
duress.</p>

  <p>For implementation details, please see <a href="https://github.com/bitcoin/bips/blob/master/bip-0039.mediawiki" class="auto-link">BIP39</a>.</p>

  <h4 id="loose-key-wallets">Loose-Key Wallets</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/wallets.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/wallets.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/wallets.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/wallets.md%0A%0A">Report Issue</a>


</div>

  <p>Loose-Key <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>, also called “Just a Bunch Of Keys (JBOK)”, are a deprecated form of <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> that originated from the Umkoin Core client <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>. The Umkoin Core client <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> would create 100 <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>/<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> pairs automatically via a Pseudo-Random-Number Generator (PRNG) for later use.</p>

  <p>These unused <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> are stored in a virtual “key pool”, with new
keys being generated whenever a previously-generated key was used,
ensuring the pool maintained 100 unused keys. (If the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is
encrypted, new keys are only generated while the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is unlocked.)</p>

  <p>This created considerable difficulty in backing up one’s keys, considering backups have to be run manually to save the newly-generated <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>. If a new <a href="/en/developer-guide.php#term-key-pair" title="A private key and its derived public key" class="auto-link">key pair</a> set is generated, used, and then lost prior to a backup, the stored <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are likely lost forever. Many older-style mobile <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> followed a similar format, but only generated a new <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> upon user demand.</p>

  <p>This <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> type is being actively phased out and discouraged from being used due to the backup hassle.</p>

  <h2 id="payment-processing">Payment Processing</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Payment processing encompasses the steps spenders and receivers perform
to make and accept payments in exchange for products or services. The
basic steps have not changed since the dawn of commerce, but the
technology has. This section will explain how receivers and spenders
can, respectively, request and make payments using Umkoin—and how
they can deal with complications such as <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refunds</a> and <a href="/en/developer-guide.php#rebilling-recurring-payments" title="Billing a spender on a regular schedule" class="auto-link">recurrent
rebilling</a>.</p>

  <p><img src="/img/dev/en-payment-processing.svg" alt="Umkoin Payment Processing" /></p>

  <p>The figure above illustrates payment processing using Umkoin from a
receiver’s perspective, starting with a new order. The following
subsections will each address the three common steps and the three
occasional or optional steps.</p>

  <p>It is worth mentioning that each of these steps can be outsourced by
using third party APIs and services.</p>

  <h3 id="pricing-orders">Pricing Orders</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Because of exchange rate variability between <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and national
currencies (<a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" id="term-fiat" class="term">fiat</a>), many Umkoin orders are priced in <a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a> but paid
in <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, necessitating a price conversion.</p>

  <p>Exchange rate data is widely available through HTTP-based APIs provided
by currency exchanges. Several organizations also aggregate data from
multiple exchanges to create index prices, which are also available using
HTTP-based APIs.</p>

  <p>Any applications which automatically calculate order totals using exchange
rate data must take steps to ensure the price quoted reflects the
current general market value of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, or the applications could
accept too few <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> for the product or service being sold.
Alternatively, they could ask for too many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, driving away potential
spenders.</p>

  <p>To minimize problems, your applications may want to collect data from at
least two separate sources and compare them to see how much they differ.
If the difference is substantial, your applications can enter a safe mode
until a human is able to evaluate the situation.</p>

  <p>You may also want to program your applications to enter a safe mode if
exchange rates are rapidly increasing or decreasing, indicating a
possible problem in the Umkoin market which could make it difficult to
spend any <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> received today.</p>

  <p>Exchange rates lie outside the control of Umkoin and related
technologies, so there are no new or planned technologies which
will make it significantly easier for your program to correctly convert
order totals from <a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a> into <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

  <p>Because the exchange rate fluctuates over time, order totals pegged to
<a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a> must expire to prevent spenders from delaying payment in the hope
that <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> will drop in price. Most widely-used payment processing
systems currently expire their invoices after 10 to 20 minutes.</p>

  <p>Shorter expiration periods increase the chance the invoice will expire
before payment is received, possibly necessitating manual intervention
to request an additional payment or to issue a <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a>.   Longer
expiration periods increase the chance that the exchange rate will
fluctuate a significant amount before payment is received.</p>

  <h3 id="requesting-payments">Requesting Payments</h3>
  <div class=ead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Before requesting payment, your application must create a Umkoin
<a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>, or acquire an <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> from another program such as
Umkoin Core.  Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> are described in detail in the
<a href="#transactions">Transactions</a> section. Also described in that section
are two important reasons to <a href="#avoiding-key-reuse">avoid using an address more than
once</a>—but a third reason applies especially to
<a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment requests</a>:</p>

  <p>Using a separate <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> for each incoming payment makes it trivial to
determine which customers have paid their <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment requests</a>.  Your
applications need only track the association between a particular <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment
request</a> and the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> used in it, and then scan the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> for
transactions matching that <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>

  <p>The next subsections will describe in detail the following four
compatible ways to give the spender the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> and amount to be paid.
For increased convenience and compatibility, providing all of these options in your
<a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment requests</a> is recommended.</p>

  <ol>
    <li>
      <p>All <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software lets its users paste in or manually enter an
<a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> and amount into a payment screen. This is, of course,
inconvenient—but it makes an effective fallback option.</p>
    </li>
    <li>
      <p>Almost all desktop <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> can associate with <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URIs</a>, so
spenders can click a link to pre-fill the payment screen. This also
works with many mobile <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>, but it generally does not work with
web-based <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> unless the spender installs a browser extension or
manually configures a URI handler.</p>
    </li>
    <li>
      <p>Most mobile <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> support scanning <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URIs</a> encoded in a
QR code, and almost all <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> can display them for
accepting payment. While also handy for online orders, QR Codes are
especially useful for in-person purchases.</p>
    </li>
    <li>
      <p>Recent <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> updates add support for the new <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a> providing
increased security, authentication of a receiver’s identity using <a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> certificates,
and other important features such as <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refunds</a>.</p>
    </li>
  </ol>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Warning:</strong> Special care must be taken to avoid the theft of incoming
payments. In particular, <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> should not bestored on web servers,
and <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment requests</a> should be sent over HTTPS or other secure methods
to prevent <a href="https://en.wikipedia.org/wiki/Man-in-the-middle_attack" class="auto-link">man-in-the-middle</a> attacks from replacing your Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>
with the attacker’s <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>

  <h4 id="plain-text">Plain Text</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>To specify an amount directly for copying and pasting, you must provide
the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>, the amount, and the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">denomination</a>. An expiration time for
the offer may also be specified.  For example:</p>

  <p>(Note: all examples in this section use <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a>.)</p>

  <pre><code>Pay: mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN
Amount: 100 BTC
You must pay by: 2014-04-01 at 23:00 UTC
</code></pre>

  <p>Indicating the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">denomination</a> is critical. As of this writing, popular
Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software defaults to denominating amounts in either <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> (BTC)
, <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoins</a> (mBTC) or <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured iltiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">microumkoins</a> (uBTC, “bits”). Choosing between each unit is widely supported,
but other software also lets its users select <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">denomination</a> amounts from
some or all of the following options:</p>

  <table>
    <thead>
      <tr>
        <th><a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">Umkoins</a></th>
        <th>Unit (Abbreviation)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.0</td>
        <td>umkoin (BTC)</td>
      </tr>
      <tr>
        <td>0.01</td>
        <td>bitcent (cBTC)</td>
      </tr>
      <tr>
        <td>0.001</td>
        <td><a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">milliumkoin</a> (mBTC)</td>
      </tr>
      <tr>
        <td>0.000001</td>
        <td><a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">microumkoin</a> (uBTC, “bits”)</td>
      </tr>
      <tr>
        <td>0.00000001</td>
        <td><a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshi</a></td>
      </tr>
    </tbody>
  </table>

  <h4 id="umkoin-uri">umkoin: URI</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>The <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" id="term-umkoin-uri" class="term"><code>umkoin:</code> URI</a> scheme defined in <a href="https://github.com/bitcoin/bips/blob/master/bip-0021.mediawiki" class="auto-link">BIP21</a> eliminates <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">denomination</a>
confusion and saves the spender from copying and pasting two separate
values. It also lets the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment request</a> provide some additional
information to the spender. An example:</p>

  <pre><code>umkoin:mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN?amount=100
</code></pre>

  <p>Only the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> is required, and if it is the only thing
specified, <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> will pre-fill a <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment request</a> with it and let
the spender enter an amount. The amount specified is always in
decimal <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> (BTC).</p>

  <p>Two other parameters are widely supported. The
<a href="/en/developer-guide.php#term-label" title="The label parameter of a umkoin: URI which provides the spender with the receiver's name (unauthenticated)" id="term-label" class="term"><code>label</code></a> parameter is generally used to
provide <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software with the recipient’s name. The
<a href="/en/developer-guide.php#term-message" title="A parameter of umkoin: URIs which allows the receiver to optionally specify a message to the spender" id="term-message" class="term"><code>message</code></a> parameter is generally used
to describe the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment request</a> to the spender. Both the label and the
message are commonly stored by the spender’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> software—but they
are never added to the actual transaction, so other Umkoin users cannot
see them. Both the label and the message must be <a href="https://tools.ietf.org/html/rfc3986">URI encoded</a>.</p>

  <p>All four parameters used together, with appropriate URI encoding, can be
seen in the line-wrapped example below.</p>

  <pre><code>umkoin:mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN\
?amount=0.10\
&amp;label=Example+Merchant\
&amp;message=Order+of+flowers+%26+chocolates
</code></pre>

  <p>The URI scheme can be extended, as will be seen in the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a>
section below, with both new optional and required parameters. As of this
writing, the only widely-used parameter besides the four described above
is the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol’s</a> <a href="/en/developer-guide.php#term-r-parameter" title="The payment request parameter in a umkoin: URI" class="auto-link"><code>r</code></a> parameter.</p>

  <p>Programs accepting URIs in any form must ask the user for permission
before paying unless the user has explicitly disabled prompting (as
might be the case for micropayments).</p>

  <h4 id="qr-codes">QR Codes</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>
</div>

  <p>QR codes are a popular way to exchange <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URIs</a> in person, in
images, or in videos. Most mobile Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> apps, and some desktop
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>, support scanning QR codes to pre-fill their payment screens.</p>

  <p>The figure below shows the same <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a> code encoded as four
different <a href="/en/developer-guide.php#term-uri-qr-code" title="A QR code containing a umkoin: URI" id="term-uri-qr-code" class="term">Umkoin QR codes</a> at four
different error correction levels. The QR code can include the <a href="/en/developer-guide.php#term-label" title="The label parameter of a umkoin: URI which provides the spender with the receiver's name (unauthenticated)" class="auto-link"><code>label</code></a> and <a href="/en/developer-guide.php#term-message" title="A parameter of umkoin: URIs which allows the receiver to optionally specify a message to the spender" class="auto-link"><code>message</code></a>
parameters—and any other optional parameters—but they were
omitted here to keep the QR code small and easy to scan with unsteady
or low-resolution mobile cameras.</p>

  <p><img src="/img/dev/en-qr-code.svg" alt="Umkoin QR Codes" /></p>

  <p>The error correction is combined with a checksum to ensure the <a href="/en/developer-guide.php#term-uri-qr-code" title="A QR code containing a umkoin: URI" class="auto-link">Umkoin QR code</a>
cannot be successfully decoded with data missing or accidentally altered,
so your applications should choose the appropriate level of error
correction based on the space you have available to display the code.
Low-level damage correction works well when space is limited, and
quartile-level damage correction helps ensure fast scanning when
displayed on high-resolution screens.</p>

  <h4 id="payment-protocol">Payment Protocol</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Umkoin Core 0.9 supports the new <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." id="term-payment-protocol" class="term">payment protocol</a>. The <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a>
adds many important features to <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment requests</a>:</p>

  <ul>
    <li>
      <p>Supports <a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> certificates and SSL encryption to verify receivers’ identity
and help prevent <a href="https://en.wikipedia.org/wiki/Man-in-the-middle_attack" class="auto-link">man-in-the-middle</a> attacks.</p>
    </li>
    <li>
      <p>Provides more detail about the requested payment to spenders.</p>
    </li>
    <li>
      <p>Allows spenders to submit transactions directly to receivers without going
through the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>. This can speed up payment processing and
work with planned features such as child-pays-for-parent <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>
and offline NFC or Bluetooth-based payments.</p>
    </li>
  </ul>

  <p>Instead of being asked to pay a meaningless <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>, such as
“mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN”, spenders are asked to pay the
Common Name (CN) description from the receiver’s <a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> certificate, such
as “www.umkoin.org”.</p>

  <p>To request payment using the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a>, you use an extended (but
backwards-compatible) <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a>.  For example:</p>

  <pre><code>umkoin:mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN\
?amount=0.10\
&amp;label=Example+Merchant\
&amp;message=Order+of+flowers+%26+chocolates\
&amp;r=https://example.com/pay/mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN
</code></pre>

  <p>None of the parameters provided above, except <a href="/en/developer-guide.php#term-r-parameter" title="The payment request parameter in a umkoin: URI" class="auto-link"><code>r</code></a>, are required for the
<a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a>—but your applications may include them for backwards
compatibility with <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs which don’t yet handle the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment
protocol</a>.</p>

  <p>The <a href="/en/developer-guide.php#term-r-parameter" title="The payment request parameter in a umkoin: URI" id="term-r-parameter" class="term"><code>r</code></a> parameter tells payment-protocol-aware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs to ignore
the other parameters and fetch a <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> from the URL provided.
The browser, QR code reader, or other program processing the URI opens
the spender’s Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program on the URI.</p>

  <p><img src="/img/dev/en-payment-protocol.svg" alt="BIP70 Payment Protocol" /></p>

  <p>The <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">Payment Protocol</a> is described in depth in <a href="https://github.com/bitcoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a>, <a href="https://github.com/bitcoin/bips/blob/master/bip-0071.mediawiki" class="auto-link">BIP71</a>, and <a href="https://github.com/bitcoin/bips/blob/master/bip-0072.mediawiki" class="auto-link">BIP72</a>.
An example CGI program and description of all the parameters which can
be used in the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">Payment Protocol</a> is provided in the Developer Examples
<a href="/en/developer-examples#payment-protocol">Payment Protocol</a> subsection. In this
subsection, we will briefly describe in story format how the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">Payment
Protocol</a> is typically used.</p>

  <p>Charlie, the client, is shopping on a website run by Bob, the
businessman. Charlie adds a few items to his shopping cart and clicks
the “Checkout With Umkoin” button.</p>

  <p>Bob’s server automatically adds the following information to its
invoice database:</p>

  <ul>
    <li>
      <p>The details of Charlie’s order, including items ordered and
shipping <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>
    </li>
    <li>
      <p>An order total in <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, perhaps created by converting prices in
<a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a> to prices in <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>
    </li>
    <li>
      <p>An expiration time when that total will no longer be acceptable.</p>
    </li>
    <li>
      <p>A <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> to which Charlie should send payment. Typically this
will be a P2PKH or <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH pubkey script</a> containing a unique (never
before used) <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">secp256k1 public key</a>.</p>
    </li>
  </ul>

  <p>After adding all that information to the database, Bob’s server displays
a <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allowsrs to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a> for Charlie to click to pay.</p>

  <p>Charlie clicks on the <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a> in his browser. His browser’s URI
handler sends the URI to his <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program. The <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> is aware of the
<a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">Payment Protocol</a>, so it parses the <a href="/en/developer-guide.php#term-r-parameter" title="The payment request parameter in a umkoin: URI" class="auto-link"><code>r</code></a> parameter and sends an HTTP GET
to that URL looking for a <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> message.</p>

  <p>The <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> message returned may include private information, such as Charlie’s
mailing <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>, but the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> must be able to access it without using prior
authentication, such as HTTP cookies, so a publicly-accessible HTTPS URL
with a guess-resistant part is typically used. The
unique <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> created for the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment request</a> can be used to create
a unique identifier. This is why, in the example URI above, the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>
URL contains the <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH address</a>:
<code>https://example.com/pay/mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN</code></p>

  <p>After receiving the HTTP GET to the URL above, the
<a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>-generating CGI program on Bob’s webserver takes the
unique identifier from the URL and looks up the corresponding details in
the database. It then creates a <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> message with the
following information:</p>

  <ul>
    <li>
      <p>The amount of the order in <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> to be paid.</p>
    </li>
    <li>
      <p>A memo containing the list of items ordered, so Charlie knows what
he’s paying for.  It may also include Charlie’s mailing <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> so he can
double-check it.</p>
    </li>
    <li>
      <p>The time the <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> message was created plus the time
it expires.</p>
    </li>
    <li>
      <p>A URL to which Charlie’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> should send its completed transaction.</p>
    </li>
  </ul>

  <p>That <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> message is put inside a <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> message.
The <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment request</a> lets Bob’s server sign the entire Request with the
server’s <a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> SSL certificate.  (The <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">Payment Protocol</a> has been designed
to allow other signing methods in the future.)  Bob’s server sends the
<a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment request</a> to Charlie’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> in the reply to the HTTP GET.</p>

  <p><img src="/img/dev/en-btcc-payment-request.png" alt="Umkoin Core Showing Validated Payment Request" /></p>

  <p>Charlie’s <a href="/n/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> receives the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> message, checks its <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>, and
then displays the details from the <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> message to Charlie. Charlie
agrees to pay, so the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> constructs a payment to the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>
Bob’s server provided. Unlike a traditional Umkoin payment, Charlie’s
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> doesn’t necessarily automatically broadcast this payment to the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>. Instead, the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> constructs a Payment message and sends it to
the URL provided in the <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> message as an HTTP POST. Among
other things, the Payment message contains:</p>

  <ul>
    <li>
      <p>The signed transaction in which Charlie pays Bob.</p>
    </li>
    <li>
      <p>An optional memo Charlie can send to Bob. (There’s no guarantee that
Bob will read it.)</p>
    </li>
    <li>
      <p>A <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> (<a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>) which Bob can pay if he needs to
return some or all of Charlie’s <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>
    </li>
  </ul>

  <p>Bob’s server receives the Payment message, verifies the transaction pays
the requested amount to the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> provided, and then broadcasts the
transaction to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>. It also replies to the HTTP POSTed Payment
message with a PaymentACK message, which includes an optional memo
from Bob’s server thanking Charlie for his patronage and providing other
information about the order, such as the expected arrival date.</p>

  <p>Charlie’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> sees the PaymentACK and tells Charlie that the payment
has been sent. The PaymentACK doesn’t mean that Bob has verified
Charlie’s payment—see the Verifying Payment subsection below—but it does mean
that Charlie can go do something else while the transaction gets <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a>.
After Bob’s server verifies from the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> that Charlie’s
transaction has been suitably <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a>, it authorizes shipping
Charlie’s order.</p>

  <p>In the case of a dispute, Charlie can generate a cryptographically-proven
<a href="/en/developer-guide.php#term-receipt" title="A cryptographically-verifiable receipt created using parts of a payment request and a confirmed transaction" id="term-receipt" class="term">receipt</a> out of the various signed or
otherwise-proven information.</p>

  <ul>
    <li>
      <p>The <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> message signed by Bob’s webserver proves Charlie
received an invoice to pay a specified <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> for a specified
number of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> for goods specified in the memo field.</p>
    </li>
    <li>
      <p>The Umkoin <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> can prove that the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> specified by
Bob was paid the specified number of <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>
    </li>
  </ul>

  <p>If a <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> needs to be issued, Bob’s server can safely pay the
<a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a>-to <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> provided by Charlie.  See the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">Refunds</a> section below
for more details.</p>

  <h3 id="verifying-payment">Verifying Payment</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>As explained in the <a href="/en/developer-guide.php#transactions" title="A transaction spending satoshis">Transactions</a> and <a href="/en/developer-guide.php#block-chain">Block Chain</a> sections, broadcasting
a transaction to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> doesn’t ensure that the receiver gets
paid. A malicious spender can create one transaction that pays the
receiver and a second one that pays the same <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> back to himself. Only
one of these transactions will be added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, and nobody
can say for sure which one it will be.</p>

  <p>Two or more transactions spending the same <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> are commonly referred
to as a <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." id="term-double-spend" class="term">double spend</a>.</p>

  <p>Once the transaction is included in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or on,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double spends</a> are
impossible without modifying <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> history to replace the
transaction, which is quite difficult. Using this system,
the Umkoin protocol can give each of your transactions an updating confidence 
score based on the number of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> which would need to be modified to replace 
a transaction. For each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, the transaction gains one <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." id="term-confirmation" class="term">confirmation</a>. Since
modifying <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> is quite difficult, higher <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation scores</a> indicate 
greater protection.</p>

  <p><strong>0 <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a></strong>: The transaction has been broadcast but is still not 
included in any <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. Zero <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation</a> transactions (<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed
transactions</a>) should generally not be
trusted without risk analysis. Although <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> usually confirm the first 
transaction they receive, fraudsters may be able to manipulate the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> into including their version of a transaction.</p>

  <p><strong>1 <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation</a></strong>: The transaction is included in the latest <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and 
<a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> risk decreases dramatically. Transactions which pay
sufficient <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a> need 10 minutes on average to receive one
<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation</a>. However, the most recent <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> gets replaced fairly often by
accident, so a <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double spend</a> is still a real possibility.</p>

  <p><strong>2 <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a></strong>: The most recent <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> was chained to the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> which 
includes the transaction. As of March 2014, two <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> replacements were 
exceedingly rare, and a two <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> replacement attack was impractical without 
expensive <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> equipment.</p>

  <p><strong>6 <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a></strong>: The <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> has spent about an hour working to protect 
the transaction against <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double spends</a> and the transaction is buried under six 
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>. Even a reasonably lucky attacker would require a large percentage of 
the total <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> hashing power to replace six <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>. Although this number is 
somewhat arbitrary, software handling high-value transactions, or otherwise at 
risk for fraud, should wait for at least six <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a> before treating a 
payment as accepted.</p>

  <p>Umkoin Core provides several <a href="/en/developer-reference#remote-procedure-calls-rpcs" class="auto-link">RPCs</a> which can provide your program with the 
<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation score</a> for transactions in your <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> or arbitrary transactions. 
For example, the <a href="/en/developer-reference#listunspent" class="auto-link"><code>listunspent</code> RPC</a> provides an array of every <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshi</a> you can 
spend along with its <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation score</a>.</p>

  <p>Although <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a> provide excellent <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> protection most of the 
time, there are at least three cases where <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> risk analysis can be 
required:</p>

  <ol>
    <li>
      <p>In the case when the program or its user cannot wait for a <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation</a> and 
wants to accept <a href=glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed</a> payments.</p>
    </li>
    <li>
      <p>In the case when the program or its user is accepting high value 
transactions and cannot wait for at least six <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a> or more.</p>
    </li>
    <li>
      <p>In the case of an implementation bug or prolonged attack against Umkoin 
which makes the system less reliable than expected.</p>
    </li>
  </ol>

  <p>An interesting source of <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> risk analysis can be acquired by 
connecting to large numbers of Umkoin <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> to track how transactions and 
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> differ from each other. Some third-party APIs can provide you with this 
type of service.</p>

  <p>For example, <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> can be compared among all connected <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> 
to see if any <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> is used in multiple <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a>, indicating a 
<a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> attempt, in which case the payment can be refused until it is 
<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a>. Transactions can also be ranked by their <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> to
estimate the amount of time until they’re added to a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>

  <p>Another example could be to detect a <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> when multiple <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> report differing 
<a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> hashes at the same <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>. Your program can go into a safe mode if the 
<a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> extends for more than two <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, indicating a possible problem with the 
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. For more details, see the <a href="/en/developer-guide.php#detecting-forks">Detecting Forks
subsection</a>.</p>

  <p>Another good source of <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> protection can be human intelligence. For 
example, fraudsters may act differently from legitimate customers, letting 
savvy merchants manually flag them as high risk. Your program can provide a 
safe mode which stops automatic payment acceptance on a global or per-customer 
basis.</p>

  <h3 id="issuing-refunds">Issuing Refunds</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Occasionally receivers using your applications will need to issue
<a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refunds</a>. The obvious way to do that, which is very unsafe, is simply
to return the <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> from which they came.
For example:</p>

  <ul>
    <li>
      <p>Alice wants to buy a widget from Bob, so Bob gives Alice a price and
Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>
    </li>
    <li>
      <p>Alice opens her <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program and sends some <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to that
<a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>. Her <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program automatically chooses to spend those
<a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> from one of its unspent <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> corresponding to
the Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN.</p>
    </li>
    <li>
      <p>Bob discovers Alice paid too many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>. Being an honest fellow,
Bob <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refunds</a> the extra <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to the mjSk… <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>
    </li>
  </ul>

  <p>This seems like it should work, but Alice is using a centralized
multi-user <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">webwallet</a> which doesn’t give <a href="/en/developer-guide.php#term-unique-address" title="Address which are only used once to protect privacy and increase security" class="auto-link">unique addresses</a> to each user,
so it has no way to know that Bob’s <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> is meant for Alice.  Now the
<a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> is a unintentional donation to the company behind the centralized
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, unless Alice opens a support ticket and proves those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
were meant for her.</p>

  <p>This leaves receivers only two correct ways to issue <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refunds</a>:</p>

  <ul>
    <li>
      <p>If an <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> was copy-and-pasted or a basic <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a> was used,
contact the spender directly and ask them to provide a <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>
    </li>
    <li>
      <p>If the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a> was used, send the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> to the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>
listed in the <code>refund_to</code> field of the Payment message.</p>
    </li>
  </ul>

  <p>Note: it would be wise to contact the
spender directly if the <a href="/en/developer-guide.php#issuing-refunds" title="A transaction which refunds some or all satoshis received in a previous transaction" class="auto-link">refund</a> is being issued a long time after the
original payment was made.
This allows you to ensure the user still has access to the key or keys
for the <code>refund_to</code> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>

  <h3 id="disbursing-income-limiting-forex-risk">Disbursing Income (Limiting Forex Risk)</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Many receivers worry that their <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> will be less valuable in the
future than they are now, called foreign exchange (forex) risk. To limit
forex risk, many receivers choose to disburse newly-acquired payments
soon after they’re received.</p>

  <p>If your application provides this business logic, it will need to choose
which <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> to spend first.  There are a few different algorithms
which can lead to different results.</p>

  <ul>
    <li>
      <p>A <a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" class="auto-link">merge avoidance</a> algorithm makes it harder for outsiders looking
at <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> data to figure out how many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> the receiver has
earned, spent, and saved.</p>
    </li>
    <li>
      <p>A last-in-first-out (LIFO) algorithm spends newly acquired <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
while there’s still <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double spend</a> risk, possibly pushing that risk on
to others. This can be good for the receiver’s balance sheet but
possibly bad for their reputation.</p>
    </li>
    <li>
      <p>A first-in-first-out (FIFO) algorithm spends the oldest <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
first, which can help ensure that the receiver’s payments always
confirm, although this has utility only in a few edge cases.</p>
    </li>
  </ul>

  <h4 id="merge-avoidance">Merge Avoidance</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>When a receiver receives <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> in an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, the spender can track
(in a crude way) how the receiver spends those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>. But the spender
can’t automatically see other <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> paid to the receiver by other
spenders as long as the receiver uses <a href="/en/developer-guide.php#term-unique-address" title="Address which are only used once to protect privacy and increase security" class="auto-link">unique addresses</a> for each
transaction.</p>

  <p>However, if the receiver spends <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> from two different spenders in
the same transaction, each of those spenders can see the other spender’s
payment.  This is called a <a href="/en/developer-guide.php#term-merge" title="Spending, in the same transaction, multiple outputs which can be traced back to different previous spenders, leaking information about how many satoshis you control" id="term-merge" class="term">merge</a>, and the more a receiver merges
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, the easier it is for an outsider to track how many <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> the
receiver has earned, spent, and saved.</p>

  <p><a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" id="term-merge-avoidance" class="term">Merge avoidance</a> means trying to avoid spending unrelated <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> in the
same transaction. For persons and businesses which want to keep their
transaction data secret from other people, it can be an important strategy.</p>

  <p>A crude <a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" class="auto-link">merge avoidance</a> strategy is to try to always pay with the
smallest <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled fortoshis to be further spent." class="auto-link">output</a> you have which is larger than the amount being
requested. For example, if you have four <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> holding, respectively,
100, 200, 500, and 900 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, you would pay a bill for 300 <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>
with the 500-<a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshi</a> <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>. This way, as long as you have <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>
larger than your bills, you avoid merging.</p>

  <p>More advanced <a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" class="auto-link">merge avoidance</a> strategies largely depend on enhancements
to the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a> which will allow payers to avoid merging by
intelligently distributing their payments among multiple <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>
provided by the receiver.</p>

  <h4 id="last-in-first-out-lifo">Last In, First Out (LIFO)</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Outputs</a> can be spent as soon as they’re received—even before they’re
<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a>. Since recent <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> are at the greatest risk of being
<a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spent</a>, spending them before older <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> allows the spender to
hold on to older <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a> <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> which are much less likely to be
<a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spent</a>.</p>

  <p>There are two closely-related downsides to LIFO:</p>

  <ul>
    <li>
      <p>If you spend an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> from one <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transaction</a> in a second
transaction, the second transaction becomes invalid if <a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">transaction
malleability</a> changes the first transaction.</p>
    </li>
    <li>
      <p>If you spend an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> from one <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transaction<a> in a second
transaction and the first transaction’s <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> is successfully <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double
spent</a> to another <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, the second transaction becomes invalid.</p>
    </li>
  </ul>

  <p>In either of the above cases, the receiver of the second transaction
will see the incoming transaction notification disappear or turn into an
error message.</p>

  <p>Because LIFO puts the recipient of secondary transactions in as much
<a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> risk as the recipient of the primary transaction, they’re
best used when the secondary recipient doesn’t care about the
risk—such as an exchange or other service which is going to wait for
six <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a> whether you spend old <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> or new <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>.</p>

  <p>LIFO should not be used when the primary transaction recipient’s
reputation might be at stake, such as when paying employees. In these
cases, it’s better to wait for transactions to be fully verified (see
the <a href="/en/developer-guide.php#verifying-payment">Verification subsection</a> above) before using them to make payments.</p>

  <h4 id="first-in-first-out-fifo">First In, First Out (FIFO)</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>The oldest <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> are the most reliable, as the longer it’s been since
they were received, the more <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> would need to be modified to <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double
spend</a> them. However, after just a few <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, a point of rapidly
diminishing returns is reached. The <a href="https://umkoin.org/en/umkoin-paper">original Umkoin paper</a>
predicts the chance of an attacker being able to modify old <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>,
assuming the attacker has 30% of the total <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> hashing power:</p>

  <table>
    <thead>
      <tr>
        <th><a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">Blocks</a></th>
        <th>Chance of successful modification</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>5</td>
        <td>17.73523%</td>
      </tr>
      <tr>
        <td>10</td>
        <td>4.16605%</td>
      </tr>
      <tr>
        <td>15</td>
        <td>1.01008%</td>
      </tr>
      <tr>
        <td>20</td>
        <td>0.24804%</td>
      </tr>
      <tr>
        <td>25</td>
        <td>0.06132%</td>
      </tr>
      <tr>
        <td>30</td>
        <td>0.01522%</td>
      </tr>
      <tr>
        <td>35</td>
        <td>0.00379%</td>
      </tr>
      <tr>
        <td>40</td>
        <td>0.00095%</td>
      </tr>
      <tr>
        <td>45</td>
        <td>0.00024%</td>
      </tr>
      <tr>
        <td>50</td>
        <td>0.00006%</td>
      </tr>
    </tbody>
  </table>

  <p>FIFO does have a small advantage when it comes to <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>, as
older <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> may be eligible for inclusion in the 50,000 bytes set
aside for no-fee-required <a href="/en/glossary/high-priority-transaction" title="Transactions that don't have to pay a transaction fee because their inputs have been idle long enough to accumulated large amounts of priority.  Note: miners choose whether to accept free transactions." class="auto-link">high-priority transactions</a> by <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> running the default Umkoin Core
codebase.  However, with <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a> being so low, this is not a
significant advantage.</p>

  <p>The only practical use of FIFO is by receivers who spend all or most
of their income within a few <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, and who want to reduce the
chance of their payments becoming accidentally invalid. For example,
a receiver who holds each payment for six <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a>, and then
spends 100% of <a href="/en/developer-guide.php#verifying-payment" title="Payments which the receiver believes won't be double spent" class="auto-link">verified payments</a> to vendors and a savings account on
a bi-hourly schedule.</p>

  <h3 id="rebilling-recurring-payments">Rebilling Recurring Payments</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Automated recurring payments are not possible with decentralized Umkoin
<a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>. Even if a <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> supported automatically sending non-reversible
payments on a regular schedule, the user would still need to start the
program at the appointed time, or leave it running all the time
unprotected by encryption.</p>

  <p>This means automated recurring Umkoin payments can only be made from a
centralized server which handles <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi.  One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> on behalf of its spenders. In
practice, receivers who want to set prices in <a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a> terms must also let
the same centralized server choose the appropriate exchange rate.</p>

  <p>Non-automated rebilling can be managed by the same mechanism used before
credit-card recurring payments became common: contact the spender and
ask them to pay again—for example, by sending them a <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>
<a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a> in an HTML email.</p>

  <p>In the future, extensions to the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a> and new <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>
features may allow some <a href="/en/glossary/wallet" titlere that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs to manage a list of recurring
transactions. The spender will still need to start the program on a
regular basis and authorize payment—but it should be easier and more
secure for the spender than clicking an emailed invoice, increasing the
chance receivers get paid on time.</p>

  <h2 id="operating-modes">Operating Modes</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>Currently there are two primary methods of validating the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> as a client: Full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> and <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV clients</a>. Other methods, such as server-trusting methods, are not discussed as they are not recommended.</p>

  <h3 id="full-node">Full Node</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>The first and most secure model is the one followed by Umkoin Core, also known as a “thick” or “full chain” client. This security model assures the validity of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> by downloading and validating <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> from the <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">genesis block</a> all the way to the most recently discovered <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. This is known as using the <em><a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">height</a></em> of a particular <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to verify the client’s view of the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>.</p>

  <p>For a client to be fooled, an adversary would need to give a complete alternative <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> history that is of greater <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> than the current “true” chain, which is computationally expensive (if not impossible) due to the fact that the chain with the most cumulative <a href="/en/glossary/proof-of-work.php" title="A hash below a target value which can only be obtained, on average, by performing a certain amount of brute force work---therefore demonstrating proof of work." class="auto-link">proof of work</a> is by definition the “true” chain. Due to the computational <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> required to generate a new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> at the tip of the chain, the ability to fool a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> becomes very expensive after 6 <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a>. This form of verification is highly resistent to sybil attacks—only a single honest <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> is required in order to receive and verify the complete state of the “true” <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

  <p><img src="/img/dev/en-block-height-vs-depth.svg" alt="Block Height Compared To Block Depth" /></p>

  <h3 id="simplified-payment-verification-spv">Simplified Payment Verification (SPV)</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>An alternative approach detailed in the <a href="https://umkoin.org/en/umkoin-paper">original Umkoin paper</a> is a client that only downloads the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> during the initial syncing process and then requests transactions from full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> as needed. This scales linearly with the <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">height</a> of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> at only 80 bytes per <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a>, or up to 4.2MB per year, regardless of total <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> size.</p>

  <p>As described in the white paper, the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> in the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> along with a merkle branch can prove to the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> that the transaction in question is embedded in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. This does not guarantee validity of the transactions that are embedded. Instead it demonstrates the amount of work required to perform a <a href="/en/glossary/double-spend" title="A transaction that uses the same input as an already broadcast transaction. The attempt of duplication, deceit, or conversion,  will be adjudicated when only one of the transactions is recorded in the blockchain." class="auto-link">double-spend</a> attack.</p>

  <p>The <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block’s</a> depth in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> corresponds to the cumulative <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> that has been performed to build on top of that particular <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. The <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> knows the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valrkle root descended from all transactions in that block." class="auto-link">merkle root</a> and associated transaction information, and requests the respective merkle branch from a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a>. Once the merkle branch has been retrieved, proving the existence of the transaction in the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> can then look to <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <em>depth</em> as a proxy for transaction validity and security. The cost of an attack on a user by a malicious <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> who inserts an invalid transaction grows with the cumulative <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> built on top of that <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, since the malicious <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> alone will be <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> this forged chain.</p>

  <h4 id="potential-spv-weaknesses">Potential SPV Weaknesses</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>If implemented naively, an <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> has a few important weaknesses.</p>

  <p>First, while the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> can not be easily fooled into thinking a transaction is in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> when it is not, the reverse is not true. A <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> can simply lie by omission, leading an <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> to believe a transaction has not occurred. This can be considered a form of Denial of Service. One mitigation strategy is to connect to a number of full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>, and send the requests to each <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. However this can be defeated by <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> partitioning or Sybil attacks, since identities are essentially free, and can be bandwidth intensive. Care must be taken to ensure the client is not cut off from honest <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>.</p>

  <p>Second, the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> only requests transactions from full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> corresponding to keys it owns. If the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> downloads all <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> and then discards unneeded ones, this can be extremely bandwidth intensive. If they simply ask full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> with specific transactions, this allows full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> a complete view of the public <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> that correspond to the user. This is a large privacy leak, and allows for tactics such as denial of service for clients, users, or <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">addresses</a> that are disfavored by those running full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>, as well as trivial linking of funds. A client could simply spam many fake transaction requests, but this creates a large strain on the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a>, and can end up defeating the purpose of <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">thin clients</a> altogether.</p>

  <p>To mitigate the latter issue, <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filters</a> have been implemented as a method of obfuscation and compression of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> data requests.</p>

  <h4 id="bloom-filters">Bloom Filters</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>A <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> is a space-efficient probabilistic data structure that is used to test membership of an element. The data structure achieves great data compression at the expense of a prescribed false positive rate.</p>

  <p>A <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> starts out as an array of n bits all set to 0. A set of k random hash functions are chosen, each of which output a single integer between the range of 1 and n.</p>

  <p>When adding an element to the <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a>, the element is hashed k times separately, and for each of the k outputs, the corresponding <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> bit at that index is set to 1.</p>

  <p>Querying of the <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> is done by using the same hash functions as before. If all k bits accessed in the <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> are set to 1, this demonstrates with high probability that the element lies in the set. Clearly, the k indices could have been set to 1 by the addition of a combination of other elements in the domain, but the parameters allow the user to choose the acceptable false positive rate.</p>

  <p>Removal of elements can only be done by scrapping the <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> and re-creating it from scratch.</p>

  <h4 id="application-of-bloom-filters">Application Of Bloom Filters</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>Rather than viewing the false positie rates as a liability, it is used to create a tunable parameter that represents the desired privacy level and bandwidth trade-off. A <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> creates their <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> and sends it to a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> using the message <code>filterload</code>, which sets the filter for which transactions are desired. The command <code>filteradd</code> allows addition of desired data to the filter without needing to send a totally new <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a>, and <code>filterclear</code> allows the connection to revert to standard <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> discovery mechanisms. If the filter has been loaded, then full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> will send a modified form of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, called a <a href="/en/glossary/merkle-block" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a>. The <a href="/en/glossary/merkle-block" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a> is simply the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> with the merkle branch associated with the set <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a>.</p>

  <p>An <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a> can not only add transactions as elements to the filter, but also <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>, data from <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature
scripts</a> and <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a>, and more. This enables P2SH transaction finding.</p>

  <p>If a user is more privacy-conscious, he can set the <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> to include more false positives, at the expense of extra bandwidth used for transaction discovery. If a user is on a tight bandwidth budget, he can set the false-positive rate to low, knowing that this will allow full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> a clear view of what transactions are associated with his client.</p>

  <p><strong>Resources:</strong> <a href="http://umkoinj.github.io">UmkoinJ</a>, a Java implementation of Umkoin that is based on the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a> security model and <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filters</a>. Used in most Android <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>.</p>

  <p><a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filters</a> were standardized for use via <a href="https://github.com/bitcoin/bips/blob/master/bip-0037.mediawiki">BIP37</a>. Review the BIP for implementation details.</p>

  <h3 id="future-proposals">Future Proposals</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/operating_modes.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/operating_modes.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/operating_modes.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/operating_modes.md%0A%0A">Report Issue</a>


</div>

  <p>There are future proposals such as Unspent Transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Output</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>) commitments in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> to find a more satisfactory middle-ground for clients between needing a complete copy of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, or trusting that a majority of your connected <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> are not lying. <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> commitments would enable a very secure client using a finite amount of storage using a data structure that is authenticated in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. These type of proposals are, however, in very early stages, and will require <a href="/en/glossary/soft-fork" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">soft forks</a> in the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>.</p>

  <p>Until these types of operating modes are implemented, modes should be chosen based on the likely threat model, computing and bandwidth constraints, and liability in umkoin value.</p>

  <p><strong>Resources:</strong> <a href="https://umkointalk.org/index.php?topic=88208.0">Original Thread on UTXO Commitments</a>, <a href="https://github.com/maaku/bips/blob/master/drafts/auth-trie.mediawiki">Authenticated Prefix Trees BIP Proposal</a></p>

  <h2 id="p2p-network">P2P Network</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>The Umkoin <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> protocol allows full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>
(<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>) to collaboratively maintain a
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" id="term-network" class="term">peer-to-peer network</a> for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and
transaction exchange. Full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> download and verify every <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and transaction
prior to relaying them to other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. Archival <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> are full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> which
store the entire <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">blockchain</a> and can serve historical <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>.
Pruned <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> are full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> which do not store the entire <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">blockchain</a>. Many <a href="/en/glossaryfied-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV 
clients</a> also use the Umkoin <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> protocol to connect to full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>.</p>

  <p><a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">Consensus rules</a> do not cover networking, so Umkoin programs may use
alternative networks and protocols, such as the <a href="https://www.mail-archive.com/umkoin-development@lists.sourceforge.net/msg03189.html">high-speed block relay
network</a> used by some <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> and the <a href="https://github.com/spesmilo/electrum-server">dedicated transaction
information servers</a> used by some <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> that provide
<a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a>-level security.</p>

  <p>To provide practical examples of the Umkoin <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>, this
section uses Umkoin Core as a representative <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> and <a href="http://umkoinj.github.io">UmkoinJ</a>
as a representative <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a>. Both programs are flexible, so only
default behavior is described. Also, for privacy, actual IP addresses
in the example <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> below have been replaced with <a href="http://tools.ietf.org/html/rfc5737">RFC5737</a> reserved
IP addresses.</p>

  <h3 id="peer-discovery">Peer Discovery</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>When started for the first time, programs don’t know the IP
addresses of any active full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. In order to discover some IP
addresses, they query one or more DNS names (called <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." id="term-dns-seed" class="term">DNS seeds</a>)
hardcoded into Umkoin Core and
<a href="http://umkoinj.github.io" class="auto-link">UmkoinJ</a>. The response to the lookup should include one or more <a href="http://tools.ietf.org/html/rfc1035#section-3.2.2">DNS
A records</a> with the IP addresses of full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> that may accept new
incoming connections. For example, using the <a href="https://en.wikipedia.org/wiki/Dig_%28Unix_command%29">Unix <code>dig</code>
command</a>:</p>

  <pre><code>;; QUESTION SECTION:
;seed.umkoin.sipa.be.	    IN  A

;; ANSWER SECTION:
seed.umkoin.sipa.be.	60  IN  A  192.0.2.113
seed.umkoin.sipa.be.	60  IN  A  198.51.100.231
seed.umkoin.sipa.be.	60  IN  A  203.0.113.183
[...]
</code></pre>

  <p>The <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seeds</a> are maintained by Umkoin community members: some of them
provide dynamic <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seed</a> servers which automatically get IP addresses
of active <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> by scanning the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>; others provide static <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS
seeds</a> that are updated manually and are more likely to provide IP
addresses for inactive <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. In either case, <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> are added to the
<a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seed</a> if they run on the default Umkoin ports of 6333 for <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>
or 16333 for <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>.</p>

  <p><a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seed</a> results are not authenticated and a malicious seed operator or
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> <a href="https://en.wikipedia.org/wiki/Man-in-the-middle_attack" class="auto-link">man-in-the-middle</a> attacker can return only IP addresses of
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> controlled by the attacker, isolating a program on the attacker’s
own <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> and allowing the attacker to feed it bogus transactions and
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>.  For this reason, programs should not rely on <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of ful nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seeds</a>
exclusively.</p>

  <p>Once a program has connected to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, its <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> can begin to send
it <code>addr</code>
(address) messages with the IP addresses and port numbers of
other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, providing a fully decentralized method of
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> discovery. Umkoin Core keeps a record of known <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> in a
persistent on-disk database which usually allows it to connect directly
to those <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> on subsequent startups without having to use <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seeds</a>.</p>

  <p>However, <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> often leave the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> or change IP addresses, so
programs may need to make several different connection attempts at
startup before a successful connection is made. This can add a
significant delay to the amount of time it takes to connect to the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, forcing a user to wait before sending a transaction or checking
the status of payment.</p>

  <p>To avoid this possible delay, <a href="http://umkoinj.github.io" class="auto-link">UmkoinJ</a> always uses dynamic <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seeds</a> to
get IP addresses for <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> believed to be currently active.
Umkoin Core also tries to strike a balance between minimizing delays
and avoiding unnecessary <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNS seed</a> use: if Umkoin Core has entries in
its <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> database, it spends up to 11 seconds attempting to connect to
at least one of them before falling back to seeds; if a connection is
made within that time, it does not query any seeds.</p>

  <p>Both Umkoin Core and <a href="http://umkoinj.github.io" class="auto-link">UmkoinJ</a> also include a hardcoded list of IP
addresses and port numbers to several dozen <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> which were active
around the time that particular version of the software was first
released. Umkoin Core will start attempting to connect to these <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>
if none of the <a href="/en/glossary/dns-seed" title="A DNS server which returns IP addresses of full nodes on the Umkoin network to assist in peer discovery." class="auto-link">DNed</a> servers have responded to a query within 60
seconds, providing an automatic fallback option.</p>

  <p>As a manual fallback option, Umkoin Core also provides several
command-line connection options, including the ability to get a list of
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> from a specific <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> by IP address, or to make a persistent
connection to a specific <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> by IP address.  See the <code>-help</code> text for
details.  <a href="http://umkoinj.github.io" class="auto-link">UmkoinJ</a> can be programmed to do the same thing.</p>

  <p><strong>Resources:</strong> <a href="https://github.com/sipa/umkoin-seeder">Umkoin Seeder</a>, the program run by several of the
seeds used by Umkoin Core and <a href="http://umkoinj.github.io" class="auto-link">UmkoinJ</a>. The Umkoin Core <a href="https://github.com/umkoin/umkoin/blob/master/doc/dnsseed-policy.md">DNS Seed
Policy</a>.  The hardcoded list of IP addresses used by Umkoin Core and
<a href="http://umkoinj.github.io" class="auto-link">UmkoinJ</a> is generated using the <a href="https://github.com/umkoin/umkoin/tree/master/contrib/seeds">makeseeds script</a>.</p>

  <h3 id="connecting-to-peers">Connecting To Peers</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>Connecting to a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> is done by sending a <a href="/en/developer-reference#version" title="A P2P network message sent at the begining of a connection to allow protocol version negotiation" class="auto-link"><code>version</code> message</a>, which
contains your version number, <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, and current time to the remote
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. The remote <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> responds with its own <a href="/en/developer-reference#version" title="A P2P network message sent at the begining of a connection to allow protocol version negotiation" class="auto-link"><code>version</code> message</a>. Then both
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> send a <a href="/en/developer-reference#verack" title="A P2P network message sent in reply to a version message to confirm a connection has been established" class="auto-link"><code>verack</code> message</a> to the other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to indicate the
connection has been established.</p>

  <p>Once connected, the client can send to the remote <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> <code>getaddr</code> and <a href="/en/developer-reference#addr" title="The P2P network message which relays IP addresses and port numbers of active nodes to other nodes and clients, allowing decentralized peer discovery." class="auto-link"><code>addr</code> messages</a> to gather additional <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>.</p>

  <p>In order to maintain a connection with a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>, <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> by default will send a message to <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> before 30 minutes of inactivity. If 90 minutes pass without a message being received by a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>, the client will assume that connection has closed.</p>

  <h3 id="initial-block-download">Initial Block Download</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>Before a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> can validate <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> and
recently-mined <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, it must download and validate all <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> from
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 1 (the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> after the hardcoded <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">genesis block</a>) to the current tip
of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>. This is the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">Initial Block Download</a> (<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>) or
initial sync.</p>

  <p>Although the word “initial” implies this method is only used once, it
can also be used any time a large number of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> need to be
downloaded, such as when a previously-caught-up <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> hs been offline
for a long time. In this case, a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can use the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> method to download
all the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> which were produced since the last time it was online.</p>

  <p>Umkoin Core uses the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> method any time the last <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> on its local
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> has a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> time more than 24 hours in the past.
<a href="/en/release/v0.10.0" class="auto-link">Umkoin Core 0.10.0</a> will also perform <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> if its local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> is
more than 144 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> lower than its local <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a> (that is,
the local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> is more than about 24 hours in the past).</p>

  <h4 id="blocks-first">Blocks-First</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>Umkoin Core (up until version <a href="/en/release/v0.9.3">0.9.3</a>) uses a
simple <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">initial block download</a> (<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>) method we’ll call <em><a href="/en/glossary/blocks-first-sync" titlechronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first</a></em>.
The goal is to download the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> from the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> in sequence.</p>

  <p><img src="/img/dev/en-blocks-first-flowchart.svg" alt="Overview Of Blocks-First Method" /></p>

  <p>The first time a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> is started, it only has a single <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> in its
local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>—the hardcoded <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">genesis block</a> (<a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">block 0</a>).  This
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> chooses a remote <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>, called the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, and sends it the
<a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a> illustrated below.</p>

  <p><img src="/img/dev/en-ibd-getblocks.svg" alt="First GetBlocks Message Sent During IBD" /></p>

  <p>In the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes field of the <a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a>, this new <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
sends the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash of the only <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> it has, the <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">genesis block</a>
(6fe2…0000 in <a href="/en/glossary/internal-byte-order" title="The standard order in which hash digests are displayed as strings---the same format used in serialized blocks and transactions." class="auto-link">internal byte order</a>).  It also sets the stop hash field
to all zeroes to request a maximum-size response.</p>

  <p>Upon <a href="/en/developer-guide.php#term-receipt" title="A cryptographically-verifiable receipt created using parts of a payment request and a confirmed transaction" class="auto-link">receipt</a> of the <a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a>, the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> takes the first
(and only) <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash and searches its local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> for a
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> with that <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash. It finds that <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">block 0</a> matches, so it
replies with 500 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> (the maximum response to a
<a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a>) starting from <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 1. It sends these <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a>
in the <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a> illustrated below.</p>

  <p><img src="/img/dev/en-ibd-inv.svg" alt="First Inv Message Sent During IBD" /></p>

  <p><a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">Inventories</a> are unique identifiers for information on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>. Each
<a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventory</a> contains a type field and the unique identifier for an
instance of the object. For <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, the unique identifier is a hash of
the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block’s</a> <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a>.</p>

  <p>The <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transacions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> appear in the <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a> in the same order they
appear in the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, so this first <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a> contains
<a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> 1 through 501. (For example, the hash of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 1
is 4860…0000 as seen in the illustration above.)</p>

  <p>The <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> uses the received <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> to request 128 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> from
the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> in the <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> message</a> illustrated below.</p>

  <p><img src="/img/dev/en-ibd-getdata.svg" alt="First GetData Message Sent During IBD" /></p>

  <p>It’s important to <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> that the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> be requested and
sent in order because each <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> references the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash of
the preceding <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. That means the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can’t fully validate a
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> until its parent <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> has been received. <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">Blocks</a> that can’t be
validated because their parents haven’t been received are called <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan
blocks</a>; a subsection below describes them in more detail.</p>

  <p>Upon <a href="/en/developer-guide.php#term-receipt" title="A cryptographically-verifiable receipt created using parts of a payment request and a confirmed transaction" class="auto-link">receipt</a> of the <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> message</a>, the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> replies with each
of the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> requested. Each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is put into <a href="/en/glossary/serialized-block" title="A complete block in its binary format---the same format used to calculate total block byte size; often represented using hexadecimal." class="auto-link">serialized block</a> format
and sent in a separate <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code> message</a>. The first <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code> message</a> sent
(for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 1) is illustrated below.</p>

  <p><img src="/img/dev/en-ibd-block.svg" alt="First Block Message Sent During IBD" /></p>

  <p>The <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> downloads each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, validates it, and then requests the
next <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> it hasn’t requested yet, maintaining a queue of up to 128
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to download. When it has requested every <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> for which it has
an <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventory</a>, it sends another <a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a> to the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
requesting the <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> of up to 500 more <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>.  This second
<a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a> contains multiple <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes as illustrated
below:</p>

  <p><img src="/img/dev/en-ibd-getblocks2.svg" alt="Second GetBlocks Message Sent During IBD" /></p>

  <p>Upon <a href="/en/developer-guide.php#term-receipt" title="A cryptographically-verifiable receipt created using parts of a payment request and a confirmed transaction" class="auto-link">receipt</a> of the second <a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a>, the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> searches
its local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> for a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> that matches one of the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a>
hashes in the message, trying each hash in the order they were received.
If it finds a matching hash, it replies with 500 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a>
starting with the next <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> from that point. But if there is no
matching hash (besides the stopping hash), it assumes the only <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> the
two <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> have in common is <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">block 0</a> and so it sends an <code>inv</code> starting with
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 1 (the same <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a> seen several illustrations above).</p>

  <p>This repeated search allows the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to send useful <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> even if
the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> forked from the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block
chain</a>. This <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> detection becomes increasingly useful the closer the
<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> gets to the tip of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

  <p>When the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> receives the second <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a>, it will request
those <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> using <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> messages</a>.  The sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will respond with
<a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code> messages</a>.  Then the <a href="/en/glossary/initial-block-download" title="The process used by a nde (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will request more <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> with
another <a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a>—and the cycle will repeat until the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> is synced to the tip of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.  At that point, the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
will accept <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> sent through the regular <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> broadcasting described
in a later subsection.</p>

  <h5 class="no_toc" id="blocks-first-advantages--disadvantages">Blocks-First Advantages &amp; Disadvantages</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>The primary advantage of <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first IBD</a> is its simplicity. The primary
disadvantage is that the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> relies on a single sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> for all
of its downloading. This has several implications:</p>

  <ul>
    <li>
      <p><strong>Speed Limits:</strong> All requests are made to the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, so if the
sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> has limited upload bandwidth, the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will have slow
download speeds.  Note: if the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> goes offline, Umkoin Core
will continue downloading from another <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>—but it will still only
download from a single sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> at a time.</p>
    </li>
    <li>
      <p><strong>Download Restarts:</strong> The sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can send a non-best (but
otherwise valid) <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> to the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. The <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> won’t be
able to identify it as non-best until the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">initial block download</a> nears
completion, forcing the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to restart its <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> download
over again from a different <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. Umkoin Core ships with several
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> checkpoints at various <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block heights</a> selected by
developers to help an <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> detect that it is being fed an
alternative <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> history—allowing the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to restart
its download earlier in the process.</p>
    </li>
    <li>
      <p><strong>Disk Fill Attacks:</strong> Closely related to the download restarts, if
the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> sends a non-best (but otherwise valid) <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, the
chain will be stored on disk, wasting space and possibly filling up
the disk drive with useless data.</p>
    </li>
    <li>
      <p><strong>High Memory Use:</strong> Whether maliciously or by accident, the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
can send <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> out of order, creating <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan blocks</a> which can’t be
validated until their parents have been received and validated.
<a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">Orphan blocks</a> are stored in memory while they await validation,
which may lead to high memory use.</p>
    </li>
  </ul>

  <p>All of these problems are addressed in part or in full by the
<a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first IBD</a> method used in <a href="/en/release/v0.10.0" class="auto-link">Umkoin Core 0.10.0</a>.</p>

  <p><strong>Resources:</strong> The table below summarizes the messages mentioned
throughout this subsection. The links in the message field will take you
to the reference page for that message.</p>

  <table>
    <tbody>
      <tr>
        <td><strong>Message</strong></td>
        <td><a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes"><code>getblocks</code></a></td>
        <td><a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer"><code>inv</code></a></td>
        <td><a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks"><code>getdata</code></a></td>
        <td><a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block"><code>block</code></a></td>
      </tr>
      <tr>
        <td><strong>From→To</strong></td>
        <td><a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>→Sync</td>
        <td>Sync→<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a></td>
        <td><a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>→Sync</td>
        <td>Sync→<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a></td>
      </tr>
      <tr>
        <td><strong>Payl/strong></td>
        <td>One or more <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes</td>
        <td>Up to 500 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> (unique identifiers)</td>
        <td>One or more <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a></td>
        <td>One <a href="/en/glossary/serialized-block" title="A complete block in its binary format---the same format used to calculate total block byte size; often represented using hexadecimal." class="auto-link">serialized block</a></td>
      </tr>
    </tbody>
  </table>

  <h4 id="headers-first">Headers-First</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/release/v0.10.0" class="auto-link">Umkoin Core 0.10.0</a> uses an <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">initial block download</a> (<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>) method called
<em><a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a></em>. The goal is to download the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> for the best <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" id="term-header-chain" class="term">header
chain</a>, partially validate them as best
as possible, and then download the corresponding <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> in parallel.  This
solves several problems with the older <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first IBD</a> method.</p>

  <p><img src="/img/dev/en-headers-first-flowchart.svg" alt="Overview Of Headers-First Method" /></p>

  <p>The first time a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> is started, it only has a single <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> in its
local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>—the hardcoded <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">genesis block</a> (<a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">block 0</a>).  The
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> chooses a remote <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>, which we’ll call the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, and sends it the
<a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code> message</a> illustrated below.</p>

  <p><img src="/img/dev/en-ibd-getheaders.svg" alt="First getheaders message" /></p>

  <p>In the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes field of the <a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code> message</a>, the new <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
sends the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash of the only <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> it has, the <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">genesis block</a>
(6fe2…0000 in <a href="/en/glossary/internal-byte-order" title="The standard order in which hash digests are displayed as strings---the same format used in serialized blocks and transactions." class="auto-link">internal byte order</a>).  It also sets the stop hash field
to all zeroes to request a maximum-size response.</p>

  <p>Upon <a href="/en/developer-guide.php#term-receipt" title="A cryptographically-verifiable receipt created using parts of a payment request and a confirmed transaction" class="auto-link">receipt</a> of the <a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code> message</a>, the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> takes the first
(and only) <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash and searches its local <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> for a
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> with that <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash. It finds that <a href="/en/glossary/genesis-block" title="The first block in the Umkoin block chain." class="auto-link">block 0</a> matches so it
replies with 2,000 <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> (the maximum response) starting from
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 1. It sends these <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes in the <a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers" class="auto-link"><code>headers</code> message</a>
illustrated below.</p>

  <p><img src="/img/dev/en-ibd-headers.svg" alt="First headers message" /></p>

  <p>The <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can partially validate these <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a> by ensuring that
all fields follow <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> and that the hash of the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> is
below the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> according to the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">nBits</a> field.  (Full
validation still requires all transactions from the corresponding
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.)</p>

  <p>After the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> has partially validated the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a>, it can do
two things in parallel:</p>

  <ol>
    <li>
      <p><strong>Download More <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">Headers</a>:</strong> the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can send another <a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code>
message</a> to the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to request the next 2,000 <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> on the
<a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a>. Those <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> can be immediately validated and
another batch requested repeatedly until a <a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers" class="auto-link"><code>headers</code> message</a> is
received from the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> with fewer than 2,000 <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a>, indicating
that it has no more <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> to offer. As of this writing, <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a>
sync can be completed in fewer than 200 round trips, or about 32 MB
of downloaded data.</p>

      <p>Once the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> receives a <a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers" class="auto-link"><code>headers</code> message</a> with fewer than 2,000
 <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> from the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, it sends a <a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code> message</a> to each
 of its outbound <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> to get their view of <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a>. By
 comparing the responses, it can easily determine if the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> it
 has downloaded belong to the <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a> reported by any of
 its outbound <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>. This means a dishonest sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will quickly be
 discovered even if checkpoints aren’t used (as long as the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
 connects to at least one honest <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>; Umkoin Core will continue to
 provide checkpoints in case honest <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> can’t be found).</p>
    </li>
    <li>
      <p><strong>Download <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">Blocks</a>:</strong> While the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> continues downloading
<a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a>, and after the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> finish downloading, the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will
request and download each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. The <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> can use the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block
header</a> hashes it computed from the <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">header chain</a> to create <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code>
messages</a> that request the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> it needs by their <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventory</a>. It
doesn’t need to request these from the sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>—it can request
them from any of its <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>. (Although not all full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin netwass="auto-link">nodes</a>
may store all <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>.) This allows it to fetch <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> in parallel and
avoid having its download speed constrained to the upload speed of a
single sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>.</p>

      <p>To spread the load between multiple <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>, Umkoin Core will only
 request up to 16 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> at a time from a single <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>. Combined with
 its maximum of 8 outbound connections, this means <a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a>
 Umkoin Core will request a maximum of 128 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> simultaneously
 during <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> (the same maximum number that <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first</a> Umkoin Core
 requested from its sync <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>).</p>
    </li>
  </ol>

  <p><img src="/img/dev/en-headers-first-moving-window.svg" alt="Simulated Headers-First Download Window" /></p>

  <p>Umkoin Core’s <a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a> mode uses a 1,024-<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> moving download
window to maximize download speed. The lowest-<a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">height</a> <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> in the window
is the next <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to be validated; if the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> hasn’t arrived by the
time Umkoin Core is ready to validate it, Umkoin Core will wait a
minimum of two more seconds for the stalling <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to send the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. If
the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> still hasn’t arrived, Umkoin Core will disconnect from the
stalling <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> and attempt to connect to another <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. For example, in
the illustration above, <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">Node</a> A will be disconnected if it doesn’t send
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> 3 within at least two seconds.</p>

  <p>Once the <a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> is synced to the tip of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, it will
accept <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> sent through the regular <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> broadcasting described in a
later subsection.</p>

  <p><strong>Resources:</strong> The table below summarizes the messages mentioned
throughout this subsection. The links in the message field will take you
to the reference page for that message.</p>

  <table>
    <tbody>
      <tr>
        <td><strong>Message</strong></td>
        <td><a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers"><code>getheaders</code></a></td>
        <td><a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers"><code>headers</code></a></td>
        <td><a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks"><code>getdata</code></a></td>
        <td><a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block"><code>block</code></a></td>
      </tr>
      <tr>
        <td><strong>From→To</strong></td>
        <td><a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>→Sync</td>
        <td>Sync→<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of te best block chain." class="auto-link">IBD</a></td>
        <td><a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a>→<em>Many</em></td>
        <td><em>Many</em>→<a href="/en/glossary/initial-block-download" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a></td>
      </tr>
      <tr>
        <td><strong>Payload</strong></td>
        <td>One or more <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes</td>
        <td>Up to 2,000 <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a></td>
        <td>One or more <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> derived from <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hashes</td>
        <td>One <a href="/en/glossary/serialized-block" title="A complete block in its binary format---the same format used to calculate total block byte size; often represented using hexadecimal." class="auto-link">serialized block</a></td>
      </tr>
    </tbody>
  </table>

  <h3 id="block-broadcasting">Block Broadcasting</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>When a <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> discovers a new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, it broadcasts the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to its
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> using one of the following methods:</p>

  <ul>
    <li>
      <p><strong><a href="/en/developer-guide.php#term-unsolicited-block-push" title="When a miner sends a block message without sending an inv message first" id="term-unsolicited-block-push" class="term">Unsolicited Block Push</a>:</strong>
the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> sends a <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code> message</a> to each of its <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> with
the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> can reasonably bypass the standard relay
method in this way because it knows none of its <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> already have the
just-discovered <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>
    </li>
    <li>
      <p><strong><a href="/en/developer-guide.php#term-standard-block-relay" title="The regular block relay method: announcing a block with an inv message and waiting for a response" id="term-standard-block-relay" class="term">Standard Block Relay</a>:</strong>
the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a>, acting as a standard relay <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, sends an <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a> to
each of its <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> (both <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> and <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a>) with an <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventory</a> referring
to the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. The most common responses are:</p>

      <ul>
        <li>
          <p>Each <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first</a> (BF) <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> that wants the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> replies with a
<a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> message</a> requesting the full <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>
        </li>
        <li>
          <p>Each <a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a> (HF) <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> that wants the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> replies with a
<a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code> message</a> containing the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> hash of the
highest-<a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">height</a> <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> on its <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a>, and likely also
some <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> further back on the <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a> to allow <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a>
detection. That message is immediately followed by a <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code>
message</a> requesting the full <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. By requesting <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> first, a
<a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> can refuse <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan blocks</a> as described in the
subsection below.</p>
        </li>
        <li>
          <p>Each <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">Simplified Payment Verification</a> (<a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a>) client that wants the
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> replies with a <a href="/en/developer-re#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> message</a> typically requesting a
<a href="/en/glossary/merkle-block" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a>.</p>
        </li>
      </ul>

      <p>The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> replies to each request accordingly by sending the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>
 in a <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code> message</a>, one or more <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> in a <a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers" class="auto-link"><code>headers</code> message</a>,
 or the <a href="/en/glossary/merkle-block" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a> and transactions relative to the <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client’s</a>
 <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> in a <a href="/en/developer-reference#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a> followed by zero or more
 <a href="/en/developer-reference#tx" title="A P2P protocol message which sends a single serialized transaction" class="auto-link"><code>tx</code> messages</a>.</p>
    </li>
    <li>
      <p><strong><a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." id="term-direct-headers-announcement" class="term">Direct Headers Announcement</a>:</strong>
a relay <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> may skip the round trip overhead of an <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a>
followed by <code>getheaders</code> by instead immediately sending a <a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers" class="auto-link"><code>headers</code>
message</a> containing the full <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> of the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. A HF <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>
receiving this message will partially validate the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> as it
would during <a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first IBD</a>, then request the full <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> contents
with a <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> message</a> if the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> is valid. The relay <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> then
responds to the <code>getdata</code> request with the full or filtered <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>
data in a <code>block</code> or <a href="/en/developer-reference#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a>, respectively. A HF <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
may signal that it prefers to receive <code>headers</code> instead of <code>inv</code>
announcements by sending a special <a href="/en/developer-reference#sendheaders" title="A P2P network message used to request new blocks be announced through headers messages rather than inv messages" class="auto-link"><code>sendheaders</code> message</a> during the
connection handshake.</p>

      <p>This protocol for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> broadcasting was proposed in BIP 130 and has
been implemented in Umkoin Core since version 0.12.</p>
    </li>
  </ul>

  <p>By default, Umkoin Core broadcasts <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> using direct <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a>
announcement to any <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> that have signalled with <a href="/en/developer-reference#sendheaders" title="A P2P network message used to request new blocks be announced through headers messages rather than inv messages" class="auto-link"><code>sendheaders</code></a> and
uses <a href="/en/developer-guide.php#term-standard-block-relay" title="The regular block relay method: announcing a block with an inv message and waiting for a response" class="auto-link">standard block relay</a> for all <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> that have not. Umkoin Core
will accept <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> sent using any of the methods described above.</p>

  <p>Full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> validate the received <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and then advertise it to their
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> using the <a href="/en/developer-guide.php#term-standard-block-relay" title="The regular block relay method: announcing a block with an inv message and waiting for a response" class="auto-link">standard block relay</a> method described above.  The condensed
table below highlights the operation of the messages described above
(Relay, BF, HF, and <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a> refer to the relay <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, a <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, a
<a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, and an <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV client</a>; <em>any</em> refers to a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> using any
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> retrieval method.)</p>

  <table>
    <tbody>
      <tr>
        <td><strong>Message</strong></td>
        <td><a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer"><code>inv</code></a></td>
        <td><a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks"><code>getdata</code></a></td>
        <td><a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers"><code>getheaders</code></a></td>
        <td><a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers"><code>headers</code></a></td>
      </tr>
      <tr>
        <td><strong>From→To</strong></td>
        <td>Relay→<em>Any</em></td>
        <td>BF→Relay</td>
        <td>HF→Relay</td>
        <td>Relay→HF</td>
      </tr>
      <tr>
        <td><strong>Payload</strong></td>
        <td>The <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventory</a> of the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a></td>
        <td>The <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventory</a> of the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a></td>
        <td>One or more <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> s on the HF <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a> (BHC)</td>
        <td>Up to 2,000 <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> connecting HF <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> BHC to relay <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> BHC</td>
      </tr>
      <tr>
        <td><strong>Message</strong></td>
        <td><a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block"><code>block</code></a></td>
        <td><a href="/en/developer-reference#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs"><code>merkleblock</code></a></td>
        <td><a href="/en/developer-reference#tx" title="A P2P protocol message which sends a single serialized transaction"><code>tx</code></a></td>
        <td> </td>
      </tr>
      <tr>
        <td><strong>From→To</strong></td>
        <td>Relay→BF/HF</td>
        <td>Relay→<a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a></td>
        <td>Relay→<a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV</a></td>
        <td> </td>
      </tr>
      <tr>
        <td><strong>Payload</strong></td>
        <td>The new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> in <a href="/en/developer-reference#serialized-blocks">serialized format</a></td>
        <td>The new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> filtered into a <a href="/en/glossary/merkle-block" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a></td>
        <td><a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal.  Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">Serialized transactions</a> from the new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> that match the <a href="/en/glossary/bloom-filter" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a></td>
        <td> </td>
      </tr>
    </tbody>
  </table>

  <h4 id="orphan-blocks">Orphan Blocks</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">Blocks-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> may download <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan blocks</a>—<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> whose <a href="/en/developer-reference#term-previous-block-header-hash" title="A field in the block header which contains the SHA256(SHA256()) hash of the previous block's header" class="auto-link">previous
block header hash</a> field refers to a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> this <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
hasn’t seen yet. In other words, <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan blocks</a> have no known parent
(unlike <a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">stale blocks</a>, which have known parents but which aren’t part of
the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>).</p>

  <p><img src="/img/dev/en-orphan-stale-definition.svg" alt="Difference Between Orphan And Stale Blocks" /></p>

  <p>When a <a href="/en/glossary/blocks-first-sync" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">blocks-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> downloads an <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan block</a>, it will not validate
it. Instead, it will send a <a href="/en/developer-reference#getblocks" title="A P2P protocol message used to request an inv message containing a range of block header hashes" class="auto-link"><code>getblocks</code> message</a> to the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> which sent
the <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan block</a>; the broadcasting <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will respond with an <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a>
containing <a href="/en/glossary/inventory" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a> of any <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> the downloading <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> is missing (up
to 500); the downloading <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will request those <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> with a <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code>
message</a>; and the broadcasting <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will send those <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> with a <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code>
message</a>. The downloading <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will validate those <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, and once the
parent of the former <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan block</a> has been validated, it will validate
the former <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan block</a>.</p>

  <p><a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">Headers-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> avoid some of this complexity by always requesting
<a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a> with the <a href="/en/developer-reference#getheaders" title="A P2P protocol message used to request a range of block headers" class="auto-link"><code>getheaders</code> message</a> before requesting a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>
with the <a href="/en/developer-reference#getdata" title="A P2P protocol message used to request one or more transactions, blocks, or merkle blocks" class="auto-link"><code>getdata</code> message</a>. The broadcasting <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will send a <a href="/en/developer-reference#headers" title="A P2P protocol message containing one or more block headers" class="auto-link"><code>headers</code>
message</a> containing all the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a> (up to 2,000) it thinks the
downloading <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> needs to reach the tip of the <a href="/en/glossary/header-chain" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a>; each of
those <a href="/en/glossary/blocder" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a> will point to its parent, so when the downloading <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
receives the <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code> message</a>, the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> shouldn’t be an <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan
block</a>—all of its parents should be known (even if they haven’t been
validated yet). If, despite this, the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> received in the <a href="/en/developer-reference#block" title="The P2P network message which sends a serialized block" class="auto-link"><code>block</code>
message</a> is an <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan block</a>, a <a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will discard it immediately.</p>

  <p>However, orphan discarding does mean that <a href="/en/glossary/headers-first-sync" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">headers-first</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> will
ignore <a href="/en/glossary/orphan-block.php" title="Blocks whose parent block has not been processed by the local node, so they can't be fully validated yet." class="auto-link">orphan blocks</a> sent by <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> in an <a href="/en/developer-guide.php#term-unsolicited-block-push" title="When a miner sends a block message without sending an inv message first" class="auto-link">unsolicited block push</a>.</p>

  <h3 id="transaction-broadcasting">Transaction Broadcasting</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>In order to send a transaction to a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a>, an <a href="/en/developer-reference#inv" title="A P2P protocol message used to send inventories of transactions and blocks known to the transmitting peer" class="auto-link"><code>inv</code> message</a> is sent. If a <code>getdata</code> response message is received, the transaction is sent using <code>tx</code>. The <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> receiving this transaction also forwards the transaction in the same manner, given that it is a valid transaction.</p>

  <h4 id="memory-pool">Memory Pool</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>Full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> may keep track of <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> which are eligible to
be included in the next <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>. This is essential for <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> who will
actually <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mine</a> some or all of those transactions, but it’s also useful
for any <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> who wants to keep track of <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a>, such
as <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> serving <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transaction</a> information to <a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV clients</a>.</p>

  <p>Because <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> have no permanent status in Umkoin,
Umkoin Core stores them in non-persistent memory, calling them a memory
pool or mempool. When a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> shuts down, its memory pool is lost except
for any transactions stored by its <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>. This means that never-mined
<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> tend to slowly disappear from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> as
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> restart or as they purge some transactions to make room in memory
for others.</p>

  <p>Transactions which are mined into <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> that later become <a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">stale blocks</a> may be
added back into the memory pool. These re-added transactions may be
re-removed from the pool almost immediately if the replacement <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>
include them. This is the case in Umkoin Core, which removes <a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">stale
blocks</a> from the chain one by one, starting with the tip (highest <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>).
As each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is removed, its transactions are added back to the memory
pool. After all of the <a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">stale blocks</a> are removed, the replacement
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> are added to the chain one by one, ending with the new tip. As
each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is added, any transactions it confirms are removed from the
memory pool.</p>

  <p><a href="/en/glossary/simplified-payment-verification" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV clients</a> don’t have a memory pool for the same reason they don’t
relay transactions. They can’t independently verify that a transaction
hasn’t yet been included in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and that it only spends <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>, so
they can’t know which transactions are eligible to be included in the
next <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block r and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>

  <h3 id="misbehaving-nodes">Misbehaving Nodes</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p>Take note that for both types of broadcasting, mechanisms are in place to punish misbehaving <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> who take up bandwidth and computing resources by sending false information. If a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> gets a banscore above the <code>-banscore=&lt;n&gt;</code> threshold, he will be banned for the number of seconds defined by <code>-bantime=&lt;n&gt;</code>, which is 86,400 by default (24 hours).</p>

  <h3 id="alerts">Alerts</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/p2p_network.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/p2p_network.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/p2p_network.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/p2p_network.md%0A%0A">Report Issue</a>


</div>

  <p><em>Removed in <a href="/en/release/v0.13.0" class="auto-link">Umkoin Core 0.13.0</a></em></p>

  <p>Earlier versions of Umkoin Core allowed developers and trusted community members to issue <a href="https://umkoin.org/en/alerts">Umkoin alerts</a> to notify users of critical <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>-wide issues. This messaging system <a href="https://umkoin.org/en/alert/2016-11-01-alert-retirement">was retired</a> in Umkoin Core v0.13.0; however, internal alerts, partition detection warnings and the <code>-alertnotify</code> option features remain.</p>

  <h2 id="mining">Mining</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p><a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">Mining</a> adds new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>, making transaction history
hard to modify.  <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">Mining</a> today takes on two forms:</p>

  <ul>
    <li>
      <p>Solo <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>, where the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> attempts to generate new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> on his
own, with the proceeds from the <a href="/en/glossary/block-reward.php" title="The amount that miners may claim as a reward for creating a block. Equal to the sum of the block subsidy (newly available satoshis) plus the transactions fees paid by transactions included in the block." class="auto-link">block reward</a> and <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>
going entirely to himself, allowing him to receive large payments with
a higher variance (longer time between payments)</p>
    </li>
    <li>
      <p>Pooled <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>, where the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> pools resources with other <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> to
find <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> more often, with the proceeds being shared among the pool
<a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> in rough correlation to the amount of hashing power
they each contributed, allowing the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> to receive small
payments with a lower variance (shorter time between payments).</p>
    </li>
  </ul>

  <h3 id="solo-mining">Solo Mining</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p>As illustrated below, solo <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> typically use <code>umkoind</code> to get new
transactions from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>. Their <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software periodically polls
<code>umkoind</code> for new transactions using the <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code> RPC</a>, which
provides the list of new transactions plus the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> to which the
<a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> should be sent.</p>

  <p><img src="/img/dev/en-solo-mining-overview.svg" alt="Solo Umkoin Mining" /></p>

  <p>The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software constructs a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> using the template (described below) and creates a
<a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a>. It then sends the 80-byte <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> to its <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>
hardware (an ASIC) along with a <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> (<a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">difficulty</a> setting).
The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> hardware iterates through every possible value for the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block
header</a> nonce and generates the corresponding hash.</p>

  <p>If none of the hashes are below the threshold, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> hardware gets
an updated <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> with a new <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> from the <a href="/en/glossary/mining.php" title="Mini the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software;
this new <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> is created by adding extra nonce data to the
<a href="/en/glossary/coinbase" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase field</a> of the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>.</p>

  <p>On the other hand, if a hash is found below the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a>, the
<a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> hardware returns the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> with the successful nonce to
the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software. The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software combines the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> with the
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> and sends the completed <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to <code>umkoind</code> to be broadcast to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> for addition to the
<a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

  <h3 id="pool-mining">Pool Mining</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p>Pool <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> follow a similar workflow, illustrated below, which allows
<a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool operators to pay <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> based on their share of the work
done. The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool gets new transactions from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> using
<code>umkoind</code>. Using one of the methods discussed later, each <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner’s</a> <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>
software connects to the pool and requests the information it needs to
construct <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a>.</p>

  <p><img src="/img/dev/en-pooled-mining-overview.svg" alt="Pooled Umkoin Mining" /></p>

  <p>In pooled <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool sets the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> a few orders
of magnitude higher (less difficult) than the <a href="/en/glossary/difficulty.php" title="How difficult it is to find a block relative to the difficulty of finding the easiest possible block. The easiest possible block has a proof-of-work difficulty of 1." class="auto-link">network
difficulty</a>. This causes the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> hardware to return many <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a>
which don’t hash to a value eligible for inclusion on the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>
but which do hash below the pool’s <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target</a>, proving (on average) that the
<a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> checked a percentage of the possible hash values.</p>

  <p>The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> then sends to the pool a copy of the information the pool
needs to validate that the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> will hash below the <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target</a> and that
the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> of transactions referred to by the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> field
is valid for the pool’s purposes. (This usually means that the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase
transaction</a> must pay the pool.)</p>

  <p>The information the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> sends to the pool is called a share because it
proves the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> did a share of the work. By chance, some shares the
pool receives will also be below the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target</a>—the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool
sends these to the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> to be added to the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

  <p>The <a href="/en/glossary/block-reward.php" title="The amount that miners may claim as a reward for creating a block. Equal to the sum of the block subsidy (newly available satoshis) plus the transactions fees paid by transactions included in the block." class="auto-link">block reward</a> and <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a> that come from <a href="/en/glossary/mining.php" title="Miis the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> that <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>
are paid to the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool. The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool pays out a portion of
these proceeds to individual <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> based on how many shares they generated. For
example, if the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool’s <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> is 100 times lower than
the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a>, 100 shares will need to be generated on
average to create a successful <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, so the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool can pay 1/100th
of its payout for each share received.  Different <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pools use
different reward distribution systems based on this basic share system.</p>

  <h3 id="block-prototypes">Block Prototypes</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p>In both solo and pool <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software needs to get the
information necessary to construct <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a>. This subsection
describes, in a linear way, how that information is transmitted and
used. However, in actual implementations, parallel threads and queuing
are used to keep ASIC hashers working at maximum capacity,</p>

  <h4 id="getwork-rpc">getwork RPC</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p>The simplest and earliest method was the now-deprecated Umkoin Core
<a href="/en/developer-reference#getwork" class="auto-link"><code>getwork</code> RPC</a>, which constructs a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> for the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> directly. Since a
<a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> only contains a single 4-byte nonce good for about 4 gigahashes,
many modern <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> need to make dozens or hundreds of <a href="/en/developer-reference#getwork" class="auto-link"><code>getwork</code></a> requests
a second. Solo <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> may still use <a href="/en/developer-reference#getwork" class="auto-link"><code>getwork</code></a> on v0.9.5 or below, but most pools today
discourage or disallow its use.</p>

  <h4 id="getblocktemplate-rpc">getblocktemplate RPC</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p>An improved method is the Umkoin Core <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code> RPC</a>. This
provides the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software with much more information:</p>

  <ol>
    <li>
      <p>The information necessary to construct a <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>
paying the pool or the solo <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner’s</a> <code>umkoind</code> <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>
    </li>
    <li>
      <p>A complete dump of the transactions <code>umkoind</code> or the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool
suggests including in the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, allowing the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software to
inspect the transactions, optionally add additional transactions, and
optionally remove non-required transactions.</p>
    </li>
    <li>
      <p>Other information necessary to construct a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> for the next
<a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>: the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> version, previous <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> hash, and bits (<a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target</a>).</p>
    </li>
    <li>
      <p>The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool’s current <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> for accepting shares. (For
solo <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a>, this is the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for te block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target</a>.)</p>
    </li>
  </ol>

  <p>Using the transactions received, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software adds a nonce to the
<a href="/en/glossary/coinbase" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase</a> extra nonce field and then converts all the transactions into a
<a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a> to derive a <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> it can use in a <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a>.
Whenever the extra nonce field needs to be changed, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software
rebuilds the necessary parts of the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a> and updates the time and
<a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> fields in the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a>.</p>

  <p>Like all <code>umkoind</code> <a href="/en/developer-reference#remote-procedure-calls-rpcs" class="auto-link">RPCs</a>, <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code></a> is sent over HTTP. To
ensure they get the most recent work, most <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> use <a href="https://en.wikipedia.org/wiki/Push_technology#Long_polling">HTTP longpoll</a> to
leave a <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code></a> request open at all times. This allows the
<a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool to push a new <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code></a> to the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> as soon as any
<a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a> publishes a new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> or the pool
wants to send more transactions to the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software.</p>

  <h4 id="stratum">Stratum</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/guides/mining.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/guides/mining.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/guides/mining.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/guides/mining.md%0A%0A">Report Issue</a>


</div>

  <p>A widely used alternative to <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code></a> is the <a href="http://mining.umkoin.cz/stratum-mining">Stratum mining
protocol</a>. Stratum focuses on giving <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> the minimal information they
need to construct <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a> on their own:</p>

  <ol>
    <li>
      <p>The information necessary to construct a <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>
paying the pool.</p>
    </li>
    <li>
      <p>The parts of the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a> which need to be re-hashed to
create a new <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> when the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> is
updated with a new extra nonce. The other parts of the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle
tree</a>, if any, are not sent, effectively limiting the amount of data which needs
to be sent to (at most) about a kilobyte at current transaction
volume.</p>
    </li>
    <li>
      <p>All of the other non-<a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> information necessary to construct a
<a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> for the next <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>
    </li>
    <li>
      <p>The <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool’s current <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">target threshold</a> for accepting shares.</p>
    </li>
  </ol>

  <p>Using the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> received, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software adds a
nonce to the <a href="/en/glossary/coinbase" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase</a> extra nonce field, hashes the <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase
transaction</a>, and adds the hash to the received parts of the <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root.  In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a>.
The tree is hashed as necessary to create a <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a>, which is added
to the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> information received. Whenever the extra nonce field
needs to be changed, the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software updates and re-hashes the
<a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>, rebuilds the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a>, and updates the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a>
<a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree.  Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> field.</p>

  <p>Unlike <a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code></a>, <a href="/en/glossary/mining.php" title="Mining is the acting valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> using Stratum cannot inspect or add
transactions to the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> they’re currently <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a>. Also unlike
<a href="/en/developer-reference#getblocktemplate" class="auto-link"><code>getblocktemplate</code></a>, the Stratum protocol uses a two-way TCP socket directly,
so <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> don’t need to use HTTP longpoll to ensure they receive
immediate updates from <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pools when a new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> is broadcast to the
<a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">peer-to-peer network</a>.</p>

  <p><strong>Resources:</strong> The GPLv3 <a href="https://github.com/luke-jr/bfgminer">BFGMiner</a> <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> software and AGPLv3
<a href="https://github.com/luke-jr/eloipool">Eloipool</a> <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> pool software are widely-used among <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> and
pools. The <a href="https://github.com/umkoin/libblkmaker">libblkmaker</a> C library and <a href="https://gitorious.org/umkoin/python-blkmaker">python-blkmaker</a> library,
both MIT licensed, can interpret GetBlockTemplate for your programs.</p>

    </div>

  </div>

</div>


<script type="text/javascript">
  fallbackSVG();
  addAnchorLinks();
  trackOutgoingLinks();
</script>


<?php
include 'page_footer.php';
?>


<script src="/js/jquery/jquery-1.11.2.min.js"></script>
<script src="/js/jquery/jquery-ui.min.js"></script>
<script src="/js/devsearch.js"></script>
<script>updateToc();</script>


</body>
</html>
