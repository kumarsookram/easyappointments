<?php defined('BASEPATH') or exit('No direct script access allowed');

// Add custom values by settings them to the $config array.
// Example: $config['smtp_host'] = 'smtp.gmail.com';
// @link https://codeigniter.com/user_guide/libraries/email.html

$config['useragent'] = Config::BASE_URL;
$config['protocol'] = 'smtp'; // or 'mail'
$config['mailtype'] = 'html'; // or 'text'
$config['smtp_debug'] = '0'; // or '1'
$config['smtp_auth'] = TRUE; // or FALSE for anonymous relay.
$config['smtp_host'] = Config::EMAIL_HOST;
$config['smtp_user'] = Config::EMAIL_USER;
$config['smtp_pass'] = Config::EMAIL_PASSWORD;
$config['smtp_crypto'] = Config::EMAIL_CRYPTO; // 'ssl' or 'tls'
$config['smtp_port'] = Config::EMAIL_PORT; // 25, 465 or 587
