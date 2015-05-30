<?php
abstract class BaseController
{
  abstract protected function onDisplay();

  public function render() {   
    $this->onDisplay();
  }
  	
	public function isGET()
	{
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}
	
	public function isPOST()
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

  public function isIE()
	{
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/MSIE (6|7)/i', $agent) && !preg_match('/Opera/i', $agent))
			return true;
		return false;
	}
  
  public function isIE8()
	{
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/MSIE 8/i', $agent) && !preg_match('/Opera/i', $agent))
			return true;
		return false;
	} 
  
  public function isIELater8()
	{
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/MSIE (9|1|2)/i', $agent) && !preg_match('/Opera/i', $agent))
			return true;
		return false;
	} 
  
  protected function excHandling($message, $code = null)
  {      
    throw new MyException($message, $code);     
  }
}