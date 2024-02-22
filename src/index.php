<?php

//phpinfo(); die;






//session_start();
//
//if (empty($_SESSION['is_auth'])) {
//    header('Location: /auth.php');
//    exit();
//}











//$errors = [
//    'email' => null,
//    'zip' => null,
//];
//
//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    echo "IS GET";
//    var_dump($_GET);
//} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
////    echo "IS POST";
//
//    $email = trim($_POST['email']);
//    $zip = trim($_POST['zip']);
//    $password = trim($_POST['password']);
//
//    /*
//     * Email
//     */
//    if (empty($email)) {
//        $errors['email'] = 'Email is required';
//    }
//
//    $emailLength = mb_strlen($email);
//    if ($emailLength < 4) {
//        $errors['email'] = 'Email > 3';
//    }
//
//    if ($emailLength > 255) {
//        $errors['email'] = 'Email < 255';
//    }
//
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $errors['email'] = 'Email mast be valid email';
//    }
//
//    /*
//     * Zip
//     */
//    if (!preg_match('/^[0-9\-]*$/', $zip)) {
//        $errors['zip'] = 'Zip only numbers';
//    }
//
//    /*
//     * ["name"]=> string(8) "test.jpg"
//     * ["full_path"]=> string(8) "test.jpg"
//     * ["type"]=> string(10) "image/jpeg"
//     * ["tmp_name"]=> string(14) "/tmp/phpaNtG4c"
//     * ["error"]=> int(0)
//     * ["size"]=> int(349964)
//     */
//
//    if (isset($_FILES['avatar'])) {
//        // '/var/www/html/uploads/test.jpg'
//        $parts = explode('.', $_FILES['avatar']['name']);
//        $uploadFile = '/var/www/html/uploads/' . uniqid() . '.' . $parts[array_key_last($parts)];
//
//        if (filesize($_FILES['avatar']['tmp_name']) > 2 * 1024 * 1024) {
//            var_dump('File 2MB. Error'); die;
//        }
//
//        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
//            echo "File is valid, and was successfully uploaded.\n";
//        } else {
//            echo "Possible file upload attack!\n";
//        }
//    }
//}
//

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">

    <h1>Home/ Only Admin</h1>
<!--    <img src="/uploads/test.jpg" alt="">-->
    
    <form class="row g-3" method="POST" action="/" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" value="12312321312">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip">
<!--            <div style="color: red">--><?php //= $errors['zip'] ?><!--</div>-->
        </div>
        <div class="col-md-12">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>
</body>
</html>


