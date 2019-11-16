<?php

// Make session class
class Session
{
    private $signed_in;
    public $user_id;

    // Make construct method
    function __construct()
    {
        session_start();
        $this->check_the_login();
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
            $this->user_id = $_SESSION['user_id'] = $user->user_id;
            $this->signed_in = true;
        }
    }

    // Make Logout method
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    // Check login
    private function check_the_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
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