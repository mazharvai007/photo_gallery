<?php

// Make autoload function to check class is exist?
function classAutoLoader($class) {
    $the_class = strtolower($class);
    $the_path = "includes/{$the_class}.php";

    if (is_file($the_path) && !class_exists($class)) {
        include $the_path;
    }

    if (file_exists($the_path)) {
        require_once($the_path);
    } else {
        die("This file name {$the_class}.php was not found!");
    }
}

// Any number of autoloader register the function
spl_autoload_register('classAutoLoader');

// Make Redirect function
function redirect($location) {
    header("Location: {$location}");
}