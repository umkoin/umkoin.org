<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Transaction Fee, Miner Fee - Umkoin Glossary</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
</head>


<body>


<?php
include '..page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Transaction fee
  </div>

  <div id="content" class="content">

    <h1>Transaction Fee, Miner Fee</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The amount remaining when the value of all <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> in a transaction are subtracted from all <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> in a transaction; the fee is paid to the <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a> who includes that transaction in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Transaction fee</p>
      </li>
      <li>
        <p>Miners fee</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/minimum-relay-fee.php" title="The minimum transaction fee a transaction must pay (if it isn't a high-priority transaction) for a full node to relay that transaction to other nodes. There is no one minimum relay fee---each node chooses its own policy." class="auto-link">Minimum relay fee</a> (the lowest fee a transaction must pay to be accepted into the memory pool and relayed by Umkoin Core <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-transaction-fee">Transaction fee</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
