<!DOCTYPE html>
<html lang="en">
    <?php require_once '../includes/auth.php'; ?>  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Catalog - Films</title>
</head>
<body>
    <?php
        echo "Bem-vindo, " . htmlspecialchars($_SESSION['user_name']) . '<br>';
    ?>
    <a href="../actions/logout.php">Log out</a>
</body>
</html>
