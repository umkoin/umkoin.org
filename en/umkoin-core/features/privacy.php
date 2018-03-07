<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Privacy - Umkoin Core Features</title>

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
    Privacy
  </div>

  <div id="content" class="content">

    <div class="one-column">

      <h1 class="not-displayed" id="umkoin-cores-excellent-privacy">Umkoin Core’s Excellent Privacy</h1>
      <p><img src="/img/umkoin-core/slider-privacy.svg" alt="Excellent privacy" /></p>

      <?php include '../callout.php'; ?>

<blockquote>
  <p>What if every time you spent or received cash, all the transaction
details were published to your Twitter or Facebook feed for all your
friends to see? You probably wouldn’t want to use cash any more.</p>
</blockquote>

<p>Every confirmed Umkoin transaction is published to the block chain
where anyone can see it. So <strong>why do people still use Umkoin?</strong> And why
do many of them believe that Umkoin is a private way of sending money?</p>

<p>One reason is that Umkoin Core and some other Umkoin software tries to
avoid associating your real-world identity with the transactions you
make. The difference looks like this:</p>

<p><img src="/img/umkoin-core/privacy-difference.svg" alt="Privacy difference: pseudonymous transactions" /></p>

<p>The second type of transaction (a pseudonymous transaction) only provides
practical privacy if nobody can figure out that “5a35b” is really Alice.
It’s up to your wallet to prevent anyone from making that connection.
See below for how Umkoin Core’s privacy compares to other wallets.</p>

<h2 id="no-sign-up-required">No Sign-Up Required</h2>

<p>Third-party Umkoin services can both increase and decrease your
privacy. They can increase it by mixing your transactions with those of
other users; they can decrease it by tracking your activity and directly
associating it with your real name or other identifying information.</p>

<p class="center service-choose">
<a>Click an entry below to show it:</a>


  

  
    <button class="js showcolumn" id="umkoin_go">BitGo</button>
  

  
    <button class="js showcolumn" id="greenaddress">GreenAddress</button>
  

</p>

<table class="privacy-comparison">

  <tr>
  </tr>
  <tr>
    <th></th>
        <th class="umkoin_core default-show">Umkoin Core</th>
        <th class="umkoin_go not-displayed">BitGo</th>
        <th class="greenaddress not-displayed">GreenAddress</th>
  </tr>

  <tr>
    <td>Your real name</td>
        <td class="bggreen umkoin_core default-show"></td>
        <td class="bggreen umkoin_go not-displayed"></td>
        <td class="bggreen greenaddress not-displayed"></td>
  </tr>

  <tr>
    <td>Your umkoin balance</td>
        <td class="bggreen umkoin_core default-show"></td>
        <td class="bgred umkoin_go not-displayed"></td>
        <td class="bgred greenaddress not-displayed"></td>
  </tr>
  <tr>
    <td>Who you pay, and/or who pays you (in some cases)</td>
        <td class="bggreen umkoin_core default-show"></td>
        <td class="bgred umkoin_go not-displayed"></td>
        <td class="bgred greenaddress not-displayed"></td>
  </tr>
  <tr>
    <td>How much you spend and/or receive</td>
        <td class="bggreen umkoin_core default-show"></td>
        <td class="bgred umkoin_go not-displayed"></td>
        <td class="bgred greenaddress not-displayed"></td>
  </tr>
  <tr>
    <td>The IP address your connection came from</td>
        <td class="bggreen umkoin_core default-show"></td>
        <td class="bgred umkoin_go not-displayed"></td>
        <td class="bgred greenaddress not-displayed"></td>
  </tr>

  <tr class="empty"></tr>
  <tr>
    <th colspan="99">Who can guess your information? <strong class="fggreen">Just you</strong> or also <strong class="fgred">people
    you trade with?</strong></th>
  </tr>

  <tr>
    <th></th>
    
      
        <th class="umkoin_core default-show">Umkoin Core</th>
      
    
      
        <th class="umkoin_go not-displayed">BitGo</th>
      
    
      
        <th class="greenaddress not-displayed">GreenAddress</th>
      
    
  </tr>

  <tr>
    <td>Other transactions you made or received</td>
    
      
        <td class="bgred umkoin_core default-show"></td>
      
    
      
        <td class="bgred umkoin_go not-displayed"></td>
      
    
      
        <td class="bgred greenaddress not-displayed"></td>
      
    
  </tr>

