<?php
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__.'/../vendor/autoload.php';

$config = new Configuration();

include 'include/bddconnexion.php';
include 'include/session.php';

$conn = DriverManager::getConnection($connectionParams, $config);

// récupère deux templates :
$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader);

$to = 'boufflers.pierre@narramus.fr';
$subject = $_POST['object'];
$message = $_POST['message'];
$headers = 'De ' . $_POST['name'] . '<' . $_POST['mailadress'] . ">\r\n" .
'Répondre à : ' . $_POST['mailadress'] . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header('refresh:4; url=contact.php');

echo $twig->render(
  'contact_post.html.twig'
);
