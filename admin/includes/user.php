<?php

class User
{
    // Find all users
    public static function find_all_users() {
        global $database;

        $result_set = $database->query("SELECT * FROM users");
        return $result_set;
    }
}

// Instantiate the User Class
$user = new User();