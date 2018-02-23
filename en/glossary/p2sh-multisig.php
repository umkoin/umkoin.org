<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>P2SH Multisig, P2SH Multisig Output - Umkoin Glossary</title>

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
    P2SH multisig
  </div>

  <div id="content" class="content">

    <h1>P2SH Multisig, P2SH Multisig Output</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A <a href="/en/glossary/p2sh-address.php" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH output</a> where the <a href="/en/glossary/redeem-script.php" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> uses one of the <a href="/en/glossary/multisig.php" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/op-code.php" title="Operation codes from the Umkoin Script language which push data or perform functions within a pubkey script or signature script." class="auto-link">opcodes</a>. Up until <a href="https://bitcoin.org/en/release/v0.10.0" class="auto-link">Bitcoin Core 0.10.0</a>, <a href="/en/glossary/p2sh-multisig.php" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Bitcoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig scripts</a> were <a href="/en/glossary/standard-transaction.php" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transactions</a>, but most other P2SH scripts were not.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>P2SH multisig</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/multisig.php" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">Multisig</a> <a href="/en/glossary/pubkey-script.php" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a> (also called “<a href="/en/glossary/multisig.php" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">bare multisig</a>”, these <a href="/en/glossary/multisig.php" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> scripts don’t use P2SH encapsulation)</p>
      </li>
      <li>
        <p>P2SH (general P2SH, of which <a href="/en/glossary/p2sh-multisig.php" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig</a> is a specific instance that was special cased up until <a href="https://bitcoin.org/en/release/v0.10.0" class="auto-link">Bitcoin Core 0.10.0</a>)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-p2sh-multisig">P2SH multisig</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
