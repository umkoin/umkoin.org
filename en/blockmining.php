<?php


/**
   Check which Network shall information be provided on.
   By default use Mainnet.
**/
$network = (isset($_GET['net']) && $_GET['net'] == 'testnet') ? "testnet" : "mainnet";
$coin = (isset($_GET['net']) && $_GET['net'] == 'testnet') ? "umkoint" : "umkoinm";


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

$workers = $strdecoded["pools"][$coin]["workers"];
$workercount = $strdecoded["pools"][$coin]["workerCount"];
$poolhashrate = $strdecoded["pools"][$coin]["hashrateString"];

?>


<!DOCTYPE HTML>
<html lang="en">


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
    <p>In order to process transactions and secure the Umkoin network, we have set up a mining pool for general public. Feel free to join and contribute to the Umkoin network and get some umkoins.</p>

    <?php
    $holder = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network;

    if(!empty($_SERVER['QUERY_STRING'])) {
        $holder = $_SERVER['REQUEST_URI'];
    }

    $h2str = "<h2>Quick Statistics " .
             "<select style='border:0' onchange='if (this.value) window.location.href=this.value'>" .
             "    <option " . (($network == "mainnet") ? 'selected' : '') . " value='" . str_replace('testnet','mainnet',$holder) . "'>mainnet</option>" .
             "    <option " . (($network == "testnet") ? 'selected' : '') . " value='" . str_replace('mainnet','testnet',$holder) . "'>testnet</option>" .
             "</select>" .
             "</h2>";

    print($h2str);
    ?>
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
    <p>You can start mining umkoins to help processing transactions. In order to protect the network, you should join smaller mining pools and prefer decentralized pools with getblocktemplate (GBT) support.</p>
    <table>
    <thead>
     <tr>
       <th colspan=2 style="text-align: center">Miner configuration</th>
     </tr>
    </thead>
    <tbody>
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
