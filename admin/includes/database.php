<?php

require_once ("config.php");

// Create Database Class
class Database
{

    public $connect;
    public $db;

    function __construct()
    {
        $this->db = $this->open_db_connect();
    }

    // Connect with database using the method
    public function open_db_connect()
    {

        // Improving DB connect system
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);

        if ($this->connect->connect_errno) {
            die("Database connection is failed " . $this->connect->connect_error);
        }

        return $this->connect;
    }

    // Make query method
    public function query($sql)
    {
        // Improve DB Query
        $result = $this->db->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    // Make confirm method
    private function confirm_query($result)
    {
        if (!$result) {
            // Improve Query
            die("Query Failed! " . $this->db->error);
        }
    }

    // Make escape string method
    public function escape_string($string)
    {
        // Improve Query
        return $this->db->real_escape_string($string);
    }

    // Make Insert ID method
    public function the_insert_id()
    {
        return $this->db->insert_id;
    }

}

// Instantiate the Database Class
$database = new Database();
