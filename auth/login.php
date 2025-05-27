<?php
include "conexao.php";      // Conecta ao banco de dados
session_start();            // Inicia a sessão para controlar login
?>

 <link rel="stylesheet" href="intro.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

<main class="container">
    <form method="post">
        <h1>Faça login aqui</h1>
        <div class="input-box">
            Email: <input type="email" name="email"><br>
        </div>
    
        <div class="input-box">
            Senha: <input type="password" name="senha"><br>
        <div>
    
        <input class="login" type="submit" value="Entrar">
    </form>
    <a href="../index.html">Voltar</a>
</main>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];         // Pega o e-mail enviado
    $senha = $_POST["senha"];         // Pega a senha enviada

    // Procura o usuário no banco de dados pelo e-mail
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $usuario = $res->fetch_assoc(); // Pega os dados do usuário

        // Verifica se a senha enviada confere com a senha criptografada
        if (password_verify($senha, $usuario["senha"])) {
            $_SESSION["usuario"] = $usuario["nome"];  // Salva o nome do usuário na sessão
            header("Location: painel.php");           // Redireciona para o painel
        } else {
            echo "Senha incorreta!";  // Senha errada
        }
    } else {
        echo "Usuário não encontrado!"; // E-mail não existe
    }
}
?>