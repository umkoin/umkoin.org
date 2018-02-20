<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Coinbase, Coinbase Field - Umkoin Glossary</title>

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
    Coinbase
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Coinbase, Coinbase Field</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A special field used as the sole <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number.  The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> for <a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transactions</a>. The <a href="/en/glossary/coinbase.php" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase</a> allows claiming the <a href="/en/glossary/block-reward.php" title="The amount that miners may claim as a reward for creating a block. Equal to the sum of the block subsidy (newly available satoshis) plus the transactions fees paid by transactions included in the block." class="auto-link">block reward</a> and provides up to 100 bytes for arbitrary data.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Coinbase</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/coinbase-transaction.php" title="The first transaction in a block.  Always created by a miner, it includes a single coinbase." class="auto-link">Coinbase transaction</a></p>
      </li>
      <li>
        <p><a href="/en/glossary/coinbase.php" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">Coinbase</a>.com</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#term-coinbase-field">Coinbase</a> — Umkoin.org Developer Reference</p>
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
