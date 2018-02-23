<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Confirmation Score, Confirmed Transaction - Umkoin Glossary</title>

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
    Confirmation score
  </div>

  <div id="content" class="content">

    <h1>Confirmation Score, Confirmed Transaction</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A score indicating the number of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> on the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a> that would need to be modified to remove or modify a particular transaction. A <a href="/en/glossary/confirmation-score.php" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed transaction</a> has a <a href="/en/glossary/confirmation-score.php" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmation score</a> of one or higher.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Confirmation score</p>
      </li>
      <li>
        <p>Confirmations</p>
      </li>
      <li>
        <p>Confirmed transaction</p>
      </li>
      <li>
        <p>Unconfirmed transaction</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-confirmation">Confirmations</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
