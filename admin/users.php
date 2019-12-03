<?php
include("includes/header.php");

// If user is not signed in, the redirect to login page
if (!$session->is_signed_in()) {
    redirect("login.php");
}

// Find all photos
$users = User::find_all();
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
                    Welcome to Users
                    <small>Admin</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Users
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
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th><?php echo $user->id; ?></th>
                                <th><img width="100" height="100" src="<?php echo $user->user_photo(); ?>" alt="" class="img-responsive img-thumbnail"></th>
                                <th><?php echo $user->username; ?></th>
                                <th><?php echo $user->first_name; ?></th>
                                <th><?php echo $user->last_name; ?></th>
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
