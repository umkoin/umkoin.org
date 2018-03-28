<?php

/* Load configuration file */
require "../include/config.php";


/* Autoload and register any classes not previously loaded */
spl_autoload_register(function ($class_name){
  $classFile = "../include/" . $class_name . ".php";
  if( is_file($classFile) && ! class_exists($class_name) )
    include $classFile;
});


/* Construct underlying RPC daemon connection credentials */
$server = "$proto://$host:$port";
$auth = "$rpcuser:$rpcpass";


/* Check if debug is of correct type (boolean) */
(is_bool($debug) === true) ? $debug : false;


/* Create a Block object */
$block = new Block($server, $auth, $debug);


/* Provide human readable number formatting */
function prettynum($val, $index = "K", $precision = 4) {

  $res =  "";

  switch($index) {

    case "K":
      $res = round(($val / 1024), $precision) . " K";
      break;
    case "M":
      $res = round(($val / pow(1024, 2)), $precision) . " M";
      break;
    case "G":
      $res = round(($val / pow(1024, 3)), $precision) . " G";
      break;
    case "P":
      $res = round(($val / pow(1024, 4)), $precision) . " P";
      break;
  }

  return $res;
}


/*
 * Prepare transaction inputs/outputs table.
 */
function displayTxTableInOut($block, $hash, $flag = "vout") {

  $str = "";
  $res = $block->getrawtransaction($hash, true);

  if ($flag == "vin") {
    for ($i = 0; $i < $block->getTxCountInOut($hash, $flag); $i++) {
      if (!isset($res[$flag][$i]["coinbase"])) {
        $addresses = $block->getTxVinAddress($res[$flag][$i]["txid"], $res[$flag][$i]["vout"]);
        for ($j = 0; $j < count($addresses); $j++) {
          $addresses_str = "<div>" . $addresses[$j] . "</div>";
        }
        $str .= "<tr>" .
                "<td>" . $block->getTxVinAmount($res[$flag][$i]["txid"], $res[$flag][$i]["vout"]) . " UMK</td>" .
                "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'><a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?txid=" . $res[$flag][$i]["txid"] . "'>" . $res[$flag][$i]["txid"] . "</a></td>" .
                "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
                "</tr>";
      } else {
        $str .= "<tr'>" .
                "<td>" . $block->getreward($res["blockhash"], "hash") . " UMK</td>" .
                "<td>Belohnung sperren</td>" .
                "<td>Coinbase</td>" .
                "</tr>";
      }
    }

  } else {
    for ($i = 0; $i < $block->getTxCountInOut($hash, $flag); $i++) {
      if (isset($res[$flag][$i]["scriptPubKey"]["addresses"])) {
        for ($j = 0; $j < count($res[$flag][$i]["scriptPubKey"]["addresses"]); $j++) {
          $addresses_str = "<div>" . $res[$flag][$i]["scriptPubKey"]["addresses"][$j] . "</div>";
        }
      }
      $str .= "<tr>" .
              "<td>" . $res[$flag][$i]["value"] . " UMK</td>" .
              "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'>" . $res[$flag][$i]["scriptPubKey"]["hex"] . "</td>" .
              "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
              "</tr>";
    }
  }

  return $str;
}

?>

<!DOCTYPE HTML>
<html lang="de">


<head>
<?php include 'head'; ?>
<title>Block Explorer - Umkoin</title>

<script>
function displaySearch(type) {

  htmlString = "<form method='get' action='blockexplorer.php'>" +
               "<input name='" + type + "' placeholder='Search for " + type + " in Blockchain'>" +
               "<button type='submit'><span><i class='fa fa-search'></i></span> Search</button>" +
               "</form>";

  document.getElementById("notifier").style.display = "none";
  document.getElementById("searcher").innerHTML = htmlString;
  document.getElementById("searcher").style.display = "block";
  if(document.getElementById("viewer") !== null) {
    document.getElementById("viewer").style.display = "none";
    document.getElementById("viewer").innerHTML = "";
  }

  clearTimeout(timerHide);
  timerHide = setTimeout(hideSearch, 60000);
}

