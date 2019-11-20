<?php
// On fait appel à la classe functions pour afficher les messages
require_once($_SERVER["DOCUMENT_ROOT"]."/lrs/src/model/functions.php");
?>

<?php
$to      = $_POST['mailto'];
$subject =  $_POST['subject'];
$body = $_POST['content'];


// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// En-têtes additionnels
$headers[] = 'From: cockpit.website@gmail.com';

mail($to,$subject,$body,implode("\r\n", $headers));
getSuccess('Votre mail a été envoyée', '/lrs/src/view/admin/compose-mail.php');

?>