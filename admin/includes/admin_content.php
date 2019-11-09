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

                // Get the users
                $result = User::find_all_users();
                while ($row = mysqli_fetch_array($result)) {
                    echo $row['username'] . "<br>";
                }

                // Found User by id
                $found_user = User::find_user_by_id(2);
                echo $found_user['username'];
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