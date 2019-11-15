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
}

// Instantiate the class
$session = new Session();