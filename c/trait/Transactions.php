<?php
trait Transactions
{  
  private $cacheDate = array();
  private function _addTrasactionsAssets()
	{ 
    array_push($this->pageParams['styles'], 'bootstrap-datepicker3.standalone.min', 'transactions', 'modal'); 
    array_push($this->pageParams['vendors'], 'bootstrap-datepicker.min', 'bootstrap-datepicker.ru.min');   
    $this->setMainScript('transactions');  
	}  
  
  private function _generateParameters() 
  {    
    return array(
      'mainClass' => self::CLASS_NAME_LOWERCASE,
      'title' => self::TITLE,
      'categories' => $this->_getCategories(),
      'records' => $this->_getRecords()
    );
  }
  
  private function _getCategory($id)  
  {
    return json_decode($this->db->get(self::CLASS_NAME_LOWERCASE . '/categories/' . $id));  
  }
  
  private function _getCategories()  
  {
    return json_decode($this->db->get(self::CLASS_NAME_LOWERCASE . '/categories'));  
  }
  
  private function _addNewRecord() 
  {
    if (!$this->isPOST()) return;   
    $this->db->push(self::CLASS_NAME_LOWERCASE . '/list', array(
      "date" => $_POST['date'],
      "category" => $_POST['category'],
      "summ" => $this->_replaceSumm($_POST['summ']),
      "comment" => $_POST['comment']
    ));  
  }
  
  private function _replaceSumm($summ) 
  {    
    $splitSumm = explode('.', $summ);
    $cop = isset($splitSumm[1]) ? substr($splitSumm[1], 0, 2) :'00';
    return strrev(implode(" ",str_split(strrev($splitSumm[0]), 3))) . ',' . $cop;
  }
  
  private function _replaceDate($date) {   
    if (isset($this->cacheDate[$date])) return $this->cacheDate[$date];
    
    $months = array(
      "Январь" => "Jan",
      "Февраль" => "Feb",
      "Март" => "Mar",
      "Апрель" => "Apr",
      "Май" => "May",
      "Июнь" => "Jun",
      "Июль" => "Jul",
      "Август" => "Aug",
      "Сентябрь" => "Sep",
      "Октябрь" => "Oct",
      "Ноябрь" => "Nov",
      "Декабрь" => "Dec"
    );
    $replacements = $months[explode(' ', $date)[1]].'$1';        
    $this->cacheDate[$date] = preg_replace('/[A-Za-zА-Яёа-я]+(.+)\sг\./i', $replacements, $date);  
    
    return $this->cacheDate[$date];    
  }
    
  private function _getRecords() 
  {
    $records = json_decode($this->db->get(self::CLASS_NAME_LOWERCASE . '/list'));   
    if (is_null($records)) return array();
    
    $resultRecords = array();
    $cacheCategory = array();
    
    foreach($records as $record) { 
      $date = $record->date;
      $categoryId = $record->category;      
      $record = (array)$record; 
           
      if (!isset($resultRecords[$date]) || !is_array($resultRecords[$date])) {
        $resultRecords[$date] = array();
      }  
      if (!isset($cacheCategory[$categoryId])) {
        $cacheCategory[$categoryId] = $this->_getCategory($categoryId);  
      } 
      
      $record['category'] = $cacheCategory[$categoryId];              
      unset($record['date']);
      
      array_push($resultRecords[$date], $record);     
    }    
    
    uksort($resultRecords, function ($a, $b) {      
      return new DateTime($this->_replaceDate($a)) > new DateTime($this->_replaceDate($b));   
    });    
    
    return $resultRecords;    
  }

	protected function onDisplay()
	{   
    $params = $this->_generateParameters();
		$content = new Template('transactions', $params);
    $this->pageParams['content'] = $content->getView();   
    
		parent::onDisplay();    
	}  
}