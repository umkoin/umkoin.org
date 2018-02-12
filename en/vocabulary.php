<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Vocabulary - Umkoin</title>

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

    <h1>Some Umkoin words you might hear</h1>
    <p class="summarytxt">Umkoin provides a new approach to payments and, as such, there are some new words that might become a part of your vocabulary. Don't worry, even the humble television created new words!</p>

    <h2 id="table-of-contents">Table of contents</h2>
    <div class="index">
      <a href="#address">Address</a>
      <a href="#bit">Bit</a>
      <a href="#block">Block</a>
      <a href="#block-chain">Block Chain</a>
      <a href="#confirmation">Confirmation</a>
      <a href="#cryptography">Cryptography</a>
      <a href="#double-spend">Double Spend</a>
      <a href="#hash-rate">Hash Rate</a>
      <a href="#mining">Mining</a>
      <a href="#p2p">P2P</a>
      <a href="#private-key">Private Key</a>
      <a href="#signature">Signature</a>
      <a href="#umk">UMK</a>
      <a href="#umkoin">Umkoin</a>
      <a href="#wallet">Wallet</a>
    </div>

    <h2 id="address">Address</h2>
    <p>A Umkoin address is <b>similar to a physical address or an email</b>. It is the only information you need to provide for someone to pay you with Umkoin. An important difference, however, is that each address should only be used for a single transaction.</p>

    <h2 id="bit">Bit</h2>
    <p>Bit is a common unit used to designate a sub-unit of a umkoin - 1,000,000 bits is equal to 1 umkoin (UMK or B⃦). This unit is usually more convenient for pricing tips, goods and services.</p>

    <h2 id="block">Block</h2>
    <p>A block is a <b>record in the block chain that contains and confirms many waiting transactions</b>. Roughly every 10 minutes, on average, a new block including transactions is appended to the <a href="#block-chain">block chain</a> through <a href="#mining">mining</a>.</p>

    <h2 id="block-chain">Block Chain</h2>
    <p>The block chain is a <b>public record of Umkoin transactions</b> in chronological order. The block chain is shared between all Umkoin users. It is used to verify the permanence of Umkoin transactions and to prevent <a href="#double-spend">double spending</a>.</p>

    <h2 id="confirmation">Confirmation</h2>
    <p>Confirmation means that a transaction has been <b>processed by the network and is highly unlikely to be reversed</b>. Transactions receive a confirmation when they are included in a <a href="#block">block</a> and for each subsequent block. Even a single confirmation can be considered secure for low value transactions, although for larger amounts like 1000 US$, it makes sense to wait for 6 confirmations or more. Each confirmation <i>exponentially</i> decreases the risk of a reversed transaction.</p>

    <h2 id="cryptography">Cryptography</h2>
    <p>Cryptography is the branch of mathematics that lets us create <b>mathematical proofs that provide high levels of security</b>. Online commerce and banking already uses cryptography. In the case of Umkoin, cryptography is used to make it impossible for anybody to spend funds from another user's wallet or to corrupt the <a href="#block-chain">block chain</a>. It can also be used to encrypt a wallet, so that it cannot be used without a password.</p>

    <h2 id="double-spend">Double Spend</h2>
    <p>If a malicious user tries to <b>spend their umkoins to two different recipients at the same time</b>, this is double spending. Umkoin <a href="#mining">mining</a> and the <a href="#block-chain">block chain</a> are there to create a consensus on the network about which of the two transactions will confirm and be considered valid.</p>

    <h2 id="hash-rate">Hash Rate</h2>
    <p>The hash rate is the <b>measuring unit of the processing power of the Umkoin network</b>. The Umkoin network must make intensive mathematical operations for security purposes. When the network reached a hash rate of 10 Th/s, it meant it could make 10 trillion calculations per second.</p>

    <h2 id="mining">Mining</h2>
    <p>Umkoin mining is the process of <b>making computer hardware do mathematical calculations for the Umkoin network to confirm transactions</b> and increase security. As a reward for their services, Umkoin miners can collect transaction fees for the transactions they confirm, along with newly created umkoins. Mining is a specialized and competitive market where the rewards are divided up according to how much calculation is done. Not all Umkoin users do Umkoin mining, and it is not an easy way to make money.</p>

    <h2 id="p2p">P2P</h2>
    <p>Peer-to-peer refers to <b>systems that work like an organized collective</b> by allowing each individual to interact directly with the others. In the case of Umkoin, the network is built in such a way that each user is broadcasting the transactions of other users. And, crucially, no bank is required as a third party.</p>

    <h2 id="private-key">Private Key</h2>
    <p>A private key is a <b>secret piece of data that proves your right to spend umkoins from a specific wallet</b> through a cryptographic <a href="#signature">signature</a>. Your private key(s) are stored in your computer if you use a software wallet; they are stored on some remote servers if you use a web wallet. Private keys must never be revealed as they allow you to spend umkoins for their respective Umkoin wallet.</p>

    <h2 id="signature">Signature</h2>
    <p>A <a href="#cryptography">cryptographic</a> signature is <b>a mathematical mechanism that allows someone to prove ownership</b>. In the case of Umkoin, a <a href="#wallet">Umkoin wallet</a> and its <a href="#private-key">private key(s)</a> are linked by some mathematical magic. When your Umkoin software signs a transaction with the appropriate private key, the whole network can see that the signature matches the umkoins being spent. However, there is no way for the world to guess your private key to steal your hard-earned umkoins.</p>

    <h2 id="umk">UMK</h2>
    <p>UMK is a common unit used to designate one umkoin (&#85;).</p>

    <h2 id="umkoin">Umkoin</h2>
    <p>Umkoin - with capitalization, is used when describing the concept of Umkoin, or the entire network itself. e.g. "I was learning about the Umkoin protocol today."<br>umkoin - without capitalization, is used to describe umkoins as a unit of account. E.g. "I sent ten umkoins today."; it is also often abbreviated UMK.</p>

    <h2 id="wallet">Wallet</h2>
    <p>A Umkoin wallet is loosely <b>the equivalent of a physical wallet on the Umkoin network</b>. The wallet actually contains your <a href="#private-key">private key(s)</a> which allow you to spend the umkoins allocated to it in the <a href="#block-chain">block chain</a>. Each Umkoin wallet can show you the total balance of all umkoins it controls and lets you pay a specific amount to a specific person, just like a real wallet. This is different to credit cards where you are charged by the merchant.</p>

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
