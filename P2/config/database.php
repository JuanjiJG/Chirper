<?php

/**
 * Define a Singleton class to get a database connection, and always the same,
 * to execute all the queries
 */
class Database
{
    private static $instance = NULL;

    // As a Singleton class, these methods need to be private in order to prevent multiple instances
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=pw_76655977', 'root', '');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->exec("SET CHARACTER SET UTF8");
            } catch (Exception $e) {
                die("Error - " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}

?>