<?php
    session_start();             // Inicia a sessão
    session_unset();             // Limpa todas as variáveis da sessão
    session_destroy();           // Destroi a sessão

    // Redireciona para a página de login (ou inicial)
    header("Location: ../index.php");
    exit;
?>