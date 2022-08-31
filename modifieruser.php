<?php
include("connect.php");
include("header.php");
session_start();
error_reporting(0);
$verif = getverifuser();
$read = getaccount();
$suppr = suppraccount();
//echo $_SESSION["username"]//

function getaccount()
{
    $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1") or die("Connection failed");
    $sql = "select username, nom, prenom, ville from login where username='" . $_SESSION["username"] . "';";

    $result = mysqli_query($ms, $sql);
    $row = mysqli_fetch_array($result);

    echo "Identifiant | Nom | Prenom | Ville" . "\n";
    echo "<br>" . "<br>";

    for ($i = 0; $i < 4; $i++) {
        echo $row[$i] . " " . "|" . " ";
    }
    echo "<br>" . "<br>";
}

function suppraccount()
{
    if (isset($_POST['suppr'])) {
        $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1") or die("Connection failed");
        $sql = "delete * where username='" . $_SESSION["username"] . "';";

        $result = mysqli_query($ms, $sql);
        $row = mysqli_fetch_array($result);
        header("location:deconnexion.php");
    }
}


?>


<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class=body>
        <form id="formulaire" action=modifieradmin.php method="POST">
            <div class="username">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="<?php $nom ?>">
            </div>
            <div class="prenom">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="<?php $prenom ?>">
            </div>
            <div class="ville">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" placeholder="<?php $ville ?>">
            </div>
            <div class="username">
                <label for="username">Identifiant</label>
                <input type="text" id="username" name="username" placeholder="<?php $username ?>">
            </div>
            <div class="ville">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="vile" placeholder="<?php $ville ?>">
            </div>
            <div class="password1">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password1" name="password1" placeholder="<?php $key ?>">
            </div>
            <div class="password2">
                <label for="password">Vérifier le Mot de Passe</label>
                <input type="password" id="password2" name="password2" placeholder="<?php $key ?>">
            </div>
            <div class="submit">
                <input type="submit" name="modifier" value="Modifier">
            </div>
            <div class="supprimer">
                <input type="submit" name="suppr" value="Supprimer">
            </div>

            <?php
            include 'connect.php';
            error_reporting(0);

            try {
                $connexion = getconnect();
                if (isset($_POST['modifier'])) {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $ville = $_POST['ville'];
                    $username = $_POST['username'];
                    $password1 = $_POST['password1'];
                    $redirect = header("location:deconnexion.php");

                    $requete = $connexion->prepare("UPDATE login SET username = ? , password = ?, nom = '?, prenom = ?, ville = ? )
    VALUES (?, ?, ?, ?, ?);");
                    $requete->execute(array($username, $password1, $nom, $prenom, $ville));
                    $connexion->exec($requete, $redirect);
                    echo ('compte crée');
                    exit();
                    session_destroy();
                    header("location:deconnexion.php");
                }
            } catch (PDOException $e) {
                echo  "Message:" . $e->getMessage();
            }

                if (isset($_POST['supprimer'])) {
                   
                    $requete = $connexion->prepare("DELETE FROM `login`
                    WHERE $username = $_POST[username];");
                    $requete->execute(array($username, $password1, $nom, $prenom, $ville));
                    $connexion->exec($requete, $redirect);
                }
            

            ?>

        </form>

    </div>
</body>

</html>