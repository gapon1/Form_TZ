<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //==== Validate User Data ====
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $login = validate_input($_POST['login']);
    $password = validate_input($_POST['password']);
    $email = validate_input($_POST['email']);
    $filename = UploaddImg($_FILES['image']);



    if (!empty($login) && !empty($password) && !empty($email)) {

        //==== Check if user Exists in user table ====
        $sql_check = 'SELECT EXISTS( SELECT email FROM users WHERE email = :email)';
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([':email' => $email]);
        if ($stmt_check->fetchColumn()) {
            $errorMessage = "User with choose email already EXIST !";
            include '../errors.php';
            exit();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        //============ Insert gets user data to DB ==========
        $sql = 'INSERT INTO users(login, email, password, image) VALUES(:login, :email, :password, :image)';
        $params = [':login' => $login, ':email' => $email, ':password' => $password, ':image' => $filename];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        header("Location: ../login-form.html");
        $errorMessage = "Registration Success";
        include '../errors.php';
        exit();

    } else {
        $errorMessage = "Please fill all columns";
        include '../errors.php';
        exit();
    }
}
