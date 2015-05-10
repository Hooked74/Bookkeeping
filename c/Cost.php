<?php
final class Cost extends Page
{
  public function __construct()
	{
 
	}

	protected function onDisplay()
	{
    $params = array ();
		$content = new Template('cost.tpl', $params);
    $this->pageParams['content'] = $content->getView();
		parent::onDisplay();
	}
}