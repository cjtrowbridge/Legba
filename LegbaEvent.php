<?php

class LegbaEvent{
    /*
    Events
    
      Examples;
        $Legba->event('User Is Not Logged In');
        $Legba->event('User Is Not Logged In')->hook('someCode();');
    
  */
  
  public function event($eventDescription, $defaultFunction){
    //Handle the execution of an event and any code which is hooked onto it.
    //Add information to the debug variable pertaining to the runtime and memory usage of this event.
    
  }
  
  public function hook($eventDescription, $Code, $position = 'bottom'){
    //Hook an code block onto an event. It will be executed when that event is called.
    //The optional position parameter specifies where in the event's queue this block will execute. Valid options are top or bottom.
    
  }
  
}
