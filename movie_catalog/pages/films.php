<!DOCTYPE html>
<html lang="en">
    <?php 
        require_once '../includes/config.php';
        require_once '../includes/auth.php';
        $path_base = '../';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/movie_catalog.css?<?= time()?>">
    <link rel="stylesheet" href="../assets/css/pages/films.css?<?= time()?>">
    <title>My Movie Catalog - Films</title>
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
            <div class="intro">
                <h1>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>. Here’s what we’ve been watching…</h1>
                <a href="movie_register_form.php">Add films</a>
            </div>
            <?php include '../includes/movie_catalog.php'; ?>
        </div>
    </div>
</body>
</html>
