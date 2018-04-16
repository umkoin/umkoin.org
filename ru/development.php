<!DOCTYPE HTML>
<html lang="ru">


<head>
<?php include 'head'; ?>
<title>Разработка - Умкойн</title>

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

    <h1>Разработка Умкойн</h1>
    <p class="summary">Найти больше информации о текущих спецификациях, программном обеспечении и разработчиках.</p>
    <p>Разработка Умкойн ведётся с открытым исходным кодом и любой разработчик может внести свой вклад в проект. Всё, что вам может понадобиться, находится в <a href="https://github.com/umkoin/umkoin">нашем репозитории на GitHub</a>. Пожалуйста, обязательно прочитайте и следуйте процессу разработки, описанному в файле README, пишите код хорошего качества и уважайте все правила.</p>
    <p>Обсуждения разработчиков происходит на GitHub.</p>
    <p><span class="fa fa-exclamation-triangle"></span> <em>Для сообщения о проблеме, воспользуйтесь <a href="https://github.com/umkoin/umkoin/issues" target="_blank">страницей оповещения о проблеме</a>.</em></p>

    <h2 id="code-review">Проверка кода</h2>
    <p>Умкойн - это программное обеспечение, которое защищает многомиллионные активы, поэтому каждое изменение должно быть рассмотрено опытными разработчиками.</p>
    <p>Другим разработчикам может потребоваться определенное время, чтобы пересмотреть ваши запросы. Помните, что все рецензенты тратят свое собственное время и отвлекаются от собственных проектов чтобы проверить ваши запросы, поэтому будьте терпеливы и уважайте их время.</p>
    <p>Рассмотрите возможность помочь проверить запросы других пользователей. Вам не нужно быть экспертом в Умкойн, Умкойн коде, или С++ (хотя это очень помогло бы). Почти всегда найдутся публичные запросы, которые может рассмотреть любой программист.</p>

    <h2 id="starter-projects">Стартовые проекты</h2>
    <p>Хотите начать кодирование для Умкойн, но не имеете конкретного плана действий, вот несколько советов:</p>
    <ul>
      <li>
        <p><strong>Исправьте существующие проблемы:</strong> <a href="https://github.com/umkoin/umkoin/issues">трекер проблем</a> - является лучшим местом для того, чтобы внести вклад в развитие Умкойна. Перед тем, как непосредственно писать патчи для решения проблем, будет уместным прокомментировать их и узнать возможно эти вопросы уже на рассмотрении у кого-то из разработчиков.</p>
      </li>
      <li>
        <p><strong>Напишите тесты:</strong> для Умкойна написано много тестов, но пачти, которые улучшали бы покрытие тестового инструментария всегда уместны, это также является одним из путей изучения кодовой базы. Просмотрите документацию по <a href="https://github.com/umkoin/umkoin/blob/master/README.md#automated-testing">автоматическому тестированию</a>.</p>
      </li>
    </ul>

    <h2 id="spec">Документация</h2>
    <p>Если вы заинтересованы в получении дополнительной информации о технических деталях Умкойна и как использовать существующие инструменты и API, рекомендуется начать с изучения <a href="/en/developer-documentation.php">документации для разработчиков</a>.</p>

    <h2 id="more">Больше проектов ПО с открытым исходным кодом</h2>
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
      <li class="more"><a onclick="librariesShow(event)" ontouchstart="librariesShow(event);" class="link-js"><span class="fa fa-caret-down"></span> Показать еще...</a></li>
    </ul>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
