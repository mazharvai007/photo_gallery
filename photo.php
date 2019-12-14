<?php

include("includes/header.php");

if (empty($_GET['id'])) {
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);
$user = User::find_by_id($_GET['id']);

$message = "";
if (isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $comment_body = trim($_POST['comment_body']);

    $create_comment = Comment::create_comment($photo->id, $author, $comment_body);

    if ($create_comment && $create_comment->save()) {
        redirect("photo.php?id={$photo->id}");
    } else {
        $message = "The comment will not save.";
    }
} else {
    $author = "";
    $comment_body = "";
}

$find_comments = Comment::find_the_comment($photo->id);

?>

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->photo_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $user->first_name; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->image_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->photo_caption; ?></p>
                <p><?php echo $photo->photo_des; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <?php echo $message; ?>
                    <h4>Leave a Comment:</h4>
                    <form action="" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment_body">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_body"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                foreach ($find_comments as $comment) : ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->comment_body; ?>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <?php include("includes/sidebar.php"); ?>

            </div>

        </div>
        <!-- /.row -->

<?php include("includes/footer.php"); ?>
