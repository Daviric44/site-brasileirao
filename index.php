<!DOCTYPE html>
<html lang="pt-br">
<head>

    
    <?php
include "auth/conexao.php";      // Conecta ao banco de dados
session_start();            // Inicia a sessão para controlar login
?>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="intro.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>Brasileirão-2025</title>
</head>
<body>
    <main class="container">
        
            <img src="img/logo-brasileirao2.png" alt="" id="logo">
            

            <form action="" method="post">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" name="email"  placeholder="Usuário">
                    <i class="bx bxs-user"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="senha" id="" placeholder="Senha">
                    <i class="bx bxs-lock-alt"></i>
                </div>
                
                <div class="lembrar">
                    <label for="">
                        <input type="checkbox" name="" id="">
                        Lembrar senha
                    </label>
                    <a href="">Esqueci a Senha</a>
                </div>

                <input type="submit" value="Entrar" class="login">


                <div class="register">
                    <p>Não tem uma conta? <a href="auth/cadastro.php">Cadastre-se</a></p>
                </div>

            </form>

        
       
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
            header("Location: princ.html");           // Redireciona para o painel
        } else {
            echo "Senha incorreta!";  // Senha errada
        }
    } else {
        echo "Usuário não encontrado!"; // E-mail não existe
    }
}
?>












</body>
</html>




