<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Blocks-First, Blocks-First Sync - Umkoin Glossary</title>

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
    Blocks-first sync
  </div>

  <div id="content" class="content">

    <h1>Blocks-First, Blocks-First Sync</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>Synchronizing the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> by downloading each <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> from a <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> and then validating it.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Blocks-first sync</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/headers-first-sync.php" title="Synchronizing the block chain by downloading block headers before downloading the full blocks." class="auto-link">Headers-first sync</a></li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li><a href="/en/developer-guide.php#blocks-first">Blocks-first sync</a> — Umkoin.org Developer Guide</li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
