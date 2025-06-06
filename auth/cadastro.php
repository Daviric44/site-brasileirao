<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../cadastro.css">
</head>
<body>
    <main class="container">
        <img src="../img/logo-brasileirao2.png" alt="" id="logo">
        <form method="post">
            <h1>Cadastre-se aqui</h1>
            <div class="input-box"><input type="text" name="nome" placeholder="Nome"><br></div>
            <div class="input-box"><input type="email" name="email" placeholder="Email"></div>
            <div class="input-box"><input type="password" name="senha" placeholder="Senha"><br></div>
            <input type="submit" value="Cadastrar" class="cadastrar">
        </form>
        <button><a href="../login.php" class="voltar">Voltar</a></button>
    </main>
</body>
</html>


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
        //echo "Cadastro realizado! <a href='../login.php' classe=realizado>Fazer login</a>"; // Sucesso
    } else {
        echo "Erro: " . $conn->error; // Erro ao inserir
    }
}
?>