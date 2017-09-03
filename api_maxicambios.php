<?php
function MaxiCambios() {
	$xml = "http://cotizext.maxicambios.com.py/maxicambios.xml";
	$info = file_get_contents($xml);
	preg_match_all('%<venta>(.*?)</venta>%i', $info, $usd_sell);
	$value = $usd_sell[1][0];

	return $value;
}
?>