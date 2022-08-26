<?php
if(isset($_GET['id']))
{
    $host ='127.0.0.1';
    $user ='root';
    $pass='';
    $db='erin1';
    $port="3307";
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
    $pdo = new \PDO($dsn, $user, $pass);
    include_once 'connect.php';
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $id = htmlentities($pdo->quote($_GET['id']));
    $select = $pdo->query("select * from login");
    $delete = $ms->query("DELETE FROM login WHERE login.id = $id;");
    if ($delete)
    {
        echo "Le compte à été Supprimer";
    
    }
}
?>