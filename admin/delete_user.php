<?php
    include("includes/init.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("users.php");
    }

    $user = User::find_by_id($_GET['id']);

    if ($user) {
        $session->message("The {$user->username} has been deleted");
        $user->delete_user_photo();
        redirect("users.php");
    } else {
        redirect("users.php");
    }
?>