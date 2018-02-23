<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Output, Transaction Output, TxOut - Umkoin Glossary</title>

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
    Output
  </div>

  <div id="content" class="content">

    <h1>Output, Transaction Output, TxOut</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>An <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> in a transaction which contains two fields: a value field for transferring zero or more <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> and a <a href="/en/glossary/pubkey-script.php" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> for indicating what conditions must be fulfilled for those <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to be further spent.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Output</p>
      </li>
      <li>
        <p>TxOut</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/outpoint.php" title="The data structure used to refer to a particular transaction output, consisting of a 32-byte TXID and a 4-byte output index number (vout)." class="auto-link">Outpoint</a> (a reference to a particular <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-output">Output</a> — Umkoin.org Developer Guide</p>
      </li>
      <li>
        <p><a href="/en/developer-reference.php#txout">TxOut</a> — Umkoin.org Developer Reference</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
