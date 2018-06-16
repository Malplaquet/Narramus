<?php

if (session_status() === PHP_SESSION_ACTIVE){
  session_destroy();
  $twig_vars['user']['deconnexion'] = "Vous avez été correctement déconnecté(e) de Narramus.fr";
} else {
  $twig_vars['user']['nothingToDeco'] = nl2br("Vous ne pouvez pas vous déconnecter puisque vous n'avez pas de compte connecté.\nConnectez-vous où inscrivez-vous ci-dessous.");
}

if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["pseudo"])) { // vérifie si la session existe bien, renvoie un booléen, sans ça, le session_destroy ne fait que désactiver le $_SESSION['pseudo'] sans le supprimer complétement
   $twig_vars["user"]['pseudo'] = $_SESSION['pseudo'];
   $twig_vars["user"]["active"] = true;
 }
 else {
   $twig_vars["user"]['pseudo'] = " Mon compte";
   $twig_vars["user"]["active"] = false;
}
