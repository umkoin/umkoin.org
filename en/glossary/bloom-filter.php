<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Bloom Filter - Umkoin Glossary</title>

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
    Bloom filter
  </div>

  <div id="content" class="content">

    <h1>Bloom Filter</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A filter used primarily by <a href="/en/glossary/simplified-payment-verification.php" title="A method for verifying if particular transactions are included in a block without downloading the entire block.  The method is used by some lightweight Umkoin clients." class="auto-link">SPV clients</a> to request only matching transactions and <a href="/en/glossary/merkle-block.php" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle blocks</a> from full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Bloom filter</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">Bloom filter</a> (general computer science term, of which Umkoin’s <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filters</a> are a specific implementation)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#bloom-filters">Bloom filter</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
