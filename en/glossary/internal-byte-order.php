<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Internal Byte Order - Umkoin Glossary</title>

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
    Internal byte order
  </div>

  <div id="content" class="content">

    <h1>Internal Byte Order</h1>
    <?php include 'notice.pphp'; ?>

    <h2 id="definition">Definition</h2>
    <p>The standard order in which hash digests are displayed as strings—the same format used in <a href="/en/glossary/serialized-block.php" title="A complete block in its binary format---the same format used to calculate total block byte size; often represented using hexadecimal." class="auto-link">serialized blocks</a> and transactions.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Internal byte order</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/rpc-byte-order.php" title="A hash digest displayed with the byte order reversed; used in Umkoin Core RPCs, many block explorers, and other software." class="auto-link">RPC byte order</a> (where the byte order is reversed)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#hash-byte-order">Internal byte order</a> — Umkoin.org Developer Reference</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
