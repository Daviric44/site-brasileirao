<?php
session_start(); // Inicia sessão

// Verifica se o usuário está logado
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php"); // Se não estiver logado, redireciona para login
    exit;                          // Encerra o script
}
?>

<!-- Conteúdo do painel, visível apenas para usuários logados -->
<h2>Bem-vindo, <?= $_SESSION["usuario"] ?>!</h2> <!-- Mostra o nome do usuário -->
<a href="logout.php">Sair</a> <!-- Link para logout -->