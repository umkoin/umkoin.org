<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Transaction Malleability, Mutability - Umkoin Glossary</title>

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
    Transaction malleability
  </div>

  <div id="content" class="content">

    <h1>Transaction Malleability, Mutability</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>The ability of someone to change (<a href="/en/glossary/malleability.php" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">mutate</a>) <a href="/en/glossary/confirmation-score.php" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> without making them invalid, which changes the transaction’s <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>, making child transactions invalid.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Transaction malleability</p>
      </li>
      <li>
        <p>Transaction mutability</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="https://github.com/bitcoin/bips/blob/master/bip-0062.mediawiki" class="auto-link">BIP62</a> (a proposal for an optional new transaction version that reduces the set of known mutations for common transactions)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#transaction-malleability">Transaction malleability</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
