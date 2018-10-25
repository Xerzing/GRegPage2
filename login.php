<?php
//    require_once 'inc/config.php';
//
//    if (isset($_SESSION['access_token'])) {
//        header('Location: show.php');
//        exit();
//    }
//
//    $loginURL = $gClient->createAuthUrl();
//    include_once 'inc/header.php';
?>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">

                <div id="logo"></div><br><br>

                <form>
                    <input name="email" placeholder="EMail" type="text" class="form-control"><br>
                    <input name="password" placeholder="Password" type="password" class="form-control"><br>
                    <input type="submit" value="Log In" class="btn btn-primary">
                    <input type="button" onclick="window.location = '<?php echo $loginURL ?>'" value="Log In with Google" class="btn btn-danger">
                </form>

            </div>
        </div>
    </div>
</body>
</html>
