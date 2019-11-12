<?php

// Make autoload function to check class is exist?
function __autoload($class) {
    $the_class = strtolower($class);
    $the_path = "includes/{$the_class}.php";

    if (file_exists($the_path)) {
        require_once($the_path);
    } else {
        die("This file name {$the_class}.php was not found!");
    }
}