<?php

/* Load configuration file */
require "../include/config.php";


/**
   Check which Network shell we provide information on

   By default, assume it is Mainnet on default RPC port TCP 6332,
   otherwise, set port to 16332 for the Testnet. No need to pro-
   vide information on Regtest network.
**/
if(isset($_GET['net'])) {
  $network = $_GET['net'];
  $port = ($network == "testnet") ? 16332 : $port;
} else {
  $network = "mainnet";
}


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
                "<td style='word-wrap: normal;'>" . $block->getTxVinAmount($res[$flag][$i]["txid"], $res[$flag][$i]["vout"]) . " УМК</td>" .
                "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'><a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network . "&txid=" . $res[$flag][$i]["txid"] . "'>" . $res[$flag][$i]["txid"] . "</a></td>" .
                "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
                "</tr>";
      } else {
        $str .= "<tr'>" .
                "<td>" . $block->getreward($res["blockhash"], "hash") . " УМК</td>" .
                "<td>Вознаграждение за найденный блок</td>" .
                "<td>Базовая транзакция</td>" .
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
              "<td style='word-wrap: normal;'>" . $res[$flag][$i]["value"] . " УМК</td>" .
              "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'>" . $res[$flag][$i]["scriptPubKey"]["hex"] . "</td>" .
              "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
              "</tr>";
    }
  }

  return $str;
}

?>

<!DOCTYPE HTML>
<html lang="ru">


<head>
<?php include 'head'; ?>
<title>Исследование Блока - Умкойн</title>

