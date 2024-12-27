<?php

class database
{
    private static $conn = null;
    public static function pdo_getconnection()
    {
        $username = get_db_config("username");
        $host = get_db_config("host");
        $password =get_db_config("password");
        $dname = get_db_config("name");
        try {
            //if the connection does exit it will setups the connection
            if (database::$conn == null) {
                $connection = new PDO("mysql:host=$host;dbname=$dname", $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                database::$conn = $connection;
                return database::$conn;
            } else {
                return database::$conn;
            }
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
}
?>