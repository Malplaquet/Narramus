<?php
session_start();

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../../vendor/autoload.php';

$config = new Configuration();

include 'include/bddconnexion_local.php';

$conn = DriverManager::getConnection($connectionParams, $config);

// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../../templates');
$twig = new Twig_Environment($loader);

$user = array();

if (session_status() === PHP_SESSION_ACTIVE){ // vérifie si la session existe bien, renvoie un booléen, sans ça, le session_destroy ne fait que désactiver le $_SESSION['pseudo'] sans le supprimer complétement
   $user = $_POST;
   $user["active"] = true;
 }
 else {
   $user['pseudo'] = "Mon compte";
   $user["active"] = false;
}
/*echo $twig->render(array(
  'user' => $user
));
*/
