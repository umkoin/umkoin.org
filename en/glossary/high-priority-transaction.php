<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>High-Priority Transaction, Free Tx - Umkoin Glossary</title>

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
    High-priority transaction
  </div>

  <div id="content" class="content">

    <h1>High-Priority Transaction, Free Tx</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>Transactions that don’t have to pay a <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> because their <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> have been idle long enough to accumulated large amounts of priority.  Note: <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> choose whether to accept <a href="/en/glossary/high-priority-transaction.php" title="Transactions that don't have to pay a transaction fee because their inputs have been idle long enough to accumulated large amounts of priority.  Note: miners choose whether to accept free transactions." class="auto-link">free transactions</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>High-priority transaction</p>
      </li>
      <li>
        <p>Free transaction</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-high-priority-transactions">High-priority transactions</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
