<?php
# ================ Key Control
if(!isset($_GET['key'])) { die; }
if($_GET['key'] != 'random-string-goes-here') { die; }

# Set Timezone
date_default_timezone_set('America/Asuncion');

# Use Twitter Library
use Abraham\TwitterOAuth\TwitterOAuth;

# Vendor Require
require './vendor/autoload.php';

# Init Guzzle
$guzzle = new GuzzleHttp\Client();



# ================================================================================================================================
# All the URIs to make request
$endpoints = [
    'coinbase'    => 'https://api.coinbase.com/v2/prices/spot?currency=USD',
    'bitstamp'    => 'https://www.bitstamp.net/api/ticker',
    'blockchain'  => 'https://blockchain.info/ticker',
    'xapo'        => 'https://api.xapo.com/v3/quotes/USDBTC',
    'bitfinex'    => 'https://api.bitfinex.com/v1/ticker/btcusd',
    'bitexla'     => 'https://bitex.la/api-v1/rest/btc_usd/market/ticker',
    'kraken'      => 'https://api.kraken.com/0/public/Ticker?pair=XBTUSD',
];

# Where we will store all the info
$btc_prices = [];

# Get MaxiCambios Exchange data
function maxicambios() {
    $guzzle = new GuzzleHttp\Client();
    $data = $guzzle->request('GET', 'http://cotizext.maxicambios.com.py/maxicambios.xml')->getBody();
    preg_match_all('%<venta>(.*?)</venta>%i', $data, $sell);
    return $sell[1][0];
}
$usd_pyg = maxicambios();

# Make exchange USD > PYG and format the output
function usd2pyg($val, $usd_pyg) {
    return number_format($val * $usd_pyg, 0, '', '.');
}

# Make the Request and store it again in the same array
foreach($endpoints as $site => $url) {
    $rsp_data = json_decode($guzzle->request('GET', $url)->getBody());
    switch($site) {
        case 'coinbase':    $price = $rsp_data->data->amount; break;
        case 'bitstamp':    $price = $rsp_data->last; break;
        case 'blockchain':  $price = $rsp_data->USD->last; break;
        case 'xapo':        $price = $rsp_data->fx_etoe->USDBTC->source_amt; break;
        case 'bitfinex':    $price = $rsp_data->last_price; break;
        case 'bitexla':     $price = $rsp_data->last; break;
        case 'kraken':      $price = $rsp_data->result->XXBTZUSD->c[0]; break;
    }
    $btc_prices[$site] = [ 'usd' => $price, 'pyg' => usd2pyg($price, $usd_pyg) ];
}

# Store the timestamp too
$btc_prices['timestamp'] = date('Y-m-d H:i:s');



# =============================================================================
# Init Twitter
define('api_key'      , '');
define('api_secret'   , '');
define('access_token' , '');
define('access_secret', '');
$twitter = new TwitterOAuth( api_key, api_secret, access_token, access_secret );

# Cheat for better handling of data
$btc_prices = json_decode(json_encode($btc_prices));

# USD2PYG Current Value
$usd2pyg = usd2pyg(1, $usd_pyg);

# Generate the image we need :D
require './generate_image.php';

# Tweet!
$image = $twitter->upload('media/upload', ['media' => $path.'/twit.png']);
$params = ['media_ids' => implode(',', [$image->media_id_string])];
$result = $twitter->post('statuses/update', $params);