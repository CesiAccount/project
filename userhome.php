<?php
session_start();
include("connect.php");
$verif=getverifuser();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>USER</h1>
    <?php echo $_SESSION["username"] ?>
    <a href="deconnexion.php"> Déconnexion</a>
</body>
</html>
