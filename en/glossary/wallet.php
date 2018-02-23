<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Wallet - Umkoin Glossary</title>

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
    Wallet
  </div>

  <div id="content" class="content">

    <h1>Wallet</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>Software that stores <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> and monitors the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> (sometimes as a client of a server that does the processing) to allow users to spend and receive <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Wallet</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/hd-protocol.php" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD wallet</a> (a protocol that allows all of a <a href="/en/glossary/wallet.php" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet’s</a> keys to be created from a single seed)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#wallets">Wallets</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
