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

$datetime = date('Y-m-d H:i:s');

if($_POST['pass']==$_POST['pass_repeat']) {
  $req=$conn->executeQuery('SELECT pseudo, email FROM members WHERE pseudo = "' .  $_POST['pseudo'] . '" OR email = "' . $_POST['email'] . '"');
  // $req=$bdd->query('SELECT pseudo, email FROM members WHERE pseudo = "' .  $_POST['pseudo'] . '" OR email = "' . $_POST['email'] . '"'); // ici on prépare les données en vérifiant de suite si le pseudo dans le table est égal au pseudo dans le formulaire
  // pour simplifier, on compte s'il y a une ligne avec un pseudo existant dans la table
  if ($req->rowCount() >= 1) { // avec un Statement il faut un fetch, ici pas besoin car le rowCount compte le nbr de ligne dans le cas d'un fetch
    $errorAccountExist = 'Vous avez déjà un compte, veuillez vous connecter'; // on créé une variable ici appelée error pour l'appeller plus tard dans l'HTML via un isset
  }
  else if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])) {
    $req=$conn->insert('members', [
      'pseudo' => $_POST['pseudo'],
      'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
      'email' => $_POST['email'],
      'date_inscription' => $datetime,
    ]);
  }
  else {
    $errorMissInput = 'Un champ du formulaire n\'a pas été rempli';
  }
}
else {
  $errorPasswordDifferent = 'Vous avez entré deux mot de passe différents, veuillez recommencer';
}
echo $twig->render(
  'inscription.html.twig',
  array(
    'errorAccountExist' => $errorAccountExist,
    'errorMissInput' => $errorMissInput,
    'errorPasswordDifferent' => $errorPasswordDifferent
  )
);
