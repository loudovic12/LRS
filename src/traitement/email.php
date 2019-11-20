<?php
// On fait appel à la classe functions pour afficher les messages d'eerur
require_once($_SERVER["DOCUMENT_ROOT"]."/lrs/src/model/functions.php");
?>

<?php
$to      = 'cockpit.website@gmail.com';
$subject =  $_POST['subject'];
$message = '<html>
      <head>
       <title>Test d\'envoie de mail</title>
      </head>
      <body>

       <p>Vous avez reçu un email de '.$_POST['firstname'].' '.$_POST['name'].' ('.$_POST['sender'].') :</p>
    <p>'.$_POST['content'].'</P>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'From: '.$_POST['sender'];

mail($to,$subject,$message,implode("\r\n", $headers));
getSuccess('Votre mail a été envoyée', '/lrs/src/view/contact-us.php');
 ?>
