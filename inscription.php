<!DOCTYPE html>
<html lang=fr>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Nous allons parler de sciences humaines et sociales, de livres et films, afin de partager un savoir qui permet à tous d'en connaître davantage sur des temps et des espaces qui ne sont pas les notres.">
  <meta name="keywords" content="partage, histoire, géographie, savoir, connaissances, littéraire, littérature, critiques, articles, sciences humaines, sciences sociales, sciences, société">
  <title>Narramus - articles scientifiques et critiques : Le partage de connaissances</title>
  <link rel="stylesheet" href="css/bootstrap-4.0.0/dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/narramus.css">
  <link rel="stylesheet" href="css/narramus_min_width-1200px.css" media="screen and (min-width: 1200px)">
  <link rel="shortcut icon" href="/img/icon/iconmonstr-book-20.ico">
</head>
<body>
  <?php
  include('header.php')
  ?>
  <form class="form_inscription" action="inscription_done.php" method="post">
    <input type="text" id='pseudo' name="pseudo" placeholder="Votre pseudo" required>
    <input type="password" id='pass' name="pass" placeholder="Votre mot-de-passe" required>
    <input type="password" id='pass_repeat' name="pass_repeat" placeholder="Confirmez votre mot-de-passe" required>
    <input type="text" id='email' name="email" placeholder="Votre adresse email" required>
    <div class="g-recaptcha" data-sitekey="6LfaWFkUAAAAALn3XwlrPtWESU-KSSn7gbac98Ah"></div>
    <button type="submit" name="button_incription">Confirmer votre inscription</button>
  </form>
<?php
include('footer.php')
?>
<script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
