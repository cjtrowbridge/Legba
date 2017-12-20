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
include_once('LegbaCron.php');
include_once('LegbaCryptography.php');
include_once('LegbaDebug.php');
include_once('LegbaEvent.php');
include_once('LegbaPermission.php');
include_once('LegbaPlugin.php');
include_once('LegbaQuery.php');
include_once('LegbaRouter.php');
include_once('LegbaSession.php');

class Legba{
  
  //Instantiate null references to all the subclasses
  private $Cache        = null;
  private $Cron         = null;
  private $Cryptography = null;
  private $Debug        = null;
  private $Event        = null;
  private $Permission   = null;
  private $Plugin       = null;
  private $Query        = null;
  private $Router       = null;
  private $Session      = null;

  //This will hold all the events and their code
  private $LegbaEvent = array();
  
  //Native class primitives
  function __construct(){
    //Check for config file and include it or prompt to create one
    //Check for session, and load it or create a new one
  }
  function __destruct(){
    //TODO it's not clear what will need to go here, but this will come once all the other prototypes are implemented
  }
  function __call(){
    //TODO Include graceful error handling
  }
  
  //Accessors for Subclasses: Instantiate them if they have not yet been instantiated, or else return them.
  public function cache(){
    if($this -> $Cache == null){
      $this -> $Cache = new LegbaCache();
    }
    return $this -> $Cache;
  }
  public function cron(){
    if($this -> $Cron == null){
      $this -> $Cron = new LegbaCron();
    }
    return $this -> $Cron;
  }
  public function cryptography(){
    if($this -> $Cryptography == null){
      $this -> $Cryptography = new LegbaCryptography();
    }
    return $this -> $Cryptography;
  }
  public function debug(){
    if($this -> $Debug == null){
      $this -> $Debug = new LegbaDebug();
    }
    return $this -> $Debug;
  }
  public function event(){
    if($this -> $Debug == null){
      $this -> $Debug = new LegbaDebug();
    }
    return $this -> $Debug;
  }
  public function permission(){
    if($this -> $Permission == null){
      $this -> $Permission = new LegbaPermission();
    }
    return $this -> $Permissions;
  }
  public function plugin(){
    if($this -> $Plugin == null){
      $this -> $Plugin = new LegbaPlugin();
    }
    return $this -> $Plugins;
  }
  public function query(){
    if($this -> $Query == null){
      $this -> $Query = new LegbaQuery();
    }
    return $this -> $Query;
  }
  public function router(){
    if($this -> $Router == null){
      $this -> $Router = new LegbaRouter();
    }
    return $this -> $Router;
  }
  public function session(){
    if($this -> $Session == null){
      $this -> $Session = new LegbaSession();
    }
    return $this -> $Session;
  }
}
