<?php

$loader =  require_once __DIR__.'/libs/vendor/autoload.php';
use Luracast\Restler\Defaults;
use Luracast\Restler\Restler;
use Models\DB;
use Services\Customer;

$loader->setUseIncludePath(true);

$db = DB::getConnection();


Defaults::$cacheDirectory = 'cache/';
Defaults::$useUrlBasedVersioning = true;

$r = new Restler();
$r->setAPIVersion(1);
$r->addAPIClass('Hello'); 
$r->handle(); 
