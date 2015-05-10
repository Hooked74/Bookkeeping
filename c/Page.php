<?php 
class Page extends BaseController {
	protected $pageParams = array(
    'vendors' => array('jquery.min.js', 'bootstrap.min.js'),
    'styles' => array('normalize.css', 'bootstrap.min.css', 'bootstrap-theme.min.css', 'page.css'),
    'mainScript' => '',
    'content' => ''
  );
  
  public function __construct($errMessage = null, $errCode = null)
	{	
    if (is_null($errMessage)) {
      $content = new Template('default.tpl');  
    }   
    
    $this->pageParams['content'] = $content->getView();
	}
  	
	protected function onDisplay()
	{	
		$page = new Template('page.tpl', $this->pageParams); 
		echo $page->getView();
	}
}