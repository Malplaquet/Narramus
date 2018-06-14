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

$req=$bdd->prepare('INSERT INTO publication (date_writing, titre_publi, corps_publi, type_publi, img_vignette) VALUES (:id_member, :date_writing, :titre_publi, :corps_publi, :type_publi, :img_vignette)');
$req->execute(array(
  'date_writing' => CURDATE(),
  'titre_publi' => $_POST['titre_publi'],
  'corps_publi' => $_POST['corps_publi'],
  'type_publi' => /* récupérer la variable émise par le selecteur en disant :
                        Article = 0,
                        Billet = 1,
                        Critique litté = 2,
                        Critique ciné/série = 3,*/,
  'img_vignette' => $_POST['img_vignette']
));

$req->closeCursor();
echo $twig->render(
  'writing-post.html.twig'
);
