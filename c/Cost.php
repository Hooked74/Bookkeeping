<?php
final class Cost extends Page
{
  use Transactions;
  
  const CLASS_NAME_LOWERCASE = 'cost';
  const TITLE = 'расход';
  
  public function __construct()
	{ 
    $this->addTrasactionsAssets();  
    $this->setNavigation(Cost::CLASS_NAME_LOWERCASE);
	} 
}