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

}

$photo = new Photo();