<?php
	/* ============================ Coinbase ============================ */
	function coinbasePYG() {
		$cb_json = "https://coinbase.com/api/v1/currencies/exchange_rates";
		$json = file_get_contents($cb_json);
		$json = json_decode($json);
		$current_price = $json->btc_to_pyg;
		
		return $current_price;
	}

	/* ============================ Bitstamp ============================ */
	function BitStamp() {
		$bs_json = "https://www.bitstamp.net/api/ticker/";
		$json = file_get_contents($bs_json);
		$json = json_decode($json);
		$current_price = $json->last;
		
		return $current_price;
	}

	/* ============================ Blockchain.info ============================ */
	
	function BlockChain() {
		$bc_json = "https://blockchain.info/ticker";
		$json = file_get_contents($bc_json);
		$json = json_decode($json);
		$current_price = $json->USD->last;
		
		return $current_price;
	}

	/* ============================ Xapo ============================ */
	
	function Xapo() {
		$xp_json = "https://api.xapo.com/v3/quotes/USDBTC";
		$json = file_get_contents($xp_json);
		$json = json_decode($json);
		$current_price = $json->fx_etoe->USDBTC->source_amt;
		
		return $current_price;
	}
?>