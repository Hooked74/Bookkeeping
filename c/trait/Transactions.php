<?php
trait Transactions
{
  private function addTrasactionsAssets()
	{ 
    array_push($this->pageParams['styles'], 'bootstrap-datepicker3.standalone.min', 'transactions', 'modal'); 
    array_push($this->pageParams['vendors'], 'bootstrap-datepicker.min', 'bootstrap-datepicker.ru.min');   
    $this->setMainScript(self::CLASS_NAME_LOWERCASE);  
	}  
  
  private function generateParameters() 
  {
    return array(
      'mainClass' => self::CLASS_NAME_LOWERCASE,
      'title' => self::TITLE
    );
  }

	protected function onDisplay()
	{   
    $params = $this->generateParameters();
		$content = new Template('transactions', $params);
    $this->pageParams['content'] = $content->getView();   
    
		parent::onDisplay();    
	}
}