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

// Le LOCATE dans le SUBSTR cherche la balise fermante p dans l'entrée corps_publi et ajoute les trois caractère suivant pour que la sélection s'arrête bien après </p> et non pas dès <
// le AS corps_publi renomme l'entrée pour qu'elle ne soit à appeller dans twig comme SUBSTR(`corps_publi`,1,LOCATE("</p>",`corps_publi`)+3)
$req=$conn->executeQuery('SELECT SUBSTR(`corps_publi`,1,LOCATE("</p>",`corps_publi`)+3) AS corps_publi, `titre_publi`, `img_vignette`, `alt_vignette` FROM publications');

$twig_vars['publications'] = $req->fetchAll();

echo $twig->render(
  'vignette.html.twig',
  $twig_vars
);
