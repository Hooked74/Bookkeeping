<?php
final class Reports extends Page
{
  public function __construct()
	{
   
	}

	protected function onDisplay()
	{
    $params = array ();
		$content = new Template('reports.tpl', $params);
    $this->pageParams['content'] = $content->getView();
		parent::onDisplay();
	}
}