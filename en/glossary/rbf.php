<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Replace-by-Fee, RBF - Umkoin Glossary</title>

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
    Replace by fee
  </div>

  <div id="content" class="content">

    <h1>Replace-by-Fee, RBF</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>Replacing one version of an <a href="/en/glossary/confirmation-score.php" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transaction</a> with a different version of the transaction that pays a higher <a href="/en/glossary/transaction-fee.php" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Replace by fee</p>
      </li>
      <li>
        <p>RBF</p>
      </li>
      <li>
        <p>Opt-in replace by fee</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/cpfp.php" title="Selecting transactions for mining not just based on their fees but also based on the fees of their ancestors (parents) and descendants (children)." class="auto-link">Child pays for parent</a></p>
      </li>
      <li>
        <p><a href="/en/glossary/cpfp.php" title="Selecting transactions for mining not just based on their fees but also based on the fees of their ancestors (parents) and descendants (children)." class="auto-link">CPFP</a></p>
      </li>
    </ul>

<!--
    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p></p>
      </li>
    </ul>
//-->

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
