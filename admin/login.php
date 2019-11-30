<?php
require_once("includes/header.php");

// Check first the user is signed in or not. If signed in then redirect to index page of admin area
if ($session->is_signed_in()) {
    redirect("index.php");
}

// Check the username and password field value
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Make the method to verify the user
    $user_found = User::verify_user($username, $password);

    // Make the method to check user database
    if ($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your username or password are not correct.";
    }
} else {
    $the_message = "";
    $username = "";
    $password = "";
}


?>

<div class="col-md-4 col-md-offset-3">
    <h4 class="bg-danger"><?php echo $the_message; ?></h4>
    <form id="login_id" action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>