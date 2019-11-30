<?php
    ///home/mazhar/www/

// Making Directory Path
define("DS", DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'home' . DS . 'mazhar' . DS . 'www' . DS . 'practice' . DS . 'php' . DS . 'photo_gallery');
defined("INCLUDES_PATH") ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

// Files added
require_once("functions.php");
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");