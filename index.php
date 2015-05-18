<?php
require_once('config.php');  
require('request-exception.php');   

try { 
  switch(isset($_GET['c'])?$_GET['c']:null)
  {
    case 'cost':
      //require_once('Connection.php');
      //$conn = Connection::Instance();
      $controller = new Cost();
      break;
    case 'income':  
      //require_once('Connection.php'); 
      //$conn = Connection::Instance();
      $controller = new Income(); 
      break;     
    case 'reports':
      //require_once('Connection.php');  
      //$conn = Connection::Instance();   
      $controller = new Reports();
      break;
    default:    
      $controller = new Page();   
  }  
  $controller->render(); 
} catch (MyException $e) {  
  var_dump($e->getMessage());
  Page::renderError($e->getMessage(), $e->getCode());
} 