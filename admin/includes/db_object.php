<?php

class DB_Object
{

    // Find all users
    public static function find_all() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
    }

    // Find user by ID
    public static function find_by_id($id) {
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    // Query method
    public static function find_by_query($sql) {
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result)) {
            $the_object_array[] = static::instantiation($row);
        }

        return $the_object_array;
    }

    // Instantiate method
    public static function instantiation($the_record) {
        $calling_class = get_called_class();

        $the_object = new $calling_class;

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

    // Make properties method for re-using
    protected function properties()
    {
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
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
        return isset($this->id) ? $this->update() : $this->create();
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

        $create_sql = "INSERT INTO " . static::$db_table . "(" . implode(", ", array_keys($properties)) . ") VALUES('" . implode("','", array_values($properties)) . "') ";

        if($database->query($create_sql)) {
            $this->id = $database->the_insert_id();
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

        $update_sql = "UPDATE " . static::$db_table . " SET ";
        $update_sql .= implode(", ", $properties_pairs);
        $update_sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($update_sql);

        return (mysqli_affected_rows($database->connect) == 1) ? true : false;
    }

    // Make delete method (The part of CRUD)
    public function delete()
    {
        global $database;
        $delete_sql = "DELETE FROM " . static::$db_table . " ";
        $delete_sql .= "WHERE id=" . $database->escape_string($this->id);
        $delete_sql .= " LIMIT 1";

        $database->query($delete_sql);

        return (mysqli_affected_rows($database->connect) == 1) ? true : false;
    }
}


$db_object = new DB_Object();