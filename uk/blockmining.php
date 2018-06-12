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
<html lang="uk">


<head>
<?php include 'head'; ?>
<title>Видобуток Блоку - Умкойн</title>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><img src="/img/icons/ico_mining.svg"> Видобуток Блоку Умкойн</h1>

    <h2>Пул майнерів</h2>
    <p>Для обробки транзакцій та захисту мережі Умкойн, налаштовано пул для видобутку блоків, до якого може долучитися будь-хто. Не зволікайте і приєднуйтесь до мережі Умкойн, робіть свій внесок і отримуйте умкойни.</p>

    <h2>Стисла статистика</h2>
    <table>
    <thead>
      <tr style="text-align: center">
        <th>Кількість майнерів</th>
        <th>Швидкість видобутку</th>
      </tr>
    </thead>
    <tbody>
      <tr style="text-align: center">
        <td style="text-align: center"><?php echo $workercount; ?></td>
        <td style="text-align: center"><?php echo $poolhashrate; ?></td>
      </tr>
    </tbody>
    </table>

    <h2>Розпочніть видобуток</h2>
    <p>Ви можете приєднатись до пулу майнерів і почати видобуток умкойнів водночас допомагаючи обробляти транзакції. Для захисту мережі, слушною буде порада приєднуватись в менші пули та надавати перевагу децентралізованим пулам з підтримкою getblocktemplate (GBT).</p>
    <table>
    <thead>
     <tr>
       <th colspan=2 style="text-align: center">Налаштування майнера</th>
     </tr>
    </thead>
    <tbody>
      <tr>
        <td>Користувач:</td>
        <td>вкажіть умкойн-адресу свого гаманця</td>
      </tr>
      <tr>
        <td>Пароль:</td>
        <td>будь-який</td>
      </tr>
      <tr>
        <td>Алгоритм:</td>
        <td>sha256</td>
      </tr>
      <tr>
        <td>URL (складність 8):</td>
        <td>stratum+tcp://pool.umkoin.org:3335</td>
      </tr>
      <tr>
        <td>URL (складність 2048):</td>
        <td>stratum+tcp://pool.umkoin.org:5335</td>
      </tr>
    </tbody>
    </table>

    <h2>Лідери видобутку</h2>
    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th>Майнер</th>
        <th>Швидкість видобутку</th>
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
