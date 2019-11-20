<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/lrs/src/model/event_manager.php');
$event = new event_manager();
$event->deleteEventDate();

?>
<!DOCTYPE html>
<html lang="fr">


<head>
    <title>Lycée Robert Schuman</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="../../assets/images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="../../assets/bootstrap/css/materialize.css" rel="stylesheet">
    <link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../../assets/bootstrap/css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="../../assets/bootstrap/css/style-mob.css" rel="stylesheet" />
    <script src="../../assets/bootstrap/js/html5shiv.js"></script>
    <script src="../../assets/bootstrap/js/respond.min.js"></script>
</head>

<body>


<!---MAP SECTION -->
<section id="map" style="margin-top: 10%">
    <div class="row contact-map">
        <!-- IFRAME: GET YOUR LOCATION FROM GOOGLE MAP -->
        <div class="container">
            <div class="overlay-contact footer-part footer-part-form">
                <div class="map-head">
                    <h4>Réinitialisation de mot de passe</h4> </div>
                <p>Entrer la clé que vous avez reçu par mail pour pouvoir réinitialiser votre mot de passe</p>
                <!-- ENQUIRY FORM -->
                <form id="contact_form" method="post" name="contact_form" action="change-password.php">
                    <ul>
                        <li class="col-md-12 col-sm-12 col-xs-12 contact-input-spac">
                            <input type="" id="f2" value="" name="keypassword" placeholder="Clé" required> </li>
                        <li class="col-md-6">
                            <input type="submit" value="OK"> </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END SLIDER -->


<!--Import jQuery before materialize.js-->
<script src="../../assets/bootstrap/js/main.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/bootstrap/js/materialize.min.js"></script>
<script src="../../assets/bootstrap/js/custom.js"></script>
</body>

</html>
