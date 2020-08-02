<?php
class DB
{
    public static $host = "localhost";
    public static $dbName = "my_app";
    public static $username = "root";
    public static $password = "";
    private static $pdo = null;

    private static function connect()
    {
        if (!isset($pdo)) {
            $pdo = new PDO("mysql:host=".self::$host, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS ".self::$dbName;
            $pdo->exec($sql);
            $sql = "use my_app";
            $pdo->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS users(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                email VARCHAR(60) NOT NULL, 
                first_name VARCHAR(60) NOT NULL,
                last_name VARCHAR(60) NOT NULL,
                password VARCHAR(60) NOT NULL,
                filename VARCHAR(60) DEFAULT NULL
            )";
            $pdo->exec($sql);
            return $pdo;
        }
    }

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
            return $data;
        }
    }
}
