<?php
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../vendor/autoload.php';

$config = new Configuration();

include 'include/config.php';
include 'include/session.php';

$conn = DriverManager::getConnection($connectionParams, $config);

// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader);

$req=$conn->prepare('SELECT id, pseudo, pass FROM members WHERE pseudo = :pseudo');
$req->execute(array(
  'pseudo' => $_POST['pseudo']));
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

$errorWrongPassOrPseudo = array();
if(!$resultat){
  $errorWrongPassOrPseudo = 'Mot de passe ou pseudo incorrect';
  }
  else{
    if($isPasswordCorrect){
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $resultat['pseudo'];
    }
    else{
      $errorWrongPassOrPseudo;
    }
  }
$req->closeCursor();

echo $twig->render(
  'connexion.html.twig'
);
