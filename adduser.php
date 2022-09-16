<?php
    // //database connection
    include_once("/Users/apple/Sites/UserRegistration/includes/db.php");
    
    
    $db = new Database();
    // // Error & success messages
    // global $success_msg, $email_exist, $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5;
    
    if(isset($_POST["submit"])) {
        $name         = $_POST["name"];
        $username     = $_POST["username"];
        $password     = md5($_POST["password"]);
        $email        = $_POST["email"];
        $contact      = $_POST["contact"];

        // PHP validation
        if(!empty($name) && !empty($username) && !empty($password) && !empty($email) && !empty($contact)){
            
            // check if user email already exist
            $isAvailable    = $db->isEmailAvailable($email);
            if($isAvailable) {
                
                echo  '<div class="alert alert-danger" role="alert">
                        User with email already exist!
                    </div>';
            } else {
                $isInsert = $db->insertUser($name, $username, $password, $email, $contact);
                if ($isInsert) {
                    print('User Registered Successfully');
                    header('Location: login.php');
                    exit();
            }
            else {
                if(empty($name)){
                    echo '<div class="alert alert-danger">
                        Name is required.
                    </div>';
                }
                if(empty($username)){
                    echo '<div class="alert alert-danger">
                        Username is required.
                    </div>';
                }
                if(empty($password)){
                    echo '<div class="alert alert-danger">
                        Password is required.
                    </div>';
                }
                if(empty($email)){
                    echo '<div class="alert alert-danger">
                        Email is required.
                    </div>';
                }
                if(empty($contact)){
                    echo '<div class="alert alert-danger">
                        Contact is required.
                    </div>';
                }            
        }
    }
        }}
?>