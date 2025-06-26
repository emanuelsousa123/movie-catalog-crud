<?php
require_once '../includes/auth.php';
require_once '../includes/config.php';

$stmtGenres = $conexao->prepare('SELECT id, name FROM genres');
$stmtGenres->execute();
$genres = $stmtGenres->fetchAll();

$stmtDirectors = $conexao->prepare('SELECT id, name FROM directors');
$stmtDirectors->execute();
$directors = $stmtDirectors->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Film - My Movie Catalog</title>
  <link rel="stylesheet" href="../assets/css/pages/movie_register_form.css?v=<?= time() ?>">
</head>
<body>
    <div class="all-content">
        <div class="content-sheet">
            <header class="navbar">
                <div class="logo">
                    <a href="teste2.php"><img src="../assets/images/logo-image.svg" alt="logo_image"></a>
                </div>

                <div class="search-bar">
                    <div tabindex="0">
                        <input type="text" placeholder="Search...">
                        <div>
                            <img src="../assets/images/icons/search-icon.svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="space"></div>
                
                <nav class="nav-menu">
                    <a href="films.php">Films</a>
                    <a href="#">Lists</a>
                    <a href="#">Directors</a>
                    <div class="user_profile">
                        <a href="user_profile.php?user_id=<?= $_SESSION['user_id'] ?>"><img src="../assets/images/icons/user-icon.svg" alt=""></a>
                    </div>
                    <a class="logout" href="../actions/logout.php">Log out</a>
                </nav>
            </header>
            <form action="../actions/process_movie_registration.php" method="post" enctype="multipart/form-data">
                <div class="all-form">

                    <div class="image_film">
                        <label for="image_film">Select an image:</label>
                        <input type="file" id="image_film" name="image_film" accept="image/*">
                        <img id="preview" src="#" alt="Preview" style="max-width: 300px; display: none;">
                    </div>

                    <div class="form">
                        <div class="title">
                            <div>
                                <label for="title_film">Title:</label>
                            </div>
                            <div>
                                <input type="text" name="title_film" id="title_film" required autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="synopsis">
                            <div>
                                <label for="synopsis_film">Synopsis:</label>
                            </div>
                            <div>
                                <textarea name="synopsis_film" id="synopsis_film"></textarea>
                            </div> 
                        </div>
                        
                        <div>
                            <div>
                                <label for="year_film">Year:</label>
                            </div>
                            <div>
                                <input type="number" name="year_film" id="year_film" min="1888" max="2100" autocomplete="off">
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="select_genre">Genre:</label>
                            </div>
                            <div>
                                <select name="name_genre" id="select_genre">
                                <?php foreach ($genres as $genre): ?>
                                    <option value="<?= htmlspecialchars($genre['name']) ?>">
                                    <?= htmlspecialchars($genre['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>

                                <input type="text" name="name_genre" id="add_genre" style="display: none;" disabled placeholder="New genre...">
                            </div>

                            <button type="button" onclick="toggleField('genre')" id="toggle_genre">Add genre</button>
                            <button type="button" onclick="toggleSelect('genre')" id="toggle_genre_back" style="display: none;">Choose genre</button>
                        </div>
                        
                        <div>
                            <div>
                                <label for="select_director">Director:</label>
                            </div>
                            <div>
                                <select name="name_director" id="select_director">
                                <?php foreach ($directors as $director): ?>
                                    <option value="<?= htmlspecialchars($director['name']) ?>">
                                    <?= htmlspecialchars($director['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>

                                <input type="text" name="name_director" id="add_director" style="display: none;" disabled placeholder="New director...">
                            </div>
                            <button type="button" onclick="toggleField('director')" id="toggle_director">Add director</button>
                            <button type="button" onclick="toggleSelect('director')" id="toggle_director_back" style="display: none;">Choose director</button>
                        </div>
                        
                        

                        

                        <label>  
                            <input type="checkbox" id="status" name="status" value="1" onclick="exibir()">
                            Watched
                        </label>

                        <div class="escondido" id="box">
                            <div>
                                <label for="review_film">Review:</label>
                                <textarea name="review_film" id="review_film"></textarea>
                            </div>
                            
                            <div class="score">
                                <label>Score (1–10):</label><br>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <input type="radio" id="score<?= $i ?>" name="review_score_film" value="<?= $i ?>">
                                    <label for="score<?= $i ?>"><?= $i ?></label>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <input type="submit" value="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
                
  
  <script src="../assets/js/exibir.js"></script>
  <script src="../assets/js/image_film_preview.js"></script>
  <script>
    function toggleField(type) {
      document.getElementById(`select_${type}`).style.display = 'none';
      document.getElementById(`select_${type}`).disabled = true;

      document.getElementById(`add_${type}`).style.display = 'inline';
      document.getElementById(`add_${type}`).disabled = false;

      document.getElementById(`toggle_${type}`).style.display = 'none';
      document.getElementById(`toggle_${type}_back`).style.display = 'inline';
    }

    function toggleSelect(type) {
      document.getElementById(`add_${type}`).style.display = 'none';
      document.getElementById(`add_${type}`).disabled = true;

      document.getElementById(`select_${type}`).style.display = 'inline';
      document.getElementById(`select_${type}`).disabled = false;

      document.getElementById(`toggle_${type}_back`).style.display = 'none';
      document.getElementById(`toggle_${type}`).style.display = 'inline';
    }
  </script>

</body>
</html>
