<?php


/**
   Check which Network shall information be provided on.
   By default use Mainnet.
**/
$network = (isset($_GET['net']) && $_GET['net'] == 'testnet') ? "testnet" : "mainnet";


/**
   Load configuration file corresponding to chosen Network.
**/
require "../include/config/$network.php";


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
<html lang="de">


<head>
<?php include 'head'; ?>
<title>Block Mining - Umkoin</title>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><img src="/img/icons/ico_mining.svg"> Umkoin Block Mining</h1>

    <h2>Mining Pool</h2>
    <p>Um Transaktionen abzuwickeln und das Umkoin-Netzwerk zu sichern, haben wir einen Mining-Pool für die breite Öffentlichkeit eingerichtet. Fühlen Sie sich frei, dem Umkoin-Netzwerk beizutreten und beizutragen und einige Umkoins zu bekommen.</p>

    <h2>Schnelle Statistiken</h2>
    <table>
    <thead>
      <tr style="text-align: center">
        <th>Miners</th>
        <th>Hashrate</th>
      </tr>
    </thead>
    <tbody>
      <tr style="text-align: center">
        <td><?php echo $workercount; ?></td>
        <td><?php echo $poolhashrate; ?></td>
      </tr>
    </tbody>
    </table>

    <h2>Start Mining</h2>
    <p>Sie können mit umkoins arbeiten, um Transaktionen zu verarbeiten. Um das Netzwerk zu schützen, sollten Sie kleineren Miningpools beitreten und dezentrale Pools mit GetBlockTemplate (GBT) unterstützen.</p>
    <table>
    <thead>
     <tr>
       <th colspan=2 style="text-align: center">Miner-Konfiguration</th>
     </tr>
    </thead>
    <tbody>
      <tr>
        <td>Nutzername:</td>
        <td>Ihre umkoin Brieftasche Adresse</td>
      </tr>
      <tr>
        <td>Passwort:</td>
        <td>etwas</td>
      </tr>
      <tr>
        <td>Algorithmus:</td>
        <td>sha256</td>
      </tr>
      <tr>
        <td>URL (Mainnet):</td>
        <td>stratum+tcp://pool.umkoin.org:6334</td>
      </tr>
      <tr>
        <td>URL (Testnet):</td>
        <td>stratum+tcp://pool.umkoin.org:16334</td>
      </tr>
    </tbody>
    </table>

    <h2>Top Miners</h2>
    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th>Miner</th>
        <th>Hashrate</th>
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
