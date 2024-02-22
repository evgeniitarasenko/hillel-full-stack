<?php

session_start();

/** @var PDO $pdo */
require 'pdo-config.php';

$users = $pdo->query('SELECT id, name FROM users')->fetchAll();

if (!empty($_SESSION['created_success'])) {
    $message = 'Users created success';
    $_SESSION['created_success'] = null;
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


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="/pdo/create.php">Create</a>
        </div>
        <?php if(isset($message)): ?>
        <div class="col">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th><?php echo $user['id'] ?></th>
                        <th><a href="/pdo/read.php?id=<?php echo $user['id'] ?>"><?php echo $user['name'] ?></a></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
