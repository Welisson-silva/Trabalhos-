<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nivel_acesso = 2;
    include_once "../config/connect.php";

    $verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_validate = mysqli_query($conexao, $verifica_email);

    if (mysqli_num_rows($result_validate) > 0) {
        echo "<p>EMAIL JA CADASTRADO!</p>";
    } else {
        $query = "INSERT INTO usuarios (nome, email, senha, nivel_acesso) VALUES ('$nome', '$email', '$senha', '$nivel_acesso')";
        $result = mysqli_query($conexao, $query);

        if ($result) {
            echo "
                <body>
                    <div class='loader-container'>
                        <div class='loader'></div>
                    </div>
                    <p class='msgSucess' style='text-align: center;'>Usuários cadastrados com sucesso! Redirecionando...</p>
                    <script>
                        setTimeout(function() {
                            window.location.href = 'tela-login.php';
                        }, 1000);
                    </script>
                </body>
            ";
        } else {
            echo "<p>ERRO AO CADASTRAR USUÁRIOS!</p>";
        }
    }
} ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/tela-cadastro.css">
</head>

<body>
    <div class="cadastro-container">
        <form class="cadastro-form" action="tela-cadastro.php" method="post">
            <h1>Cadastro</h1>
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="senha" required>
            </div>
            <input type="submit" class="btn btn-signup" value="Cadastrar" />
            <p>
                Já tem conta ? <a href="./tela-login.php">Login</a>
            </p>
        </form>
    </div>
</body>

</html>