<!DOCTYPE HTML>
<html lang="uk">


<head>
<?php include 'head'?>
<title>Завантаження - Умкойн</title>
</head>


<body>

<?php
$version = "0.16.1";
$build =  "";
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
      <a href="/uk/">Умкойн</a>
      &gt;
      <a href="/uk/umkoin-core.php">Core</a>
      &gt;
      Download
  </div>

  <div id="content" class="content">

    <div class="download">

      <h1><i class="fa fa-download"></i> Завантажити Умкойн Core</h1>

      <h2>Остання версія: <?php print($version); ?></h2>

      <div class="downloadbox">
      <p>Оберіть свою операційну систему</p>
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
        <a href="https://github.com/umkoin/umkoin"><i class="fa fa-code"></i> Вихідний код</a>
      </p>
    </div>

    <h2><img src="/img/icons/note.svg" class="warningicon" alt="note">Перевірте пропускну здатність і місце</h2>
    <p>Початкова синхронізація Умкойн Core може зайняти тривалий час і потребує завантаження значної кількості даних. Переконайтесь, що у вас достатньо пропускної здатності та вільного місця для зберігання повного ланцюжка блоків. Якщо у вас швидкісне з'єднання з Інтернетом, ви можете допомогти у зміцненні мережі, тримаючи комп'ютер з Умкойн Core та порт 6333 відкритим. Ознайомтеся з <a href="/uk/full-node.php">керівництвом повного вузла</a>.</p>
    <p>Умкойн Core - <a href="https://www.fsf.org/about/what-is-free-software">вільний проект з відкритим початковим кодом</a>, що розробляється колективно та розповсюджується згідно умов <a href="http://opensource.org/licenses/mit-license.php">ліцензії MIT</a>.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
