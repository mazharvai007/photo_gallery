<?php
    include("includes/init.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("comments.php");
    }

    $comment = Comment::find_by_id($_GET['id']);

    if ($comment) {
        $comment->delete();
        $session->message("The comment with {$comment->id} has been deleted");
        redirect("comments.php");
    } else {
        redirect("comments.php");
    }
?>