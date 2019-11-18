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

        // Improving DB connect system
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);

        if ($this->connect->connect_errno) {
            die("Database connection is failed " . $this->connect->connect_error);
        }
    }

    // Make query method
    public function query($sql)
    {
        // Improve DB Query
        $result = mysqli_query($this->connect, $sql);
        $this->confirm_query($result);
        return $result;
    }

    // Make confirm method
    private function confirm_query($result)
    {
        if (!$result) {
            // Improve Query
            die("Query Failed! " . $this->connect->error);
        }
    }

    // Make escape string method
    public function escape_string($string)
    {
        // Improve Query
        $escaped_string = $this->connect->real_escape_string($string);
        return $escaped_string;
    }

    // Make Insert ID method
    public function the_insert_id()
    {
        return mysqli_insert_id($this->connect);
    }

}

// Instantiate the Database Class
$database = new Database();
