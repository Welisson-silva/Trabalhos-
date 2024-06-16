<?php
session_start();
include_once "../config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $nivel_acesso = $_POST["nivel_acesso"];

  $verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
  $result_validate = mysqli_query($conexao, $verifica_email);

  if (mysqli_num_rows($result_validate) > 0) {
    echo "<p class='temEmail' >EMAIL JA CADASTRADO!</p>";
  } else {
    $query = "INSERT INTO usuarios (nome, email, senha, nivel_acesso) VALUES ('$nome', '$email', '$senha', '$nivel_acesso')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
      echo "
            <body>
                <p class='msgSucess'>Adicionando usuário......</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '../views/admin.php';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
    } else {
      echo "<p>Erro ao atualizar os dados!</p>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>


body, html {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #2E00F3;
    padding: 10px 20px;
    color: #fff;
    height: 70px;
}

.navbar h2 {
    margin: 0;
    font-size: 24px;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.container h2 {
    color: #573666;
    margin-bottom: 20px;
    text-align: center;
}

.container form {
    display: flex;
    flex-direction: column;
}

.container input, .container select, .container button {
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 16px;
}

.container input:focus, .container select:focus {
    border-color: #2E00F3;
    outline: none;
}

.container button {
    background-color: #2E00F3;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.container button:hover {
    background-color: #573666;
}


</style>
        <body>
            <div class="navbar">
            <h2>Sistema PHP | Adicionar</h2>
          </div>
          <div>
    <div class="container">
        <h2>Adicionar</h2>
        <form action="add.php" method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <select name="nivel_acesso" id="role" required>
                <option value="2">Cliente</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit">Adicionar</button>
        </form>
    </div>
    </div>
</body>
</html>
