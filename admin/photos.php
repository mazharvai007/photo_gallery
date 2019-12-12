<?php
    include("includes/header.php");

    // If user is not signed in, the redirect to login page
    if (!$session->is_signed_in()) {
        redirect("login.php");
    }

    // Find all photos
    $photos = Photo::find_all();
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
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Caption</th>
                                        <th>Description</th>
                                        <th>File Name</th>
                                        <th>AltText</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($photos as $photo) : ?>
                                    <tr>
                                        <td><?php echo $photo->id; ?></td>
                                        <td>
                                            <img src="<?php echo $photo->image_path(); ?>" alt="" class="img-responsive img-thumbnail">
                                            <p></p>
                                            <div class="action_links btn-group">
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>" class="btn btn-primary">View</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-info">Edit</a>
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->photo_title; ?></td>
                                        <td><?php echo $photo->photo_caption; ?></td>
                                        <td><?php echo $photo->photo_des; ?></td>
                                        <td><?php echo $photo->photo_filename; ?></td>
                                        <td><?php echo $photo->photo_altText; ?></td>
                                        <td><?php echo $photo->photo_type; ?></td>
                                        <td><?php echo $photo->photo_size; ?></td>
                                        <td>
                                            <?php
                                                $comments = Comment::find_the_comment($photo->id);
                                                echo count($comments);
                                            ?>
                                            <br>
                                            <a href="comments_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-primary">View</a>
                                        </td>
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