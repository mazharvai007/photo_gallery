<?php
include("includes/header.php");

// If user is not signed in, the redirect to login page
if (!$session->is_signed_in()) {
    redirect("login.php");
}

// Find all comments
$comments = Comment::find_all();
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <?php include ("includes/top_nav.php"); ?>
            <?php include ("includes/side_nav.php"); ?>


        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Comments
                            <small>admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Comments
                            </li>
                        </ol>
                        <p class="bg-success"><?php echo $session->message; ?></p>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Autor</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($comments as $comment) : ?>
                                    <tr>
                                        <td><?php echo $comment->id; ?></td>
                                        <td>
                                            <?php echo $comment->author; ?>
                                            <p></p>
                                            <div class="btn-group">
                                                <a href="delete_comment.php?id=<?php echo $comment->id; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                        <td><?php echo $comment->comment_body; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>