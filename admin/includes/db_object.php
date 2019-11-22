<?php

class DB_Object
{
    // Find all users
    public static function find_all() {
        return self::find_this_query("SELECT * FROM " . self::$db_table . " ");
    }

    // Find user by ID
    public static function find_by_id($user_id) {
        $the_result_array = self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE user_id = $user_id LIMIT 1");

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

    // Instantiate method
    public static function instantiation($the_record) {
        $the_object = new self();

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
}

$db_object = new DB_Object();