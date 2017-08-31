<?php

/**
 * The class Database makes a connection  with the database.
 * It can also be used to show a list of databases, do delete a specific database, to create and update a database.
 * Basic CRUD.
 */
class Database
{
    static private $pdo;
    static private $error;

    function __construct()
    {
    }

    /**
     * This function makes a connection to the database with a specific schema
     *
     * @return PDO
     */
    public static function getConnection()
    {
        $error = null;
        $host = "localhost";
        $db = "finance";
        $username = "root";
        $password = "root";
        $dsn = "mysql:host=$host;dbname=$db";
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_PERSISTENT => true
            ];
        try {
            self::$pdo = new PDO($dsn, $username, $password, $opt);
        } catch (PDOException $e) {
            self::$error = $e->getMessage();
        }
        return self::$pdo;
    }

    /**
     *closeDb: closes the connection with the database.
     *
     * @param geen
     * @Return geen
     */
    public static function closeDb()
    {
        self::$pdo = null;
    }

}
