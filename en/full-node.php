<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Running A Full Node - Umkoin</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">

<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

  <link rel="stylesheet" href="/css/jquery-ui.min.css">
  <script src="/js/jquery/jquery-1.11.2.min.js"></script>
  <script src="/js/jquery/jquery-ui.min.js"></script>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <div>

      <h1 id="running-a-full-node">Running A Full Node</h1>
      <p class="summary">Support the Umkoin network by running your own full node</p>

      <div id="toc" class="toc">
          <ul id="markdown-toc">
            <li><a href="#what-is-a-full-node" id="markdown-toc-what-is-a-full-node">What Is A Full Node?</a></li>
            <li><a href="#costs-and-warnings" id="markdown-toc-costs-and-warnings">Costs And Warnings</a>
              <ul>
                <li><a href="#special-cases" id="markdown-toc-special-cases">Special Cases</a></li>
                <li><a href="#secure-your-wallet" id="markdown-toc-secure-your-wallet">Secure Your Wallet</a></li>
                <li><a href="#minimum-requirements" id="markdown-toc-minimum-requirements">Minimum Requirements</a></li>
                <li><a href="#possible-problems" id="markdown-toc-possible-problems">Possible Problems</a></li>
              </ul>
            </li>
            <li><a href="#linux-instructions" id="markdown-toc-linux-instructions">Linux Instructions</a></li>
            <li><a href="#windows-instructions" id="markdown-toc-windows-instructions">Windows Instructions</a>
              <ul>
                <li><a href="#windows-10" id="markdown-toc-windows-10">Windows 10</a></li>
                <li><a href="#windows-8x" id="markdown-toc-windows-8x">Windows 8.x</a></li>
              </ul>
            </li>
            <li><a href="#mac-os-x-instructions" id="markdown-toc-mac-os-x-instructions">Mac OS X Instructions</a>
              <ul>
                <li><a href="#mac-os-x-yosemite-1010x" id="markdown-toc-mac-os-x-yosemite-1010x">Mac OS X Yosemite 10.10.x</a></li>
              </ul>
            </li>
            <li><a href="#upgrading-umkoin-core" id="markdown-toc-upgrading-umkoin-core">Upgrading Umkoin Core</a></li>
            <li><a href="#network-configuration" id="markdown-toc-network-configuration">Network Configuration</a>
              <ul>
                <li><a href="#testing-connections" id="markdown-toc-testing-connections">Testing Connections</a>
                  <ul>
                    <li><a href="#gui-peer-info" id="markdown-toc-gui-peer-info">GUI Peer Info</a></li>
                    <li><a href="#daemon-peer-info" id="markdown-toc-daemon-peer-info">Daemon Peer Info</a></li>
                  </ul>
                </li>
                <li><a href="#enabling-connections" id="markdown-toc-enabling-connections">Enabling Connections</a>
                  <ul>
                    <li><a href="#configuring-dhcp" id="markdown-toc-configuring-dhcp">Configuring DHCP</a></li>
                    <li><a href="#port-forwarding" id="markdown-toc-port-forwarding">Port Forwarding</a></li>
                    <li><a href="#firewall-configuration" id="markdown-toc-firewall-configuration">Firewall Configuration</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#configuration-tuning" id="markdown-toc-configuration-tuning">Configuration Tuning</a>
              <ul>
                <li><a href="#reduce-storage" id="markdown-toc-reduce-storage">Reduce Storage</a></li>
                <li><a href="#reduce-traffic" id="markdown-toc-reduce-traffic">Reduce Traffic</a>
                  <ul>
                    <li><a href="#maximum-upload-targets" id="markdown-toc-maximum-upload-targets">Maximum Upload Targets</a></li>
                    <li><a href="#disable-listening" id="markdown-toc-disable-listening">Disable listening</a></li>
                    <li><a href="#reduce-maximum-connections" id="markdown-toc-reduce-maximum-connections">Reduce maximum connections</a></li>
                    <li><a href="#blocks-only-mode" id="markdown-toc-blocks-only-mode">Blocks-only mode</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="reportissue"><li><a href="https://github.com/umkoin/umkoin.org/issues/new">Report An Issue</a></li></ul>
      </div>

      <div class="toccontent">

        <h2 id="what-is-a-full-node">What Is A Full Node?</h2>
        <p>A full node is a program that fully validates transactions and blocks. Almost all full nodes also help the network by accepting transactions and blocks from other full nodes, validating those transactions and blocks, and then relaying them to further full nodes.</p>
        <p>Most full nodes also serve lightweight clients by allowing them to transmit their transactions to the network and by notifying them when a transaction affects their wallet. If not enough nodes perform this function, clients won’t be able to connect through the peer-to-peer network—they’ll have to use centralized services instead.</p>
        <p>Many people and organizations volunteer to run full nodes using spare computing and bandwidth resources—but more volunteers are needed to allow Umkoin to continue to grow. This document describes how you can help and what helping will cost you.</p>

        <h2 id="costs-and-warnings">Costs And Warnings</h2>
        <p>Running a Umkoin full node comes with certain costs and can expose you to certain risks. This section will explain those costs and risks so you can decide whether you’re able to help the network.</p>

        <h3 id="special-cases">Special Cases</h3>
        <p>Miners, businesses, and privacy-conscious users rely on particular behavior from the full nodes they use, so they will often run their own full nodes and take special safety precautions. This document does not cover those precautions—it only describes running a full node to help support the Umkoin network in general.</p>
        <p>Please seek out assistance in the community if you need help setting up your full node correctly to handle high-value and privacy-sensitive tasks. Do your own diligence to ensure who you get help from is ethical, reputable and qualified to assist you.</p>

        <h3 id="secure-your-wallet">Secure Your Wallet</h3>
        <p>It’s possible and safe to run a full node to support the network and use its wallet to store your umkoins, but you must take the same precautions you would when using any Umkoin wallet. Please see the <a href="/en/secure-your-wallet">securing your wallet page</a> for more information.</p>

        <h3 id="minimum-requirements">Minimum Requirements</h3>
        <p>Umkoin Core full nodes have certain requirements. If you try running a node on weak hardware, it may work—but you’ll likely spend more time dealing with issues. If you can meet the following requirements, you’ll have an easy-to-use node.</p>
        <ul>
          <li>
            <p>Desktop or laptop hardware running recent versions of Windows, Mac OS X, or Linux.</p>
          </li>
          <li>
            <p>145 gigabytes of free disk space, accessable at a minimum read/write speed of 100 MB/s.</p>
          </li>
          <li>
            <p>2 gigabytes of memory (RAM)</p>
          </li>
          <li>
            <p>A broadband Internet connection with upload speeds of at least 400 kilobits (50 kilobytes) per second</p>
          </li>
          <li>
            <p>An unmetered connection, a connection with high upload limits, or a connection you regularly monitor to ensure it doesn’t exceed its upload limits. It’s common for full nodes on high-speed connections to use 200 gigabytes upload or more a month. Download usage is around 20 gigabytes a month, plus around an additional 140 gigabytes the first time you start your node.</p>
          </li>
          <li>
            <p>6 hours a day that your full node can be left running. (You can do other things with your computer while running a full node.) More hours would be better, and best of all would be if you can run your node continuously.</p>
            <p><strong>Note:</strong> many operating systems today (Windows, Mac, and Linux) enter a low-power mode after the screensaver activates, slowing or halting network traffic. This is often the default setting on laptops and on all Mac OS X laptops and desktops. Check your screensaver settings and disable automatic “sleep” or “suspend” options to ensure you support the network whenever your computer is running.</p>
          </li>
        </ul>

        <h3 id="possible-problems">Possible Problems</h3>
        <ul>
          <li>
            <p><strong>Legal:</strong> Umkoin use may be prohibited or restricted in some areas.</p>
          </li>
          <li>
            <p><strong>Bandwidth limits</strong>: Some Internet plans will charge an additional amount for any excess upload bandwidth used that isn’t included in the plan. Worse, some providers may terminate your connection without warning because of overuse. We advise that you check whether your Internet connection is subjected to such limitations and monitor your bandwidth use so that you can stop Umkoin Core before you reach your upload limit.</p>
          </li>
          <li>
            <p><strong>Anti-virus:</strong> Several people have placed parts of known computer viruses in the Umkoin block chain. This block chain data can’t infect your computer, but some anti-virus programs quarantine the data anyway, making it more difficult to run Umkoin Core. This problem mostly affects computers running Windows.</p>
          </li>
          <li>
            <p><strong>Attack target:</strong> Umkoin Core powers the Umkoin peer-to-peer network, so people who want to disrupt the network may attack Umkoin Core users in ways that will affect other things you do with your computer, such as an attack that limits your available download bandwidth.</p>
          </li>
        </ul>

        <h2 id="linux-instructions">Linux Instructions</h2>
        <p>The following instructions describe installing Umkoin Core 0.16.0.2 on Linux systems.</p>
        <p>The following instructions describe installing Umkoin Core using tools available in most mainstream Linux distributions. We assume you use a Bourne-like shell such as <code class="highlighter-rouge">bash</code>.</p>
        <p>Using any computer, go to the <a href="/en/download.php">Umkoin Core download page</a> and verify you have made a secure connection to the server.</p>
        <p>In the “Linux (tgz)” section of the Download page, choose the appropriate file for your Linux install (either 32-bit or 64-bit) and download the file. If necessary, move the file to the computer you want to use to run Umkoin Core.</p>
        <p>If you aren’t already logged into the computer you want to install Umkoin on, login now. Make sure you use an account that can use <code class="highlighter-rouge">su</code> or <code class="highlighter-rouge">sudo</code> to install software into directories owned by the root user.</p>
        <p>If you logged in graphically, start a terminal. If you logged in another way, we will assume you’re already in a shell.</p>
        <p>Locate the file you downloaded and extract it using the <code class="highlighter-rouge">tar</code> command followed by the argument <code class="highlighter-rouge">xzf</code> followed by the file name. The argument <code class="highlighter-rouge">xzf</code> means eXtract the gZipped tar archive File. For example, for a 64-bit tar archive in your current directory, the command is:</p>
        <div class="highlighter-rouge"><pre><code>tar xzf umkoin-0.16.0.2-linux64.tar.gz</code></pre></div>
        <p>This will create the directory <code class="highlighter-rouge">umkoin-0.16.0.2-linux64</code> within your current working directory. We will install the contents of its <code class="highlighter-rouge">bin</code> subdirectory into the <code class="highlighter-rouge">/usr/local/bin</code> directory using the the <code class="highlighter-rouge">install</code> command. The install command is part of the GNU coreutils available on nearly every Linux distribution, and the <code class="highlighter-rouge">/usr/local/bin</code> directory is a standard location for self-installed executables (you may edit the commands below to use a different location).</p>
        <p>If you use <code class="highlighter-rouge">sudo</code> to run commands as root, use the following command line:</p>
        <div class="highlighter-rouge"><pre><code>sudo install -m 0755 -o root -g root -t /usr/local/bin umkoin-0.16.0.2-linux64/bin/*</code></pre></div>
        <p>If you use <code class="highlighter-rouge">su</code> to run commands as root, use the following command line:</p>
        <div class="highlighter-rouge"><pre><code>su -c 'install -m 0755 -o root -g root -t /usr/local/bin umkoin-0.16.0.2-linux64/bin/*'</code></pre></div>
        <div class="box">
          <p><em>To continue, choose one of the following options</em></p>
          <ol>
            <li>
              <p>To use Umkoin Core Graphical User Interface (GUI), proceed to the <a href="#other-linux-gui">Umkoin Core GUI</a> section below.</p>
            </li>
            <li>
              <p>To use the Umkoin Core daemon (umkoind), which is useful for programmers and advanced users, proceed to the <a href="#other-linux-daemon">Umkoin Core Daemon</a> section below.</p>
            </li>
            <li>
              <p>To use both the GUI and the daemon, read both the <a href="#other-linux-gui">GUI instructions</a> and the <a href="#other-linux-daemon">daemon instructions</a>. Note that you can’t run both the GUI and the daemon at the same time using the same configuration directory.</p>
            </li>
          </ol>
        </div>

        <h4 id="other-linux-gui" class="no_toc">Umkoin Core GUI</h4>
        <p>In order to use Umkoin Core GUI, you will need several libraries installed. All of them should be available in all major recently-released Linux distributions, but they may not be installed on your computer yet. To determine whether you’re missing any libraries, open a terminal (if you haven’t already) and run the command <code class="highlighter-rouge">/usr/local/bin/umkoin-qt</code> to start Umkoin Core GUI.</p>
        <p>If all the required libraries are installed, Umkoin Core will start. If a required library is missing, an error message similar to the following message will be displayed:</p>
        <div class="highlighter-rouge"><pre><code>/usr/local/bin/umkoin-qt: error while loading shared libraries: libQtGui.so.4: cannot open shared object file: No such file or directory</code></pre></div>
        <p>Search your distribution’s package database for the missing file missing and install package containing that file. Then re-run <code class="highlighter-rouge">/usr/local/bin/umkoin-qt</code> to see if it’s missing another file. Repeat until Umkoin Core GUI starts.</p>
        <p>You will be prompted to choose a directory to store the Umkoin block chain and your wallet. Unless you have a separate partition or drive you want to use, click <em>Ok</em> to use the default.</p>
        <p>Umkoin Core GUI will begin to download the block chain. This step will take at least several days, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time by closing it; it will resume from the point where it stopped the next time you start it.</p>
        <p>After download is complete, you may use Umkoin Core as your wallet or you can just let it run to help support the Umkoin network.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Login</em></p>
          <p>Starting your node automatically each time you login to your computer makes it easy for you to contribute to the network. The easiest way to do this is to tell Umkoin Core GUI to start at login. This only works in desktop environments that support the <a href="http://standards.freedesktop.org/autostart-spec/autostart-spec-latest.html#startup">autostart specification</a>, such as Gnome, KDE, and Unity.</p>
          <p>While running Umkoin Core GUI, open the Settings menu and choose Options. On the Main tab, click <em>Start Umkoin on system login</em>. Click the Ok button to save the new settings.</p>
          <p>The next time you login to your desktop, Umkoin Core GUI should be automatically started in as an icon in the tray.</p>
          <p>If Umkoin Core GUI does not automatically start, you may need to add it to an <code class="highlighter-rouge">.xinit</code> or <code class="highlighter-rouge">.xsession</code> file as <a href="https://en.wikibooks.org/wiki/Guide_to_X11/Starting_Sessions">described here</a>.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

        <h4 id="other-linux-daemon" class="no_toc">Umkoin Core Daemon</h4>
        <p>If you’re logged in as an administrative user with sudo access, you may log out. The steps in this section should be performed as the user you want to run Umkoin Core. (This can be a locked account used only by Umkoin Core.)  If you changed users in a graphical interface, start a terminal.</p>
        <p>Type the following command:</p>
        <div class="highlighter-rouge"><pre><code>umkoind -daemon</code></pre></div>
        <p>It will print a message that Umkoin Core is starting. To interact with Umkoin Core daemon, you will use the command <code class="highlighter-rouge">umkoin-cli</code> (Umkoin command line interface).</p>
        <p>Note: it may take up to several minutes for Umkoin Core to start, during which it will display the following message whenever you use <code class="highlighter-rouge">umkoin-cli</code>:</p>
        <div class="highlighter-rouge"><pre><code>error: {"code":-28,"message":"Verifying blocks..."}</code></pre></div>
        <p>After it starts, you may find the following commands useful for basic interaction with your node:
          <a href="/en/developer-reference.php#getblockchaininfo"><code class="highlighter-rouge">getblockchaininfo</code></a>,
          <a href="/en/developer-reference.php#getnetworkinfo"><code class="highlighter-rouge">getnetworkinfo</code></a>,
          <a href="/en/developer-reference.php#getnettotals"><code class="highlighter-rouge">getnettotals</code></a>,
          <a href="/en/developer-reference.php#getwalletinfo"><code class="highlighter-rouge">getwalletinfo</code></a>,
          <a href="/en/developer-reference.php#stop"><code class="highlighter-rouge">stop</code></a>, and
          <a href="/en/developer-reference.php#help"><code class="highlighter-rouge">help</code></a>.</p>
        <p>For example, to safely stop your node, run the following command:</p>
        <div class="highlighter-rouge"><pre><code>umkoin-cli stop</code></pre></div>
        <p>A complete list of commands is available in the <a href="/en/developer-reference.php#rpc-quick-reference">Umkoin.org developer reference</a>.</p>
        <p>When Umkoin Core daemon first starts, it will begin to download the block chain. This step will take some time, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time using the <code class="highlighter-rouge">stop</code> command; it will resume from the point where it stopped the next time you start it.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Boot</em></p>
          <p>Starting your node automatically each time your computer boots makes it easy for you to contribute to the network. The easiest way to do this is to start Umkoin Core daemon from your crontab. To edit your crontab on most distributions, run the following command:</p>
          <div class="highlighter-rouge"><pre><code>crontab -e</code></pre></div>
          <p>Scroll to the bottom of the file displayed and add the following line:</p>
          <div class="highlighter-rouge"><pre><code>@reboot umkoind -daemon</code></pre></div>
          <p>Save the file and exit; the updated crontab file will be installed for you. On most distributions, this will cause Umkoin Core daemon to be automatically started each time your reboot your computer.</p>
          <p>If you’re a expert system administrator and want to use an init script instead, see <a href="https://github.com/umkoin/umkoin/tree/master/contrib/init">the init scripts directory in Umkoin Core’s source tree</a>.</p>
          <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
          <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>
        </div>

        <h2 id="windows-instructions">Windows Instructions</h2>

        <h3 id="windows-10">Windows 10</h3>
        <p>*Instructions for Umkoin Core 0.16.0.2 on Windows 10</p>
        <p>Go to the <a href="/en/download.php">Umkoin Core download page</a> and verify you have made a secure connection to the server.</p>
        <p>Click the large blue <em>Download Umkoin Core</em> button to download the Umkoin Core installer to your desktop.</p>
        <p>After downloading the file to your desktop or your Downloads folder (<code class="highlighter-rouge">C:\Users\&lt;YOUR USER NAME&gt;\Downloads</code>), run it by double-clicking its icon. Windows will ask you to confirm that you want to run it. Click Yes and the Umkoin installer will start. It’s a typical Windows installer, and it will guide you through the decisions you need to make about where to install Umkoin Core.</p>
        <div class="box">
          <p><em>To continue, choose one of the following options</em></p>
          <ol>
            <li>
              <p>If you want to use the Umkoin Core Graphical User Interface (GUI), proceed to the <a href="#win10-gui">Umkoin Core GUI</a> section below.</p>
            </li>
            <li>
              <p>If you want to use the Umkoin Core daemon (umkoind), which is useful for programmers and advanced users, proceed to the <a href="#win10-daemon">Umkoin Core Daemon</a> section below.</p>
            </li>
            <li>
              <p>To want to use both the GUI and the daemon, read both the <a href="#win10-gui">GUI instructions</a> and the <a href="#win10-daemon">daemon instructions</a>. Note that you can’t run both the GUI and the daemon at the same time using the same configuration directory.</p>
            </li>
          </ol>
        </div>

        <h4 id="win10-gui" class="no_toc">Umkoin Core GUI</h4>
        <p>Press the Windows key (<code class="highlighter-rouge">⊞ Win</code>) and start typing “umkoin”. When the Umkoin Core icon appears, click on it.</p>
        <p>You will be prompted to choose a directory to store the Umkoin block chain and your wallet. Unless you have a separate partition or drive you want to use, click Ok to use the default.</p>
        <p>Your firewall may block Umkoin Core from making outbound connections. It’s safe to allow Umkoin Core to use all networks. (Note: you will still need to configure inbound connections as described later in the <a href="#network-configuration">Network Configuration</a> section.)</p>
        <p>Umkoin Core GUI will begin to download the block chain. This step will take at least several days, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time by closing it; it will resume from the point where it stopped the next time you start it.</p>
        <p>After download is complete, you may use Umkoin Core as your wallet or you can just let it run to help support the Umkoin network.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Login</em></p>
          <p>Starting your node automatically each time you login to your computer makes it easy for you to contribute to the network. The easiest way to do this is to tell Umkoin Core GUI to start at login.</p>
          <p>While running Umkoin Core GUI, open the Settings menu and choose Options. On the Main tab, click <em>Start Umkoin on system login</em>. Click the Ok button to save the new settings.</p>
          <p>The next time you login to your desktop, Umkoin Core GUI will be automatically started minimized in the task bar.</p>
          <p><strong>Warning:</strong> to prevent data corruption, do not force shutdown your computer from the Windows shutdown screen when you have Umkoin Core running.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

        <h4 id="win10-daemon" class="no_toc">Umkoin Core Daemon</h4>
        <p>To start Umkoin Core daemon, first open a command window: press the Windows key (<code class="highlighter-rouge">⊞ Win</code>) and type “cmd”. Choose the option labeled “Command Prompt”.</p>
        <p>If you installed Umkoin Core into the default directory, type the following at the command prompt:</p>
        <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoind -daemon</code></pre></div>
        <p>Umkoin Core daemon should start and print a message that Umkoin Core is starting.</p>
        <p>To interact with Umkoin Core daemon, you will use the command <code class="highlighter-rouge">umkoin-cli</code> (Umkoin command line interface). If you installed Umkoin Core into the default location, type the following at the command prompt to see whether it works:</p>
        <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoin-cli getblockchaininfo</code></pre></div>
        <p>Note: it may take up to several minutes for Umkoin Core to start, during which it will display the following message whenever you use <code class="highlighter-rouge">umkoin-cli</code>:</p>
        <div class="highlighter-rouge"><pre><code>error: {"code":-28,"message":"Verifying blocks..."}</code></pre></div>
        <p>After it starts, you may find the following commands useful for basic interaction with your node:
          <a href="/en/developer-reference.php#getblockchaininfo"><code class="highlighter-rouge">getblockchaininfo</code></a>,
          <a href="/en/developer-reference.php#getnetworkinfo"><code class="highlighter-rouge">getnetworkinfo</code></a>,
          <a href="/en/developer-reference.php#getnettotals"><code class="highlighter-rouge">getnettotals</code></a>,
          <a href="/en/developer-reference.php#getwalletinfo"><code class="highlighter-rouge">getwalletinfo</code></a>,
          <a href="/en/developer-reference.php#stop"><code class="highlighter-rouge">stop</code></a>, and
          <a href="/en/developer-reference.php#help"><code class="highlighter-rouge">help</code></a>.</p>
        <p>For example, to safely stop your node, run the following command:</p>
        <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoin-cli stop</code></pre></div>
        <p>A complete list of commands is available in the <a href="/en/developer-reference.php#rpc-quick-reference">Umkoin.org developer reference</a>.</p>
        <p>When Umkoin Core daemon first starts, it will begin to download the block chain. This step will take some time, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time using the <code class="highlighter-rouge">stop</code> command; it will resume from the point where it stopped the next time you start it.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Boot</em></p>
          <p>Starting your node automatically each time your computer boots makes it easy for you to contribute to the network. The easiest way to do this is to start Umkoin Core daemon when you login to your computer.</p>
          <p>Start File Explorer and go to,</p>
          <div class="highlighter-rouge"><pre><code>C:\ProgramData\Microsoft\Windows\Start Menu\Programs\StartUp</code></pre></div>
          <p>Right-click on the File Explorer window and choose New → Text file. Name the file <code class="highlighter-rouge">start_umkoind.bat</code>. Then right-click on it and choose Open in Notepad (or whatever editor you prefer). Copy and paste the following line into the file.</p>
          <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoind -daemon</code></pre></div>
          <p>(If you installed Umkoin Core in a non-default directory, use that directory path instead.)</p>
          <p>Save the file. The next time you login to your computer, Umkoin Core daemon will be automatically started.</p>
          <p><strong>Warning:</strong> to prevent data corruption, do not force shutdown your computer from the Windows shutdown screen when you have Umkoin Core running.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

        <h3 id="windows-8x">Windows 8.x</h3>
        <p><em>Instructions for Umkoin Core 0.16.0.2 on Windows 8 and 8.1.</em></p>
        <p>Go to the <a href="/en/download.php">Umkoin Core download page</a> and verify you have made a secure connection to the server.</p>
        <p>Click the large blue <em>Download Umkoin Core</em> button to download the Umkoin Core installer to your desktop.</p>
        <p>After downloading the file to your desktop or your Downloads folder (<code class="highlighter-rouge">C:\Users\&lt;YOUR USER NAME&gt;\Downloads</code>), run it by double-clicking its icon. Windows will ask you to confirm that you want to run it. Click Yes and the Umkoin installer will start. It’s a typical Windows installer, and it will guide you through the decisions you need to make about where to install Umkoin Core.</p>
        <div class="box">
          <p><em>To continue, choose one of the following options</em></p>
          <ol>
            <li>
              <p>If you want to use the Umkoin Core Graphical User Interface (GUI), proceed to the <a href="#win8-gui">Umkoin Core GUI</a> section below.</p>
            </li>
            <li>
              <p>If you want to use the Umkoin Core daemon (umkoind), which is useful for programmers and advanced users, proceed to the <a href="#win8-daemon">Umkoin Core Daemon</a> section below.</p>
            </li>
            <li>
              <p>To want to use both the GUI and the daemon, read both the <a href="#win8-gui">GUI instructions</a> and the <a href="#win8-daemon">daemon instructions</a>. Note that you can’t run both the GUI and the daemon at the same time using the same configuration directory.</p>
            </li>
          </ol>
        </div>

        <h4 id="win8-gui" class="no_toc">Umkoin Core GUI</h4>
        <p>Press the Windows key (<code class="highlighter-rouge">⊞ Win</code>) and start typing “umkoin”. When the Umkoin Core icon appears (as shown below), click on it.</p>
        <p>You will be prompted to choose a directory to store the Umkoin block chain and your wallet. Unless you have a separate partition or drive you want to use, click Ok to use the default.</p>
        <p>Your firewall may block Umkoin Core from making outbound connections. It’s safe to allow Umkoin Core to use all networks. (Note: you will still need to configure inbound onnections as described later in the <a href="#network-configuration">Network Configuration</a> section.)</p>
        <p>Umkoin Core GUI will begin to download the block chain. This step will take some time, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time by closing it; it will resume from the point where it stopped the next time you start it.</p>
        <p>After download is complete, you may use Umkoin Core as your wallet or you can just let it run to help support the Umkoin network.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Login</em></p>
          <p>Starting your node automatically each time you login to your computer makes it easy for you to contribute to the network. The easiest way to do this is to tell Umkoin Core GUI to start at login.</p>
          <p>While running Umkoin Core GUI, open the Settings menu and choose Options. On the Main tab, click <em>Start Umkoin on system login</em>. Click the Ok button to save the new settings.</p>
          <p>The next time you login to your desktop, Umkoin Core GUI will be automatically started minimized in the task bar.</p>
          <p><strong>Warning:</strong> to prevent data corruption, do not force shutdown your computer from the Windows shutdown screen when you have Umkoin Core running.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

        <h4 id="win8-daemon" class="no_toc">Umkoin Core Daemon</h4>
        <p>To start Umkoin Core daemon, first open a command window: press the Windows key (<code class="highlighter-rouge">⊞ Win</code>) and type “cmd”. Choose the option labeled “Command Prompt”.</p>
        <p>If you installed Umkoin Core into the default directory, type the following at the command prompt:</p>
        <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoind -daemon</code></pre></div>
        <p>Umkoin Core daemon should start and print a message that Umkoin Core is starting.</p>
        <p>To interact with Umkoin Core daemon, you will use the command <code class="highlighter-rouge">umkoin-cli</code> (Umkoin command line interface). If you installed Umkoin Core into the default location, type the following at the command prompt to see whether it works:</p>
        <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoin-cli getblockchaininfo</code></pre></div>
        <p>Note: it may take up to several minutes for Umkoin Core to start, during which it will display the following message whenever you use <code class="highlighter-rouge">umkoin-cli</code>:</p>
        <div class="highlighter-rouge"><pre><code>error: {"code":-28,"message":"Verifying blocks..."}</code></pre></div>
        <p>After it starts, you may find the following commands useful for basic interaction with your node:
          <a href="/en/developer-reference.php#getblockchaininfo"><code class="highlighter-rouge">getblockchaininfo</code></a>,
          <a href="/en/developer-reference.php#getnetworkinfo"><code class="highlighter-rouge">getnetworkinfo</code></a>,
          <a href="/en/developer-reference.php#getnettotals"><code class="highlighter-rouge">getnettotals</code></a>,
          <a href="/en/developer-reference.php#getwalletinfo"><code class="highlighter-rouge">getwalletinfo</code></a>,
          <a href="/en/developer-reference.php#stop"><code class="highlighter-rouge">stop</code></a>, and
          <a href="/en/developer-reference.php#help"><code class="highlighter-rouge">help</code></a>.</p>
        <p>For example, to safely stop your node, run the following command:</p>
        <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoin-cli stop</code></pre></div>
        <p>A complete list of commands is available in the <a href="/en/developer-reference.php#rpc-quick-reference">Umkoin.org developer reference</a>.</p>
        <p>When Umkoin Core daemon first starts, it will begin to download the block chain. This step will take some time, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time using the <code class="highlighter-rouge">stop</code> command; it will resume from the point where it stopped the next time you start it.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Boot</em></p>
          <p>Starting your node automatically each time your computer boots makes it easy for you to contribute to the network. The easiest way to do this is to start Umkoin Core daemon when you login to your computer.</p>
          <p>Start File Explorer and go to,</p>
          <div class="highlighter-rouge"><pre><code>C:\ProgramData\Microsoft\Windows\Start Menu\Programs\StartUp</code></pre></div>
          <p>Right-click on the File Explorer window and choose New → Text file. Name the file <code class="highlighter-rouge">start_umkoind.bat</code>. Then right-click on it and choose Open in Notepad (or whatever editor you prefer). Copy and paste the following line into the file.</p>
          <div class="highlighter-rouge"><pre><code>C:\Program Files\Umkoin\daemon\umkoind -daemon</code></pre></div>
          <p>(If you installed Umkoin Core in a non-default directory, use that directory path instead.)</p>
          <p>Save the file. The next time you login to your computer, Umkoin Core daemon will be automatically started.</p>
          <p><strong>Warning:</strong> to prevent data corruption, do not force shutdown your computer from the Windows shutdown screen when you have Umkoin Core running.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

        <h2 id="mac-os-x-instructions">Mac OS X Instructions</h2>

        <h3 id="mac-os-x-yosemite-1010x">Mac OS X Yosemite 10.10.x</h3>
        <p><em>Instructions for Umkoin Core 0.16.0.2 on Mac OS X Yosemite</em></p>
        <p>Go to the <a href="/en/download.php">Umkoin Core download page</a> and verify you have made a secure connection to the server.</p>
        <p>Click the large blue <em>Download Umkoin Core</em> button to download the Umkoin Core installer to your Downloads folder.</p>
        <p>After downloading the file to your Downloads folder (<code class="highlighter-rouge">/Users/&lt;YOUR USER NAME&gt;/Downloads</code>), run it by double-clicking its icon. OS X will open a Finder window for you to drag <em>Umkoin Core</em> to your Applications folder.</p>

        <h4 id="osx-gui" class="no_toc">Umkoin Core GUI</h4>
        <p>The first time running <em>Umkoin Core</em>, Max OS X will ask you to confirm that you want to run it:</p>
        <p>You will be prompted to choose a directory to store the Umkoin block chain and your wallet. Unless you have a separate partition or drive you want to use, click Ok to use the default.</p>
        <p>Umkoin Core GUI will begin to download the block chain. This step will take at least several days, and it may take much more time on a slow Internet connection or with a slow computer. During the download, Umkoin Core will use a significant part of your connection bandwidth. You can stop Umkoin Core at any time by closing it; it will resume from the point where it stopped the next time you start it.</p>
        <p>After download is complete, you may use Umkoin Core as your wallet or you can just let it run to help support the Umkoin network.</p>
        <div class="box">
          <p><em>Optional: Start Your Node At Login</em></p>
          <p>Starting your node automatically each time you login to your computer makes it easy for you to contribute to the network. The easiest way to do this is to tell Umkoin Core GUI to start at login.</p>
          <p>While running Umkoin Core GUI, open the Umkoin Core menu and choose Preferences. On the Main tab, click <em>Start Umkoin on system login</em>. Click the Ok button to save the new settings.</p>
          <p>The next time you login to your desktop, Umkoin Core GUI will be automatically started minimized in the task bar.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

        <h4 id="osx-daemon" class="no_toc">Umkoin Core Daemon</h4>
        <p>The Umkoin Core daemon (umkoind) is not included in the .dmg file you may have downloaded to install Umkoin-QT. Umkoind, along with its support binaries, is instead included in the OS X .tar.gz file listed on the official Umkoin Core download page. To download this file using Terminal, execute the following command:</p>
        <div class="highlighter-rouge"><pre><code>curl -O http://umkoin.org/releases/umkoin-0.16.0.2-osx64.tar.gz</code></pre></div>
        <p>Extract umkoind and its support binaries from the archive we just downloaded by running this command in Terminal:</p>
        <div class="highlighter-rouge"><pre><code>tar -zxf umkoin-0.16.0.2-osx64.tar.gz</code></pre></div>
        <p>Now we’ll move the executables into your default path to make running and stopping umkoind easier. To move the executables, run these commands (note that we have to use <code class="highlighter-rouge">sudo</code> to perform these commands since we are modifying directories owned by root):</p>
        <div class="highlighter-rouge"><pre><code>sudo mkdir -p /usr/local/bin<br />sudo cp umkoin-0.16.0.2/bin/umkoin* /usr/local/bin/.</code></pre></div>
        <p>To clean up the directory we’ve been working in, run:</p>
        <div class="highlighter-rouge"><pre><code>rm -rf umkoin-0.16.0.2*</code></pre></div>
        <p>You should now be able to start up your full node by running <code class="highlighter-rouge">umkoind -daemon</code> in any Terminal window. If you need to stop umkoind for any reason, the command is <code class="highlighter-rouge">umkoin-cli stop</code></p>
        <div class="box">
          <p><em>Optional: Start Your Node At Login</em></p>
          <p>Starting your node automatically each time you login to your computer makes it easy for you to contribute to the network. The easiest way to do this is to tell Umkoin Core Daemon to start at login. In OS X, the way to start background programs at login is using a Launch Agent. Here is how to install a Launch Agent for Umkoin Core daemon on your machine:</p>
          <div class="highlighter-rouge"><pre><code>mkdir ~/Library/LaunchAgents<br />curl https://github.com/umkoin/umkoin/tree/master/contrib/init/org.umkoin.umkoind.plist &gt; ~/Library/LaunchAgents/org.umkoin.umkoind.plist</code></pre></div>
          <p>The next time you login to your desktop, Umkoin Core daemon will be automatically started.</p>
        </div>
        <p>You have now completed installing Umkoin Core. If you have any questions, please ask in one of Umkoin’s communities.</p>
        <p>To support the Umkoin network, you also need to allow incoming connections. Please read the <a href="#network-configuration">Network Configuration</a> section for details.</p>

<!-- CONTINUE //-->

      <h2 id="upgrading-umkoin-core">Upgrading Umkoin Core</h2>
      <p>If you are running an older version, shut it down. Wait until it has completely shut down (which might take a few minutes for older versions), then run the installer (on Windows) or just copy over /Applications/Umkoin-Qt (on Mac) or umkoind/umkoin-qt (on Linux).</p>
      <p>The blockchain and wallet files in the data directory are compatible between versions so there is no requirement to make any changes to the data directory when upgrading. Occasionally the format of those files changes, but the new Umkoin Core version will include code that automatically upgrades the files to the new format so no manual intervention is required.</p>
      <p>Sometimes upgrade of the blockchain data files from very old versions to the new versions is not supported. In those cases it may be necessary to redownload the blockchain. Check the release notes of the new version if you are planning to upgrade from a very old version.</p>
      <p>Sometimes downgrade is not possible because of changes to the data files. Again, check the release notes for the new version if you are planning to downgrade.</p>

      <h2 id="network-configuration">Network Configuration</h2>
      <p>If you want to support the Umkoin network, you must allow inbound connections.</p>
      <p>When Umkoin Core starts, it establishes 8 outbound connections to other full nodes so it can download the latest blocks and transactions. If you just want to use your full node as a wallet, you don’t need more than these 8 connections—but if you want to support lightweight clients and other full nodes on the network, you must allow inbound connections.</p>
      <p>Servers connected directly to the Internet usually don’t require any special configuration. You can use the testing instructions below to confirm your server-based node accepts inbound connections.</p>
      <p>Home connections are usually filtered by a router or modem. Umkoin Core will request your router automatically configure itself to allow inbound connections to Umkoin’s port 6333. Unfortunately many routers don’t allow automatic configuration, so you must manually configure your router. You may also need to configure your firewall to allow inbound connections to port 6333. Please see the following subsections for details.</p>

      <h3 id="testing-connections">Testing Connections</h3>
      <p>The BitNodes project provides an online tool to let you test whether your node accepts inbound connections. To use it, start Umkoin Core (either the GUI or the daemon), wait 10 minutes, and then <a href="https://bitnodes.21.co/#join-the-network">visit the Bitnodes page</a>. The tool will attempt to guess your IP address—if the address is wrong (or blank), you will need to enter your address manually.</p>
      <p>After you press Check Node, the tool will inform you whether your port is open (green box) or not open (red box). If you get the green box, you don’t need to do anything—you accept inbound connections. If you get the red box, please read the <a href="#enabling-connections">enabling connections</a> subsection.</p>
      <p>For confirmation that you accept inbound connections, you can use Umkoin Core. Umkoin Core can’t tell you directly whether you allow inbound connections, but it can tell you whether or not you currently have any inbound connections. If your node has been online for at least 30 minutes, it should normally have inbound connections. If want to check your peer info using Umkoin Core, choose the appropriate instructions below:</p>
      <ul>
        <li>
          <p><a href="#gui-peer-info">Peer info in Umkoin Core GUI</a></p>
        </li>
        <li>
          <p><a href="#daemon-peer-info">Peer info in Umkoin Core daemon</a></p>
        </li>
      </ul>

      <h4 id="gui-peer-info">GUI Peer Info</h4>
      <p>In the bottom right corner of the Umkoin Core GUI are several icons. If you hover over the signal strength icon, it will tell you how many connections you have. The icon won’t turn green until you have more than 8 active connections, which only happens if inbound connections are allowed.</p>
      <p>For confirmation, you can go to the Help menu, choose Debug Window, and open the Information tab. In the Network section, it will tell you exactly how many inbound connections you have. If the number is greater than zero, then inbound connections are allowed.</p>
      <p>If you don’t have inbound connections, please read the instructions for <a href="#enabling-connections">enabling inbound connections.</a></p>

      <h4 id="daemon-peer-info">Daemon Peer Info</h4>
      <p>The <a href="/en/developer-reference#getconnectioncount"><code class="highlighter-rouge">getconnectioncount</code></a> command will tell you how many connections you have. If you have more than 8 connections, inbound connections are allowed. For example:</p>
      <pre>$ <b>umkoin-cli getconnectioncount</b><br />52</pre>
      <p>For confirmation, you can use the <a href="/en/developer-reference#getpeerinfo"><code class="highlighter-rouge">getpeerinfo</code></a> command to get information about all of your peers. Each peer’s details will include an <code class="highlighter-rouge">inbound</code> field set to true if the connection is inbound. If you have any inbound connections, then inbound connections are allowed.</p>
      <p>If you don’t have inbound connections, please read instructions for <a href="#enabling-connections">enabling inbound connections.</a></p>

      <h3 id="enabling-connections">Enabling Connections</h3>
      <p>If Umkoin Core can’t automatically configure your router to open port 6333, you will need to manually configure your router. We’ve tried to make the following instructions generic enough to cover most router models; if you need specific help with your router, please ask for help on a tech support site such as <a href="http://superuser.com/">SuperUser</a>.</p>
      <p>Enabling inbound connections requires two steps, plus an extra third step for firewall users:</p>
      <ol>
        <li>
          <p>Giving your computer a static (unchanging) internal IP address by configuring the Dynamic Host Configuration Protocol (DHCP) on your router.</p>
        </li>
        <li>
          <p>Forwarding inbound connections from the Internet through your router to your computer where Umkoin Core can process them.</p>
        </li>
        <li>
          <p>Configuring your firewall to allow inbound connections. This step mainly applies to Windows users, as Mac OS X and most Linuxes do not enable a firewall by default.</p>
        </li>
      </ol>

      <h4 id="configuring-dhcp">Configuring DHCP</h4>
      <p>In order for your router to direct incoming port 6333 connections to your computer, it needs to know your computer’s internal IP address. However, routers usually give computers dynamic IP addresses that change frequently, so we need to ensure your router always gives your computer the same internal IP address.</p>
      <p>Start by logging into your router’s administration interface. Most routers can be configured using one of the following URLs, so keep clicking links until you find one that works. If none work, consult your router’s manual.</p>
      <ul>
        <li><a href="http://192.168.0.1">http://192.168.0.1</a> (some Linksys/Cisco models)</li>
        <li><a href="http://192.168.1.1">http://192.168.1.1</a> (some D-Link/Netgear models)</li>
        <li><a href="http://192.168.2.1">http://192.168.2.1</a> (some Belkin/SMC models)</li>
        <li><a href="http://192.168.123.254">http://192.168.123.254</a> (some US Robotics models)</li>
        <li><a href="http://10.0.1.1">http://10.0.1.1</a> (some Apple models)</li>
      </ul>
      <p>Upon connecting, you will probably be prompted for a username and password. If you configured a password, enter it now. If not, the <a href="http://www.routerpasswords.com/">Router Passwords site</a> provides a database of known default username and password pairs.</p>
      <p>After logging in, you want to search your router’s menus for options related to DHCP, the Dynamic Host Configuration Protocol. These options may also be called Address Reservation. For example, the router page shown below calls the option we need “DHCP Reservation”:</p>
      <p>In the reservation configuration, some routers will display a list of computers and devices currently connected to your network, and then let you select a device to make its current IP address permanent:</p>
      <p>If that’s the case, find the computer running Umkoin Core in the list, select it, and add it to the list of reserved addresses. Make a note of its current IP address—we’ll use the address in the next section.</p>
      <p>Other routers require a more manual configuration. For these routers, you will need to look up the fixed address (MAC address) for your computer’s network card and add it to the list. This operation differs by operating system:</p>

      <ul>
        <li>
          <p><strong>Windows 7 &amp; 8:</strong> Press Win-R (Windows key plus the R key) to open the Run dialog. Type <code class="highlighter-rouge">cmd</code> to open the console. Type <code class="highlighter-rouge">ipconfig /all</code> and find the result that best matches your connection—usually a wireless connection. Look for a line that starts with “Physical Address” and contains a value like this:</p>
          <div class="highlighter-rouge"><pre><code>  Physical Address. . . . . . . . . : 01-23-45-67-89-AB</code></pre></div>
          <p>Replace all the dashes with colons, so the address looks like this: 01:23:45:67:89:AB. Use that address in the instructions below.</p>
        </li>
        <li>
          <p><strong>Linux:</strong> open a terminal and type <code class="highlighter-rouge">ifconfig</code>. Find the result that best matches your connection—a result starting with <code class="highlighter-rouge">wlan</code> indicates a wireless connection. Find the field that starts with <code class="highlighter-rouge">HWaddr</code> and copy the immediately following field that looks like 01:23:45:67:89:ab. Use that value in the instructions below.</p>
        </li>
        <li>
          <p><strong>Mac OS X:</strong> open a terminal and type <code class="highlighter-rouge">ifconfig</code>. Find the result that best matches your connection—a result starting with <code class="highlighter-rouge">en1</code> usually indicates a wireless connection. Find the field that starts with <code class="highlighter-rouge">ether:</code> and copy the immediately following field that looks like 01:23:45:67:89:ab. Use that value in the instructions below.</p>
        </li>
      </ul>

      <p>Once you have the MAC address, you can fill it into to your router’s manual DHCP assignment table, as illustrated below. Also choose an IP address and make a note of it for the instructions in the next subsection. After entering this information, click the Add or Save button.</p>
      <p>Then reboot your computer to ensure it gets assigned the address you selected and proceed to the Port Forwarding instructions below.</p>

      <h4 id="port-forwarding">Port Forwarding</h4>
      <p>For this step, you need to know the local IP address of the computer running Umkoin Core. You should have this information from configuring the DHCP assignment table in the subsection above.</p>
      <p>Login to your router using the same steps described near the top of the <a href="#configuring-dhcp">DHCP subsection</a>. Look for an option called Port Forwarding, Port Assignment, or anything with “Port” in its name. On the some routers, this option is buried in an Applications &amp; Gaming menu.</p>
      <p>The port forwarding settings should allow you to map an external port on your router to the “internal port” of a device on your network as shown in the screenshot below.</p>
      <p>Both the external port and the internal port should be 6333 for Umkoin. (You may also want to map port 16333 for Umkoin’s testnet, although this guide does not cover using testnet.)  Make sure the IP address you enter is the same one you configured in the previous subsection.</p>
      <p>After filling in the details for the mapping, save the entry. You should not need to restart anything. Start Umkoin Core (if you haven’t already) and follow the <a href="#testing-connections">Testing Connections</a> instructions to test your connection.</p>
      <p>If you still can’t connect and you use a firewall, you probably need to change your firewall settings. See the Firewall section below.</p>
      <p>If something else went wrong, it’s probably a problem with your router configuration. Re-read the instructions above to see if you missed anything, search the web for help with “port forwarding”, and ask for help on sites like <a href="http://superuser.com">SuperUser</a>.</p>
      <p>We can’t provide direct support, but if you see a way to improve these instructions, please <a href="https://github.com/umkoin/umkoin.org/issues/new">open an issue.</a></p>

      <h4 id="firewall-configuration">Firewall Configuration</h4>
      <p>Firewalls block inbound connections. To use Umkoin, you need to configure your computer’s firewall to allow connections to port 6333. This is usually as easy as starting your firewall configuration software and defining a new rule to allow inbound connections to port 6333. For additional information for Windows, see the links below:</p>

      <ul>
        <li><a href="http://windows.microsoft.com/en-us/windows/open-port-windows-firewall#1TC=windows-7">Instructions for Windows Firewall</a></li>
        <li><a href="http://community.norton.com/en/forums/firewall-blocking-program-how-open-ports">Instructions for Norton Firewall</a></li>
        <li><a href="http://service.mcafee.com/FAQDocument.aspx?id=TS100887">Instructions for Mcafee Personal Firewall</a></li>
      </ul>
      <p>Mac OS X comes with its firewall disabled by default, but if you have enabled it, see the section Allowing Specific Applications from the <a href="http://support.apple.com/en-us/HT201642">official Apple guide.</a></p>
      <p>Ubuntu also comes with its firewall disabled by default, but if you have enabled it, see the <a href="https://help.ubuntu.com/community/Gufw">Ubuntu wiki page</a> for information about adding port forwarding rules.</p>
      <p>Once you have allowed inbound connections to port 6333, start Umkoin Core (if you haven’t already) and follow the <a href="#testing-connections">Testing Connections</a> instructions to test your connection.</p>
      <p>If something else went wrong re-read the DHCP, port forwarding, and firewall instructions above to see if you missed anything, search the web for help with “port forwarding” and “opening firewall ports”, and ask for help on sites like <a href="http://superuser.com">SuperUser</a>.</p>
      <p>We can’t provide direct support, but if you see a way to improve these instructions, please <a href="https://github.com/bitcoin-dot-org/bitcoin.org/issues/new">open an issue.</a></p>

      <h2 id="configuration-tuning">Configuration Tuning</h2>
      <p>This section contains advice about how to change your Umkoin Core configuration to adapt it to your needs.</p>
      <p>There are two ways to change your configuration. The first is to start Umkoin Core with the options you want. For example, if you want to limit it to using one CPU core for signature verification, you can start Umkoin Core like this:</p>
      <figure class="highlight"><pre><code class="language-bash" data-lang="bash"><span class="c">## Umkoin Core daemon</span><br />umkoind -par<span class="o">=</span>1 -daemon<br /><span class="c">## Umkoin Core GUI</span><br />umkoin-qt -par<span class="o">=</span>1</code></pre></figure>
      <p>Once you’ve decided you like an option, you can add it to the Umkoin Core configuration file. You can find that file in the following directories:</p>
      <ul>
        <li>
          <p>Windows: %APPDATA%\Umkoin\</p>
        </li>
        <li>
          <p>OSX: $HOME/Library/Application Support/Umkoin/</p>
        </li>
        <li>
          <p>Linux: $HOME/.umkoin/</p>
        </li>
      </ul>
      <p>To add an option to the configuration file, just remove its leading dash. You may also need to remove any quotation marks you used in your shell. For example, the <code class="highlighter-rouge">-par</code> option seen above would look like this in the configuration file:</p>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">par=1</code></pre></figure>

      <h3 id="reduce-storage">Reduce Storage</h3>
      <p>It is possible to configure your node to run in pruned mode in order to reduce storage requirements.</p>
      <p>Running a node in pruned mode is incompatible with <code class="highlighter-rouge">-txindex</code> and <code class="highlighter-rouge">-rescan</code>. It also disables the RPC <code class="highlighter-rouge">importwallet</code>. Two RPCs that are available and potentially helpful, however, are <code class="highlighter-rouge">importprunedfunds</code> and <code class="highlighter-rouge">removeprunedfunds</code>.</p>
      <p>To enable block pruning set <code class="highlighter-rouge">prune=N</code> on the command line or in <code class="highlighter-rouge">umkoin.conf</code>, where <code class="highlighter-rouge">N</code> is the number of MiB to allot for raw block and undo data.</p>
      <p>A value of <code class="highlighter-rouge">0</code> disables pruning. The minimal value above <code class="highlighter-rouge">0</code> is <code class="highlighter-rouge">550</code>. Your wallet is as secure with high values as it is with low ones. Higher values merely ensure that your node will not shut down upon blockchain reorganizations of more than 2 days - which are unlikely to happen in practice. In future releases, a higher value may also help the network as a whole because stored blocks could be served to other nodes.</p>

      <h3 id="reduce-traffic">Reduce Traffic</h3>
      <p>Some node operators need to deal with bandwidth caps imposed by their ISPs.</p>
      <p>By default, umkoin-core allows up to 125 connections to different peers, 8 of which are outbound. You can therefore, have at most 117 inbound connections.</p>
      <p>The default settings can result in relatively significant traffic consumption.</p>
      <p>Ways to reduce traffic:</p>

      <h4 id="maximum-upload-targets">Maximum Upload Targets</h4>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">-maxuploadtarget=&lt;MiB per day&gt;</code></pre></figure>
      <p>A major component of the traffic is caused by serving historic blocks to other nodes during the initial blocks download phase (syncing up a new node). This option can be specified in MiB per day and is turned off by default. This is <em>not</em> a hard limit; only a threshold to minimize the outbound traffic. When the limit is about to be reached, the uploaded data is cut by no longer serving historic blocks (blocks older than one week). Keep in mind that new nodes require other nodes that are willing to serve historic blocks. <strong>The recommended minimum is 144 blocks per day (max. 144MB per day)</strong></p>

      <h4 id="disable-listening">Disable listening</h4>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">-listen=0</code></pre></figure>
      <p>Disabling listening will result in fewer nodes connected (remember the maximum of 8 outbound peers). Fewer nodes will result in less traffic usage as you are relaying blocks and transactions to fewer nodes.</p>

      <h4 id="reduce-maximum-connections">Reduce maximum connections</h4>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">-maxconnections=&lt;num&gt;</code></pre></figure>
      <p>Reducing the maximum connected nodes to a minimum could be desirable if traffic limits are tiny. Keep in mind that umkoin’s trustless model works best if you are connected to a handful of nodes.</p>

      <h4 id="blocks-only-mode">Blocks-only mode</h4>
      <figure class="highlight"><pre><code class="language-text" data-lang="text">-blocksonly</code></pre></figure>
      <p>Causes your node to stop requesting and relaying transactions unless they are part of a block and also disables listening as described above.</p>
      <p>This reduces your node’s bandwidth to the absolute minimum necessary to stay synchronized with the network, about 150 megabytes incoming data per day and about 1 megabyte of outgoing data per day, but it does mean that your node won’t see incoming transactions until they’ve received at least one confirmation.</p>
      <p>You will still be able to send transactions from the built-in wallet or from peers you’ve whitelisted using the <code class="highlighter-rouge">-whitelist</code> parameter.</p>

    </div>

    <script>updateToc();</script>

  </div>

</div>

<script src="/js/umkoin-core.js"></script>


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
