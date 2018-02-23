<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Inventory, Block Or Transaction Inventory - Umkoin Glossary</title>

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
    Inventory
  </div>

  <div id="content" class="content">

    <h1>Inventory, Block Or Transaction Inventory</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A data type identifier and a hash; used to identify transactions and <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> available for download through the Umkoin P2P <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Inventory</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>Inv message (one of the P2P messages that transmits <a href="/en/glossary/inventory.php" title="A data type identifier and a hash; used to identify transactions and blocks available for download through the Umkoin P2P network." class="auto-link">inventories</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#term-inventory">Inventory</a> — Umkoin.org Developer Reference</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
