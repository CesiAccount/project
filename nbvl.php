<?php


?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class=body>
        <form action=nbvl.php method="POST">
            <div class="id_compte">
                <input type="text" id="id_compte" name="id_compte" placeholder="Username" required>
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
include("connect.php");
try 
{
$connexion = getconnect();
if(isset($_POST['save']))
{
    $key = $_POST['key'];
    $id_compte = $_POST['id_compte'];


    $requete = $connexion->prepare("INSERT INTO login (id, username, password, usertype)
    VALUES (?, ?, ?, ?);");
    $requete->execute(array(NULL, $id_compte, $key, 1));
    $connexion->exec($requete);
}
}
catch(PDOException $e)
{
    echo  "Message:" . $e->getMessage();
}

?>



