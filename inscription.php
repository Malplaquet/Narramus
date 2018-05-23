<?php
session_start();
include('include/header.php');
?>
<form class="form_inscription" action="inscription_done.php" method="post">
  <input type="text" id='pseudo' name="pseudo" placeholder="Votre pseudo" required>
  <input type="password" id='pass' name="pass" placeholder="Votre mot de passe" required>
  <input type="password" id='pass_repeat' name="pass_repeat" placeholder="Confirmez votre mot-de-passe" required>
  <input type="text" id='email' name="email" placeholder="Votre adresse email" required>
  <div class="g-recaptcha" data-sitekey="6LfaWFkUAAAAALn3XwlrPtWESU-KSSn7gbac98Ah"></div>
  <button type="submit" name="button_incription">Confirmer votre inscription</button>
</form>
<?php
include('include/footer.php');
?>
<script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
