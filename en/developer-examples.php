<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Developer Examples - Umkoin</title>

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

  <div class="breadcrumbs">
      <a href="/en/">Umkoin</a>
      &gt;
      <a href="/en/developer-documentation">Developer Documentation</a>
      &gt;
      Examples
  </div>

  <div id="content" class="content">

    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <h1>Umkoin Developer Examples</h1>
    <p class="summary">Find examples of how to build programs using Umkoin.</p>

    <div id="toc" class="toc">
      <div>
        <ul id="markdown-toc">
          <li><a href="#testing-applications" id="markdown-toc-testing-applications">Testing Applications</a>
            <ul>
              <li><a href="#testnet" id="markdown-toc-testnet">Testnet</a></li>
              <li><a href="#regtest-mode" id="markdown-toc-regtest-mode">Regtest Mode</a></li>
            </ul>
          </li>
          <li><a href="#transactions" id="markdown-toc-transactions">Transactions</a>
            <ul>
              <li><a href="#transaction-tutorial" id="markdown-toc-transaction-tutorial">Transaction Tutorial</a>
                <ul>
                  <li><a href="#simple-spending" id="markdown-toc-simple-spending">Simple Spending</a></li>
                  <li><a href="#simple-raw-transaction" id="markdown-toc-simple-raw-transaction">Simple Raw Transaction</a></li>
                  <li><a href="#complex-raw-transaction" id="markdown-toc-complex-raw-transaction">Complex Raw Transaction</a></li>
                  <li><a href="#offline-signing" id="markdown-toc-offline-signing">Offline Signing</a></li>
                  <li><a href="#p2sh-multisig" id="markdown-toc-p2sh-multisig">P2SH Multisig</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#payment-processing" id="markdown-toc-payment-processing">Payment Processing</a>
            <ul>
              <li><a href="#payment-protocol" id="markdown-toc-payment-protocol">Payment Protocol</a>
                <ul>
                  <li><a href="#paymentrequest--paymentdetails" id="markdown-toc-paymentrequest--paymentdetails">PaymentRequest &amp; PaymentDetails</a>
                    <ul>
                      <li><a href="#initialization-code" id="markdown-toc-initialization-code">Initialization Code</a></li>
                      <li><a href="#configuration-code" id="markdown-toc-configuration-code">Configuration Code</a></li>
                      <li><a href="#code-variables" id="markdown-toc-code-variables">Code Variables</a></li>
                      <li><a href="#derivable-data" id="markdown-toc-derivable-data">Derivable Data</a></li>
                      <li><a href="#output-code" id="markdown-toc-output-code">Output Code</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#p2p-network" id="markdown-toc-p2p-network">P2P Network</a>
            <ul>
              <li><a href="#creating-a-bloom-filter" id="markdown-toc-creating-a-bloom-filter">Creating A Bloom Filter</a></li>
              <li><a href="#evaluating-a-bloom-filter" id="markdown-toc-evaluating-a-bloom-filter">Evaluating A Bloom Filter</a></li>
              <li><a href="#retrieving-a-merkleblock" id="markdown-toc-retrieving-a-merkleblock">Retrieving A MerkleBlock</a></li>
              <li><a href="#parsing-a-merkleblock" id="markdown-toc-parsing-a-merkleblock">Parsing A MerkleBlock</a></li>
            </ul>
          </li>
        </ul>
        <ul class="goback"><li><a href="/en/developer-documentation">Return To Overview</a></li></ul>
        <ul class="reportissue"><li><a href="https://github.com/umkoin/umkoin.org/issues/new" onmouseover="updateIssue(event);">Report An Issue</a></li></ul>
        <ul class="editsource"><li><a href="https://github.com/umkoin/umkoin.org/tree/master/_includes" onmouseover="updateSource(event);">Edit On GitHub</a></li></ul>
      </div>
    </div>

    <!--Temporary disclaimer BEGIN-->
    <div class="toccontent">
      <div id="develdocdisclaimer" class="develdocdisclaimer">
      <div>
        <b>BETA</b>: This documentation has not been extensively reviewed by Umkoin experts and so likely contains numerous errors. Please use the <em>Issue</em> and <em>Edit</em> links on the bottom left menu to help us improve. To close this disclaimer

        <a href="#" onclick="disclaimerClose(event);">click here</a>
        <a class="develdocdisclaimerclose" onclick="disclaimerClose(event);">X</a>
      </div>
    </div>
    <script>disclaimerAutoClose();</script>
    <!--Temporary disclaimer END-->

    <p><input id="glossary_term" class="glossary_term" placeholder="Search the glossary, RPCs, and more" /></p>
    <p>The following guide aims to provide examples to help you start building Umkoin-based applications. To make the best use of this document, you may want to install the current version of Umkoin Core, either from <a href="https://github.com/umkoin/umkoin">source</a> or from a <a href="/en/download.php">pre-compiled executable</a>.</p>
    <p>Once installed, you’ll have access to three programs: <code>umkoind</code>, <code>umkoin-qt</code>, and <code>umkoin-cli</code>.</p>

    <ul>
      <li>
        <p><code>umkoin-qt</code> provides a combination full Umkoin <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> and <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> frontend. From the Help menu, you can access a console where you can enter the <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPC</a> commands used throughout this document.</p>
      </li>
      <li>
        <p><code>umkoind</code> is more useful for programming: it provides a full <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> which you can interact with through <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPCs</a> to port 6332 (or 16332 for <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>).</p>
      </li>
      <li>
        <p><code>umkoin-cli</code> allows you to send <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPC</a> commands to <code>umkoind</code> from the command line. For example, <code>umkoin-cli help</code></p>
      </li>
    </ul>

    <p>All three programs get settings from <code>umkoin.conf</code> in the <code>Umkoin</code> application directory:</p>

    <ul>
      <li>
        <p>Windows: <code>%APPDATA%\Umkoin\</code></p>
      </li>
      <li>
        <p>OSX: <code>$HOME/Library/Application Support/Umkoin/</code></p>
      </li>
      <li>
        <p>Linux: <code>$HOME/.umkoin/</code></p>
      </li>
    </ul>

    <p>To use <code>umkoind</code> and <code>umkoin-cli</code>, you will need to add a <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPC</a> password to your <code>umkoin.conf</code> file. Both programs will read from the same file if both run on the same system as the same user, so any long random password will work:</p>
    <pre><code>rpcpassword=change_this_to_a_long_random_password</code></pre>
    <p>You should also make the <code>umkoin.conf</code> file only readable to its owner. On Linux, Mac OSX, and other Unix-like systems, this can be accomplished by running the following command in the Umkoin application directory:</p>
    <pre><code>chmod 0600 umkoin.conf</code></pre>
    <p>For development, it’s safer and cheaper to use Umkoin’s test <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> (<a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>) or <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regression test mode</a> (<a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest</a>) described below.</p>
    <p>Questions about Umkoin use are best sent to the <a href="https://umkointalk.org/index.php?board=4.0">BitcoinTalk forum</a> and <a href="https://en.umkoin.it/wiki/IRC_channels">IRC channels</a>. Errors or suggestions related to documentation on Umkoin.org can be <a href="https://github.com/umkoin/umkoin.org/issues">submitted as an issue</a> or posted to the <a href="https://groups.google.com/forum/#!forum/umkoin-documentation">umkoin-documentation mailing list</a>.</p>
    <p>In the following documentation, some strings have been shortened or wrapped: “[…]” indicates extra data was removed, and lines ending in a single backslash “\” are continued below. If you hover your mouse over a paragraph, cross-reference links will be shown in blue. If you hover over a cross-reference link, a brief definition of the term will be displayed in a tooltip.</p>

    <h2 id="testing-applications">Testing Applications</h2>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/testing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/testing.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/testing.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/testing.md%0A%0A">Report Issue</a>
      
    </div>

    <p>Umkoin Core provides testing tools designed to let developers test their applications with reduced risks and limitations.</p>

    <h3 id="testnet">Testnet</h3>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/testing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/testing.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/testing.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/testing.md%0A%0A">Report Issue</a>
      
    </div>

    <p>When run with no arguments, all Umkoin Core programs default to Umkoin’s main <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> (<a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." id="term-mainnet" class="term">mainnet</a>). However, for development, it’s safer and cheaper to use Umkoin’s test <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> (<a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>) where the <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractins of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> spent have no real-world value. <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">Testnet</a> also relaxes some restrictions (such as <a href="/en/glossary/standard-transaction" title="A transaction that passes Umkoin Core's IsStandard() and IsStandardTx() tests. Only standard transactions are mined or broadcast by peers running the default Umkoin Core software." class="auto-link">standard transaction</a> checks) so you can test functions which might currently be disabled by default on <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>.</p>
    <p>To use <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>, use the argument <code>-testnet</code> with <code>umkoin-cli</code>, <code>umkoind</code> or <code>umkoin-qt</code> or add <code>testnet=1</code> to your <code>umkoin.conf</code> file as <a href="/en/developer-examples">described earlier</a>. To get free <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> for testing, use <a href="https://tpfaucet.appspot.com/">Piotr Piasecki’s testnet faucet</a>. <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">Testnet</a> is a public resource provided for free by members of the community, so please don’t abuse it.</p>

    <h3 id="regtest-mode">Regtest Mode</h3>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/testing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/testing.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/testing.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/testing.md%0A%0A">Report Issue</a>
      
    </div>

    <p>For situations where interaction with random <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> and <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> is unnecessary or unwanted, Umkoin Core’s <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regression test mode</a> (<a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest mode</a>) lets you instantly create a brand-new private <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> with the same basic rules as <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>—but one major difference: you choose when to create new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a>, so you have complete control over the environment.</p>
    <p>Many developers consider <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest mode</a> the preferred way to develop new applications. The following example will let you create a <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest</a> environment after you first <a href="/en/developer-examples">configure umkoind</a>.</p>

    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoind -regtest -daemon
    Umkoin server starting</code></pre></figure>

    <p>Start <code>umkoind</code> in <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest mode</a> to create a private <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.</p>

    <pre><code>## Umkoin Core 0.10.1 and earlier
umkoin-cli -regtest setgenerate true 101

## Umkoin Core master (as of commit 48265f3)
umkoin-cli -regtest generate 101
</code></pre>

    <p>Generate 101 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> using a special <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPC</a>
which is only available in <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest mode</a>. This takes less than a second on
a generic PC. Because this is a new <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> using Umkoin’s default
rules, the first <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> pay a <a href="/en/glossary/block-reward" title="The amount that miners may claim as a reward for creating a block. Equal to the sum of the block subsidy (newly available satoshis) plus the transactions fees paid by transactions included in the block." class="auto-link">block reward</a> of 50 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a>. Unlike
<a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>, in <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create privat satoshis with no real-world value." class="auto-link">regtest mode</a> only the first 150 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> pay a reward of 50 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a>.
However, a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> must have 100 <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmations</a> before that reward can be
spent, so we generate 101 <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> to get access to the <a href="/en/glossary/coinbase-transaction" title="The first transaction in a block. Always created by a miner, it includes a single coinbase." class="auto-link">coinbase
transaction</a> from <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> #1.</p>

    <figure class="highlight"><pre><code class="language-bash" data-lang="bash">umkoin-cli -regtest getbalance
50.00000000</code></pre></figure>

    <p>Verify that we now have 50 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> available to spend.</p>
    <p>You can now use Umkoin Core <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPCs</a> prefixed with <code>umkoin-cli -regtest</code>.</p>
    <p><a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">Regtest</a> <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> and <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> state (chainstate) are saved in the <code>regtest</code>
subdirectory of the Umkoin Core configuration directory. You can safely
delete the <code>regtest</code> subdirectory and restart Umkoin Core to
start a new <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest</a>. (See the <a href="/en/developer-examples">Developer Examples Introduction</a> for default
configuration directory locations on various operating systems. Always back up
<a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a> <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto>wallets</a> before performing dangerous operations such as deleting.)</p>

    <h2 id="transactions">Transactions</h2>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>
      
    </div>

    <h3 id="transaction-tutorial">Transaction Tutorial</h3>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>
      
    </div>

    <p>Creating transactions is something most Umkoin applications do. This section describes how to use Umkoin Core’s <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPC</a> interface to create transactions with various attributes.</p>
    <p>Your applications may use something besides Umkoin Core to create transactions, but in any system, you will need to provide the same kinds of data to create transactions with the same attributes as those described below.</p>
    <p>In order to use this tutorial, you will need to setup <a href="/en/download">Umkoin Core</a> and create a <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regression test mode</a> environment with 50 UMK in your test <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

    <h4 id="simple-spending">Simple Spending</h4>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>
      
    </div>

    <p>Umkoin Core provides several <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPCs</a> which handle all the details of spending, including creating <a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change outputs</a> and paying appropriate fees. Even advanced users should use these <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPCs</a> whenever possible to decrease the chance that <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> will be lost by mistake.</p>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest getnewaddress
mvbnrCX3bg1cDRUu8pkecrvP6vQkSLDSou
    <span class="gp">&gt; </span><span class="nv">NEW_ADDRESS</span><span class="o">=</span>mvbnrCX3bg1cDRUu8pkecrvP6vQkSLDSou</code></pre></figure>

    <p>Get a new Umkoin <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> and save it in the shell variable <code>$NEW_ADDRESS</code>.</p>

    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest sendtoaddress <span class="nv">$NEW_ADDRESS</span> 10.00
263c018582731ff54dc72c7d67e858c002ae298835501d80200f05753de0edf0</code></pre></figure>

    <p>Send 10 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> to the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> using the <a href="/en/developer-reference.php#sendtoaddress" class="auto-link"><code>sendtoaddress</code> RPC</a>. The returned hex string is the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">transaction identifier</a> (<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>).</p>
    <p>The <a href="/en/developer-reference.php#sendtoaddress" class="auto-link"><code>sendtoaddress</code> RPC</a> automatically selects an unspent transaction <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> (<a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>) from which to spend the <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>. In this case, it withdrew the <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> from our only available <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>, the <a href="/en/glossary/coinbase-transaction" title="The first transaction in a block. Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> for <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> #1 which matured with the creation of <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> #101. To spend a specific <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>, you could use the <a href="/en/developer-reference.php#sendfrom" class="auto-link"><code>sendfrom</code> RPC</a> instead.</p>

    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest listunspent
    <span class="o">[</span>
    <span class="o">]</span></code></pre></figure>

    <p>Use the <a href="/en/developer-reference.php#listunspent" class="auto-link"><code>listunspent</code> RPC</a> to display the <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> belonging to this <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>. The list is empty because it defaults to only showing <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a> <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> and we just spent our only <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">confirmed</a> <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>.</p>

    <div class="multicode">
      <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest listunspent 0</code></pre></figure>
      <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835501d\
                  80200f05753de0edf0"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"muhtvdmsnbQEPFuEmxcChX58fGvXaaUoVt"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a9149ba386253ea698158b6d34802bb9b550\
                          f5ce36dd88ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">40.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835501d\
                  80200f05753de0edf0"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"mvbnrCX3bg1cDRUu8pkecrvP6vQkSLDSou"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"account"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914a57414e5ffae9ef5074bacbe10a320bb\
                          2614e1f388ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">10.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span></code></pre></figure>
  </div>

    <p>Re-running the <a href="/en/developer-reference.php#listunspent" class="auto-link"><code>listunspent</code> RPC</a> with the argument “0” to also display <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> shows that we have two <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>, both with the same <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>. The first <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> shown is a <a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change output</a> that <a href="/en/developer-reference.php#sendtoaddress" class="auto-link"><code>sendtoaddress</code></a> created using a new <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> from the key pool. The second <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> shown is the spend to the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> we provided. If we had spent those <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in ons of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to someone else, that second transaction would not be displayed in our list of <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>.</p>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest generate 1
      <span class="gp">&gt; </span><span class="nb">unset </span>NEW_ADDRESS</code></pre></figure>
    <p>Create a new <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to confirm the transaction above (takes less than a second) and clear the shell variable.</p>

    <h4 id="simple-raw-transaction">Simple Raw Transaction</h4>
    <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
      | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
      | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>
      
    </div>

  <p>The <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> <a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPCs</a> allow users to create custom transactions and
delay broadcasting those transactions. However, mistakes made in <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw
transactions</a> may not be detected by Umkoin Core, and a number of <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw
transaction</a> users have permanently lost large numbers of <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a>, so
please be careful using <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transactions</a> on <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>.</p>

  <p>This subsection covers one of the simplest possible <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transactions</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest listunspent</code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835501d\
                  80200f05753de0edf0"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"muhtvdmsnbQEPFuEmxcChX58fGvXaaUoVt"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a9149ba386253ea698158b6d34802bb9b550\
                          f5ce36dd88ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">40.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835501d\
                  80200f05753de0edf0"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"mvbnrCX3bg1cDRUu8pkecrvP6vQkSLDSou"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"account"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914a57414e5ffae9ef5074bacbe10a320bb\
                          2614e1f388ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">10.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"3f4fa19803dec4d6a84fae3821da7ac7577080ef754512\
                  94e71f9b20e0ab1e7b"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"mwJTL1dZG8BAP6X7Be3CNNcuVKi7Qqt7Gk"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"210260a275cccf0f4b106220725be516adba27\
                          52db1bec8c5b7174c89c4c07891f88ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">50.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">101</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">UTXO_TXID</span><span class="o">=</span>3f4fa19803dec4d6a84fae3821da7ac7577080ef75451294e71f[...]
<span class="gp">&gt; </span><span class="nv">UTXO_VOUT</span><span class="o">=</span>0</code></pre></figure>
  </div>

  <p>Re-rerun <a href="/en/developer-reference.php#listunspent" class="auto-link"><code>listunspent</code></a>. We now have three <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a>: the two transactions we
created before plus the <a href="/en/glossary/coinbase-transaction" title="The first transaction in a block. Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> from <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> #2. We save the
<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> and <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> number (vout) of that <a href="/en/glossary/coinbase" title="A special field used as the sole input for coinbase transactions. The coinbase allows claiming the block reward and provides up to 100 bytes for arbitrary data." class="auto-link">coinbase</a> <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> to shell
variables.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash">&gt; umkoin-cli -regtest getnewaddress
mz6KvC4aoUeo6wSxtiVQTo7FDwPnkp6URG

<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS</span><span class="o">=</span>mz6KvC4aoUeo6wSxtiVQTo7FDwPnkp6URG</code></pre></figure>

  <p>Get a new <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> to use in the <a href="/en/glossary/serialized-transactiole="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="c">## Outputs - inputs = transaction fee, so always double-check your math!</span>
<span class="gp">&gt; </span>umkoin-cli -regtest createrawtransaction <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO_TXID</span><span class="s1">'",
        "vout": '</span><span class="nv">$UTXO_VOUT</span><span class="s1">'
      }
    ]
    '''</span> <span class="s1">'''
    {
      "'</span><span class="nv">$NEW_ADDRESS</span><span class="s1">'": 49.9999
    }'''</span>
01000000017b1eabe0209b1fe794124575ef807057c77ada2138ae4fa8d6c4de<span class="se">\</span>
0398a14f3f0000000000ffffffff01f0ca052a010000001976a914cbc20a7664<span class="se">\</span>
f2f69e5355aa427045bc15e7c6c77288ac00000000

<span class="gp">&gt; </span><span class="nv">RAW_TX</span><span class="o">=</span>01000000017b1eabe0209b1fe794124575ef807057c77ada2138ae4[...]</code></pre></figure>

  <p>Using two arguments to the <a href="/en/developer-reference.php#createrawtransaction" class="auto-link"><code>createrawtransaction</code> RPC</a>, we create a new
<a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw format transaction</a>. The first argument (a JSON array) references
the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> of the <a href="/en/glossary/coinbase-transaction" title="The first transaction in a block. Always created by a miner, it includes a single coinbase." class="auto-link">coinbase transaction</a> from <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> #2 and the index
number (0) of the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> from that transaction we want to spend. The
second argument (a JSON object) creates the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> with the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a>
(<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> hash) and number of <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> we want to transfer.
We save the resulting <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw format transaction</a> to a shell variable.</p>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Warning:</strong> <a href="/en/developer-reference.php#createrawtransaction" class="auto-link"><code>createrawtransaction</code></a> does not automatically create <a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change
outputs</a>, so you can easily accidentally pay a large <a href="/en/glossary/transaction-fee" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>. In
this example, our <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> had 50.0000 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> and our <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>
(<code>$NEW_ADDRESS</code>) is being paid 49.9999 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a>, so the transaction will
include a fee of 0.0001 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a>. If we had paid <code>$NEW_ADDRESS</code> only 10
<a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> with no other changes to this transaction, the <a href="/en/glossary/transaction-fee" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a>
would be a whopping 40 <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a>. See the Complex <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">Raw Transaction</a>
subsection below for how to create a transaction with multiple <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> so you
can send the change back to yourself.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest decoderawtransaction <span class="nv">$RAW_TX</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"c80b343d2ce2b5d829c2de9854c7c8d423c0e33bda264c4013\
              8d834aab4c0638"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"hash"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"c80b343d2ce2b5d829c2de9854c7c8d423c0e33bda264c40138d834aab4c0638"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"size"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">85</span><span class="p">,</span><span class="w">
    </span><span class="nt">"vsize"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">85</span><span class="p">,</span><span class="w">		
    </span><span class="nt">"version"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nt">"locktime"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nt">"vin"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"3f4fa19803dec4d6a84fae3821da7ac7577080ef75\
                      451294e71f9b20e0ab1e7b"</span><span class="p">,</span><span class="w">
            </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptSig"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nt">"sequence"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">4294967295</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"value"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">49.99990000</span><span class="p">,</span><span class="w">
            </span><span class="nt">"n"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"OP_DUP OP_HASH160 cbc20a7664f2f69e5355a\
                         a427045bc15e7c6c772 OP_EQUALVERIFY OP_CHECKSIG"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914cbc20a7664f2f69e5355aa427045bc15e\
                         7c6c77288ac"</span><span class="p">,</span><span class="w">
          </span><span class="nt">"reqSigs"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                </span><span class="nt">"type"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"pubkeyhash"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"addresses"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="s2">"mz6KvC4aoUeo6wSxtiVQTo7FDwPnkp6URG"</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
  </div>

  <p>Use the <a href="/en/developer-reference.php#decoderawtransaction" class="auto-link"><code>decoderawtransaction</code> RPC</a> to see exactly what the transaction
we just created does.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest signrawtransaction <span class="nv">$RAW_TX</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"01000000017b1eabe0209b1fe794124575ef807057c77ada213\
             8ae4fa8d6c4de0398a14f3f00000000494830450221008949f0\
             cb400094ad2b5eb399d59d01c14d73d8fe6e96df1a7150deb38\
             8ab8935022079656090d7f6bac4c9a94e0aad311a4268e082a7\
             25f8aeae0573fb12ff866a5f01ffffffff01f0ca052a0100000\
             01976a914cbc20a7664f2f69e5355aa427045bc15e7c6c77288\
             ac00000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">SIGNED_RAW_TX</span><span class="o">=</span>01000000017b1eabe0209b1fe794124575ef807057c77ada[...]</code></pre></figure>
  </div>

  <p>Use the <a href="/en/developer-reference.php#signrawtransaction" class="auto-link"><code>signrawtransaction</code> RPC</a> to sign the transaction created by
<a href="/en/developer-reference.php#createrawtransaction" class="auto-link"><code>createrawtransaction</code></a> and save the returned “hex” raw format signed
transaction to a shell variable.</p>

  <p>Even though the transaction is now complete, the Umkoin Core <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> we’re
connected to doesn’t know anything about the transaction, nor does any
other part of the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>. We’ve created a spend, but we haven’t
actually spent anything because we could simply unset the
<code>$SIGNED_RAW_TX</code> variable to eliminate the transaction.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest sendrawtransaction <span class="nv">$SIGNED_RAW_TX</span>
c7736a0a0046d5a8cc61c8c3c2821d4d7517f5de2bc66a966011aaa79965ffba</code></pre></figure>

  <p>Send the signed transaction to the connected <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> using the
<a href="/en/developer-reference.php#sendrawtransaction" class="auto-link"><code>sendrawtransaction</code> RPC</a>. After accepting the transaction, the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>
would usually then broadcast it to other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a>, but we’re not currently
connected to other <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peers</a> because we started in <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest mode</a>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest generate 1

<span class="gp">&gt; </span><span class="nb">unset </span>UTXO_TXID UTXO_VOUT NEW_ADDRESS RAW_TX SIGNED_RAW_TX</code></pre></figure>

  <p>Generate a <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> to confirm the transaction and clear our shell
variables.</p>

  <h4 id="complex-raw-transaction">Complex Raw Transaction</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>In this example, we’ll create a transaction with two <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> and two
<a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>. We’ll sign each of the <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> separately, as might happen if
the two <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> belonged to different people who agreed to create a
transaction together (such as a CoinJoin transaction).</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest listunspent</code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835501d\
                  80200f05753de0edf0"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"muhtvdmsnbQEPFuEmxcChX58fGvXaaUoVt"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a9149ba386253ea698158b6d34802bb9b550\
                          f5ce36dd88ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">40.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835501d\
                  80200f05753de0edf0"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"mvbnrCX3bg1cDRUu8pkecrvP6vQkSLDSou"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"account"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914a57414e5ffae9ef5074bacbe10a320bb\
                          2614e1f388ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">10.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"78203a8f6b529693759e1917a1b9f05670d036fbb12911\
                  0ed26be6a36de827f3"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"n2KprMQm4z2vmZnPMENfbp2P1LLdAEFRjS"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"2102296abd0d5ad3b06ddff36fa9cd8ed\
                          d181d97b9489a6adc40431fb56e1d8ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">50.00000000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">101</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"c7736a0a0046d5a8cc61c8c3c2821d4d7517f5de2bc66a\
                  966011aaa79965ffba"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"mz6KvC4aoUeo6wSxtiVQTo7FDwPnkp6URG"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"account"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914cbc20a7664f2f69e5355aa427045bc15\
                          e7c6c77288ac"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"amount"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">49.99990000</span><span class="p">,</span><span class="w">
        </span><span class="nt">"confirmations"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nt">"spendable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nt">"solvable"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">UTXO1_TXID</span><span class="o">=</span>78203a8f6b529693759e1917a1b9f05670d036fbb129110ed26[...]
<span class="gp">&gt; </span><span class="nv">UTXO1_VOUT</span><span class="o">=</span>0
<span class="gp">&gt; </span><span class="nv">UTXO1_ADDRESS</span><span class="o">=</span>n2KprMQm4z2vmZnPMENfbp2P1LLdAEFRjS
 
<span class="gp">&gt; </span><span class="nv">UTXO2_TXID</span><span class="o">=</span>263c018582731ff54dc72c7d67e858c002ae298835501d80200[...]
<span class="gp">&gt; </span><span class="nv">UTXO2_VOUT</span><span class="o">=</span>0
<span class="gp">&gt; </span><span class="nv">UTXO2_ADDRESS</span><span class="o">=</span>muhtvdmsnbQEPFuEmxcChX58fGvXaaUoVt</code></pre></figure>
  </div>

  <p>For our two <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>, we select two <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> by placing the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> and <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output
index</a> numbers (vouts) in shell variables. We also save the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a>
corresponding to the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> (hashed or unhashed) used in those
transactions. We need the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a> so we can get the corresponding
<a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> from our <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest dumpprivkey <span class="nv">$UTXO1_ADDRESS</span>
cSp57iWuu5APuzrPGyGc4PGUeCg23PjenZPBPoUs24HtJawccHPm

<span class="gp">&gt; </span>umkoin-cli -regtest dumpprivkey <span class="nv">$UTXO2_ADDRESS</span>
cT26DX6Ctco7pxaUptJujRfbMS2PJvdqiSMaGaoSktHyon8kQUSg

<span class="gp">&gt; </span><span class="nv">UTXO1_PRIVATE_KEY</span><span class="o">=</span>cSp57iWuu5APuzrPGyGc4PGUeCg23PjenZPBPoUs24Ht[...]

<span class="gp">&gt; </span><span class="nv">UTXO2_PRIVATE_KEY</span><span class="o">=</span>cT26DX6Ctco7pxaUptJujRfbMS2PJvdqiSMaGaoSktHy[...]</code></pre></figure>

  <p>Use the <a href="/en/developer-reference.php#dumpprivkey" class="auto-link"><code>dumpprivkey</code> RPC</a> to get the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> corresponding to the
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> used in the two <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> out <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> we will be spending. We need
the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> so we can sign each of the <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> separately.</p>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Warning:</strong> Users should never manually manage <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> on <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>.
As dangerous as <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transactions</a> are (see warnings above), making a
mistake with a <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> can be much worse—as in the case of a <a href="/en/glossary/hd-protocol" title="The Hierarchical Deterministic (HD) key creation and transfer protocol (BIP32), which allows creating child keys from parent keys in a hierarchy. Wallets using the HD protocol are called HD wallets." class="auto-link">HD
wallet</a> <a href="/en/developer-guide.php#hardened-keys">cross-generational key compromise</a>.
These examples are to help you learn, not for you to emulate on
<a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest getnewaddress
n4puhBEeEWD2VvjdRC9kQuX2abKxSCMNqN
<span class="gp">&gt; </span>umkoin-cli -regtest getnewaddress
n4LWXU59yM5MzQev7Jx7VNeq1BqZ85ZbLj

<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS1</span><span class="o">=</span>n4puhBEeEWD2VvjdRC9kQuX2abKxSCMNqN
<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS2</span><span class="o">=</span>n4LWXU59yM5MzQev7Jx7VNeq1BqZ85ZbLj</code></pre></figure>

  <p>For our two <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>, get two new <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="c">## Outputs - inputs = transaction fee, so always double-check your math!</span>
<span class="gp">&gt; </span>umkoin-cli -regtest createrawtransaction <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO1_TXID</span><span class="s1">'", 
        "vout": '</span><span class="nv">$UTXO1_VOUT</span><span class="s1">'
      }, 
      {
        "txid": "'</span><span class="nv">$UTXO2_TXID</span><span class="s1">'",
        "vout": '</span><span class="nv">$UTXO2_VOUT</span><span class="s1">'
      }
    ]
    '''</span> <span class="s1">'''
    {
      "'</span><span class="nv">$NEW_ADDRESS1</span><span class="s1">'": 79.9999, 
      "'</span><span class="nv">$NEW_ADDRESS2</span><span class="s1">'": 10 
    }'''</span>
