<?php

class LegbaUser{
  
  public function givePermission($description){
    //If the user does not already have the specified permission, give it to them.
    
  }
  public function removePermission($description){
    //If the user has the specified permission, remove it from them.
    
  }
  
  public function hasPermission($description){
    //determine if the current user has the specified permission. return true or false.
  }
  
  public function data($key,$value = null){
    //If value is null, fetch the value of the specified user data object. (Ie, Name, Phone, Photo)
    //If value is not null, set that object to the value specified, for the current user.
    
  }
  
  
  
}
