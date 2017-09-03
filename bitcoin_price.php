<?php
	require('api_maxicambios.php');
	require('api_bitcoin.php');


	$coinbase_price		= number_format(coinbasePYG(), 0, '', '.');
	$blockchain_price	= number_format(MaxiCambios() * BlockChain(), 0, '', '.');
	$bitstamp_price		= number_format(MaxiCambios() * BitStamp(), 0, '', '.');
	$xapo_price			= number_format(MaxiCambios() * Xapo(), 0, '', '.');

	$maxicambios		= number_format(MaxiCambios(), 0, '', '.');

	$twit_content	=
		"
		📊 Coinbase: Gs. $coinbase_price
		📊 Blockchain: Gs. $blockchain_price
		📊 BitStamp: Gs. $bitstamp_price
		📊 Xapo: Gs. $xapo_price
		
		💱 USD->PYG : $maxicambios
		";		
?>