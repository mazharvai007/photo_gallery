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
//        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
//
//        if (mysqli_connect_errno()) {
//            die("Database connection is failed " . mysqli_error());
//        }

        // Improving DB connect system
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);

        if ($this->connect->connect_errno) {
            die("Database connection is failed " . $this->connect->connect_error);
        }
    }

    // Make query method
    public function query($sql)
    {
//        $result = mysqli_query($this->connect, $sql);

        // Improve DB Query
        $result = $this->connect->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    // Make confirm mentod
    private function confirm_query($result)
    {
        if (!$result) {
//            die("Query Failed! " . mysqli_error());

            // Improve Query
            die("Query Failed! " . $this->connect->error);
        }
    }

    // Make escape string method
    public function escape_string($string)
    {
//        $escaped_string = mysqli_real_escape_string($this->connect, $string);

        // Improve Query
        $escaped_string = $this->connect->real_escape_string($string);
        return $escaped_string;
    }

    // Make Insert ID method
    public function the_insert_id()
    {
        return $this->connect->indert_id;
    }

}

// Instantiate the Database Class
$database = new Database();
