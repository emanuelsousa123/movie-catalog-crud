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

        <label for="email_user">E-mail:</label>
        <input type="text" id="email_user" name="email_user">

        <label for="password_user">Password:</label>
        <input type="text" id="password_user" name="password_user">

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