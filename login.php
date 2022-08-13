<?php
session_start();
include("connect.php");
$connect=getconnect();
?>

<!DOCTYPE <html>
<html lang='en'>
<head>
</head>
<body>
    <div class="body">
        <form action="#" method="POST">
            <div class="login">
                <input type="text" id="id" name="id" placeholder="Identifiant" required>
            </div>
            <div class="mdp">
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>
            </div>
            <div class="submit">
                <input type="submit" name="save" value="Login">
            </div>
        </form>
        <a href="creeruncompte.php"> Pas inscrit : créer un compte </a>
    </div>
</body>
</html>




<?php
// Le code suivant est l'identification du compte, est il un admin ou un simple utilisateur ?'
// L'on intéroge donc la variable indiquant cela et l'on signale la non connection en cas d'érreur'
// En cas de succès l'on redirige alors vers les pages correspondantes à chaque compte'
// ________________________________________________________________________________________________'
try
{
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    if(isset($_POST['save']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $id=$_POST["id"];
            $mdp=$_POST["mdp"];

            $sql="select * from login where username='".$id."' AND password='".$mdp."' ";

            $result=mysqli_query($ms,$sql);
            $row=mysqli_fetch_array($result);

            if($row["usertype"]=="1" && $row["usertype"]!= "2")
            {
                $_SESSION["username"]=$id;
                header("location:userhome.php");
            }
            elseif($row["usertype"]=="2" && $row["usertype"]!= "1")
            {
                $_SESSION["username"]=$id;
                header("location:adminhome.php");
            }
            else
            {
                echo "Identifiant ou Mot de passe incorrect";
            }
        }
    }
}
catch(PDOException $e)
{}
?>