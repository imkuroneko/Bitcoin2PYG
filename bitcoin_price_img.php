<?php
	header	("Content-type: image/png");

	# image size
	$image	=	ImageCreate(743, 400);

	# path
	$path = dirname(__FILE__);

	# image background
	$image	=	ImageCreateFromPNG($path.'/images/background.png');

	# text colors (rgb)
	$gray		= ImageColorAllocate($image, 81, 81, 81);
	$orange		= ImageColorAllocate($image, 237, 128, 33);
	$light_blue	= ImageColorAllocate($image, 92, 188, 180);
	$light_gray	= ImageColorAllocate($image, 241, 241, 241);

	# fonts
	$ubuntu_medium	= $path.'/fonts/ubuntu_medium.ttf';
	$ubuntu_light	= $path.'/fonts/ubuntu_light.ttf';
	$open_sans		= $path.'/fonts/open_sans_regular.ttf';


	/*======= Bitcoin API requests ========*/
	require('api_maxicambios.php');
	require('api_bitcoin.php');
	/*=====================================*/

	# text
	$title			= 'Precio del Bitcoin en Guaranies';
	$coinbase		= number_format(coinbasePYG(), 0, '', '.') .'Gs.';
	$blockchain		= number_format(MaxiCambios() * BlockChain(), 0, '', '.') .'Gs.';
	$xapo			= number_format(MaxiCambios() * Xapo(), 0, '', '.') .'Gs.';
	$bitstamp		= number_format(MaxiCambios() * BitStamp(), 0, '', '.') .'Gs.';
	$maxicambios	= number_format(MaxiCambios(), 0, '', '.') .'Gs.';

	$footer			= 'Developed by: KuroNeko  /  Maintained by: BitcoinParaguay';

	# load text into image
	# ($image - font size - angule - coordsX - coordsY - text color - font - text)
	ImageTTFText ( $image, 26, 0, 35,	75, $orange, $ubuntu_medium, $title );
	ImageTTFText ( $image, 18, 0, 225, 123, $gray, $open_sans, $coinbase );
	ImageTTFText ( $image, 18, 0, 225, 159, $gray, $open_sans, $blockchain );
	ImageTTFText ( $image, 18, 0, 225, 195, $gray, $open_sans, $xapo );
	ImageTTFText ( $image, 18, 0, 225, 231, $gray, $open_sans, $bitstamp );
	ImageTTFText ( $image, 18, 0, 225, 306, $light_gray, $open_sans, $maxicambios );
	ImageTTFText ( $image, 8, 0, 15, 385, $light_blue, $open_sans, $footer );

	# logos
	$coinbase_logo		= ImageCreateFromPNG($path.'/images/logos/coinbase.png');
	$blockchain_logo	= ImageCreateFromPNG($path.'/images/logos/blockchain.png');
	$xapo_logo			= ImageCreateFromPNG($path.'/images/logos/xapo.png');
	$bitstamp_logo		= ImageCreateFromPNG($path.'/images/logos/bitstamp.png');
	$maxicambios_logo	= ImageCreateFromPNG($path.'/images/logos/maxicambios.png');


	# add logos into our image
	# ( $image - $image2load - coords_X - coords_Y - source_X_2copy - source_Y_2copy - img_width - size_height )
	ImageCopy( $image, $coinbase_logo,		45,  90, 0, 0, 150, 50 );
	ImageCopy( $image, $blockchain_logo,	45, 125, 0, 0, 150, 50 );
	ImageCopy( $image, $xapo_logo,			45, 160, 0, 0, 150, 50 );
	ImageCopy( $image, $bitstamp_logo,		45, 195, 0, 0, 150, 50 );
	ImageCopy( $image, $maxicambios_logo,	57, 280, 0, 0, 127, 36 );

	# render for save it
	ImagePNG($image, $path.'twit.png');
?>
