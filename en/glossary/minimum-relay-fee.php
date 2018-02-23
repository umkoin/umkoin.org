<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Minimum Relay Fee - Umkoin Glossary</title>

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
    Minimum relay fee
  </div>

  <div id="content" class="content">

    <h1>Minimum Relay Fee</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The minimum <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> a transaction must pay (if it isn’t a <a href="/en/glossary/high-priority-transaction.php" title="Transactions that don't have to pay a transaction fee because their inputs have been idle long enough to accumulated large amounts of priority. Note: miners choose whether to accept free transactions." class="auto-link">high-priority transaction</a>) for a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">full node</a> to relay that transaction to other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>. There is no one <a href="/en/glossary/minimum-relay-fee.php" title="The minimum transaction fee a transaction must pay (if it isn't a high-priority transaction) for a full node to relay that transaction to other nodes. There is no one minimum relay fee---each node chooses its own policy." class="auto-link">minimum relay fee</a>—each <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> chooses its own policy.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Minimum relay fee</p>
      </li>
      <li>
        <p>Relay fee</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">Transaction fee</a> (the <a href="/en/glossary/minimum-relay-fee.php" title="The minimum transaction fee a transaction must pay (if it isn't a high-priority transaction) for a full node to relay that transaction to other nodes. There is no one minimum relay fee---each node chooses its own policy." class="auto-link">minimum relay fee</a> is a policy setting that filters out transactions with too-low <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-minimum-fee">Minimum relay fee</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
