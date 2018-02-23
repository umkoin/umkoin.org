<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Unspent Transaction Output, UTXO - Umkoin Glossary</title>

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
    UTXO
  </div>

  <div id="content" class="content">

    <h1>Unspent Transaction Output, UTXO</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>An Unspent Transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Output</a> (<a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>) that can be spent as an <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> in a new transaction.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>UTXO</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Output</a> (any <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, whether spent or not. <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">Outputs</a> are a superset of <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-utxo">UTXO</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