</table>

<h2 id="perfect-privacy-for-received-transactions">Perfect Privacy for Received Transactions</h2>

<p>There are 230 million transactions on the Umkoin block
chain. How do you find which ones pay you?  Here are some common
options:</p>

<table class="received_transactions">
  <tr>
    <td class="center"><strong class="fgred">Ask bankers</strong><br />They’ll monitor your every transaction<br /><br /><button class="popup js" data-container="umkoin_bank_receiving">Umkoin banks</button></td>

    <td class="center"><strong class="fgred">Ask random nodes</strong><br />Some of which sell your data<br /><br /><button class="popup js" data-container="bloom_filter_receiving">P2P lightweight wallets</button></td>
  </tr>

  <tr>
    <td class="center"><strong class="fgred">Ask a free service</strong><br />(Actually, some do care about privacy)<br /><br /><button class="popup js" data-container="electrum_style_receiving">Client lightweight wallets</button></td>

    <td class="center"><strong class="fggreen">Get all 230 million transactions</strong><br />For <strong>perfect</strong> receiving privacy<br /><br /><strong>Umkoin Core</strong></td>
  </tr>
</table>

<p>Umkoin Core downloads all 230 million transactions on the Umkoin block
chain and processes them to find which transactions pay you.</p>

<p>This currently takes about 4 hours the first time
you start Umkoin Core and about 5
minutes a day to keep updated, but it gives you what scientists call
<strong><button class="popup js" data-container="information_theoretic_privacy">information-theoretic (perfect) privacy</button></strong>
against eavesdroppers for received transactions.</p>

<h2 id="strong-privacy-for-sent-transactions">Strong Privacy for Sent Transactions</h2>

<p>To put a transaction on the block chain, you must send it publicly—but
how you send it can make a big difference.</p>

<p><img src="/img/umkoin-core/sending-privacy.svg" alt="Sending privacy" /></p>

<p><strong>Can you guess who made which transactions?</strong> Nearly all peer-to-peer
lightweight clients today make no attempt to obscure their sent
transactions. They simply send them to some or all of their peers.</p>

<p>Umkoin Core does much better. By default, it relays transactions for
all of its peers—thousands of separate transactions a day under common
conditions—which allows it both <a href="/en/umkoin-core/features/network-support">support the peer-to-peer network</a> and confuse anti-privacy organizations that try to
track your transactions.</p>

<h2 id="tor-compatible">Tor Compatible</h2>

<p>The Tor anonymity network helps disassociate your online activity from
your IP address (which is often closely associated with your real name).
This significantly increases your ability to confound anti-privacy
organizations.</p>

<p>Once you <a href="https://www.torproject.org/">setup Tor</a>, using it with Umkoin Core is <a href="https://en.bitcoin.it/wiki/Tor">easy</a>. If you also <a href="https://en.bitcoin.it/wiki/Tor#Hidden_services">setup a Tor hidden service</a>, you will
be able to <a href="/en/umkoin-core/features/user-interface#lightweight">connect mobile clients</a>
to your Umkoin Core full node for increased security and privacy
wherever you go.</p>

<p class="right-hanger"><a href="https://www.torproject.org/">Start using Tor today <span class="fa fa-external-link-square"></span></a></p>

<h2 id="decentralized-peer-discovery">Decentralized Peer Discovery</h2>

<p>The first time any Umkoin program connects to the peer-to-peer network,
it has to ask a centralized authority for a list of recommended peers.</p>

<p>Once the program gets on the network, it can ask its peers for more
recommendations in a fully decentralized way—but
<button class="popup js" data-container="spv_decentralized_peer">most</button>
lightweight wallets don’t bother.</p>

<table class="center_header">
  <tr>
    <th class="fgred">P2P Lightweight Wallets</th>
    <th class="fggreen">Umkoin Core</th>
  </tr>

  <tr>
    <td>Asks the same centralized services every time program is
    restarted. This can be faster.</td>

    <td>Uses the peer-to-peer network to independently discover new
    peers.  Uses found peers on restart.</td>
  </tr>
</table>

