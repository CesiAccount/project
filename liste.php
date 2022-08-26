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
    <div class="compte">
        <input type="text" id="username" name="username" disabled="disabled" value="<?php echo($_SESSION['username'])?>" required>
    </div>
    <div class="wishlist">
        <input type="text" id="wishlist" name="wislist" autocomplete="on" placeholder="Nom" required>
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
    $select = $ms->query("select * from list where username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo "Id : ".$row[0]." User : ".$row[1]." List : ".$row[2]."<br>";
    }
}



$connexion = getconnect();
if(isset($_POST['save']))
{
    $wishlist =$_POST["wishlist"];
    $username =$_POST["username"];
    $redirect = header("location:liste.php");

    $requete = $connexion->prepare("INSERT INTO list (username, wishlist)
    VALUES (?, ?);");
    $requete->execute(array($username, $wishlist));
    $connexion->exec($requete, $redirect);
    if(isset($requete))
    {
        echo "Créer";
    }
    exit();
}


?>
