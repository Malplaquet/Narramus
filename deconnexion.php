<?php
session_start();
session_destroy();
include('include/header.php');
?>
<div class="corps">
  <div class="bloc_texte">
    <div class="container">
      <p class="txt-deconnexion">Vous avez été correctement déconnecté(e) de Narramus.fr</p>
      <p class="title_connexion">Se connecter</p>
      <div class="row justify-content-around">
        <div class="col-md-4">
          <form class="form_connexion" action="connexion.php" method="post">
            <p class="text_form">Entrez votre pseudo :</p><input class="input_pseudo" type="text" id="pseudo" name="pseudo" placeholder="pseudo" required><br/>
            <p class="text_form">Entrez votre mot de passe :</p><input class="input_pass" type="password" id="pass" name="pass" placeholder="mot de passe" required><br/>
            <div class="div_button_connexion">
              <button class="button_connexion" type="submit" name="button">Valider</button>
            </div>
          </form>
        </div>
        <div class="col-md-4 redir_create_account">
          <p class="text_form"><span class="bold">Vous n'avez pas de compte?</span><br/><br/>Vous pouvez vous créer un compte personnel gratuit sur Narramus.fr afin d'échanger avec la communauté.</p>
          <a href="inscription.php"><button class="button_create_account" type="button" name="button" href="inscription_done.php">Se créer un compte</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('include/footer.php');
?>
<script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
