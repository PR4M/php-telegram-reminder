# PHP Telegram Reminder

A Telegram Web Reminder based on PHP 7, used to create any reminder and send it  to Telegram at specified time. 

## How to Install ?

Click `clone` or `download` it to your localhost or live server. 
Run `composer install`

Configure the `.env` file.
example of `.env` file: 

```env
APP_NAME=app
APP_DEBUG=true

VIEW_CACHE_DISABLED=true

DB_DRIVER=mysql
DB_HOST=localhost
DB_DATABASE=reminder
DB_USER=root
DB_PASSWORD=''

TELEGRAM_TOKEN=YOUR_TELEGRAM_SECRET_TOKEN
TELEGRAM_CHAT_ID=YOUR_TELEGRAM_CHAT_ID
```

Run `scheduler.php` as `php scheduler.php` 

### This PHP Telegram is built on the top of

- Slim Framework 
- Twig
- Bootstrap 4
- CT-Scheduler 
- Dragonmantank/cron-expression
- Eloquent ORM
- Guzzle
- Nesbot/Carbon 
- Telegram Bot API

## License 

MIT License 





