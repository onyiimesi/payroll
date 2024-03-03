<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../connect/Session.php');
Session::checkLogin();

include_once ($filepath.'/../connect/Database.php');
include_once ($filepath.'/../lib/format.php'); 


/**
 * Account Login
 */
class AccountLogin{

    private $con;
    private $format;

    public function __construct(){
       $this->con = new Database();
       $this->format = new Format();

    }

    public function accountLogin($data){

        $adminUser = $this->format->validation($data['email']);
        $adminPass = $this->format->validation($data['password']);

        $arr = array();
        $arr['email'] = $data['email'];
        $arr['password'] = md5($data['password']);

        $adminPass = $arr['password'] = md5($data['password']);

        if(empty($arr['email']) || empty($data['password'])){?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php

            return "<div class='alert alert-danger text-white'>Username or password must not be empty</div>";
  
        }else{
            $query = "SELECT * FROM account_officer WHERE email = :email AND password = :password ";
            $result = $this->con->select($query,$arr);

            if($result != false){

                foreach($result as $value){
                    Session::set("accountlogin", true);
                    Session::set("account_id", $value['account_id']);
                    Session::set("email", $value['email']);
                    Session::set("fname", $value['fname']);
                    Session::set("lname", $value['lname']);
                    Session::set("role", $value['role']);
                }
                
                header("Location: /a1zmhdssxs/");
            }else{
                return "<div class='alert alert-danger text-white'>Username or Password do not match</div>";
    
            }
        }

        

    }

}