0100000002f327e86da3e66bd20e1129b1fb36d07056f0b9a117199e75939652<span class="se">\</span>
6b8f3a20780000000000fffffffff0ede03d75050f20801d50358829ae02c058<span class="se">\</span>
e8677d2cc74df51f738285013c260000000000ffffffff02f028d6dc01000000<span class="se">\</span>
1976a914ffb035781c3c69e076d48b60c3d38592e7ce06a788ac00ca9a3b0000<span class="se">\</span>
00001976a914fa5139067622fd7e1e722a05c17c2bb7d5fd6df088ac00000000

<span class="gp">&gt; </span><span class="nv">RAW_TX</span><span class="o">=</span>0100000002f327e86da3e66bd20e1129b1fb3607056f0b9a117199[...]</code></pre></figure>

  <p>Create the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> using <a href="/en/developer-reference.php#createrawtransaction" class="auto-link"><code>createrawtransaction</code></a> much the same as
before, except now we have two <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> and two <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest signrawtransaction <span class="nv">$RAW_TX</span> <span class="s1">'[]'</span> <span class="s1">'''
    [
      "'</span><span class="nv">$UTXO1_PRIVATE_KEY</span><span class="s1">'"
    ]'''</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"0100000002f327e86da3e66bd20e1129b1fb36d07056f0b9a11\
             7199e759396526b8f3a20780000000049483045022100fce442\
             ec52aa2792efc27fd3ad0eaf7fa69f097fdcefab017ea56d179\
             9b10b2102207a6ae3eb61e11ffaba0453f173d1792f1b7bb8e7\
             422ea945101d68535c4b474801fffffffff0ede03d75050f208\
             01d50358829ae02c058e8677d2cc74df51f738285013c260000\
             000000ffffffff02f028d6dc010000001976a914ffb035781c3\
             c69e076d48b60c3d38592e7ce06a788ac00ca9a3b0000000019\
             76a914fa5139067622fd7e1e722a05c17c2bb7d5fd6df088ac0\
             0000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="w">
    </span><span class="s2">"errors"</span><span class="err">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nt">"txid"</span><span class="p">:</span><span class="w"> </span><span class="s2">"c53f8f5ac0b6b10cdc77f543718eb3880fee6cf9b5e0cbf4edb2a59c0fae09a4"</span><span class="p">,</span><span class="w">
      </span><span class="nt">"vout"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nt">"scriptSig"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nt">"sequence"</span><span class="p">:</span><span class="w"> </span><span class="mi">4294967295</span><span class="p">,</span><span class="w">
      </span><span class="nt">"error"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Operation not valid with the current stack size"</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">PARTLY_SIGNED_RAW_TX</span><span class="o">=</span>0100000002f327e86da3e66bd20e1129b1fb36d07[...]</code></pre></figure>
  </div>

  <p>Signing the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> with <a href="/en/developer-reference.php#signrawtransaction" class="auto-link"><code>signrawtransaction</code></a> gets more
complicated as we now have three arguments:</p>

  <ol>
    <li>
      <p>The unsigned <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a>.</p>
    </li>
    <li>
      <p>An empty array. We don’t do anything with this argument in this
