<?php
session_start();
$to = 'boufflers.pierre@narramus.fr';
$subject = $_POST['object'];
$message = $_POST['message'];
$headers = 'De ' . $_POST['name'] . '<' . $_POST['mailadress'] . ">\r\n" .
'Répondre à : ' . $_POST['mailadress'] . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header('refresh:4; url=contacts.php');

include('include/header.php');
?>
<div class="corps">
  <div class="bloc_texte">
    <h2 class="titre_redir">Votre message a bien été envoyé</h2>
    <h3 class="soustitre_redir">Redirection... Patientez</h3>
  </div>
</div>
<?php
include('include/footer.php');
?>
<script type="text/javascript" src="js/narramus.js"></script>
</body>
</html>
