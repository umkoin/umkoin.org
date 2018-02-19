<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Payment Addresses - Umkoin Glossary</title>

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
      <a href="/en/">Umkoin</a>
      &gt;
      <a href="/en/developer-documentation.php">Developer Documentation</a>
      &gt;
      <a href="/en/developer-glossary.php">Glossary</a>
      &gt;
      Address
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Payment Addresses</h1>
    <div class="notice">
      <p><span>This definition comes from the <a href="/en/developer-glossary.php">technical glossary</a>.</span></p>
    </div>

    <h2 id="definition">Definition</h2>
    <p>A 20-byte hash formatted using <a href="/en/glossary/base58check.php" title="The method used in Umkoin for converting 160-bit hashes into P2PKH and P2SH addresses. Also used in other parts of Umkoin, such as encoding private keys for backup in WIP format. Not the same as other base58 implementations." class="auto-link">base58check</a> to produce either a P2PKH or P2SH Umkoin <a href="/en/glossary/address.php" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a>.  Currently the most common way users exchange payment information.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Address</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>IP address</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-address">Address</a> — Umkoin.org Developer Guide</p>
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
