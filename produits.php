<?php include 'header.php'; 
include 'connect.php';
session_start();
$verif = getverif();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .section {
        margin-left: 40%;
        margin-right: 40%;
        margin-top: 15px;
        background-color: #EDF2F4;
        color: #2B2D42;
        margin-bottom: 20px; 
    }
    </style>
    <script src="main.js" defer></script>
</head>
<body>
    <fieldset class="section">
    <legend>Cherchez un produit avec son code barre :</legend>
    <input type="text" id="champ">
    <button id="btn" class="bi bi-search" > </button>
    <div id="outputcode"></div>
    <div id="outputname"></div>
    <div id="outputcategorie"></div>
    <div id="outputimage"></div>
    <br>
    <form>
    <input type="text" id="search" required>
    <button type="submit" id="btnsearch"><i class="bi bi-search"></i>GO</button>
    <div id="output"></div>
    </form>
    </fieldset>
</body>
</html>

