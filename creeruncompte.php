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
            <div class="nom">
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <div class="prenom">
                <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
            </div>
            <div class="id_compte">
                <input type="text" id="id_compte" name="id_compte" placeholder="Username" required>
            </div>
            <div class="ville">
                <input type="text" id="ville" name="ville" placeholder="Ville" required>
            </div>
            <div class="key">
                <input type="password" id="key" name="key" placeholder="Mot de passe">
            </div>
            <div class="submit">
                <input type="submit" name="save" value="S'inscrire">
            </div>
        </form>
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
    $id_compte = $_POST['id_compte'];
    $ville = $_POST['ville'];


    $requete = $connexion->prepare("INSERT INTO compte (nom, prenom, id_compte, ville)
    VALUES (?, ?, ?, ?);");
    $requete->execute(array($nom, $prenom, $id_compte, $ville));
    $connexion->exec($requete);
}
}
catch(PDOException $e)
{
    echo  "Message:" . $e->getMessage();
}

?>



