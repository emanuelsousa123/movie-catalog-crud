<?php
    session_start();
    
    if (isset($_SESSION['erro'])) {
        $erros = include 'includes/erros.php';
    }

    $erro = $_SESSION['erro'] ?? null;
    unset($_SESSION['erro']);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pages/index.css">
    <title>My Movie Catalog</title>
</head>
<body>
    <div class="dark-background">
        <div id="pop-up">
            <img src="assets/images/efeito_de_folha2.svg" class="effect-border" alt="effect-border">
            <div class="white-background">
                <div class="black-border">
                    <div class="header-signup">
                        <div class="logo-box">
                            <a href="index.php"><img src="assets/images/logo.svg" class="logo-image" alt="logo-image"></a>
                        </div>
                        <div class="title">
                            <h1>SIGN UP</h1>
                        </div>
                        <div class="off-popup"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <form action="actions/signup_user.php" method="post">
        <label for="name_user">Name:</label>
        <input type="text" id="name_user" name="name_user">
        
        <?php
            if($erro == 1) {
                echo '<p>' . $erros[$erro] . '</p>';
            }
        ?>

        <label for="email_user">E-mail:</label>
        <input type="text" id="email_user" name="email_user">

        <?php
            if($erro == 2 || $erro == 4 || $erro == 5) {
                echo '<p>' . $erros[$erro] . '</p>';
            } 
        ?>

        <label for="password_user">Password:</label>
        <input type="text" id="password_user" name="password_user">

        <?php
            if($erro == 3) {
                echo '<p>' . $erros[$erro] . '</p>';
            }
        ?>

        <input type="submit" value="Sign up now">
    </form> -->

    <!-- <form action="actions/login.php" method="post">
        <label for="email_user">E-mail:</label>
        <input type="text" id="email_user" name="email_user">

        <?php
            if($erro == 7 || $erro == 9) {
                echo '<p>' . $erros[$erro] . '</p>';
            }
        ?>

        <label for="password_user">Password:</label>
        <input type="text" id="password_user" name="password_user">
        
        <?php
            if($erro == 6 || $erro == 8) {
                echo '<p>' . $erros[$erro] . '</p>';
            }
        ?>
        


        <input type="submit" value="Log in now">
    </form> -->
</body>
</html>