<?php

include_once('Legba.php');

$Legba = new Legba();

if($Legba->config() == false){
  die('Please fill in missing config file!');
}

//$Legba->authenticate();

//$Legba->router();

die(PHP_EOL.'ok'.PHP_EOL);
