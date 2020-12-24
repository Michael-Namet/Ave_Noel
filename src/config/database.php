<?php

namespace App\config;

class Database
{
    const DB_HOST = 'mysql:host=localhost;dbname=avenoel;charset=utf8';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    function getConnection()
    {
        

            $conn = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASSWORD );
            return $conn; 
    }

    function getMysqli(){
        $mysqli = new \mysqli("localhost", self::DB_USER, self::DB_PASSWORD, "avenoel");
        return $mysqli;
    }
}
?>
