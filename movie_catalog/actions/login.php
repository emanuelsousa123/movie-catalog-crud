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
                echo "Senha incorreta.";
            }
        } else {
            echo "E-mail não encontrado.";
        }

    } else {
        echo "Preencha todos os campos2.";
    }
}
?>
