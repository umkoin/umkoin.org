<!DOCTYPE HTML>
<html lang="ru">


<head>
<?php include 'head'?>
<title>Загрузки - Умкойн</title>
</head>


<body>

<?php
$version = "0.16.3";
$build =  "";
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
      <a href="/ru/">Умкойн</a>
      &gt;
      <a href="/ru/umkoin-core.php">Core</a>
      &gt;
      Download
  </div>

  <div id="content" class="content">

    <div class="download">

      <h1><i class="fa fa-download"></i> Загрузить Умкойн Core</h1>

      <h2>Последняя версия: <?php print($version); ?></h2>

      <div class="downloadbox">
      <p>Выберите свою операционную систему</p>
      <div>
        <div>
          <img src="/img/os/med_win.png" alt="windows">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64-setup.exe">Windows</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64-setup.exe">64 bit</a> -
              <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win32-setup.exe">32 bit</a></span>
          </span>
        </div>
        <div>
          <img src="/img/os/med_win.png" alt="windows">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64.zip">Windows (zip)</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win64.zip">64 bit</a> -
              <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-win32.zip">32 bit</a></span>
          </span>
        </div>
        <div>
          <img src="/img/os/med_osx.png" alt="osx">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-osx.dmg">Mac OS X</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-osx.dmg">dmg</a> -
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-osx64.tar.gz">tar.gz</a></span>
          </span>
        </div>
      </div>
      <div>
        <div>
          <img src="/img/os/med_linux.png" alt="linux">
          <span>
            <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-x86_64-linux-gnu.tar.gz">Linux (tgz)</a>
            <span><a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-x86_64-linux-gnu.tar.gz">64 bit</a> -
              <a href="/bin/umkoin-core-<?php print($version); ?>/umkoin-<?php print($version . $build); ?>-i686-pc-linux-gnu.tar.gz">32 bit</a></span>
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
        <a href="https://github.com/umkoin/umkoin"><i class="fa fa-code"></i> Исходный код</a>
      </p>
    </div>

    <h2><img src="/img/icons/note.svg" class="warningicon" alt="note">Проверьте ширину канала и место на диске</h2>
    <p>Начальная синхронизация Умкойн Core может занять длительное время и требует загрузки большого количества данных. Убедитесь, что у вас достаточно пропускной способности и свободного места для хранения полной цепочки блоков. Если у вас скоростное соединение с Интернетом, вы можете помочь в укреплении сети, держа компьютер с Умкойн Core и порт 6333 открытым. Ознакомьтесь с <a href="/ru/full-node.php">руководством полного узла</a>.</p>
    <p>Умкойн Core - <a href="https://www.fsf.org/about/what-is-free-software">свободный проект с открытым исходным кодом</a>, разрабатываемый коллективно и распространяется по условиям <a href="http://opensource.org/licenses/mit-license.php">лицензии MIT</a>.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
