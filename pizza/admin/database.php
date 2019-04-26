<?php

class Database
{
    private static $dbHost = "gzkv.myd.infomaniak.com";
    private static $dbName = "gzkv_g1g4";
    private static $dbUsername = "gzkv_g1g4";
    private static $dbUserpassword = "mV9nEK2Z7vcv";

    private static $connection = null;

    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);

            }

            catch(PDOException $e)

            {

                die($e->getMessage());
            }

        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }

}
?>
