<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Public Key, ECDSA Public Key - Umkoin Glossary</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">

<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</head>


<body>


<?php
include '../page_head.php';
?>

<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Public key
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Public Key, ECDSA Public Key</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The public portion of a keypair which can be used to verify <a href="/en/glossary/signature.php" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> made with the private portion of the keypair.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Public key</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">Private key</a> (data from which the <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> is derived)</p>
      </li>
      <li>
        <p><a href="/en/glossary/parent-key.php" title="In HD wallets, a key used to derive child keys.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">Parent key</a> (a key used to create <a href="/en/glossary/child-key.php" title="In HD wallets, a key derived from a parent key.  The key can be either a private key or a public key, and the key derivation may also require a chain code." class="auto-link">child keys</a>, not necessarily a <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-public-key">Public key</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<script type="text/javascript">
  fallbackSVG();
  addAnchorLinks();
  trackOutgoingLinks();
</script>


<?php
include '../page_footer.php';
?>


<script src="/js/jquery/jquery-1.11.2.min.js"></script>
<script src="/js/jquery/jquery-ui.min.js"></script>
<script src="/js/devsearch.js"></script>
<script>updateToc();</script>


</body>
</html>
