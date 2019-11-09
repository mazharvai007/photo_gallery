<?php

class User
{
    // Find all users
    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM users");
    }

    // Find user by ID
    public static function find_user_by_id($user_id) {
        $result = self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result);
        return $found_user;
    }

    public static function find_this_query($sql) {
        global $database;
        $result = $database->query($sql);
        return $result;
    }
}

// Instantiate the User Class
$user = new User();