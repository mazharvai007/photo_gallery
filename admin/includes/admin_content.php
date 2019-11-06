<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to Dashboard
                <small>Admin</small>
            </h1>

            <?php
                /*
                 * Make a variable for DB query
                 * Test to the Database class query method
                 * Fetch the mysqli query as array
                 */
                $sql = "SELECT * FROM users WHERE user_id = 1";
                $result = $database->query($sql);
                $user_found = mysqli_fetch_array($result);

                echo $user_found['username'];
            ?>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->