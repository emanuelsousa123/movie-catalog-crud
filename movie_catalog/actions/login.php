<?php
session_start();
require_once '../includes/config.php';

if (isset($_POST['email_user']) && isset($_POST['password_user'])) {
    $email_user = $_POST['email_user'];
    $password_user = $_POST['password_user'];

    if (!empty($email_user) && !empty($password_user)) {

        $sql = $conexao->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $sql->bindValue(':email', $email_user);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $user = $sql->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password_user, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                header("Location: ../pages/films.php");
                exit;
            } else {
                $_SESSION['erro'] = 6;
                header("Location: ../pages/films.php");
                exit;
                // echo "Senha incorreta.";
            }
        } else {
            $_SESSION['erro'] = 9;
            header("Location: ../pages/films.php");
            exit;
        }

    } elseif (empty($email_user)) {
        $_SESSION['erro'] = 7;
        header("Location: ../pages/films.php");
        exit;
    } elseif (empty($password_user)) {
        $_SESSION['erro'] = 8;
        header("Location: ../pages/films.php");
        exit;
    }
}
?>
