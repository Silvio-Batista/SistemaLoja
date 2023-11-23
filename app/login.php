<?php
include('../database/conexao.php');

if (isset($_POST['login']) || isset($_POST['senha'])) {
    if (strlen($_POST['login']) === 0) {
        echo "Preencha seu email";
    } else if (strlen($_POST['senha']) === 0) {
        echo "Preencha sua senha";
    } else {
        $login = $mysqli->real_escape_string($_POST['login']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $sqlCode = "SELECT * FROM cliente WHERE nomeLogin = '$login'";
        $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do código SQL, Erro: " . $mysqli->error);
        $quantidade = $sqlQuery->num_rows;
        if ($quantidade == 1) {
            $usuario = $sqlQuery->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['user'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header('Location: usuarioCadastrado.php');
            }
        } else {
            echo "Falha ao logar! Email ou senha incorretos";
        }
    }
}

?>
<!DOCTYPE html>
<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <label for="login">Login:</label>
    <input type="text" name="login">
    <br> <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha">
    <button type="submit">Entrar</button>
    </form>
</body>
</html>  -->

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <div class="page">
        <img src="images/Suplementos frangolino.png" alt="suplementos frangolino">
        <form method="post" class="formLogin">
            <h1 class="center">Login</h1>
            <span class="voltar"><a href="index.php">Voltar</a></span>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="login">Login</label>
            <input type="text" placeholder="Digite o seu login" autofocus="true" name="login">
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" id="senha">
            <a href="/">Esqueci minha senha</a>
            <a href="cadastrar.php">Cadastrar cliente</a>

            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>

</body>

</html>