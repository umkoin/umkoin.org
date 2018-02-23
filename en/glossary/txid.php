<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Txid, Transaction Identifier - Umkoin Glossary</title>

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
    Txid
  </div>

  <div id="content" class="content">

    <h1>Txid, Transaction Identifier</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Txid</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/outpoint.php" title="The data structure used to refer to a particular transaction output, consisting of a 32-byte TXID and a 4-byte output index number (vout)." class="auto-link">Outpoint</a> (the combination of a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> with a vout used to identify a specific <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-txid">Txid</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
