<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog</title>
    <link rel="stylesheet" href="assets/css/pages/landing_page.css?v= <?= time() ?>">
    <link rel="stylesheet" href="assets/css/login-signup.css?v= <?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/movie_catalog.css?<?= time()?>">

    
</head>
<body>
    <?php
        include 'includes/login-signup.php';
    ?>
    <div class="tudo">
        <div class="content-sheet">
            <header class="navbar">
                <div class="logo">
                    <a href="teste2.php"><img src="assets/images/logo-image.svg" alt="logo_image"></a>
                </div>

                <div class="search-bar">
                    <div tabindex="0">
                        <input type="text" placeholder="Search...">

                        <div>
                            <img src="assets/images/icons/search-icon.svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="space"></div>
                
                <nav class="nav-menu">
                    <div class="login-button">
                        <button onclick="open_popup('login')">Login</button>
                    </div>
                    <div class="signup-button">
                        <button class="button-black" onclick="open_popup('signup')">Sign up</button>
                    </div>
                    <div class="hamburger-menu">
                        <button><img src="assets/images/icons/menu-hamburguer.svg" alt="menu"></button>
                    </div>
                </nav>
            </header>

            <section class="hero">
                <div>
                    <div class="card_hero">
                        <div class="main-heading">
                            <h1>Discover and explore thousands of movies</h1>
                        </div>
                        <div class="subheading">
                            <p>
                                Search, organize, and discover the perfect movie to watch.
                            </p>
                        </div>
                        <div class="cta-button">
                            <button class="button-black" onclick="open_popup('signup')">Get Started <span><img src="assets/images/icons/Arrow-right.svg" alt="arrow-right"></span></button>
                        </div>
                    </div>
                </div>
                <div>
                    <img style="transform: rotate(-5deg)" width="auto" height="250px" src="assets/images/poster.jpg" alt="">
                    <img style="transform: translate(-60px, 30px) rotate(3deg);" width="auto" height="250px" src="assets/images/poster2.webp" alt="">
                </div>
                
            </section>
            <?php 
                $path_base = './';
                include 'includes/movie_catalog.php';
            ?>
        </div>
    </div>
    
    

     <script>
        function open_popup(type) {
            document.getElementById("dark-background").classList.add("show");
            document.getElementById(type).style.display = 'flex';
        }

        function close_popup(type) {
            document.getElementById("dark-background").classList.remove("show");
            document.getElementById(type).style.display = 'none';
        }

        function open_close(type1,type2) {
            document.getElementById(type1).style.display = 'flex';
            document.getElementById(type2).style.display = 'none';
            
        }
    </script>
</body>
</html>
