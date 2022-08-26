<?php include 'header.php'; 
include 'connect.php';

session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
function getmyaccount()
{   
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $select = $ms->query("select * from login where username='".$_SESSION["username"]."';" );
    while($row = $select->fetch_array())
    {
        echo "Id : ".$row[0]." User : ".$row[1]." Pass : ".$row[2]." Type : ".$row[3]." Nom : ".$row[4]." Prenom : ".$row[5]." Ville : ".$row[6]."<br>";
    }
}
?>