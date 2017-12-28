<?php

class LegbaConfig{
  
  $blankConfig = array(
    'App' => array(
      'Default Session Length' => 60*60*24*7,
      'Encryption Key'         => $Legba -> getRandomString(),
      'Name'                   => '',
      'URL'                    => ''
    ),
    'Database' => array(
      'Legba' => array(
        'Type'     => '',
        'Hostname' => '',
        'Username' => '',
        'Password' => '',
        'Resource' => false
      )
    ),
    'Debugging' => array(
      'Enable Verbose' => false
    ),
    'Locale'=> array(
      'timezone' => 'America/Los Angeles'
    ),
    'OAuth'=> array(
      'Google' => array(
        'ClientID'     => '',
        'ClientSecret' => ''
      ),
      'Facebook' => array(
        'AppID'     => '',
        'AppSecret' => ''
      )
    ),
    'SMTP' => array(
      'Username'                   => '',
      'Password'                   => '',
      'Port'                       => 25,
      'Host'                       => 'localhost',
      'AdminEmail'                 => '',
      'DefaultEmailSubject'        => '',
      'DefaultEmailFrom'           => '',
      'PHPMailerDebuggingFlag'     => 2
      /*
        0 = off (for production use)
        1 = client messages
        2 = client and server messages      
      */
    )
  );
  
  $blankEnvironment = array(
    
  );
  
  function __construct(&$Legba, &$arrConfig, &$arrEnvironment){
    //Attempt to load config and environment from files
    
    $arrConfig      = $Legba -> cache() -> configFile('Config.php');
    if($arrConfig == false){
      //Unable to load config from file
      //If the config file does not exist; create a new blank one
      if(!(file_exists('Config.php'))){
        $Legba -> cache() -> configFile('Config.php', $blankConfig);
      }
    }
    //If the config file is not filled in; die
    if($arrConfig == $blankConfig){
      die('Please fill in missing config file.');
    }
    
    $arrEnvironment = $Legba -> cache() -> configFile('Environment.php');
    if($arrEnvironment == false){
      //Unable to load environment from file
      //If the environment file does not exist; create a new blank one
      if(!(file_exists('Environment.php'))){
        $Legba -> cache() -> configFile('Environment.php', $blankEnvironment);
      }
    }
    
    
  }
  
}
