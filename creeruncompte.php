<?php include ("header.php") ?>
<?php
session_start();
?>
<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
const API_URL = 'https://geo.api.gouv.fr/';
if(!empty($_POST['zipcode']) && !empty($_POST['city']))
{
	$zipcode = strip_tags($_POST['zipcode']);
	$city = strip_tags($_POST['city']);

	$client = new GuzzleHttp\Client(['base_uri' => API_URL]);

	$response = $client->request('GET', 'communes?codePostal='.$zipcode.'&fields=nom&format=json');
	$response = json_decode($response->getBody()->getContents());

	$cities = [];
}

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
<style>
    * {
  font-family: 'Montserrat', sans-serif;
}

body {
  height: 80vh;
  margin-top: 0rem;
  background-image: url("https://previews.123rf.com/images/romastudio/romastudio1411/romastudio141100015/33709981-fond-de-la-nourriture-saine-studio-photo-de-diff%C3%A9rents-fruits-et-l%C3%A9gumes-sur-fond-blanc.jpg");
  background-repeat: no-repeat;
  background-position: center;

}

.form {
  background-color: #fff;
  border-radius: 5px;
  padding: 15px 25px;
 
  width: 80%;
  margin: 0 auto;
}

.checkbox {
  width: 20px !important;
}

.first-section input {
  width: 70%;
  height: 25px;
  margin-left: 5px;
}

.second-section input{
  width: 80%;
  height: 25px;
  margin-left: 5px;
}

.form h1, p {
  text-align: center;
}
button {
  border: none;
  color: white;
  background: #fff;
  padding: 8px 25px;
  border-radius: 5px;
  display: block;
  margin: 20px auto 10px auto;
  width: 120px;
}
.first-section {
  margin-right: 180px;
  float: right;
  margin-top: 15px;
  margin-left: 170px;
  background-color: #EDF2F4;
  color: #2B2D42;
  margin-bottom: 20px; 
}
.second-section {
  margin-right: 160px;
  position: relative;
  float: right;
  margin-top: 15px;
  margin-left: 170px;
  background-color: #EDF2F4;
  color: #2B2D42;
  margin-bottom: 20px; 
}

.proficiency {
  display: flex;
  align-items: center;
}

.terms {
  margin-top: 15px;
  display: flex;
  align-items: center;
}
.submit{
  float: right;
  width: 40%;
  margin-top: 30px;
  margin-right: 60px;
  color: #2B2D42;
}
.connection{
  
  margin-top: 50px;
  margin-left: 170px;
  color: #2B2D42; 
  background-color: #EDF2F4;
  position:center;
}

.ville{
  width: 80%;
  margin-right: 30px;
  margin-left: 5px;
}
</style>    
</head>


<body>

<fieldset class="first-section">
      <form id="formulaire" action=creeruncompte.php method="POST">
         <legend>Détail du compte</legend>
       <label for="name">Pseudo</label>
       <div class="username">
                <input type="text" id="username" name="username" autocomplete="on" placeholder="Identifiant" required>
            </div>
            <label for="mdp">Mot de passe</label>
        <div class="key">
                <input type="password" id="key" name="key" placeholder="Mot de passe" required>
            </div>
</fieldset>

<fieldset class="second-section">
      <legend>Personal Information</legend>
      <label for="name">Nom</label>
      <div class="nom">
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <label for="prenom">Prénom</label>
       <div class="prenom">
                <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
            </div>
            <div class="form-group">
				    <label for="zipcode">Code Postal</label>
				    <input type="text" name="zipcode" class="postal" placeholder="Code postal" id="zipcode" required>
				    <div style="display: none; color: #f55;" id="error-message"></div>
				  </div>

				  <div class="form-group">
				    <label for="city">Ville</label>
				    <select class="ville" name="ville" id="city" required>
				    </select>
				  </div>
          <div class="submit">
                <input type="submit" id="button" name="save" value="S'inscrire">
            </div>
            <br>
        <div class="connection">
        <a href="login.php"> Se connecter</a>
</div>
</fieldset>
</form>


		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="script.js"></script>
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
    session_destroy();
    header("location:deconnexion.php");
}
}
catch(PDOException $e)
{
    echo  "Message:" . $e->getMessage();
}



?>




