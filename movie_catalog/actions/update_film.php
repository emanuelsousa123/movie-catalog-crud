<?php
    require_once '../includes/config.php';
    require_once '../includes/auth.php';

    echo 'hello world ' . $_POST['title'];

    $title = $_POST['title'];
    $id_film = $_POST['id_film'];

    $update_film = $conexao->prepare('UPDATE films
    SET title = :title
    WHERE id = :id_film');
    $update_film->bindValue(':title', $title);
    $update_film->bindValue(':id_film', $id_film);
    $update_film->execute();

    header("Location: ../pages/film_information.php?film_id=" . $id_film)
?>