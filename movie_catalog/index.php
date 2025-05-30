<?php
    session_start();

    $erro = $_SESSION['erro'] ?? null;
    unset($_SESSION['erro']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog</title>
</head>
<body>
    <form action="actions/signup_user.php" method="post">
        <label for="name_user">Name:</label>
        <input type="text" id="name_user" name="name_user">
        
        <?php
            if($erro == 1) {
                echo '<p>Preencha com seu nome</p>';
            }
        ?>

        <label for="email_user">E-mail:</label>
        <input type="text" id="email_user" name="email_user">

        <?php
            if($erro == 2) {
                echo '<p>Preencha com seu email</p>';
            } elseif($erro == 4) {
                echo "<p>Este e-mail já está cadastrado.</p>";
            } elseif($erro == 5) {
                echo "<p>E-mail inválido!</p>";
            }
            
        ?>

        <label for="password_user">Password:</label>
        <input type="text" id="password_user" name="password_user">

        <?php
            if($erro == 3) {
                echo '<p>Preencha com sua senha</p>';
            }
        ?>

        <input type="submit" value="Sign up now">
    </form>

    <form action="actions/login.php" method="post">
        <label for="email_user">E-mail:</label>
        <input type="text" id="email_user" name="email_user">

        <label for="password_user">Password:</label>
        <input type="text" id="password_user" name="password_user">

        <input type="submit" value="Log in now">
    </form>
</body>
</html>