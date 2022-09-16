<?php

class Utility {

    //alert message when results true or false
    public function showAlertMessage($type, $message){
        
        return "
            <div class=\"alert alert-{$type} alert-dismissible fade show\" role=\"alert\">
            {$message}.
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>
        ";
    }


    //clearing and validation method of input data by user 
    public function inputValidation($input){
            
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        $input = strip_tags($input);
        return $input;
    }


    //set date and time
    public function getDateAndTime(){

        date_default_timezone_set("Asia/Colombo");
        $datetime = date('M-d-Y H:i:s');
        return $datetime;            
    }

    
    //session time out
    public function sessionLogout($name){
        if(isset($_SESSION[$name])){
          
          //make it session username null 
          $_SESSION[$name] = null;
          //destroy all the session from $_SESSION global variable
          session_destroy();
          return true;

        }else {
          return false;
        }
      }
}

$utility = new Utility();
$utility->showAlertMessage('success', 'Successfully inserted data');
$utility->getDateAndTime();











