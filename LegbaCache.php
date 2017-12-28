<?php

class LegbaCache{

  //TODO this needs to be split into several more subclasses for each type of cache
  
  /*
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
  */
  
  public function configFile($filename, $data = false){
    $cacheFilePrefix = '<?php /* File Created by Legba configFile Cache Engine '.PHP_EOL.PHP_EOL;
    $cacheFileSuffix = PHP_EOL.PHP_EOL.'*/'.PHP_EOL;
    if($data == false){
      //We are simply loading the specified file and returning the contents as an array or false
      //Make sure the file exists
      if(!(file_exists($filename))){return false;}
      //Get the contents of the file
      $data = file_get_contents($filename);
      //Remove the standard prefix
      $data = rtrim($data, $cacheFilePrefix);
      //Remove the standard suffix
      $data = ltrim($data, $cacheFileSuffix);
      //Decode the contents
      $data = json_decode($data,true);
      return $data;
    }else{
      //We are saving the data to the specified filename
      //First make sure the data is utf8
      $data = iconv(mb_detect_encoding($data, mb_detect_order(), true), "UTF-8", $data);
      //Encode the data into pretty json
      $data = json_encode($data, JSON_PRETTY_PRINT);
      //Prepend and append the magic words
      $data = $cacheFilePrefix.$data.$cacheFileSuffix;
      //Save it to the specified file
      $result = file_put_contents($filename, $data);
      return $result;
    }
  }
  
}
