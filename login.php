<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <!-- Boostrap stylesheet link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Our own stylesheet -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <?php
    include_once 'includes/db.php';
    session_start();

    $db = new Database();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        //$username = mysqli_real_escape_string($con, $username);
        $getpassword = stripslashes($_REQUEST['password']);
        $password = md5($getpassword);
        //$password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        // $query    = "SELECT * FROM `users` WHERE username='$username'
        //              AND password='" . md5($password) . "'";
        // $result = mysqli_query($con, $query) or die("Database Error");
        // $rows = mysqli_num_rows($result);

        $user = $db->logUser($username,$password);
        if ($user) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header('Location: index.php');
            exit();
        } else {
            echo "<div class='container-sm'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
    <div class="container-sm">
    <div class="contents p-4 my-5 mx-2 bg-light">
        <div class="row">
            <div class="col-md-6 image-div">
                <img src="assets/images/Designer-girl.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <div class="alertMessage" id="alertMessage"></div>
        <h2 class="hai-text my-2">Login</h2>
        
        <div class="alertMessage" id="alertMessage"></div>

        <form class="login-form" method="post" name="login">
            <div class="mb-4">  
                <label for="username">User Name:</label> 
                <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-shield"></i></span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Your Username" aria-label="Username" aria-describedby="basic-addon1" value="" required>
                <div class="invalid-feedback py-2">
                    Username is Required
                </div>    
            </div>
            </div>

            <div class="mb-4">
                        <label for="password">Password: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" aria-label="password" aria-describedby="basic-addon2" required>
                            <div class="invalid-feedback py-2">
                                Password is Required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" id="submitLoginBtn"><i class="fas fa-sign-in-alt"></i> Login Now</button>
                    </div>
                    <p>Don't have an account yet ? <a href="adduser.html">Register NOW!</a></p>
        </form>
    </div>
    <?php
    }
    ?>
</body>

</html>

<?php
    $script = "<script src=\"assets/js/login.js\"></script>";
?>