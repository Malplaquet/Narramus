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

$req=$conn->executeQuery('SELECT * FROM publication');

$req->rowCount();

while ($publication = $req->fetch()) {
$twig_vars['publi']['date_writing'] = $publication['date_writing'];
$twig_vars['publi']['titre_publi'] = $publication['titre_publi'];
$twig_vars['publi']['corps_publi'] = $publication['corps_publi'];
}

echo $twig->render(
  'article.html.twig',
  $twig_vars
);
