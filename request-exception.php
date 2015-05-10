<?php
class MyException extends Exception {
  public function __construct($message = null, $code = 0, Exception $previous = null, $mode = 'dev')
  {
    $message = $this->isXmlHttpRequest() 
      ? json_encode(array('type' => 'error', 'message' => $message, 'mode' => $mode)) 
      : '<pre>' . $message . '</pre>';
      
    parent::__construct($message, $code, $previous);
  } 	
  
  private function isXmlHttpRequest() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
  }
}