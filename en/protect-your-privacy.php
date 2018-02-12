<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Protect your privacy - Umkoin</title>

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

    <h1>Protect your privacy</h1>
    <p class="summarytxt">Umkoin is often perceived as an anonymous payment network. But in reality, Umkoin is probably the most transparent payment network in the world. At the same time, Umkoin can provide acceptable levels of privacy when used correctly. <b>Always remember that it is your responsibility to adopt good practices in order to protect your privacy</b>.</p>

    <h2 id="traceable">Understanding Umkoin traceability</h2>
    <p>Umkoin works with an unprecedented level of transparency that most people are not used to dealing with. All Umkoin transactions are public, traceable, and permanently stored in the Umkoin network. Umkoin addresses are the only information used to define where umkoins are allocated and where they are sent. These addresses are created privately by each user's wallets. However, once addresses are used, they become tainted by the history of all transactions they are involved with. Anyone can see the <a href="http://blockexplorer.umkoin.org" target="_blank">balance and all transactions</a> of any address. Since users usually have to reveal their identity in order to receive services or goods, Umkoin addresses cannot remain fully anonymous. As the block chain is permanent, it's important to note that something not traceable currently may become trivial to trace in the future. For these reasons, Umkoin addresses should only be used once and users must be careful not to disclose their addresses.</p>

    <h2 id="receive">Use new addresses to receive payments</h2>
    <p>To protect your privacy, you should use a new Umkoin address each time you receive a new payment. Additionally, you can use multiple wallets for different purposes. Doing so allows you to isolate each of your transactions in such a way that it is not possible to associate them all together. People who send you money cannot see what other Umkoin addresses you own and what you do with them. This is probably the most important advice you should keep in mind.</p>

    <h2 id="public">Be careful with public spaces</h2>
    <p>Unless your intention is to receive public donations or payments with full transparency, publishing a Umkoin address on any public space such as a website or social network is not a good idea when it comes to privacy. If you choose to do so, always remember that if you move any funds with this address to one of your other addresses, they will be publicly tainted by the history of your public address. Additionally, you might also want to be careful not to publish information about your transactions and purchases that could allow someone to identify your Umkoin addresses.</p>

    <h2 id="iplog">Your IP address can be logged</h2>
    <p>Because the Umkoin network is a peer-to-peer network, it is possible to listen for transactions' relays and log their IP addresses. Full node clients relay all users' transactions just like their own. This means that finding the source of any particular transaction can be difficult and any Umkoin node can be mistaken as the source of a transaction when they are not. You might want to consider hiding your computer's IP address with a tool like <a href="https://www.torproject.org/">Tor</a> so that it cannot be logged.</p>

    <h2 id="mixing">Limitations of mixing services</h2>
    <p>Some online services called mixing services offer to mix traceability between users by receiving and sending back the same amount using independent Umkoin addresses. It is important to note that the legality of using such services might vary and be subjected to different rules in each jurisdiction. Such services also require you to trust the individuals running them not to lose or steal your funds and not to keep a log of your requests. Even though mixing services can break traceability for small amounts, it becomes increasingly difficult to do the same for larger transactions.</p>

    <h2 id="future">Future improvements</h2>
    <p>Many improvements can be expected in the future to improve privacy. For instance, some efforts are ongoing with the payment messages API to avoid tainting multiple addresses together during a payment. Umkoin Core change addresses might be implemented in other wallets over time. Graphical user interfaces might be improved to provide user friendly payment request features and discourage addresses reuse. Various work and research is also being done to develop other potential extended privacy features like being able to join random users' transactions together.</p>

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
