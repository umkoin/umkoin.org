<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Watch-Only Address - Umkoin Glossary</title>

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
    Watch-only address
  </div>

  <div id="content" class="content">

    <h1>Watch-Only Address</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>An <a href="/en/glossary/address.php" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address.  Currently the most common way users exchange payment information." class="auto-link">address</a> or <a href="/en/glossary/pubkey-script.php" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> stored in the <a href="/en/glossary/wallet.php" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> without the corresponding <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, allowing the <a href="/en/glossary/wallet.php" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> to watch for <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> but not spend them.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Watch-only address</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#importaddress"><code>importaddress</code> RPC</a> — Umkoin.org Developer Reference</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
