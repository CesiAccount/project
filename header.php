<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <title>Header</title>
    <link rel="stylesheet" href="/Annuaire.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <style> 
.nav.input{
    position: absolute; 
    transform: scale(0);
}
.nav-button{
    position: relative ; 
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    justify-content: center; 
    font-size: 2rem;
    color: #ffffff; 
    padding: 0.5rem; 
}
.nav-icon{
    transition: all 0.35s; 
}
.nav-text{
    font-size: 15px: 
    position: absolute; 
    left: 50%; 
    bottom: 0; 
    color: #2b2d42;
    visibility: hidden;
    opacity: 0; 
    transition: all 0.35s;
    transform: translateX(-50%); 

   
} 
.nav-input:checked ~
    .nav-button {
        color: #57baf5;
        }
.nav-input:checked ~
    .nav-button .nav-text {
        visibility: visible;
        opacity: 1; 
        }
.nav-input:checked ~
    .nav-button .nav-icon {
        tranform: translateY(-9px);
        }

        .topnav {
    background-color: #333;
    overflow: hidden;
    text-align: center;
  }

  .topnav label {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
 
  .topnav label:hover {
    background-color: crimson;
    color: black;
  }
  
  .image { 
  filter:invert(1) ; 
  position: center;
  }       
        
  </style>
 
</head>
<header>
<div class="topnav">
       <div class="image">
       <a href="https://imgbb.com/"><img src="https://i.ibb.co/YQp3Gfn/Noir-Cercle-avec-Ustensiles-Restaurant-Logo.png" alt="Noir-Cercle-avec-Ustensiles-Restaurant-Logo"></a>
</div>
<label for="home">
    <input type='radio' id='home' name='groupe' />
    <span class='nav button'>
        <span class='nav-icon uil uil-estate'>
            <span class='nav-text'>
                Mes listes
</span> 
</span> 
</label> 
<label for="home">
    <input type='radio' id='home' name='groupe' />
    <span class='nav button'>
        <span class='nav-icon uil uil-search'>
            <span class='nav-text'>
                Adminitarteur
</span> 
</span> 
</label> 
<label for="home">
    <input type='radio' id='home' name='groupe' />
    <span class='nav button'>
        <span class='nav-icon uil uil-heart'>
            <span class='nav-text'>
                Les produits
</span> 
</span> 
</label> 
</div>
</header>


<body>
</body> 
<script src="script.js"></script>
</html>