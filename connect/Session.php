<?php 
/**
 * Session Class
 */

 ob_start();

class Session{
    public static function init(){
        session_start();
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else{
            return false;
        }
    }


    public static function checkAccountSession(){
        
        self::init();
        if(self::get("accountlogin") == false){
            self::destroy();
            header("Location: /payroll/");
        }
    }


    public static function checkLogin(){
        self::init();
        if(self::get("accountlogin") == true){
            header("Location: /payroll/a1zmhdssxs/");
        }
    }

    public static function destroy(){
        session_destroy();
        header("Location: /payroll/");
    }
}


?>