<?php

// Get File Path
echo __FILE__ . "<br>";

// Get Line
echo __LINE__ . "<br>";

// Get Directory
echo __DIR__ . "<br>";

if (file_exists(__DIR__)) {
    echo "Yes" . "<br>";
}
if (file_exists(__FILE__)) {
    echo "Yes" . "<br>";
}

if (is_file(__DIR__)) {
    echo "Yes" . "<br>";
} else {
    echo "No <br>";
}
if (is_file(__FILE__)) {
    echo "Yes" . "<br>";
} else {
    echo "No <br>";
}

if (is_dir(__DIR__)) {
    echo "Yes <br>";
} else {
    echo "No <br>";
}
if (is_dir(__FILE__)) {
    echo "Yes <br>";
} else {
    echo "No <br>";
}

echo file_exists(__FILE__) ? "Yes" : "No";