operation, but some valid JSON must be provided to get access to the
later positional arguments.</p>
    </li>
    <li>
      <p>The <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> we want to use to sign one of the <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>.</p>
    </li>
  </ol>

  <p>The result is a <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> with only one <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> signed; the fact
that the transaction isn’t fully signed is indicated by value of the
<code>complete</code> JSON field. We save the incomplete, partly-signed <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw
transaction</a> hex to a shell variable.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest signrawtransaction <span class="nv">$PARTLY_SIGNED_RAW_TX</span> <span class="s1">'[]'</span> <span class="s1">'''
    [
      "'</span><span class="nv">$UTXO2_PRIVATE_KEY</span><span class="s1">'"
    ]'''</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"0100000002f327e86da3e66bd20e1129b1fb36d07056f0b9a11\
             7199e759396526b8f3a20780000000049483045022100fce442\
             ec52aa2792efc27fd3ad0eaf7fa69f097fdcefab017ea56d179\
             9b10b2102207a6ae3eb61e11ffaba0453f173d1792f1b7bb8e7\
             422ea945101d68535c4b474801fffffffff0ede03d75050f208\
             01d50358829ae02c058e8677d2cc74df51f738285013c260000\
             00006b483045022100b77f935ff366a6f3c2fdeb83589c79026\
             5d43b3d2cf5e5f0047da56c36de75f40220707ceda75d8dcf2c\
             caebc506f7293c3dcb910554560763d7659fb202f8ec324b012\
             102240d7d3c7aad57b68aa0178f4c56f997d1bfab2ded3c2f94\
             27686017c603a6d6ffffffff02f028d6dc010000001976a914f\
             fb035781c3c69e076d48b60c3d38592e7ce06a788ac00ca9a3b\
             000000001976a914fa5139067622fd7e1e722a05c17c2bb7d5f\
             d6df088ac00000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
  </div>

  <p>To sign the second <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a>, we repeat the process we used to sign the
first <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> using the second <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a>. Now that both <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a> are
signed, the <code>complete</code> result is <em>true</em>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span><span class="nb">unset </span>PARTLY_SIGNED_RAW_TX RAW_TX NEW_ADDRESS1 <span class="o">[</span>...]</code></pre></figure>

  <p>Clean up the shell variables used. Unlike previous subsections, we’re
not going to send this transaction to the connected <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> with
<a href="/en/developer-reference.php#sendrawtransaction" class="auto-link"><code>sendrawtransaction</code></a>. This will allow us to illustrate in the Offline
Signing subsection below how to spend a transaction which is not yet in
the <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> or memory pool.</p>

  <h4 id="offline-signing">Offline Signing</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>We will now spend the transaction created in the Complex <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">Raw Transaction</a>
subsection above without sending it to the local <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> first. This is the
same basic process used by <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> programs for offline
signing—which generally means signing a transaction without access
to the current <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> set.</p>

  <p>Offline signing is safe. However, in this example we will also be
spending an/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> which is not part of the <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a> because the
transaction containing it has never been broadcast. That can be unsafe:</p>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Warning:</strong> Transactions which spend <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> from <a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed
transactions</a> are vulnerable to <a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">transaction malleability</a>. Be sure to read
about <a href="/en/glossary/malleability" title="The ability of someone to change (mutate) unconfirmed transactions without making them invalid, which changes the transaction's txid, making child transactions invalid." class="auto-link">transaction malleability</a> and adopt good practices before spending
<a href="/en/glossary/confirmation-score" title="A score indicating the number of blocks on the best block chain that would need to be modified to remove or modify a particular transaction. A confirmed transaction has a confirmation score of one or higher." class="auto-link">unconfirmed transactions</a> on <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span><span class="nv">OLD_SIGNED_RAW_TX</span><span class="o">=</span>0100000002f327e86da3e66bd20e1129b1fb36d07056<span class="se">\</span>
      f0b9a117199e759396526b8f3a20780000000049483045022100fce442<span class="se">\</span>
      ec52aa2792efc27fd3ad0eaf7fa69f097fdcefab017ea56d1799b10b21<span class="se">\</span>
      02207a6ae3eb61e11ffaba0453f173d1792f1b7bb8e7422ea945101d68<span class="se">\</span>
      535c4b474801fffffffff0ede03d75050f20801d50358829ae02c058e8<span class="se">\</span>
      677d2cc74df51f738285013c26000000006b483045022100b77f935ff3<span class="se">\</span>
      66a6f3c2fdeb83589c790265d43b3d2cf5e5f0047da56c36de75f40220<span class="se">\</span>
      707ceda75d8dcf2ccaebc506f7293c3dcb910554560763d7659fb202f8<span class="se">\</span>
      ec324b012102240d7d3c7aad57b68aa0178f4c56f997d1bfab2ded3c2f<span class="se">\</span>
      9427686017c603a6d6ffffffff02f028d6dc010000001976a914ffb035<span class="se">\</span>
      781c3c69e076d48b60c3d38592e7ce06a788ac00ca9a3b000000001976<span class="se">\</span>
      a914fa5139067622fd7e1e722a05c17c2bb7d5fd6df088ac00000000</code></pre></figure>

  <p>Put the previously signed (but not sent) transaction into a shell
variable.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest decoderawtransaction <span class="nv">$OLD_SIGNED_RAW_TX</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"682cad881df69cb9df8f0c996ce96ecad758357ded2da03bad\
              40cf18ffbb8e09"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"hash"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"682cad881df69cb9df8f0c996ce96ecad758357ded2da03bad40cf18ffbb8e09"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"size"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">340</span><span class="p">,</span><span class="w">
    </span><span class="nt">"vsize"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">340</span><span class="p">,</span><span class="w">
    </span><span class="nt">"version"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nt">"locktime"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nt">"vin"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"78203a8f6b529693759e1917a1b9f05670d036fbb1\
                      29110ed26be6a36de827f3"</span><span class="p">,</span><span class="w">
            </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptSig"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"3045022100fce442ec52aa2792efc27fd3ad0ea\
                         f7fa69f097fdcefab017ea56d1799b10b210220\
                         7a6ae3eb61e11ffaba0453f173d1792f1b7bb8e\
                         7422ea945101d68535c4b474801"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"483045022100FCE442ec52aa2792efc27fd3ad0\
                         eaf7fa69f097fdcefab017ea56d1799b10b2102\
                         207a6ae3eb61e11ffaba0453f173d1792f1b7bb\
                         8e7422ea945101d68535c4b474801"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nt">"sequence"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">4294967295</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835\
                      501d80200f05753de0edf0"</span><span class="p">,</span><span class="w">
            </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptSig"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"3045022100b77f935ff366a6f3c2fdeb83589c7\
                         90265d43b3d2cf5e5f0047da56c36de75f40220\
                         707ceda75d8dcf2ccaebc506f7293c3dcb91055\
                         4560763d7659fb202f8ec324b01
                         02240d7d3c7aad57b68aa0178f4c56f997d1bfa\
                         b2ded3c2f9427686017c603a6d6"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"483045022100b77f935ff366a6f3c2fdeb83589\
                         c790265d43b3d2cf5e5f0047da56c36de75f402\
                         20707ceda75d8dcf2ccaebc506f7293c3dcb910\
                         554560763d7659fb202f8ec324b012102240d7d\
                         3c7aad57b68aa0178f4c56f997d1bfab2ded3c2\
                         f9427686017c603a6d6"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nt">"sequence"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">4294967295</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"value"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">79.99990000</span><span class="p">,</span><span class="w">
            </span><span class="nt">"n"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"OP_DUP OP_HASH160 ffb035781c3c69e076d48\
                         b60c3d38592e7ce06a7 OP_EQUALVERIFY OP_CHECKSIG"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914ffb035781c3c69e076d48b60c3d38592e\
                         7ce06a788ac"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"reqSigs"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                </span><span class="nt">"type"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"pubkeyhash"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"addresses"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="s2">"n4puhBEeEWD2VvjdRC9kQuX2abKxSCMNqN"</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"value"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">10.00000000</span><span class="p">,</span><span class="w">
            </span><span class="nt">"n"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"OP_DUP OP_HASH160 fa5132fd7e1e722\
                         a05c17c2bb7d5fd6df0 OP_EQUALVERIFY OP_CHECKSIG"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a914fa5139067622fd7e1e722a05c17c2bb7d\
                         5fd6df088ac"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"reqSigs"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                </span><span class="nt">"type"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"pubkeyhash"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"addresses"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="s2">"n4LWXU59yM5MzQev7Jx7VNeq1BqZ85ZbLj"</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">UTXO_TXID</span><span class="o">=</span>682cad881df69cb9df8f0c996ce96ecad758357ded2da03bad40[...]
<span class="gp">&gt; </span><span class="nv">UTXO_VOUT</span><span class="o">=</span>1
<span class="gp">&gt; </span><span class="nv">UTXO_OUTPUT_SCRIPT</span><span class="o">=</span>76a914fa5139067622fd7e1e722a05c17c2bb7d5fd6[...]</code></pre></figure>
  </div>

  <p>Decode the signed <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> so we can get its <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a>. Also, choose a
specific one of its <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXOs</a> to spend and save that <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO’s</a> <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> number
(vout) and hex <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> (<a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">scriptPubKey</a>) into shell variables.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest getnewaddress
mfdCHEFL2tW9eEUpizk7XLZJcnFM4hrp78

<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS</span><span class="o">=</span>mfdCHEFL2tW9eEUpizk7XLZJcnFM4hrp78</code></pre></figure>

  <p>Get a new <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> to spend the <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="c">## Outputs - inputs = transaction fee, so always double-check your math!</span>
<span class="gp">&gt; </span>umkoin-cli -regtest createrawtransaction <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO_TXID</span><span class="s1">'",
        "vout": '</span><span class="nv">$UTXO_VOUT</span><span class="s1">'
      }
    ]
    '''</span> <span class="s1">'''
    {
      "'</span><span class="nv">$NEW_ADDRESS</span><span class="s1">'": 9.9999
    }'''</span>
0100000001098ebbff18cf40ad3ba02ded7d3558d7ca6ee96c990c8fdfb99cf6<span class="se">\</span>
1d88ad2c680100000000ffffffff01f0a29a3b000000001976a914012e2ba6a0<span class="se">\</span>
51c033b03d712ca2ea00a35eac1e7988ac00000000

<span class="gp">&gt; </span><span class="nv">RAW_TX</span><span class="o">=</span>0100000001098ebbff18cf40ad3ba02ded7d3558d7ca6ee96c990c8[...]</code></pre></figure>

  <p>Create the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> the same way we’ve done in the previous
subsections.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash">    &gt; umkoin-cli -regtest signrawtransaction <span class="nv">$RAW_TX</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="w">    </span><span class="p">{</span><span class="w">
        </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"0100000001098ebbff18cf40ad3ba02ded7d3558d7ca6ee\
                 96c990c8fdfb99cf61d88ad2c680100000000ffffffff01\
                 f0a29a3b000000001976a914012e2ba6a051c033b03d712\
                 ca2ea00a35eac1e7988ac00000000"</span><span class="p">,</span><span class="w">
        </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="w">
    </span><span class="p">}</span></code></pre></figure>
  </div>

  <p>Attempt to sign the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> without any special arguments, the
way we successfully signed the the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> in the Simple <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">Raw
Transaction</a> subsection. If you’ve read the <a href="/en/developer-guide.php#transactions" title="A transaction spending satoshis">Transaction section</a> of
the guide, you may know why the call fails and leaves the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw
transaction</a> hex unchanged.</p>

  <p><img src="/img/dev/en-signing-output-to-spend.svg" alt="Old Transaction Data Required To Be Signed" /></p>

  <p>As illustrated above, the data that gets signed includes the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> and
vout from the previous transaction. That information is included in the
<a href="/en/developer-reference.php#createrawtransaction" class="auto-link"><code>createrawtransaction</code></a> <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a>. But the data that gets signed
also includes the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> from the previous transaction, even
though it doesn’t appear in either the unsigned or signed transaction.</p>

  <p>In the other <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> subsections above, the previous <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> was
part of the <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> set known to the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, so the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> was able to use
the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> and <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> number to find the previous <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> and
insert it automatically.</p>

  <p>In this case, you’re spending an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> which is unknown to the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>,
so it can’t automatically insert the previous <a /en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest signrawtransaction <span class="nv">$RAW_TX</span> <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO_TXID</span><span class="s1">'", 
        "vout": '</span><span class="nv">$UTXO_VOUT</span><span class="s1">', 
        "scriptPubKey": "'</span><span class="nv">$UTXO_OUTPUT_SCRIPT</span><span class="s1">'"
      }
    ]'''</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"0100000001098ebbff18cf40ad3ba02ded7d3558d7ca6ee96c9\
             90c8fdfb99cf61d88ad2c68010000006b483045022100c3f92f\
             b74bfa687d76ebe75a654510bb291b8aab6f89ded4fe26777c2\
             eb233ad02207f779ce2a181cc4055cb0362aba7fd7a6f72d5db\
             b9bd863f4faaf47d8d6c4b500121028e4e62d25760709806131\
             b014e2572f7590e70be01f0ef16bfbd51ea5f389d4dffffffff\
             01f0a29a3b000000001976a914012e2ba6a051c033b03d712ca\
             2ea00a35eac1e7988ac00000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">SIGNED_RAW_TX</span><span class="o">=</span>0100000001098ebbff18cf40ad3ba02ded7d3558d7ca6ee9[...]</code></pre></figure>
  </div>

  <p>Successfully sign the transaction by providing the previous <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey
script</a> and other required <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> data.</p>

  <p>This specific operation is typically what offline signing <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a> do.
The online <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> creates the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> and gets the previous
<a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey scripts</a> for all the <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">inputs</a>. The user brings this information to
the offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>. After displaying the transaction details to the
user, the offline <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> signs the transaction as we did above. The
user takes the signed transaction back to the online <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, which
broadcasts it.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest sendrawtransaction <span class="nv">$SIGNED_RAW_TX</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="err">error:</span><span class="w"> </span><span class="p">{</span><span class="nt">"code"</span><span class="p">:</span><span class="mi">-22</span><span class="p">,</span><span class="nt">"message"</span><span class="p">:</span><span class="s2">"TX rejected"</span><span class="p">}</span></code></pre></figure>
  </div>

  <p>Attempt to broadcast the second transaction before we’ve broadcast the
first transaction. The <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> rejects this attempt because the second
transaction spends an <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> which is not a <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> knows about.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest sendrawtransaction <span class="nv">$OLD_SIGNED_RAW_TX</span>
682cad881df69cb9df8f0c996ce96ecad758357ded2da03bad40cf18ffbb8e09
<span class="gp">&gt; </span>umkoin-cli -regtest sendrawtransaction <span class="nv">$SIGNED_RAW_TX</span>
67d53afa1a8167ca093d30be7fb9dcb8a64a5fdecacec9d93396330c47052c57</code></pre></figure>

  <p>Broadcast the first transaction, which succeeds, and then broadcast the
second transaction—which also now succeeds because the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> now sees
the <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest getrawmempool</code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">[</span><span class="w">
    </span><span class="s2">"67d53afa1a8167ca093d30be7fb9dcb8a64a5fdecacec9d93396330c47052c57"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"682cad881df69cb9df8f0c996ce96ecad758357ded2da03bad40cf18ffbb8e09"</span><span class="w">
</span><span class="p">]</span></code></pre></figure>
  </div>

  <p>We have once again not generated an additional <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>, so the transactions
above have not yet become part of the <a href="/en/glossary/regression-test-mode" title="A local testing environment in which developers can almost instantly generate blocks on demand for testing events, and can create private satoshis with no real-world value." class="auto-link">regtest</a> <a href="/en/glossary/block-chain" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>. However, they
are part of the local <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> memory pool.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span><span class="nb">unset </span>OLD_SIGNED_RAW_TX SIGNED_RAW_TX RAW_TX <span class="o">[</span>...]</code></pre></figure>

  <p>Remove old shell variables.</p>

  <h4 id="p2sh-multisig">P2SH Multisig</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/transactions.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/transactions.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/transactions.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/transactions.md%0A%0A">Report Issue</a>


</div>

  <p>In this subsection, we will create a <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a>, spend
<a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> to it, and then spend those <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> from it to another
<a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a>.</p>

  <p>Creating a <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> is easy. <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">Multisig</a> <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transf zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> have two
