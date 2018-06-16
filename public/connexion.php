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


$req=$conn->executeQuery('SELECT * FROM members WHERE pseudo = :pseudo', [
  'pseudo' => $_POST['pseudo'],
]);
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

/*if (!$resultat) {
  $twig_vars['error']['errorWrongPassOrPseudo'] = 'Mot de passe ou pseudo incorrect';
}
else {*/
  if ($isPasswordCorrect) {
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $resultat['pseudo'];
    $twig_vars['status']['connexion_ok'] = 'Vous êtes connecté(e)';
  }
  else {
    $_SESSION["id"] = 0;
    $twig_vars['error']['errorWrongPassOrPseudo'] = 'Mot de passe ou pseudo incorrect';
  }
//}
$req->closeCursor();

echo $twig->render(
  'connexion.html.twig',
  $twig_vars
);
