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