<?php

$script_exec_start = microtime(true);


/**
   Check which Network shall information be provided on.
   By default use Mainnet.
**/
$network = ( isset( $_GET['net'] ) & $_GET['net'] == 'testnet' ) ? "testnet" : "mainnet";


/**
   Load configuration file corresponding to chosen Network.
**/
require "../include/config/$network.php";


/* Autoload and register any classes not previously loaded */
spl_autoload_register( function ( $class_name ){
  $classFile = "../include/" . $class_name . ".php";
  if( is_file( $classFile ) && ! class_exists( $class_name ) )
    include $classFile;
});


/* Construct underlying RPC daemon connection credentials */
$server = "$proto://$host:$port";
$auth = "$rpcuser:$rpcpass";


/* Check if debug is of correct type (boolean) */
(is_bool($debug) === true) ? $debug : false;


/* Create an API object */
$api = new Api( $server, $auth, $debug );


/* Extra function for byte-size human readability */
function format_bytes( $size, $precision = 2 ) {
    $base = log( $size, 1024 );
    $suffixes = array( '', 'Kb', 'Mb', 'Gb', 'Tb' );

    return round( pow( 1024, $base - floor( $base ) ), $precision ) .' '. $suffixes[ floor( $base ) ];
}

/* Extra function converts seconds into human readable time */
function seconds_to_time( $seconds ) {
    $dtFull = new \DateTime('@0');
    $dtText = new \DateTime("@$seconds");
    return $dtFull->diff($dtText)->format('%a days, %h hours, %i minutes and %s seconds');
}

/* Extra function decodes services into human readable format */
function decode_services( $flags ) {
    $set = '';

    $services = [
        ['NONE', 0],
        ['NETWORK', (1 << 0)],
        ['GETUTXO', (1 << 1)],
        ['BLOOM',   (1 << 2)],
        ['WITNESS', (1 << 3)],
        ['XTHIN',   (1 << 4)],
        ['NETWORK_LIMITED', (1 << 10)],
    ];

    foreach( $services as $service ) {
        if( ( $flags & $service[1] ) != 0 ) {
            $set .= $service[0].' ';
        }
    }

    return $set;
}

$localservbits  = hexdec('0x'.$api->getnetworkinfo()['localservices']);
$localservnames = decode_services($localservbits);

?>


<!DOCTYPE HTML>
<html lang="uk">


<head>
<?php include 'head'; ?>
<title>Статус Вузла - Умкойн (<?php echo $network; ?>)</title>

<style>
fieldset {
    font-size: 13px;
}

legend {
    font-weight: bold;
}
</style>
</head>


<body>


<?php include 'page_head.php'; ?>


