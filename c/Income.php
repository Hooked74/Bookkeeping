<?php
final class Income extends Page
{
  public function __construct()
	{ 
        
	}

	protected function onDisplay()
	{   
    $params = array ();
		$content = new Template('income.tpl', $params);
    $this->pageParams['content'] = $content->getView();   
    
		parent::onDisplay();    
	}
}