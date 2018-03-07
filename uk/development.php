<!DOCTYPE HTML>
<html lang="uk">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Розробка - Умкойн</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
<link rel="stylesheet" href="/css/sans.css">

<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

<script src="/js/jquery/jquery-1.11.2.min.js"></script>
<script src="/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div id="content" class="content">

    <h1>Розробка Умкойн</h1>
    <p class="summary">Тут ви знайдете більш детальну інформацію про чинні специфікації, програмне забезпечення та розробників.</p>
    <p>Умкойн - це програмне забезпечення з відкритим початковим кодом і кожен розробник може зробити свій внесок у проект. Все, що вам може знадобитись, знаходиться на <a href="https://github.com/umkoin/umkoin">нашому репозиторії на GitHub</a>. Будь ласка, переконайтесь, що ви прочитали та дотримуєтесь процесу розробки, що описаний у файлі README, а також пишіть код належної якості та поважайте усі настанови.</p>
    <p>Усі дискусії з питань розробки проводяться на GitHub.</p>
    <p><span class="fa fa-exclamation-triangle"></span> <em>Щоб повідомити про проблему, будь-ласка скористайтесь <a href="https://github.com/umkoin/umkoin/issues" target="_blank">сторінкою для сповіщення про проблему</a>.</em></p>

    <h2 id="code-review">Перевірка коду</h2>
    <p>Умкойн - це програмне забезпечення, яке захищає багатомільйонні активи, тому кожна зміна має бути розглянута досвіченими розробниками.</p>
    <p>Іншим розробникам може знадобитись певний час, щоб переглянути ваші запити. Пам'ятайте, що всі рецензенти витрачають свій власний час і відволікаються від власних проектів, щоб переглянути ваші запити, тож будьте терплячими і поважайте їх час.</p>
    <p>Розгляньте можливість допомогти перевірити запити інших користувачів. Вам не потрібно бути експертом в Умкойн, Умкойн коді, або С++ (хоча це б дуже допомогло). Майже завжди знайдуться публічні запити, які може розглянути будь-який програміст.</p>

    <h2 id="starter-projects">Стартові проекти</h2>
    <p>Хочете почати кодування для Умкойн, але не маєте конкретного плану дій, ось декілька порад:</p>
    <ul>
      <li>
        <p><strong>Виправте існуючі проблеми:</strong> <a href="https://github.com/umkoin/umkoin/issues">трекер проблем</a> - є найкращим місцем для того, щоб зробити внесок в розвиток Умкойну. Перед тим, як безпосередньо писати патчі для вирішення проблем, буде доречним прокоментувати їх та дізнатись чи ці питання вже на розгляді в когось із розробників.</p>
      </li>
      <li>
        <p><strong>Напишіть тести:</strong> Умкойн охоплено багатьма тестами, але пачті, які б покращували покриття тестового інструментарію завжди доречні і це також є найліпшим шляхом до вивчення кодової бази. Перегляньте докуметацію з <a href="https://github.com/umkoin/umkoin/blob/master/README.md#automated-testing">автомачтиного тестування</a>.</p>
      </li>
    </ul>

    <h2 id="spec">Документація</h2>
    <p>У випадку вашої зацікавленості у більш детальній інформації щодо технічної сторони Умкойн та способів використання існуючих інструментів та API, рекомендуємо вам почати з вивчення <a href="/en/developer-documentation.php">документації для розробників</a>.</p>

    <h2 id="more">Більше проектів ПЗ з відкритим початковим кодом</h2>
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
      <li class="more"><a onclick="librariesShow(event)" ontouchstart="librariesShow(event);" class="link-js"><span class="fa fa-caret-down"></span> Показати ще...</a></li>
    </ul>

  </div>

</div>


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
