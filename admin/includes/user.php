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
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    // Query method
    public static function find_this_query($sql) {
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result)) {
            $the_object_array[] = self::instantiation($row);
        }

        return $the_object_array;
    }

    // Make the method to verify the user
    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $user_query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        $the_result_array = self::find_this_query($user_query);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

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
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    // Make the attribute finder method
    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    // Improved the user create and update method by the save method
    public function save()
    {
        return isset($this->user_id) ? $this->update() : $this->create();
    }

    // Make create method (The part of CRUD)
    public function create()
    {
        global $database;
        $create_sql = "INSERT INTO users (username, password, first_name, last_name) ";
        $create_sql .= "VALUES('";
        $create_sql .= $database->escape_string($this->username) . "', '";
        $create_sql .= $database->escape_string($this->password) . "', '";
        $create_sql .= $database->escape_string($this->first_name) . "', '";
        $create_sql .= $database->escape_string($this->last_name) . "')";

        if($database->query($create_sql)) {
            $this->user_id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }

    // Make update method (The part of CRUD)
    public function update()
    {
        global $database;
        $update_sql = "UPDATE users SET ";
        $update_sql .= "username= '" . $database->escape_string($this->username) . "', ";
        $update_sql .= "password= '" . $database->escape_string($this->password) . "', ";
        $update_sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
        $update_sql .= "last_name= '" . $database->escape_string($this->last_name) . "' ";
        $update_sql .= " WHERE user_id= " . $database->escape_string($this->user_id);

        $database->query($update_sql);

        return (mysqli_affected_rows($database->connect) == 1) ? true : false;
    }

    // Make delete method (The part of CRUD)
    public function delete()
    {
        global $database;
        $delete_sql = "DELETE FROM users ";
        $delete_sql .= "WHERE user_id=" . $database->escape_string($this->user_id);
        $delete_sql .= " LIMIT 1";

        $database->query($delete_sql);

        return (mysqli_affected_rows($database->connect) == 1) ? true : false;
    }
}

// Instantiate the User Class
$user = new User();