<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Null Data (OP_RETURN) Transaction - Umkoin Glossary</title>

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
    Null data transaction
  </div>

  <div id="content" class="content">

    <h1>Null Data (OP_RETURN) Transaction</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A transaction type relayed and mined by default in Umkoin Core that adds arbitrary data to a provably unspendable <a href="/en/glossary/pubkey-script.php" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> that full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> don’t have to store in their <a href="/en/glossary/unspent-transaction-output.php" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> database.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Null data transaction</p>
      </li>
      <li>
        <p>OP_RETURN transaction</p>
      </li>
      <li>
        <p>Data carrier transaction</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>OP_RETURN (an <a href="/en/glossary/op-code.php" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">opcode</a> used in one of the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> in an <a href="/en/glossary/null-data-transaction.php" title="A transaction type relayed and mined by default in Umkoin Core 0.9.0 and later that adds arbitrary data to a provably unspendable pubkey script that full nodes don't have to store in their UTXO database." class="auto-link">OP_RETURN transaction</a>)</li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-null-data">Null data transaction</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
