<?php include 'header.php'; 
include 'connect.php';
session_start();
$verif = getverif();
include 'footer.php';?>

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
        .mycount {
            float: center;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
$afficher = getuser();
function getuser()
{   
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from login where username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        ?>
        <fieldset class="section">
        <div class="mycount">
        <?php
        echo "Id : ".$row[0]."<br> User : ".$row[1]."<br> Pass : ".$row[2]."<br> Type : ".$row[3]."<br> Nom : ".$row[4]."<br> Prenom : ".$row[5]."<br> Ville : ".$row[6]."<br>";
        ?>
        </div>
        </fieldset>
        <?php
    }
}
?>