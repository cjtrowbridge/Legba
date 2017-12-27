<?php

include_once('Legba.php');

$Legba = new Legba();

$Legba->authenticate();

$Legba->router();
