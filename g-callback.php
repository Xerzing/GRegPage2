<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08.10.18
 * Time: 13:53
 */

    use GRegPage\GCallback;

    if (isset($_SESSION['access_token'])) {
        $gClient->setAccessToken($_SESSION['access_token']);
    } elseif (isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    } else {
        include_once 'show.php';
        exit();
    }

    $g_callback = new GCallback($gClient);
    $g_callback->writeToSession();

    include_once 'show.php';
    exit();


