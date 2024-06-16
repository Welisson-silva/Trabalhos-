<?php
session_start();
include_once "../config/connect.php";
if (
  isset($_POST["submit"]) &&
  !empty($_POST["email"]) &&
  !empty($_POST["password"])
) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
  $result = mysqli_query($conexao, $query);

  if (mysqli_num_rows($result) > 0) {
    $usuario = mysqli_fetch_assoc($result);
    $nivel_acesso = $usuario["nivel_acesso"];

    if ($nivel_acesso == 1) {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
            <body>
              <div class='msgSucess'>Redirecionando...</div>
              <script>
              setTimeout(function() {
                window.location.href = '../views/admin.php';
              }, 2000);
              </script>
            </body>
            ";
    } else {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
            <body>
              <p>Redirecionando...</p>
              <script>
              setTimeout(function() {
                window.location.href = '../views/client.php';
              }, 2000);
              </script>
            </body>
      ";
    }
  } else {
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location: ../views/tela-login.php");
  }
}
?>
