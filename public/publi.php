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

$req=$conn->executeQuery('SELECT * FROM publications ORDER BY :date_writing', [
  'date_writing' => 'ASC'
]);

/*while ($publication = $req->fetch()) {
  $twig_vars['publi']['date_writing'] = $publication['date_writing'];
  $twig_vars['publi']['titre_publi'] = $publication['titre_publi'];
  $twig_vars['publi']['corps_publi'] = $publication['corps_publi'];
La structure ci-dessous équivaut à celle du dessus, les crochets vides renvoie un tableau vide, mais qui se complète par les données appellées lors du fetch()
  $twig_vars['publications'][] = $publication;
}*/

// la structure ci-dessous équivaut à faire un while () { }, mais elle est plus légère.
$twig_vars['publications'] = $req->fetchAll();

echo $twig->render(
  'publi.html.twig',
  $twig_vars
);
