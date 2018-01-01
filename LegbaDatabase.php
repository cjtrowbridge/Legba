<?php

class LegbaDatabase{
  
  private $selectedDatabaseAlias = null;
  private $Legba          = null;
  private $arrConfig      = null;
  private $arrEnvironment = null;
  
  function __construct($strDatabaseAlias, &$Legba){
    //Find the database in the credential list or throw fatal error
    if(
      ($strDatabaseAlias != false) &&
      (!(isset($Legba->config()['Database'][$strDatabaseAlias])))
    ){
      //It might make sense that this should not be a fatal error, but the constructor cant return, so there would need to be more complex code to handle this in that case.
      die('Invalid Database: "'.$strDatabaseAlias.'"');
    }
    
    //Connect to the database and set it as a property of this instance
    $this->selectedDatabaseAlias = $strDatabaseAlias;
    $this->Legba                 = &$Legba;
    
  }
  /*
  function __destruct(){
    //Close the database connection
    
  }
  function __call($Name){
    //TODO make this be able to call abstract routes through data objects to return result arrays. ie $Legba->database('testDatabase')->table('name')->column('whatever')->anotherColumn('whatever2'); returns array.
    
  }*/
  public function getDatabases(&$Legba){
    //return a list of all configured databases and their metadata
    
    $databases = array();
    $DatabaseList = $Legba->config()['Database'];
    
    foreach($DatabaseList as $alias => $databaseConfig){
      $databases[$alias] = array(
        'Alias' => $alias,
        'Name'  => $databaseConfig['Name'],
        'Type'  => $databaseConfig['Type']
      );
    }
    return $databases;
  }
  
  
  public function connect($alias){
    //connect the specified database if it is not already connected
    
  }
  public function sanitize($String){
    //sanitize the string for whatever database it is
    
  }
  public function sql($SQL){
    //Run the query and return the results along with some performance data about the query
    
    $Legba->database($database)->validate();
    
    $this->selectedDatabaseAlias
    
  }
  
  public function getTables($database){
    //return a list of tables in the specified database
    
    $Legba->database($database)->validate();
  
    $DatabaseMatch = $Legba->config()['Database'][$database];
    
    switch(lower($DatabaseMatch['Type'])){
      case 'mysql':
        $tables = $Legba->database($database)->sql("SHOW TABLES;");
        
        break;
      default:
        die('Database Type "'.$DatabaseMatch['Type'].'" on the Database Called "'.$database.'" Is Not Implemented.');
        break;
    }
      
  }
  
}
