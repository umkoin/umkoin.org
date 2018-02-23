<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>P2PKH Address, Pay To PubKey Hash - Umkoin Glossary</title>

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
    P2PKH address
  </div>

  <div id="content" class="content">

    <h1>P2PKH Address, Pay To PubKey Hash</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A Umkoin payment <a href="/en/glossary/address.php" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> comprising a hashed <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>, allowing the spender to create a standard <a href="/en/glossary/pubkey-script.php" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> that Pays To <a href="/en/glossary/p2pkh-address.php" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">PubKey Hash</a> (P2PKH).</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>P2PKH address</p>
      </li>
      <li>
        <p>P2PKH output</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p>P2PK <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> (an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> paying a <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> directly)</p>
      </li>
      <li>
        <p><a href="/en/glossary/p2sh-address.php" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a>, <a href="/en/glossary/p2sh-address.php" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH output</a> (an <a href="/en/glossary/address.php" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> comprising a hashed script, and its corresponding <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-p2pkh">P2PKH</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
