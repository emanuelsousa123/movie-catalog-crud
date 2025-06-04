<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add films</title>
</head>
<body>
    <form action="../actions/process_movie_registration.php" method="post">
        <label for="title_film">TITLE:</label>
        <input type="text"name="title_film" id="title_film">

        <label for="synopsis_film">SYNOPSIS:</label>
        <textarea type="text"name="synopsis_film" id="synopsis_film"></textarea>

        <label for="review_film">REVIEW:</label>
        <textarea type="text"name="review_film" id="review_film"></textarea>

        <label for="year_film">YEAR:</label>
        <input type="number" name="year_film" id="year_film" min="1888" max="2100">

        <label for="review_score_film">REVIEW SCORE:</label>

        <label>Avaliação (1 a 10):</label><br>
        <?php for ($i = 1; $i <= 10; $i++) {?>
        <input type="radio" id="review_score_film<?= $i ?>" name="review_score_film" value="<?php echo $i; ?>" required>
        <label for="review_score_film<?= $i ?>"><?= $i ?></label>
        <?php } ?>

        <label for="name_genre">GENRE:</label>
        <input type="text" name="name_genre" id="name_genre">


        <input type="submit" value="cadastrar">

        <!-- <label for="year_film">YEAR:</label>
        <input type="text" name="year_film" id="year_film"> -->


    </form>
</body>
</html>