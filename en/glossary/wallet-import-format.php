<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Wallet Import Format - Umkoin Glossary</title>

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
    WIF
  </div>

  <div id="content" class="content">

    <h1>Wallet Import Format</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A data interchange format designed to allow exporting and importing a single <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> with a flag indicating whether or not it uses a <a href="/en/glossary/compressed-public-key.php" title="An ECDSA public key that is 33 bytes long rather than the 65 bytes of an uncompressed public key." class="auto-link">compressed public key</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>WIF</p>
      </li>
      <li>
        <p>Wallet Import Format</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>Extended <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> (which allow importing a hierarchy of <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-wallet-import-format">Wallet import format</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
