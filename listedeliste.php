<?php include("header.php") ?>

<!doctype html>
<html lang="fr">
<html>

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="/Annuaire.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>
</head>
<body>

<form method='POST' action=''>
<input type='text' name='username' placeholder='saisir votre pseudo' >
<input type='text' name='nom_liste' placeholder='saisir le nom de la liste' >
<input type="submit" value='créer une nouvelle liste' />

<?php
if(isset($_POST['username']) AND isset($_POST['nom_liste'])){
   echo $_POST['username'];
echo $_POST['nom_liste']; 

$ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1");
$requete = $ms->prepare("INSERT INTO `liste` (`nom_liste`, `username`, `etat_liste`) VALUES ('?', '?', '1'))");
$requete->execute(array($_POST['username']), $_POST['nom_liste']);
}
?> 
</form>
</body>
</html>