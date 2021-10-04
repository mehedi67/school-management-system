<?php
require_once "dbcon.php";
session_start();
if(isset($_SESSION['user_login'])){
    header('location: index.php');
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($username_check);
    if($result->num_rows>0){

        $row = $result->fetch_assoc();
        if($row['password']== md5($password)){
           
            if($row['status'] == 'active'){
                $_SESSION['user_login'] = $username;
                
                header('location: index.php');

            }else{
                $status_inactive = "Your Status Inactive";
            }
            

        }else{
            $wrong_password = " Password is wrong";
        }

    }else{
        $username_not_found = "User Name Not Found";
    }

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
</head>
<body>

<div class="card shadow w-50 mx-auto my-5">
    <div class="card-head text-center">
        <h1>School Management System</h1>
        <h2>Admin Login</h2>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-3">
        <div class="card-body ">
        <form action="" class="mb-3" method="post">

            <div class="mb-4">
                <input class="form-control w-75" type="text" name="username" required placeholder="username" value="<?php if(isset($username)) echo $username ?>">  
            </div>

            <div class="mb-4">
                <input class="form-control w-75" type="password" name="password" required  placeholder="password" value="<?php if(isset($password)) echo $password ?>">
            </div>
            <input class="btn btn-sm btn-primary" type="submit" value="Login" name="login">
        </form>
    </div>
        </div>
    </div>
    <div class="card-footer">
    <?php if(isset($username_not_found)){echo '<div class="alert alert-danger">'.$username_not_found.'</div>'; } ?>

    <?php if(isset($wrong_password)){echo '<div class="alert alert-danger">'.$wrong_password.'</div>'; } ?>

    <?php if(isset($status_inactive)){echo '<div class="alert alert-danger">'.$status_inactive.'</div>'; } ?>
   
        
    </div>
</div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>