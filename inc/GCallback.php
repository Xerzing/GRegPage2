<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.10.18
 * Time: 22:29
 */

namespace GRegPage;

class GCallback
{
    public function __construct($g_client)
    {
        $this->g_client = $g_client;
    }

    /**
     * Take a data about user from Google+
     *
     * @return \Google_Service_Oauth2_Userinfoplus
     */
    private function getData(){
        $oAuth = new \Google_Service_Oauth2($this->g_client);
        $result = $oAuth->userinfo_v2_me->get();
        return $result;
    }

    /**
     * Process data about user and give the same data
     * from database
     *
     * @return array $result
     */
    private function processData()
    {
        $userData = $this->getData();
        $gdatabase = new GDataBase($userData);
        $gdatabase->createTable();
        $gdatabase->checkUser();
        $result = $gdatabase->takeFromDatabase();
        return $result;
    }

    // Write data to $_SESSION and show in "Show" page
    public function writeToSession()
    {
        $user_info = $this->processData();
        $_SESSION['id_user'] = $user_info['id_user'];
        $_SESSION['first_name'] = $user_info['first_name'];
        $_SESSION['last_name'] = $user_info['last_name'];
        $_SESSION['email'] = $user_info['email'];
        $_SESSION['gender'] = $user_info['gender'];
        $_SESSION['picture'] = $user_info['picture'];
    }
}