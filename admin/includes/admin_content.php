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
//            $user->username = "karim";
//            $user->password = "123";
//            $user->first_name = "Muhammad";
//            $user->last_name = "Karim";
//            $user->create();

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

            
            // Insert data in the photos table
//            $photo->photo_title = "One morning, when Gregor Samsa woke from troubled dreams";
//            $photo->photo_des = "One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment.";
//            $photo->photo_filename = "image.jpg";
//            $photo->photo_type = "jpg";
//            $photo->photo_size = "15";
//            $photo->create();

            // Find data from the photos table
//            $photos = Photo::find_all();
//            foreach ($photos as $photo) {
//                echo $photo->photo_id, "<br>";
//                echo $photo->photo_title, "<br>";
//                echo $photo->photo_des, "<br>";
//                echo $photo->photo_filename, "<br>";
//                echo $photo->photo_type, "<br>";
//                echo $photo->photo_size, "<br>";
//                echo "<br>";
//            }

//            echo INCLUDES_PATH;

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