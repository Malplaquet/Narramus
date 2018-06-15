<?php
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../vendor/autoload.php';

$config = new Configuration();

include 'include/config.php';
include 'include/session.php';

$conn = DriverManager::getConnection($connectionParams, $config);
$datetime = date('Y-m-d H:i:s');
// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader);

$count=$conn->insert('publication', [
  'date_writing' => $datetime,
  'titre_publi' => $_POST['titre_publi'],
  'corps_publi' => $_POST['corps_publi'],
  'type_publi' => $_POST['type_publi'],
  'img_vignette' => $_POST['img_vignette'],
  'alt_vignette' => $_POST['alt_vignette']
]);

echo $twig->render(
  'writing-post.html.twig',
  $twig_vars
);
