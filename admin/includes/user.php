<?php

//Inherit the class
class User extends DB_Object
{

    // Make the method to verify the user
    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $user_query = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        $the_result_array = self::find_by_query($user_query);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
}

// Instantiate the User Class
$user = new User();