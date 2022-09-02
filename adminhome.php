
<!DOCTYPE html>
<html>
<head>
<link rel="manifest" href="/manifest.json">;
<link href="css/admin.css" rel="stylesheet">
<style> 
.footer{
  
  background-color: #2B2D42;
  color: #EDF2F4;
}
</style>
</head>
<body>
<?php include("header.php")?>
<h2>Voir les comptes utilisateurs</h2>
<?php
session_start();
include("connect.php");
$verif=getverifadmin();
$var=getallaccount();


function getallaccount()
{   
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from login;" );
    while($row = $select->fetch_array())
    {
        echo "Id : ".$row[0]." User : ".$row[1]." Pass : ".$row[2]." Type : ".$row[3]." Nom : ".$row[4]." Prenom : ".$row[5]." Ville : ".$row[6]."<br>";
    }
}
?>
<h2> Listes créer par les utilisateurs </h2>
<?php
$list=getlist();
function getlist()
{   
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste;" );
    while($row = $select->fetch_array())
    {
        echo "Id : ".$row[0]." User : ".$row[1]." List : ".$row[2]."<br>";
    }
}


?>


    <?php
    # pour basculer en admin 
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1");
    //Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>
<form method="POST" action="">
<div class='container'>
    <h2> Choisir l'utilisateur à basculer en administrateur </h2>
    <label for="user">Choisir l'utilisateur souhaitee:</label>
    <select class="form-control" name="user">
        <?php
        $result = mysqli_query($ms, "SELECT username FROM `login` WHERE usertype=1 ORDER BY username");

        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
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
 

 <?php
 #basculer en user 
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1");
    //Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>
<form method="POST" action="">
<div class='container'>
    <h2> Choisir l'utilisateur à basculer en utilisateur </h2>
    <label for="user">Choisir l'utilisateur souhaitee:</label>
    <select class="form-control" name="user">
        <?php
        $result = mysqli_query($ms, "SELECT username FROM `login` WHERE usertype=2 ORDER BY username");

        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
        ?>
    </select>
    <input type=submit name="userchange" value=Rendre_utilisateur>
</form>

    <?php 
    if(isset($_POST['userchange']))
    {
        $admin = $ms->prepare(" UPDATE login SET usertype = '1'WHERE username =?  ");
        $admin->execute(array($_POST['user']));
        header("location:adminhome.php");
    }


?>
 <?php
 #Delete
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1");
    //Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>
<form method="POST" action="">
<div class='container'>
    <h2> Choisir l'utilisateur à supprimer </h2>
    <label for="user">Choisir l'utilisateur souhaitee:</label>
    <select class="form-control" name="user">
        <?php
        $result = mysqli_query($ms, "SELECT username FROM `login` ORDER BY username");

        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
        ?>
    </select>
    <input type=submit name="supprchange" value=Supprimer>
</form>

    <?php 
    if(isset($_POST['supprchange']))
    {
        $admin = $ms->prepare(" DELETE FROM `login` WHERE username=?;");
        $admin->execute(array($_POST['user']));
        header("location:adminhome.php");
    }


?>
<footer>
    <div class ='footer'>
     <?php echo $_SESSION["username"] ?>
    <a href="deconnexion.php"> Déconnexion </a>
    </div>
</footer>
      
    
</body>
</html>