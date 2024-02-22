<?php

if (isset($_FILES['avatar'])) {
    $uploadDir = '/var/www/html/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }

    var_dump($_FILES);
    die;
}