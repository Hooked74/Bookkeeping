<?php
final class Cost extends Page
{
  use Transactions;
  
  const CLASS_NAME_LOWERCASE = 'cost';
  const TITLE = 'расход';   
  
  private $db;
  
  public function __construct()
	{ 
    $this->db = Connection::Instance(); 
    $this->_addTrasactionsAssets();  
    $this->setNavigation(Cost::CLASS_NAME_LOWERCASE);
	} 
}