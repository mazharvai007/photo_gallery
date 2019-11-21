<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to Dashboard
                <small>Admin</small>
            </h1>

            <?php

                // Create new user
//                $user->username = "abdullah";
//                $user->password = "123";
//                $user->first_name = "Abdullah";
//                $user->last_name = "Mazhar";
//                $user->create();

                // Update user
                $user = User::find_user_by_id(6);
                $user->first_name = "Ahmed";
                $user->last_name = "Abdullah";
                $user->update();

            // Delete User
//            $user = User::find_user_by_id(4);
//            $user->delete();

            // Create user
//            $user->username = "abdullah";
//            $user->save();

            // Update user
//            $user = User::find_user_by_id(4);
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