<div class="body">

  <div class="breadcrumbs">
    <?php
      printf( "<a href='$_SERVER[PHP_SELF]?net=mainnet'>Mainnet</a> <-> <a href='$_SERVER[PHP_SELF]?net=testnet'>Testnet</a>" );
    ?>
  </div>

  <div id="content" class="content">

    <h1><img src="/img/icons/ico_mining.svg"> Статус Вузла Умкойн</h1>


    <fieldset>
    <legend>Інформація вузла (<?php echo $network; ?>)</legend>
        Версія: <?php echo $api->getnetworkinfo()['version'].' ('.$api->getnetworkinfo()['protocolversion'].')'; ?><br />
        Субверсія: <?php echo $api->getnetworkinfo()['subversion']; ?><br />
        Локальні сервіси: <?php printf("%s (0x%s)", $localservnames, dechex($localservbits)); ?><br />
        Коміссія: <?php echo $api->getnetworkinfo()['relayfee']; ?><br />
        Час в мережі: <?php echo seconds_to_time( $api->uptime() ); ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend>Інформація блокчейна</legend>
        Ланцюжок: <?php echo $api->getblockchaininfo()['chain'];?><br />
        Блоки: <?php echo $api->getblockchaininfo()['blocks']; ?><br />
        Заголовки: <?php echo $api->getblockchaininfo()['headers']; ?><br />
        Складність: <?php echo $api->getblockchaininfo()['difficulty']; ?><br />
        Середній час: <?php echo date('d/m/Y H:i:s', $api->getblockchaininfo()['mediantime'] ); ?><br />
        <?php
        if(isset($api->getblockchaininfo()['size_on_disk'])) {
            printf("Місце на диску: %s<br />\n", format_bytes($api->getblockchaininfo()['size_on_disk']));
        }
        ?>
        Скорочений: <?php echo $api->getblockchaininfo()['pruned'] ? 'так' : 'ні'; ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend>Інформація про Транзакції в пулі пам'яті</legend>
        <?php
        printf("Транзакції: %s<br />", $api->getmempoolinfo()['size'] );
        printf("Розмір: %s<br />", ( $api->getmempoolinfo()['size'] == 0 ) ? 'порожньо' : format_bytes( $api->getmempoolinfo()['bytes']) );
        ?>
    </fieldset>

    <br />

    <fieldset>
    <legend>Використання Мережевих ресурсів</legend>
        Отримано: <?php echo format_bytes( $api->getnettotals()['totalbytesrecv'] ); ?><br />
        Відправлено: <?php echo format_bytes( $api->getnettotals()['totalbytessent'] ); ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend><?php printf( 'Підключені вузли (%s)', count( $api->getpeerinfo() ) ); ?></legend>
        <table style="width: 100%; font-size: 12px;">
        <thead style="text-align: center;">
            <tr>
                <th>Адреса</th>
                <th>Сервіси</th>
                <th>Час підключення</th>
                <th>Субверсія</th>
                <th>Синхронізація</th>
                <th>Байти вхід/вихід</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tinbound = 0; $toutbound = 0;

            foreach( $api->getpeerinfo() as $peer ) {

                $conntime = date('d/m/Y H:i:s', $peer['conntime'] );

                $servbits  = hexdec('0x' . $peer['services']);
                $servnames = decode_services($servbits);

                $banscore = $peer['banscore'];
                if ( $banscore < 25 ) {
                    $bgcolor = "#ffffff";
                } elseif ( $banscore  < 50 ) {
                    $bgcolor = "#ffcccc";
                } elseif ( $banscore  < 75 ) {
                    $bgcolor = "#ff9999";
                } else {
                    $bgcolor = "#ff6666";
                }

                $bsynced = ( in_array( $api->getblockchaininfo()['blocks'], array( $peer['startingheight'], $peer['synced_blocks'] ) ) ) ? true : false;
                $hsynced = ( in_array( $api->getblockchaininfo()['headers'], array( $peer['startingheight'], $peer['synced_headers'] ) ) ) ? true : false;
                $fsynced = ( $bsynced  ? ( $hsynced  ? '<font color="green">full</font>' : 'blocks' ) : ( $hsynced ? 'headers' : '<font color="red">none</font>' ) );

                printf( '<tr style="background-color: %s;">', $bgcolor );
                printf( '<td title="Очки бану: %s">%s %s</td>', $banscore, $peer['inbound'] ? '<font title="вхід" color="green">=></font>' : '<font title="вихід" color="red"><=</font>', $peer['addr'] );
                printf( '<td title="%s">0x%s</td>', $servnames, dechex($servbits) );
                printf( '<td title="Conntime: %s">%s</td>', $peer['conntime'], $conntime );
                printf( '<td title="Версія: %s">%s</td>', $peer['version'], $peer['subver'] );
                printf( '<td>%s</td>', $fsynced );
                printf( '<td title="Відправлено: %s | Отримано: %s">%s</td>', format_bytes( $peer['bytessent'] ), format_bytes( $peer['bytesrecv'] ), format_bytes( $peer['bytessent'] + $peer['bytesrecv'] ) );
                printf( '</tr>' );

                $peer['inbound'] ? $tinbound++ : $toutbound++;
            }

            ?>
        </tbody>
        </table>
        <br />
        Всього вхідних/вихідних: <?php echo "$tinbound/$toutbound"; ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend><?php printf( 'Заблоковані вузли (%s)', count( $api->listbanned() ) ); ?></legend>
        <table style="width: 100%; font-size: 12px;">
        <thead style="text-align: center;">
            <tr>
                <th>Адреса</th>
                <th>Початок</th>
                <th>Закінчення</th>
                <th>Причина</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach( $api->listbanned() as $peer ) {

                $bansince = date('d/m/Y H:i:s', $peer['ban_created'] );
                $banuntil = date('d/m/Y H:i:s', $peer['banned_until'] );

                echo '<tr>';
                printf( '<td>%s</td>', $peer['address'] );
                printf( '<td title="%s">%s</td>', $peer['ban_created'], $bansince );
                printf( '<td title="%s">%s</td>', $peer['banned_until'], $banuntil );
                printf( '<td>%s</td>', $peer['ban_reason'] );
                echo '</tr>';
            }

            ?>
        </tbody>
        </table>
    </fieldset>

  </div>

</div>


<?php
include 'page_footer.php';
printf( '<center><span style="font-size: 10px;">Згенеровано за %s секунд.</span></center>', number_format( microtime( true ) - $script_exec_start, 5 ) );
?>

</body>
</html>
