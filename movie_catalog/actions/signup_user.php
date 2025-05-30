<?php
    session_start();

    require_once '../includes/config.php';

   
    if(isset($_POST['name_user']) && isset($_POST['email_user']) && isset($_POST['password_user'])) {
        
        $name_user = $_POST['name_user'];
        $email_user = $_POST['email_user'];
        $password_user = $_POST['password_user'];

        if(!empty($name_user) && !empty($email_user) && !empty($password_user)) {

            if (filter_var($email_user, FILTER_VALIDATE_EMAIL)) {

                $verificar_email = $conexao->prepare("SELECT id FROM users WHERE email = :email");
                $verificar_email->bindValue(':email', $email_user);
                $verificar_email->execute();

                if ($verificar_email->rowCount() > 0) {
                    $_SESSION['erro'] = 4;
                    header("Location: ../index.php");
                    exit;
                } else {
                    $hashed_password = password_hash($password_user, PASSWORD_DEFAULT);

                    $sql = $conexao->prepare("INSERT INTO users (name, email, password) VALUES (:name_user,:email_user,:password_user)");
                    $sql->bindValue(':name_user',$name_user);
                    $sql->bindValue(':email_user',$email_user);
                    $sql->bindValue(':password_user',$hashed_password);
                    $sql->execute();

                    $_SESSION['user_id'] = $conexao->lastInsertId();
                    $_SESSION['user_name'] = $name_user;
                    header("Location: ../pages/films.php");
                    exit;
                }
            } else {
                $_SESSION['erro'] = 5;
                header("Location: ../index.php");
                exit;
            }
            
        } elseif (empty($name_user)) {
            $_SESSION['erro'] = 1;
            header("Location: ../index.php");
            exit;
        } elseif (empty($email_user)) {
            $_SESSION['erro'] = 2;
            header("Location: ../index.php");
            exit;
        } elseif (empty($password_user)) {
            $_SESSION['erro'] = 3;
            header("Location: ../index.php");
            exit;
        }
    }
    
?>