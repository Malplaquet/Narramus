<?php
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../../../vendor/autoload.php';

$config = new Configuration();

include __DIR__.'/../../include/config.php';
include __DIR__.'/../../include/session.php';

$conn = DriverManager::getConnection($connectionParams, $config);

// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../../../templates');
$twig = new Twig_Environment($loader);

echo $twig->render(
  'Traversee_enivrante.html.twig',
  $twig_vars
);
