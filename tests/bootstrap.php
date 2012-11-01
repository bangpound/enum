<?php
//  Set conforming error level
error_reporting(E_ALL | E_STRICT);

//  Maximize memory for testing
ini_set('memory_limit', '-1');

//  Turn off asserts while testing
ini_set('assert.active', '0');

//  Autoload
require __DIR__.'/../vendor/autoload.php';