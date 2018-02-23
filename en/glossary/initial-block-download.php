<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Initial Block Download, IBD - Umkoin Glossary</title>

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
    Initial block download
  </div>

  <div id="content" class="content">

    <h1>Initial Block Download, IBD</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The process used by a new <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> (or long-offline <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>) to download a large number of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to catch up to the tip of the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Initial block download</p>
      </li>
      <li>
        <p>IBD</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/blocks-first-sync.php" title="Synchronizing the block chain by downloading each block from a peer and then validating it." class="auto-link">Blocks-first sync</a> (syncing includes getting any amount of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>; <a href="/en/glossary/initial-block-download.php" title="The process used by a new node (or long-offline node) to download a large number of blocks to catch up to the tip of the best block chain." class="auto-link">IBD</a> is only used for large numbers of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li><a href="/en/developer-guide.php#initial-block-download">Initial block download</a> — Umkoin.org Developer Guide</li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
