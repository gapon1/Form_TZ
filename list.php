<?php
require_once "scripts/db.php";

if (!isset($_SESSION['user_login'])) {
    exit("<h2 style='text-align: center'>Dont have Acces to admin page<br/>
    <a class='btn btn-primary' href='login-form.html'>Authorize</a></h2>"
    );
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Test</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header>
    <div class=" bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About project</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other
                        background context. Make it a few sentences long so folks can pick up some informative tidbits.
                        Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white"><?= $_SESSION['user_login'] ?></h4>
                    <ul class="list-unstyled">
                        <li><a href="scripts/logout.php" class="text-white">Выйти</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>


<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
