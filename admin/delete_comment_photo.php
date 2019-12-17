<?php
    include("includes/init.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("comments_photo.php");
    }

    $comment = Comment::find_by_id($_GET['id']);

    if ($comment) {
        $comment->delete();
        $session->message("The comment id: {$comment->id} has been deleted!");
        redirect("comments_photo.php?id={$comment->photo_id}");
    } else {
        redirect("comments_photo.php?id={$comment->photo_id}");
    }
?>