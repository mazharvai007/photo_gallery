<?php

class User
{
    // Find all users
    public static function find_all_users() {
        global $database;

        $result_set = $database->query("SELECT * FROM users");
        return $result_set;
    }

    public static function find_user_by_id($user_id) {
        global $database;

        $result = $database->query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result);
        return $found_user;
    }
}

// Instantiate the User Class
$user = new User();