<?php
	# Call 2 Library
	require "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	# Twitter Credentials
	define('consumerKey',		'__change_me__');
	define('consumerSecret',	'__change_me__');
	define('accessToken',		'__change_me__');
	define('accessTokenSecret',	'__change_me__');

	# Open Twitter connection
	$twitter	=	new TwitterOAuth(consumerKey, consumerSecret, accessToken, accessTokenSecret);

	# Let's open our image generator
	include('./bitcoin_price_img.php');

	# And let's twit!
	$image = $twitter->upload('media/upload', ['media' => './twit.png']);
	$params = ['media_ids' => implode(',', [$image->media_id_string])];
	$result = $twitter->post('statuses/update', $params);
?>
