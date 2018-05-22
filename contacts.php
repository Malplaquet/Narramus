<!DOCTYPE html>
<html lang=fr>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nous allons parler de sciences humaines et sociales, de livres et films, afin de partager un savoir qui permet à tous d'en connaître davantage sur des temps et des espaces qui ne sont pas les notres.">
    <meta name="keywords" content="partage, histoire, géographie, savoir, connaissances, littéraire, littérature, critiques, articles, sciences humaines, sciences sociales, sciences, société">
    <title>Narramus | Nous contacter : Le partage de connaissances</title>
    <link rel="stylesheet" href="css/narramus.css">
    <link rel="stylesheet" href="css/narramus_min_widht-768px.css" media="screen and (min-width: 768px)">
    <link rel="stylesheet" href="css/narramus_min_width-992px.css" media="screen and (min-width: 992px)">
    <link rel="stylesheet" href="css/narramus_min_width-1200px.css" media="screen and (min-width: 1200px)">
    <link rel="shortcut icon" href="/img/icon/iconmonstr-book-20.ico">
  </head>
  <body>
    <?php
    include('include/header.php')
    ?>
    <div class="corps">
      <div class="bloc_texte">
        <form class="formulaire" action="contact_post.php" method="post">
          <div>
            <h1 class="titre_contact">Contactez-nous !</h1>
            <img class="couv_contact" src="img/plume.jpg" alt="un porte plume posé sur un cahier aux pages blanches sur lesquelles sont déposées quelques gouttes d'encre noire">
            <p class="credit_photo"><span class="credit">Crédit :</span> Tekke, &laquo; I wrote you &raquo;, on <a class="link" href="https://www.flickr.com/photos/tekkebln/6904577257/">Flickr</a>; <span class="credit">Licence :</span> CC BY-ND 2.0</p>
          </div>
          <div class="presentation formulaire">
            <h2 class="soustitre_contact">Vous pouvez nous contacter en remplissant ce formulaire.<br/>Vos contributeurs vous répondrons dans les délais les plus brefs.</h2>
            <input class="champ" type="email" name="mailadress" placeholder="Votre adresse mail" required><br/>
            <input class="champ" type="text" name="name" placeholder="Vos noms et prénoms" required><br/>
            <input class="champ" type="text" name="object" placeholder="Objet du message" required><br/>
            <textarea id="message" type="text" name="message" placeholder="Votre message" required></textarea><br/>
            <button class="button_contact" type="submit" name="button">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
    <?php
    include('include/footer.php')
    ?>
    <script type="text/javascript" src="js/narramus.js"></script>
  </body>
</html>
