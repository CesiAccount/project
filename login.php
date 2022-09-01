<?php
session_start();
?>

<!DOCTYPE <html>
<html lang='en'>

<head>
    <?php include("header.php") ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   
    <style>
 @import url("css/login.css");
    </style>
</head>


<body>
    <div class="f">
        <fieldset class="first-section">
            <form action="login.php" method="POST">
                <legend>Veuillez vous connecter afin d'accéder au site web</legend>

                <div class="login">
                    <label> Identifiant</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="Identifiant" required>

                    <label>Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                    <div class="submit">
                    <input type="submit" name="save" id="save" value="Connexion">
                </div>

                </div>


            
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        <div class="colors">
                            <a href="creeruncompte.php"> Pas inscrit : créer un compte </a>
                        </div>
                    </div>
                </div>
        </fieldset>
        </form>
    </div>
</body>
</html>


<?php
// Le code suivant est l'identification du compte, est il un admin ou un simple utilisateur ?'
// L'on intéroge donc la variable indiquant cela et l'on signale la non connection en cas d'érreur'
// En cas de succès l'on redirige alors vers les pages correspondantes à chaque compte'
// ________________________________________________________________________________________________'
include("connect.php");
$connect = getconnect();
try {
    $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1") or die("Connection failed");
    if (isset($_POST['save'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $mdp = $_POST["mdp"];

            $sql = "select id, username, usertype from login where username='" . $id . "' AND password='" . $mdp . "' ";

            $result = mysqli_query($ms, $sql);
            $row = mysqli_fetch_array($result);

            if ($row["usertype"] == "1" && $row["usertype"] != "2") {
                $_SESSION["username"] = $id;
                header("location:modifieruser.php");
            } elseif ($row["usertype"] == "2" && $row["usertype"] != "1") {
                $_SESSION["username"] = $id;
                header("location:adminhome.php");
            } else {
                echo "Identifiant ou Mot de passe incorrect";
            }
        }
    }
} catch (PDOException $e) {
}
?>

<?php include("footerlog.php") ?>