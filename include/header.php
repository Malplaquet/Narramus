<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
   echo $_SESSION['pseudo'];
 }
 ?>
<!DOCTYPE html>
<html lang=fr>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Nous allons parler de sciences humaines et sociales, de livres et films, afin de partager un savoir qui permet à tous d'en connaître davantage sur des temps et des espaces qui ne sont pas les notres.">
  <meta name="keywords" content="partage, histoire, géographie, savoir, connaissances, littéraire, littérature, critiques, articles, sciences humaines, sciences sociales, sciences, société">
  <title>Narramus - articles scientifiques et critiques : Le partage de connaissances</title>
  <link rel="stylesheet" href="../../css/bootstrap-4.0.0/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../../css/narramus.css">
  <link rel="stylesheet" href="../../css/narramus_min_width-1200px.css" media="screen and (min-width: 1200px)">
  <link rel="shortcut icon" href="../../img/icon/iconmonstr-book-20.ico">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <div class="header">
    <a class="link" href="../../index.php">
      <div class="banner">
        <h1>Narramus</h1>
        <p class="soustitre">Le partage de connaissances</p>
      </div>
    </a>
  </div>
  <div class="nav_barre" id="myHeader">
    <div>
      <a class="link_nav_barre" href="../../index.php">Narramus</a>
    </div>
    <div>
      <a class="link_nav_barre" href="../../article.php">Article</a>
      <a class="link_nav_barre" href="../../billets.php">Billet d'humeur</a>
      <a class="link_nav_barre" href="../../critique_litt.php">Critique littéraire</a>
      <a class="link_nav_barre" href="../../critique_film.php">Critique ciné/série</a>
    </div>
    <div>
      <a class="link_nav_barre link_account" href="/include/connexion.php"><img class="icon_account" src="../../img/icon/icon_account-white.svg" alt=""><?php $echoAccount ?></a>
    </div>
  </div>
</body>
</html>
