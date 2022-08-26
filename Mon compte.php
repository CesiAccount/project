<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mon compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>
    <?php include("header.php") ?>


    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Blog..">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                        <br><br><br><br><br><br><br><br><br><br><br><br>Carrouselle

                    </span>
                </div>
            </div>

            <div class="col-sm-9">
                <span class="badge">1</span>
                Mes infos

                <form method='POST' action="">
                    <label>Rentrez le pseudo</label>
                    <input type='text' name='username' />
                    <input type="submit" value='selectionner' />

                    <?php

                    if (isset($_GET['username'])) {
                        $bdd = new PDO("mysql:host=127.0.0.1:3307;dbname=erin1", "root", "");
                        //Check connection
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $show = $bdd->prepare("SELECT `id`, `username`, `password`, `usertype`, `nom`, `prenom`, `ville` FROM `login` WHERE `usernam`='?';");
                        $show->execute(array(
                            $_POST['username']
                        ));

                        while ($resultat = $show->fetch()) {
                            echo $resultat['username'];
                            echo $resultat['nom'];
                            echo $resultat['prenom'];
                            echo $resultat['ville'];
                        }
                    }
                    ?>
                </form> <br>
                <span class="badge">2</span>
                Mes listes
                <?php
 $ms = new PDO("mysql:host=127.0.0.1:3307;dbname=erin1 root, , ");
 $liste = $ms= query("SELECT `nom_liste` FROM `liste`"); ?>
 <table> <tr> 
    <?php 
 while($aliste = $liste->fetch_all())
     { 
        ?>
 <td><?php echo $aliste['nom_liste'];?> </td>
</tr>

 <?php } ?> 
 </table>
               
                <br>



                <span class="badge">3</span> Supprimer mon compte
                <div class="form-row">
                    <div class="col">

                        <?php
                        #Delete
                        $ms = mysqli_connect("127.0.0.1:3307", "root", "", "erin1");
                        //Check connection
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        ?>
                        <form method="POST" action="">
                            <div class='container'>
                                <h2> Choisir l'utilisateur à supprimer </h2>
                                <label for="user">Choisir l'utilisateur souhaitee:</label>
                                <select class="btn btn-default dropdown-toggle" name="user">
                                    <?php
                                    $result = mysqli_query($ms, "SELECT username FROM `login` ORDER BY username");

                                    while ($row = mysqli_fetch_array($result))
                                        echo "<option name='user' value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                    ?>
                                </select>
                                <input type=submit value=Supprimer>
                        </form>

                        <?php
                        $del = $ms->prepare(" DELETE FROM `login` WHERE username=?;");
                        $del->execute(array($_POST['user']));
                        ?>


                        <br><br>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2 text-center">
                        bleubleu
                    </div>
                    <div class="col-sm-10">
                        blublu
                    </div>
                    <div class="col-sm-2 text-center">
                        blabla
                    </div>
                    <div class="col-sm-10">
                        blabla
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    

    <?php include("footer.php") ?>
</body>

</html>