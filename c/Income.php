<?php
final class Income extends Page
{  
  use Transactions;
  
  const CLASS_NAME_LOWERCASE = 'income';
  const TITLE = 'доход';
  
  public function __construct()
	{ 
    $this->addTrasactionsAssets();  
    $this->setNavigation(Income::CLASS_NAME_LOWERCASE);
	}  
}