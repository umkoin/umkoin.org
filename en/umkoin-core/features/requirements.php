<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Requirements And Warnings - Umkoin Core</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
</head>


<body>


<?php
include '../../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Requirements
  </div>

  <div id="content" class="content">

  <div class="one-column">

    <h1 class="not-displayed" id="umkoin-core-requirements-and-warnings">Umkoin Core Requirements And Warnings</h1>
    <p><img src="/img/umkoin-core/slider-warning.svg" alt="Umkoin Core requirements and warnings" /></p>

    <?php include '../callout.php'; ?>

    <p>Umkoin Core gives you increased <a href="/en/umkoin-core/features/validation.php">security</a> and <a href="/en/umkoin-core/features/privacy.php">privacy</a> at a cost. You need to <a href="#wallet-responsibility-checklist">take responsibility</a> for the security of your umkoins, meet higher <a href="#system-requirements">minimum system requirements</a>, and beware of some <a href="#possible-problems">possible problems</a>.</p>
    <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" /> <strong>No matter what Umkoin software you use,</strong> you should never buy more umkoins than you can afford to lose. Umkoin is still an experimental system and umkoins remain a risky investment.</p>

    <h2 id="wallet-responsibility-checklist">Wallet Responsibility Checklist</h2>

    <p>Umkoin Core puts you in charge of your wallet, which means your umkoins are at risk unless you complete certain tasks:</p>

    <ul>
      <li>
        <p><button class="popup js" data-container="backup_your_keys">Backup your keys</button></p>
      </li>
      <li>
        <p>Make sure your <button class="popup js" data-container="secure_your_wallet">wallet is secure</button></p>
      </li>
      <li>
        <p>Setup an <button class="popup js" data-container="offline_wallet">offline wallet</button> (cold storage) for significant amounts of umkoins</p>
      </li>
      <li>
        <p>Allow your heirs to <button class="popup js" data-container="umkoin_inheritance">receive your umkoins</button> if you die or become incapacitated</p>
      </li>
    </ul>

    <h2 id="system-requirements">System Requirements</h2>

    <div class="two-column-list" id="system-requirements-accordion">

      <h3 id="bare-minimum-with-default-settings">Bare Minimum (With Default Settings)</h3>

      <div>

        <ul class="fa-ul">
          <li>
            <p><span class="fa fa-li fa-hdd-o fa-2x"></span> <strong>Disk space</strong><br /> 145 GB</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-download fa-2x"></span> <strong>Download</strong><br /> 250 MB/day (8 GB/month)<b>*</b></p>
          </li>
          <li>
            <p><span class="fa fa-li fa-upload fa-2x"></span> <strong>Upload</strong><br /> 5 GB/day (150 GB/month)</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-database fa-2x"></span> <strong>Memory (RAM)</strong><br /> 512 MB</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-desktop fa-2x"></span> <strong>System</strong><br /> Desktop<br />Laptop<br /><a href="https://en.bitcoin.it/wiki/Bitcoin_Core_compatible_devices#ARM-based_Chipsets">Some ARM chipsets</a> &gt;1 GHz</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-windows fa-2x"></span> <strong>Operating system</strong><br /> Windows 7/8.x<br />Mac OS X<br />Linux<br />Some BSDs</p>
          </li>
        </ul>

        <p><br class="clear" /></p>

        <p><b>*</b> Plus a one-time 140 GB download the first time you start Umkoin Core.</p>

      </div>

      <h3 id="bare-minimum-with-custom-settings">Bare Minimum (With Custom Settings)</h3>

      <div>

        <ul class="fa-ul">
          <li>
            <p><span class="fa fa-li fa-hdd-o fa-2x"></span> <strong>Disk space</strong><br /> 5 GB</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-download fa-2x"></span> <strong>Download</strong><br /> 150 MB/day (5 GB/month)<b>*</b></p>
          </li>
          <li>
            <p><span class="fa fa-li fa-upload fa-2x"></span> <strong>Upload</strong><br /> 10 MB/day (300 MB/month)</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-database fa-2x"></span> <strong>Memory (RAM)</strong><br /> 256 MB</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-desktop fa-2x"></span> <strong>System</strong><br /> Desktop<br />Laptop<br /><a href="https://en.bitcoin.it/wiki/Bitcoin_Core_compatible_devices#ARM-based_Chipsets">Most ARM chipsets</a></p>
          </li>
      <li>
        <p><span class="fa fa-li fa-windows fa-2x"></span> <strong>Operating system</strong><br /> Windows 7/8.x<br />Mac OS X<br />Linux<br />Some BSDs</p>
      </li>
    </ul>

    <p><br class="clear" /></p>

    <p><b>*</b> Plus a one-time 140 GB download the first time you start Umkoin Core.</p>

    <p><strong>Learn more:</strong> <a href="https://en.bitcoin.it/wiki/Running_Bitcoin">Umkoin Core configuration options</a></p>

  </div>

  <h3 id="minimum-recommended">Minimum Recommended</h3>

  <div>

    <ul class="fa-ul">
      <li>
        <p><span class="fa fa-li fa-hdd-o fa-2x"></span> <strong>Disk space</strong><br /> 145 GB</p>
      </li>
      <li>
        <p><span class="fa fa-li fa-download fa-2x"></span> <strong>Download</strong><br /> 500 MB/day (15 GB/month)<b>*</b></p>
      </li>
      <li>
        <p><span class="fa fa-li fa-upload fa-2x"></span> <strong>Upload</strong><br /> 5 GB/day (150 GB/month)</p>
      </li>
      <li>
        <p><span class="fa fa-li fa-database fa-2x"></span> <strong>Memory (RAM)</strong><br /> 1 GB</p>
      </li>
      <li>
        <p><span class="fa fa-li fa-desktop fa-2x"></span> <strong>System</strong><br /> Desktop<br />Laptop<br /><a href="https://en.bitcoin.it/wiki/Bitcoin_Core_compatible_devices#ARM-based_Chipsets">Some ARM chipsets</a> &gt;1 GHz</p>
      </li>
      <li>
        <p><span class="fa fa-li fa-windows fa-2x"></span> <strong>Operating system</strong><br /> Windows 7/8.x/10<br />Mac OS X<br />Linux</p>
      </li>
    </ul>

    <p><br class="clear" /></p>

    <p><b>*</b> Plus a one-time 140 GB download the first time you start Umkoin Core.</p>

  </div>

