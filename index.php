<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
        <a href="index.php" class="navbar-brand">SMS</a>

            <ul class="navbar-nav mr-auto">
                
                <li><a href="admin/login.php" class="nav-link btn btn-primary"> Login Admin</a></li>
                
            </ul>
        </div>
       
    </nav>
    <div class="container text-center my-5">
        
        <h1>Welcome to Students Management System</h1>
    
        <div class="card mb-3 mt-5">
            <img src="assets/img/home1.png" class="card-img-top img-fluid " alt="...">
            <div class="card-body">
                <h5 class="card-title">Student Info</h5>
                <form class="w-50 mx-auto" method="POST">
                    <div class="row mb-3">
                        <label for="choose-class" class="col-sm-4 col-form-label">Choose Class</label>
                        <div class="col-sm-8 col-auto">
                        
                            <select class="form-select" id="choose" name="choose">
                            <option selected>Choose...</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="roll" class="col-sm-4 col-form-label">Roll</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="roll" name="roll">
                        </div>
                    </div>
                    <input type="submit" name="show" class="btn btn-primary" Value="Show Info">
                </form>
            </div>
        </div>

    </div>
        
    <?php
        require_once "admin/dbcon.php";
        if(isset($_POST['show'])){
            $choose = $_POST['choose'];
            $roll = $_POST['roll'];

            $result = $conn->query("SELECT * FROM student_info WHERE class='$choose' AND roll='$roll'");
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                
                ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <table class="table table-striped table-bordered ">
                    <tr>
                        <td rowspan="5">
                            <img src="admin/student_images/<?= $row['photo']; ?>" class="img-thumbnail" style="width:150px" alt="">
                        </td>
                        <td>Name</td>
                        <td><?= ucwords($row['name']); ?></td>
                    </tr>

                    <tr>
                       
                        <td>Roll</td>
                        <td><?= $row['roll']; ?></td>
                    </tr>

                    <tr>
                        
                        <td>Class</td>
                        <td><?= $row['class']; ?></td>
                    </tr>

                    <tr>
                        
                        <td>City</td>
                        <td><?= ucwords($row['city']); ?></td>
                    </tr>

                    <tr>
                        
                        <td>Parent Contact</td>
                        <td><?= $row['pcontact']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
                <?php

            }else{

                ?>
                    <script>
                        alert('Data Not Found');
                    </script>
                <?php
                
            }


            
        }
        ?>

    
<br>
    <?php require_once "admin/partial/footer.php";  ?>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>