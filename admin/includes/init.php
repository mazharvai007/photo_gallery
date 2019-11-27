<?php

// Making Directory Path
define("DS", DIRECTORY_SEPARATOR);
define('SITE_ROOT', 'E:' . DS . 'MAMP' . DS . 'htdocs' . DS . 'photo_gallery');
defined("INCLUDES_PATH") ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

// Files added
require_once("functions.php");
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");