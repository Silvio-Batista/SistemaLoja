<?php 

if(isset($_POST['email'])){
    include('../database/conexao.php');
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $nomeLogin = $_POST['nomeLogin'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO cliente (nome, dataNascimento, telefone, email, nomeLogin, senha)values ('$nome','$dataNascimento','$telefone','$email','$nomeLogin','$senha')");


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome: </label><br>
        <input type="text" name="nome"><br>

        <label for="datadenascimento">Data de nascimento: </label><br>
        <input type="datetime" name="dataNascimento"><br>

        <label for="telefone">Telefone: </label><br>
        <input type="text" name="telefone"><br>

        <label for="email">Email: </label><br>
        <input type="text" name="email"><br>

        <label for="nomeLogin">Nome de Login: </label><br>
        <input type="text" name="nomeLogin"><br>

        <label for="senha">Senha: </label><br>
        <input type="password" name="senha"><br>

        <label for="senha">Confirme sua senha: </label><br>
        <input type="password" required><br> <br>
        
        <button type="submit">Cadastrar Cliente</button>

    </form>
    <a href="index.php">Voltar</a>
    <a href="login.php">Fazer Login</a>
</body>
</html>