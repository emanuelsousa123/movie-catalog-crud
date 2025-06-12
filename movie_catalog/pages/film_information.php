<?php
    require_once '../includes/auth.php';
    require_once '../includes/config.php';

    echo $_GET['film_id'];

    $select_film = $conexao->prepare('SELECT 
    films.id, 
    films.title,
    films.synopsis,
    films.review,
    films.review_score,
    films.year, 
    films.image_url,
    films.status,
    directors.name AS director_name,
    genres.name AS genre_name
    FROM films
    JOIN directors_films ON directors_films.films_id = films.id
    JOIN directors ON directors.id = directors_films.directors_id
    JOIN genres ON films.genres_id = genres.id
    WHERE films.id = :id');
    $select_film->bindValue(':id', $_GET['film_id']);
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
    <!-- <h1><?= $film['title']?> - <?= $film['year']?></h1>
    <p>By <?= $film['director_name']?></p>
    <img width='100px' height="auto" src="<?= $film['image_url']?>" alt="#">
    <p><?= $film['synopsis']?></p>
    
    <p><?= $film['review']?></p>
    <p><?= $film['review_score']?></p>
    <p><?= $film['genre_name']?></p>
    <?php
        if ($film['status'] == 1){
            echo '<p>Assistido</p>';
        } else {
            echo '<p>Não assistido</p>';
        }
    ?> -->

        <form action="../actions/update_film.php" method="POST">
            <input type="hidden" name="id_film" value="<?= htmlspecialchars($film['id']) ?>">

            <label for="title">Title:</label>
            <input style="border:none;" type="text" name="title" id="title" value="<?= htmlspecialchars($film['title']) ?>">

            <!-- <label for="year">Year:</label>
            <input style="border:none;" type="text" name="year" id="year" value="<?= htmlspecialchars($film['year']) ?>">

            <label for="director_name">Director:</label>
            <input style="border:none;" type="text" name="director_name" id="director_name" value="<?= htmlspecialchars($film['director_name']) ?>">

            <label for="synopsis">Synopsis:</label>
            <input style="border:none;" type="text" name="synopsis" id="synopsis" value="<?= htmlspecialchars($film['synopsis']) ?>">

            <label for="review">Review:</label>
            <input style="border:none;" type="text" name="review" id="review" value="<?= htmlspecialchars($film['review']) ?>">

            <label for="review_score">REVIEW SCORE:</label>
            <label>Avaliação (1 a 10):</label><br>
            <?php for ($i = 1; $i <= 10; $i++) {?>
            <input type="radio" id="review_score_film<?= $i ?>" name="review_score" value="<?php echo $i; ?>">
            <label for="review_score_film<?= $i ?>"><?= $i ?></label>
            <?php 
                    echo '<script>
                            document.getElementById("review_score_film' . $film["review_score"] . '").checked = true;
                        </script>';
                } 
            ?> -->

            

            <input type="submit">
        </form>

    <a href="films.php">Voltar</a>



</body>
</html>