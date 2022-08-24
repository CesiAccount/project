<?php
session_start();
include("header.php");
include("connect.php");
$verif = getverifadmin();
?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h1>ADMIN</h1>
    <?php echo $_SESSION["username"] ?>
    <a href="deconnexion.php"> Déconnexion </a>

    <div class="container">
        <div class="row">
            <div class="col">
            <form method="POST" action="">
        <form method="POST" action="">
            <div class='container'>
                <h2> Choisir l'utilisateur à basculer en administrateur </h2>
                <label for="user">Choisir l'utilisateur souhaitee:</label>

                <?php
                $con = mysqli_connect("127.0.0.1:3307","root","","erin1");
                //Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                ?>

                <select class="form-control" name="user">
                    <?php
                    $result = mysqli_query($con, "SELECT username FROM `login` ORDER BY username");

                    while ($row = mysqli_fetch_array($result))
                        echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                    ?>
                </select>

            <?php    onsubmit : 
                $mod = $con->prepare("
                UPDATE login SET usertype = '2'WHERE user=? 
                "); ?>  
        </form>

            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>
</body>

</html>