<?php
session_start();
include('include/header.php');
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
include('include/footer.php');
?>
<script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
