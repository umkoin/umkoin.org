<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Umkoin for Developers - Umkoin</title>

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

    <h1>Umkoin for Developers</h1>
    <p class="summary">Umkoin can be used to build amazing things or just answer common needs.</p>

    <h2 id="simple"><img class="titleicon" src="/img/icons/ico_simple.svg" alt="Icon" />The simplest of all payment systems</h2>
    <p>Unless payment needs to be associated with automatic invoices, accepting money is as simple as sending a umkoin: link or displaying a QR code. This simple setup is within reach of any user and can fulfill the needs of a good range of clients. When done publicly, it is especially suitable for transparent donations and tips.</p>

    <h2 id="api"><img class="titleicon" src="/img/icons/ico_conf.svg" alt="Icon" />Many third party APIs</h2>
    <p>There are many third party payment processing services that provide APIs; you don't need to store umkoins on your server and handle the security that this implies. Additionally, most of these APIs allow you to process invoices and exchange your umkoins into your local currency at competitive costs.</p>

    <h2 id="own"><img class="titleicon" src="/img/icons/ico_own.svg" alt="Icon" />You can be your own financial system</h2>
    <p>If you don't use any third party APIs, you can integrate a Umkoin node directly into your applications, allowing you to become your own bank and payment processor. With all the responsibilities that this implies, you can build amazing systems that process Umkoin transactions however you would like.</p>

    <h2 id="invoice"><img class="titleicon" src="/img/icons/ico_invoice.svg" alt="Icon" />Umkoin addresses to track invoices</h2>
    <p>Umkoin creates a unique address for each transaction. So if you were to build a payment system associated with an invoice, you simply need to generate and monitor a Umkoin address for each payment. You should never use the same address for more than one transaction.</p>

    <h2 id="security"><img class="titleicon" src="/img/icons/ico_lock.svg" alt="Icon" />Most of the security is on client side</h2>
    <p>Most security is handled by the protocol, eliminating the need for PCI compliance. Fraud prevention can be simplified down to monitoring a single variable: the <a href="/en/you-need-to-know.php#instant">confirmation score</a>. Beyond that, keeping your umkoins secure is mainly a matter of <a href="/en/secure-your-wallet.php">securing your wallet</a> and using HTTPS or other secure protocols to send payment requests to customers.</p>

    <h2 id="micro"><img class="titleicon" src="/img/icons/ico_micro.svg" alt="Icon" />New payment possibilities</h2>
    <p>Umkoin allows you to design new and creative online services that couldn't exist before because of financial limitations. This includes tipping systems, automated payment solutions, distributed crowd-funding services, time locked payment management, public asset tracking, low-trust escrow services, micro-payment channels, and more.</p>

    <div class="introlink"><a href="/en/developer-documentation.php">Developer Documentation (English)</a></div>

    <div class="mainbutton"><a href="/en/getting-started.php"><img src="/img/icons/but_umkoin.png" alt="icon">Get started with Umkoin</a></div>

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
