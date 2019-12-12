<?php
    include("includes/init.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("photos.php");
    }

    $photo = Photo::find_by_id($_GET['id']);

    if ($photo) {
        $photo->delete_photo();
        $session->message("The comment with {$photo->id} has been deleted");
        redirect("photos.php");
    } else {
        redirect("photos.php");
    }
?>