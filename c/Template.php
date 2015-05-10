<?php
class Template
{
	private $_template;
	private $_var = array();

	public function __construct($template, $prms = array())
	{
    $this->_template = $template;
    $this->_var = $prms;
	}

	public function __get($name)
	{
		return isset($this->_var[$name]) ? $this->_var[$name] : '';
	}

	public function getView($strip = true)	{	 
    $spr = getenv('COMSPEC')? ";" : ":";
    $includePaths = explode($spr, ini_get('include_path'));
    foreach ($includePaths as $value) {  
      if (file_exists($value.'/'.$this->_template)) {
        break;  
      } elseif (!next($includePaths)) {     
        throw new MyException('Шаблона ' . $this->_template . ' не существует!');  
      }
    }  
  
		ob_start();
		include($this->_template);
		return ($strip) ? $this->_strip(ob_get_clean()) : ob_get_clean();
	}

	private function _strip($data)
	{
		$lit = array("\\t", "\\n", "\\n\\r", "\\r\\n", "  ");
		$sp = array('', '', '', '', '');
		return str_replace($lit, $sp, $data);
	}

	public function xss($data)
	{
		if (is_array($data)) {
			$escaped = array();
			foreach ($data as $key => $value) {
				$escaped[$key] = $this->xss($value);
			}
			return $escaped;
		}
		return htmlspecialchars($data, ENT_QUOTES);
	}
}
