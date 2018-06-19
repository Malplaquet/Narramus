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
if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['mail']) && isset($_POST['process'])) {
  if ($_POST['pass']==$_POST['pass_repeat']) {
    if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['mail'])) {
      $req=$conn->executeQuery('SELECT pseudo, mail FROM members WHERE pseudo = "' .  $_POST['pseudo'] . '" OR mail = "' . $_POST['mail'] . '"');
      // pour simplifier, on compte s'il y a une ligne avec un pseudo existant dans la table
      if ($req->rowCount() >= 1) {
        $twig_vars['error']['errorAccountExist'] = '<div class="col-12 div_error_create_account">Vous avez déjà un compte, veuillez vous connecter.</div>';
      }
      else {
        $req=$conn->executeUpdate('INSERT INTO members (pseudo, pass, mail, date_inscription) VALUES (:pseudo, :pass, :mail, :date_inscription)', [
          'pseudo' => $_POST['pseudo'],
          'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
          'mail' => $_POST['mail'],
          'date_inscription' => $datetime
        ]);
        $twig_vars['user']['account_created'] = '<div class="col-12 div_account_created">Votre compte sur Narramus a bien été créé. Un mail de confirmation avec vos identifiants vous a été envoyé.</div>';
        $to = $_POST['mail'];
        $subject = "Confirmation d'inscription sur Narramus.fr";
        $message = "Vous venez de vous créer un compte utilisateur personnel sur Narramus.fr.
        Vous pouvez dès à present vous connecter sur le site afin de pouvoir échanger avec la communauté de nos lecteurs.
        https://www.narramus.fr/connexion.php
        Vous trouverez ci-dessous les données que vous avez saisi dans le formulaire d'inscription :
          Pseudo : ".$_POST['pseudo']."
          Mot de Pass : ".$_POST['pass']."
          Ces données sont strictement personnelles, veuillez ne pas les communiquer.
          Veuillez conserver ce mail au cas où vous oublieriez ces identifiants.

          À très bientôt sur Narramus.fr
          Votre équipe de rédacteurs administrateurs.";
          $headers = 'De : Narramus.fr';
          'X-Mailer: PHP/' . phpversion();
          mail($to, $subject, $message, $headers);
        }
      } else {
        $twig_vars['error']['InvalidEmail'] = '<span class="error">Format de l\'adresse mail incorrect.</span>';
      }
    } else {
      $twig_vars['error']['errorPasswordDifferent'] = '<div class="col-12 div_error_create_account">Vous avez entré deux mot de passe différents, veuillez recommencer.</div>';
    }
  } elseif (isset($_POST['process'])) {
    $twig_vars['error']['errorMissInput'] = '<div class="col-12 div_error_create_account">Un champ du formulaire n\'a pas été rempli.</div>';
  }

  echo $twig->render(
    'inscription.html.twig',
    $twig_vars
  );
