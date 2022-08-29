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
    </form>
</body>
</html>


<?php
include("connect.php");
$verif = getverif();
$var=getlistuser();

function getarticles()
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




/*
function postlistuser()
{   
    if(isset($_POST['save']))
    {
    $redirect = header("location:liste.php");
    $connexion = getconnect();
    $username = $_POST["username"];
    $name = $_POST["name"];
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $new = $ms->query("INSERT INTO liste (username, name)
    VALUES ($username, $name);");
    $connexion->exec($new, $redirect);
    }
}
*/


?> 
