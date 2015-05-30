<?php
header("Content-type: text/html; charset=utf-8");

$spr = getenv('COMSPEC')? ";" : ":";

ini_set('include_path', ini_get('include_path').
  $spr.getenv('DOCUMENT_ROOT').
  $spr.getenv('DOCUMENT_ROOT').'/m/'.
  $spr.getenv('DOCUMENT_ROOT').'/v/'.
  $spr.getenv('DOCUMENT_ROOT').'/c/'.
  $spr.getenv('DOCUMENT_ROOT').'/c/trait/'.
  $spr.getenv('DOCUMENT_ROOT').'/vendors/firebase-token-generator-php/'
);

spl_autoload_register(function ($class) {
    include_once($class . '.php');
}, true, true);