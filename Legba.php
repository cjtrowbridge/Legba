<?php

/*
  
  Legba 1.0 is equivalent to Astria version 14.0.
  
  Legba is the Haitian god 'of all roads and pathways,' per William Gibson's Count Zero. In the book, Legba exists as the chosen personality of 
  an AI inside cyberspace (a term the author invented for this series). Legba allows complex connections to be made through intuitive abstract interfaces,
  and provides simple metaphors representing complex information. In the words of one of his devotees, "It's Just a structure. Lets you an' me discuss 
  some things that are happening, otherwise we might not have words for it, concepts."
  
  Moving on to Legba from Astria represents a major change in the project's focus after 16 years of continuous development. Up until now, the primary role 
  has been facilitating connections and handling users. With this new version, the primary role is now the procedural interface providing 
  comprehensive restful crud access to databases through json and html routing. These features are still fully extensible and the new permisssions system 
  allows far greater customizability and granular control of access to data and tools within the framework.
  
*/



//TODO This pseudocode will need to be abstracted into a more complex and objective design pattern.
//Something like this: https://stackoverflow.com/questions/533459/how-to-do-a-php-nested-class-or-nested-methods


class Legba{
  
  /*
    Constructor
  */
  
  function __construct() {
    //Check for config file and include it or prompt to create one
    //Check for session, and load it or create a new one
  }
  
  function __call() {
    //Include graceful error handling
    
  }
  
  
  
  //TODO cron
  //TODO debug
  //TODO permissions
  //TODO plugins
  //TODO query
  //TODO router
  
  
  
  /*
    Cache
  */
  
  //TODO this should come from the environment file unless it is not set
  private const ARRAY_CACHE_FILE_PREFACE = '<?php /* File Created by Legba Array Cache Engine */'.PHP_EOL;
  
  public function cache->memory->write($Identifier, $Data){
    //Saves the data to the specified identifier in memory cache. 
    
  }
  
  public function cache->memory->read($Identifier){
    //Returns the contents from memory cache matching the identifier, or else false.
    
  }
  
  public function cache->database->write($Identifier, $Data){
    //Saves the data to the specified identifier in database cache. 
    
  }
  
  public function cache->database->read($Identifier){
    //Returns the contents from database cache matching the identifier, or else false.
    
  }
  
  public function cache->disk->write($Identifier, $Data){
    //Saves the data to the specified identifier in disk cache. 
    
  }
  
  public function cache->disk->read($Identifier){
    //Returns the contents from disk cache matching the identifier, or else false.
    
  }
  
  private function cache->arrayToFile->write($variableName){
    //Takes a string variable name like 'Debug' for $Debug and saves it to a php file in the webroot with the same name, if that filename 
    //is either available or starts with the defined ARRAY_CACHE_FILE_PREFACE, or returns false.
    
  }
  
  private function cache->arrayToFile->read($variableName){
    //Takes a string variable name like 'Debug' for $Debug and looks for a php file in the webroot with the same name. If that filename 
    //is exists and starts with the define ARRAY_CACHE_FILE_PREFACE, the variable is unset, and then the file is included.
    //This means that this function will always replace the existing variable with the contents of the file.
    
  }
  
  
  /*
    Cryptography
  */
  
  public function encrypt($stringData, $algorithm = 'blowfish', $encryptionKey = null){
    //Encrypts a string with the specified algorithm using an optional encryption key, or else it uses the default encryption key stored in the environment file.
    if($encryptionKey == null){
      $encryptionKey = $this->environment['encryptionKey'];
    }
    $algorithm = strtolower($algorithm);
    switch($algorithm){
      case 'blowfish':
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encryptedString = base64_encode(mcrypt_encrypt(MCRYPT_BLOWFISH, $encryptionKey, $this->utf8($stringData), MCRYPT_MODE_ECB, $iv));
        return $encryptedString;
      default:
        die('Invalid Encrypt Algorithm: "'.$algorithm.'"');
    }
  }

  public function decrypt($encryptedString, $algorithm = 'blowfish', $encryptionKey = null){
    //Decrypts a string with the specified algorithm using an optional encryption key, or else it uses the default encryption key stored in the environment file.
    if($encryptionKey == null){
      $encryptionKey = $this->environment['encryptionKey'];
    }
    $algorithm = strtolower($algorithm);
    switch($algorithm){
      case 'blowfish':
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decryptedString = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryptionKey, base64_decode($encryptedString), MCRYPT_MODE_ECB, $iv);
        //Make sure it's UTF8 now
        $decryptedString = $this->utf8($decryptedString);
        return $decryptedString;
      default:
        die('Invalid Decrypt Algorithm: "'.$algorithm.'"');
    }
  }
  
  public function utf8($Input){
    //Automatically converts a string from whatever it is encoded in, to utf8
    //Copied from: https://stackoverflow.com/questions/7979567/php-convert-any-string-to-utf-8-without-knowing-the-original-character-set-or
    return iconv(mb_detect_encoding($Input, mb_detect_order(), true), "UTF-8", $Input);
  }
  
  
  /*
    Events
    
      Examples;
        $Legba->event('User Is Not Logged In');
        $Legba->event('User Is Not Logged In')->hook('someCode();');
    
  */
  
  private $Events = array(); //This will hold all the events and their code
  
  public function event($eventDescription, $defaultFunction){
    //Handle the execution of an event and any code which is hooked onto it.
    //Add information to the debug variable pertaining to the runtime and memory usage of this event.
    
  }
  
  public function event()->hook($eventDescription, $Code, $position = 'bottom'){
    //Hook an code block onto an event. It will be executed when that event is called.
    //The optional position parameter specifies where in the event's queue this block will execute. Valid options are top or bottom.
    
  }
  
  
  /*
    Router
  */
  
  public function route($Lowercase = true){
    //Gets the current route and returns an array of route elements
    $URL = rtrim(trim($_SERVER['REQUEST_URI'], '/'),'/');
    if($Lowercase){
      $URL = strtolower($URL);
    }
    //If there is a question mark, truncate the url we are parsing at that point.
    $preQuestionMark = explode("?", $URL);
    $URL = $preQuestionMark[0];
    if(!(substr($URL, -1)=='/')){$URL.='/';}
    $pathSegments = explode('/', $URL);
    $route = array();
    foreach($pathSegments as $pathSegment){
      if(!(trim($pathSegment)=='')){
        $route[]=$pathSegment;
      }
    }
    return route;
  }
    
    
  /*
    Sessions
  */
  
  //This is a rough set of prototypes which will need to be abstracted into a more complex and objective design pattern.
  
  private function session->initialize(){
    //Checks if there is a session. Loads it from cache, or creates a new one.
    
  }
  
  public function session->save(){
    //Saves the current session to the database if it is different than the last time it was saved. Page is not interrupted.
    
  }
  
  public function session->destroy(){
    //Destroys the current session and redirects to the homepage
    
  }
  
  
}
