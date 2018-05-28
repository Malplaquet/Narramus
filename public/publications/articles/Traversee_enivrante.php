<?php
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../../../../vendor/autoload.php';

$config = new Configuration();

include '/../../../include/bddconnexion_local.php';
include '/../../../include/session.php';

$conn = DriverManager::getConnection($connectionParams, $config);

// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../../../templates');
$twig = new Twig_Environment($loader);

echo $twig->render(
  'Traversee_enivrante.html.twig'
);
