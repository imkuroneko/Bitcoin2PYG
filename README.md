### Bitcoin2PYG (Twitter Bot) v2.0b
-----

Pequeño script para manejar un bot de cotización del Bitcoin en Twitter

#### 📒 Las cotizaciones del Bitcoin son tomadas de:
> - [Bitexla](https://bitex.la)
> - [Bitfinex](https://bitfinex.com)
> - [Bitstamp](https://bitstamp.net)
> - [Coinbase](https://coinbase.com)

#### 📕 La cotización del dólar es tomada de:
> [MaxiCambios](https://maxicambios.com.py)


#### 📗 CronTab
> Cada 60min
> ` /usr/local/bin/php -q /home/user/public_html/bot_folder/bitcoin_price_img.php?key=random-string-goes-here`

#### 📘 Recursos y librerías utilizadas
- APIs de las plataformas arriba mencionadas
- `guzzlehttp/guzzle` para obtener el contenido necesario
- `abraham/twitteroauth` para la interacción con la API de Twitter y subir el contenido