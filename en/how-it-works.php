<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>How does Umkoin work? - Umkoin</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">

<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1>How does Umkoin work?</h1>
    <p class="summary">This is a question that often causes confusion. Here's a quick explanation!</p>

    <h2 id="basics">The basics for a new user</h2>
    <p>As a new user, you can <a href="/en/getting-started.php">get started</a> with Umkoin without understanding the technical details. Once you have installed a Umkoin wallet on your computer or mobile phone, it will generate your first Umkoin address and you can create more whenever you need one. You can disclose your addresses to your friends so that they can pay you or vice versa. In fact, this is pretty similar to how email works, except that Umkoin addresses should only be used once.</p>

    <p><br><img src="/img/icons/umkoin-how-it-works.svg" alt="Umkoin" /></p>

    <h2 id="balances">Balances<span class="titlelight"> - block chain</span></h2>
    <p>The block chain is a <b>shared public ledger</b> on which the entire Umkoin network relies. All confirmed transactions are included in the block chain. This way, Umkoin wallets can calculate their spendable balance and new transactions can be verified to be spending umkoins that are actually owned by the spender. The integrity and the chronological order of the block chain are enforced with <a href="/en/vocabulary.php#cryptography">cryptography</a>.</p>

    <h2 id="transactions">Transactions<span class="titlelight"> - private keys</span></h2>
    <p>A transaction is <b>a transfer of value between Umkoin wallets</b> that gets included in the block chain. Umkoin wallets keep a secret piece of data called a <a href="/en/vocabulary.php#private-key"><i>private key</i></a> or seed, which is used to sign transactions, providing a mathematical proof that they have come from the owner of the wallet. The <a href="/en/vocabulary.php#signature"><i>signature</i></a> also prevents the transaction from being altered by anybody once it has been issued. All transactions are broadcast between users and usually begin to be confirmed by the network in the following 10 minutes, through a process called <a href="/en/vocabulary.php#mining"><i>mining</i></a>.</p>

    <h2 id="processing">Processing<span class="titlelight"> - mining</span></h2>
    <p>Mining is a <b>distributed consensus system</b> that is used to <a href="/en/vocabulary.php#confirmation"><i>confirm</i></a> waiting transactions by including them in the block chain. It enforces a chronological order in the block chain, protects the neutrality of the network, and allows different computers to agree on the state of the system. To be confirmed, transactions must be packed in a <a href="/en/vocabulary.php#block"><i>block</i></a> that fits very strict cryptographic rules that will be verified by the network. These rules prevent previous blocks from being modified because doing so would invalidate all following blocks. Mining also creates the equivalent of a competitive lottery that prevents any individual from easily adding new blocks consecutively in the block chain. This way, no individuals can control what is included in the block chain or replace parts of the block chain to roll back their own spends.</p>

    <h2 id="readmore">Going down the rabbit hole</h2>
    <p>This is only a very short and concise summary of the system. If you want to get into the details, you can <a href="/en/umkoin-paper.php">read the original paper</a> that describes the system's design, or read the <a href="/en/developer-documentation.php">developer documentation</a>.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


<script type="text/javascript">
  fallbackSVG();
  addAnchorLinks();
  trackOutgoingLinks();
</script>


</body>
</html>
