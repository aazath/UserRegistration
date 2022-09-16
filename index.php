<?php
session_start();
$title = "Welcome | UBT Login System";
include_once 'includes/layouts/header.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
?>
    <!-- Nav bar start ============================================================= -->
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">UBT </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutUs.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactUs.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ProductInfo.php">Product Info</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> <?= $username ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="editProfile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="manageUsers.php">Manage Users</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php" id="logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Nav bar end ============================================================= -->

    <!-- Underline after navbar -->
    <div class="underline-div"></div>



    <!-- include body contents -->
<?php

    $pageHeading = 'Home';
    include_once 'includes/layouts/main.php';

    $script = "<script src=\"assets/js/index.js\"></script>";
    $footer = include_once 'includes/layouts/footer.php';
} else { //if username not set and if user try to access this page directly via url redirect to login page
    header('Location: login.php');
    exit();
}
?>