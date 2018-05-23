<?php
session_start();

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

include('include/header.php');
?>
<?php
if (isset($errorAccountExist)) {
  echo $errorAccountExist;
}
?>
<?php
include('include/footer.php');
?>
<script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
