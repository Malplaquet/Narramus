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

if (!$isPasswordCorrect && isset($_POST["pseudo"]) && isset($_POST["pass"])) {
  $twig_vars['error']['errorWrongPassOrPseudo'] = 'Mot de passe ou pseudo incorrect';
} elseif ($isPasswordCorrect && isset($_POST["pseudo"]) && isset($_POST["pass"])) {
  $_SESSION['id'] = $resultat['id'];
  $_SESSION['pseudo'] = $resultat['pseudo'];
  $twig_vars['status']['connexion_ok'] = "<p class=\"txt_deconnexion\">Vous êtes connecté(e)</p>";
}

if (isset($_SESSION['pseudo'])) {
  $twig_vars['status']['display_button_deconnexion'] = "<p class=\"title_connexion\">Se déconnecter</p><a href=\"deconnexion.php\"><button class=\"button_deconnexion\" type=\"submit\" name=\"button\">Deconnexion</button></a>";
  $twig_vars['status']['already_connected'] = "<p class=\"txt_deconnexion\">Vous êtes déjà connecté. Veuillez vous déconnecter pour vous connecter à nouveau</p>";
}


$req->closeCursor();

echo $twig->render(
  'connexion.html.twig',
  $twig_vars
);
