<?php
try
{
  include 'include/bddconnexion.php';
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
if($_POST['pass']==$_POST['pass_repeat']) {
  $req=$bdd->query('SELECT pseudo, email FROM members WHERE pseudo = "' .  $_POST['pseudo'] . '" OR email = "' . $_POST['email'] . '"'); // ici on prépare les données en vérifiant de suite si le pseudo dans le table est égal au pseudo dans le formulaire
  // pour simplifier, on compte s'il y a une ligne avec un pseudo existant dans la table
  if ($req->rowCount() >= 1) { // avec un Statement il faut un fetch, ici pas besoin car le rowCount compte le nbr de ligne dans le cas d'un fetch
    $errorAccountExist = 'Vous avez déjà un compte, veuillez vous connecter'; // on créé une variable ici appelée error pour l'appeller plus tard dans l'HTML via un isset
  }
  else if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])) {
    $req=$bdd->prepare('INSERT INTO members (pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
    $req->execute(array(
      'pseudo' => $_POST['pseudo'],
      'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
      'email' => $_POST['email'],
    ));
  }
  else {
    $errorMissInput = 'Un champ du formulaire n\'a pas été rempli';
  }
}
else {
  $errorPasswordDifferent 'Vous avez entré deux mot-de-passe différents, veuillez recommencer';
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
  <link rel="stylesheet" href="css/bootstrap-4.0.0/dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/narramus.css">
  <link rel="stylesheet" href="css/narramus_min_width-1200px.css" media="screen and (min-width: 1200px)">
  <link rel="shortcut icon" href="/img/icon/iconmonstr-book-20.ico">
</head>
<body>
  <?php
  include('header.php')
  ?>
  <?php
  if (isset($errorAccountExist)) {
    echo $errorAccountExist;
  }
  ?>
  <?php
  include('footer.php')
  ?>
  <script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
