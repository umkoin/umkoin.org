<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Parent Key, HD Wallet Parent Key - Umkoin Glossary</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
</head>


<body>


<?php
include '../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Parent key
  </div>

  <div id="content" class="content">

    <h1>Parent Key, HD Wallet Parent Key</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>In <a href="/en/glossary/hd-protocol.php" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD wallets</a>, a key used to derive <a href="/en/glossary/child-key.php" title="In HD wallets, a key derived from a parent key. The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child keys</a>. The key can be either a <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> or a <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>, and the key derivation may also require a <a href="/en/glossary/chain-code.php" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Parent key</p>
      </li>
      <li>
        <p>Parent public key</p>
      </li>
      <li>
        <p>Parent private key</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">Public key</a> (derived from a <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>, not a <a href="/en/glossary/parent-key.php" title="In HD wallets, a key used to derive child keys. The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">parent key</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-parent-key">Parent key</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
