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
//                $result = User::find_all_users();
//                while ($row = mysqli_fetch_array($result)) {
//                    echo $row['username'] . "<br>";
//                }

                // Found User by id using array assigning to object properties
                $found_user = User::find_user_by_id(2);
                $user->user_id = $found_user['user_id'];
                $user->username = $found_user['username'];
                $user->password = $found_user['password'];
                $user->first_name = $found_user['first_name'];
                $user->last_name = $found_user['last_name'];

                echo "User ID: " . $user->user_id . "<br>";
                echo "Username: " . $user->username . "<br>";
                echo "Password: " . $user->password . "<br>";
                echo "First Name: " . $user->first_name . "<br>";
                echo "Last Name: " . $user->last_name . "<br>";
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