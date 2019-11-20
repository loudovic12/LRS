<?php
// Début de la SESSION
session_start();
// Inclusion des classes "lrs_management.php" et "lrs.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/lrs/src/model/lrs_manager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/lrs/src/model/lrs.php');

// Vérification pour savoir si le formulaire a bien été remplit
if(empty($_POST['mailto'])) {
    getError('Formulaire incomplet','/lrs/index.php');
}

// Creation d'un nouvel objet "user" de type "lrs" avec l'envoie de "email"
$user = new lrs([
    'email' => $_POST['mailto']
]);

// Creation d'un nouvel objet "password" de type "lrs_manager"
$password = new lrs_manager();
// Execution de la fonction selectPassword avec l'envoie des données de ($user)
$result = $password->selectPassword($user);
$to      = $_POST['mailto'];
$subject =  "Oublie de mot de passe";
$body = '<html>
      <head>
       <title>Test d\'envoie de mail</title>
      </head>
      <body>
        <p>Bonjour,</p>
       <p>Voici la clé que vous devez utiliser pour pouvoir réinitialiser votre mot de passe :</p>
    <p>'.$result['mdp'].'</P>
    <p>Appuyer sur ce lien pour être redirigé(e) sur la page de reinitialisation :</p>
    <p><a href="localhost/lrs/src/view/key-password.php">Page de réinitialisation</a></p>
      </body>
     </html>
     ';


// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// En-têtes additionnels
$headers[] = 'From: cockpit.website@gmail.com';

mail($to,$subject,$body,implode("\r\n", $headers));
getSuccess("Votre mail de réinitialisation à été envoyé avec succès ", "../../index.php");
?>