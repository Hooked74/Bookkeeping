<?php
define("__DB_LOGIN__", "xxxxxxxxxxxx");
define("__DB_PASSWORD__", "xxxxxxxxxxx");
define("__DB_NAME__", "xxxxxxx");

header("Content-type: text/html; charset=utf-8");

$spr = getenv('COMSPEC')? ";" : ":";

ini_set('include_path', ini_get('include_path').
  $spr.getenv('DOCUMENT_ROOT').
  $spr.getenv('DOCUMENT_ROOT').'/m/'.
  $spr.getenv('DOCUMENT_ROOT').'/v/'.
  $spr.getenv('DOCUMENT_ROOT').'/c/'.
  $spr.getenv('DOCUMENT_ROOT').'/c/trait/'
);

function __autoload($ClassName)
{
  include_once($ClassName . '.php');
}