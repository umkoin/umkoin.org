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
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="Umkoin is an innovative payment network and a new kind of money. Find all you need to know and get started with Umkoin on umkoin.org.">

<title>Block Mining - Umkoin</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
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
    <p>In order to process transactions and secure the Umkoin network, we have set up a mining pool for general public. Feel free to join and contribute to the Umkoin network and get some umkoins.</p>

    <h2>Quick Statistics</h2>
    <table>
    <thead>
      <tr style="text-align: center">
        <th>Workers</th>
        <th>Hashrate</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $workercount; ?></td>
        <td><?php echo $poolhashrate; ?></td>
      </tr>
    </tbody>
    </table>

    <h2>Start Mining</h2>
    <p>You can start mining umkoins to help processing transactions. In order to protect the network, you should join smaller mining pools and prefer decentralized pools with getblocktemplate (GBT) support.</p>
    <p>Use configuration for you miner:</p>
    <table>
    <tr>
      <td>Username:</td>
      <td>your umkoin wallet address</td>
    </tr>
    <tr>
      <td>Password:</td>
      <td>anything</td>
    </tr>
    <tr>
      <td>Algorithm:</td>
      <td>sha256</td>
    </tr>
    <tr>
      <td>URL (difficulty 16):</td>
      <td>stratum+tcp://pool.umkoin.org:3335</td>
    </tr>
    <tr>
      <td>URL (difficulty 512):</td>
      <td>stratum+tcp://pool.umkoin.org:5335</td>
    </tr>
    </table>

    <h2>Top Miners</h2>
    <table width="100%">
    <tr>
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
  echo "<td>" . $minerhashrate[array_keys($minershares)[$i]] . "</td>";
  echo "</tr>";
}

?>
    </tr>
    </table>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
