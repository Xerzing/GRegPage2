<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08.10.18
 * Time: 17:21
 */

    unset($_SESSION['access_token']);
    $gClient->revokeToken();
    session_destroy();
    header('Location: index.php');
    exit();

