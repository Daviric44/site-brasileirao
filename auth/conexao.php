<?php
// Cria uma conexão com o banco de dados MySQL
$conn = new mysqli("localhost", "root", "", "sistema_login");

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error); // Encerra e mostra mensagem de erro
}
?>