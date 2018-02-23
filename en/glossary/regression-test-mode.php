<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Regtest, Regression Test Mode - Umkoin Glossary</title>

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
    Regtest
  </div>

  <div id="content" class="content">

    <h1>Regtest, Regression Test Mode</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A local testing environment in which developers can almost instantly generate <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> on demand for testing events, and can create private <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> with no real-world value.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Regtest</p>
      </li>
      <li>
        <p>Regression test mode</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/testnet.php" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">Testnet</a> (a global testing environment which mostly mimics <a href="/en/glossary/mainnet.php" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li><a href="/en/developer-examples.php#regtest-mode">Regtest mode</a> — Umkoin.org Developer Examples</li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
