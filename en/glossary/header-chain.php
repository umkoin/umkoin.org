<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Header Chain, Best Header Chain - Umkoin Glossary</title>

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
    Header chain
  </div>

  <div id="content" class="content">

    <h1>Header Chain, Best Header Chain</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A chain of <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block headers</a> with each <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> linking to the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> that preceded it; the most-difficult-to-recreate chain is the <a href="/en/glossary/header-chain.php" title="A chain of block headers with each header linking to the header that preceded it; the most-difficult-to-recreate chain is the best header chain" class="auto-link">best header chain</a></p>
    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Header chain</p>
      </li>
      <li>
        <p>Best header chain</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">Block chain</a></li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-header-chain">Header chain</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