parameters, the <em>minimum</em> number of <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> required (<em>m</em>) and the
<em>number</em> of <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> to use to validate those <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a>. This is
called <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">m-of-n</a>, and in this case we’ll be using 2-of-3.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash">    &gt; umkoin-cli -regtest getnewaddress
    mhAXF4Eq7iRyvbYk1mpDVBiGdLP3YbY6Dm
    &gt; umkoin-cli -regtest getnewaddress
    moaCrnRfP5zzyhW8k65f6Rf2z5QpvJzSKe
    &gt; umkoin-cli -regtest getnewaddress
    mk2QpYatsKicvFVuTAQLBryyccRXMUaGHP

    &gt; <span class="nv">NEW_ADDRESS1</span><span class="o">=</span>mhAXF4Eq7iRyvbYk1mpDVBiGdLP3YbY6Dm
    &gt; <span class="nv">NEW_ADDRESS2</span><span class="o">=</span>moaCrnRfP5zzyhW8k65f6Rf2z5QpvJzSKe
    &gt; <span class="nv">NEW_ADDRESS3</span><span class="o">=</span>mk2QpYatsKicvFVuTAQLBryyccRXMUaGHP</code></pre></figure>

  <p>Generate three new <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH addresses</a>. <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH addresses</a> cannot be used with
the <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> created below. (Hashing each <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> is
unnecessary anyway—all the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> are protected by a hash when
the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> is hashed.) However, Umkoin Core uses <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a> as a
way to reference the underlying full (unhashed) <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> it knows
about, so we get the three new <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a> above in order to use their
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>.</p>

  <p>Recall from the Guide that the hashed <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> used in <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a>
obfuscate the full <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>, so you cannot give an <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> to another
person or device as part of creating a typical <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig output</a> or <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig
redeem script</a>. You must give them a full <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest validateaddress <span class="nv">$NEW_ADDRESS3</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"isvalid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"mk2QpYatsKicvFVuTAQLBryyccRXMUaGHP"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"76a9143172b5654f6683c8fb146959d347ce303cae4ca788ac"</span><span class="p">,</span><span class="w">
    </span><spa class="nt">"ismine"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nt">"iswatchonly"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nt">"isscript"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nt">"pubkey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"029e03a901b85534ff1e92c43c74431f7ce72046060fcf7a\
                95c37e148f78c77255"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"iscompressed"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nt">"account"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS3_PUBLIC_KEY</span><span class="o">=</span>029e03a901b85534ff1e92c43c74431f7ce720[...]</code></pre></figure>
  </div>

  <p>Use the <a href="/en/developer-reference.php#validateaddress" class="auto-link"><code>validateaddress</code> RPC</a> to display the full (unhashed) <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>
for one of the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a>. This is the information which will 
actually be included in the <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>. This is also the
information you would give another person or device as part of creating
a <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig output</a> or <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig redeem script</a>.</p>

  <p>We save the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> returned to a shell variable.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest createmultisig 2 <span class="s1">'''
    [
      "'</span><span class="nv">$NEW_ADDRESS1</span><span class="s1">'",
      "'</span><span class="nv">$NEW_ADDRESS2</span><span class="s1">'", 
      "'</span><span class="nv">$NEW_ADDRESS3_PUBLIC_KEY</span><span class="s1">'"
    ]'''</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"address"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"2N7NaqSKYQUeM8VNgBy8D9xQQbiA8yiJayk"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"redeemScript"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"522103310188e911026cf18c3ce274e0ebb5f95b00\
    7f230d8cb7d09879d96dbeab1aff210243930746e6ed6552e03359db521b\
    088134652905bd2d1541fa9124303a41e95621029e03a901b85534ff1e92\
    c43c74431f7ce72046060fcf7a95c37e148f78c7725553ae"</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">P2SH_ADDRESS</span><span class="o">=</span>2N7NaqSKYQUeM8VNgBy8D9xQQbiA8yiJayk
<span class="gp">&gt; </span><span class="nv">P2SH_REDEEM_SCRIPT</span><span class="o">=</span>522103310188e911026cf18c3ce274e0ebb5f95b007[...]</code></pre></figure>
  </div>

  <p>Use the <a href="/en/developer-reference.php#createmultisig" class="auto-link"><code>createmultisig</code> RPC</a> with two arguments, the number (<em>n</em>) of
<a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> required and a list of <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a> or <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>. Because
<a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH addresses</a> can’t be used in the <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> created by this
<a href="/en/developer-reference.php#remote-procedure-calls-rpcs" class="auto-link">RPC</a>, the only <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a> which can be provided are those belonging to a
<a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a> in the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>. In this case, we provide two <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">addresses</a> and
one <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public key</a>—all of which will be converted to <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> in the
<a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>.</p>

  <p>The <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a> is returned along with the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> which must be
provided when we spend <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> sent to the <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a>.</p>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Warning:</strong> You must not lose the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>, especially if you
don’t have a record of which <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> you used to create the <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH
multisig</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a>. You need the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> to spend any <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">umkoins</a> sent
to the <a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a>. If you lose the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its cond class="auto-link">redeem script</a>, you can recreate it
by running the same command above, with the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> listed in the
same order. However, if you lose both the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> and even one of
the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a>, you will never be able to spend <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> sent to that
<a href="/en/glossary/p2sh-address" title="A Umkoin payment address comprising a hashed script, allowing the spender to create a standard pubkey script that Pays To Script Hash (P2SH). The script can be almost any valid pubkey script." class="auto-link">P2SH address</a>.</p>

  <p>Neither the <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> nor the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> are stored in the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> when
you use <a href="/en/developer-reference.php#createmultisig" class="auto-link"><code>createmultisig</code></a>. To store them in the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>, use the
<a href="/en/developer-reference.php#addmultisigaddress" class="auto-link"><code>addmultisigaddress</code> RPC</a> instead. If you add an <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> to the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>,
you should also make a new backup.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest sendtoaddress <span class="nv">$P2SH_ADDRESS</span> 10.00
7278d7d030f042ebe633732b512bcb31fff14a697675a1fe1884db139876e175

<span class="gp">&gt; </span><span class="nv">UTXO_TXID</span><span class="o">=</span>7278d7d030f042ebe633732b512bcb31fff14a697675a1fe1884[...]</code></pre></figure>

  <p>Paying the <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig</a> <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> with Umkoin Core is as simple as
paying a more common <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH address</a>. Here we use the same command (but
different variable) we used in the Simple Spending subsection. As
before, this command automatically selects an <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a>, creates a <a href="/en/glossary/change-address" title="An output in a transaction which returns satoshis to the spender, thus preventing too much of the input value from going to transaction fees." class="auto-link">change
output</a> to a new one of our <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH addresses</a> if necessary, and pays a
<a href="/en/glossary/transaction-fee" title="The amount remaining when the value of all outputs in a transaction are subtracted from all inputs in a transaction; the fee is paid to the miner who includes that transaction in a block." class="auto-link">transaction fee</a> if necessary.</p>

  <p>We save that <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> to a shell variable as the <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">txid</a> of the <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> we plan to spend next.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest getrawtransaction <span class="nv">$UTXO_TXID</span> 1</code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"0100000001f0ede03d75050f20801d50358829ae02c058e8677\
             d2cc74df51f738285013c26010000006a47304402203c375959\
             2bf608ab79c01596c4a417f3110dd6eb776270337e575cdafc6\
             99af20220317ef140d596cc255a4067df8125db7f349ad94521\
             2e9264a87fa8d777151937012102a92913b70f9fb15a7ea5c42\
             df44637f0de26e2dad97d6d54957690b94cf2cd05ffffffff01\
             00ca9a3b0000000017a9149af61346ce0aa2dffcf697352b4b7\
             04c84dcbaff8700000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"7278d7d030f042ebe633732b512bcb31fff14a697675a1fe18\
              84db139876e175"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"hash"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"7278d7d030f042ebe633732b512bcb31fff14a697675a1fe1884db139876e175"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"size"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">189</span><span class="p">,</span><span class="w">
    </span><span class="nt">"vsize"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">189</span><span class="p">,</span><span class="w">
    </span><span class="nt">"version"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nt">"locktime"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nt">"vin"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"txid"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"263c018582731ff54dc72c7d67e858c002ae298835\
                      501d80200f05753de0edf0"</span><span class="p">,</span><span class="w">
            </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptSig"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"304402203c3759592bf608ab79c01596c4a417f\
                         3110dd6eb776270337e575cdafc699af2022031\
                         7ef140d596cc255a4067df8125db7f349ad9452\
                         12e9264a87fa8d77715193701
                         02a92913b70f9fb15a7ea5c42df44637f0de26e\
                         2dad97d6d54957690b94cf2cd05"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"47304402203c3759592bf608ab79c01596c4a41\
                         7f3110dd6eb776270337e575cdafc699af20220\
                         317ef140d596cc255a4067df8125db7f349ad94\
                         5212e9264a87fa8d777151937012102a92913b7\
                         0f9fb15a7ea5c42df44637f0de26e2dad97d6d5\
                         4957690b94cf2cd05"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nt">"sequence"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">4294967295</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nt">"vout"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nt">"value"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mf">10.00000000</span><span class="p">,</span><span class="w">
            </span><span class="nt">"n"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="nt">"scriptPubKey"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nt">"asm"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"OP_HASH160 9af61346ce0aa2dffcf697352b4b\
                704c84dcbaff OP_EQUAL"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"a9149af61346ce0aa2dffcf697352b4b704c84d\
                         cbaff87"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"reqSigs"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                </span><span class="nt">"type"</span><span class="w"> </span><span clp">:</span><span class="w"> </span><span class="s2">"scripthash"</span><span class="p">,</span><span class="w">
                </span><span class="nt">"addresses"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="s2">"2N7NaqSKYQUeM8VNgBy8D9xQQbiA8yiJayk"</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">UTXO_VOUT</span><span class="o">=</span>0
<span class="gp">&gt; </span><span class="nv">UTXO_OUTPUT_SCRIPT</span><span class="o">=</span>a9149af61346ce0aa2dffcf697352b4b704c84dcbaff87</code></pre></figure>
  </div>

  <p>We use the <a href="/en/developer-reference.php#getrawtransaction" class="auto-link"><code>getrawtransaction</code> RPC</a> with the optional second argument
(<em>true</em>) to get the decoded transaction we just created with
<a href="/en/developer-reference.php#sendtoaddress" class="auto-link"><code>sendtoaddress</code></a>. We choose one of the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">outputs</a> to be our <a href="/en/glossary/unspent-transaction-output" title="An Unspent Transaction Output (UTXO) that can be spent as an input in a new transaction." class="auto-link">UTXO</a> and get
its <a href="/en/developer-guide.php#term-output-index" title="The sequentially-numbered index of outputs in a single transaction starting from 0" class="auto-link">output index</a> number (vout) and <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> (<a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">scriptPubKey</a>).</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest getnewaddress
mxCNLtKxzgjg8yyNHeuFSXvxCvagkWdfGU

<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS4</span><span class="o">=</span>mxCNLtKxzgjg8yyNHeuFSXvxCvagkWdfGU</code></pre></figure>

  <p>We generate a new <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH address</a> to use in the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> we’re about to
create.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="c">## Outputs - inputs = transaction fee, so always double-check your math!</span>
<span class="gp">&gt; </span>umkoin-cli -regtest createrawtransaction <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO_TXID</span><span class="s1">'",
        "vout": '</span><span class="nv">$UTXO_VOUT</span><span class="s1">'
      }
   ]
   '''</span> <span class="s1">'''
   {
     "'</span><span class="nv">$NEW_ADDRESS4</span><span class="s1">'": 9.998
   }'''</span>

010000000175e1769813db8418fea17576694af1ff31cb2b512b7333e6eb42f0<span class="se">\</span>
30d0d778720000000000ffffffff01c0bc973b000000001976a914b6f64f5bf3<span class="se">\</span>
e38f25ead28817df7929c06fe847ee88ac00000000

<span class="gp">&gt; </span><span class="nv">RAW_TX</span><span class="o">=</span>010000000175e1769813db8418fea17576694af1ff31cb2b512b733[...]</code></pre></figure>

  <p>We generate the <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">raw transaction</a> the same way we did in the Simple <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">Raw
Transaction</a> subsection.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest dumpprivkey <span class="nv">$NEW_ADDRESS1</span>
cVinshabsALz5Wg4tGDiBuqEGq4i6WCKWXRQdM8RFxLbALvNSHw7
<span class="gp">&gt; </span>umkoin-cli -regtest dumpprivkey <span class="nv">$NEW_ADDRESS3</span>
cNmbnwwGzEghMMe1vBwH34DFHShEj5bcXD1QpFRPHgG9Mj1xc5hq

<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS1_PRIVATE_KEY</span><span class="o">=</span>cVinshabsALz5Wg4tGDiBuqEGq4i6WCKWXRQd[...]
<span class="gp">&gt; </span><span class="nv">NEW_ADDRESS3_PRIVATE_KEY</span><span class="o">=</span>cNmbnwwGzEghMMe1vBwH34DFHShEj5bcXD1Qp[...]</code></pre></figure>

  <p>We get the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> for two of the <a href="/en/glossary/public-key" title="The public portion of a keypair which can be used to verify signatures made with the private portion of the keypair." class="auto-link">public keys</a> we used to create the
transaction, the same way we got <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> in the Complex <a href="/en/glossary/serialized-transaction" title="Complete transactions in their binary format; often represented using hexadecimal. Sometimes called raw format because of the various Umkoin Core commands with &quot;raw&quot; in their names." class="auto-link">Raw
Transaction</a> subsection. Recall that we created a 2-of-3 <a href="/en/glossary/multisig" title="A pubkey script that provides *n* number of pubkeys and requires the corresponding signature script provide *m* minimum number signatures corresponding to the provided pubkeys." class="auto-link">multisig</a> <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a>,
so <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spnding satoshis previously sent to a public key." class="auto-link">signatures</a> from two <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> are needed.</p>

  <p><img src="/img/icons/icon_warning.svg" alt="Warning icon" />
 <strong>Reminder:</strong> Users should never manually manage <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private keys</a> on
<a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>. See the warning in the <a href="/en/developer-examples#complex-raw-transaction">complex raw transaction section</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest signrawtransaction <span class="nv">$RAW_TX</span> <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO_TXID</span><span class="s1">'", 
        "vout": '</span><span class="nv">$UTXO_VOUT</span><span class="s1">', 
        "scriptPubKey": "'</span><span class="nv">$UTXO_OUTPUT_SCRIPT</span><span class="s1">'", 
        "redeemScript": "'</span><span class="nv">$P2SH_REDEEM_SCRIPT</span><span class="s1">'"
      }
    ]
    '''</span> <span class="s1">'''
    [
      "'</span><span class="nv">$NEW_ADDRESS1_PRIVATE_KEY</span><span class="s1">'"
    ]'''</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"010000000175e1769813db8418fea17576694af1ff31cb2b512\
             b7333e6eb42f030d0d7787200000000b5004830450221008d5e\
             c57d362ff6ef6602e4e756ef1bdeee12bd5c5c72697ef1455b3\
             79c90531002202ef3ea04dfbeda043395e5bc701e4878c15baa\
             b9c6ba5808eb3d04c91f641a0c014c69522103310188e911026\
             cf18c3ce274e0ebb5f95b007f230d8cb7d09879d96dbeab1aff\
             210243930746e6ed6552e03359db521b088134652905bd2d154\
             1fa9124303a41e95621029e03a901b85534ff1e92c43c74431f\
             7ce72046060fcf7a95c37e148f78c7725553aeffffffff01c0b\
             c973b000000001976a914b6f64f5bf3e38f25ead28817df7929\
             c06fe847ee88ac00000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">PARTLY_SIGNED_RAW_TX</span><span class="o">=</span>010000000175e1769813db8418fea17576694af1f[...]</code></pre></figure>
  </div>

  <p>We make the first <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>. The <a href="/en/glossary/input" title="An input in a transaction which contains three fields: an outpoint, a signature script, and a sequence number. The outpoint references a previous output and the signature script allows spending it." class="auto-link">input</a> argument (JSON object) takes the
additional <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a> parameter so that it can append the <a href="/en/glossary/redeem-script" title="A script similar in function to a pubkey script. One copy of it is hashed to create a P2SH address (used in an actual pubkey script) and another copy is placed in the spending signature script to enforce its conditions." class="auto-link">redeem script</a>
to the <a href="/en/glossary/signature-script" title="Data generated by a spender which is almost always used as variables to satisfy a pubkey script. Signature Scripts are called scriptSig in code." class="auto-link">signature script</a> after the two <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a>.</p>

  <div class="multicode">
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest signrawtransaction <span class="nv">$PARTLY_SIGNED_RAW_TX</span> <span class="s1">'''
    [
      {
        "txid": "'</span><span class="nv">$UTXO_TXID</span><span class="s1">'",
        "vout": '</span><span class="nv">$UTXO_VOUT</span><span class="s1">',
        "scriptPubKey": "'</span><span class="nv">$UTXO_OUTPUT_SCRIPT</span><span class="s1">'", 
        "redeemScript": "'</span><span class="nv">$P2SH_REDEEM_SCRIPT</span><span class="s1">'"
      }
    ]
    '''</span> <span class="s1">'''
    [
      "'</span><span class="nv">$NEW_ADDRESS3_PRIVATE_KEY</span><span class="s1">'"
    ]'''</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-json" data-lang="json"><span class="p">{</span><span class="w">
    </span><span class="nt">"hex"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">"010000000175e1769813db8418fea17576694af1ff31cb2b512\
             b7333e6eb42f030d0d7787200000000fdfd0000483045022100\
             8d5ec57d362ff6ef6602e4e756ef1bdeee12bd5c5c72697ef14\
             55b379c90531002202ef3ea04dfbeda043395e5bc701e4878c1\
             5baab9c6ba5808eb3d04c91f641a0c0147304402200bd8c62b9\
             38e02094021e481b149fd5e366a212cb823187149799a68cfa7\
             652002203b52120c5cf25ceab5f0a6b5cdb8eca0fd2f386316c\
             9721177b75ddca82a4ae8014c69522103310188e911026cf18c\
             3ce274e0ebb5f95b007f230d8cb7d09879d96dbeab1aff21024\
             3930746e6ed6552e03359db521b088134652905bd2d1541fa91\
             24303a41e95621029e03a901b85534ff1e92c43c74431f7ce72\
             046060fcf7a95c37e148f78c7725553aeffffffff01c0bc973b\
             000000001976a914b6f64f5bf3e38f25ead28817df7929c06fe\
             847ee88ac00000000"</span><span class="p">,</span><span class="w">
    </span><span class="nt">"complete"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