</div>

<h2 id="possible-problems">Possible Problems</h2>

<ul>
  <li>
    <p><strong>Legal:</strong> Umkoin use is <a href="https://en.wikipedia.org/wiki/Legality_of_bitcoin_by_country">prohibited or restricted in some
areas.</a></p>
  </li>
  <li>
    <p><strong>Bandwidth limits</strong>: Some Internet plans will charge an additional
amount for any excess upload bandwidth used that isn’t included in
the plan. Worse, some providers may terminate your connection without
warning because of overuse. We advise that you check whether your
Internet connection is subjected to such limitations and monitor your
bandwidth use so that you can stop Umkoin Core before you reach your
upload limit.</p>
  </li>
  <li>
    <p><strong>Anti-virus:</strong> Several people have placed parts of known computer
viruses in the Umkoin block chain. This block chain data can’t infect
your computer, but some anti-virus programs quarantine the data
anyway, making it more difficult to run Umkoin Core. This problem mostly
affects computers running Windows.</p>
  </li>
  <li>
    <p><strong>Attack target:</strong> Umkoin Core powers the Umkoin peer-to-peer
network, so people who want to disrupt the network may
attack Umkoin Core users in ways that will affect other things
you do with your computer, such as an attack that limits your
available download bandwidth.</p>
  </li>
</ul>

<div class="not-displayed">
  <div id="backup_your_keys" title="Backup Your Keys">
    <p>By default, you need to backup Umkoin Core after every 100
  transactions.  This includes both transactions you send as well as
  payments you request (whether or not you actually received the payment).</p>

    <p>For example, you need to backup after sending 33 payments and requesting
  67 payments (even though you only received 60 payments).</p>

    <p>Umkoin Core can be configured to allow you to go more transactions
  between backups.  See the <a href="https://en.bitcoin.it/wiki/Running_Bitcoin"><code class="highlighter-rouge">-keypool</code> setting</a>.</p>
  </div>

  <div id="secure_your_wallet" title="Secure Your Wallet">
    <p>Anyone who gets access to your wallet can steal your umkoins.  The
  first line of defense against this is encrypting your wallet, an option
  from the File menu in the graphical interface.</p>

    <p>However, encrypting may not be enough if your computer becomes infected
  by malware.  Learn about <button class="popup js" data-container="offline_wallet">offline wallets</button>
  for security against this type of attack.</p>

    <p>In addition to securing your wallet, you also need to keep your backups
  secure.  Anyone who gets access to them can also steal your umkoins.</p>

    <p><strong>Learn more:</strong> <a href="/en/secure-your-wallet">secure your wallet</a></p>
  </div>

  <div id="offline_wallet" title="Offline Wallet">
    <p>Computers that connect to the Internet are frequently hacked or infected
  with umkoin-stealing malware.  Computers that never connect to the
  Internet are a much more secure location for your umkoins.</p>

    <p>Umkoin Core can be run on an always-offline computer, creating an
  offline wallet (also called a cold wallet).  The offline wallet will
  securely store the private keys, while a separate online Umkoin Core
  wallet will send and receive transactions.</p>

    <p><strong>Learn more:</strong> <a href="http://bitcoin.stackexchange.com/a/34122/21052">Creating and signing offline transactions</a></p>
  </div>

  <div id="umkoin_inheritance" title="Umkoin Inheritance">
    <p>Your Umkoin wallet isn’t like a bank account—it won’t automatically
  go to your heirs if you die or become disabled.</p>

    <p>You have to plan ahead and make sure there is a way for your heirs
  to access your wallet backups when you’re no longer available.</p>

    <p><strong>Learn more:</strong> <a href="http://bitcoin.stackexchange.com/q/38692/21052">Estate planning: how can I ensure my umkoins are inheritable?</a></p>

  </div>
</div>

<p><br class="clear big" /></p>
<div class="prevnext">
<span><strong>Previous Feature</strong><br /><a href="/en/umkoin-core/features/privacy.php">Privacy</a></span>
<span><strong>Next feature</strong><br /><a href="/en/umkoin-core/features/user-interface">User interface</a></span>
</div>
<p><br class="clear" /></p>


  </div>

</div>


<?php
include '../../page_footer.php';
?>


<script src="/js/umkoin-core.js"></script>


</body>
</html>