<script>
function displaySearch(type) {

  htmlString = "<form method='get' action='blockexplorer.php'>" +
               "<input hidden name='net' value='<?php echo $network; ?>'>" +
               "<input name='" + type + "' placeholder='Искать в цепочке блоков'>" +
               "<button type='submit'><span><i class='fa fa-search'></i></span> Поиск</button>" +
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

    <h1><i class="fa fa-search"></i> Исследование Блока Умкойн</h1>

    <?php
    $holder = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network;

    if(!empty($_SERVER['QUERY_STRING'])) {
        $holder = $_SERVER['REQUEST_URI'];
    }

    $h2str = "<h2>Краткая Статистика " .
             "<select style='border:0' onchange='if (this.value) window.location.href=this.value'>" .
             "    <option " . (($network == "mainnet") ? 'selected' : '') . " value='" . str_replace('testnet','mainnet',$holder) . "'>mainnet</option>" .
             "    <option " . (($network == "testnet") ? 'selected' : '') . " value='" . str_replace('mainnet','testnet',$holder) . "'>testnet</option>" .
             "</select>" .
             "</h2>";

    print($h2str);
    ?>

    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th onclick="displaySearch('block');"><i class="fa fa-cubes"></i> Блок</th>
        <th onclick="displaySearch('txid');"><i class="fa fa-exchange"></i> Транзакция</th>
        <th><i class="fa fa-bank"></i> Эмиссия</th>
        <th><i class="fa fa-industry"></i> Вознаграждение</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span title="Текущее количество добытых блоков начиная с нулевого."><i class="fa fa-signal"></i> <?php print("<a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network . "&block=" . $block->getblockcount() . "'>" . $block->getblockcount() . "</a>"); ?></span>
        </td>
        <td>
          <span title="Количество транзакций в сети за секунду."><i class="fa fa-dashboard"></i> <?php print(round($block->getTxRate(), 4)); ?></span>
        </td>
        <td>
          <span title="Процент емитированых монет от общего количества."><i class="fa fa-circle-o-notch"></i> <?php print(round($block->getsupply() * 100 / 21000000, 4)); ?>%</span>
        </td>
        <td>
          <span title="Текущая оценка скорости обработки хешей."><i class="fa fa-dashboard"></i> <?php print(prettynum($block->getnetworkhashps(), "G", 3)); ?>H/s</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Сложность последнего найденного блока."><i class="fa fa-lock"></i> <?php print(prettynum($block->getdifficulty(), "K", 4)); ?></span>
        </td>
        <td>
          <span title="Общее количество транзакций в сети."><i class="fa fa-database"></i> <?php print($block->getTxCount()); ?></span>
        </td>
        <td>
          <span title="Текущее количество Умкойнов в обращении."><i class="fa fa-money"></i> <?php print($block->getsupply()); ?> УМК</span>
        </td>
        <td>
          <span title="Текущий размер вознаграждения (за последнний найденный блок)."><i class="fa fa-money"></i> <?php print($block->getreward()); ?> УМК</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Длительность добычи последнего блока."><i class="fa fa-hourglass-start"></i> <?php print(gmdate("H:i:s", $block->getsolvetime())); ?></span>
        </td>
        <td >
          <?php ($block->getUnconfirmedTxCount() > 0) ? print("<span title='Неподтвержденные Транзакции'><i class='fa fa-refresh'></i> В очереди - " . $block->getUnconfirmedTxCount() . "</span>") : false; ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
    </table>

    <p id="notifier"><i class="fa fa-exclamation-triangle"></i> Кликнуть на заголовок столбца для того, чтобы появилась форма поиска.</p>

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

                "<h2><i class='fa fa-cube'></i> Блок " . $reqval . "</h2>" .
                "<div title='Индекс блока в цепочке, начиная с нулевого (генезис-блок).'><i class='fa fa-signal'></i> Индекс: " . $block->getBlockHeight($reqval) . "</div>" .
                "<div title='Отметка времени добычи блока по Гринвичу. Корректность отметки времени зависит от настроек майнера, добывшего блок.'><i class='fa fa-clock-o'></i> Отметка времени: " . date("M d, Y H:i:s", $block->getBlockTime($reqval)) . "</div>" .
                "<div title='Оценка сложности добычи блока. Более детально - это математическое ожидание количества хешей, которые необходимо обработать, чтобы найти верное значения nonce для добычи блока.'><i class='fa fa-lock'></i> Сложность: " . $block->getBlockDifficulty($reqval) . "</div>" .
                "<div title='Количество транзакций в блоке, включая базовую транзакцию (которой майнеру зачисляется вознаграждение за добычу блока).'><i class='fa fa-exchange'></i> Транзакции: " .  $block->getBlockTxCount($reqval) . "</div>" .
                "<div title='Совокупный размер всех транзакций в блоке, включая базовую транзакцию.'><i class='fa fa-arrows-h'></i> Размер транзакций в байтах: " . $block->getblocktransactionssize($reqval) . "</div>" .
                "<div title='Размер целого блока, тоесть заголовок блока включая все транзакции.'><i class='fa fa-arrows'></i> Размер блока в байтах: " . $block->getBlockSize($reqval) . "</div>" .
                "<div title='Сумма всех транзакций в блоке.'><i class='fa fa-money'></i> Объем транзакций: " . $block->getBlockAmount($reqval) . "</div>" .
                "<div title='Сумма комиссий всех транзакций в блоке.'><i class='fa fa-money'></i> Комиссия за транзакции: " . $block->getBlockFee($reqval) . "</div>" .
                "<div title='Базовая ставка вознаграждения за добычу блока. Не зависит от количества обработанных в блоке транзакций. Это минимальное вознаграждение майнера, который добыл блок, даже если в блоке была лишь одна базовая транзакция.'><i class='fa fa-money'></i> Базовое вознаграждение: " . $block->getbasereward($reqval, "hash") . "</div>" .
                "<div title='Фактическая сумма вознаграждения за добычу блока.'><i class='fa fa-money'></i> Вознаграждение: " . $block->getreward($reqval, "hash") . "</div>" .

                "<h2><i class='fa fa-exchange'></i> Транзакции</h2>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-paw'></i> Хеш</th>" .
                    "<th><i class='fa fa-money'></i> Комиссия</th>" .
                    "<th><i class='fa fa-money'></i> Сумма</th>" .
                    "<th><i class='fa fa-arrows-h'></i> Размер</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  $block->getblocktransactionshtml($reqval, $network) .
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
                $elapsed_str = $elapsed . " год назад";
              else
                $elapsed_str = $elapsed . " лет назад";
              break;
            case $elapsed > 86400:
              $elapsed = floor($elapsed / 86400);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " день назад";
              else
                $elapsed_str = $elapsed . " дней назад";
              break;
            case $elapsed > 3600:
              $elapsed = floor($elapsed / 3600);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " час назад";
              else
                $elapsed_str = $elapsed . " часов назад";
              break;
            case $elapsed > 60:
              $elapsed = floor($elapsed / 60);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " минуту назад";
              else
                $elapsed_str = $elapsed . " минут назад";
              break;
            default:
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " секунду назад";
              else
                $elapsed_str = $elapsed . " секунд назад";
              break;
          }
          $blockconfirmed = "<div title='Количество подтверждений в сети.'>" .
                            "<i class='fa fa-legal'></i> Подтверждений: " .
                            $block->getTxConfirmCount($reqval) .
                            ", з <i class='fa fa-clock-o'></i> " .
                            date("M d, Y H:i:s", $block->getTxConfirmTime($reqval)) .
                            " (" . (isset($elapsed_str) ? $elapsed_str : "") . ")</div>";
        }

        $str .= "<div id='viewer' width='100%'>" .

                "<h2><i class='fa fa-exchange'></i> Транзакция " . $reqval . "</h2>" .
                "<div title='Уникальный отпечаток транзакции.'><i class='fa fa-paw'></i> Хеш: " . $block->getTxHash($reqval) . "</div>" .
                (isset($blockconfirmed) ? $blockconfirmed : "<div><i class='fa fa-refresh'></i> Неподтвержденная транзакция.</div>") .
                "<div title='Средства, которые идут на оплату работы майнера по добыче блока, в который включена эта транзакция.'><i class='fa fa-money'></i> Комиссия: " . $block->getTxFee($reqval) . "</div>" .
                "<div title='Общая сумма всех выходов в транзакции. Заметьте, эта сумма не обязательно отражает сумму, перечисленную между участниками, поскольку в ней также учитывается сдача, которая возвращается инициатору платежа.'><i class='fa fa-money'></i> Исходящая сумма: " . $block->getTxSum($reqval) . "</div>" .
                "<div title='Размер транзакции в байтах.'><i class='fa fa-arrows-h'></i> Размер: " . $block->getTxSize($reqval) . "</div>" .

                "<h3><i class='fa fa-cube'></i> В блоке</h3>" .
                "<div><i class='fa fa-paw'></i> Хеш: <a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?net=" . $network . "&block=" . $block->getBlockHashByTxid($reqval) . "'>" . $block->getBlockHashByTxid($reqval) . "</a></div>" .
                "<div><i class='fa fa-signal'></i> Блок: " . $block->getBlockHeight($reqval, "txid") . "</div>" .
                "<div><i class='fa fa-clock-o'></i> Отметка времени: " . date("M d, Y H:i:s", $block->getBlockTime($reqval, "txid")) . "</div>" .

                "<h3><i class='fa fa-sign-in'></i> Входы (" . $block->getTxCountInOut($reqval, "vin") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Сумма</th>" .
                    "<th><i class='fa fa-paw'></i> Хеш</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Адрес</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  displayTxTableInOut($block, $reqval, "vin") .
                "</tbody>" .
                "</table>" .


                "<h3><i class='fa fa-sign-out'></i> Выходы (" . $block->getTxCountInOut($reqval, "vout") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Сумма</th>" .
                    "<th><i class='fa fa-paw'></i> Хеш</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Адрес</th>" .
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
