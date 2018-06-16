<?php
session_start();
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../../vendor/autoload.php';

$config = new Configuration();

include __DIR__.'/config.php';

$conn = DriverManager::getConnection($connectionParams, $config);

// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../../templates');
$twig = new Twig_Environment($loader);

if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["pseudo"])) { // vérifie si la session existe bien, renvoie un booléen, sans ça, le session_destroy ne fait que désactiver le $_SESSION['pseudo'] sans le supprimer complétement
   $twig_vars["user"]['pseudo'] = $_SESSION['pseudo'];
   $twig_vars["user"]["active"] = true;
 }
 else {
   $twig_vars["user"]['pseudo'] = " Mon compte";
   $twig_vars["user"]["active"] = false;
}
