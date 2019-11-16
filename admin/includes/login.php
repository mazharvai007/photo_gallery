<?php
// Initialize the init.php file
require_once("init.php");

// Check first the user is signed in or not. If signed in then redirect to index page of admin area
if ($session->is_signed_in()) {
    redirect("index.php");
}

// Check the username and password field value
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Make the method to verify the user
    $user_found = User::verify_user($username, $password);

    // Make the method to check user database
    if ($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your username or usernme are not correct.";
    }
} else {
    $username = "";
    $password = "";
}