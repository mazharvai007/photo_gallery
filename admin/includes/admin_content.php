<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to Dashboard
                <small>Admin</small>
            </h1>

            <?php

            // Find Users
//            $users = User::find_all();
//            foreach ($users as $user) {
//                echo $user->username, '<br>';
//                echo $user->password, '<br>';
//                echo $user->first_name, '<br>';
//                echo $user->last_name, '<br>';
//                echo "<br>";
//            }

            // Create new user
            $user->username = "karim";
            $user->password = "123";
            $user->first_name = "Muhammad";
            $user->last_name = "Karim";
            $user->create();

            // Update user
//            $user = User::find_by_id(4);
//            $user->username = "jamal";
//            $user->password = "123";
//            $user->first_name = "Muhammad";
//            $user->last_name = "Jamal";
//            $user->update();

            // Delete User
//            $user = User::find_by_id(4);
//            $user->delete();

            // Create user
//            $user->username = "abdullah";
//            $user->save();

            // Update user
//            $user = User::find_by_id(4);
//            $user->password = '123';
//            $user->first_name = "Ahmed";
//            $user->last_name = "Abdullah";
//            $user->save();

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