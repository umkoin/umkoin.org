<?php

$script_exec_start = microtime(true);


/* Load configuration file */
require "../include/config.php";


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
    $suffixes = array( '', 'KB', 'MB', 'GB', 'TB' );

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
        if( ($flags & $service[1] ) != 0 ) {
            $set .= $service[0].' ';
        }
    }

    return $set;
}

$localservbits  = hexdec('0x'.$api->getnetworkinfo()['localservices']);
$localservnames = decode_services($localservbits);

?>


<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include 'head'; ?>
<title>Node Status - Umkoin</title>

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

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><img src="/img/icons/ico_mining.svg"> Umkoin Node Status</h1>


    <fieldset>
    <legend>Node Info</legend>
        Node version: <?php echo $api->getnetworkinfo()['version'].' ('.$api->getnetworkinfo()['protocolversion'].')'; ?><br />
        Subversion: <?php echo $api->getnetworkinfo()['subversion']; ?><br />
        Local services: <?php printf("%s (0x%s)", $localservnames, dechex($localservbits)); ?><br />
        Relay fee: <?php echo $api->getnetworkinfo()['relayfee']; ?><br />
        Uptime: <?php echo seconds_to_time( $api->uptime() ); ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend>Blockchain Info</legend>
        Chain: <?php echo $api->getblockchaininfo()['chain'];?><br />
        Blocks: <?php echo $api->getblockchaininfo()['blocks']; ?><br />
        Headers: <?php echo $api->getblockchaininfo()['headers']; ?><br />
        Difficulty: <?php echo $api->getblockchaininfo()['difficulty']; ?><br />
        Median time: <?php echo date('d/m/Y H:i:s', $api->getblockchaininfo()['mediantime'] ); ?><br />
        <?php
        if(isset($api->getblockchaininfo()['size_on_disk'])) {
            printf("Size on disk: %s<br />\n", format_bytes($api->getblockchaininfo()['size_on_disk']));
        }
        ?>
        Pruned: <?php echo $api->getblockchaininfo()['pruned'] ? 'true' : 'false'; ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend>TX Memory Pool Info</legend>
        Transactions: <?php echo $api->getmempoolinfo()['size']; ?><br />
        <?php printf("Size: %s<br />\n", ( $api->getmempoolinfo()['size'] == 0) ? 'empty' : format_bytes( $api->getmempoolinfo()['bytes']) ); ?>

        Size: <?php
                if( $api->getmempoolinfo()['size'] == 0 ) {
                    echo "empty";
                } else {
                    echo format_bytes( $api->getmempoolinfo()['bytes'] );
                }
                ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend>Network Usage</legend>
        Total received: <?php echo format_bytes( $api->getnettotals()['totalbytesrecv'] ); ?></br t>
        Total sent: <?php echo format_bytes( $api->getnettotals()['totalbytessent'] ); ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend><?php printf( 'Connected Peers (%s)', count( $api->getpeerinfo() ) ); ?></legend>
        <table style="width: 100%; font-size: 12px;">
        <thead style="text-align: center;">
            <tr>
                <th>Address</th>
                <th>Services</th>
                <th>Connection time</th>
                <th>Subversion</th>
                <th>Inbound</th>
                <th>Synced blocks/headers</th>
                <th>Bytes in/out</th>
                <th>Ban score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tinbound = 0; $toutbound = 0;

            foreach( $api->getpeerinfo() as $peer ) {

                $inbound = $peer['inbound'] ? 'true' : 'false';
                $conntime = date('d/m/Y H:i:s', $peer['conntime'] );

                $servbits  = hexdec('0x' . $peer['services']);
                $servnames = decode_services($servbits);

                $banscore = $peer['banscore'];
                $bgcolor = "#ffffff";

                if ( $banscore > 0 ) {
                    $bgcolor = "#ffffe6";
                } elseif ($banscore > 50 ) {
                    $bgcolor = "ffe6e6";
                }

                $bsynced = '<font color="red">false</font>';
                if ( in_array( $api->getblockchaininfo()['blocks'], array( $peer['startingheight'], $peer['synced_blocks'] ) ) ) {
                    $bsynced = '<font color="green">true</font>';
                }

                $hsynced = '<font color="red">false</font>';
                if ( in_array( $api->getblockchaininfo()['blocks'], array( $peer['startingheight'], $peer['synced_headers'] ) ) ) {
                    $hsynced = '<font color="green">true</font>';
                }

                printf( '<tr style="background-color: %s;">', $bgcolor );
                printf( '<td>%s</td>', $peer['addr'] );
                printf( '<td title="%s">0x%s</td>', $servnames, dechex($servbits) );
                printf( '<td title="%s">%s</td>', $peer['conntime'], $conntime );
                printf( '<td title="%s">%s</td>', $peer['version'], $peer['subver'] );
                printf( '<td>%s</td>', $inbound );
                printf( '<td>%s/%s</td>', $bsynced, $hsynced );
                printf( '<td>%s/%s</td>', format_bytes( $peer['bytesrecv'] ), format_bytes( $peer['bytessent'] ) );
                printf( '<td>%s</td>', $banscore );
                printf( '</tr>' );

                $peer['inbound'] ? $tinbound++ : $toutbound++;
            }

            ?>
        </tbody>
        </table>
        <br />
        Total inbound/outbound: <?php echo "$tinbound/$toutbound"; ?><br />
    </fieldset>

    <br />

    <fieldset>
    <legend><?php printf( 'Banned Peers (%s)', count( $api->listbanned() ) ); ?></legend>
        <table style="width: 100%; font-size: 12px;">
        <thead style="text-align: center;">
            <tr>
                <th>Address</th>
                <th>Since</th>
                <th>Until</th>
                <th>Reason</th>
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
printf( '<center><span style="font-size: 10px;">Generated in %s seconds.</span></center>', number_format( microtime( true ) - $script_exec_start, 5 ) );
?>

</body>
</html>
