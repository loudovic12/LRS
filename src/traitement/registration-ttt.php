<?php
// Début de la SESSION
session_start();
// Inclusion des classes "lrs_management.php" et "lrs.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/lrs/src/model/lrs_manager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/lrs/src/model/lrs.php');

// Vérification pour savoir si le formulaire a bien été remplit
if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['phone'])>10 || empty($_POST['adresse']) || empty($_POST['email']) || empty($_POST['mdp'])) {
    getError('Formulaire incomplet','/lrs/index.php');
}
else {
    ///////////////////ENVOIE DE MAIL A LA PERSONNE INSCRITE//////////////////////
    $to = $_POST['email'];
    $subject =  'Inscription au site des anciens étudiants';
    $message = '<html>
      <head>
      </head>
      <body>
        <p>Bonjour '.$_POST['prenom'].' '.$_POST['nom'].'</p>
       <p>Bienvenue sur le site des anciens étudiants du Lycée Privé Robert Schuman !</p>
    <p>Grâce à ce site, vous aurez accès à différents évènements organisés par la direction !</P>
    <p>Vous pourrez aussi échanger avec d\'autres anciens étudiants grâce à notre forum.</P>
    <p>Si vous avez une question, vous pouvez contacter l\'administrateur à partir de l\'onglet "Contactez-nous" ou envoyer un mail à l\'adresse suivante :</p>
    <p style="font-weight: bold">cockpit.website@gmail.com</p>
    <p>Amusez-vous bien !</p><br>
    <p>Cordialement,</p>
    <p>L\'administrateur</p>
    
    
    
      </body>
     </html>
     ';

    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // En-têtes additionnels

    $headers[] = 'From: cockpit.website@gmail.com';

    mail($to,$subject,$message,implode("\r\n", $headers));



    /////////////////////////////////////////////////////////////////////////////
// Creation d'un nouvel objet "user" de type "lrs" avec l'envoie des données
    $user = new lrs([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'phone' => $_POST['phone'],
        'adresse' => $_POST['adresse'],
        'email' => $_POST['email'],
        'mdp' => $_POST['mdp'],

    ]);
// Creation d'un nouvel objet "add" de type "lrs_management"
    $add = new lrs_manager();
// Execution de la fonction addUser avec l'envoie des données de ($user)
    $add->addUser($user);
}