</span><span class="p">}</span></code></pre></figure>
    <figure class="highlight"><pre><code class="language-bash" data-lang="bash"> 
<span class="gp">&gt; </span><span class="nv">SIGNED_RAW_TX</span><span class="o">=</span>010000000175e1769813db8418fea17576694af1ff31cb2b[...]</code></pre></figure>
  </div>

  <p>The <a href="/en/developer-reference.php#signrawtransaction" class="auto-link"><code>signrawtransaction</code></a> call used here is nearly identical to the one
used above. The only difference is the <a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> used. Now that the
two required <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signatures</a> have been provided, the transaction is marked as
complete.</p>

  <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="gp">&gt; </span>umkoin-cli -regtest sendrawtransaction <span class="nv">$SIGNED_RAW_TX</span>
430a4cee3a55efb04cbb8718713cab18dea7f2521039aa660ffb5aae14ff3f50</code></pre></figure>

  <p>We send the transaction spending the <a href="/en/glossary/p2sh-multisig" title="A P2SH output where the redeem script uses one of the multisig opcodes. Up until Umkoin Core 0.10.0, P2SH multisig scripts were standard transactions, but most other P2SH scripts were not." class="auto-link">P2SH multisig output</a> to the local
<a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, which accepts it.</p>

  <h2 id="payment-processing">Payment Processing</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <h3 id="payment-protocol">Payment Protocol</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>To request payment using the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a>, you use an extended (but
backwards-compatible) <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a>. For example:</p>

  <pre><code>umkoin:mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN\
?amount=0.10\
&amp;label=Example+Merchant\
&amp;message=Order+of+flowers+%26+chocolates\
&amp;r=https://example.com/pay.php/invoice%3Dda39a3ee
</code></pre>

  <p>The browser, QR code reader, or other program processing the URI opens
the spender’s Umkoin <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program on the URI. If the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program is
aware of the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment protocol</a>, it accesses the URL specified in the <a href="/en/developer-guide.php#term-r-parameter" title="The payment request parameter in a umkoin: URI" class="auto-link"><code>r</code></a>
parameter, which should provide it with a serialized <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>
served with the <a href="https://en.wikipedia.org/wiki/Internet_media_t</a> type <code>application/umkoin-paymentrequest</code>.</p>

  <p><strong>Resource:</strong> Gavin Andresen’s <a href="https://github.com/gavinandresen/paymentrequest/blob/master/php/demo_website/createpaymentrequest.php">Payment Request Generator</a> generates
custom example URIs and <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment requests</a> for use with <a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a>.</p>

  <h4 id="paymentrequest--paymentdetails">PaymentRequest &amp; PaymentDetails</h4>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>The <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" id="term-paymentrequest" class="term">PaymentRequest</a> is created with data structures built using
Google’s <a href="https://developers.google.com/protocol-buffers/" class="auto-link">Protocol Buffers</a>. <a href="https://github.com/umkoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a> describes these data
structures in the non-sequential way they’re defined in the <a href="/en/glossary/payment-protocol" title="The protocol defined in BIP70 (and other BIPs) which lets spenders get signed payment details from receivers." class="auto-link">payment
request</a> <a href="https://developers.google.com/protocol-buffers/" class="auto-link">protocol buffer</a> code, but the text below will describe them in
a more linear order using a simple (but functional) Python CGI
program. (For brevity and clarity, many normal CGI best practices are
not used in this program.)</p>

  <p>The full sequence of events is illustrated below, starting with the
spender clicking a <a href="/en/developer-guide.php#term-umkoin-uri" title="A URI which allows receivers to encode payment details so spenders don't have to manually enter addresses and other details" class="auto-link"><code>umkoin:</code> URI</a> or scanning a <code>umkoin:</code> QR code.</p>

  <p><img src="/img/dev/en-payment-protocol.svg" alt="BIP70 Payment Protocol" /></p>

  <p>For the script to use the <a href="https://developers.google.com/protocol-buffers/" class="auto-link">protocol buffer</a>, you will need a copy of
Google’s <a href="https://developers.google.com/protocol-buffers/" class="auto-link">Protocol Buffer</a> compiler (<code>protoc</code>), which is available in most
modern Linux package managers and <a href="https://developers.google.com/protocol-buffers/">directly from Google.</a> Non-Google
<a href="https://developers.google.com/protocol-buffers/" class="auto-link">protocol buffer</a> compilers are available for a variety of
programming languages. You will also need a copy of the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>
<a href="https://github.com/umkoin/umkoin/blob/master/src/qt/paymentrequest.proto">Protocol Buffer description</a> from the Umkoin Core source code.</p>

  <h5 id="initialization-code">Initialization Code</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>With the Python code generated by <code>protoc</code>, we can start our simple
CGI program.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">#!/usr/bin/env python</span>

<span class="c">## This is the code generated by protoc --python_out=./ paymentrequest.proto</span>
<span class="kn">from</span> <span class="nn">paymentrequest_pb2</span> <span class="kn">import</span> <span class="o">*</span>

<span class="c">## Load some functions</span>
<span class="kn">from</span> <span class="nn">time</span> <span class="kn">import</span> <span class="n">time</span>
<span class="kn">from</span> <span class="nn">sys</span> <span class="kn">import</span> <span class="n">stdout</span>
<span class="kn">from</span> <span class="nn">OpenSSL.crypto</span> <span class="kn">import</span> <span class="n">FILETYPE_PEM</span><span class="p">,</span> <span class="n">load_privatekey</span><span class="p">,</span> <span class="n">sign</span>

<span class="c">## Copy three of the classes created by protoc into objects we can use</span>
<span class="n">details</span> <span class="o">=</span> <span class="n">PaymentDetails</span><span class="p">()</span>
<span class="n">request</span> <span class="o">=</span> <span class="n">PaymentRequest</span><span class="p">()</span>
<span class="n">x509</span> <span class="o">=</span> <span class="n">X509Certificates</span><span class="p">()</span></code></pre></figure>

  <p>The startup code above is quite simple, requiring nothing but the epoch
(Unix date) time function, the standard out file descriptor, a few
functions from the OpenSSL library, and the data structures and
functions created by <code>protoc</code>.</p>

  <h5 id="configuration-code">Configuration Code</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Next, we’ll set configuration settings which will typically only change
when the receiver wants to do something differently. The code pushes a
few settings into the <code>request</code> (<a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>) and <code>details</code>
(<a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a>) objects. When we serialize them,
<a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" id="term-paymentdetails" class="term">PaymentDetails</a> will be contained
within the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## SSL ignature method</span>
<span class="n">request</span><span class="o">.</span><span class="n">pki_type</span> <span class="o">=</span> <span class="s">"x509+sha256"</span>  <span class="c">## Default: none</span>

<span class="c">## Mainnet or testnet?</span>
<span class="n">details</span><span class="o">.</span><span class="n">network</span> <span class="o">=</span> <span class="s">"test"</span>  <span class="c">## Default: main</span>

<span class="c">## Postback URL</span>
<span class="n">details</span><span class="o">.</span><span class="n">payment_url</span> <span class="o">=</span> <span class="s">"https://example.com/pay.py"</span>

<span class="c">## PaymentDetails version number</span>
<span class="n">request</span><span class="o">.</span><span class="n">payment_details_version</span> <span class="o">=</span> <span class="mi">1</span>  <span class="c">## Default: 1</span>

<span class="c">## Certificate chain</span>
<span class="n">x509</span><span class="o">.</span><span class="n">certificate</span><span class="o">.</span><span class="n">append</span><span class="p">(</span><span class="nb">file</span><span class="p">(</span><span class="s">"/etc/apache2/example.com-cert.der"</span><span class="p">,</span> <span class="s">"r"</span><span class="p">)</span><span class="o">.</span><span class="n">read</span><span class="p">())</span>
<span class="c">#x509.certificate.append(file("/some/intermediate/cert.der", "r").read())</span>

<span class="c">## Load private SSL key into memory for signing later</span>
<span class="n">priv_key</span> <span class="o">=</span> <span class="s">"/etc/apache2/example.com-key.pem"</span>
<span class="n">pw</span> <span class="o">=</span> <span class="s">"test"</span>  <span class="c">## Key password</span>
<span class="n">private_key</span> <span class="o">=</span> <span class="n">load_privatekey</span><span class="p">(</span><span class="n">FILETYPE_PEM</span><span class="p">,</span> <span class="nb">file</span><span class="p">(</span><span class="n">priv_key</span><span class="p">,</span> <span class="s">"r"</span><span class="p">)</span><span class="o">.</span><span class="n">read</span><span class="p">(),</span> <span class="n">pw</span><span class="p">)</span></code></pre></figure>

  <p>Each line is described below.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">request</span><span class="o">.</span><span class="n">pki_type</span> <span class="o">=</span> <span class="s">"x509+sha256"</span>  <span class="c">## Default: none</span></code></pre></figure>

  <p><a href="/en/developer-examples#term-pp-pki-type" title="The PKI field of a PaymentRequest which tells spenders how to validate this request as being from a specific recipient" class="auto-link"><code>pki_type</code></a>: (optional) tell the receiving <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program what <a href="/en/developer-examples#term-pki" title="Public Key Infrastructure; usually meant to indicate the X.509 certificate system used for HTTP Secure (https)." id="term-pki" class="term">Public-Key
Infrastructure</a> (<a href="/en/developer-examples#term-pki" title="Public Key Infrastructure; usually meant to indicate the X.509 certificate system used for HTTP Secure (https)." class="auto-link">PKI</a>) type you’re using to
cryptographically sign your <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> so that it can’t be modified
by a <a href="https://en.wikipedia.org/wiki/Man-in-the-middle_attack" class="auto-link">man-in-the-middle</a> attack.</p>

  <p>If you don’t want to sign the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>, you can choose a
<a href="/en/developer-examples#term-pp-pki-type" title="The PKI field of a PaymentRequest which tells spenders how to validate this request as being from a specific recipient" id="term-pp-pki-type" class="term"><code>pki_type</code></a> of <code>none</code>
(the default).</p>

  <p>If you do choose the sign the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>, you currently have two
options defined by <a href="https://github.com/umkoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a>: <code>x509+sha1</code> and <code>x509+sha256</code>. Both options
use the <a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> certificate system, the same system used for HTTP Secure
(HTTPS). To use either option, you will need a certificate signed by a
certificate authority or one of their intermediaries. (A self-signed
certificate will not work.)</p>

  <p>Each <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program may choose which certificate authorities to trust,
but it’s likely that they’ll trust whatever certificate authorities their
operating system trusts. If the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program doesn’t have a full
operating system, as might be the case for small hardware <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallets</a>, <a href="https://github.com/umkoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a>
suggests they use the <a href="https://www.mozilla.org/en-US/about/governance/policies/security-group/certs/">Mozilla Root Certificate Store</a>. In
general, if a certificate works in your web browser when you connect to
your webserver, it will work for your <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">network</span> <span class="o">=</span> <span class="s">"test"</span>  <span class="c">## Default: main</span></code></pre></figure>

  <p><code>network</code>: (optional) tell the spender’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program what Umkoin <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> you’re
using; <a href="https://github.com/umkoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a> defines “main” for <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a> (actual payments) and “test” for
<a href="/en/glossary/testnet" title="A global testing environment in which developers can obtain and spend satoshis that have no real-world value on a network that is very similar to the Umkoin mainnet." class="auto-link">testnet</a> (like <a href="/en/glossary/mainnet" title="The original and main network for Umkoin transactions, where satoshis have real economic value." class="auto-link">mainnet</a>, but fake <a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> are used). If the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>
program doesn’t run on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> you indicate, it will reject the
<a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">payment_url</span> <span class="o">=</span> <span class="s">"https://example.com/pay.py"</span></code></pre></figure>

  <p><code>payment_url</code>: (required) tell the spender’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program where to send the Payment
message (described later). This can be a static URL, as in this example,
or a variable URL such as <code>https://example.com/pay.py?invoice=123.</code>
It should usually be an HTTPS <a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> to prevent <a href="https://en.wikipedia.org/wiki/Man-in-the-middle_attack" class="auto-link">man-in-the-middle</a>
attacks from modifying the message.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">request</span><span class="o">.</span><span class="n">payment_details_version</span> <span class="o">=</span> <span class="mi">1</span>  <span class="c">## Default: 1</span></code></pre></figure>

  <p><code>payment_details_version</code>: (optional) tell the spender’s <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a> program what version of the
<a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> you’re using. As of this writing, the only version is
version 1.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## This is the pubkey/certificate corresponding to the private SSL key</span>
<span class="c">## that we'll use to sign:</span>
<span class="n">x509</span><span class="o">.</span><span class="n">certificate</span><span class="o">.</span><span class="n">append</span><span class="p">(</span><span class="nb">file</span><span class="p">(</span><span class="s">"/etc/apache2/example.com-cert.der"</span><span class="p">,</span> <span class="s">"r"</span><span class="p">)</span><span class="o">.</span><span class="n">read</span><span class="p">())</span></code></pre></figure>

  <p><code>x509certificates</code>: (required for signed <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a>) you must
provide the public SSL key/certificate corresponding to the private SSL
key you’llign the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>. The certificate must be in
ASN.1/<a href="https://en.wikipedia.org/wiki/X.690#DER_encoding" class="auto-link">DER format</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## If the pubkey/cert above didn't have the signature of a root</span>
<span class="c">## certificate authority, we'd then append the intermediate certificate</span>
<span class="c">## which signed it:</span>
<span class="c">#x509.certificate.append(file("/some/intermediate/cert.der", "r").read())</span></code></pre></figure>

  <p>You must also provide any <a href="/en/developer-examples#term-intermediate-certificate" title="A intermediate certificate authority certificate which helps connect a leaf (receiver) certificate to a root certificate authority" class="auto-link">intermediate certificates</a> necessary to link
your certificate to the <a href="/en/developer-examples#term-root-certificate" title="A certificate belonging to a certificate authority (CA)" class="auto-link">root certificate</a> of a certificate authority
trusted by the spender’s software, such as a certificate from the
Mozilla root store.</p>

  <p>The certificates must be provided in a specific order—the same order
used by Apache’s <code>SSLCertificateFile</code> directive and other server
software.  The figure below shows the <a href="/en/developer-examples#term-certificate-chain" title="A chain of certificates connecting a individual's leaf certificate to the certificate authority's root certificate" id="term-certificate-chain" class="term">certificate chain</a> of the
www.umkoin.org <a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> certificate and how each certificate (except the
<a href="/en/developer-examples#term-root-certificate" title="A certificate belonging to a certificate authority (CA)" class="auto-link">root certificate</a>) would be loaded into the <a href="/en/developer-examples#term-x509certificates" id="term-x509certificates" class="term">X509Certificates</a> <a href="https://developers.google.com/protocol-buffers/" class="auto-link">protocol
buffer</a> message.</p>

  <p><img src="/img/dev/en-cert-order.svg" alt="X509Certificates Loading Order" /></p>

  <p>To be specific, the first certificate provided must be the
