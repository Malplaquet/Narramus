<?php
session_start();
try
{
include '/include/bddconnexion.php';
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$req=$bdd->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
$req->execute(array(
  'pseudo' => $_POST['pseudo']));
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if(!$resultat){
  $errorWrongPassOrPseudo = 'Mot-de-passe ou pseudo incorrect';
  }
  else{
    if($isPasswordCorrect){
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $pseudo;
    }
    else{
      $errorWrongPassOrPseudo;
    }
  }
$req->closeCursor();
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
  <?php
  include('header.php')
  ?>
  <div class="corps">
    <div class="bloc_texte">
      <div class="container">
        <p class="title_connexion">Se connecter</p>
        <div class="row justify-content-around">
          <div class="col-md-4">
            <form class="form_connexion" action="/../index.php" method="post">
              <p class="text_form">Entrez votre pseudo :</p><input class="input_pseudo" type="text" id="pseudo" name="pseudo" placeholder="pseudo" required><br/>
              <p class="text_form">Entrez votre mot-de-passe :</p><input class="input_pass" type="password" id="pass" name="pass" placeholder="mot-de-passe" required><br/>
              <div class="div_button_connexion">
                <button class="button_connexion" type="submit" name="button">Valider</button>
              </div>
            </form>
          </div>
          <div class="col-md-4 redir_create_account">
            <p class="text_form"><span class="bold">Vous n'avez pas de compte?</span><br/><br/>Vous pouvez vous créer un compte personnel gratuit sur Narramus.fr afin d'échanger avec la communauté.</p>
            <a href="/include/inscription.php"><button class="button_create_account" type="button" name="button" href="/include/inscription.php">Se créer un compte</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include('footer.php')
  ?>
  <script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
