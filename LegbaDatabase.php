<?php

class LegbaDatabase{
  //$Legba->database('testDatabase')->sql('SELECT * FROM table');
  
  function __construct($strDatabaseAlias, $arrEnvironment){
    //Find the database in the credential list or throw fatal error
    //Connect to the database
    
  }
  function __destruct(){
    //Close the database connection
    
  }
  function __call($Name){
    //TODO make this be able to call abstract routes through data objects to return result arrays. ie $Legba->database('testDatabase')->table('name')->column('whatever')->anotherColumn('whatever2'); returns array.
    
  }
  
  
  public function sanitize($String){
    //sanitize the string for whatever database it is
    
  }
  public function sql($SQL){
    //Run the query and return the results along with some performance data about the query
    
  }
  
}
