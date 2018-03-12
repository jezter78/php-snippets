<?php

namespace classes\util;

/**
 * The Flash class is used to flash bootstrap alert messages
 *
 * @author Johnny
 */
class Flash {
    /**
     * This function show the html codes of the bootstrap alert. It detects the
     * session variable available and sets the appropriate color coding to the
     * alert message. The session variable will be unset after show the message,
     * thus achieving the flash effect. (message will show only 1 time)
     * 
     * @return html
     */
    public static function show(){
        //check for session variables
        if (isset($_SESSION['success'])){
            self::buildMsg('success', 'Success!', $_SESSION['success']);                    
            unset($_SESSION['success']);          
            
        } elseif (isset($_SESSION['fail'])) {
            self::buildMsg('danger', 'Error!', $_SESSION['fail']);
                    
            unset($_SESSION['fail']);
        } elseif (isset($_SESSION['warning'])) {
            self::buildMsg('warning', 'Warning!', $_SESSION['warning']);
                    
            unset($_SESSION['warning']);
        } else {
            return null;
        } 
    }
    /**
     * This function sets the session variables with appropriate alert type.
     * To set successful message, set @param $type as "success"
     * To set error message, set @param $type as "fail"
     * To set warning message, set @param $type as "warning"
     * 
     * @param string $type is the type of message to be set
     * @param string $message is the message to be displayed in the alert box
     */
    public static function set(string $type, string $message){
        switch ($type){
            case ('success'):
                $_SESSION['success']=$message;
                break;
            case ('fail'):
                $_SESSION['fail']=$message;
                break;
            case ('success'):
                $_SESSION['warning']=$message;
                break;
            default :
                break;
        }
    }
    /**
     * This function is used internally to build the alert html based on the
     * parameters passed
     * 
     * @param string $type is the type of message, "success", "fail" or "warning"
     * @param string $messageTitle is the message title of the alert
     * @param string $message is the message of the alert
     */
    private static function buildMsg(string $type, string $messageTitle,string $message){
            echo "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>"
        . "<strong>{$messageTitle}</strong> {$message}"
        . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
        . "<span aria-hidden='true'>&times;</span>"
        ."</button></div>";

    }
}
