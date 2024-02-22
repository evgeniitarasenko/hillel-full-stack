<?php

/** @var PDO $pdo */
require 'pdo-config.php';

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();

if (!$user) {
    header('Location: /pdo/404.php');
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
</head>
<body>

<a href="/pdo/">List</a>

<h1>Read</h1>

<h3>Id: <?php echo $user['id'] ?></h3>
<h3>Name: <?php echo $user['name'] ?></h3>


</body>
</html>
