<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>SIGHASH_ANYONECANPAY - Umkoin Glossary</title>

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
    SIGHASH_ANYONECANPAY
  </div>

  <div id="content" class="content">

    <h1>SIGHASH_ANYONECANPAY</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A <a href="/en/glossary/signature-hash.php" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs.  (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">signature hash</a> type which signs only the current <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>SIGHASH_ANYONECANPAY</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/sighash-single.php" title="Signature hash type that signs the output corresponding to this input (the one with the same index value), this input, and any other inputs partially. Allows modification of other outputs and the sequence number of other inputs." class="auto-link">SIGHASH_SINGLE</a> (which signs this <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>, its corresponding <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>, and other <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> partially)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-sighash-anyonecanpay">SIGHASH_ANYONECANPAY</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
