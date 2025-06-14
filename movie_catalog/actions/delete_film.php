<?php
    require_once '../includes/config.php';
    
    echo "hello world";
    $film_id = $_GET['film_id'];
    $director_id = $_GET['director_id'];
    echo $director_id;

    $delete_film = $conexao->prepare("DELETE FROM films WHERE id = :film_id");
    $delete_film->bindValue(':film_id', $film_id);
    $delete_film->execute();

    $delete_films_diretors = $conexao->prepare("DELETE FROM directors_films WHERE films_id = :film_id AND directors_id = :director_id");
    $delete_films_diretors->bindValue(':film_id', $film_id);
    $delete_films_diretors->bindValue(':director_id', $director_id);
    $delete_films_diretors->execute();


    echo 'joia';
    // header("Location: ../pages/films.php");
    // exit();
?>
