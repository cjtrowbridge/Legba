<?php

/*
  
  Legba 1.0 is equivalent to Astria version 14.0.
  
  Legba is the Haitian god 'of all roads and pathways,' in the verbage of William Gibson's Count Zero. In the book, Legba exists as the chosen personality of 
  an AI inside cyberspace (a term the author invented for this series). Legba allows complex connections to be made through intuitive abstract interfaces,
  and provides simple metaphors representing complex information. In the words of one of his devotees, "It's Just a structure. Lets you an' me discuss 
  some things that are happening, otherwise we might not have words for it, concepts."
  
  Moving on to Legba from Astria represents a major change in the project's focus after 16 years of continuous development. Up until now, the primary role 
  has been facilitating connections and handling users. With this new version, the primary role is now the procedural interface providing 
  comprehensive restful crud access to databases through json and html routing. These features are still fully extensible and the new permisssions system 
  allows far greater customizability and granular control of access to data and tools within the framework.
  
*/

//Include the subclasse files
include_once('LegbaCache.php');
include_once('LegbaConfig.php');
/*
include_once('LegbaCron.php');
include_once('LegbaCryptography.php');
include_once('LegbaDatabase.php');
include_once('LegbaDebug.php');
include_once('LegbaEvent.php');
include_once('LegbaPermission.php');
include_once('LegbaPlugin.php');
include_once('LegbaRouter.php');
include_once('LegbaSession.php');
include_once('LegbaUser.php');
*/
class Legba{
  
  //Instantiate null references to all the subclasses
  private $objCache        = null;
  private $objConfig       = null;
  private $objCron         = null;
  private $objCryptography = null;
  private $objDebug        = null;
  private $objEvent        = null;
  private $objPermission   = null;
  private $objPlugin       = null;
  private $objRouter       = null;
  private $objSession      = null;
  private $objUser         = null;

  //This holds the events and the code which will be triggered when the event happens
  private $arrEvent = array();
  //This holds the config settings
  private $arrConfig = false;
  //This holds the environment variables
  private $arrEnvironment = false;
  
  //Native class primitives
  function __construct(&$arrEnvironment = null){
    
    //Check for config file and include it or prompt to create one
    //Check for session, and load it or create a new one
  }
  /*
  function __destruct(){
    //TODO it's not clear what will need to go here, but this will come once all the other prototypes are implemented
  }
  function __call(){
    //TODO Include graceful error handling
  }
  */
  //Accessors for Subclasses: Instantiate them if they have not yet been instantiated, or else return them.
  public function &cache(){
    if($this->objCache == null){
      $this->objCache = new LegbaCache();
    }
    return $this -> $objCache;
  }
  public function &config(){
    if($this->objConfig == null){
      $this->objConfig = new LegbaConfig($this, $arrConfig, $arrEnvironment);
    }
    return $this->objConfig;
  }
  public function &cron(){
    if($this->ojbCron == null){
      $this->ojbCron = new LegbaCron();
    }
    return $this->ojbCron;
  }
  public function &cryptography(){
    if($this->objCryptography == null){
      $this->objCryptography = new LegbaCryptography();
    }
    return $this->objCryptography;
  }
  public function &database($strDatabase){
    $objDatabase = new LegbaDatabase($strDatabase, $this->$arrEnvironment);
    return $objDatabase;
  }
  public function &debug(){
    if($this->objDebug == null){
      $this->objDebug = new LegbaDebug();
    }
    return $this->objDebug;
  }
  public function &event(){
    if($this->objEvent == null){
      $this->objEvent = new LegbaEvent();
    }
    return $this->objEvent;
  }
  public function &permission(){
    if($this->objPermission == null){
      $this->objPermission = new LegbaPermission();
    }
    return $this->objPermission;
  }
  public function &plugin(){
    if($this->objPlugin == null){
      $this->objPlugin = new LegbaPlugin();
    }
    return $this->objPlugin;
  }
  public function &router(){
    if($this->objRouter == null){
      $this->objRouter = new LegbaRouter();
    }
    return $this->objRouter;
  }
  public function &session(){
    if($this->objSession == null){
      $this->objSession = new LegbaSession();
    }
    return $this->objSession;
  }
  public function &user(){
    if($this->objUSer == null){
      $this->objUSer = new LegbaUser();
    }
    return $this->objUSer;
  }
  
  //Shared static helper-type functions
  public static function utf8($input){
    //Automatically converts a string from whatever it is encoded in, to utf8
    //Copied from: https://stackoverflow.com/questions/7979567/php-convert-any-string-to-utf-8-without-knowing-the-original-character-set-or
    return iconv(mb_detect_encoding($input, mb_detect_order(), true), "UTF-8", $input);
  }
  public static function getRandomString($length = 32){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < $length; $i++){
      $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return $string;
  }
}
