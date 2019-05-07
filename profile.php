<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Test</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }
        button:hover, a:hover {
            opacity: 0.7;
        }
    </style>
</head>

<body>

<?php

require_once "scripts/db.php";

if (!isset($_SESSION['user_login'])) {
    exit("<h2 class='alert alert-danger text-center'>Dont have Acces to admin page<br/>
    <a class='btn btn-primary' href='login-form.html'>Authorize</a></h2>"
    );
}

$email = $_SESSION['user_login'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
$stmt->execute();
$userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($userInfo as $user) ;

?>

<header>
    <div class=" bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">LOGO</h4>
                    <p class="text-muted">Add some information about the album below, the author</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <ul class="list-unstyled">
                        <li><h4 class="text-white"><?= $email ?></h4></li>
                        <li><a href="scripts/logout.php" class="text-white">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<br>
<h2 style="text-align:center">User Profile Card</h2>
<div class="card">
    <img src="uploads/<?= $user['image'] ?>" alt="John" style="width:100%">
    <h1><?= $user['login'] ?></h1>
    <p><?= $user['email'] ?></p>
    <p>
        <button>Contact</button>
    </p>
</div>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
