<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class=body>
        <form id="formulaire" action=creeruncompte.php method="POST">
            <div class="username">
                <input type="text" id="username" name="username" placeholder="Identifiant" required>
            </div>
            <div class="key">
                <input type="password" id="key" name="key" placeholder="Mot de passe" required>
            </div>
            <div class="nom">
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <div class="prenom">
                <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
            </div>
            <div class="ville">
                <input type="text" id="ville" name="ville" placeholder="Ville" required>
            </div>
            <div class="submit">
                <input type="submit" name="save" value="S'inscrire">
            </div>
        </form>
        <a href="login.php"> Se connecter</a>
    </div>
</body>
</html>


<?php
    include 'connect.php';
    error_reporting(0);

try 
{
$connexion = getconnect();
if(isset($_POST['save']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $username =$_POST['username'];
    $key=$_POST['key'];
    $redirect = header("location:deconnexion.php");

    $requete = $connexion->prepare("INSERT INTO login (username, password, nom, prenom, ville)
    VALUES (?, ?, ?, ?, ?);");
    $requete->execute(array($username, $key, $nom, $prenom, $ville));
    $connexion->exec($requete, $redirect);
    exit();
    
}
}
catch(PDOException $e)
{
    echo  "Message:" . $e->getMessage();
}


?>



