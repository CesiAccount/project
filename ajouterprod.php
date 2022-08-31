<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
    <script src="https://kit.fontawesome.com/af1ca8f634.js" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>


<body>



    <form method="POST" action="">
        <div class='container'>
            <button for="name">Ajouter dans la liste :

            </button>

  <?php
                $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1") or die("Connection failed");
                //Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                ?>

                <select class="form-control" name="nom_liste'">
                    <?php
                    $result = mysqli_query($ms, "SELECT nom_liste FROM liste ");

                    while ($row = mysqli_fetch_array($result))
                        echo "<option name='nom_liste' value='" . $row['nom_liste'] . "'>" . $row['nom_liste'] . "</option>";
                    ?>
                </select>

    </form>
<?php
    $bdd = getconnect();
if(isset($_POST['save']))
{
    $new = $bdd->prepare("INSERT INTO article(username, nom_liste, nom_article, code_article, ) VALUES(
        ?, ?, ?, ?);");
    $new->execute(array($_SESSION['username'],$_POST['nom_liste'], ));
    header("location:reussite.php");
} 
?>
</body>