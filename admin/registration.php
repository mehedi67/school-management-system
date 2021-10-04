<?php
require_once "dbcon.php";
// session_start();
if(isset($_POST['registration'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    $photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.'.'.$photo;
   

   $input_error = array();

   if(empty($name)){
       $input_error['name'] = "The name field is required";
   }
   if(empty($email)){
        $input_error['email'] = "The emal field is required";
    }
    if(empty($password)){
        $input_error['password'] = "The password field is required";
    }
    if(empty($conpassword)){
        $input_error['conpassword'] = "The confirm password field is required";
    }

    if(count($input_error)==0){
        $email_check = " select * from users where email='$email'";
            $result = $conn->query($email_check);

            if ($result-> num_rows==0){


            $username_check = " select * from users where username='$username'";
            $result = $conn->query($username_check);

            if ($result-> num_rows==0){
                if(strlen($username) >7){
                   if(strlen($password) >7){
                    if($password == $conpassword){
                        $password = md5($password);
                        
                        $insert_query = "INSERT INTO users VALUES('NULL','$name','$email','$username','$password','$photo_name','inactive','NULL')";
                        $results = $conn->query($insert_query);
                        
                        if($results){
                            $_SESSION['data_insert_success'] = "Data Insert Success!";

                            move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                            header('locatio: registration.php');

                        }else{
                            $_SESSION['data_insert_error'] = "Data Insert Error";
                        }



                    }else{
                       $password_not_match = "Confirm Password Not Match";
                    }
                   }else{
                    $password_ln = "Password Should be More Than 8 Characters";
                   }
                }else{
                    $username_ln = "Username Should be More Than 8 Characters";
                }

            }else{
                $username_error = "This username Already Exit";
            }
                
            }else{
                $email_error= " This Email Address Already Exit";
            }
    
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
    <div class="card-header text-center">
        <h2>User Registration Form</h2>
        <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} unset($_SESSION['data_insert_success']);?>

        <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-danger">'.$_SESSION['data_insert_error'].'</div>';} unset($_SESSION['data_insert_error']);?>
        
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                        <label for="" class="text-danger fw-bold"><?php if(isset($input_error['name'])){echo $input_error['name'];}?></label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                        <label for="" class="text-danger fw-bold"><?php if(isset($input_error['email'])){echo $input_error['email'];}?></label>

                        <label for="" class="text-danger fw-bold"><?php if(isset($email_error)){echo $email_error;}?></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username">
                        <label for="" class="text-danger fw-bold"><?php if(isset($input_error['username'])){echo $input_error['username'];}?></label>

                        <label for="" class="text-danger fw-bold"><?php if(isset($username_error)){echo $username_error;}?></label>

                        <label for="" class="text-danger fw-bold"><?php if(isset($username_ln)){echo $username_ln;}?></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                        <label for="" class="text-danger fw-bold"><?php if(isset($input_error['password'])){echo $input_error['password'];}?></label>

                        <label for="" class="text-danger fw-bold"><?php if(isset($password_ln)){echo $password_ln;}?></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="conpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="conpassword" name="conpassword">
                        <label for="" class="text-danger fw-bold"><?php if(isset($input_error['conpassword'])){echo $input_error['conpassword'];}?></label>

                        <label for="" class="text-danger fw-bold"><?php if(isset($password_not_match)){echo $password_not_match;}?></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        
                        <div class="col-sm-10">
                        <input type="file" class="form-control" id="file" name="photo">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Registration" name="registration">
                    
                </form>
            </div>
        </div>
    </div>

</div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>