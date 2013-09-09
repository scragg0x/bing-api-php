bing-api-php
============

Very simple bing api wrapper in php.

## Install

The recommended way is [through
composer](http://getcomposer.org). Just create a `composer.json` file and
run the `php composer.phar install` command to install it:

    {
        "require": {
            "scragg0x/bing-api-php": "dev-master"
        }
    }

## API Reference

http://datamarket.azure.com/dataset/bing/search

## Example

```php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Bing\Client;

// You need to obtain a key
$key = '';

$c = new Client($key, 'json');

$res = $c->get('News', array('Query' => 'Obama'));

$res = json_decode($res, true);

print_r($res);
```