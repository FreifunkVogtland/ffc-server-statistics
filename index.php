<?php
$fh = fopen ( "stats.conf", "r" );
if(!$fh){
	$fh = fopen ( "vnstat/stats.conf", "r" );
}

if ($fh) {
	while ( ($buffer = fgets ( $fh, 4096 )) !== false ) {
		$buffer = str_replace ( "\"", "", $buffer );
		$splitted_line = explode ( "=", $buffer );

		if ($splitted_line [0] == "interfaces") {
			$interfaces = explode ( " ", $splitted_line [1] );
		}
		if ($splitted_line [0] == "outputs") {
			$outputs = explode ( " ", $splitted_line [1] );
		}
	}
	fclose ( $fh );
}

echo "<html><body><h1>Traffic Statistiken für ";
echo gethostname ();
echo "</h1>";
echo "<table>";
foreach ( $outputs as $mode ) {
	echo "<tr>";
	foreach ( $interfaces as $iface ) {
		echo "<td><img src=\"" . $iface . "_" . $mode . ".png\" /></td>";
	}
	echo "</tr>";
}
echo "</table></body></html>";

?>
