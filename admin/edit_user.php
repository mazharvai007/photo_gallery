<?php
include("includes/header.php");

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
//        $user->username = $_POST['username'];
//        $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->set_file($_FILES['user_image']);

            if ($user->save()) {
                $message = "User updated successfully!";
            } else {
                $message = join("<br>", $user->errors);
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
                    <div class="col-md-4">
<!--                        <div class="form-group">-->
<!--                            <label for="username">Username</label>-->
<!--                            <input type="text" class="form-control" id="username" name="username">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="password">Password</label>-->
<!--                            <input type="password" class="form-control" id="password" name="password">-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="file_upload">User Photo</label>
                            <input type="file" id="file_upload" class="form-control" name="user_image">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>