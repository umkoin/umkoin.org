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
                "<td style='word-wrap: normal;'>" . $block->getTxVinAmount($res[$flag][$i]["txid"], $res[$flag][$i]["vout"]) . " УМК</td>" .
                "<td style='word-wrap: break-word; word-break: break-all; white-space: normal;'><a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?txid=" . $res[$flag][$i]["txid"] . "'>" . $res[$flag][$i]["txid"] . "</a></td>" .
                "<td>" . (isset($addresses_str) ? $addresses_str : "") . "</td>" .
                "</tr>";
      } else {
        $str .= "<tr'>" .
                "<td>" . $block->getreward($res["blockhash"], "hash") . " УМК</td>" .
                "<td>Винагорода за видобуток блоку</td>" .
                "<td>Базова транзакція</td>" .
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
<html lang="uk">


<head>
<?php include 'head'; ?>
<title>Дослідження Блоку - Умкойн</title>

<script>
function displaySearch(type) {

  htmlString = "<form method='get' action='blockexplorer.php'>" +
               "<input name='" + type + "' placeholder='Шукати в ланцюгу блоків'>" +
               "<button type='submit'><span><i class='fa fa-search'></i></span> Пошук</button>" +
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

    <h1><i class="fa fa-search"></i> Дослідження Блоку Умкойн</h1>

    <h2>Стисла Статистика</h2>
    <table width="100%">
    <thead>
      <tr style="text-align: center">
        <th onclick="displaySearch('block');"><i class="fa fa-cubes"></i> Блок</th>
        <th onclick="displaySearch('txid');"><i class="fa fa-exchange"></i> Транзакція</th>
        <th><i class="fa fa-bank"></i> Емісія</th>
        <th><i class="fa fa-industry"></i> Видобуток</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span title="Поточна кількість видобутих блоків починаючи з нульового."><i class="fa fa-signal"></i> <?php print("<a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?block=" . $block->getblockcount() . "'>" . $block->getblockcount() . "</a>"); ?></span>
        </td>
        <td>
          <span title="Кількість транзакцій в мережі за секунду."><i class="fa fa-dashboard"></i> <?php print(round($block->getTxRate(), 4)); ?></span>
        </td>
        <td>
          <span title="Відсоток емітованих монет від загальної кількості."><i class="fa fa-circle-o-notch"></i> <?php print(round($block->getsupply() * 100 / 21000000, 4)); ?>%</span>
        </td>
        <td>
          <span title="Поточна оцінка швидкості обробки хешів."><i class="fa fa-dashboard"></i> <?php print(prettynum($block->getnetworkhashps(), "G", 3)); ?>H/s</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Складність останнього видобутого блоку."><i class="fa fa-lock"></i> <?php print(prettynum($block->getdifficulty(), "K", 4)); ?></span>
        </td>
        <td>
          <span title="Загальна кількість транзакцій в мережі."><i class="fa fa-database"></i> <?php print($block->getTxCount()); ?></span>
        </td>
        <td>
          <span title="Поточна кількість Умкойнів в обігу."><i class="fa fa-money"></i> <?php print($block->getsupply()); ?> УМК</span>
        </td>
        <td>
          <span title="Поточний розмір винагороди (за останній видобутий блок)."><i class="fa fa-money"></i> <?php print($block->getreward()); ?> УМК</span>
        </td>
      </tr>
      <tr>
        <td>
          <span title="Тривалість видобутку осаннього блока."><i class="fa fa-hourglass-start"></i> <?php print(gmdate("H:i:s", $block->getsolvetime())); ?></span>
        </td>
        <td >
          <?php ($block->getUnconfirmedTxCount() > 0) ? print("<span title='Непідтверджені Транзакції'><i class='fa fa-refresh'></i> В черзі - " . $block->getUnconfirmedTxCount() . "</span>") : false; ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
    </table>

    <p id="notifier"><i class="fa fa-exclamation-triangle"></i> Натисніть заголовок табличного стовпчика для того, щоб з'явилась форма пошуку.</p>

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
                "<div title='Індекс блоку в ланцюгу, починаючи з нульового (генезис-блок).'><i class='fa fa-signal'></i> Індекс: " . $block->getBlockHeight($reqval) . "</div>" .
                "<div title='Позначка часу видобутку блоку за Грінвічем. Корректність позначки часу залежить від майнера, який видобув блок.'><i class='fa fa-clock-o'></i> Позначка часу: " . date("M d, Y H:i:s", $block->getBlockTime($reqval)) . "</div>" .
                "<div title='Оцінка складності видобутку блоку. Більш детально - це математичне очікування кількості хешів, які потрібно обробити, щоб знайти вірне значення nonce для видобутку блоку.'><i class='fa fa-lock'></i> Складність: " . $block->getBlockDifficulty($reqval) . "</div>" .
                "<div title='Кількість транзакцій в блоку, включно з базовою транзакцією (якою майнеру зараховується винагорода за видобуток блоку).'><i class='fa fa-exchange'></i> Транзакції: " .  $block->getBlockTxCount($reqval) . "</div>" .
                "<div title='Сукупний розмір всіх транзакцій в блоку, включно з базовою транзакцією.'><i class='fa fa-arrows-h'></i> Розмір транзакцій в байтах: " . $block->getblocktransactionssize($reqval) . "</div>" .
                "<div title='Розмір цілого блоку, тобто заголовок блоку сукупно з усіма транзакціями.'><i class='fa fa-arrows'></i> Розмір блоку в байтах: " . $block->getBlockSize($reqval) . "</div>" .
                "<div title='Сума всіх транзакцій в блоку.'><i class='fa fa-money'></i> Обсяг транзакцій: " . $block->getBlockAmount($reqval) . "</div>" .
                "<div title='Сума комісій всіх транзакцій в блоку.'><i class='fa fa-money'></i> Комісія за транзакції: " . $block->getBlockFee($reqval) . "</div>" .
                "<div title='Базова ставка винагороди за видобуток блоку. Не залежить від кількості опрацьованих в блоку транзакцій. Це мінімальна винагорода для майнера, який видобув блок, навіть якби в блоку була лише одна базова транзакція.'><i class='fa fa-money'></i> Базова винагорода: " . $block->getbasereward($reqval, "hash") . "</div>" .
                "<div title='Фактична сума винагороди за видобуток блоку.'><i class='fa fa-money'></i> Винагорода: " . $block->getreward($reqval, "hash") . "</div>" .

                "<h2><i class='fa fa-exchange'></i> Транзакції</h2>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-paw'></i> Хеш</th>" .
                    "<th><i class='fa fa-money'></i> Комісія</th>" .
                    "<th><i class='fa fa-money'></i> Сума</th>" .
                    "<th><i class='fa fa-arrows-h'></i> Розмір</th>" .
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
                $elapsed_str = $elapsed . " рік тому";
              else
                $elapsed_str = $elapsed . " років тому";
              break;
            case $elapsed > 86400:
              $elapsed = floor($elapsed / 86400);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " день тому";
              else
                $elapsed_str = $elapsed . " днів тому";
              break;
            case $elapsed > 3600:
              $elapsed = floor($elapsed / 3600);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " годину тому";
              else
                $elapsed_str = $elapsed . " годин тому";
              break;
            case $elapsed > 60:
              $elapsed = floor($elapsed / 60);
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " хвилину тому";
              else
                $elapsed_str = $elapsed . " хвилин тому";
              break;
            default:
              if ($elapsed == 1)
                $elapsed_str = $elapsed . " секунду тому";
              else
                $elapsed_str = $elapsed . " секунд тому";
              break;
          }
          $blockconfirmed = "<div title='Кількість підтвердженб мережею.'>" .
                            "<i class='fa fa-legal'></i> Підтверджень: " .
                            $block->getTxConfirmCount($reqval) .
                            ", з <i class='fa fa-clock-o'></i> " .
                            date("M d, Y H:i:s", $block->getTxConfirmTime($reqval)) .
                            " (" . (isset($elapsed_str) ? $elapsed_str : "") . ")</div>";
        }

        $str .= "<div id='viewer' width='100%'>" .

                "<h2><i class='fa fa-exchange'></i> Транзакція " . $reqval . "</h2>" .
                "<div title='Унікальний відбиток транзакції.'><i class='fa fa-paw'></i> Хеш: " . $block->getTxHash($reqval) . "</div>" .
                (isset($blockconfirmed) ? $blockconfirmed : "<div><i class='fa fa-refresh'></i> Непідтверджена транзакція.</div>") .
                "<div title='Гроші, які йдуть на оплату майнера з видобутку блоку, в який включено цю транзакцію.'><i class='fa fa-money'></i> Комісія: " . $block->getTxFee($reqval) . "</div>" .
                "<div title='Загальна сума всіх виходів в транзакції. Зауважте, ця сума не обов&#39;язково відображає суму сплачену між учасниками, оскільки в ній також враховується здача, яка повертається ініціатору платежу.'><i class='fa fa-money'></i> Вихідна сума: " . $block->getTxSum($reqval) . "</div>" .
                "<div title='Розмір транзакції в байтах.'><i class='fa fa-arrows-h'></i> Розмір: " . $block->getTxSize($reqval) . "</div>" .

                "<h3><i class='fa fa-cube'></i> В блоку</h3>" .
                "<div><i class='fa fa-paw'></i> Хеш: <a href='http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?block=" . $block->getBlockHashByTxid($reqval) . "'>" . $block->getBlockHashByTxid($reqval) . "</a></div>" .
                "<div><i class='fa fa-signal'></i> Блок: " . $block->getBlockHeight($reqval, "txid") . "</div>" .
                "<div><i class='fa fa-clock-o'></i> Позначка часу: " . date("M d, Y H:i:s", $block->getBlockTime($reqval, "txid")) . "</div>" .

                "<h3><i class='fa fa-sign-in'></i> Входи (" . $block->getTxCountInOut($reqval, "vin") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Сума</th>" .
                    "<th><i class='fa fa-paw'></i> Хеш</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Адреса</th>" .
                  "</tr>" .
                "</thead>" .
                "<tbody>" .
                  displayTxTableInOut($block, $reqval, "vin") .
                "</tbody>" .
                "</table>" .


                "<h3><i class='fa fa-sign-out'></i> Виходи (" . $block->getTxCountInOut($reqval, "vout") . ")</h3>" .
                "<table width='100%'>" .
                "<thead>" .
                  "<tr style='text-align: center'>" .
                    "<th><i class='fa fa-money'></i> Сума</th>" .
                    "<th><i class='fa fa-paw'></i> Хеш</th>" .
                    "<th><i class='fa fa-envelope-o'></i> Адреса</th>" .
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
