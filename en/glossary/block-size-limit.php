<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Block Size Limit - Umkoin Glossary</title>

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
    Maximum Block Size
  </div>

  <div id="content" class="content">

    <h1>Block Size Limit</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The maximum size in bytes that the <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> allow a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to be. The current <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> size limit is 1000000 bytes.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Maximum Block Size</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">Block</a></p>
      </li>
      <li>
        <p><a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">Blockchain</a></p>
      </li>
      <li>
        <p><a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">Blockchain</a> size</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#serialized-blocks">Serialized Blocks</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