<p>This allows the centralized authority to connect lightweight wallets to
dishonest peers that can <strong>completely destroy lightweight transaction
privacy.</strong> Those dishonest peers can work with dishonest miners to
<strong>weaken lightweight security too.</strong></p>

<p>Umkoin Core prefers decentralized peer discovery, so after the first
time it starts, it no longer has to trust the centralized authority.
Isn’t that worth occasionally starting up a few seconds slower?</p>

    <p><br class="clear big" /></p>

    <div class="prevnext">
      <span><strong>Previous Feature</strong><br /><a href="/en/umkoin-core/features/validation.php">Validation</a></span>
      <span><strong>Next feature</strong><br /><a href="/en/umkoin-core/features/requirements.php">Requirements</a></span>
    </div>

    <p><br class="clear" /></p>












<div class="not-displayed">
  <div id="umkoin_bank_receiving" title="Umkoin Bank Receiving Privacy">
    <p><img src="/img/umkoin-core/bank-receiving-privacy.svg" alt="Umkoin Core receiving privacy features" /></p>

    <p>When you receive umkoins to a Umkoin bank, the money is sent to one of
  the bank’s addresses—not your own—which can give you excellent
  privacy against random strangers.</p>

    <p>However, the bank knows you received the transaction and they can likely
  also see any information you associate with the transaction, such as the
  sender’s name or another note you attach to the transaction.</p>

    <p>The bank may also be required by law to disclose information about your
  account. They can also sell your information or have a hacker steal your
  information.</p>
  </div>

  <div id="bloom_filter_receiving" title="Bloom Filter Privacy">
    <p><img src="/img/umkoin-core/receiving-privacy.svg" alt="Receiving privacy" /></p>

    <p>By only asking for payments related to your wallet, plus maybe a few
  others as bloom filter camouflage, lightweight wallets may reveal who you
  paid, who paid you, and what your current umkoin balance is.</p>

    <blockquote>
      <p>A <a href="http://arxiv.org/abs/1410.6079">2014 study of lightweight clients</a>
said, “Our results show that bloom filters incur serious privacy
leakage in existing SPV client implementations […] such an
information leakage might severely harm the privacy of users” <strong>Nearly
all lightweight clients are still vulnerable today.</strong></p>
    </blockquote>

    <p><strong>Learn more:</strong> <a href="https://groups.google.com/forum/#!msg/bitcoinj/Ys13qkTwcNg/9qxnhwnkeoIJ">“Lying consistently is hard”</a></p>

  </div>

  <div id="electrum_style_receiving" title="Client Lightweight Wallet Receiving Privacy">
    <p><img src="/img/umkoin-core/electrum-receiving-privacy.svg" alt="Electrum-style receiving privacy" /></p>

    <p>Some lightweight wallets don’t connect to the Umkoin peer-to-peer (P2P)
  network.  Instead, they make a (usually secure) connection to a single
  server that provides block chain data.</p>

    <p>The wallet tells the server all of its addresses, and the server replies
  with all of the transactions that belong to the wallet.  This explicitly
  reveals all of your addresses, which is bad for your privacy—but it
  only gives that information to one server, as long as you don’t change
  servers later.</p>

    <p>The server can, of course, give away your information and further
  reduce your privacy. However, as of
  June 2017, most of these types of
  servers are run by volunteers who likely want to help protect your
  privacy, so this model can be more private than bank wallets or P2P
  lightweight wallets.</p>

  </div>

  <div id="spv_decentralized_peer" title="P2P Decentralized Peer Discovery">
    <p>The following P2P lightweight wallets use decentralized peer discovery
  by default.</p>

    <ul>
      <li>BreadWallet</li>
    </ul>

    <p>If you know of another compliant lightweight wallet, please <a href="https://github.com/umkoin/umkoin.org/issues">tell us
  about it</a>.</p>
  </div>

  <div id="information_theoretic_privacy" title="Information-Theoretic Privacy">
    <p>Information-theoretic privacy means that the privacy can’t be broken even
  if an attacker has unlimited computing resources.</p>

    <p><strong>Learn more:</strong> <a href="https://en.wikipedia.org/wiki/Information_theoretic_security">Information theoretic security</a> (Wikipedia)</p>
  </div>
</div>

  </div>

</div>


<?php
include '../../page_footer.php';
?>


</body>
</html>
