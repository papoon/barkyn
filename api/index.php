<?php

$loader = require_once 'libs/vendor/autoload.php';

use Luracast\Restler\Defaults;
use Luracast\Restler\Restler;

$loader->setUseIncludePath(true);

Defaults::$cacheDirectory = 'cache/';
Defaults::$useUrlBasedVersioning = true;

$r = new Restler();
$r->setAPIVersion(1);
$r->addAPIClass('Hello'); 
$r->handle(); 
