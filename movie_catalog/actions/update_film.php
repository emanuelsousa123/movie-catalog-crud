<?php
    require_once '../includes/config.php';
    require_once '../includes/auth.php';

    echo $_POST['director_name'];

    $users_id = $_SESSION['user_id'];

    $film_id = $_POST['film_id'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $director_name = $_POST['director_name'];
    $director_id =$_POST['director_id'];
    $genre_name = $_POST['genre_name'];
    $genre_id = $_POST['genre_id'];
    $synopsis = $_POST['synopsis'];
    $review = $_POST['review'];
    $review_score = $_POST['review_score'];

    $update_film = $conexao->prepare('UPDATE films
    SET title = :title, year = :year, synopsis = :synopsis, review = :review, review_score = :review_score
    WHERE id = :film_id');
    $update_film->bindValue(':film_id', $film_id);
    $update_film->bindValue(':title', $title);
    $update_film->bindValue(':year', $year);
    $update_film->bindValue(':synopsis', $synopsis);
    $update_film->bindValue(':review', $review);
    $update_film->bindValue(':review_score', $review_score);
    $update_film->execute();


    $verify_director = $conexao->prepare('SELECT id FROM directors WHERE name = :director_name');
    $verify_director->bindValue(':director_name', $director_name);
    $verify_director->execute();

    $director_exist = $verify_director->fetch(PDO::FETCH_ASSOC);

    if ($director_exist) {
        $directors_id = $director_exist['id'];

    } else {
        $add_director = $conexao->prepare('INSERT INTO directors (name) VALUES (:director_name)');
        $add_director->bindValue(':director_name', $director_name);
        $add_director->execute();

        $directors_id = $conexao->lastInsertId();
    }

    $add_director_film = $conexao->prepare("UPDATE directors_films
    SET directors_id = :directors_id
    WHERE films_id = :films_id");
    $add_director_film->bindValue(':directors_id',$directors_id);
    $add_director_film->bindValue(':films_id',$film_id);
    $add_director_film->execute();

    $update_genre = $conexao->prepare('UPDATE genres
    SET name = :genre_name
    WHERE id = :genre_id');
    $update_genre->bindValue(':genre_id', $genre_id);
    $update_genre->bindValue(':genre_name', $genre_name);
    $update_genre->execute();

    header("Location: ../pages/film_information.php?film_id=" . $film_id);
    exit();
?>