<?php
require_once('config.php');  
require('request-exception.php');   

$db = Connection::Instance();

try { 
  switch(isset($_GET['q'])?$_GET['q']:null)
  {
    case 'newcategory':
      $id = $_POST['index']; 
      $category = $_POST['category'];
      $db->set($_POST['transaction'] . '/categories/' . $id, $category);
      echo json_encode(array(
        'id' => $id,
        'category' => $category
      ));
      break;
  }
} catch (MyException $e) {  
  echo $e->getMessage();
} 