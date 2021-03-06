<!DOCTYPE HTML>
<html lang="ru">


<head>
<?php include 'head'; ?>
<title>Как это работает? - Умкойн</title>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1>Как работает Умкойн?</h1>
    <p class="summary">Этот вопрос часто вызывает путаницу. Вот быстрое объяснение!</p>

    <h2 id="basics">Информация для новых пользователей</h2>
    <p>Как новый пользователь, вы можете <a href="/ru/getting-started.php">начать</a> пользоваться Умкойном, даже не понимая технических деталей. Как только вы установили умкойн-кошелек на свой компьютер или мобильный телефон, он сгенерирует ваш первый умкойн-адрес, которых и вы в дальнейшем можете создать столько, сколько понадобится. Вы можете сообщать свои адреса друзьям, так что они смогут платить вам или наоборот. На самом деле, это очень похоже на то как работает Email, кроме того, что умкойн-адреса следует использовать только один раз.</p>

    <p><br><img src="/img/icons/umkoin-how-it-works.svg" alt="Umkoin" /></p>

    <h2 id="balances">Балансы<span class="titlelight"> - блокчейн</span></h2>
    <p>Цепочка блоков, или блокчейн - это <b>публичный коллективный регистр</b> на котором основана вся сеть Умкойн. Все подтвержденные транзакции включаются в цепочку блоков. На основе этой информации, умкойн-кошельки могут рассчитать остаток вашего баланса и проверить, что в новых транзакциях умкойны действительно тратятся их владельцем. Целостность и хронологический порядок цепочки блоков основаны на надежной <a href="/ru/vocabulary.php#cryptography">криптографии</a>.</p>

    <h2 id="transactions">Транзакции<span class="titlelight"> - секретные ключи</span></h2>
    <p>Транзакция - это <b>передача средств между умкойн-кошельками</b>, информация о которой включается в цепочку блоков. Умкойн-кошельки содержат конфиденциальную информацию, называемую <a href="/ru/vocabulary.php#private-key"><i>секретным ключом</i></a>, которая используется, чтобы подписывать транзакции, обеспечивая математическое доказательство того, что транзакция действительно одобрена владельцем кошелька. Эта <a href="/ru/vocabulary.php#signature"><i>подпись</i></a> так же предотвращает изменение транзакции после того, как она была передана в сеть. Все транзакции транслируются между пользователями и начинают подтверждаться сетью, как правило, в течение 10 минут, при помощи процесса, называемого <a href="/ru/vocabulary.php#mining"><i>майнингом</i></a>.</p>

    <h2 id="processing">Обработка<span class="titlelight"> - майнинг</span></h2>
    <p>Майнинг - это <b>распределенная система</b>, используемая для <a href="/ru/vocabulary.php#confirmation"><i>подтверждения</i></a> ожидающих транзакций включением их в блочную цепь. Майнинг обеспечивает хронологический порядок транзакций в блочной цепи, нейтральность сети, а также позволяет разным компьютерам "договориться" о едином состоянии системы. Для того, чтобы транзакции стали подтвержденными, они должны упаковаться в <a href="/ru/vocabulary.php#block"><i>блок</i></a>, который удовлетворяет строгим криптографическим требованиям и должен быть проверен сетью. Эти правила не позволяют изменять предыдущий блок, так в таком случае все следующие блоки оказались бы невалидными. В добавок к этому, майнинг создает аналог лотереи, исключающей вероятность простого последовательного добавления блоков в цепь каким-либо пользователем. Таким образом, никто не может контролировать блочную цепь или подменять её части другими для отката своих транзакций.</p>

    <h2 id="readmore">Нужно больше информации</h2>
    <p>Это лишь краткая информация о системе. Если вы хотите получить дополнительную информацию, вы можете прочитать <a href="/ru/umkoin-paper.php">оригинальный документ</a>, который описывает архитектуру системы, или прочитать <a href="/en/developer-documentation.php">документацию для разработчиков</a>.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
