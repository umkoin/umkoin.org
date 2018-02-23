<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Signature, ECDSA Signature - Umkoin Glossary</title>

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
    Signature
  </div>

  <div id="content" class="content">

    <h1>Signature, ECDSA Signature</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A value related to a <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> which could only have reasonably been created by someone who has the <a href="/en/glossary/private-key.php" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> that created that <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>. Used in Umkoin to authorize spending <a href="/en/glossary/denominations.php" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> previously sent to a <a href="/en/glossary/public-key.php" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Signature</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-signature">Signature</a> — Umkoin.org Developer Guide</p>
      </li>
      <li>
        <p><a href="https://en.wikipedia.org/wiki/Elliptic_Curve_DSA">ECDSA</a> — Wikipedia</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
