<?php

class Session
{
    private $logged_in = false;
    public $user_id;
    public $lang;
    public $message;

    function __construct() {
        session_start();
        $this->check_login();
        $this->check_message();

    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    private function check_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->logged_in = true;
        } else {
            unset($this->user_id);
            $this->logged_in = false;
        }
    }

    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    public function message ($msg = ""){
        if(empty($msg)) {
            return $this->message;
        } else {
            $_SESSION['message'] = $msg;
        }
    }

    public function login($user) {
        if($user) {
            $this->user_id = $_SESSION['user_id'] = $user->ID;
            $this->lang = $_SESSION['lang'] = $user->lang;
            $this->lang = $_SESSION['rights'] = $user->rights;
            $this->logged_in = true;
        }
    }

    public function logout() {
        session_unset();
        unset($this->user_id);
        $this->logged_in = false;
    }
}

$session = new Session();
$message = $session->message();