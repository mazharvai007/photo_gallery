<?php

class User
{
    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

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

    // Query method
    public static function find_this_query($sql) {
        global $database;
        $result = $database->query($sql);
        return $result;
    }

    // Instantiate method
    public static function instantiation($the_record) {
        $the_object = new self();

//        $the_object->user_id = $found_user['user_id'];
//        $the_object->username = $found_user['username'];
//        $the_object->password = $found_user['password'];
//        $the_object->first_name = $found_user['first_name'];
//        $the_object->last_name = $found_user['last_name'];

        /*
         * Using foreach loop to get users data to short way
         */

        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->the_attribute = $value;
            }
        }

        return $the_object;
    }
}

// Instantiate the User Class
$user = new User();