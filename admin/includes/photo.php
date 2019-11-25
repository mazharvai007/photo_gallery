<?php


class Photo extends DB_Object
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('photo_title', 'photo_des', 'photo_filename', 'photo_type', 'photo_size');
    public $photo_id;
    public $photo_title;
    public $photo_des;
    public $photo_filename;
    public $photo_type;
    public $photo_size;

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

    /*
     * SET File Method
     * This is passing $_FILES['upload_file'] as an argument
     */

    public function set_file($file)
    {

        // Check the file is empty or not file or not array, and if not upload the file, then throwing error.
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            $this->photo_filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->photo_type = $file['type'];
            $this->photo_size = $file['size'];
        }

    }

}

$photo = new Photo();