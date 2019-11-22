<?php

//Inherit the class
class User extends DB_Object
{
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    // Make the method to verify the user
    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $user_query = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        $the_result_array = self::find_this_query($user_query);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    // Make properties method for re-using
    protected function properties()
    {
        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    protected function clean_properties()
    {
        global $database;
        $property_clean = array();
        foreach ($this->properties() as $key => $value) {
            $property_clean[$key] = $database->escape_string($value);
        }

        return $property_clean;
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

        /*
         * Call the properties method
         * remove users existing key
         * call the properties variable inside the array_key
         * inside the implode function to separated the values(keys) by comma
         * And use array_values method to get the values from the table
         */
        $properties = $this->clean_properties();

        $create_sql = "INSERT INTO " . self::$db_table . "(" . implode(", ", array_keys($properties)) . ") VALUES('" . implode("','", array_values($properties)) . "') ";

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

        $properties = $this->clean_properties();
        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $update_sql = "UPDATE " . self::$db_table . " SET ";
        $update_sql .= implode(", ", $properties_pairs);
        $update_sql .= " WHERE user_id= " . $database->escape_string($this->user_id);

        $database->query($update_sql);

        return (mysqli_affected_rows($database->connect) == 1) ? true : false;
    }

    // Make delete method (The part of CRUD)
    public function delete()
    {
        global $database;
        $delete_sql = "DELETE FROM " . self::$db_table . " ";
        $delete_sql .= "WHERE user_id=" . $database->escape_string($this->user_id);
        $delete_sql .= " LIMIT 1";

        $database->query($delete_sql);

        return (mysqli_affected_rows($database->connect) == 1) ? true : false;
    }
}

// Instantiate the User Class
$user = new User();