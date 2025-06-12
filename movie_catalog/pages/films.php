<!DOCTYPE html>
<html lang="en">
    <?php require_once '../includes/auth.php'; ?>
    <?php require_once '../includes/config.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog - Films</title>
</head>
<body>
    <?php
        echo "Bem-vindo, " . htmlspecialchars($_SESSION['user_name']) . '<br>';
    ?>
    <a href="../actions/logout.php">Log out</a><br>
    <a href="movie_register_form.php">Add films</a>

    <div style="display:flex; gap:20px; margin: 20px;">
        <?php
            $select_film = $conexao->prepare('SELECT 
            films.id, 
            films.title, 
            films.year, 
            films.image_url, 
            directors.name AS director_name
            FROM films 
            JOIN directors_films ON directors_films.films_id = films.id
            JOIN directors ON directors.id = directors_films.directors_id
            ORDER BY films.id DESC'
            );
            $select_film->execute();
            $films = $select_film->fetchAll();

            foreach ($films as $film) {
                echo 
                '<div style="border: solid black 1px; width:100px;">
                    <a href="film_information.php?film_id=' . urlencode($film['id']) . '">
                        <img src="' . htmlspecialchars($film['image_url']) . '" alt="ham?" height="auto" width="100px">
                        <h3>' . htmlspecialchars($film['title']) . '</h3>
                    </a>
                    <p>By ' . htmlspecialchars($film['director_name']) . '</p>
                    <p>' . htmlspecialchars($film['year']) . '</p></div>';
            }
        ?>
    </div>
    <div style="border: solid black 1px;width:100px;"><img src="../uploads/6848cf323a535_gogh174.jpg" alt="ham?" height="auto" width="100px"><h3>title film</h3><p>year</p></div>
</body>
</html>
