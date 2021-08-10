<?php

$loader =  require_once __DIR__.'/libs/vendor/autoload.php';
use Luracast\Restler\Defaults;
use Luracast\Restler\Restler;

$loader->setUseIncludePath(true);

Defaults::$cacheDirectory = 'cache/';
Defaults::$useUrlBasedVersioning = true;

$r = new Restler();
$r->setAPIVersion(1);
$r->addAPIClass('Hello');
$r->addAPIClass('Customer'); 
$r->addAPIClass('Subscription'); 
$r->handle(); 
