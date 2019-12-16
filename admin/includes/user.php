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

    public $image_placeholder = "http://lorempixel.com/400/200/";
    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The Upload file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the max_file_size directive that was specified in the HTML",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file uploaded."
    );

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

    /*
     * SET File Method
     * This is passing $_FILES['upload_file'] as an argument
     */

    public function set_file($file)
    {

        /*
         * Check the file is empty or not file or not array
         * If not upload the file, then throwing error.
         */
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
        }

    }

    /*
     * Make save method
     *
     * If photo id is available, then update the photos table.
     * If not, then insert data in the photos table of database
     */
    public function upload_photo()
    {

        if (!empty($this->errors)) {
            return false;
        } elseif (empty($this->user_image) || empty($this->tmp_path)) {
            $this->errors[] = "The file was not available";
            return false;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

        /*
         * Check the uploaded file is exists in the targeted path then return false
         * If not exist then upload the file
         * Sometimes for the permission reason the file does not upload, then throwing the else blog message.
         */
        if (file_exists($target_path)) {
            $this->errors[] = "The file {$this->user_image} already exists.";
            return false;
        } elseif (move_uploaded_file($this->tmp_path, $target_path)) {
            // If upload file and create then unset the temporary path
            unset($this->tmp_path);
            return true;
        } else {
            $this->errors[] = "The file directory probably does not have permission.";
            return false;
        }
    }

    // User image save using AJAX
    public function ajax_save_user_image($user_image, $user_id)
    {
        $this->user_image = $user_image;
        $this->id = $user_id;

        $this->save();
    }
}

// Instantiate the User Class
$user = new User();