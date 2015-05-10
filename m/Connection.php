<?php
require_once('config.php');

class Connection
{    
    private static $instance;    
    public static function Instance()
    {
        try{
            if(self::$instance == NULL){         
                self::$instance = new PDO('mysql:host=localhost; dbname=' . __DB_NAME__, 
                    __DB_LOGIN__, __DB_PASSWORD__,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        }
        catch(PDOException $err)
        {
            throw new MyException($err->getMessage(), 500);
        }
    }
}