<a href="https://en.wikipedia.org/wiki/X.509" class="auto-link">X.509</a> certificate corresponding to the private SSL key which will make the
signature, called the <a href="/en/developer-examples#term-leaf-certificate" title="The end-node in a certificate chain; in the payment protocol, it is the certificate belonging to the receiver of satoshis" id="term-leaf-certificate" class="term">leaf certificate</a>. Any <a href="/en/developer-examples#term-intermediate-certificate" title="A intermediate certificate authority certificate which helps connect a leaf (receiver) certificate to a root certificate authority" id="term-intermediate-certificate" class="term">intermediate
certificates</a> necessary to link that signed public SSL
key to the <a href="/en/developer-examples#term-root-certificate" title="A certificate belonging to a certificate authority (CA)" id="term-root-certificate" class="term">root
certificate</a> (the certificate authority) are attached separately, with each
certificate in <a href="https://en.wikipedia.org/wiki/X.690#DER_encoding" class="autolink">DER format</a> bearing the signature of the certificate that
follows it all the way to (but not including) the <a href="/en/developer-examples#term-root-certificate" title="A certificate belonging to a certificate authority (CA)" class="auto-link">root certificate</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">priv_key</span> <span class="o">=</span> <span class="s">"/etc/apache2/example.com-key.pem"</span>
<span class="n">pw</span> <span class="o">=</span> <span class="s">"test"</span>  <span class="c">## Key password</span>
<span class="n">private_key</span> <span class="o">=</span> <span class="n">load_privatekey</span><span class="p">(</span><span class="n">FILETYPE_PEM</span><span class="p">,</span> <span class="nb">file</span><span class="p">(</span><span class="n">priv_key</span><span class="p">,</span> <span class="s">"r"</span><span class="p">)</span><span class="o">.</span><span class="n">read</span><span class="p">(),</span> <span class="n">pw</span><span class="p">)</span></code></pre></figure>

  <p>(Required for signed <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a>) you will need a private SSL key in
a format your SSL library supports (<a href="https://en.wikipedia.org/wiki/X.690#DER_encoding" class="auto-link">DER format</a> is not required). In this
program, we’ll load it from a PEM file. (Embedding your passphrase in
your CGI code, as done here, is obviously a bad idea in real life.)</p>

  <p>The private SSL key will not be transmitted with your request. We’re
only loading it into memory here so we can use it to sign the request
later.</p>

  <h5 id="code-variables">Code Variables</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Now let’s look at the variables your CGI program will likely set for
each payment.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## Amount of the request</span>
<span class="n">amount</span> <span class="o">=</span> <span class="mi">10000000</span>  <span class="c">## In satoshis</span>

<span class="c">## P2PKH pubkey hash</span>
<span class="n">pubkey_hash</span> <span class="o">=</span> <span class="s">"2b14950b8d31620c6cc923c5408a701b1ec0a020"</span>
<span class="c">## P2PKH pubkey script entered as hex and converted to binary</span>
<span class="c"># OP_DUP OP_HASH160 &lt;push 20 bytes&gt; &lt;pubKey hash&gt; OP_EQUALVERIFY OP_CHECKSIG</span>
<span class="c">#   76       a9            14       &lt;pubKey hash&gt;        88          ac</span>
<span class="n">hex_script</span> <span class="o">=</span> <span class="s">"76"</span> <span class="o">+</span> <span class="s">"a9"</span> <span class="o">+</span> <span class="s">"14"</span> <span class="o">+</span> <span class="n">pubkey_hash</span> <span class="o">+</span> <span class="s">"88"</span> <span class="o">+</span> <span class="s">"ac"</span>
<span class="n">serialized_script</span> <span class="o">=</span> <span class="n">hex_script</span><span class="o">.</span><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span>

<span class="c">## Load amount and pubkey script into PaymentDetails</span>
<span class="n">details</span><span class="o">.</span><span class="n">outputs</span><span class="o">.</span><span class="n">add</span><span class="p">(</span><span class="n">amount</span> <span class="o">=</span> <span class="n">amount</span><span class="p">,</span> <span class="n">script</span> <span class="o">=</span> <span class="n">serialized_script</span><span class="p">)</span>

<span class="c">## Memo to display to the spender</span>
<span class="n">details</span><span class="o">.</span><span class="n">memo</span> <span class="o">=</span> <span class="s">"Flowers &amp; chocolates"</span>

<span class="c">## Data which should be returned to you with the payment</span>
<span class="n">details</span><span class="o">.</span><span class="n">merchant_data</span> <span class="o">=</span> <span class="s">"Invoice #123"</span></code></pre></figure>

  <p>Each line is described below.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">amount</span> <span class="o">=</span> <span class="mi">10000000</span>  <span class="c">## In satoshis (=100 mUMK)</span></code></pre></figure>

  <p><a href="/en/developer-examples#term-pp-amount" title="Part of the Output part of the PaymentDetails part of a payment protocol where receivers can specify the amount of satoshis they want paid to a particular pubkey script" class="auto-link"><code>amount</code></a>: (optional) the <a href="/en/developer-examples#term-pp-amount" title="Part of the Output part of the PaymentDetails part of a payment protocol where receivers can specify the amount of satoshis they want paid to a particular pubkey script" id="term-pp-amount" class="term">amount</a> you want the spender to pay. You’ll probably get
  this value from your shopping cart application or <a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a>-to-UMK exchange
  rate conversion tool. If you leave the amount blank, the <a href="/en/glossary/wallet" title="Software that stores private keys and monitors the block chain (sometimes as a client of a server that does the processing) to allow users to spend and receive satoshis." class="auto-link">wallet</a>
  program will prompt the spender how much to pay (which can be useful
  for donations).</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">pubkey_hash</span> <span class="o">=</span> <span class="s">"2b14950b8d31620c6cc923c5408a701b1ec0a020"</span>
<span class="c"># OP_DUP OP_HASH160 &lt;push 20 bytes&gt; &lt;pubKey hash&gt; OP_EQUALVERIFY OP_CHECKSIG</span>
<span class="c">#   76       a9            14       &lt;pubKey hash&gt;        88          ac</span>
<span class="n">hex_script</span> <span class="o">=</span> <span class="s">"76"</span> <span class="o">+</span> <span class="s">"a9"</span> <span class="o">+</span> <span class="s">"14"</span> <span class="o">+</span> <span class="n">pubkey_hash</span> <span class="o">+</span> <span class="s">"88"</span> <span class="o">+</span> <span class="s">"ac"</span>
<span class="n">serialized_script</span> <span class="o">=</span> <span class="n">hex_script</span><span class="o">.</span><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span></code></pre></figure>

  <p><a href="/en/developer-examples#term-pp-script" title="The script field of a PaymentDetails where the receiver tells the spender what pubkey scripts to pay" class="auto-link"><code>script</code></a>: (required) You must specify the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> you want the spender to
pay—any valid <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> is acceptable. In this example, we’ll request
payment to a <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH pubkey script</a>.</p>

  <p>First we get a <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">pubkey hash</a>. The hash above is the hash form of the
<a href="/en/glossary/address" title="A 20-byte hash formatted using base58check to produce either a P2PKH or P2SH Umkoin address. Currently the most common way users exchange payment information." class="auto-link">address</a> used in the URI examples throughout this section,
mjSk1Ny9spzU2fouzYgLqGUD8U41iR35QN.</p>

  <p>Next, we plug that hash into the standard <a href="/en/glossary/p2pkh-address" title="A Umkoin payment address comprising a hashed public key, allowing the spender to create a standard pubkey script that Pays To PubKey Hash (P2PKH)." class="auto-link">P2PKH pubkey script</a> using hex,
as illustrated by the code comments.</p>

  <p>Finally, we convert the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> from hex into its serialized form.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">outputs</span><span class="o">.</span><span class="n">add</span><span class="p">(</span><span class="n">amount</span> <span class="o">=</span> <span class="n">amount</span><span class="p">,</span> <span class="n">script</span> <span class="o">=</span> <span class="n">serialized_script</span><span class="p">)</span></code></pre></figure>

  <p><code>outputs</code>: (required) add the <a href="/en/glossary/pubkey-script" title="A script included in outputs which sets the conditions that must be fulfilled for those satoshis to be spent. Data for fulfilling the conditions can be provided in a signature script. Pubkey Scripts are called a scriptPubKey in code." class="auto-link">pubkey script</a> and (optional) amount to the
<a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> outputs array.</p>

  <p>It’s possible to specify multiple <a href="/en/developer-examples#term-pp-script" title="The script field of a PaymentDetails where the receiver tells the spender what pubkey scripts to pay" id="term-pp-script" class="term"><code>scripts</code></a> and <code>amounts</code> as part of a <a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" class="auto-link">merge
avoidance</a> strategy, described later in the <a href="/en/developer-guide.php#merge-avoidance">Merge Avoidance
subsection</a>. However, effective <a href="/en/developer-guide.php#term-merge-avoidance" title="A strategy for selecting which outputs to spend that avoids merging outputs with different histories that could leak private information" class="auto-link">merge avoidance</a> is not possible under
the base <a href="https://github.com/umkoin/bips/blob/master/bip-0070.mediawiki" class="auto-link">BIP70</a> rules in which the spender pays each <a href="/en/developer-examples#term-pp-script" title="The script field of a PaymentDetails where the receiver tells the spender what pubkey scripts to pay" class="auto-link"><code>script</code></a> the exact
amount specified by its paired <a href="/en/developer-examples#p-amount" title="Part of the Output part of the PaymentDetails part of a payment protocol where receivers can specify the amount of satoshis they want paid to a particular pubkey script" class="auto-link"><code>amount</code></a>. If the amounts are omitted from
all <a href="/en/developer-examples#term-pp-amount" title="Part of the Output part of the PaymentDetails part of a payment protocol where receivers can specify the amount of satoshis they want paid to a particular pubkey script" class="auto-link"><code>amount</code></a>/<a href="/en/developer-examples#term-pp-script" title="The script field of a PaymentDetails where the receiver tells the spender what pubkey scripts to pay" class="auto-link"><code>script</code></a> pairs, the spender will be prompted to choose an
amount to pay.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">memo</span> <span class="o">=</span> <span class="s">"Flowers &amp; chocolates"</span></code></pre></figure>

  <p><a href="/en/developer-examples#term-pp-memo" title="The memo fields of PaymentDetails, Payment, and PaymentACK which allow spenders and receivers to send each other memos" class="auto-link"><code>memo</code></a>: (optional) add a memo which will be displayed to the spender as
plain UTF-8 text. Embedded HTML or other markup will not be processed.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">merchant_data</span> <span class="o">=</span> <span class="s">"Invoice #123"</span></code></pre></figure>

  <p><a href="/en/developer-examples#term-pp-merchant-data" title="The merchant_data part of PaymentDetails and Payment which allows the receiver to send arbitrary data to the spender in PaymentDetails and receive it back in Payments" class="auto-link"><code>merchant_data</code></a>: (optional) add arbitrary data which should be sent back to the
receiver when the invoice is paid. You can use this to track your
invoices, although you can more reliably track payments by generating a
<a href="/en/developer-guide.php#term-unique-address" title="Address which are only used once to protect privacy and increase security" class="auto-link">unique address</a> for each payment and then tracking when it gets paid.</p>

  <p>The <a href="/en/developer-examples#term-pp-memo" title="The memo fields of PaymentDetails, Payment, and PaymentACK which allow spenders and receivers to send each other memos" id="term-pp-memo" class="term"><code>memo</code></a> field and the <a href="/en/developer-examples#term-pp-merchant-data" title="The merchant_data part of PaymentDetails and Payment which allows the receiver to send arbitrary data to the spender in PaymentDetails and receive it back in Payments" id="term-pp-merchant-data" class="term"><code>merchant_data</code></a> field can be arbitrarily long,
but if you make them too long, you’ll run into the 50,000 byte limit on
the entire <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>, which includes the often several kilobytes
given over to storing the <a href="/en/developer-examples#term-certificate-chain" title="A chain of certificates connecting a individual's leaf certificate to the certificate authority's root certificate" class="auto-link">certificate chain</a>. As will be described in a
later subsction, the <a href="/en/developer-examples#term-pp-memo" title="The memo fields of PaymentDetails, Payment, and PaymentACK which allow spenders and receivers to send each other memos" class="auto-link"><code>memo</code></a> field can be used by the spender after
payment as part of a cryptographically-proven <a href="/en/developer-guide.php#term-receipt" title="A cryptographically-verifiable receipt created using parts of a payment request and a confirmed transaction" class="auto-link">receipt</a>.</p>

  <h5 id="derivable-data">Derivable Data</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Next, let’s look at some information your CGI program can
automatically derive.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## Request creation time</span>
<span class="n">details</span><span class="o">.</span><span class="n">time</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="n">time</span><span class="p">())</span> <span class="c">## Current epoch (Unix) time</span>

<span class="c">## Request expiration time</span>
<span class="n">details</span><span class="o">.</span><span class="n">expires</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="n">time</span><span class="p">())</span> <span class="o">+</span> <span class="mi">60</span> <span class="o">*</span> <span class="mi">10</span>  <span class="c">## 10 minutes from now</span>

<span class="c">## PaymentDetails is complete; serialize it and store it in PaymentRequest</span>
<span class="n">request</span><span class="o">.</span><span class="n">serialized_payment_details</span> <span class="o">=</span> <span class="n">details</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">()</span>

<span class="c">## Serialized certificate chain</span>
<span class="n">request</span><span class="o">.</span><span class="n">pki_data</span> <span class="o">=</span> <span class="n">x509</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">()</span>

<span class="c">## Initialize signature field so we can sign the full PaymentRequest</span>
<span class="n">request</span><span class="o">.</span><span class="n">signature</span> <span class="o">=</span> <span class="s">""</span>

<span class="c">## Sign PaymentRequest</span>
<span class="n">request</span><span class="o">.</span><span class="n">signature</span> <span class="o">=</span> <span class="n">sign</span><span class="p">(</span><span class="n">private_key</span><span class="p">,</span> <span class="n">request</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">(),</span> <span class="s">"sha256"</span><span class="p">)</span></code></pre></figure>

  <p>Each line is described below.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">time</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="n">time</span><span class="p">())</span> <span class="c">## Current epoch (Unix) time</span></code></pre></figure>

  <p><code>time</code>: (required) <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a> must indicate when they were created
in number of seconds elapsed since 1970-01-01T00:00 UTC (<a href="https://en.wikipedia.org/wiki/Unix_time" class="auto-link">Unix
epoch time</a> format).</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">details</span><span class="o">.</span><span class="n">expires</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="n">time</span><span class="p">())</span> <span class="o">+</span> <span class="mi">60</span> <span class="o">*</span> <span class="mi">10</span>  <span class="c">## 10 minutes from now</span></code></pre></figure>

  <p><a href="/en/developer-examples#term-pp-expires" title="The expires field of a PaymentDetails where the receiver tells the spender when the PaymentDetails expires" class="auto-link"><code>expires</code></a>: (optional) the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> may also set an <a href="/en/developer-examples#term-pp-expires" title="The expires field of a PaymentDetails where the receiver tells the spender when the PaymentDetails expires" id="term-pp-expires" class="term"><code>expires</code></a> time after
which they’re no longer valid. You probably want to give receivers
the ability to configure the expiration time delta; here we used the
reasonable choice of 10 minutes. If this request is tied to an order
total based on a <a href="/en/developer-guide.php#term-fiat" title="National currencies such as the dollar or euro" class="auto-link">fiat</a>-to-<a href="/en/glossary/denominations" title="Denominations of Umkoin value, usually measured in fractions of a umkoin but sometimes measured in multiples of a satoshi. One umkoin equals 100,000,000 satoshis." class="auto-link">satoshis</a> exchange rate, you probably want to
base this on a delta from the time you got the exchange rate.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">request</span><span class="o">.</span><span class="n">serialized_payment_details</span> <span class="o">=</span> <span class="n">details</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">()</span></code></pre></figure>

  <p><code>serialized_payment_details</code>: (required) we’ve now set everything we need to create the
<a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a>, so we’ll use the SerializeToString function from the
<a href="https://developers.google.com/protocol-buffers/" class="auto-link">protocol buffer</a> code to store the <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a> in the appropriate
field of the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">request</span><span class="o">.</span><span class="n">pki_data</span> <span class="o">=</span> <span class="n">x509</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">()</span></code></pre></figure>

  <p><code>pki_data</code>: (required for signed <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a>) serialize the <a href="/en/developer-examples#term-certificate-chain" title="A chain of certificates connecting a individual's leaf certificate to the certificate authority's root certificate" class="auto-link">certificate chain</a>
<a href="/en/developer-examples#term-pp-pki-data" title="The pki_data field of a PaymentRequest which provides details such as certificates necessary to validate the request" id="term-pp-pki-data" class="term">PKI data</a> and store it in the
<a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a></p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">request</span><span class="o">.</span><span class="n">signature</span> <span class="o">=</span> <span class="s">""</span></code></pre></figure>

  <p>We’ve filled out everything in the <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> except the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a>,
but before we sign it, we have to initialize the <a href="/en/glossary/signature" title="A value related to a public key which could only have reasonably been created by someone who has the private key that created that public key. Used in Umkoin to authorize spending satoshis previously sent to a public key." class="auto-link">signature</a> field by
setting it to a zero-byte placeholder.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">request</span><span class="o">.</span><span class="n">signature</span> <span class="o">=</span> <span class="n">sign</span><span class="p">(</span><span class="n">private_key</span><span class="p">,</span> <span class="n">request</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">(),</span> <span class="s">"sha256"</span><span class="p">)</span></code></pre></figure>

  <p><code>signature</code>: (required for signed <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a>) now we
