<?php
include("includes/header.php");
include("includes/photo_library_modal.php");

// If user is not signed in, the redirect to login page
if (!$session->is_signed_in()) {
    redirect("login.php");
}

$message = "";

if (empty($_GET['id'])) {
    redirect("users.php");
} else {

    $user = User::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {
        if ($user) {
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

            if (empty($_FILES['user_image'])) {
                $user->save();
            } else {
                $user->set_file($_FILES['user_image']);
                $user->upload_photo();

                if ($user->save()) {
                    $message = "User updated successfully!";
                } else {
                    $message = join("<br>", $user->errors);
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
                <div class="col-md-6">
                    <?php echo $message; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->password; ?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user->first_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="file_upload">User Photo</label>
                            <input type="file" id="file_upload" class="form-control" name="user_image">
                        </div>
                        <a id="user-id" href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger pull-left">Delete</a>
                        <button type="submit" name="update" class="btn btn-primary pull-right">Update</button>
                    </form>
                </div>
                <div class="col-md-6 user-image-box">
                    <div class="form-group">
                        <a href="#" data-toggle="modal" data-target="#photo-library">
                            <img src="<?php echo $user->user_photo(); ?>" alt="" class="img-responsive img-thumbnail" width="200" height="200">
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>