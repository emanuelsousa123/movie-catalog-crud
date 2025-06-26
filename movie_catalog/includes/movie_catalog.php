<?php
    if (!isset($path_base)) {
        $path_base = '../';
    }
    require_once 'config.php';
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

    $select_genres = $conexao->prepare('SELECT * FROM genres');
    $select_genres->execute();
    $genres = $select_genres->fetchAll();

?>

    <section class="movie-catalog">
        <div class="catalog-header">
            <h1 class="catalog-title">Films</h1>
            <p class="catalog-subtitle">Browse the collection or filter by genre and year</p>
        </div>
        <div class="filters">
            <select name="genre-filter" id="genre-filter">
                <option value="all_genres">All Genres</option>
<?php
    foreach ($genres as $genre) {
?>
                <option value="<? $genre['id'] ?>"><?= htmlspecialchars($genre['name'])?></option>
<?php } ?>
            </select>
            <select name="years-filter" id="year-filter">
                <option value="all years">All Years</option>
<?php
    foreach ($films as $film) {
?>
                <option value="<? $film['year'] ?>"><?= htmlspecialchars($film['year'])?></option>
<?php } ?>
            </select>
        </div>
        <div class="movies">

<?php

    
foreach ($films as $film) {
?>
            <a href="<?= $path_base ?>pages/film_information.php?film_id=<?= $film['id'] ?>">
                <div class="card-movie" style=" background-image: url('<?= $path_base . $film['image_url']?>');">
                    <div class="movie-info">
                        <div class="movie-title">
                            <h1><?= $film['title']?></h1>
                        </div>
                        <div class="director_year">
                            <p><?= $film['director_name']?> <?= $film['year']?></p>
                        </div>
                    </div>
                </div>
            </a>
<?php } ?>
        </div>
    </section>
    
    
</body>
</html>
