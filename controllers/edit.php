<?php
session_start();
include_once "../config/connect.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nome = $row["nome"];
            $email = $row["email"];
            $senha = $row["senha"];
            $nivel_acesso = $row["nivel_acesso"];
        }
    } else {
        header("Location: ../views/admin.php");
        exit();
    }
} else {
    header("Location: ../views/admin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
        body,
        html {
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

        .container input,
        .container select,
        .container button {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .container input:focus,
        .container select:focus {
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
</head>

<body>
    <div class="navbar">
        <h2>Sistema PHP | Editar Usuarios</h2>
    </div>
    <div>
        <div class="container">
            <h2>Editar</h2>
            <form action="saveEdit.php?id=<?php echo $id; ?>" method="post">
                <input type="hidden" name="id">
                <input type="text" name="nome" placeholder="Nome" required value="<?php echo $nome ?>" />
                <input type="email" name="email" placeholder="Email" required value="<?php echo $email ?>" />
                <input type="password" name="senha" placeholder="Senha" required value="<?php echo $senha ?>" />
                <select name="nivel_acesso" id="role" required>
                    <option value="2" <?php echo $nivel_acesso == 2 ? "selected" : ""; ?>>Cliente</option>
                    <option value="1" <?php echo $nivel_acesso == 1 ? "selected" : ""; ?>>Admin</option>
                </select>
                <button type="submit">Editar</button>
            </form>
        </div>
    </div>
</body>


</html>