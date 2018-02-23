<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Signature Hash - Umkoin Glossary</title>

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
    Signature hash
  </div>

  <div id="content" class="content">

    <h1>Signature Hash</h1>
    <?php include 'notice.php'; ?>

   <h2 id="definition">Definition</h2>
    <p>A flag to Umkoin <a href="/en/glossary/signature.php" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> that indicates what parts of the transaction the <a href="/en/glossary/signature.php" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> signs. (The default is <a href="/en/glossary/sighash-all.php" title="Default signature hash type which signs the entire transaction except any signature scripts, preventing modification of the signed parts." class="auto-link">SIGHASH_ALL</a>.) The unsigned parts of the transaction may be modified.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Signature hash</p>
      </li>
      <li>
        <p>Sighash</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p>Signed hash (a hash of the data to be signed)</p>
      </li>
      <li>
        <p><a href="/en/glossary/malleability.php" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">Transaction malleability</a> / <a href="/en/glossary/malleability.php" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">transaction mutability</a> (although non-default <a href="/en/glossary/signature-hash.php" title="A flag to Umkoin signatures that indicates what parts of the transaction the signature signs. (The default is SIGHASH_ALL.) The unsigned parts of the transaction may be modified." class="auto-link">sighash flags</a> do allow optional <a href="/en/glossary/malleability.php" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">malleability</a>, <a href="/en/glossary/malleability.php" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">malleability</a> comprises any way a transaction may be mutated)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-signature-hash">Signature hash</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
