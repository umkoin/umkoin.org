<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Change, Change Address, Change Output - Umkoin Glossary</title>

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
    Change address
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Change, Change Address, Change Output</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>An <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> in a transaction which returns <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to the spender, thus preventing too much of the <a href="/en/glossary/input.php" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> value from going to <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fees</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Change address</p>
      </li>
      <li>
        <p>Change output</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/address.php" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">Address</a> reuse</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-change-output">Change address</a> — Umkoin.org Developer Guide</p>
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
