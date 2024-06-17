<?php
session_start();
include_once "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $query = "UPDATE usuarios SET nome='$nome', email='$email', password='$senha', nivel_acesso='$nivel_acesso' WHERE id='$id'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        echo "
        <body>
            <p>Salvando usuário editado...</p>
            <script>
                setTimeout(function() {
                    window.location.href = '../views/admin.php';
                }, 2000);
            </script>
        </body>
        ";
    } else {
        echo "<p>Erro ao atualizar os dados!</p>";
    }
}
?>
