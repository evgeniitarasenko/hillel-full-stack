<?php
session_start();

/** @var PDO $pdo */
require 'pdo-config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
    ];

    $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
    $stmt->execute($data);

    $_SESSION['created_success'] = true;

    header('Location: /pdo/');
    exit();
}

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
<a href="/pdo/">Index</a>

<h1>Create</h1>

<div class="container">
    <form class="row g-3 needs-validation" method="POST" action="/pdo/create.php">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Name</label>
            <input type="text" class="form-control" id="validationCustom01" value="Mark" required name="name">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create user</button>
        </div>
    </form>
</div>

</body>
</html>
