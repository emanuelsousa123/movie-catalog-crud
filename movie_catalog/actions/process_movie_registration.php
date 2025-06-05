<?php
    session_start();
    require_once '../includes/config.php';

    $title_film = $_POST['title_film'];
    $synopsis_film = $_POST['synopsis_film'];
    $review_film = $_POST['review_film'];
    $year_film = $_POST['year_film'];
    $review_score_film = $_POST['review_score_film'];
    $name_genre = $_POST['name_genre'];
    $name_director = $_POST['name_director'];
    $status = $_POST['status'];
    $users_id = $_SESSION['user_id'];
    
    $add_genre = $conexao->prepare("INSERT INTO genres (name,users_id) VALUES (:name_genre,:users_id)");
    $add_genre->bindValue(':name_genre',$name_genre);
    $add_genre->bindValue(':users_id',$users_id);
    $add_genre->execute();
    $genre_id = $conexao->lastInsertId();

    $add_director = $conexao->prepare("INSERT INTO directors (name,users_id) VALUES (:name_director,:users_id)");
    $add_director->bindValue(':name_director',$name_director);
    $add_director->bindValue(':users_id',$users_id);
    $add_director->execute();
    $directors_id = $conexao->lastInsertId();

    $targetFile = "../uploads/" . uniqid() . "_" . basename($_FILES["image_film"]["name"]);
    if (!move_uploaded_file($_FILES["image_film"]["tmp_name"], $targetFile)) {
        die("Erro ao fazer upload do arquivo.");
    }
    $image_url = $targetFile;

    $add_film = $conexao->prepare('INSERT INTO films (title,synopsis,review,year,review_score,genres_id,status,users_id,image_url) VALUES (:title_film,:synopsis_film,:review_film,:year_film,:review_score_film,:genre_id,:status,:users_id,:image_url)');
    $add_film->bindValue(':title_film',$title_film);
    $add_film->bindValue(':synopsis_film',$synopsis_film);
    $add_film->bindValue(':review_film',$review_film);
    $add_film->bindValue(':year_film',$year_film);
    $add_film->bindValue(':review_score_film',$review_score_film);
    $add_film->bindValue(':genre_id',$genre_id);
    $add_film->bindValue(':status',$status);
    $add_film->bindValue(':users_id',$users_id);
    $add_film->bindValue(':image_url',$image_url);
    $add_film->execute();
    $films_id = $conexao->lastInsertId();

    $add_director_film = $conexao->prepare("INSERT INTO directors_films (films_id,directors_id) VALUES (:films_id,:directors_id)");
    $add_director_film->bindValue(':directors_id',$directors_id);
    $add_director_film->bindValue(':films_id',$films_id);
    $add_director_film->execute();

    echo 'filme cadastrado';
?>