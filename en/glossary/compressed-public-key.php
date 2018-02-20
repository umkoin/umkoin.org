<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Compressed Public Key - Umkoin Glossary</title>

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
    Compressed public key
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Compressed Public Key</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>An <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">ECDSA public key</a> that is 33 bytes long rather than the 65 bytes of an uncompressed <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Compressed public key</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#public-key-formats">Public key formats</a> — Umkoin.org Developer Guide</p>
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