make the <a href="/en/developer-examples#term-ssl-signature" title="Signatures created and recognized by major SSL implementations such as OpenSSL" id="term-ssl-signature" class="term">signature</a> by
signing the completed and serialized <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a>. We’ll use the
<a href="/en/glossary/private-key" title="The private portion of a keypair which can create signatures that other people can verify using the public key." class="auto-link">private key</a> we stored in memory in the configuration section and the
same hashing formula we specified in <a href="/en/developer-examples#term-pp-pki-type" title="The PKI field of a PaymentRequest which tells spenders how to validate this request as being from a specific recipient" class="auto-link"><code>pki_type</code></a> (sha256 in this case)</p>

  <h5 id="output-code">Output Code</h5>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/payment_processing.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/payment_processing.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/payment_processing.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/payment_processing.md%0A%0A">Report Issue</a>


</div>

  <p>Now that we have <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the parotocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> all filled out, we can serialize it and
send it along with the HTTP <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">headers</a>, as shown in the code below.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="k">print</span> <span class="s">"Content-Type: application/umkoin-paymentrequest"</span>
<span class="k">print</span> <span class="s">"Content-Transfer-Encoding: binary"</span>
<span class="k">print</span> <span class="s">""</span></code></pre></figure>

  <p>(Required) <a href="https://github.com/umkoin/bips/blob/master/bip-0071.mediawiki" class="auto-link">BIP71</a> defines the content types for <a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequests</a>,
Payments, and PaymentACKs.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="nb">file</span><span class="o">.</span><span class="n">write</span><span class="p">(</span><span class="n">stdout</span><span class="p">,</span> <span class="n">request</span><span class="o">.</span><span class="n">SerializeToString</span><span class="p">())</span></code></pre></figure>

  <p><code>request</code>: (required) now, to finish, we just dump out the serialized
<a href="/en/developer-examples#term-paymentrequest" title="The PaymentRequest of the payment protocol which contains and allows signing of the PaymentDetails" class="auto-link">PaymentRequest</a> (which contains the serialized <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a>). The
serialized data is in binary, so we can’t use Python’s print()
because it would add an extraneous newline.</p>

  <p>The following screenshot shows how the authenticated <a href="/en/developer-examples#term-paymentdetails" title="The PaymentDetails of the payment protocol which allows the receiver to specify the payment details to the spender" class="auto-link">PaymentDetails</a>
created by the program above appears in the GUI from Umkoin Core 0.9.</p>

  <p><img src="/img/dev/en-UMKc-payment-request.png" alt="Umkoin Core Showing Validated Payment Request" /></p>

  <h2 id="p2p-network">P2P Network</h2>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/p2p_networking.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/p2p_networking.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/p2p_networking.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/p2p_networking.md%0A%0A">Report Issue</a>


</div>

  <h3 id="creating-a-bloom-filter">Creating A Bloom Filter</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/p2p_networking.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/p2p_networking.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/p2p_networking.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/p2p_networking.md%0A%0A">Report Issue</a>


</div>

  <p>In this section, we’ll use variable names that correspond to the field
names in the <a href="/en/developer-reference.php#filterclear" title="A P2P protocol message used to send a filter to a remote peer, requesting that they only send transactions which match the filter."><code>filterload</code> message documentation</a>.
Each code <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a> precedes the paragraph describing it.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">#!/usr/bin/env python</span>

<span class="n">BYTES_MAX</span> <span class="o">=</span> <span class="mi">36000</span>
<span class="n">FUNCS_MAX</span> <span class="o">=</span> <span class="mi">50</span>

<span class="n">nFlags</span> <span class="o">=</span> <span class="mi">0</span></code></pre></figure>

  <p>We start by setting some maximum values defined in <a href="https://github.com/umkoin/bips/blob/master/bip-0037.mediawiki" class="auto-link">BIP37</a>: the maximum
number of bytes allowed in a filter and the maximum number of hash
functions used to hash each piece of data. We also set nFlags to zero,
indicating we don’t want the remote <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> to update the filter for us.
(We won’t use nFlags again in the sample program, but real programs will
need to use it.)</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">n</span> <span class="o">=</span> <span class="mi">1</span>
<span class="n">p</span> <span class="o">=</span> <span class="mf">0.0001</span></code></pre></figure>

  <p>We define the number (n) of elements we plan to insert into the filter
and the false positive rate (p) we want to help protect our privacy. For
this example, we will set <em>n</em> to one element and <em>p</em> to a rate of
1-in-10,000 to produce a small and precise filter for illustration
purposes. In actual use, your filters will probably be much larger.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="kn">from</span> <span class="nn">math</span> <span class="kn">import</span> <span class="n">log</span>
<span class="n">nFilterBytes</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="nb">min</span><span class="p">((</span><span class="o">-</span><span class="mi">1</span> <span class="o">/</span> <span class="n">log</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span><span class="o">**</span><span class="mi">2</span> <span class="o">*</span> <span class="n">n</span> <span class="o">*</span> <span class="n">log</span><span class="p">(</span><span class="n">p</span><span class="p">))</span> <span class="o">/</span> <span class="mi">8</span><span class="p">,</span> <span class="n">BYTES_MAX</span><span class="p">))</span>
<span class="n">nHashFuncs</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="nb">min</span><span class="p">(</span><span class="n">nFilterBytes</span> <span class="o">*</span> <span class="mi">8</span> <span class="o">/</span> <span class="n">n</span> <span class="o">*</span> <span class="n">log</span><span class="p">(</span><span class="mi">2</span><span class="p">),</span> <span class="n">FUNCS_MAX</span><span class="p">))</span>

<span class="kn">from</span> <span class="nn">bitarray</span> <span class="kn">import</span> <span class="n">bitarray</span>  <span class="c"># from pypi.python.org/pypi/bitarray</span>
<span class="n">vData</span> <span class="o">=</span> <span class="n">nFilterBytes</span> <span class="o">*</span> <span class="mi">8</span> <span class="o">*</span> <span class="n">bitarray</span><span class="p">(</span><span class="s">'0'</span><span class="p">,</span> <span class="n">endian</span><span class="o">=</span><span class="s">"little"</span><span class="p">)</span></code></pre></figure>

  <p>Using the formula described in <a href="https://github.com/umkoin/bips/blob/master/bip-0037.mediawiki" class="auto-link">BIP37</a>, we calculate the ideal size of the
filter (in bytes) and the ideal number of hash functions to use. Both
are truncated down to the nearest whole number and both are also
constrained to the maximum values we defined earlier. The results of
this particular fixed computation are 2 filter bytes and 11 hash
functions. We then use <em>nFilterBytes</em> to create a little-endian bit
array of the appropriate size.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">nTweak</span> <span class="o">=</span> <span class="mi">0</span></code></pre></figure>

  <p>We also should choose a value for <em>nTweak</em>. In this case, we’ll simply
use zero.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="kn">import</span> <span class="nn">pyhash</span>  <span class="c"># from https://github.com/flier/pyfasthash</span>
<span class="n">murmur3</span> <span class="o">=</span> <span class="n">pyhash</span><span class="o">.</span><span class="n">murmur3_32</span><span class="p">()</span>

<span class="k">def</span> <span class="nf">bloom_hash</span><span class="p">(</span><span class="n">nHashNum</span><span class="p">,</span> <span class="n">data</span><span class="p">):</span>
    <span class="n">seed</span> <span class="o">=</span> <span class="p">(</span><span class="n">nHashNum</span> <span class="o">*</span> <span class="mh">0xfba4c795</span> <span class="o">+</span> <span class="n">nTweak</span><span class="p">)</span> <span class="o">&amp;</span> <span class="mh">0xffffffff</span>
    <span class="k">return</span><span class="p">(</span> <span class="n">murmur3</span><span class="p">(</span><span class="n">data</span><span class="p">,</span> <span class="n">seed</span><span class="o">=</span><span class="n">seed</span><span class="p">)</span> <span class="o">%</span> <span class="p">(</span><span class="n">nFilterBytes</span> <span class="o">*</span> <span class="mi">8</span><span class="p">)</span> <span class="p">)</span></code></pre></figure>

  <p>We setup our hash function template using the formula and 0xfba4c795
constant set in <a href="https://github.com/umkoin/bips/blob/master/bip-0037.mediawiki" class="auto-link">BIP37</a>. Note that we limit the size of the seed to four
bytes and that we’re returning the result of the hash modulo the size of
the filter in bits.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">data_to_hash</span> <span class="o">=</span> <span class="s">"019f5b01d4195ecbc9398fbf3c3b1fa9"</span> \
               <span class="o">+</span> <span class="s">"bb3183301d7a1fb3bd174fcfa40a2b65"</span>
<span class="n">data_to_hash</span> <span class="o">=</span> <span class="n">data_to_hash</span><span class="o">.</span><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span></code></pre></figure>

  <p>For the data to add to the filter, we’re adding a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a>. Note that the
<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> is in <a href="/en/glossary/internal-byte-order" title="The standard order in which hash digests are displayed as strings---the same format used in serialized blocks and transactions." class="auto-link">internal byte order</a>.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="k">print</span> <span class="s">"                             Filter (As Bits)"</span>
<span class="k">print</span> <span class="s">"nHashNum   nIndex   Filter   0123456789abcdef"</span>
<span class="k">print</span> <span class="s">"~~~~~~~~   ~~~~~~   ~~~~~~   ~~~~~~~~~~~~~~~~"</span>
<span class="k">for</span> <span class="n">nHashNum</span> <span class="ow">in</span> <span class="nb">range</span><slass="p">(</span><span class="n">nHashFuncs</span><span class="p">):</span>
    <span class="n">nIndex</span> <span class="o">=</span> <span class="n">bloom_hash</span><span class="p">(</span><span class="n">nHashNum</span><span class="p">,</span> <span class="n">data_to_hash</span><span class="p">)</span>

    <span class="c">## Set the bit at nIndex to 1</span>
    <span class="n">vData</span><span class="p">[</span><span class="n">nIndex</span><span class="p">]</span> <span class="o">=</span> <span class="bp">True</span>

    <span class="c">## Debug: print current state</span>
    <span class="k">print</span> <span class="s">'      {0:2}      {1:2}     {2}   {3}'</span><span class="o">.</span><span class="n">format</span><span class="p">(</span>
        <span class="n">nHashNum</span><span class="p">,</span>
        <span class="nb">hex</span><span class="p">(</span><span class="nb">int</span><span class="p">(</span><span class="n">nIndex</span><span class="p">)),</span>
        <span class="n">vData</span><span class="o">.</span><span class="n">tobytes</span><span class="p">()</span><span class="o">.</span><span class="n">encode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">),</span>
        <span class="n">vData</span><span class="o">.</span><span class="n">to01</span><span class="p">()</span>
    <span class="p">)</span>

<span class="k">print</span>
<span class="k">print</span> <span class="s">"Bloom filter:"</span><span class="p">,</span> <span class="n">vData</span><span class="o">.</span><span class="n">tobytes</span><span class="p">()</span><span class="o">.</span><span class="n">encode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span></code></pre></figure>

  <p>Now we use the hash function template to run a slightly different hash
function for <em>nHashFuncs</em> times. The result of each function being run
on the transaction is used as an index number: the bit at that index is
set to 1. We can see this in the printed debugging <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>:</p>

  <figure class="highlight"><pre><code class="language-text" data-lang="text">                             Filter (As Bits)
nHashNum   nIndex   Filter   0123456789abcdef
~~~~~~~   ~~~~~~   ~~~~~~   ~~~~~~~~~~~~~~~~
       0      0x7     8000   0000000100000000
       1      0x9     8002   0000000101000000
       2      0xa     8006   0000000101100000
       3      0x2     8406   0010000101100000
       4      0xb     840e   0010000101110000
       5      0x5     a40e   0010010101110000
       6      0x0     a50e   1010010101110000
       7      0x8     a50f   1010010111110000
       8      0x5     a50f   1010010111110000
       9      0x8     a50f   1010010111110000
      10      0x4     b50f   1010110111110000

Bloom filter: b50f</code></pre></figure>

  <p>Notice that in iterations 8 and 9, the filter did not change because the
corresponding bit was already set in a previous iteration (5 and 7,
respectively). This is a normal part of <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> operation.</p>

  <p>We only added one element to the filter above, but we could repeat the
process with additional elements and continue to add them to the same
filter. (To maintain the same false-positive rate, you would need a
larger filter size as computed earlier.)</p>

  <p>Note: for a more optimized Python implementation with fewer external
dependencies, see <a href="https://github.com/petertodd/python-umkoinlib">python-umkoinlib’s</a> <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a>
module which is based directly on Umkoin Core’s C++ implementation.</p>

  <p>Using the <a href="/en/developer-reference.php#filterclear" title="A P2P protocol message used to send a filter to a remote peer, requesting that they only send transactions which match the filter." class="auto-link"><code>filterload</code> message</a> format, the complete filter created above 
would be the binary form of the annotated hexdump shown below:</p>

  <figure class="highlight"><pre><code class="language-text" data-lang="text">02 ......... Filter bytes: 2
b50f ....... Filter: 1010 1101 1111 0000
0b000000 ... nHashFuncs: 11
00000000 ... nTweak: 0/none
00 ......... nFlags: BLOOM_UPDATE_NONE</code></pre></figure>

  <h3 id="evaluating-a-bloom-filter">Evaluating A Bloom Filter</h3>
  <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/p2p_networking.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/p2p_networking.md">Edit</a>
| <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/p2p_networking.md">History</a>
| <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/p2p_networking.md%0A%0A">Report Issue</a>


</div>

  <p>Using a <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> to find matching data is nearly identical to
