<?php
session_start();    // Inicia a sessão
session_destroy();  // Destroi a sessão (desloga o usuário)
header("Location: login.php"); // Redireciona para a página de login
?>