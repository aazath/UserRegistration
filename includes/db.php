<!-- <?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","login_ubt");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?> -->

<?php

include 'config.php';

class Database {

    protected $dbName = DBNAME;
    protected $dbHost = DBHOST;
    protected $dbUser = DBUSER;
    protected $dbPass = DBPASS;

    private $conn;

    function __construct()
    {
        try{
            //data source network
            $dsn = "mysql:hostname={$this->dbHost};dbname={$this->dbName}";
            //connect PDO
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;

        }catch (PDOException $e){
            echo "Found error: " . $e->getMessage();
        }
    }


    //fetch method users table
    public function fetchUsersTbl()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        //fetch the results
        $resultsPost = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $resultsPost;
    }


    //insert new user into table
    public function insertUser($name, $username, $password, $email, $contact){
        $sql = "INSERT INTO users (name,username,password,email,contact) VALUES (:name, :uname, :password, :email, :contact)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'name' => $name, 
            'uname' => $username, 
            'password' => $password, 
            'email' => $email, 
            'contact' => $contact
        ]);

        return true;
    }


    //fetch users by username
    public function getUser($username){
        $sql = "SELECT * FROM users WHERE username = :user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user' => $username
            ]);

        if($stmt->rowCount() === 1){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else {
            return null;
        }
    }

    //login user
    public function logUser($username, $passHash){
        $sql = "SELECT * FROM users WHERE username =:user and password =:password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user'=>$username,
            'password'=>$passHash
        ]);
        $existUser = $stmt->rowCount();

        if($existUser > 0){
            return true;
        }else {
            return false;
        }
    }


    //Check existing user name
    public function checkExistingUsername($username){
        
        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);

        $existUser = $stmt->rowCount();

        if($existUser > 0){
            return false;
        }else {
            return true;
        }
    }

        //Check whether email is already registered
        public function isEmailAvailable($email){
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
    
            $existUser = $stmt->rowCount();
    
            if($existUser > 0){
                return true;
            }else {
                return false;
            }
        }


    //update user Profile
    public function updateUser($id, $name_un, $uname_un, $passHash, $email_un, $contact_un){
        $sql = "UPDATE users SET name = :name, username = :uname, password = :pass, email = :email, contact = :contact WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'name' => $name_un, 
            'uname' => $uname_un, 
            'pass' => $passHash, 
            'email' => $email_un, 
            'contact' => $contact_un
        ]);

        return true;
    }


    //delete user by id
    public function deleteUserById($id, $table){

        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        return true;
    }
    
}




















