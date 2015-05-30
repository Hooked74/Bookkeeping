<?php
header("Content-type: text/html; charset=utf-8");

$spr = getenv('COMSPEC')? ";" : ":";

ini_set('include_path', ini_get('include_path').
  $spr.getenv('DOCUMENT_ROOT').
  $spr.getenv('DOCUMENT_ROOT').'/m/'.
  $spr.getenv('DOCUMENT_ROOT').'/v/'.
  $spr.getenv('DOCUMENT_ROOT').'/c/'.
  $spr.getenv('DOCUMENT_ROOT').'/c/trait/'.
  $spr.getenv('DOCUMENT_ROOT').'/vendor/firebase-token-generator-php/'
);

function __autoload($ClassName)
{
  include_once($ClassName . '.php');
}