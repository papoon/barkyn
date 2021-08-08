<?php

use Luracast\Restler\Defaults;
use Luracast\Restler\Restler;

$loader = require_once 'libs/vendor/autoload.php';
$loader->setUseIncludePath(true);
class_alias('Luracast\\Restler\\Restler', 'Restler');

Defaults::$cacheDirectory = 'cache/';
Defaults::$useUrlBasedVersioning = true;

$r = new Restler();
$r->setAPIVersion(1);
$r->addAPIClass('Hello'); 
$r->handle(); 
