<?php

// Make session class
class Session
{
    private $signed_in;
    public $user_id;
    public $message;

    // Make construct method
    function __construct()
    {
        session_start();
        $this->check_the_login();
        $this->check_message();
    }

    // Make message method
    public function message($msg = "")
    {
        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message();
        }
    }

    private function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    // Make user signed in method to get the private property value to use anywhere
    public function is_signed_in()
    {
        return $this->signed_in;
    }

    // Make login method
    public function login($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['id'] = $user->id;
            $this->signed_in = true;
        }
    }

    // Make Logout method
    public function logout()
    {
        unset($_SESSION['id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    // Check login
    private function check_the_login()
    {
        if (isset($_SESSION['id'])) {
            $this->user_id = $_SESSION['id'];
            $this->signed_in = true;
        } else {
            // When user id not found then unset
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}

// Instantiate the class
$session = new Session();