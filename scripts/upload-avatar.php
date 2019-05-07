<?php
error_reporting(0);
require_once "register.php";

function UploaddImg($image)
{
    //======== Set name for uploads image ========
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    //========= Verify image type  ================
    function get_image_info($filename = NULL)
    {
        if (!is_file($filename)) return false;

        if (!$data = getimagesize($filename) or !$filesize = filesize($filename)) return false;

        $extensions = [
            1 => 'gif',
            2 => 'jpg',
            3 => 'png'
        ];

        $result = array('width' => $data[0],
            'height' => $data[1],
            'extension' => $extensions[$data[2]],
            'size' => $filesize,
            'mime' => $data['mime']);

        return $result;
    }

    $valid_extensions = array('gif', 'jpg', 'png');

    if (!$image_info = get_image_info($_FILES['image']['tmp_name']) or !in_array($image_info['extension'], $valid_extensions)) {
        $errorMessage = "Wrong Image type, yor cal load just png, jpg or gif";
        include '../errors.php';
        exit();
    }

    move_uploaded_file($image['tmp_name'], "../uploads/" . $filename);

    return $filename;

}




