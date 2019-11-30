<?php
    include("includes/header.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    if (isset($_POST['update'])) {
        echo "Update";
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
                            Welcome to Photos
                            <small>Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Photos
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-8">
                        <form action="edit_photo.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="caption" name="caption" placeholder="Caption">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="altText" name="altText" placeholder="Alternate Text">
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" id="file_upload" class="form-control" name="file_upload">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <div class="col-md-4" >
                        <div  class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                    </p>
                                    <p class="text ">
                                        Photo Id: <span class="data photo_id_box">34</span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data">image.jpg</span>
                                    </p>
                                    <p class="text">
                                        File Type: <span class="data">JPG</span>
                                    </p>
                                    <p class="text">
                                        File Size: <span class="data">3245345</span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <form action="edit_photo.php" method="post" enctype="multipart/form-data">
                                        <div class="info-box-delete pull-left">
                                            <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>