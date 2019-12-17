<?php
    include("includes/header.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    $message = "";

    if (empty($_GET['id'])) {
        redirect("photos.php");
    } else {
        $photo = Photo::find_by_id($_GET['id']);

        if (isset($_POST['update'])) {
            if ($photo) {
                $photo->photo_title = $_POST['title'];
                $photo->photo_caption = $_POST['caption'];
                $photo->photo_altText = $_POST['altText'];
                $photo->photo_des = $_POST['description'];

                if (empty($_FILES['file_upload'])) {
                    $photo->save();
                } else {
                    $photo->set_file($_FILES['file_upload']);
                    $photo->upload_photo();

                    if ($photo->save()) {
                        $message = "<p class='alert-success'>Photo has been uploaded!</p>";
                    } else {
                        $message = join("<br>", $photo->errors);
                    }
                }
            }
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
                    <?php echo $message; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $photo->photo_title; ?>">
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $photo->photo_caption; ?>">
                            </div>
                            <div class="form-group">
                                <label for="altText">Alternate Text</label>
                                <input type="text" class="form-control" id="altText" name="altText" value="<?php echo $photo->photo_altText; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo $photo->photo_des; ?></textarea>
                            </div>
                            <div class="form-group">
                                <a href="#"><img src="<?php echo $photo->image_path(); ?>" alt="<?php echo $photo->photo_altText; ?>" class="img-responsive img-thumbnail"></a><br><br>
                                <input type="file" id="file_upload" class="form-control" name="file_upload">
                            </div>
                        </div>

                        <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
<!--                                        <p class="text">-->
<!--                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26-->
<!--                                        </p>-->
                                        <p class="text ">
                                            Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                        </p>
                                        <p class="text">
                                            Filename: <span class="data"><?php echo $photo->photo_filename; ?></span>
                                        </p>
                                        <p class="text">
                                            File Type: <span class="data"><?php echo $photo->photo_type; ?></span>
                                        </p>
                                        <p class="text">
                                            File Size: <span class="data"><?php echo $photo->photo_size; ?></span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" id="update" name="update" value="Update" class="btn btn-primary btn-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>