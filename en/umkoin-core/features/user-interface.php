<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include '../../head'; ?>
<title>User Interface - Umkoin Core Features</title>
</head>


<body>


<?php
include '../../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Interface
  </div>

  <div id="content" class="content">

    <div class="one-column">

      <h1 class="not-displayed" id="umkoin-cores-user-interface">Umkoin Core’s User Interface</h1>
      <p><img src="/img/umkoin-core/slider-ui.svg" alt="Umkoin Core User Interface" /></p>

      <?php include '../callout.php'; ?>

      <p>Umkoin Core has a built in wallet with <a href="#graphical">graphical</a> and <a href="#cli">command line/API</a> modes. It can also simultaneously support multiple lightweight wallets with similar <a href="/en/umkoin-core/features/validation.php">security</a> and <a href="/en/umkoin-core/features/privacy.php">privacy</a> to its built-in wallet.</p>
      <p><strong>Warning:</strong> you only get the security and privacy benefits in supported lightweight wallets if they make a secure and private connection to your Umkoin Core <em>every</em> time you use them. This usually requires special configuration.</p>

      <h2 id="graphical">Umkoin Core Wallet GUI (Graphical)</h2>
      <div class="two-column-list">
        <ul class="fa-ul">
          <li>
            <p><span class="fa fa-li fa-desktop fa-2x"></span> <strong><button class="popup js" data-container="gui_overview">Clear overview</button></strong><br />See your current balance and recent transactions</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-toggle-on fa-2x"></span> <strong><button class="popup js" data-container="gui_fee_slider">Fee slider</button></strong><br />Easily choose between low fees and fast confirmation</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-btc fa-2x"></span> <strong><button class="popup js" data-container="gui_coin_control">Coin control</button></strong><br />Enhance privacy or save money by choosing your inputs</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-qrcode fa-2x"></span> <strong><button class="popup js" data-container="gui_qr_codes">QR codes</button></strong><br />Generate QR codes to receive payment</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-file-text-o fa-2x"></span> <strong><button class="popup js" data-container="gui_unique_invoices">Unique invoices</button></strong><br />Easily track who paid you</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-shield fa-2x"></span> <strong><button class="popup js" data-container="gui_proxy_configuration">Proxy configuration</button></strong><br />Use Tor or a proxy for privacy</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-bar-chart fa-2x"></span> <strong><button class="popup js" data-container="gui_network_monitoring">Network monitoring</button></strong><br />Track how much bandwidth you use</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-power-off fa-2x"></span> <strong><button class="popup js" data-container="gui_watch_only">Watch-only support</button></strong><br />Track umkoins stored safely offline</p>
          </li>
        </ul>
      </div>

      <p><br class="clear" /></p>

      <h2 id="cli">Umkoin Core Wallet RPC/REST (CLI)</h2>
      <div class="two-column-list">
        <ul class="fa-ul">
          <li>
            <p><span class="fa fa-li fa-plus-square-o fa-2x"></span> <strong><button class="popup js" data-container="rpc_getnewaddress">GetNewAddress</button></strong><br />Get a new address for receiving payment</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-area-chart fa-2x"></span> <strong><button class="popup js" data-container="rpc_getbalance">GetBalance</button></strong><br />Instantly see your available Umkoin balance</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-arrows fa-2x"></span> <strong><button class="popup js" data-container="rpc_sendmany">SendMany</button></strong><br />Send a single payment to multiple addresses</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-list fa-2x"></span> <strong><button class="popup js" data-container="rpc_listunspent">ListUnspent</button></strong><br />See what received transactions you can spend</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-share-square-o fa-2x"></span> <strong><button class="popup js" data-container="rpc_rawtx">Create/Sign/Send</button></strong><br />Create and send raw transactions</p>
          </li>
          <li>
            <p><span class="fa fa-li fa-bell-o fa-2x"></span> <strong><button class="popup js" data-container="notification">Notification</button></strong><br />Be notified of new blocks and transactions</p>
          </li>
        </ul>
      </div>

      <p><br class="clear" /></p>

      <p><strong>Learn more:</strong> documentation for the <a href="/en/developer-reference.php#remote-procedure-calls-rpcs">RPC</a> and <a href="/en/developer-reference.php#http-rest">REST</a> interfaces</p>

      <h2 id="lightweight">Lightweight Wallets Using Umkoin Core</h2>
      <p>Lightweight wallets usually connect to several random full nodes (like Umkoin Core) to send and receive all of their data. In the process they <a href="/en/umkoin-core/features/privacy.php#perfect-privacy-for-received-transactions">leak private data</a> and make themselves more <a href="/en/umkoin-core/features/validation.php#how-validation-protects-your-umkoins">vulnerable to attacks</a>.</p>
      <p><img src="/img/umkoin-core/connection-types-p2p-spv.svg" alt="Non-private connection" /></p>
      <p>But it’s also possible to connect certain lightweight wallets solely to your own Umkoin Core full node, called a trusted peer. If you do this with a secure and private connection every time you use that lightweight wallet, you’ll get most of the security and privacy benefits of a full node as well as <a href="/en/umkoin-core/features/validation.php#help-protect-decentralization">help protect decentralization</a>.</p>
      <p><img src="/img/umkoin-core/connection-types-trusted-peer.svg" alt="Secure and private connection" /></p>

      <p><br class="clear big" /></p>

      <div class="prevnext">
        <span><strong>Previous Feature</strong><br /><a href="/en/umkoin-core/features/requirements.php">Requirements</a></span>
        <span><strong>Next feature</strong><br /><a href="/en/umkoin-core/features/network-support.php">Network Support</a></span>
      </div>

      <p><br class="clear" /></p>

    </div>

  </div>

</div>


<?php
include '../../page_footer.php';
?>


</body>
</html>
