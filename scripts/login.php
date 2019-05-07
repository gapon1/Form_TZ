<?php

require_once "db.php";

$password = trim($_POST['password']);
$email = trim($_POST['email']);

if (!empty($password) && !empty($email)) {

    $sql = 'SELECT id, email, password FROM users WHERE email = :email';

    $params = [':email' => $email];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    //====== Check password =======
    if ($user) {
        if (password_verify($password, $user->password)) {

            //======= if login and password correct Redirect to list page ======
            $_SESSION['user_login'] = $user->email;
            $user_id = $_SESSION['id'] = $user->id;
            session_start();
            $_SESSION['userID'] = $user_id;
            header('Location: ../profile.php');

        } else {
            //====== Wrong password ======
            $errorMessage = "Wrong email or password.";
            include "../errors.php";
            exit();
        }

    } else {
        //======= Wrong email ======
        $errorMessage = "Wrong email or password";
        include "../errors.php";
        exit();
    }

} else {
    //======= Empty data ======
    header('Location: ../errors.php');
}


