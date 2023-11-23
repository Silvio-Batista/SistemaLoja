<?php

if (isset($_POST['email'])) {
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
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Fim Bootstrap icon -->
    <link rel="stylesheet" href="style/cadastrar.css">
    <title>Cadastro</title>

</head>

<body>
    <section>
        <div class="container_form">

            <h1>Cadastro</h1>

            <form class="form" method="post">

                <div class="form_grupo">
                    <label for="nome" class="form_label">Nome</label>
                    <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome" required>
                </div>

                <div class="form_grupo">
                    <label for="e-mail" class="form_label">Email</label>
                    <input type="email" name="email" class="form_input" id="email" placeholder="seuemail@email.com" required>
                </div>
                <div class="form_grupo">
                    <label for="numero" class="form_label">Telefone</label>
                    <input type="text" name="telefone" class="form_input" id="email" placeholder="99 99999-9999" required>
                </div>

                <div class="form_grupo">
                    <label for="datanascimento" class="form_label">Data de Nascimento</label>
                    <input type="date" name="dataNascimento" class="form_input" id="datanascimento" placeholder="Data de Nascimento" required>
                </div>
                <div class="form_grupo">
                    <label for="nomeLogin" class="form_label">Login</label>
                    <input type="text" name="nomeLogin" class="form_input" id="nameLogin" placeholder="Nome de Login" required>
                </div>
                <div class="form_grupo">
                    <label for="senha" class="form_label">Senha</label>
                    <input type="password" name="senha" class="form_input" id="senha" placeholder="Sua senha" required>
                </div>
                <div class="form_grupo">
                    <label for="senha" class="form_label">Confirme sua senha</label>
                    <input type="password" name="senhaValida" class="form_input" id="senha" placeholder="Sua senha" required>
                </div>


                <div class="submit">
                    <button type="submit" name="Submit" class="submit_btn">Cadastrar</button>
                    <a href="login.php" class="submit_btn secondary">Login</a>
                    <a href="index.php" class="submit_btn secondary">Voltar</a>
                    </div>
            </form>

        </div><!--container_form-->
    </section>
    <footer>
        <div class="interface">
            <div class="line-footer">
                <div class="flex">
                    <div class="logo">
                        <img src="images/Suplementos frangolino.png" alt="logo supllementos fragolino">
                    </div> <!-- logo footer -->
                    <div class="btn-social">
                        <a href="https://www.instagram.com/silsawkkj/"><button><i class="bi bi-instagram"></i></button></a>
                        <a href="https://github.com/Silvio-Batista"><button><i class="bi bi-github"></i></button></a>
                        <a href="https://www.linkedin.com/in/silvio-p-batista/"><button><i class="bi bi-linkedin"></i></button></a>
                    </div> <!-- button footer -->
                </div><!-- flex -->
            </div><!-- line footer -->
            <div class="line-footer borda">
                <p><i class="bi bi-code-square"></i><a href="https://github.com/Silvio-Batista"> Developed by Silvio</a></p>
            </div><!-- line footer -->
        </div>
    </footer>
</body>

</html>