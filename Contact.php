<head>
<meta charset="utf-8">
        <title>Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
        <script src="https://kit.fontawesome.com/af1ca8f634.js" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body {
        padding-top:0px;
        padding-bottom:0px;
        background-image: url("https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-food-western-food-simple-poster-background-image_25130.jpg");
    }
</style>    
<link rel="manifest" href="/manifest.json">
</head>
<html>
<body>
    <?php include("header.php") ?>
<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"ERINCT"<erin.supiot@viacesi.fr>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
				</div>
			</body>
		</html>
		';

		mail("email-destinataire@example.org", "CONTACT ", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<h2>Formulaire de contact !</h2>
		<form method="POST" action="">

<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <div class="col-md-9"> 
           <p> Saisir votre nom </p>
            <input type="text" id="name" class="form-control" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" require />
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
            
              <div class="col-md-9">
              <p> Saisir votre mail </p>
              <input id="email" type="email" name="mail"class="form-control" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" require />
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
           
              <div class="col-md-9"> 
                <p> Saisir votre message </p>
              <textarea class="form-control" id="message" name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?> </textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit"value="Envoyer !" name="mailform" class="btn btn-primary btn-lg">Envoyer</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
	
			<br /><br />
		
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>

	</body>
   
</html>
 <?php include("footer.php")?>