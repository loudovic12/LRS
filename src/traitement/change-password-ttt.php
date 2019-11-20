<?php
// Début de la SESSION
session_start();
// Inclusion des classes "lrs_management.php" et "lrs.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/lrs/src/model/lrs_manager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/lrs/src/model/lrs.php');

//On vérifie si le mot de passe et la confirmation du mot de passe sont identiques
    if ($_POST['newpassword'] == $_POST['samenewpassword']) {

        $mdp = $_POST['samenewpassword'];
        // Creation d'un nouvel objet "newpassword" de type "lrs" avec l'envoie de "mdp"
    $newpassword = new lrs([
        'mdp' => $mdp
        ]);

        $to = $_COOKIE['email'];
        $subject =  'Réinitialisation de mot de passe effectuée';
        $message = '<html>
      <head>
      </head>
      <body>
        <p>Bonjour '.$_COOKIE['email'].'</p>
       <p>La réinitialisation de votre mot de passe a été effectuée avec succès !</p>
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
        ///////////////////////////////////////////////////////////////



        // Creation d'un nouvel objet "changepassword" de type "lrs_manager"
    $changepassword = new lrs_manager();
        // Execution de la fonction changepassword avec l'envoie des données de ($changepassword)
    $changepassword -> reinitpassword($newpassword);

        //Destruction des cookies de 'email' et 'password'
        setcookie('email', $result['email'], time()-1, '/');
        setcookie('password', $result['mdp'], time()-1, '/');
}
        ?>