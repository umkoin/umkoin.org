<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Hardened Extended Key (HD Wallets) - Umkoin Glossary</title>

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
    Hardened extended key
  </div>

  <div id="content" class="content">

    <h1>Hardened Extended Key (HD Wallets)</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A variation on <a href="/en/glossary/hd-protocol.php" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD wallet</a> <a href="/en/glossary/extended-key.php" title="In the context of HD wallets, a public key or private key extended with the chain code to allow them to derive child keys." class="auto-link">extended keys</a> where only the <a href="/en/glossary/hardened-extended-key.php" title="A variation on HD wallet extended keys where only the hardened extended private key can derive child keys. This prevents compromise of the chain code plus any private key from putting the whole wallet at risk." class="auto-link">hardened extended private key</a> can derive <a href="/en/glossary/child-key.php" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child keys</a>. This prevents compromise of the <a href="/en/glossary/chain-code.php" title="In HD wallets, 256 bits of entropy added to the public and private keys to help them generate secure child keys; the master chain code is usually derived from a seed along with the master private key" class="auto-link">chain code</a> plus any <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> from putting the whole <a href="/en/glossary/wallet.php" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> at risk.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Hardened extended key</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-hardened-extended-private-key">Hardened extended private keys</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
