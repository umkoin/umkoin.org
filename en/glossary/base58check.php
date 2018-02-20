<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Base58check, Umkoin Address Encoding - Umkoin Glossary</title>

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
    Base58check
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Base58check, Umkoin Address Encoding</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The method used in Umkoin for converting 160-bit hashes into P2PKH and <a href="/en/glossary/p2sh-address.php" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH addresses</a>.  Also used in other parts of Umkoin, such as encoding <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> for backup in WIP format.  Not the same as other <a href="/en/glossary/base58check.php" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses.  Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format.  Not the same as other base58 implementations." class="auto-link">base58</a> implementations.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Base58check</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/p2pkh-address.php" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH address</a></p>
      </li>
      <li>
        <p><a href="/en/glossary/p2sh-address.php" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a></p>
      </li>
      <li>
        <p>IP address</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#term-base58check">base58check</a> — Umkoin.org Developer Reference</p>
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
