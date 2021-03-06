<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>M-of-N Multisig, Multisig Output - Umkoin Glossary</title>

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
    Multisig
  </div>

  <div id="content" class="content">

    <h1>M-of-N Multisig, Multisig Output</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>A <a href="/en/glossary/pubkey-script.php" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent.  Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> that provides <em>n</em> number of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">pubkeys</a> and requires the corresponding <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> provide <em>m</em> minimum number <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> corresponding to the provided <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">pubkeys</a>.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>
        <p>Multisig</p>
      </li>
      <li>
        <p>Bare multisig</p>
      </li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/p2sh-multisig.php" title="A P2SH output where the redeem script uses one of the multisig opcodes.  Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig</a> (a <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> script contained inside P2SH)</p>
      </li>
      <li>
        <p>Advanced scripts that require multiple <a href="/en/glossary/signature.php" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> without using OP_CHECKMULTISIG or OP_CHECKMULTISIGVERIFY</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-multisig">Multisig</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
