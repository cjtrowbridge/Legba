<?php

class LegbaRouter{
  
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
  
}
