<?php

require 'vendor/autoload.php';
require 'lib/Noter.php';

error_reporting(-1);

// http://michelf.ca/projects/php-markdown/extra/


$assetDir = "/".str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__) . "/assets";

// Config
$app = array();
$app['header'] = '';
$app['footer'] = __DIR__. '/assets/html/footer.html';
$app['favicon'] = $assetDir . '/img/favicon.ico';
