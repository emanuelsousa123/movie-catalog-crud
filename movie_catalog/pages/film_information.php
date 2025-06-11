<?php
    require_once '../includes/auth.php';
    require_once '../includes/config.php';

    echo $_GET['id'];

    $select_film = $conexao->prepare('SELECT id, title, year, image_url FROM films WHERE users_id = :users_id AND id = :id');
    $select_film->bindValue('users_id', $_SESSION['user_id']);
    $select_film->bindValue('id', $_GET['id']);
    $select_film->execute();
    $film = $select_film->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog - <?= $film['title']?></title>
</head>
<body>
    <h1><?= $film['title']?></h1>
    <img width='100px' height="auto" src="<?= $film['image_url']?>" alt="#">
    <p><?= $film['year']?></p>

</body>
</html>