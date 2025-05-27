<?php
include "conexao.php";      // Conecta ao banco de dados
session_start();            // Inicia a sessão para controlar login
?>

<form method="post">
    <h1>Faça login aqui</h1>
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Entrar">
</form>
<a href="../index.html">Voltar</a>

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