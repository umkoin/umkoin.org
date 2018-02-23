<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Merkle Root - Umkoin Glossary</title>

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
    Merkle root
  </div>

  <div id="content" class="content">

    <h1>Merkle Root</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The root <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> of a <a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root. In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merkle tree</a>, a descendant of all the hashed pairs in the tree. <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">Block headers</a> must include a valid <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> descended from all transactions in that <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Merkle root</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/merkle-tree.php" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root. In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">Merkle tree</a> (the tree of which the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> is the root <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>)</p>
      </li>
      <li>
        <p><a href="/en/glossary/merkle-block.php" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">Merkle block</a> (a partial merkle branch connecting the root to one or more leaves <a href="/en/developer-guide.php#transactions" title="A transaction spending satoshis">transactions</a>)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-merkle-root">Merkle root</a> — Umkoin.org Developer Guide</p>
      </li>
      <li>
        <p><a href="https://en.wikipedia.org/wiki/Merkle_tree">Merkle tree</a> — Wikipedia</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
