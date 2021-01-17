<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include 'head'; ?>
<title>Download - Umkoin</title>
</head>


<body>

<?php
$version = "0.21.0";
$build =  "";
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
      <a href="/en/">Umkoin</a>
      &gt;
      <a href="/en/umkoin-core.php">Core</a>
      &gt;
      Download
  </div>

  <div id="content" class="content">

    <div class="download">

      <h1><i class="fa fa-download"></i> Download Umkoin Core</h1>

      <h2>Latest version: <?php print($version); ?></h2>

      <div class="downloadbox">
      <p>Choose your operating system</p>

      <div>

        <div>
          <img src="/img/os/med_win.png" alt="Microsoft Windows">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64-setup.exe">Windows</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64-setup.exe">exe</a> -
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64.zip">zip</a></span>
          </span>
        </div>
        <div>
          <img src="/img/os/med_osx.png" alt="Mac OS X">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-osx.dmg">Mac OS X</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-osx.dmg">dmg</a> -
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-osx64.tar.gz">tar.gz</a></span>
          </span>
        </div>
        <div>
          <img src="/img/os/med_linux.png" alt="Linux">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-x86_64-linux-gnu.tar.gz">Linux (tgz)</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-x86_64-linux-gnu.tar.gz">64 bit</a></span>
          </span>
        </div>

      </div>

      <div>

        <div>
          <img src="/img/os/med_riscv.svg" alt="linux">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-riscv64-linux-gnu.tar.gz">RISC-V Linux</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-riscv64-linux-gnu.tar.gz">64 bit</a></span>
          </span>
        </div>
        <div>
          <img src="/img/os/arm.png" alt="ARM Linux">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-arm-linux-gnueabihf.tar.gz">ARM Linux</a>
            	<span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-aarch64-linux-gnu.tar.gz">64 bit</a> -
              	<a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-arm-linux-gnueabihf.tar.gz">32 bit</a></span>
          </span>
        </div>

      </div>

      <p class="downloadmore">
        <a href="https://github.com/umkoin/umkoin"><i class="fa fa-code"></i> Source code</a>
      </p>

    </div>

    <h2><img src="/img/icons/note.svg" class="warningicon" alt="note">Check your bandwidth and space</h2>
    <p>Umkoin Core initial synchronization will take time and download a lot of data. You should make sure that you have enough bandwidth and storage for the full block chain size. If you have a good Internet connection, you can help strengthen the network by keeping your PC running with Umkoin Core and port 6333 open. Read the <a href="/en/full-node.php">full node guide</a> for details.</p>
    <p>Umkoin Core is a community-driven <a href="https://www.fsf.org/about/what-is-free-software">free software</a> project, released under the <a href="http://opensource.org/licenses/mit-license.php">MIT license</a>.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
