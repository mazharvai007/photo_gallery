<?php

// Database Connection Constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '91221');
define('DB_NAME', 'photo_gallery');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

if ($connect) {
    echo "Connected!";
} else {
    echo "Not connected!";
}
