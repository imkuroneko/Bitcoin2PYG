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


    #ImageTTFText( $image, font-size, angule, coordX, coordY, text-color, content )
    ImageTTFText ( $image, 24, 0, 35,	65, $orange,     $ubuntu_medium, "Precio del Bitcoin en Guaranies" );
    ImageTTFText ( $image, 18, 0, 225, 123, $gray,       $open_sans,     "{$btc_prices->coinbase->pyg}Gs." );
    ImageTTFText ( $image, 18, 0, 225, 159, $gray,       $open_sans,     "{$btc_prices->bitexla->pyg}Gs." );
    ImageTTFText ( $image, 18, 0, 225, 195, $gray,       $open_sans,     "{$btc_prices->bitfinex->pyg}Gs." );
    ImageTTFText ( $image, 18, 0, 225, 231, $gray,       $open_sans,     "{$btc_prices->bitstamp->pyg}Gs." );
    ImageTTFText ( $image, 18, 0, 225, 306, $light_gray, $open_sans,     "{$usd_pyg}Gs." );
    ImageTTFText ( $image, 12, 0, 588, 390, $orange,     $ubuntu_light,  $btc_prices->timestamp );

    # add logos into our image
    # ( $image - $image2load - coords_X - coords_Y - source_X_2copy - source_Y_2copy - img_width - size_height )
    ImageCopy( $image, ImageCreateFromPNG($path.'/images/coinbase.png'),     45,  90, 0, 0, 150, 50 );
    ImageCopy( $image, ImageCreateFromPNG($path.'/images/bitexla.png'),      45, 125, 0, 0, 150, 50 );
    ImageCopy( $image, ImageCreateFromPNG($path.'/images/bitfinex.png'),     45, 160, 0, 0, 150, 50 );
    ImageCopy( $image, ImageCreateFromPNG($path.'/images/bitstamp.png'),     45, 195, 0, 0, 150, 50 );
    ImageCopy( $image, ImageCreateFromPNG($path.'/images/maxicambios.png'),  57, 280, 0, 0, 127, 36 );

    # render for save it
    ImagePNG($image, $path.'/twit.png');
?>
