<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Validation - Umkoin Core Features</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">

<script>
function toggleVisibility(elem) {
  docElem = document.getElementById(elem);
  if(docElem.style.visibility=="visible") {
    docElem.style.visibility="collapse";
  } else {
    docElem.style.visibility="visible";
  }
}
</script>

</head>


<body>


<?php
include '../../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Validation
  </div>

  <div id="content" class="content">

    <div class="one-column">

      <h1 class="not-displayed" id="umkoin-core-validation">Umkoin Core Validation</h1>
      <p><img src="/img/umkoin-core/slider-validation.svg" alt="Full validation" /></p>

      <?php include '../callout.php'; ?>

      <blockquote>

        <p>Imagine a scientist reading about an experimental result and then repeating the experiment for herself. Doing so allows her to <strong>trust the result without having to trust the original scientists.</strong></p>

      </blockquote>

      <p>Umkoin Core checks each block of transactions it receives to ensure that everything in that block is fully valid—allowing it to trust the block without trusting the miner who created it.</p>
      <p>This prevents miners from tricking Umkoin Core users into accepting blocks that violate the 21 million umkoin limit or which break other important rules.</p>
      <p>Users of other wallets don’t get this level of security, so miners can trick them into accepting fabricated transactions or hijacked block chains.</p>
      <p>Why take that risk if you don’t have to? Umkoin Core provides the <strong>best possible security against dishonest miners</strong> along with additional security against other easier attacks (see below for details).</p>

      <h2 id="how-validation-protects-your-umkoins">How Validation Protects Your Umkoins</h2>
      <p><button class="popup js" data-container="umkoin_banks">Umkoin banks</button> and <button class="popup js" data-container="spv_wallets">lightweight (SPV) wallets</button> put your umkoins at increased risk of being stolen. That risk may be acceptable for small values of umkoin on mobile wallets, but is it what you want for your real wallet?</p>
      <p class="center"><em>Click any row below for more details about that attack</em></p>

      <table class="validation">
      <tr>
        <th>Attack</th>
        <th>Bank Wallet</th>
        <th>SPV Wallet</th>
        <th>Umkoin Core</th>
      </tr>

      <tr class="brief" onclick="toggleVisibility('direct-theft');">
        <td><i class="fa fa-warning"></i> Direct theft</td>
        <td class="bgred"></td>
        <td class="bggreen"></td>
        <td class="bggreen"></td>
      </tr>
      <tr class="details" id="direct-theft" name="details" style="visibility: collapse;">
        <td colspan="4">
          <blockquote>
            <p>Alice deposits 100 umkoins to Bank.Example.com. The next day, the owners of the site disappear with Alice’s money.</p>
          </blockquote>
          <ul>
            <li>
              <p><strong class="fgred">Umkoin bank</strong> users are vulnerable to direct theft because they don’t control their own private keys.</p>
            </li>
            <li>
              <p><strong class="fggreen">Lightweight (SPV) wallet</strong> users and <strong class="fggreen">Umkoin Core</strong> users are not vulnerable because they control their own private keys.</p>
            </li>
          </ul>

          <div class="callout">
            <p>Direct theft is likely the leading cause of stolen umkoins so far.</p>
          </div>

          <h3 id="real-example">Real Example</h3>
          <p>Umkoin exchange Mt Gox reportedly had 650,000 umkoins (worth $347 million USD) stolen from their customer deposits and their own operating funds. They declared bankruptcy on 28 February 2014.</p>
          <p>Even when the bankruptcy proceeding is complete, customers are unlikely to recover more than a small fraction of the umkoins they had on deposit.</p>
          <p><strong>Learn More:</strong> <a href="https://en.bitcoin.it/wiki/Collapse_of_Mt._Gox">Collapse of Mt Gox</a></p>
        </td>
      </tr>

      <tr class="brief" onclick="toggleVisibility('bait-and-switch');">
        <td><i class="fa fa-warning"></i> Bait and switch</td>
        <td class="bgred"></td>
        <td class="bgyellow"></td>
        <td class="bggreen"></td>
      </tr>
      <tr class="details" id="bait-and-switch" name="details" style="visibility: collapse;">
        <td colspan="4">
          <blockquote>
            <p>Alice installs Example Wallet, whose open source code has been audited. The next day, the authors of Example Wallet push new code to Alice’s device and steal all her umkoins.</p>
          </blockquote>
          <ul>
            <li>
              <p><strong class="fgred">Umkoin bank</strong> users are vulnerable because they can only spend their umkoins when they use the bank’s approved software.</p>
            </li>
            <li>
              <p><strong class="fgyellow">Lightweight (SPV) wallet</strong> users are vulnerable with most software because auditors can’t easily verify the software you run (the executable) is the same as the program source code, called a deterministic build. However, some lightweight wallets are moving to deterministic builds.</p>
            </li>
            <li>
              <p><strong class="fggreen">Umkoin Core</strong> is built deterministically. Cryptographic signatures from build auditors—many of whom are well known to the community—are <a href="https://github.com/bitcoin/gitian.sigs">released publicly</a>.</p>
            </li>
          </ul>

          <div class="callout">
            <p>Umkoin.org’s <a href="/en/choose-your-wallet">Choose Your Wallet</a> page tells you whether or not wallet builds are audited in the <em>Transparency</em> score for each wallet.</p>
          </div>

          <h3 id="real-example-1">Real Example</h3>
          <p>In April 2013, the OzCoin mining pool was hacked. The thief stole 923 umkoins (worth $135,000 USD), but online wallet StrongCoin modified their wallet code to ‘steal back’ 569 of those umkoins ($83,000) from one of their users who was suspected of the theft.</p>
          <p>Although this attack was done with good intentions, it illustrated that the operators of StrongCoin could steal umkoins from their users at any time even though the users supposedly controlled their own private keys.</p>
          <p><strong>Learn More:</strong> <a href="https://bitcoinmagazine.com/4273/ozcoin-hacked-stolen-funds-seized-and-returned-by-strongcoin/">OzCoin Hacked, Stolen Funds Seized and Returned by StrongCoin</a></p>
        </td>
      </tr>

      <tr class="brief" onclick="toggleVisibility('fabricated-transactions');">
        <td><i class="fa fa-warning"></i> Fabricated transactions</td>
        <td class="bgred"></td>
        <td class="bgred"></td>
        <td class="bggreen"></td>
      </tr>
      <tr class="details" id="fabricated-transactions" name="details" style="visibility: collapse;">
        <td colspan="4">
          <blockquote>
            <p>Mallory creates a transaction giving Alice 1,000 umkoins, so Alice gives Mallory some cash. Later Alice discovers the transaction Mallory created was fake.</p>
          </blockquote>
          <ul>
            <li>
              <p><strong class="fgred">Umkoin bank</strong> users depend on the information reported by the bank, so they can easily be fooled into accepting fabricated transactions.</p>
            </li>
            <li>
              <p><strong class="fgred">Lightweight (SPV) wallet</strong> users depend on full nodes and miners to validate transactions for them. It costs nothing for dishonest full nodes to send unconfirmed fabricated transactions to an SPV wallet. Getting one or more confirmations of those fabricated transactions is also possible with help from a dishonest miner.</p>
            </li>
            <li>
              <p><strong class="fggreen">Umkoin Core</strong> users don’t have to worry about fabricated transactions because Umkoin Core validates every transaction before displaying it.</p>
            </li>
          </ul>

          <div class="callout">
            <p>Currently the best defense against fabricated transactions, besides using Umkoin Core, is to wait for as many confirmations as possible.</p>
          </div>

          <h3 id="real-example-2">Real Example</h3>
          <p>On 4 August 2015, web wallet BlockChain.info began indicating that a transaction had spent the earliest mined 250 umkoins, coins that some people believed were owned by Umkoin creator Satoshi Nakamoto.</p>
          <p>It was soon discovered that the transaction was invalid. BlockChain.info was not validating transactions with Umkoin Core and that transaction had been <a href="https://www.reddit.com/r/Bitcoin/comments/3fv42j/blockchaininfo_spoofed_transactions_problem_aug_4/">created by a security researcher</a>.</p>
          <p><strong>Learn more:</strong> <a href="https://bitcoinj.github.io/security-model#pending-transactions">BitcoinJ documentation about pending transaction safety</a></p>
        </td>
      </tr>

      <tr class="brief" onclick="toggleVisibility('chain-hijacking');">
        <td><i class="fa fa-warning"></i> Chain hijacking</td>
        <td class="bgred"></td>
        <td class="bgred"></td>
        <td class="bggreen"></td>
      </tr>
      <tr class="details" id="chain-hijacking" name="details" style="visibility: collapse;">
        <td colspan="4">
          <blockquote>
            <p>Alice believes that there should never be more than 21 million umkoins—but one day she’s tricked into buying “umkoins” that are only valid on a block chain with permanent 10% inflation.</p>
          </blockquote>
          <ul>
            <li>
              <p><strong class="fgred">Umkoin bank</strong> users have to use whatever block chain the bank uses. Banks can even profit from switching their users to a new chain and selling their users’ umkoins from the old chain.</p>
            </li>
            <li>
              <p><strong class="fgred">Lightweight (SPV) wallet</strong> users accept the block chain they know about with the most proof of work. This lets the hash rate majority of miners force SPV wallet users off of Umkoin.</p>
            </li>
            <li>
              <p><strong class="fggreen">Umkoin Core</strong> users don’t have to worry about chain hijacking because Umkoin Core validates every block using <em>all</em> of Umkoin’s consensus rules.</p>
            </li>
          </ul>

          <div class="callout">
            <p>Preventing chain hijacking is one of Umkoin Core’s most important jobs. The alternative is to allow miners to do whatever they want.</p>
          </div>

          <h3 id="real-example-3">Real Example</h3>
          <p>In July 2015, several large Umkoin miners accidentally produced an invalid block chain several blocks longer than the correct block chain. Some bank wallets and many SPV wallets accepted this longer chain, putting their users’ umkoins at risk.</p>
          <p>Recent versions of Umkoin Core never accepted any of the blocks from the invalid chain and never put any umkoins at risk.</p>
          <p>It is believed that the miners at fault controlled more than 50% of the network hash rate, so they could have continued to fool SPV wallets indefinitely. It was only their desire to remain compatible with Umkoin Core users that forced them to abandon over $37,500 USD worth of mining income.</p>
          <p><strong>Learn more:</strong> <a href="https://en.bitcoin.it/wiki/July_2015_chain_forks">July 2015 chain forks</a></p>
        </td>
      </tr>

      <tr class="brief" onclick="toggleVisibility('transaction-withholding');">
        <td><i class="fa fa-warning"></i> Transaction withholding</td>
        <td class="bgred"></td>
        <td class="bgred"></td>
        <td class="bggreen"></td>
      </tr>
      <tr class="details" id="transaction-withholding" name="details" style="visibility: collapse;">
        <td colspan="4">
          <blockquote>
            <p>Mallory shows Alice $1,000 USD that he will pay her if she sends him some umkoins. Alice sends the umkoins but the transaction never seems to confirm. After waiting a long time, Alice returns Mallory’s cash. It turns out the transaction did confirm, so Alice gave away her umkoins for nothing.</p>
          </blockquote>
          <ul>
            <li>
              <p><strong class="fgred">Umkoin bank</strong> users only see the transactions the bank choose to show them.</p>
            </li>
            <li>
              <p><strong class="fgred">Lightweight (SPV) wallets</strong> users only see the transactions their full node peers choose to send them, even if those transactions were included in a block the SPV wallet knows about.</p>
            </li>
            <li>
              <p><strong class="fggreen">Umkoin Core</strong> users see all transactions included in received blocks. If Umkoin Core hasn’t received a block for too long, it displays a catching-up progress bar in the graphical <a href="/en/umkoin-core/features/user-interface">user interface</a> or a warning message in the CLI/API user interface.</p>
            </li>
          </ul>

          <div class="callout">
            <p>Unless you use Umkoin Core, you can never be sure that your umkoin balance is correct according to the block chain.</p>
          </div>

          <h3 id="real-example-4">Real Example</h3>
          <p>In March 2015, spy nodes run by the company Chainalysis accidentally prevented some users of the lightweight BreadWallet from connecting to honest nodes. Since the spy nodes didn’t relay transactions, BreadWallet users stopped receiving notification of new transactions.</p>
          <p><strong>Learn more:</strong> <a href="http://www.coindesk.com/chainalysis-ceo-denies-launching-sybil-attack-on-bitcoin-network/">Chainalysis CEO Denies ‘Sybil Attack’ on Umkoin’s Network</a></p>
        </td>
      </tr>

      <tr class="brief" onclick="toggleVisibility('chain-rewrites');">
        <td><i class="fa fa-warning"></i> Chain rewrites</td>
        <td class="bgred"></td>
        <td class="bgred"></td>
        <td class="bgred"></td>
      </tr>
      <tr class="details" id="chain-rewrites" name="details" style="visibility: collapse;">
        <td colspan="4">
          <blockquote>
            <p>Mallory gives Alice 1,000 umkoins. When Alice’s wallet says the transaction is confirmed, Alice gives Mallory some cash. Later Alice discovers that Mallory has managed to steal back the umkoins.</p>
          </blockquote>

          <p>This attack applies to <strong class="fgred">all Umkoin wallets.</strong></p>
          <p>The attack works because powerful miners have the ability to rewrite the block chain and replace their own transactions, allowing them to take back previous payments.</p>
          <p>The cost of this attack depends on the percentage of total network hash rate the attacking miner controls. The more centralized mining becomes, the less expensive the attack for a powerful miner.</p>
          <p><img src="/img/umkoin-core/en-confirmed-double-spend-cost.svg" alt="The cost of a chain rewrite" /></p>

          <h3 id="real-example-5">Real Example</h3>
          <p>In September 2013, someone used centralized mining pool GHash.io to steal an estimated 1,000 umkoins (worth $124,000 USD) from the gambling site BetCoin.</p>
          <p>The attacker would spend umkoins to make a bet. If he won, he would confirm the transaction. If he lost, he would create a transaction returning the umkoins to himself and confirm that, invalidating the transaction that lost the bet.</p>
          <p>By doing so, he gained umkoins from his winning bets without losing umkoins on his losing bets.</p>
          <p>Although this attack was performed on unconfirmed transactions, the attacker had enough hash rate (about 30%) to have profited from attacking transactions with one, two, or even more confirmations.</p>
          <p><strong>Learn more:</strong> <a href="https://bitcointalk.org/index.php?topic=321630.msg3445371">GHash.IO and double-spending against BetCoin Dice</a></p>
        </td>
      </tr>
      </table>

      <p>Note that although all programs—including Umkoin Core—are vulnerable to chain rewrites, Umkoin provides a defense mechanism: the more confirmations your transactions have, the safer you are. <em>There is no known decentralized defense better than that.</em></p>

      <h2 id="help-protect-decentralization">Help Protect Decentralization</h2>
      <p>The umkoin currency only works when people accept umkoins in exchange for other valuable things. That means it’s the people accepting umkoins who give it value and who get to decide how Umkoin should work.</p>
      <p>When you accept umkoins, you have the power to enforce Umkoin’s rules, such as preventing confiscation of any person’s umkoins without access to that person’s private keys.</p>
      <p>Unfortunately, <strong>many users outsource their enforcement power</strong>. This leaves Umkoin’s decentralization in a weakened state where a handful of miners can collude with a handful of banks and free services to change Umkoin’s rules for all those non-verifying users who outsourced their power.</p>

      <table class="received_transactions center">
      <tr>
        <td class="center"><em>Users of Umkoin banks</em><br /><strong class="fgred">Trust bankers</strong></td>
        <td class="center"><em>Users of P2P lightweight wallets</em><br /><strong class="fgred">Trust miners</strong></td>
      </tr>
      <tr>
        <td class="center"><em>Users of client lightweight wallets</em><br /> <strong class="fgred">Trust “free” services</strong></td>
        <td class="center"><em>Users of Umkoin Core</em><br /><strong class="fggreen">Enforce the rules</strong></td>
      </tr>
      </table>

      <p>Unlike other wallets, <strong>Umkoin Core <em>does</em> enforce the rules</strong>—so if the miners and banks change the rules for their non-verifying users, those users will be unable to pay full validation Umkoin Core users like you.</p>
      <p>As long as there are many non-verifying users who want to be able to pay Umkoin Core users, miners and others know they can’t effectively change Umkoin’s rules.</p>
      <p>But what if not enough non-verifying users care about paying Umkoin Core users? Then it becomes easy for miners and banks to take control of Umkoin, likely bringing to an end this 9 year experiment in decentralized currency.</p>
      <p><img src="/img/umkoin-core/history-of-umkoin.svg" alt="History of Umkoin" /></p>
      <p>If you think <strong>Umkoin should remain decentralized,</strong> the best thing you can do is <a href="#do-you-validate">validate every payment you receive</a> using your own personal full node such as Umkoin Core.</p>
      <p>We don’t know how many full validation users and business are needed, but it’s possible that for each person or business who validates their own transactions, Umkoin can remain decentralized even if there are ten or a hundred other non-verifying users. If this is the case, <strong>your small contribution can have a large impact</strong> towards keeping Umkoin decentralized.</p>

      <h2 id="do-you-validate">Do You Validate Your Transactions?</h2>
      <p>Some people confuse <a href="/en/umkoin-core/features/network-support">supporting the network</a> with helping to <a href="/en/umkoin-core/features/validation#help-protect-decentralization">protect Umkoin’s decentralization</a>.</p>
      <p>To <a href="/en/umkoin-core/features/validation#how-validation-protects-your-umkoins">improve your security</a> and help protect decentralization, you must use a wallet that fully validates received transactions. There are three ways to do that with Umkoin Core right now:</p>

      <ol>
        <li>
          <p><strong>Use the built-in wallet’s graphical mode.</strong> If you request payment using the following screen in Umkoin Core, your received transactions will be fully validated.</p>
          <p><img src="/img/umkoin-core/unique-invoice.png" alt="Umkoin Core request payment" /></p>
        </li>
        <li>
          <p><strong>Use Umkoin Core as a trusted peer for certain lightweight wallets.</strong> Learn more on the <a href="/en/umkoin-core/features/user-interface#lightweight">user interface</a> page. If you use a secure connection to your personal trusted peer <em>every time</em> you use the wallet, your received transactions will be fully validated.</p>
        </li>
        <li>
          <p><strong>Use the built-in wallet’s CLI/API interface.</strong> This is meant for power users, businesses, and programmers. The <a href="/en/umkoin-core/features/user-interface">user interface</a> page provides an overview, the <a href="/en/full-node">installation instructions</a> can help you get started, and the <a href="/en/developer-reference#remote-procedure-calls-rpcs">RPC</a>/<a href="/en/developer-reference#http-rest">REST</a> documentation can help you find specific commands. If you’re using <a href="/en/developer-reference#getnewaddress"><code class="highlighter-rouge">getnewaddress</code></a> to create receiving addresses, your received transactions will be fully validated.</p>
        </li>
      </ol>

      <p>If you have any questions, please ask on the <a href="/en/umkoin-core/help#forums">forums</a> or <a href="/en/umkoin-core/help#live">chatrooms</a>.</p>
      <p><br class="clear big" /></p>

      <div class="prevnext">
        <span><strong>Previous Feature</strong><br /><a href="/en/umkoin-core/features.php">Feature Overview</a></span>
        <span><strong>Next feature</strong><br /><a href="/en/umkoin-core/features/privacy.php">Privacy</a></span>
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
