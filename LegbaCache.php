<?php

class LegbaCache{

  //TODO this needs to be split into several more subclasses for each type of cache
  
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
  
}
