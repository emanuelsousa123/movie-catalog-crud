<!DOCTYPE html>
<?php
    require_once '../includes/auth.php';
    require_once '../includes/config.php';

    echo $_GET['film_id'];

    $select_film = $conexao->prepare('SELECT 
    films.id AS film_id, 
    films.title,
    films.synopsis,
    films.review,
    films.review_score,
    films.year, 
    films.image_url,
    films.status,
    directors.name AS director_name,
    directors.id AS director_id,
    genres.name AS genre_name,
    genres.id AS genre_id
    FROM films
    JOIN directors_films ON directors_films.films_id = films.id
    JOIN directors ON directors.id = directors_films.directors_id
    JOIN genres ON films.genres_id = genres.id
    WHERE films.id = :id');
    $select_film->bindValue(':id', $_GET['film_id']);
    $select_film->execute();
    $film = $select_film->fetch(PDO::FETCH_ASSOC);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog - <?= $film['title']?></title>
    <style>
        input[disabled] {
            color: #000;
            background-color: #fff;
            cursor: text;
            pointer-events: none; /* para manter desativado mas parecer "normal" */
        }
        select[disabled] {
            opacity: 1; 
            /* background-color: white; */
            color: black;
            border: 1px solid #ccc;
            cursor: text;
            pointer-events: none; /* mantém desativado, mas sem visual feio */
        }
    </style>
</head>
<body>
    <button onclick="desabilitar()">Editar</button>
    <form action="../actions/update_film.php" method="POST">
        <input type="hidden" name="film_id" value="<?= htmlspecialchars($film['film_id']) ?>">
        
        <label for="title">Title:</label>
        <input class="input_update" style="border:none;" type="text" name="title" id="title" value="<?= htmlspecialchars($film['title']) ?>">

        <label for="year">Year:</label>
        <input class="input_update" style="border:none;" type="text" name="year" id="year" value="<?= htmlspecialchars($film['year']) ?>">

        <!-- <label for="director_name">Director:</label>
        <input class="input_update" style="border:none;" type="text" name="director_name" id="director_name" value="<?= htmlspecialchars($film['director_name']) ?>"> -->
            
        DIRECTOR:
        <select class="input_update" name="director_name" id="select_director">
            <?php
                $names_director_bd = $conexao->prepare('SELECT id, name FROM directors');
                $names_director_bd->execute();

                $directors = $names_director_bd->fetchAll();

                if ($directors) {
                    foreach ($directors as $director) {
            ?>

            <option value="<?= htmlspecialchars($director['name']) ?>" 
                <?php if ($director['id'] == $film['director_id']){ 
                    echo 'selected';
                    }
                ?>> 
                <?= htmlspecialchars($director['name']) ?>
            </option>';

            <?php
                    }
                }
            ?>
        </select>
        
        <input type="text" name="director_name" id="add_director" style="display: none;" disabled>

        <button type="button" onclick="adicionarDiretor()" id="aparecer_campo" style="display: none;">adicionar diretor</button>

        <button type="button" onclick="show_select()" id="show_select_id" style="display: none;">escolher diretor</button>
            
        <input type="hidden" name="director_id" value="<?= htmlspecialchars($film['director_id']) ?>">

        <label for="genre_name">Genre:</label>
        <input class="input_update" style="border:none;" type="text" name="genre_name" id="genre_name" value="<?= htmlspecialchars($film['genre_name']) ?>">
            
        <input type="hidden" name="genre_id" value="<?= htmlspecialchars($film['genre_id']) ?>">

        <label for="synopsis">Synopsis:</label>
        <input class="input_update" style="border:none;" type="text" name="synopsis" id="synopsis" value="<?= htmlspecialchars($film['synopsis']) ?>">

        <label for="review">Review:</label>
        <input class="input_update" style="border:none;" type="text" name="review" id="review" value="<?= htmlspecialchars($film['review']) ?>">

        <p>REVIEW SCORE:</p>
        <p>Avaliação (1 a 10):</p><br>
        <?php for ($i = 1; $i <= 10; $i++) {?>
        <input class="input_update" type="radio" id="review_score_film<?= $i ?>" name="review_score" value="<?php echo $i; ?>">
        <label for="review_score_film<?= $i ?>"><?= $i ?></label>
        <?php } ?>

        <input type="submit" value="update" style='display:none;' id="update">
    </form>

    <a href="films.php">Voltar</a>


    <script>
        const input_update = document.querySelectorAll('.input_update');
        const update = document.getElementById('update');
        const aparecer_campo = document.getElementById('aparecer_campo');
        const select_director = document.getElementById('select_director');
        const add_director = document.getElementById('add_director');
        const show_select_var = document.getElementById('show_select_id');

        input_update.forEach(input => input.disabled = true);
        document.getElementById('review_score_film<?= $film["review_score"] ?>').checked = true;
        function desabilitar() {
            input_update.forEach(input => input.disabled = false);
            update.style.display = "inline";
            aparecer_campo.style.display = "inline";
        }
        function adicionarDiretor() {
            select_director.style.display = "none";
            select_director.disabled = true;
            add_director.style.display = "inline";
            add_director.disabled = false;
            aparecer_campo.style.display ="none";
            show_select_var.style.display ="inline";
        }
        function show_select() {
            add_director.style.display = "none";
            add_director.disabled = true;
            select_director.style.display = "inline";
            select_director.disabled = false;
            show_select_var.style.display ="none";
            aparecer_campo.style.display ="inline";
        }

        // function show_input (input1, input2, button1, button2) {
        //     input1.style.display = "none";
        //     input1.disabled = true;
        //     input2.style.display = "inline";
        //     input2.disabled = false;
        //     c.style.display ="none";
        //     d.style.display ="inline";
        // }
    </script>
</body>
</html>
