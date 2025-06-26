<?php
    session_start();
    require_once '../includes/config.php';

    if (!isset( $_POST['title_film']) || !isset($_POST['name_genre']) || !isset($_POST['name_director'])) {
        header("Location: ../pages/movie_register_form.php");
        exit;
    } else {
        $title_film = $_POST['title_film'];
        $name_genre = trim($_POST['name_genre']);
        $name_director = trim($_POST['name_director']);
    }
    
    $synopsis_film = isset($_POST['synopsis_film']) ? $_POST['synopsis_film'] : null;
    $review_film = isset($_POST['review_film']) ? $_POST['review_film'] : null;
    $year_film = isset($_POST['year_film']) ? $_POST['year_film'] : null;
    $review_score_film = isset($_POST['review_score_film']) ? $_POST['review_score_film'] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;


    // $synopsis_film = $_POST['synopsis_film'];
    // $review_film = $_POST['review_film'];
    // $year_film = $_POST['year_film'];
    // $review_score_film = $_POST['review_score_film'];
    // $name_genre = trim($_POST['name_genre']);
    // $name_director = trim($_POST['name_director']);
    // $status = $_POST['status'];
    $users_id = $_SESSION['user_id'];

    $verify_genre = $conexao->prepare('SELECT id, name FROM genres WHERE name = :name_genre');
    $verify_genre->bindValue(':name_genre', $name_genre);
    $verify_genre->execute();

    $genero_exist = $verify_genre->fetch(PDO::FETCH_ASSOC);

    if ($genero_exist) {
        $genre_id = $genero_exist['id'];
    } else {
        $add_genre = $conexao->prepare('INSERT INTO genres (name) VALUES (:name_genre)');
        $add_genre->bindValue(':name_genre', $name_genre);
        $add_genre->execute();

        $genre_id = $conexao->lastInsertId(); 
    }

    $verify_director = $conexao->prepare('SELECT id FROM directors WHERE name = :name_director');
    $verify_director->bindValue(':name_director', $name_director);
    $verify_director->execute();

    $director_exist = $verify_director->fetch(PDO::FETCH_ASSOC);

    if ($director_exist) {
        $directors_id = $director_exist['id'];
    } else {
        $add_director = $conexao->prepare('INSERT INTO directors (name) VALUES (:name_director)');
        $add_director->bindValue(':name_director', $name_director);
        $add_director->execute();

        $directors_id = $conexao->lastInsertId(); 
    }

    $image_film = isset($_FILES['image_film']) ? $_FILES['image_film'] : null;

    if ($image_film !== null && $image_film['error'] === UPLOAD_ERR_OK) {
        $targetFile = "uploads/" . uniqid() . "_" . basename($image_film["name"]);
        if (!move_uploaded_file($image_film["tmp_name"], '../' . $targetFile)) {
            die("Erro ao fazer upload do arquivo.");
        }
        $image_url = $targetFile;
    } else {
        $image_url = null;
    }

    

    $add_film = $conexao->prepare('INSERT INTO films (title,synopsis,review,year,review_score,genres_id,status,image_url) VALUES (:title_film,:synopsis_film,:review_film,:year_film,:review_score_film,:genre_id,:status,:image_url)');
    $add_film->bindValue(':title_film',$title_film);
    $add_film->bindValue(':synopsis_film',$synopsis_film);
    $add_film->bindValue(':review_film',$review_film);
    $add_film->bindValue(':year_film',$year_film);
    $add_film->bindValue(':review_score_film',$review_score_film);
    $add_film->bindValue(':genre_id',$genre_id);
    $add_film->bindValue(':status',$status);
    $add_film->bindValue(':image_url',$image_url);
    $add_film->execute();
    $films_id = $conexao->lastInsertId();

    $add_director_film = $conexao->prepare("INSERT INTO directors_films (films_id,directors_id) VALUES (:films_id,:directors_id)");
    $add_director_film->bindValue(':directors_id',$directors_id);
    $add_director_film->bindValue(':films_id',$films_id);
    $add_director_film->execute();

    header("Location: ../pages/films.php");
    exit;
?>