constructing a <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a>—except that at each step we check to see
if the calculated index bit is set in the existing filter.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">vData</span> <span class="o">=</span> <span class="n">bitarray</span><span class="p">(</span><span class="n">endian</span><span class="o">=</span><span class="s">'little'</span><span class="p">)</span>
<span class="n">vData</span><span class="o">.</span><span class="n">frombytes</span><span class="p">(</span><span class="s">"b50f"</span><span class="o">.</span><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">))</span>
<span class="n">nHashFuncs</span> <span class="o">=</span> <span class="mi">11</span>
<span class="n">nTweak</span> <span class="o">=</span> <span class="mi">0</span>
<span class="n">nFlags</span> <span class="o">=</span> <span class="mi">0</span></code></pre></figure>

  <p>Using the <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> created above, we import its various parameters.
Note, as indicated in the section above, we won’t actually use <em>nFlags</em>
to update the filter.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="k">def</span> <span class="nf">contains</span><span class="p">(</span><span class="n">nHashFuncs</span><span class="p">,</span> <span class="n">data_to_hash</span><span class="p">):</span>
    <span class="k">for</span> <span class="n">nHashNum</span> <span class="ow">in</span> <span class="nb">range</span><span class="p">(</span><span class="n">nHashFuncs</span><span class="p">):</span>
        <span class="c">## bloom_hash as defined in previous section</span>
        <span class="n">nIndex</span> <span class="o">=</span> <span class="n">bloom_hash</span><span class="p">(</span><span class="n">nHashNum</span><span class="p">,</span> <span class="n">data_to_hash</span><span class="p">)</span>

        <span class="k">if</span> <span class="n">vData</span><span class="p">[</span><span class="n">nIndex</span><span class="p">]</span> <span class="o">!=</span <span class="bp">True</span><span class="p">:</span>
            <span class="k">print</span> <span class="s">"MATCH FAILURE: Index {0} not set in {1}"</span><span class="o">.</span><span class="n">format</span><span class="p">(</span>
                <span class="nb">hex</span><span class="p">(</span><span class="nb">int</span><span class="p">(</span><span class="n">nIndex</span><span class="p">)),</span>
                <span class="n">vData</span><span class="o">.</span><span class="n">to01</span><span class="p">()</span>
            <span class="p">)</span>
            <span class="k">return</span> <span class="bp">False</span></code></pre></figure>

  <p>We define a function to check an element against the provided filter.
When checking whether the filter might contain an element, we test to
see whether a particular bit in the filter is already set to 1 (if it
isn’t, the match fails).</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## Test 1: Same TXID as previously added to filter</span>
<span class="n">data_to_hash</span> <span class="o">=</span> <span class="s">"019f5b01d4195ecbc9398fbf3c3b1fa9"</span> \
               <span class="o">+</span> <span class="s">"bb3183301d7a1fb3bd174fcfa40a2b65"</span>
<span class="n">data_to_hash</span> <span class="o">=</span> <span class="n">data_to_hash</span><span class="o">.</span><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span>
<span class="n">contains</span><span class="p">(</span><span class="n">nHashFuncs</span><span class="p">,</span> <span class="n">data_to_hash</span><span class="p">)</span></code></pre></figure>

  <p>Testing the filter against the data element we previously added, we get
no <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> (indicating a possible match). Recall that <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filters</a> have
a zero false negative rate—so they should always match the inserted
elements.</p>

  <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## Test 2: Arbitrary string</span>
<span class="n">data_to_hash</span> <span class="o">=</span> <span class="s">"1/10,000 chance this ASCII string will match"</span>
<span class="n">contains</span><span class="p">(</span><span class="n">nHashFuncs</span><span class="p">,</span> <span class="n">data_to_hash</span><span class="p">)</span></code></pre></figure>

      <p>Testing the filter against an arbitrary element, we get the failure <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> below. Note: we created the filter with a 1-in-10,000 false positive rate (which was rounded up somewhat when we truncated), so it was possible this arbitrary string would’ve matched the filter anyway. It is not possible to set a <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> to a false positive rate of zero, so your program will always have to deal with false positives. The <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a> below shows us that one of the hash functions returned an index number of 0 but that bit wasn’t set in the filter, causing the match failure:</p>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">MATCH FAILURE: Index 0x6 not set in 1010110111110000</code></pre></figure>

      <h3 id="retrieving-a-merkleblock">Retrieving A MerkleBlock</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/p2p_networking.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/p2p_networking.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/p2p_networking.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/p2p_networking.md%0A%0A">Report Issue</a>
      </div>
      <p>For the <a href="/en/developer-reference.php#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a> documentation on the reference page, an actual <a href="/en/glossary/merkle-block.php" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a> was retrieved from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> and manually processed. This section walks through each step of the process, demonstrating basic <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> communication and <a href="/en/glossary/merkle-block.php" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a> processing.</p>
      <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">#!/usr/bin/env python</span>

    <span class="kn">from</span> <span class="nn">time</span> <span class="kn">import</span> <span class="n">sleep</span>
    <span class="kn">from</span> <span class="nn">hashlib</span> <span class="kn">import</span> <span class="n">sha256</span>
    <span class="kn">import</span> <span class="nn">struct</span>
    <span class="kn">import</span> <span class="nn">sys</span>

    <span class="n">network_string</span> <span class="o">=</span> <span class="s">"f9beb4d9"</span><span class="o">.</span><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span>  <span class="c"># Mainnet</span>

    <span class="k">def</span> <span class="nf">send</span><span class="p">(</span><span class="n">msg</span><span class="p">,</span><span class="n">payload</span><span class="p">):</span>
    <span class="c">## Command is ASCII text, null padded to 12 bytes</span>
    <span class="n">command</span> <span class="o">=</span> <span class="n">msg</span> <span class="o">+</span> <span class="p">(</span> <span class="p">(</span> <span class="mi">12</span> <span class="o">-</span> <span class="nb">len</span><span class="p">(</span><span class="n">msg</span><span class="p">)</span> <span class="p">)</span> <span class="o">*</span> <span class="s">"</span><span class="se">\00</span><span class="s">"</span> <span class="p">)</span>

    <span class="c">## Payload length is a uint32_t</span>
    <span class="n">payload_raw</span> <span class="o">=</span> <span class="n">payload</span><span class="o">.</spa><span class="n">decode</span><span class="p">(</span><span class="s">"hex"</span><span class="p">)</span>
    <span class="n">payload_len</span> <span class="o">=</span> <span class="n">struct</span><span class="o">.</span><span class="n">pack</span><span class="p">(</span><span class="s">"I"</span><span class="p">,</span> <span class="nb">len</span><span class="p">(</span><span class="n">payload_raw</span><span class="p">))</span>

    <span class="c">## Checksum is first 4 bytes of SHA256(SHA256(&lt;payload&gt;))</span>
    <span class="n">checksum</span> <span class="o">=</span> <span class="n">sha256</span><span class="p">(</span><span class="n">sha256</span><span class="p">(</span><span class="n">payload_raw</span><span class="p">)</span><span class="o">.</span><span class="n">digest</span><span class="p">())</span><span class="o">.</span><span class="n">digest</span><span class="p">()[:</span><span class="mi">4</span><span class="p">]</span>

    <span class="n">sys</span><span class="o">.</span><span class="n">stdout</span><span class="o">.</span><span class="n">write</span><span class="p">(</span>
        <span class="n">network_string</span>
        <span class="o">+</span> <span class="n">command</span>
        <span class="o">+</span> <span class="n">payload_len</span>
        <span class="o">+</span> <span class="n">checksum</span>
        <span class="o">+</span> <span class="n">payload_raw</span>
    <span class="p">)</span>
    <span class="n">sys</span><span class="o">.</span><span class="n">stdout</span><span class="o">.</span><span class="n">flush</span><span class="p">()</span></code></pre></figure>
    <p>To connect to the P2P <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>, the trivial Python function above was developed to compute <a href="/en/glossary/message-header" title="The four header fields prefixed to all messages on the Umkoin P2P network." class="auto-link">message headers</a> and send payloads decoded from hex.</p>
      <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="c">## Create a version message</span>
      <span class="n">send</span><span class="p">(</span><span class="s">"version"</span><span class="p">,</span>
      <span class="s">"71110100"</span> <span class="c"># ........................ Protocol Version: 70001</span>
      <span class="o">+</span> <span class="s">"0000000000000000"</span> <span class="c"># ................ Services: Headers Only (SPV)</span>
      <span class="o">+</span> <span class="s">"c6925e5400000000"</span> <span class="c"># ................ Time: 1415484102</span>
      <span class="o">+</span> <span class="s">"00000000000000000000000000000000"</span>
      <span class="o">+</span> <span class="s">"0000ffff7f000001208d"</span> <span class="c"># ............ Receiver IP Address/Port</span>
      <span class="o">+</span> <span class="s">"00000000000000000000000000000000"</span>
      <span class="o">+</span> <span class="s">"0000ffff7f000001208d"</span> <span class="c"># ............ Sender IP Address/Port</span>
      <span class="o">+</span> <span class="s">"0000000000000000"</span> <span class="c"># ................ Nonce (not used here)</span>
      <span class="o">+</span> <span class="s">"1b"</span> <span class="c"># .............................. Bytes in version string</span>
      <span class="o">+</span> <span class="s">"2f426974636f696e2e6f726720457861"</span>
      <span class="o">+</span> <span class="s">"6d706c653a302e392e332f"</span> <span class="c"># .......... Version string</span>
      <span class="o">+</span> <span class="s">"93050500"</span> <span class="c"># ........................ Starting block height: 329107</span>
      <span class="o">+</span> <span class="s">"00"</span> <span class="c"># .............................. Relay transactions: false</span>
      <span class="p">)</span></code></pre></figure>
      <p><a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">Peers</a> on the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a> will not accept any requests until you send them a <a href="/en/developer-reference.php#version" title="A P2P network message sent at the begining of a connection to allow protocol version negotiation" class="auto-link"><code>version</code> message</a>. The receiving <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> will reply with their <a href="/en/developer-reference.php#version" title="A P2P network message sent at the begining of a connection to allow protocol version negotiation" class="auto-link"><code>version</code> message</a> and a <a href="/en/developer-reference.php#verack" title="A P2P network message sent in reply to a version message to confirm a connection has been established" class="auto-link"><code>verack</code> message</a>.</p>
      <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">sleep</span><span class="p">(</span><span class="mi">1</span><span class="p">)</span>
      <span class="n">send</span><span class="p">(</span><span class="s">"verack"</span><span class="p">,</span> <span class="s">""</span><span class="p">)</span></code></pre></figure>
      <p>We’re not going to validate their <a href="/en/developer-reference.php#version" title="A P2P network message sent at the begining of a connection to allow protocol version negotiation" class="auto-link"><code>version</code> message</a> with this simple script, but we will sleep a short bit and send back our own <a href="/en/developer-reference.php#verack" title="A P2P network message sent in reply to a version message to confirm a connection has been established" class="auto-link"><code>verack</code> message</a> as if we had accepted their <a href="/en/developer-reference.php#version" title="A P2P network message sent at the begining of a connection to allow protocol version negotiation" class="auto-link"><code>version</code> message</a>.</p>
      <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">send</span><span class="p">(</span><span class="s">"filterload"</span><span class="p">,</span> 
      <span class="s">"02"</span>  <span class="c"># ........ Filter bytes: 2</span>
      <span class="o">+</span> <span class="s">"b50f"</span> <span class="c"># ....... Filter: 1010 1101 1111 0000</span>
      <span class="o">+</span> <span class="s">"0b000000"</span> <span class="c"># ... nHashFuncs: 11</span>
      <span class="o">+</span> <span class="s">"00000000"</span> <span class="c"># ... nTweak: 0/none</span>
      <span class="o">+</span> <span class="s">"00"</span> <span class="c"># ......... nFlags: BLOOM_UPDATE_NONE</span>
      <span class="p">)</span></code></pre></figure>
      <p>We set a <a href="/en/glossary/bloom-filter.php" title="A filter used primarily by SPV clients to request only matching transactions and merkle blocks from full nodes." class="auto-link">bloom filter</a> with the <a href="/en/developer-reference.php#filterclear" title="A P2P protocol message used to send a filter to a remote peer, requesting that they only send transactions which match the filter." class="auto-link"><code>filterload</code> message</a>. This filter is described in the two preceeding sections.</p>
      <figure class="highlight"><pre><code class="language-python" data-lang="python"><span class="n">send</span><span class="p">(</span><span class="s">"getdata"</span><span class="p">,</span>
      <span class="s">"01"</span> <span class="c"># ................................. Number of inventories: 1</span>
      <span class="o">+</span> <span class="s">"03000000"</span> <span class="c"># ........................... Inventory type: filtered block</span>
      <span class="o">+</span> <span class="s">"a4deb66c0d726b0aefb03ed51be407fb"</span>
      <span class="o">+</span> <span class="s">"ad7331c6e8f9eef231b7000000000000"</span> <span class="c"># ... Block header hash</span>
      <span class="p">)</span></code></pre></figure>

      <p>We request a <a href="/en/glossary/merkle-block.php" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a> for transactions matching our filter, completing our script.</p>
      <p>To run the script, we simply pipe it to the Unix <a href="https://en.wikipedia.org/wiki/Netcat"><code>netcat</code> command</a> or one of its many clones, one of which is available for practically any platform. For example, with the original netcat and using hexdump (<code>hd</code>) to display the <a href="/en/glossary/output.php" title="An output in a transaction which contains two fields: a value field for transferring zero or more satoshis and a pubkey script for indicating what conditions must be fulfilled for those satoshis to be further spent." class="auto-link">output</a>:</p>
      <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="c">## Connect to the Umkoin Core peer running on localhost</span>
python get-merkle.py | nc localhost 6333 | hd</code></pre></figure>
      <p>Part of the response is shown in the section below.</p>

      <h3 id="parsing-a-merkleblock">Parsing A MerkleBlock</h3>
      <div class="subhead-links sourcefile" data-sourcefile="_data/devdocs/en/examples/p2p_networking.md"><a href="https://github.com/umkoin/umkoin.org/edit/master/_data/devdocs/en/examples/p2p_networking.md">Edit</a>
        | <a href="https://github.com/umkoin/umkoin.org/commits/master/_data/devdocs/en/examples/p2p_networking.md">History</a>
        | <a href="https://github.com/umkoin/umkoin.org/issues/new?body=Source%20File%3A%20_data/devdocs/en/examples/p2p_networking.md%0A%0A">Report Issue</a>
      </div>
      <p>In the section above, we retrieved a <a href="/en/glossary/merkle-block.php" title="A partial merkle tree connecting transactions matching a bloom filter to the merkle root of a block." class="auto-link">merkle block</a> from the <a href="/en/developer-guide.php#term-network" title="The Umkoin P2P network which broadcasts transactions and blocks" class="auto-link">network</a>; now we will parse it. Most of the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">block header</a> has been omitted. For a more complete hexdump, see the example in the <a href="/en/developer-reference.php#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs"><code>merkleblock</code> message section</a>.</p>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">7f16c5962e8bd963659c793ce370d95f
093bc7e367117b3c30c1f8fdd0d97287 ... Merkle root

07000000 ........................... Transaction count: 7
04 ................................. Hash count: 4

3612262624047ee87660be1a707519a4
43b1c1ce3d248cbfc6c15870f6c5daa2 ... Hash #1
019f5b01d4195ecbc9398fbf3c3b1fa9
bb3183301d7a1fb3bd174fcfa40a2b65 ... Hash #2
41ed70551dd7e841883ab8f0b16bf041
76b7d1480e4f0af9f3d4c3595768d068 ... Hash #3
20d2a7bc994987302e5b1ac80fc425fe
25f8b63169ea78e68fbaaefa59379bbf ... Hash #4

01 ................................. Flag bytes: 1
1d ................................. Flags: 1 0 1 1 1 0 0 0</code></pre></figure>

      <p>We parse the above <a href="/en/developer-reference.php#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a> using the following instructions. Each illustration is described in the paragraph below it.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-001.svg" alt="Parsing A MerkleBlock" /></p>
      <p>We start by building the structure of a <a href="/en/glossary/merkle-tree" title="A tree constructed by hashing paired data (the leaves), then pairing and hashing the results until a single hash remains, the merkle root. In Umkoin, the leaves are almost always transactions from a single block." class="auto-link">merk/a> based on the number of transactions in the <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">block</a>.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-002.svg" alt="Parsing A MerkleBlock" /></p>
      <p>The first flag is a 1 and the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> is (as always) a non-<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, so we will need to compute the hash later based on this <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> children. Accordingly, we descend into the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root’s</a> left child and look at the next flag for instructions.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-003.svg" alt="Parsing A MerkleBlock" /></p>
      <p>The next flag in the example is a 0 and this is also a non-<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, so we apply the first hash from the <a href="/en/developer-reference.php#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a> to this <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. We also don’t process any child <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a>—according to the <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">peer</a> which created the <a href="/en/developer-reference.php#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a>, none of those <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> will lead to <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXIDs</a> of transactions that match our filter, so we don’t need them. We go back up to the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> and then descend into its right child and look at the next (third) flag for instructions.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-004.svg" alt="Parsing A MerkleBlock" /></p>
      <p>The third flag in the example is another 1 on another non-<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, so we descend into its left child.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-005.svg" alt="Parsing A MerkleBlock" /></p>
      <p>The fourth flag is also a 1 on another non-<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>, so we descend again—we will always continue descending until we reach a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> or a non-<a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> with a 0 flag (or we finish filling out the tree).</p>
      <p><img src="/img/dev/en-merkleblock-parsing-006.svg" alt="Parsing A MerkleBlock" /></p>
      <p>Finally, on the fifth flag in the example (a 1), we reach a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a> <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a>. The 1 flag indicates this <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID’s</a> transaction matches our filter and that we should take the next (second) hash and use it as this <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a>.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-007.svg" alt="Parsing A MerkleBlock" /></p>
      <p>The sixth flag also applies to a <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a>, but it’s a 0 flag, so this <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID’s</a> transaction doesn’t match our filter; still, we take the next (third) hash and use it as this <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node’s</a> <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXID</a>.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-008.svg" alt="Parsing A MerkleBlock" /></p>
      <p>We now have enough information to compute the hash for the fourth <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> we encountered—it’s the hash of the concatenated hashes of the two <a href="/en/glossary/txid.php" title="An identifier used to uniquely identify a particular transaction; specifically, the sha256d hash of the transaction." class="auto-link">TXIDs</a> we filled out.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-009.svg" alt="Parsing A MerkleBlock" /></p>
      <p>Moving to the right child of the third <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">node</a> we encountered, we fill it out using the seventh flag and final hash—and discover there are no more child <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> to process.</p>
      <p><img src="/img/dev/en-merkleblock-parsing-011.svg" alt="Parsing A MerkleBlock" /></p>
      <p>We hash as appropriate to fill out the tree. Note that the eighth flag is not used—this is acceptable as it was required to pad out a flag byte.</p>
      <p>The final steps would be to ensure the computed <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> is identical to the <a href="/en/glossary/merkle-root.php" title="The root node of a merkle tree, a descendant of all the hashed pairs in the tree. Block headers must include a valid merkle root descended from all transactions in that block." class="auto-link">merkle root</a> in the <a href="/en/glossary/block-header.php" title="An 80-byte header belonging to a single block which is hashed repeatedly to create proof of work." class="auto-link">header</a> and check the other steps of the parsing checklist in the <a href="/en/developer-reference.php#merkleblock" title="A P2P protocol message used to request a filtered block useful for SPV proofs" class="auto-link"><code>merkleblock</code> message</a> section.</p>

    </div>

  </div>

</div>


<script type="text/javascript">
  fallbackSVG();
  addAnchorLinks();
  trackOutgoingLinks();
</script>


<?php
include 'page_footer.php';
?>


<script src="/js/jquery/jquery-1.11.2.min.js"></script>
<script src="/js/jquery/jquery-ui.min.js"></script>
<script src="/js/devsearch.js"></script>
<script>updateToc();</script>


</body>
</html>
