<?php
    include("includes/header.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    $message = "";
    if (isset($_FILES['file'])) {
        $photo->user_id = $_SESSION['id'];
        $photo->photo_title = $_POST['title'];
        $photo->photo_des = $_POST['description'];
        $photo->set_file($_FILES['file']);
        $photo->upload_photo();

        if ($photo->save()) {
            $message = "<p class='alert-success'>Photo has been uploaded!</p>";
        } else {
            $message = join("<br>", $photo->errors);
        }
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
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <?php echo $message; ?>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="file" multiple>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="upload.php" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>