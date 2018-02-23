<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Sequence Number (Transactions) - Umkoin Glossary</title>

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
    Sequence number
  </div>

  <div id="content" class="content">

    <h1>Sequence Number (Transactions)</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>Part of all transactions. A number intended to allow <a href="/en/glossary/confirmation-score.php" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed</a> time-locked transactions to be updated before being finalized; not currently used except to disable <a href="/en/glossary/locktime.php" title="Part of a transaction which indicates the earliest time or earliest block when that transaction may be added to the block chain." class="auto-link">locktime</a> in a transaction</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Sequence number</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">Output index</a> number / vout (this is the 0-indexed number of an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> within a transaction used by a later transaction to refer to that specific <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-sequence-number">Sequence number</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
