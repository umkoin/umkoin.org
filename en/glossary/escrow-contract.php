<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Escrow Contract - Umkoin Glossary</title>

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
    Escrow contract
  </div>

  <div id="content" class="content">

    <h1>Escrow Contract</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A transaction in which a spender and receiver place funds in a 2-of-2 (or other <a href="/en/glossary/multisig.php" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">m-of-n</a>) <a href="/en/glossary/multisig.php" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig output</a> so that neither can spend the funds until they’re both satisfied with some external outcome.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Escrow contract</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-escrow-contract">Escrow contract</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
