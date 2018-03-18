<?php
	# Call 2 Library
	require "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	# Twitter Credentials
	define('consumerKey',		'l4SGFeUeNRiMNtnKjZY5hEKVZ');
	define('consumerSecret',	'O0dG2oxbFJAsXPyTsEv9tUucvsjzGVs3Pm2hC4jaEAV3gJimzH');
	define('accessToken',		'892179486636224517-Vtf8YpOIjpcgDNIZpAf8eAGVrP7yLpU');
	define('accessTokenSecret',	'vSCa9djWpakqoAalwNmWIEqhTuE7UwFUfCYcI0Ck0JmVr');


	# Open Twitter connection
	$twitter	=	new TwitterOAuth(consumerKey, consumerSecret, accessToken, accessTokenSecret);

	# Let's open our image generator
	include('bitcoin_price_img.php');

	# And let's twit!
	$image = $twitter->upload('media/upload', ['media' => './twit.png']);
	$params = ['media_ids' => implode(',', [$image->media_id_string])];
	$result = $twitter->post('statuses/update', $params);
?>