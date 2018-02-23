<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Orphan Block - Umkoin Glossary</title>

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
    Orphan block
  </div>

  <div id="content" class="content">

    <h1>Orphan Block</h1>
    <?php include 'nnotice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p><a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">Blocks</a> whose parent <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> has not been processed by the local <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, so they can’t be fully validated yet.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Orphan block</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/stale-block.php" title="Blocks which were successfully mined but which aren't included on the current best block chain, likely because some other block at the same height had its chain extended first." class="auto-link">Stale block</a></li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#orphan-blocks">Orphan blocks</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
