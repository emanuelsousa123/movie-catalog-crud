<?php
    require_once '../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog - Add films</title>
    <link rel="stylesheet" href="../assets/css/pages/movie_register_form.css">
</head>
<body>
    <form action="../actions/process_movie_registration.php" method="post" enctype="multipart/form-data">
        <label for="title_film">TITLE:</label>
        <input type="text"name="title_film" id="title_film">

        <label for="image_film">Selecione uma imagem:</label><br>
        <input type="file" id="image_film" name="image_film" accept="image/*"><br><br>

        <img id="preview" src="#" alt="Prévia da imagem" style="max-width: 300px; display: none;">

        <label for="synopsis_film">SYNOPSIS:</label>
        <textarea type="text"name="synopsis_film" id="synopsis_film"></textarea>

        <label for="year_film">YEAR:</label>
        <input type="number" name="year_film" id="year_film" min="1888" max="2100">

        <label for="name_genre">GENRE:</label>
        <input type="text" name="name_genre" id="name_genre">
        
        <label for="name_director">DIRECTOR:</label>
        <input type="text" name="name_director" id="name_director">

        <input type="checkbox" id="status" name="status" value="1" onclick="exibir()";>
        <label for="status">ASSISTIDO</label>

        <div class="escondido" id="box">
            <label for="review_film">REVIEW:</label>
            <textarea type="text"name="review_film" id="review_film"></textarea>

            <label for="review_score_film">REVIEW SCORE:</label>
            <label>Avaliação (1 a 10):</label><br>
            <?php for ($i = 1; $i <= 10; $i++) {?>
            <input type="radio" id="review_score_film<?= $i ?>" name="review_score_film" value="<?php echo $i; ?>" required>
            <label for="review_score_film<?= $i ?>"><?= $i ?></label>
            <?php } ?>
        </div>

        <input type="submit" value="cadastrar">

    </form>
    <script src="../assets/js/exibir.js"></script>
    <script src="../assets/js/image_film_preview.js"></script>
</body>
</html>