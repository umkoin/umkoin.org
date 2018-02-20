<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>CompactSize Unsigned Integer - Umkoin Glossary</title>

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
    CompactSize
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>CompactSize Unsigned Integer</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A type of variable-length integer commonly used in the Umkoin P2P protocol and Umkoin serialized data structures.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>CompactSize</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p>VarInt (a data type Umkoin Core uses for local data storage)</p>
      </li>
      <li>
        <p>Compact (the data type used for <a href="/en/glossary/nbits.php" title="The target is the threshold below which a block header hash must be in order for the block to valid, and nBits is the encoded form of the target threshold as it appears in the block header." class="auto-link">nBits</a> in the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a>)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#compactsize-unsigned-integers">CompactSize Unsigned Integers</a> — Umkoin.org Developer Reference</p>
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
