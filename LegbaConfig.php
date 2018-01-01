<?php

class LegbaConfig{
  
  private $blankConfig = null;
  private $blankEnvironment = null;
  private $Legba = null;
  private $arrConfig = null;
  private $arrEnvironment = null;
  
  function __construct(&$Legba, &$arrConfig, &$arrEnvironment){
    
    $this->Legba          = $Legba;
    $this->arrConfig      = $arrConfig;
    $this->arrEnvironment = $arrEnvironment;
    
    //Default values for blank files
    $this->blankConfig = array(
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
    $this->blankEnvironment = array(

    );
  }
  public function load(){
    //Attempt to load config and environment from files
    $this->arrConfig = $this->Legba -> cache() -> configFile('Config.php');
    if($this->arrConfig == false){
      //Unable to load config from file
      //If the config file does not exist; create a new blank one
      if(!(file_exists('Config.php'))){
        $this->Legba -> cache() -> configFile('Config.php', $this->blankConfig);
      }
    }
    //If the config file is not filled in; die
    if($this->arrConfig == $this->blankConfig){
      die('Please fill in missing config file.');
    }
    
    $this->arrEnvironment = $this->Legba -> cache() -> configFile('Environment.php');
    if($this->arrEnvironment == false){
      //Unable to load environment from file
      //If the environment file does not exist; create a new blank one
      if(!(file_exists('Environment.php'))){
        $this->Legba -> cache() -> configFile('Environment.php', $this->blankEnvironment);
      }
    }
    echo PHP_EOL.'loaded config'.PHP_EOL;
    
  }
  
}
