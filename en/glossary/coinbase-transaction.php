<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Coinbase / Generation Transaction - Umkoin Glossary</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
</head>


<body>


<?php
include '../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Coinbase transaction
  </div>

  <div id="content" class="content">

    <h1>Coinbase / Generation Transaction</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The first transaction in a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.  Always created by a <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miner</a>, it includes a single <a href="/en/glossary/coinbase.php" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Coinbase transaction</p>
      </li>
      <li>
        <p>Generation transaction</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/coinbase.php" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">Coinbase</a> (the unique part of a <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#term-coinbase-tx">Coinbase transaction</a> — Umkoin.org Developer Reference</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
