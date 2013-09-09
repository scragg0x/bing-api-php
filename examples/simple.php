<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Bing\Client;

// You need to obtain a key
$key = '';

$c = new Client($key, 'json');

$res = $c->get('News', array('Query' => 'Obama'));

$res = json_decode($res, true);

print_r($res);