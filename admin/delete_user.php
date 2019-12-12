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
        $user->delete_user();
        $session->message("The comment with {$user->username} has been deleted");
        redirect("users.php");
    } else {
        redirect("users.php");
    }
?>