<?php
    include("includes/header.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }
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
                            Welcome to Upload
                            <small>Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Upload
                            </li>
                        </ol>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        <form action=upload.php"" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <input type="file" id="file_upload" class="form-control" name="file_upload">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>