function hideSearch() {

  document.getElementById("notifier").style.display = "block";
  document.getElementById("searcher").style.display = "none";
  document.getElementById("searcher").innerHTML = "";
  if(document.getElementById("viewer") !== null) {
    document.getElementById("viewer").style.display = "none";
    document.getElementById("viewer").innerHTML = "";
  }
}

var timerHide = setTimeout(hideSearch, 600000);
</script>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><i class="fa fa-search"></i> Umkoin Block Explorer</h1>

    <h2>Schnelle Statistiken</h2>
    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th onclick="displaySearch('block');"><i class="fa fa-cubes"></i> Block</th>
        <th onclick="displaySearch('txid');"><i class="fa fa-exchange"></i> Transaktion</th>
        <th><i class="fa fa-bank"></i> Emission</th>
        <th><i class="fa fa-industry"></i> Mining</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span title="Blockchain-Höhe, Gesamtanzahl der Blöcke beginnend bei Null."><i class="fa fa-signal"></i> Höhe - <?php print("<a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?block=" . $block->getblockcount() . " '>" . $block->getblockcount() . "</a>"); ?></span>
        </td>
        <td>
          <span title="Die Anzahl der Transaktionen pro Sekunde im Netzwerk."><i class="fa fa-dashboard"></i> Rate - <?php print(round($block->getTxRate(), 4)); ?></span>
        </td>
        <td>
          <span title="Prozent der bereits ausgegebenen Münzen."><i class="fa fa-circle-o-notch"></i> Abdeckung - <?php print(round($block->getsupply() * 100 / 21000000, 4)); ?>%</span>
        </td>
        <td>
          <span title="Aktuelle geschätzte Netzwerk-Hash-Rate."><i class="fa fa-dashboard"></i> Hash rate - <?php print(prettynum($block->getnetworkhashps(), "G", 3)); ?>H/s</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Lastminded Block Schwierigkeit. Verhältnis, bei dem bei den aktuellen Hashing-Speed-Blöcken mit 10-Minuten-Intervall abgebaut wird."><i class="fa fa-lock"></i> Schwierigkeit - <?php print(prettynum($block->getdifficulty(), "K", 4)); ?></span>
        </td>
        <td>
          <span title="Die Anzahl der Transaktionen im Netzwerk."><i class="fa fa-database"></i> Gesamt - <?php print($block->getTxCount()); ?></span>
        </td>
        <td>
          <span title="Total UMK Angebot im Umlauf."><i class="fa fa-money"></i> Versorgung - <?php print($block->getsupply()); ?> UMK</span>
        </td>
        <td>
          <span title="Aktuelle Belohnung (für den letzten abgebauten Block)."><i class="fa fa-money"></i> Belohnung - <?php print($block->getreward()); ?> UMK</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Zeit, die für das Abbauen des letzten Blocks verstrichen ist."><i class="fa fa-hourglass-start"></i> Löse die Zeit - <?php print(gmdate("H:i:s", $block->getsolvetime())); ?></span>
        </td>
        <td >
          <?php ($block->getUnconfirmedTxCount() > 0) ? print("<span title='Unbestätigte Transaktionen'><i class='fa fa-refresh'></i> Anstehen - " . $block->getUnconfirmedTxCount() . "</span>") : false; ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
    </table>

    <p id="notifier"><i class="fa fa-exclamation-triangle"></i> Klicken Sie auf den Spaltenkopf, um ein Suchformular zu erhalten.</p>

    <br>

    <div id="searcher" width="100%" style="text-align: center; display: none;"></div>

    <?php
      $str = "";
      if (isset($_GET['block'])) {

        // Check if block value is set as height or
        // hash and convert it to hash if needed.
        $reqval = "";

        if (preg_match("/[0-9]*[a-f].*/", $_GET["block"])) {
          $reqval = $_GET["block"];
        } else {
          $reqval = $block->getblockhash(intval($_GET["block"], 10));
        }

        $str .= "<div id='viewer' width='100%'>" .

                "<h2><i class='fa fa-cube'></i> Block " . $reqval . "</h2>" .
                "<div title='Blockindex in der Kette, gezählt von Null (d. H. Genesisblock).'><i class='fa fa-signal'></i> Höhe: " . $block->getBlockHeight($reqval) . "</div>" .
                "<div title='Zeitstempel der Blockierung wird als UTC angezeigt. Die Zeitstempel-Korrektheit liegt bei Bergmann, der den Block abgebaut hat.'><i class='fa fa-clock-o'></i> Zeitstempel: " . date("M d, Y H:i:s", $block->getBlockTime($reqval)) . "</div>" .
                "<div title='Wie schwierig ist es, eine Lösung für den Block zu finden. Genauer gesagt, es ist mathematische Erwartung für die Anzahl der Hashes, die jemand berechnen muss, um einen korrekten Nonce-Wert zu finden, der den Block löst.'><i class='fa fa-lock'></i> Schwierigkeit: " . $block->getBlockDifficulty($reqval) . "</div>" .
                "<div title='Anzahl der Transaktionen im Block, einschließlich der Coinbase-Transaktion (die Block-Belohnung an den Bergmann überträgt).'><i class='fa fa-exchange'></i> Transaktionen: " .  $block->getBlockTxCount($reqval) . "</div>" .
                "<div title='Kumulative Größe aller Transaktionen im Block, einschließlich der Coinbase.'><i class='fa fa-arrows-h'></i> Gesamttransaktionsgröße, Bytes: " . $block->getblocktransactionssize($reqval) . "</div>" .
                "<div title='Größe des gesamten Blocks, d. H. Blockheader plus alle Transaktionen.'><i class='fa fa-arrows'></i> Gesamtblockgröße, Bytes: " . $block->getBlockSize($reqval) . "</div>" .
                "<div title='Summe der Werte für alle Transaktionen im Block.'><i class='fa fa-money'></i> Transaktionsbetrag: " . $block->getBlockAmount($reqval) . "</div>" .
                "<div title='Summe der Gebühren für alle Transaktionen im Block.'><i class='fa fa-money'></i> Transaktionsgebühr: " . $block->getBlockFee($reqval) . "</div>" .
                "<div title='Basiswert für die Berechnung der Blockbelohnung. Es hängt nicht davon ab, wie viele Transaktionen in den Block aufgenommen werden. Dies ist auch, wie viele Münzen der Bergmann erhalten würde, wenn der Block nur eine Coinbase-Transaktion enthält.'><i class='fa fa-money'></i> Grundbelohnung: " . $block->getbasereward($reqval, "hash") . "</div>" .
                "<div title='Tatsächliche Menge an Münzen, die der Bergmann erhielt, um den Block zu finden.'><i class='fa fa-money'></i> Belohnung: " . $block->getreward($reqval, "hash") . "</div>" .

                "<h2><i class='fa fa-exchange'></i> Transaktionen</h2>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-paw'></i> Hash</th>" .
                    "<th><i class='fa fa-money'></i> Gebühr</th>" .
                    "<th><i class='fa fa-money'></i> Gesamtmenge</th>" .
                    "<th><i class='fa fa-arrows-h'></i> Größe</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  $block->getblocktransactionshtml($reqval) .
                "</tbody>" .
                "</table>" .

                "</div>";



      } elseif (isset($_GET['txid'])) {

        // Check if txid value is set as hash.
        $reqval = "";

        if (preg_match("/[0-9]*[a-f].*/", $_GET["txid"])) {
          $reqval = $_GET["txid"];
        }

        // Check if block holding txid was mined and confirmed.
        if ($block->isConfirmed($reqval, "txid")) {
          $confirmtime = $block->getTxConfirmTime($reqval);
          $currenttime = time();
          $elapsed = $currenttime - $confirmtime;
          switch ($elapsed) {
            case $elapsed > 31536000:
              $elapsed = floor($elapsed / 31536000);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " vor einem Jahr";
              else
                $elapsed_str = $elapsed . " Jahre zuvor";
              break;
            case $elapsed > 86400:
              $elapsed = floor($elapsed / 86400);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " vor einem Tag";
              else
                $elapsed_str = $elapsed . " Vor Tagen";
              break;
            case $elapsed > 3600:
              $elapsed = floor($elapsed / 3600);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " vor einer Stunde";
              else
                $elapsed_str = $elapsed . " Vor Stunden";
              break;
            case $elapsed > 60:
              $elapsed = floor($elapsed / 60);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " vor einer Minute";
              else
                $elapsed_str = $elapsed . " Vor ein paar Minuten";
              break;
            default:
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " vor einem Sekunde";
              else
                $elapsed_str = $elapsed . " Sekunden zuvor";
              break;
          }
          $blockconfirmed = "<div title='Die Anzahl der Netzwerkbestätigungen.'>" .
                            "<i class='fa fa-legal'></i> Bestätigungen: " .
                            $block->getTxConfirmCount($reqval) .
                            ", seitdem: <i class='fa fa-clock-o'></i> " .
                            date("M d, Y H:i:s", $block->getTxConfirmTime($reqval)) .
                            " (" . (isset($elapsed_str) ? $elapsed_str : "") . ")</div>";
        }

        $str .= "<div id='viewer' width='100%'>" .

                "<h2><i class='fa fa-exchange'></i> Transaktion " . $reqval . "</h2>" .
                "<div title='Eindeutiger Fingerabdruck der Transaktion.'><i class='fa fa-paw'></i> Hash: " . $block->getTxHash($reqval) . "</div>" .
                (isset($blockconfirmed) ? $blockconfirmed : "<div><i class='fa fa-refresh'></i> Transaktion ist nicht bestätigt.</div>") .
                "<div title='Geld, das an den Bergmann geht, der diese Transaktion in Block eingeschlossen hat.'><i class='fa fa-money'></i> Gebühr: " . $block->getTxFee($reqval) . "</div>" .
                "<div title='Gesamtmenge aller Ausgaben in der Transaktion Beachten Sie, dass dies nicht unbedingt den genauen Betrag widerspiegelt, der zwischen Peers übertragen wird, da die Änderung auch als Ausgabe betrachtet wird, obwohl sie an den Transaktionsinitiator zurückgesendet wird.'><i class='fa fa-money'></i> Summe der Ausgaben: " . $block->getTxSum($reqval) . "</div>" .
                "<div title='Größe der Transaktion in Bytes.'><i class='fa fa-arrows-h'></i> Größe: " . $block->getTxSize($reqval) . "</div>" .

                "<h3><i class='fa fa-cube'></i> Im Block</h3>" .
                "<div><i class='fa fa-paw'></i> Hash: <a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?block=" . $block->getBlockHashByTxid($reqval) . "'>" . $block->getBlockHashByTxid($reqval) . "</a></div>" .
                "<div><i class='fa fa-signal'></i> Höhe: " . $block->getBlockHeight($reqval, "txid") . "</div>" .
                "<div><i class='fa fa-clock-o'></i> Zeitstempel: " . date("M d, Y H:i:s", $block->getBlockTime($reqval, "txid")) . "</div>" .

                "<h3><i class='fa fa-sign-in'></i> Eingänge (" . $block->getTxCountInOut($reqval, "vin") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Summe</th>" .
                    "<th><i class='fa fa-paw'></i> Hash</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Adresse</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  displayTxTableInOut($block, $reqval, "vin") .
                "</tbody>" .
                "</table>" .


                "<h3><i class='fa fa-sign-out'></i> Ausgänge (" . $block->getTxCountInOut($reqval, "vout") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Summe</th>" .
                    "<th><i class='fa fa-paw'></i> Hash</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Adresse</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  displayTxTableInOut($block, $reqval, "vout") .
                "</tbody>" .
                "</table>" .

                "</div>";

      }

      print($str);

    ?>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
