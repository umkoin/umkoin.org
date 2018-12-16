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

// $getpeerinfo = $api->getpeerinfo();
// $listbanned = $api->listbanned();
// $getbcinfo = $api->getblockchaininfo();
// $getnettotals = $api->getnettotals();
// $getmpinfo = $api->getmempoolinfo();
// $uptime = $api->uptime();

//$pruned = $api->getblockchaininfo()['pruned'] ? 'true' : 'false';
// $cpeers = count( $api->getpeerinfo() );
// $bpeers = count( $api->listbanned() );

$localservbits  = hexdec('0x'.$api->getnetworkinfo()['localservices']);
$localservnames = decode_services($localservbits);

?>


<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include 'head'; ?>
<title>Node Status - Umkoin</title>
</head>


<body>


<?php include 'page_head.php'; ?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1><img src="/img/icons/ico_mining.svg"> Umkoin Node Status</h1>


    <fieldset>
        <legend><h4>Node Info</h4></legend>
		<table style="width: 100%; font-size: 13px;">
		<tbody>
		    <tr>
                <td>Node version:</td>
		        <td><?php echo $api->getnetworkinfo()['version'].' ('.$api->getnetworkinfo()['protocolversion'].')';?></td>
           </tr><tr>
		        <td>Subversion:</td>
			    <td><?php echo $api->getnetworkinfo()['subversion']; ?></td>
		    </tr><tr>
                <td>Local services:</td>
			    <td><?php printf("%s (0x%s)", $localservnames, dechex($localservbits)); ?></td>
		    </tr><tr>
                <td>Relay fee:</td>
			    <td><?php echo $api->getnetworkinfo()['relayfee']; ?></td>
		    </tr><tr>
                <td>Uptime:</td>
			    <td><?php echo seconds_to_time( $api->uptime() ); ?></td>
		    </tr>
		</tbody>
		</table>
    </fieldset>


    <fieldset>
        <legend><h4>Blockchain Info</h4></legend>
		<table style="width: 100%; font-size: 13px;">
		<tbody>
		    <tr>
                <td>Chain:</td>
			    <td><?php echo $api->getblockchaininfo()['chain'];?></td>
		    </tr><tr>
               <td>Blocks:</td>
			    <td><?php echo $api->getblockchaininfo()['blocks']; ?></td>
		    </tr><tr>
                <td>Headers:</td>
			    <td><?php echo $api->getblockchaininfo()['headers']; ?></td>
		    </tr><tr>
                <td>Difficulty:</td>
		        	<td><?php echo $api->getblockchaininfo()['difficulty']; ?></td>
		    </tr><tr>
                <td>Median time:</td>
			    <td><?php echo date('d/m/Y H:i:s', $api->getblockchaininfo()['mediantime'] ); ?></td>
		    </tr>
                <?php
                if(isset($api->getblockchaininfo()['size_on_disk'])) {
                    printf("<tr><td>Size on disk:</td><td>%s</td></tr>\n", format_bytes($api->getblockchaininfo()['size_on_disk']));
                }
                ?>
		    <tr>
                <td>Pruned:</td>
			    <td><?php echo $api->getblockchaininfo()['pruned'] ? 'true' : 'false'; ?></td>
		    </tr>
		</tbody>
		</table>
    </fieldset>


    <table style="width: 100%;">
	<tbody>
	    <tr>
            <td>
			<fieldset>
                <legend><h4>TX Memory Pool Info</h4></legend>
		        <table style="width: 100%; font-size: 13px;">
		        <tbody>
		            <tr>
                        <td>Transactions:</td>
		    	            <td><?php echo $api->getmempoolinfo()['size']; ?></td>
		            </tr><tr>
                       <td>Size:</td>
			           <td>
			                <?php
                           if( $api->getmempoolinfo()['size'] == 0 ) {
                                echo "empty";
                            } else {
                                echo format_bytes( $api->getmempoolinfo()['bytes'] );
                            }
                            ?>
			            </td>
		            </tr>
		        </tbody>
		        </table>
            </fieldset>
			</td>

            <td>
			<fieldset>
                <legend><h4>Network Usage</h4></legend>
		        <table style="width: 100%; font-size: 13px;">
		        <tbody>
		            <tr>
                        <td>Total received:</td>
			            <td><?php echo format_bytes( $api->getnettotals()['totalbytesrecv'] ); ?></td>
  		            </tr><tr>
                        <td>Total sent:</td>
			            <td><?php echo format_bytes( $api->getnettotals()['totalbytessent'] ); ?></td>
		            </tr>
		        </tbody>
		        </table>
            </fieldset>
			</td>
	    </tr>
	</tbody>
	</table>


    <fieldset>
        <legend><h4><?php printf( 'Connected Peers (%s)', count( $api->getpeerinfo() ) ); ?></h4></legend>
        <table style="width: 100%; font-size: 12px;">
		<thead style="text-align: center;">
            <tr>
                <th>Address</th>
                <th>Services</th>
                <th>Connection time</th>
                <th>Version</th>
                <th>Subversion</th>
                <th>Inbound</th>
				<th>Synced blocks</th>
				<th>Synced headers</th>
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
				
				echo '<tr style="background-color: '.$bgcolor.';">';
                printf( '<td>%s</td>', $peer['addr'] );
                printf( '<td title="%s">0x%s</td>', $servnames, dechex($servbits) );
                printf( '<td title="%s">%s</td>', $peer['conntime'], $conntime );
                printf( '<td>%s</td>', $peer['version'] );
                printf( '<td>%s</td>', $peer['subver'] );
                printf( '<td>%s</td>', $inbound );
                printf( '<td>%s</td>', $peer['synced_blocks'] );
				printf( '<td>%s</td>', $peer['synced_headers'] );
				printf( '<td>%s</td>', $banscore );
                echo '</tr>';

                $peer['inbound'] ? $tinbound++ : $toutbound++;
            }

            ?>
		    <tr>
                <td colspan="9">Total inbound/outbound: <?php echo "$tinbound/$toutbound"; ?></td>
		    </tr>
		</tbody>
        </table>
    </fieldset>


    <fieldset>
        <legend><h4><?php printf( 'Banned Peers (%s)', count( $api->listbanned() ) ); ?></h4></legend>
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
echo '<center><span style="font-size: 9px">Generated in '.number_format(microtime(true) - $script_exec_start, 5).' seconds.</span></center';
?>

</body>
</html>
