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

$req=$conn->executeQuery('SELECT * FROM publication ORDER BY :date_writing', [
  'date_writing' => 'asc'
]);