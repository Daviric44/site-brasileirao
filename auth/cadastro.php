<?php include "conexao.php"; // Inclui o arquivo de conexão com o banco ?> 
<link rel="stylesheet" href="intro.css">
<form method="post">
    <h1>Cadastre-se aqui</h1>
    Nome: <input type="text" name="nome"><br>
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Cadastrar">
</form>
<a href="../index.html">Voltar</a>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    
    // Criptografa a senha usando hash seguro
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    // Monta a query SQL para inserir o novo usuário
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    // Executa a query
    if ($conn->query($sql)) {
        echo "Cadastro realizado! <a href='login.php'>Fazer login</a>"; // Sucesso
    } else {
        echo "Erro: " . $conn->error; // Erro ao inserir
    }
}
?>