
<?php
session_start();
?>

<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootcamp Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/codebarre.css" rel="stylesheet">

</head>




    <fieldset class="first-section">
        <form id="formulaire" action=projet.php method="POST">
            <legend>Ajouter par code barre</legend>
            <label for="name">username</label>
            <div class="username">
            <select class="" name="username">
                <?php
                $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1") or die("Connection failed");
                $result = mysqli_query($ms, "SELECT username FROM `login` WHERE username='" . $_SESSION["username"] . "' ORDER BY username;");
                while ($row = mysqli_fetch_array($result))
                    echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                ?>
                </select>
            </div>

            <label for="nom_liste">Nom liste</label>
            <div class="prenom">
                <select class="" name="nom_liste">
                <?php
                $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1") or die("Connection failed");
                $result = mysqli_query($ms, "SELECT nom_liste FROM `liste` WHERE username='" . $_SESSION["username"] . "' ORDER BY username;");
                while ($row = mysqli_fetch_array($result))
                    echo "<option name='user' value='" . $row['nom_liste'] . "'>" . $row['nom_liste'] . "</option>";
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="Nom_article">Nom Article</label>
                <div class="nom">
                    <input type="text" id="nom_article" name="nom_article" placeholder="Nom Article" required>
                </div>
            </div>

            <div class="form-group">
                <label for="code_article">Code Article</label>
                <div class="code_article">
                    <input type="text" id="code_article" name="code_article" placeholder="Code Article" required>
                </div>
            </div> 
            <div class="form-group">
                <div class="submit">
                    <input type="submit" id="button" name="save" value="Ajouter par code">
                </div>
            </div>
        </form>
    </fieldset>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/script.js"></script>



<?php
include 'connect.php';
error_reporting(0);

try {
    $connexion = getconnect();
    if (isset($_POST['save'])) {
        $nom = $_POST['username'];
        $noml = $_POST['nom_liste'];
        $noma = $_POST['nom_article'];
        $codea = $_POST['code_article'];
        $redirect2 = header("location:reussite.php");
        $requete = $connexion->prepare("INSERT INTO `article` (`username`, `nom_liste`, `nom_article`, `code_article`)
    VALUES (?,?,?,?);");
        $requete->execute(array($nom, $noml, $noma, $codea));
        $connexion->exec($requete, $redirect2);
        exit();


        session_destroy();
    }
} catch (PDOException $e) {
    echo  "Message:" . $e->getMessage();
}

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
