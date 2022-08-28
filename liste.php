<?php include 'header.php'; 
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=liste.php method="POST">
    <div class="wishlist">
        <input type="text" id="name" name="name" autocomplete="on" placeholder="Nom" required>
    </div>
    <div class="submit">
        <input type="submit" id="save" name="save" value="Créer">
    </div>
    </form>
</body>
</html>


<?php

include("connect.php");
$verif = getverif();
$var=getlistuser();

function getlistuser()
{   
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste where username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }
}

$bdd = getconnect();
if(isset($_POST['save']))
{
    $new = $bdd->prepare("INSERT INTO liste(username, name) VALUES(
        ?, ?);");
    $new->execute(array($_SESSION['username'],$_POST['name']));
    header("location:liste.php");
}



# pour basculer en admin 
$ms = mysqli_connect("127.0.0.1:3307","root","","erin1");
//Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<form method="POST" action="">
<div class='container'>
<h2> Choisir la liste </h2>
<label for="user">Choisir la liste</label>
<select class="form-control" name="user">
    <?php
    $result = mysqli_query($ms, "SELECT name FROM `liste` AND username='".$_SESSION["username"]."';");

    while ($row = mysqli_fetch_array($result))
        echo "<option name='user' value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    ?>
</select>
<input type=submit name="adminchange" value=Rendre_administrateur>
</form>

<?php 
if(isset($_POST['adminchange'])) 
{
    $admin = $ms->prepare(" UPDATE login SET usertype = '2' WHERE username =?  ");
    $admin->execute(array($_POST['user']));
    header("location:adminhome.php");
}


?>
