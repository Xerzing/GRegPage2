<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08.10.18
 * Time: 15:30
 */

//    session_start();
//
//if (!isset($_SESSION['access_token'])) {
//    header('Location: login.php');
//    exit();
//}
//include_once 'inc/header.php';
?>
    <body>
        <div class="container">
            <h1 id="congrat">Congratulation, you're with us!</h1>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="<?php echo $_SESSION['picture']?>" style="width: 90%">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td><?php echo $_SESSION['id_user'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Fisrt Name</th>
                                <td><?php echo $_SESSION['first_name'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td><?php echo $_SESSION['last_name'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">E-Mail</th>
                                <td><?php echo $_SESSION['email'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td><?php echo $_SESSION['gender'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="index.php?action=logout" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </body>
</html>