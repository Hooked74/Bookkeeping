<?php 
class Page extends BaseController {
	protected $pageParams = array(
    'vendors' => array('jquery.min', 'bootstrap.min'),
    'styles' => array('normalize', 'bootstrap.min', 'bootstrap-theme.min', 'page'),
    'mainScript' => '',
    'navigation' => '',
    'content' => ''
  );
  
  public static function renderError($message, $code = null) {
    $err = array(
      'code' => $code,
      'message' => $message
    );    
    $errPage = new Page($err);
    $errPage->render();    
  }
  
  public function __construct($err = array())
	{
    $this->setNavigation();
    	 
    $content = !empty($err) 
      ? new Template('default') 
      : new Template('error', $err);    
    
    $this->pageParams['content'] = $content->getView();
	}
  
  protected function setMainScript($scriptName) {
    $this->pageParams['mainScript'] = $scriptName;    
  }
  
  protected function setNavigation($active = null) {
    $navigation = new Template('navigation', array('active' => $active));
    $this->pageParams['navigation'] = $navigation->getView();  
  }
  	
	protected function onDisplay()
	{
		$page = new Template('page', $this->pageParams); 
		echo $page->getView();
	}
}