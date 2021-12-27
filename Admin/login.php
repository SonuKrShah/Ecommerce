<?php
// For connection to the database;
require_once('connection.inc.php');
require_once('functions.inc.php');
$msg = "";

if(isset($_SESSION['ADMIN_LOGIN'])){
    header("location:categories.php");
}
// Checking for post requests.
if (isset($_POST['submit'])) {
    // get_safe_value is a utitlity function to get a safe value to enter into the database.
    $username = get_safe_value($con, $_POST['username']);
    $password = get_safe_value($con, $_POST['password']);

    // SQL QUERY for logging in.
    $sql = "SELECT * FROM admin_users WHERE username='$username' and password='$password'";

    // Performing the query.
    $res = mysqli_query($con, $sql);

    // Checking if the user exists or not.
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        // Setting up the session and redirecting the admin to the admin panel.
        $_SESSION["ADMIN_LOGIN"] = 'yes';
        $_SESSION["ADMIN_USERNAME"] = $username;
        // Redirecting to the admin panel.
        header("location:categories.php");
        die();
    } else {
        // Error message.
        $msg = "Please enter the correct login details";
    }
}
?>

<!Doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form mt-150">
                    <!-- Add a design to the form just like in magento 2 -->
                    <form method="POST" action="login.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="field_error">
                            <?php
                            echo $msg;
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="assets/js/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>