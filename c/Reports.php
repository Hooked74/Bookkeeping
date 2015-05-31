<?php
final class Reports extends Page
{  
  private $db;
  
  public function __construct()
	{
    $this->db = Connection::Instance();
    $this->_addTrasactionsAssets(); 
	}
  
  private function _addTrasactionsAssets()
	{ 
    array_push($this->pageParams['styles'], 'daterangepicker-bs3', 'reports'); 
    array_push($this->pageParams['vendors'], 'moment.min', 'daterangepicker');   
    $this->setMainScript('reports');  
	} 

	protected function onDisplay()
	{
    $params = array ();
		$content = new Template('reports.tpl', $params);
    $this->pageParams['content'] = $content->getView();
		parent::onDisplay();
	}
}