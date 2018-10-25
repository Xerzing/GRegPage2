<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.10.18
 * Time: 18:09
 */

namespace GRegPage;

class DBConnection
{
    private static $instance = null;
    private $conn;

    private $server = 'localhost';
    private $database = 'exercise';
    private $username = 'root';
    private $password = 'win256';

    private function __construct()
    {
        $this->conn = new \PDO("mysql:host={$this->server};
        dbname={$this->database}", $this->username, $this->password);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
           self::$instance = new DBConnection();
        }

        return self::$instance;
    }

    public function dbConnect()
    {
        return $this->conn;
    }
}