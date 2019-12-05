<?php

//Inherit the class
class User extends DB_Object
{
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;

    public $upload_directory = "images";
    public $image_placeholder = "http://lorempixel.com/400/200/";

    public function user_photo()
    {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }

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

    /*
     * Make delete method
     *
     * It will make three things
     * 1. Delete from Database
     * 2. Delete from table of admin
     * 3. Delete file from server/directory
     */
    public function delete_user()
    {
        if ($this->delete()) {
            $target_path = SITE_ROOT.DS.'admin'.DS.$this->user_photo();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }
}

// Instantiate the User Class
$user = new User();