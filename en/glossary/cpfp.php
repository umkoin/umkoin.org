<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Child Pays For Parent, CPFP - Umkoin Glossary</title>

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
    Child pays for parent
  </div>

  <div id="content" class="content">

    <h1>Child Pays For Parent, CPFP</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>Selecting transactions for <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">mining</a> not just based on their fees but also based on the fees of their ancestors (parents) and descendants (children).</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Child pays for parent</p>
      </li>
      <li>
        <p>CPFP</p>
      </li>
      <li>
        <p>Ancestor mining</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/rbf.php" title="Replacing one version of an unconfirmed transaction with a different version of the transaction that pays a higher transaction fee.  May use BIP125 signaling." class="auto-link">Replace by Fee</a></p>
      </li>
      <li>
        <p><a href="/en/glossary/rbf.php" title="Replacing one version of an unconfirmed transaction with a different version of the transaction that pays a higher transaction fee.  May use BIP125 signaling." class="auto-link">RBF</a></p>
      </li>
    </ul>

<!--
    <h3 id="links">Links</h3>
    <ul>
      <li></li>
    </ul>
//-->

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
