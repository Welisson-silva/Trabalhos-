<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
session_destroy(); 

echo "
    <html>
    <body>
        <p>Logging out...</p>
        <script>
            setTimeout(function() {
                window.location.href = '../views/tela-login.php'; // Redirect to login page after 2 seconds
            }, 2000);
        </script>
    </body>
    </html>
";
exit(); 
?>
