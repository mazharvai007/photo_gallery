<?php

require_once ("config.php");

// Create Database Class
class Database
{

    public $connect;

    function __construct()
    {
        $this->open_db_connect();
    }

    // Connect with database using the method
    public function open_db_connect()
    {
        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

        if (mysqli_connect_errno()) {
            die("Database connection is failed " . mysqli_error());
        }
    }

}

// Instantiate the Database Class
$database = new Database();
