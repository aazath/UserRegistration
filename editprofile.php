<?php
session_start();

include_once('includes/db.php');
include_once('includes/utility.php');

$title = "Edit Profile | UBT Login System";
include_once 'includes/layouts/header.php';

$db = new Database();
$utility = new Utility();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    //fetch user details from the database
    $results = $db->getUser($username);


    //assign variable inorder to store datas from databse 
    foreach ($results as $user) {
        $id_db = $user->id;
        $name_db = $user->name;
        $uname_db = $user->username;
        $email_db = $user->email;
        $encryptedPassword = $user->password;
        $password_db = md5($encryptedPassword);
        $contact_db = $user->contact;
    }
?>
    
    <div class="container bg-light">
        <div class="row justify-content-center">
            <div class="col px-0">
                <div class="hai-editProfile">
                    <h2 class="text-center p-4 bg-hai text-black"><i class="fas fa-user-edit"></i> Update User Profile</h2>
                </div>
                <a href="index.php" class="btn btn-outline-primary mx-3 mb-3 backBtn"><i class="fas fa-arrow-circle-left"></i> Back to Home</a>

                <div class="alertMessage mx-3" id="alertMessage"></div>
                <!-- Update Form start here******************************************************************************** -->
                <form class="px-3 pt-3" method="post" name="userProfileUpdateForm" id="userProfileUpdateForm" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" id="id" value="<?= $id_db ?>">
                    <div class="mb-4">
                        <div class="row hai-parent">
                            <div class="col-md-6">
                                <label for="name_n">Name: </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="name_n"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="name_n" id="name_n" placeholder="Your Name" value="<?= $name_db ?>" aria-label="name_n" aria-describedby="name_n" required>
                                    <div class="invalid-feedback">
                                        Name is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                    <div class="row hai-parent">
                            <div class="col-md-6">
                                <label for="uname_n">Username: </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="uname_n"><i class="fas fa-user-shield"></i></span>
                                    <input type="text" class="form-control" name="uname_n" id="uname_n" placeholder="Username" value="<?= $uname_db ?>" aria-label="uname_n" aria-describedby="uname_n" required>
                                    <div class="invalid-feedback">
                                        Username is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="pass_n">Password: </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="pass_n"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" name="pass_n" id="pass_n" placeholder="Password" value="" aria-label="pass_n" aria-describedby="pass_n" required>
                                    <div class="invalid-feedback">
                                        Password is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="cpass_n">Confirm Password: </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="cpass_n"><i class="fas fa-clipboard-check"></i></span>
                                    <input type="password" class="form-control" name="cpass_n" id="cpass_n" placeholder="Confirm Password" value="" aria-label="cpass_n" aria-describedby="cpass_n" required>
                                    <div class="invalid-feedback">
                                        Confirm Password is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email_n">Email: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="email_n"><i class="fas fa-at"></i></span>
                            <input type="email" class="form-control" name="email_n" id="email_n" placeholder="Your Email" value="<?= $email_db ?>" aria-label="email_n" aria-describedby="email_n" required>
                            <div class="invalid-feedback">
                                Email is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="contact_n">Contact: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="contact_n"><i class="fas fa-at"></i></span>
                            <input type="contact" class="form-control" name="contact_n" id="contact_n" placeholder="Your Contact" value="<?= $contact_db ?>" aria-label="contact_n" aria-describedby="contact_n" required>
                            <div class="invalid-feedback">
                                Contact is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="update_profile" id="update_profile"><i class="fas fa-sync"></i> Update Profile</button>
                    </div>
                </form>
                <!-- Update Form end here************************************************* -->
            </div>
        </div>
    </div>


<?php
    $updated = $db->updateUser($id_db, $name_db, $uname_db, $password_db,$email_db, $contact_db);
    if ($updated) {
        $_SESSION['message'] = "Record has been updates";
    }
    $script = "<script src=\"assets/js/update.js\"></script>";
} else { //if username not set and if user try to access this page directly via url redirect to login page
    header('Location: login.php');
    exit();
}
?>