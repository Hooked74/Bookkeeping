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
      'recordsHTML' => $this->_getRecordsHTML()
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
    $this->db->push(self::CLASS_NAME_LOWERCASE . '/list/' . preg_replace('/\./', DATE_SEPARATOR, $_POST['date']), array(
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
  
  private function _replaceDate($date) 
  {    
    if (!isset($this->cacheDate[$date])) {
      $this->cacheDate[$date] = preg_replace('/' . DATE_SEPARATOR . '/', '.', $date);  
    }      
     
    return $this->cacheDate[$date]; 
  }
    
  private function _getRecordsHTML() 
  {
    $records = json_decode($this->db->get(self::CLASS_NAME_LOWERCASE . '/list'));   
    if (is_null($records)) return 'Нет данных';
    
    $recordsHTML = '';   
    $records = (array)$records;
    uksort($records, function ($a, $b) {      
      return new DateTime($this->_replaceDate($a)) > new DateTime($this->_replaceDate($b));   
    });
    
    foreach($records as $date => $oneDateRecord) {      
      $recordsHTML .= '<div class="list-group">'
        . '<span href="#" class="list-group-item active list-header">'
        . '<h4 class="list-group-item-heading">'.$this->_replaceDate($date).'</h4>'
        . '</span>';        
             
      foreach($oneDateRecord as $record) {        
        $categoryId = $record->category;
        if (!isset($cacheCategory[$categoryId])) {
          $cacheCategory[$categoryId] = $this->_getCategory($categoryId);  
        }
              
        $recordsHTML .= '<span href="#" class="list-group-item">'
          . '<h4 class="list-group-item-heading">'.$cacheCategory[$categoryId].'</h4>'    
          . '<span class="badge">'.$record->summ.'</span>'          
          . '<p class="list-group-item-text">'.$record->comment.'</p>'             
          . '</span>'; 
      } 
      
      $recordsHTML .= '</div>';          
    }        
    
    return $recordsHTML;    
  }

	protected function onDisplay()
	{   
    $params = $this->_generateParameters();
		$content = new Template('transactions', $params);
    $this->pageParams['content'] = $content->getView();   
    
		parent::onDisplay();    
	}  
}