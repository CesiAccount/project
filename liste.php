<?php include 'header.php'; 
include("connect.php");
session_start();
$verif = getverif();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
        <script src="https://kit.fontawesome.com/af1ca8f634.js" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<title>Listes </title>
    <title>Document</title>
    <style>
   body {
      height: 80vh;
      margin-top: 0rem;
      background-image: url("https://images.creativemarket.com/0.1.0/ps/4607890/1820/1213/m1/fpnw/wm1/znjfye837dljifnh89jbzuacc6z5r23ovpkbwpslduzv0m8a7go38mvuifuwipsd-.jpg?1528984943&s=9339c5c5df26dff5bcf0489fed242237");
      background-repeat: no-repeat;
      background-position: center;

    }

    .container{
    background-color: #EDF2F4;
      border-radius: 5px;
      padding: 15px 25px;
      width: 80%;
      margin: 0 auto;
    }
    </style>    
</head>
<body>
<div class='container'>
    <form action=liste.php method="POST">
    <br>
    <h2> Créer une Liste </h2>
    <label for="user">Choisir le nom de la Liste:</label>
    <div class="wishlist">
        <input type="text" id="name" name="name" autocomplete="on" placeholder="Nom" required>
    </div>
    <div class="submit">
        <input type="submit" id="save" name="save" value="Créer">
    </div>
    </form>

    </form>

    <?php /*

<form method="POST" action="">
<h2> Rechercher un article présent dans une liste par son nom  </h2>
<label for="user">Choisir la liste a afficher:</label>
<select class="form-control" name="rech">
<div class='comp'>
<?php
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $result = mysqli_query($ms, "SELECT nom_liste FROM `liste` WHERE username='" . $_SESSION["username"] . "' ORDER BY username;");
    while ($row = mysqli_fetch_array($result))
        echo "<option name='user' value='" . $row['nom_liste'] . "'>" . $row['nom_liste'] . "</option>";
?>
</select>
<input type="text" id="noma" name="noma" autocomplete="on" placeholder="Nom de l'article" required>
<input type=submit name="rec" value=Recherche-liste>



*/ ?>




    <form method="POST" action="">
    <h2> Supprimer un article contenu dans une liste </h2>
<label for="user">Choisir la liste a afficher:</label>
<select class="form-control" name="listad">
<?php
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $result = mysqli_query($ms, "SELECT nom_liste FROM `liste` WHERE username='" . $_SESSION["username"] . "' ORDER BY username;");
    while ($row = mysqli_fetch_array($result))
        echo "<option name='user' value='" . $row['nom_liste'] . "'>" . $row['nom_liste'] . "</option>";
?>
</select>

<label for="user">Choisir l'element a supprimer:</label>
<select class="form-control" name="listade">
<?php
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $result = mysqli_query($ms, "SELECT nom_article FROM `article` WHERE username='" . $_SESSION["username"] . "' ORDER BY nom_article;");
    while ($row = mysqli_fetch_array($result))
        echo "<option name='user' value='" . $row['nom_article'] . "'>" . $row['nom_article'] . "</option>";
?>
</select>
<input type=submit name="retire" value='Retirer cet article '>
    </form>
    <form method="POST" action="">

    <h2> Choisir la Liste a effacer</h2>
    <label for="user">Choisir la liste à supprimer:</label>
    <select class="form-control" name="list">
<?php
        $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
        $result = mysqli_query($ms, "SELECT nom_liste FROM `liste` WHERE username='" . $_SESSION["username"] . "' ORDER BY username;");
        while ($row = mysqli_fetch_array($result))
            echo "<option name='user' value='" . $row['nom_liste'] . "'>" . $row['nom_liste'] . "</option>";
?>
    </select>
    <input type=submit name="suppr" value=Supprimer>
</form>



