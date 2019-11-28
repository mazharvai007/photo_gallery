<?php
    include("includes/init.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    if (empty($_GET['photo_id'])) {
        redirect("../photos.php");
    }

    $photo = Photo::find_by_id($_GET['photo_id']);

    if ($photo) {
        $photo->delete_photo();
    } else {
        redirect("../photos.php");
    }
?>