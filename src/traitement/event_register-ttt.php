<?php

// Début de la SESSION
session_start();
// Inclusion des classes "event_management.php" et "eventClass.php"
require_once($_SERVER["DOCUMENT_ROOT"] . '/lrs/src/model/event_manager.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/lrs/src/model/eventClass.php');


    // Vérification pour savoir si la personne est bien connectée
    if(empty($_COOKIE['id'])) {
        getError("Veuillez vous connecter afin de réserver un évènement", "/lrs/index.php");
    } elseif(isset($_GET['id'])) {



        // Creation d'un nouvel objet "event_register" de type "event_manager"
        $event_register = new event_manager();
        // Execution de la fonction "addRegisterEvent" avec l'envoie des données de ($_GET['id'])
        $event_register->addRegisterEvent($_GET['id']);


        require_once($_SERVER["DOCUMENT_ROOT"] . '/lrs/src/model/lrs_manager.php');
        require_once($_SERVER["DOCUMENT_ROOT"] . '/lrs/src/model/lrs.php');
        $login = new lrs_manager();
        $result = $login -> afficheUser();

        /////////////////////////ENVOIE DE MAIL POUR PREVENIR LA PERSONNE DE SON NSCRIPTION A UN EVENEMENT
        $to      = $result['email'];
        $subject =  'Inscription à un évènement';
        $message = '<html>
      <head>
      </head>
      <body>
        <p>Bonjour '.$result['prenom'].' '.$result['prenom'].'</p>
       <p>Vous avez été insctit(e) à l\'évènement '.$_GET['titre'].' !</p>
    <p>Cet évènement se tiendra le '.$_GET['dateEvent'].' de '.$_GET['heure_deb'].' à '.$_GET['heure_fin'].' à l\'adresse suivante :</P>
    <p>'.$_GET['lieu'].'</p>
      </body>
     </html>
     ';

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // En-têtes additionnels

        $headers[] = 'From: cockpit.website@gmail.com';

        mail($to,$subject,$message,implode("\r\n", $headers));
        ///////////////////////////////////////////////////////////////
}
?>