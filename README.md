Bitcoin2PYG v2
===================

Este es un pequeño script creado para publicar vía Twitter la cotización del Bitcoin en Guaranies (PYG)

(y obligado a través de un cronjob para que haga el trabajo.)

### :octocat: Las cotizaciones del Bitcoin son tomadas de:

> - [BitStamp](www.bitstamp.net)
> - [Coinbase](www.coinbase.com)
> - [Blockchain.info](www.blockchain.info)
> - [XAPO](www.xapo.com)

### :octocat: La cotización del dólar es tomada de:

> [MaxiCambios](www.maxicambios.com.py)


### :octocat: CronTab

En el caso del bot, se utilizan actualmente 2 CronTab


> Twit Uploader (cada 30min)
> ` /usr/local/bin/php -q /home/user/public_html/bot_folder/tw1t.php `


> Image Generator (cada min)
> ` /usr/local/bin/php -q /home/user/public_html/bot_folder/bitcoin_price_img.php `
