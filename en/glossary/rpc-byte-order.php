<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>RPC Byte Order - Umkoin Glossary</title>

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
    RPC byte order
  </div>

  <div id="content" class="content">

    <h1>RPC Byte Order</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A hash digest displayed with the byte order reversed; used in Umkoin Core <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPCs</a>, many <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> explorers, and other software.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>RPC byte order</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li><a href="/en/glossary/internal-byte-order.php" title="The standard order in which hash digests are displayed as strings---the same format used in serialized blocks and transactions." class="auto-link">Internal byte order</a> (hash digests displayed in their typical order; used in <a href="/en/glossary/serialized-block.php" title="A complete block in its binary format---the same format used to calculate total block byte size; often represented using hexadecimal." class="auto-link">serialized blocks</a> and <a href="/en/glossary/serialized-transaction.php" title="Complete transactions in their binary format; often represented using hexadecimal.  Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">serialized transactions</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-reference.php#hash-byte-order">RPC byte order</a> — Umkoin.org Developer Reference</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
