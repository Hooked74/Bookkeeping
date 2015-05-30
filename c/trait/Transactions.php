<?php
trait Transactions
{  
  private function _addTrasactionsAssets()
	{ 
    array_push($this->pageParams['styles'], 'bootstrap-datepicker3.standalone.min', 'transactions', 'modal'); 
    array_push($this->pageParams['vendors'], 'bootstrap-datepicker.min', 'bootstrap-datepicker.ru.min');   
    $this->setMainScript(self::CLASS_NAME_LOWERCASE);  
	}  
  
  private function _generateParameters() 
  {    
    return array(
      'mainClass' => self::CLASS_NAME_LOWERCASE,
      'title' => self::TITLE,
      'categories' => $this->_getCategories()
    );
  }
  
  private function _getCategories()  
  {
    return json_decode($this->db->get(self::CLASS_NAME_LOWERCASE . '/categories'));  
  }

	protected function onDisplay()
	{   
    $params = $this->_generateParameters();
		$content = new Template('transactions', $params);
    $this->pageParams['content'] = $content->getView();   
    
		parent::onDisplay();    
	}  
}