<?php

class LegbaDatabase{
  
  private $selectedDatabaseAlias = null;
  private $Legba          = null;
  private $arrConfig      = null;
  private $arrEnvironment = null;
  
  function __construct($strDatabaseAlias, &$Legba, &$arrConfig, &$arrEnvironment){
    $this->selectedDatabaseAlias = $strDatabaseAlias;
    $this->Legba                 = &$Legba;
    $this->arrConfig             = &$arrConfig;
    $this->arrEnvironment        = &$arrEnvironment;
    //Find the database in the credential list or throw fatal error
    //Connect to the database and set it as a property of this instance
    
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
    var_dump($Legba->config());
    
    $databases = array();
    $DatabaseList = $Legba->config()['Database'];
    
    echo PHP_EOL.'35: ';
    var_dump($DatabaseList);
    foreach($DatabaseList as $alias => $databaseConfig){
      $databases[$alias] = array(
        'Alias' => $alias,
        'Name'  => $databaseConfig['Name'],
        'Type'  => $databaseConfig['Type']
      );
    }
    return $databases;
  }
  
  
  public function sanitize($String){
    //sanitize the string for whatever database it is
    
  }
  public function sql($SQL){
    //Run the query and return the results along with some performance data about the query
    
  }
  
  public function getTables($database){
    //return a list of tables in the specified database
  }
  
}
