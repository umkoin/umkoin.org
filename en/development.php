<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include 'head'; ?>
<title>Development - Umkoin</title>

<script src="/js/jquery/jquery-1.11.2.min.js"></script>
<script src="/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1>Umkoin development</h1>
    <p>Umkoin is free software and any developer can contribute to the project. Everything you need is in the <a href="https://github.com/umkoin/umkoin">GitHub repository</a>. Please make sure to read and follow the development process described in the README, as well as to provide good quality code and respect all guidelines.</p>
    <p>Development discussion takes place on GitHub.</p>
    <p><span class="fa fa-exclamation-triangle"></span> <em>To report an issue, please see the <a href="https://github.com/umkoin/umkoin/issues" target="_blank">bug reporting</a> page.</em></p>

    <h2 id="code-review">Code Review</h2>
    <p>Umkoin Core is security software that helps protect assets worth billions of dollars, so every code change needs to be reviewed by experienced developers.</p>
    <p>It can take a long time for other developers to review your pull requests. Remember that all reviewers are taking time away from their own projects to review your pull requests, so be patient and respectful of their time.</p>
    <p>Please also consider helping to review other people’s pull requests. You don’t need to be an expert in Umkoin, the Umkoin Core codebase, or C++ (although all these things help). There are almost always <a href="https://github.com/umkoin/umkoin/pulls">open pull requests</a> that any programmer can review.</p>

    <h2 id="starter-projects">Starter Projects</h2>
    <p>Do you want to begin coding for Umkoin Core but don’t have a specific improvement in mind?  Here are a few ideas:</p>
    <ul>
      <li>
        <p><strong>Fix existing issues:</strong> the <a href="https://github.com/umkoin/umkoin/issues">issue tracker</a> is the best place to find a useful way to contribute to Umkoin Core. Before starting to write any patches for issues you find, you may want to comment on the issue to make sure nobody else is already working on it.</p>
      </li>
      <li>
        <p><strong>Write tests:</strong> Umkoin Core is covered by many tests, but patches that improve test coverage are always welcome and are a great way to build familiarity with the codebase.  See the documentation about <a href="https://github.com/umkoin/umkoin/blob/master/README.md#automated-testing">automated testing</a>.</p>
      </li>
    </ul>

    <h2 id="spec">Documentation</h2>
    <p>If you are interested in learning more about the technical details of Umkoin and how to use existing tools and APIs, it is recommended you start by exploring the <a href="/en/developer-documentation.php">developer documentation</a>.</p>

    <h2 id="more">More free software projects</h2>
    <p>Want to contribute to a different project?</p>
    <ul class="devprojectlist">
      <li><a href="https://github.com/goatpig/BitcoinArmory">Armory</a> - A wallet with enhanced security features, written in C++.</li>
      <li><a href="https://github.com/luke-jr/bfgminer">BFGMiner</a> - A modular miner, written in C.</li>
      <li><a href="https://github.com/bitcoin-wallet/bitcoin-wallet">Bitcoin Wallet</a> - A SPV wallet for Android and Blackberry, written in Java.</li>
      <li><a href="https://github.com/bitcoinj/bitcoinj">bitcoinj</a> - A library for SPV wallets, written in Java.</li>
      <li><a href="https://github.com/btcsuite/btcd">btcd</a> - A full node, written in Go.</li>
      <li><a href="https://github.com/btcsuite/btcwallet">btcwallet</a> - A hierarchical deterministic wallet daemon, written in Go.</li>
      <li><a href="https://bitbucket.org/ckolivas/ckpool">ckpool</a> - A fast mining pool server application, written in C.</li>
      <li><a href="https://github.com/spesmilo/electrum">Electrum</a> - A fast server-trusting wallet, written in Python.</li>
      <li><a href="https://github.com/luke-jr/eloipool">Eloipool</a> - A fast mining pool server application, written in Python.</li>
      <li><a href="https://github.com/haskoin/haskoin">Haskoin</a> - An implementation of the Bitcoin protocol, written in Haskell.</li>
      <li><a href="https://github.com/libbitcoin/libbitcoin">Libbitcoin</a> - A cross-platform development toolkit, written in C++.</li>
      <li><a href="https://github.com/libbitcoin/libbitcoin-server/">Libbitcoin Server</a> - A full node and query server, built on libbitcoin.</li>
      <li><a href="https://github.com/libbitcoin/libbitcoin-explorer">Libbitcoin Explorer</a> - A command line tool, built on libbitcoin.</li>
      <li><a href="https://github.com/bitcoin/libblkmaker">Libblkmaker</a> - A client library for the getblocktemplate mining protocol, written in C.</li>
      <li><a href="https://github.com/MetacoSA/NBitcoin">NBitcoin</a> - A cross-platform library, written in C#.</li>
      <li><a href="https://github.com/jgarzik/picocoin">picocoin</a> - A tiny library with lightweight client and utilities, written in C.</li>
      <li><a href="https://github.com/petertodd/python-bitcoinlib">python-bitcoinlib</a> - A library for structures and protocols, written in Python.</li>
      <li><a href="https://github.com/luke-jr/python-blkmaker">Python Blkmaker</a> - A client library for the getblocktemplate mining protocol, written in Python.</li>
      <li class="more"><a onclick="librariesShow(event)" ontouchstart="librariesShow(event);" class="link-js"><span class="fa fa-caret-down"></span> Show more...</a></li>
    </ul>

  </div>

</div>


<?php
include 'page_footer.php';
?>>


</body>
</html>
