
<!DOCTYPE html>
<html>
<head>
</head>

<body>
   
<?php include("header_admin.php")?>
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
        echo "Id : ".$row[0]." User : ".$row[1]." Pass : ".$row[2]." Type : ".$row[3]." Nom : ".$row[4]." Prenom : ".$row[5]." Ville : ".$row[6]." <a href='suppr.php?id=".$row[0]."'>Supprimer</a><br>";
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
        $result = mysqli_query($ms, "SELECT username FROM `login` ORDER BY username");

        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
        ?>
    </select>
    <input type=submit value=Rendre_administrateur>
</form>

    <?php 
$admin = $ms->prepare(" UPDATE login SET usertype = '2'WHERE username =?  ");
$admin->execute(array($_POST['user']));

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
    <h2> Choisir l'utilisateur à basculer en user </h2>
    <label for="user">Choisir l'utilisateur souhaitee:</label>
    <select class="form-control" name="user">
        <?php
        $result = mysqli_query($ms, "SELECT username FROM `login` ORDER BY username");

        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
        ?>
    </select>
    <input type=submit value=Rendre_ustilisateur>
</form>

    <?php 
$admin = $ms->prepare(" UPDATE login SET usertype = '1'WHERE username =?  ");
$admin->execute(array($_POST['user']));

?>


<?php
 #Afficher info d'un user
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1");
    //Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>
<form method="POST" action="">
<div class='container'>
    <h2> Choisir l'utilisateur pour voir les données </h2>
    <label for="user">Choisir l'utilisateur souhaitee:</label>
    <select class="form-control" name="user">
        <?php
        $result = mysqli_query($ms, "SELECT username FROM `login` ORDER BY username");

        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
        ?>
    </select>
    <input type=submit value=Information>
</form>

    <?php 
$info = $ms->prepare(" Select * FROM login WHERE username =?  ");
$info->execute(array($_POST['user']));
while($sel = $row = mysqli_fetch_array($result))
{
    echo "Id : ".$row[0]." User : ".$row[1]." Pass : ".$row[2]." Type : ".$row[3]." Nom : ".$row[4]." Prenom : ".$row[5]." Ville : ".$row[6]." <a href='suppr.php?id=".$row[0]."'>Supprimer</a><br>";
}

?>
</table>
    
</body>
</html>