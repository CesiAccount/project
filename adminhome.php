<?php
session_start();
include("connect.php");
$verif=getverifadmin();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>ADMIN</h1>
    <?php echo $_SESSION["username"] ?>
    <a href="deconnexion.php"> Déconnexion </a>
</body>
</html>


