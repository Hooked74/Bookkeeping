<?php
require_once('config.php');  
require('request-exception.php');   

try { 
  switch(isset($_GET['c'])?$_GET['c']:null)
  {
    case 'cost':
      $controller = new Cost();
      break;
    case 'income':  
      $controller = new Income(); 
      break;     
    case 'reports':  
      $controller = new Reports();
      break;
    default:    
      $controller = new Page();   
  }  
  $controller->render(); 
} catch (MyException $e) { 
  Page::renderError($e->getMessage(), $e->getCode());
} 