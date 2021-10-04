<?php
require_once "dbcon.php";
session_start();

if(!isset($_SESSION['user_login'])){
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awseome/css/all.css">
    
</head>
<body>
    <!-- Navbar Start -->
    <?php require_once "partial/header.php"; ?>
     <!-- Navbar End -->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active fas fa-tachometer-alt bg-success" aria-current="true">
                    Dashboard
                    </a>
                    <a href="index.php?page=add-student" class="list-group-item list-group-item-action fas fa-user-plus"> Add Student</a>

                    <a href="index.php?page=all-student" class="list-group-item list-group-item-action fas fa-user"> All Student</a>

                    <a href="index.php?page=all-users" class="list-group-item list-group-item-action fas fa-user"> All Users</a>
                    
                </div>
            </div>
            <div class="col-sm-9">
                <div class="contant">
                   <?php 
                        if(isset($_GET['page'])){
                            $page= $_GET['page'].'.php';
                        }else{
                            $page= "dashboard.php";
                        }

                        if(file_exists($page)){
                            require_once $page;
                        }else{
                            require_once "404.php";
                        }
                   ?> 
                </div>

                
            </div>
        </div>
    </div>
<!-- Footer Start -->
<?php require_once "partial/footer.php";  ?>

<!-- Footer End -->













    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.5.1.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    
</body>
</html>