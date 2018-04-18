<?php

/* Load configuration file */
require "../include/config.php";

$url = "http://" . $poolhost . ":" . $poolport . "/api/stats";

$ch = curl_init();
curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_PORT, $poolport);
$str = curl_exec($ch);
curl_close($ch);

$strdecoded = json_decode($str, true);

$workers = $strdecoded["pools"]["umkoin"]["workers"];
$workercount = $strdecoded["pools"]["umkoin"]["workerCount"];
$poolhashrate = $strdecoded["pools"]["umkoin"]["hashrateString"];

?>


<!DOCTYPE HTML>
<html lang="ru">


<head>
<?php include 'head'; ?>
<title>Майнинг - Умкойн</title>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><img src="/img/icons/ico_mining.svg"> Майнинг Умкойн</h1>

    <h2>Пул майнеров</h2>
    <p>Для обработки транзакций и защиты сети Умкойн, настроен майнинг пул, принять участие в работе которого может любой желающий. Не медлите и присоединяйтесь к сети Умкойн, делайте свой вклад и получайте умкойны.</p>

    <h2>Краткая статистика</h2>
    <table>
    <thead>
      <tr style="text-align: center">
        <th>Количество майнеров</th>
        <th>Скорость майнинга</th>
      </tr>
    </thead>
    <tbody>
      <tr style="text-align: center">
        <td style="text-align: center"><?php echo $workercount; ?></td>
        <td style="text-align: center"><?php echo $poolhashrate; ?></td>
      </tr>
    </tbody>
    </table>

    <h2>Начните майнить</h2>
    <p>Вы можете присоединиться к пулу майнеров и начать добычу умкойнов, одновременно помогая обрабатывать транзакции. Для защиты сети, рекомендуется присоединяться к небольшим пулам и отдавать предпочтение децентрализованным пулам с поддержкой getblocktemplate (GBT).</p>
    <table>
    <thead>
     <tr>
       <th colspan=2 style="text-align: center">Настройки майнера</th>
     </tr>
    </thead>
    <tbody>
      <tr>
        <td>Пользователь:</td>
        <td>укажите умкойн-адрес свого кошелька</td>
      </tr>
      <tr>
        <td>Пароль:</td>
        <td>любой</td>
      </tr>
      <tr>
        <td>Алгоритм:</td>
        <td>sha256</td>
      </tr>
      <tr>
        <td>URL (скложность 16):</td>
        <td>stratum+tcp://pool.umkoin.org:3335</td>
      </tr>
      <tr>
        <td>URL (сложность 512):</td>
        <td>stratum+tcp://pool.umkoin.org:5335</td>
      </tr>
    </tbody>
    </table>

    <h2>Лидеры майнинга</h2>
    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th>Майнер</th>
        <th>Скорость добычи</th>
      </tr>
    </thead>
    <tbody>
<?php

$minershares = [];
$minerhashrate = [];

for ($i = 0; $i < $workercount; $i++) {
    $minershares[array_keys($workers)[$i]] = array_values($workers)[$i]["shares"];
    $minerhashrate[array_keys($workers)[$i]] = array_values($workers)[$i]["hashrateString"];
}

arsort($minershares);

for ($i = 0; $i < (($workercount < 10) ? $workercount : 9); $i++) {
  echo "<tr>";
  echo "<td>" . array_keys($minershares)[$i] . "</td>";
  echo "<td style='text-align: center'>" . $minerhashrate[array_keys($minershares)[$i]] . "</td>";
  echo "</tr>";
}

?>
    </tbody>
    </table>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
