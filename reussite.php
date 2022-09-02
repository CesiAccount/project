<?php include("header.php") ?>

<!DOCTYPE html>
<html>
<head>
<link rel="manifest" href="/manifest.json">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  position: relative;
  width: 50%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #2B2D42;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>
<title>Réussite insertion </title>
</head>
<body>

<div class="container">
  <img src="https://cdn.discordapp.com/attachments/756442516412432464/1014486169523859506/Bright_Eat_Well_Instagram_Post.png" alt="reussit" class="image">
  <div class="overlay">
    <div class="text">Ajout reussit</div>
  </div>
</div>

</body>
</html>

