<!DOCTYPE HTML>
<html lang="de">


<head>
<?php include 'head'; ?>
<title>Download - Umkoin</title>
</head>


<body>

<?php
$version = "0.19.1";
$build =  "";
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
      <a href="/de/">Umkoin</a>
      &gt;
      <a href="/de/umkoin-core.php">Core</a>
      &gt;
      Download
  </div>

  <div id="content" class="content">

    <div class="download">

      <h1><i class="fa fa-download"></i> Download Umkoin Core</h1>

      <h2>Aktuelle Version: <?php print($version); ?></h2>

      <div class="downloadbox">
      <p>Oder wählen Sie ihr Betriebssystem</p>

      <div>

        <div>
          <img src="/img/os/med_win.png" alt="MIcrosoft Windows">
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
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-x86_64-linux-gnu.tar.gz">64 bit</a> -
              <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-i686-pc-linux-gnu.tar.gz">32 bit</a></span>
          </span>
        </div>

      </div>

      <div>

        <div>
          <img src="/img/os/med_riscv.svg" alt="RISC-V Linux">
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
        <a href="https://github.com/umkoin/umkoin"><i class="fa fa-code"></i> Quelltext</a>
      </p>

    </div>

    <h2><img src="/img/icons/note.svg" class="warningicon" alt="note">Überprüfen Sie ihre Bandbreite und freien Speicherplatz</h2>
    <p>Die anfängliche Synchronisierung von Umkoin Core kann sehr lange dauern und benötigt eine große Menge an Daten. Sie sollten sicherstellen, dass Sie ausreichend Bandbreite und Speicher für die volle Größe der Blockkette zur Verfügung haben. Falls Sie eine gute Internetverbindung haben, können Sie dabei helfen das Netzwerk zu stärken, indem auf ihrem PC Umkoin Core - mit geöffneten Port 6333 - laufen lassen. Lesen Sie die <a href="/en/full-node">Full Node-Guide</a> für Details.</p>
    <p>Umkoin Core is ein gemeinschaftliches, <a href="https://www.fsf.org/about/what-is-free-software">quelloffenes</a> Projekt und wurde unter der <a href="http://opensource.org/licenses/mit-license.php">MIT Lizenz</a> veröffentlicht.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
