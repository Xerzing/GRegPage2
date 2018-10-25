<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.10.18
 * Time: 17:57
 */
session_start();
include_once 'inc/config.php';
include_once 'inc/header.php';

$action = '';
if( isset($_GET['action']) ) {
    $action = strip_tags($_GET['action']);
}


if($action === 'logout') {
    include_once 'logout.php';
} elseif ($action === 'callback') {
    include_once 'g-callback.php';
} else {
    require_once 'inc/config.php';
    $loginURL = $gClient->createAuthUrl();
    include_once 'login.php';
}

//if (isset($_SESSION['access_token'])) {
//    include_once 'show.php';
//} else {
//    require_once 'inc/config.php';
//    $loginURL = $gClient->createAuthUrl();
//    include_once 'login.php';
//}
//
//exit();

