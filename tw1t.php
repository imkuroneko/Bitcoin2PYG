<?php
	//	Call 2 Library
	require "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	//	Our keys 4 Twitter
	$consumerKey		=	"";
	$consumerSecret		=	"";
	$accessToken		=	"";
	$accessTokenSecret	=	"";

	//	Let's connect to Twitter...
	$connection			=	new TwitterOAuth( $consumerKey , $consumerSecret , $accessToken , $accessTokenSecret);

	//	Let's get our content for the twit
	require "bitcoin_price.php";

	//	And let's twit it!
	$statues			=	$connection -> post ( "statuses/update" , array( "status" => $twit_content ));
?>