<?php
$to = 'boufflers.pierre@narramus.fr';
$subject = $_POST['object'];
$message = $_POST['message'];
$headers = 'De ' . $_POST['name'] . '<' . $_POST['mailadress'] . ">\r\n" .
  'Répondre à : ' . $_POST['mailadress'] . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header('refresh:4; url=contacts.php');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nous allons parler de sciences humaines et sociales, de livres et films, afin de partager un savoir qui permet à tous d'en connaître davantage sur des temps et des espaces qui ne sont pas les notres.">
    <meta name="keywords" content="partage, histoire, géographie, savoir, connaissances, littéraire, littérature, critiques, articles, sciences humaines, sciences sociales, sciences, société">
    <title>Narramus | Message envoyé</title>
    <link rel="stylesheet" href="css/narramus.css">
    <link rel="stylesheet" href="css/narramus_min_width-1200px.css" media="screen and (min-width: 1200px)">
    <link rel="shortcut icon" href="/img/icon/iconmonstr-book-20.ico">
  </head>
  <body>
    <?php
    include('include/header.php')
    ?>
    <div class="corps">
      <div class="bloc_texte">
        <h2 class="titre_redir">Votre message a bien été envoyé</h2>
        <h3 class="soustitre_redir">Redirection... Patientez</h3>
      </div>
    </div>
    <?php
    include('include/footer.php')
    ?>
    <script type="text/javascript" src="js/narramus.js"></script>
  </body>
</html>
