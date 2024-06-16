<?php
session_start();
include_once "../config/connect.php";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
        if ($conexao->query($sqlDelete) === TRUE) {
            echo "
           
            <body>
                <p>Deletando usuário...</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '../views/admin.php';
                    }, 2000);
                </script>
            </body>
            ";
        } else {
            echo "Erro ao deletar usuário: " . $conexao->error;
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
