<?php

include_once('Legba.php');

$Legba = new Legba();

//$Legba->authenticate();

//$Legba->router();

echo '<p>Listing Databases</p>';
$databases = $Legba->database();
$Legba->pd($databases);
