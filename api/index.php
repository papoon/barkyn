<?php

require_once 'restler.php';
use Luracast\Restler\Defaults;
use Luracast\Restler\Restler;

Defaults::$useUrlBasedVersioning = true;

$r = new Restler();
$r->setAPIVersion(1);
$r->addAPIClass('Hello'); 
$r->handle(); 
