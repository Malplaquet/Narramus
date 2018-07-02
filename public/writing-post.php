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

$datetime = date('Y-m-d H:i:s');
$uploadDir = __DIR__.'/img/img_articles';
$uploadUrl = '/img/img_articles';

if (isset($_FILES['img_vignette']) && $_FILES['img_vignette']['error'] == 0) {
  if ($_FILES['img_vignette']['size'] <= 1048576) {
    $fileInfos = pathinfo($_FILES['img_vignette']['name']);
    $extensionFileUpload = strtolower(  substr(  strrchr($_FILES['img_vignette']['name'], '.')  ,1)  );
    $extensionAllowed = array('jpg', 'jpeg', 'png');
    if (in_array($extensionFileUpload, $extensionAllowed)) {
      $renameFile = basename($_FILES['img_vignette']['name']);
      $moveFile = move_uploaded_file($_FILES['img_vignette']['tmp_name'], "$uploadDir/$renameFile");
      $count=$conn->insert('publications', [
        'date_writing' => $datetime,
        'titre_publi' => $_POST['titre_publi'],
        'corps_publi' => $_POST['corps_publi'],
        'type_publi' => $_POST['type_publi'],
        'img_vignette' => "$uploadUrl/$renameFile",
        'alt_vignette' => $_POST['alt_vignette']
      ]);
      $twig_vars['publication']['postdone'] = 'Votre article a bien été publié. Vous pouvez dès maintenant en rédiger un nouveau (bouton rédaction). Vous pouvez également revenir à l\'accueil ou vous déconnecter (liens des pages correspondantes)';
    } else {
      $twig_vars['publication']['errorwrongextension'] = 'L\'extension du fichier sélectionné n\'est pas conforme.';
    }
  } else {
    $twig_vars['publication']['errorfileistoobig'] = 'La miniature est trop grosse.';
  }
} else {
  $twig_vars['publication']['errorfilemissing'] = 'La miniature est manquante.';
}

echo $twig->render(
  'writing-post.html.twig',
  $twig_vars
);
