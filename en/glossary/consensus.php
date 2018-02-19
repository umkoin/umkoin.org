<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Consensus - Umkoin Glossary</title>

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
      <a href="/en/">Umkoin</a>
      &gt;
      <a href="/en/developer-documentation.php">Developer Documentation</a>
      &gt;
      <a href="/en/developer-glossary.php">Glossary</a>
      &gt;
      Consensus
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <div class="subhead-links sourcefile" data-sourcefile="_data/glossary/en/consensus.yaml"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/glossary/en/consensus.yaml">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/glossary/en/consensus.yaml">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/glossary/en/consensus.yaml%0A%0A">Report Issue</a>
    </div>

    <h1>Consensus</h1>
    <div class="notice">
      <p><span>This definition comes from the <a href="/en/developer-glossary.php">technical glossary</a>.</span></p>
    </div>

    <h2 id="definition">Definition</h2>
    <p>When several <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> (usually most <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>) all have the same <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> in their locally-validated <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">best block chain</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Consensus</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p>Social <a href="/en/glossary/consensus.php" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." class="auto-link">consensus</a> (often used in discussion among developers to indicate that most people agree with a particular plan)</p>
      </li>
      <li>
        <p><a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">Consensus rules</a> (the rules that allow <a href="/en/glossary/node" title="A computer that connects to the Bitcoin network." class="auto-link">nodes</a> to maintain <a href="/en/glossary/consensus" title="When several nodes (usually most nodes on the network) all have the same blocks in their locally-validated best block chain." class="auto-link">consensus</a>)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li><a href="/en/developer-guide.php#term-consensus">Consensus</a> — Umkoin.org Developer Guide</li>
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
