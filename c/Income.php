<?php
final class Income extends Page
{  
  use Transactions;
  
  const CLASS_NAME_LOWERCASE = 'income';
  const TITLE = 'доход';
  
  private $db;
  
  public function __construct()
	{ 
    $this->db = Connection::Instance();    
    $this->_addTrasactionsAssets();  
    $this->setNavigation(Income::CLASS_NAME_LOWERCASE);
	}  
}