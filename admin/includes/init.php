<?php

// Making Directory Path
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("DS") ? null : define('SITE_ROOT', DS.'e'. DS.'MAMP'.DS.'htdocs'.DS.'photo_gallery');
defined("INCLUDES_PATH") ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

// Files added
require_once("functions.php");
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");