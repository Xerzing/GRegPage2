<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09.10.18
 * Time: 10:47
 */

namespace GRegPage;

class GDataBase
{
    public function __construct($userData)
    {
        $this->user_id = $userData['id'];
        $this->first_name = $userData['givenName'];
        $this->last_name = $userData['familyName'];
        $this->email = $userData['email'];
        $this->gender = $userData['gender'];
        $this->picture = $userData['picture'];
    }

    public function createTable()
    {
        $instance = DBConnection::getInstance();
        $db = $instance->dbConnect();

        try {
            $query_str = "CREATE TABLE IF NOT EXISTS `exercise`.`users` ( 
                `id` INT(30) NOT NULL AUTO_INCREMENT , 
                `id_user` VARCHAR(30) NOT NULL , 
                `first_name` VARCHAR(50) NOT NULL , 
                `last_name` VARCHAR(50) NOT NULL , 
                `email` VARCHAR(70) NOT NULL , 
                `gender` VARCHAR(10) NOT NULL ,
                `picture` TEXT NULL DEFAULT NULL , 
                PRIMARY KEY (`id`),
                UNIQUE (`id_user`)
            )";
            $db->query($query_str);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Checks if there is a user in the database. if is not, then adds user
    public function checkUser()
    {
        $instance = DBConnection::getInstance();
        $db = $instance->dbConnect();
        $check = 0;

        try {
            $query = $db->prepare('SELECT * FROM users WHERE id_user = ?');
            $query->execute(array($this->user_id));
            $check = $query->rowCount();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        if($check <= 0){
            $this->writeToDatabase();
        }
    }

    private function writeToDatabase()
    {
        $instance = DBConnection::getInstance();
        $db = $instance->dbConnect();

        try {
            $query_str = "INSERT INTO users (
                          `id_user`, 
                          `first_name`, 
                          `last_name`, 
                          `email`, 
                          `gender`, 
                          `picture`
                      ) VALUES (
                          '$this->user_id', 
                          '$this->first_name', 
                          '$this->last_name', 
                          '$this->email', 
                          '$this->gender', 
                          '$this->picture');";
            $db->query($query_str);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Take user information from database
     *
     * @return array $result
     */
    public function takeFromDatabase()
    {
        $instance = DBConnection::getInstance();
        $db = $instance->dbConnect();

        try {
            $query_str = "SELECT * FROM users WHERE `id_user` = '$this->user_id';";
            $query = $db->prepare($query_str);
            $query->execute();
            $result = $query->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $db = null;

        return $result;
    }
}
