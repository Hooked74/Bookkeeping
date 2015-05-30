<?php 
interface iGenerateToken {
  const SECRET_KEY = 'JKnUuAuTnZNwz6MURU3xioTaUCffjgPLM5w8PMzD';
  const UID = 'dbdcc249b3856fbfd98e099c15c32340';
  
  public function createToken(); 
}

class Connection implements iGenerateToken
{ 
    const FIREBASE_URL = 'https://bookkeeping.firebaseio.com';
    private static $instance; 
       
    public static function Instance()
    {        
      if(self::$instance == NULL){         
          $conn = new Connection();          
          $token = $conn->createToken(); 
            
          include 'vendors/autoload.php';       
          self::$instance = new \Firebase\FirebaseLib(self::FIREBASE_URL, $token);                         
      }
      return self::$instance;        
    }  
    
    private function __construct(){}  
    
    public function createToken() {
      include "FirebaseToken.php";
      $tokenGen = new Services_FirebaseTokenGenerator(self::SECRET_KEY);
      return $tokenGen->createToken(array("uid" => self::UID));  
    }
}