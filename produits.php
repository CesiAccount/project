<?php include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
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

</head>
<body>
    
    <fieldset class="section">
    <legend>Cherchez un produit avec son code barre :</legend>
    <input type="text" id="champ">
    <button id="btn" name='btncodeuh'>GO</button>
    <div id="outputcode"></div>
    <div id="outputname"></div>
    <div id="outputcategorie"></div>
    <div id="outputimage"></div>
    <br>
    <form>
    <input type="text" id="search" required>
    <button type="submit" id="btnsearch"></i>GO</button>
    <div id="output"></div>
    </form>
    </fieldset>
    <span id="js_one"></span>
    <span id="js_result"></span>

    <span id="js_two"></span>



<?php /* Ajouter un produit dans la wishlist par son code */ ?> 


<fieldset class="section">
    <form id="formulaire" action=produits.php method="POST">
      <legend>Ajouter un produit par code</legend>
      <label for="name">Code du produit</label>
      <div class="username">
        <input type="text" id="username" name="username" autocomplete="on" placeholder="User" required>
      </div>
      <div class="code">
        <input type="text" id="code_article" name="code_article" autocomplete="on" placeholder="Code produit" required>
      </div>
      <label for="name">Nom du produit</label>
      <div class="code">
        <input type="text" id="nom_article" name="nom_article" autocomplete="on" placeholder="Nom produit" required>
      </div>
     <div class='liste' > 
      <label for="mdp">Liste du produit</label>
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
      </div>

      <button type="submit" id="btncode"></i>Ajouter à la liste </button>
      
<?php
include 'connect.php';
error_reporting(0);

try {
  $connexion = getconnect();
  if (isset($_POST['btncode'])) {
    $username = $_POST[$_SESSION["username"]];
    $nom_liste = $_POST['nom_liste'];
    $nom_article = $POST['nom_article']; 
    $code = $_POST['code_article'];
    $requete = $connexion->prepare("INSERT INTO article (username, nom_liste, nom_article, code_article)  
    VALUES (?, ?, ?, ?);");
    $requete->execute(array($username, $nom_liste, $nom_article, $code));
    $connexion->exec($requete, $redirect);
      echo ('Produit ajouté');
    exit();
    }
} catch (PDOException $e) {
  echo  "Message:" . $e->getMessage();
}
?>
  </fieldset>

  </form>


  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="vendor/script.js"></script>
  
  <script src="script.js" defer></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready( function()
    {
        get_users(1);
        window.scrollTo(0, 0)
    })
</script>
</body>

</html>







<?php /* 
$ok = getarticles();
function getarticles()
{   
    $namelist = $_POST['nomlist'];
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("SELECT id FROM liste WHERE name ='".$namelist."' AND username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo " List : ".$row[2]."<br>";
    }
}
    <form method="POST" action="">
    <div class='container'>
        <h2> Choisir la Liste </h2>
        <label for="user">Choisir la liste souhaitée:</label>
        <select class="form-control" name="nomlist" id="nomlist">
            <?php
                $result = mysqli_query($ms, "SELECT name FROM `liste` WHERE username='".$_SESSION["username"]."' ORDER BY username");
                while ($row = mysqli_fetch_array($result))
                    echo "<option name='' value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            ?>
        </select>
        <h6>Connectez-vous/Inscrivez-vous pour enregistrer vos listes</h6>
    </form>

*/
?>