<form method="POST" action="">
<h2> Afficher le contenu d'une liste </h2>
<label for="user">Choisir la liste a afficher:</label>
<select class="form-control" name="lista">
<?php
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $result = mysqli_query($ms, "SELECT nom_liste FROM `liste` WHERE username='" . $_SESSION["username"] . "' ORDER BY username;");
    while ($row = mysqli_fetch_array($result))
        echo "<option name='user' value='" . $row['nom_liste'] . "'>" . $row['nom_liste'] . "</option>";
?>
</select>
<input type=submit name="develop" value=Developper>
<?php
    /*$liste = $_POST['lista'];
    echo("Dans la liste il y a :  ");
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste where liste = $lista AND username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }*/

   $option = isset($_POST['lista']) ? $_POST['lista'] : false;
   if ($option) {
        $lista = $_POST['lista'];
        $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
        $select = $ms->query("select nom_article from article where nom_liste ='".$lista."' AND username='".$_SESSION["username"]."';" );
        while ($row = mysqli_fetch_array($select)){
            echo "<div>'".$row['nom_article']."'</div><br>";
        }
   } else {
     echo "task option is required";
     exit; 
   }
?>

</form>
<form method="POST" action="">

<div class="cc">
<?php
    /*$liste = $_POST['lista'];
    echo("Dans la liste il y a :  ");
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste where liste = $lista AND username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }*/

   $options = isset($_POST['listad']) ? $_POST['listad'] : false; 
   $optionss = isset($_POST['listade']) ? $_POST['listade'] : false; 
   if ($options && $optionss){
        $listad = $_POST['listad'];
        $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
        $select = $ms->query("DELETE FROM   article where nom_liste ='".$listad."' AND nom_article ='".$listade."' AND username='".$_SESSION["username"]."';" );
        while ($row = mysqli_fetch_array($select)){
            echo "Article retiré";
        }
   } else {
     echo " ";
     exit; 
   }
?>
</div>

<?php
    /*$liste = $_POST['lista'];
    echo("Dans la liste il y a :  ");
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste where liste = $lista AND username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }*/

   $option = isset($_POST['lista']) ? $_POST['lista'] : false;
   if ($option) {
        $lista = $_POST['lista'];
        $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
        $select = $ms->query("select nom_article from article where nom_liste ='".$lista."' AND username='".$_SESSION["username"]."';" );
        while ($row = mysqli_fetch_array($select)){
            echo "<div>'".$row['nom_article']."'</div><br>";
        }
   } else {
     echo "task option is required";
     exit; 
   }
?>

</form>
<?php /*
<form method="POST" action="">
<div class="cc">

    /*$liste = $_POST['lista'];
    echo("Dans la liste il y a :  ");
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste where liste = $lista AND username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }

   $rech = isset($_POST['rech']) ? $_POST['rech'] : false; 
   $norma = isset($_POST['norma']) ? $_POST['norma'] : false; 
   if ($options && $optionss){
        $rech = $_POST['rech'];
        $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
        $recherche = $ms->query("SELECt nom-produit FROM 'article' where nom_liste ='".$rech."' AND nom_article ='".$norma."' AND username='".$_SESSION["username"]."';" );
        while ($row = mysqli_fetch_array($select)){
            echo "$recherche";
        }
   } else {
     echo " ";
     exit; 
   }

</div>*/?>
<?php 
    if(isset($_POST['suppr']))
    {
        $admin = $ms->prepare(" DELETE FROM `liste` WHERE nom_liste =?  ");
        $admin->execute(array($_POST['list']));
        header("location:reussite.php");
    }





$var=getlistuser();


function getlistuser()
{   
    echo("Vos listes existantes ");
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from liste where username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }
}

function showonliste()
{   

}




$bdd = getconnect();
if(isset($_POST['save']))
{
    $new = $bdd->prepare("INSERT INTO liste(username, nom_liste) VALUES(
        ?, ?);");
    $new->execute(array($_SESSION['username'],$_POST['name']));
    header("location:reussite.php") ;
}

?>
<br><br><br><br><br><br>
</div>
</body>
</html>

<?php include("footer.php")?>
