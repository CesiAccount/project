<?php
// On passe à la partie PHP avec la connexion à la base de donnée, il faut également rajouter le
// port de communication afin d'éviter d'éventuelles érreur dans les versions superieures de XAMPP
// ________________________________________________________________________________________________
function getconnect()
    {
        
        try {
            $user = "root";
            $password = "";
            $data = new PDO('mysql:host=127.0.0.1:3307;dbname=erin1', $user, $password);
            $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connect";
            return $data;
            

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
?>

<?php
// Une vérification est nécessaire afin d'empêcher un user d'accéder aux pages relatives aux admins
// en tapant les urls à la main dans le navigateur
// ________________________________________________________________________________________________
function getverifuser()
{
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $sql="select * from login where username='".$_SESSION["username"]."';" ;

    $result=mysqli_query($ms,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="1" && $row["usertype"]!= "2")
            {}
            else
            {
                echo "Erreur";
                header("location:deconnexion.php");
            }
}

function getverifadmin()
{
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $sql="select * from login where username='".$_SESSION["username"]."';" ;

    $result=mysqli_query($ms,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="2" && $row["usertype"]!= "1")
            {}
            else
            {
                echo "Erreur";
                header("location:deconnexion.php");
            }
}
function getverif()
{
    $ms = mysqli_connect("127.0.0.1:3307","root","","erin1") or die("Connection failed");
    $sql="select * from login where username='".$_SESSION["username"]."';";
    $result=mysqli_query($ms,$sql);
    $row=mysqli_fetch_array($result);
    if($row["usertype"]=="1")
            {}
    elseif($row["usertype"]=="2")
            {}
    else
            {
                echo "Erreur";
                header("location:deconnexion.php");
            }
}
?>


