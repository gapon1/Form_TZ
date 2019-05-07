<?php

require_once "register.php";

function UploaddImg($image)
{
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], "../uploads/" . $filename);

    return $filename;
}




