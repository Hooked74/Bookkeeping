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
    case 'balance':
      $startDate = new DateTime($_POST['startDate']); 
      $endDate = new DateTime($_POST['endDate']); 
      
      function getSumm($transaction) 
      {
        global $startDate;
        global $endDate;
        global $db; 
        $list = json_decode($db->get($transaction . '/list'));       
        $summ = 0;        
        $a = array();
        foreach($list as $date => $oneDateTransactions) {
          $dateReplace = new DateTime(preg_replace('/'.DATE_SEPARATOR.'/', '.', $date)); 
          if ($dateReplace < $startDate || $dateReplace > $endDate) continue;
          
          foreach ($oneDateTransactions as $info) {
            $tSumm = preg_replace('/\s/', '', $info->summ);
            $tSumm = preg_replace('/,/', '.', $tSumm);
            $summ += (real)$tSumm;  
          }           
        }
        
        return $summ;
      } 
      
      function replaceSumm($summ) 
      {    
        $splitSumm = explode('.', $summ);
        $cop = isset($splitSumm[1]) ? substr($splitSumm[1], 0, 2) :'00';
        return strrev(implode(" ",str_split(strrev($splitSumm[0]), 3))) . ',' . $cop;
      }
      
      $income = getSumm('income');
      $cost = getSumm('cost');
      
      echo json_encode(array(
        'income' => $income,
        'cost' => $cost,
        'incomeSummStyle' => replaceSumm($income),
        'costSummStyle' => replaceSumm($cost)
      ));
      break;
  }
} catch (MyException $e) {  
  echo $e->getMessage();
} 