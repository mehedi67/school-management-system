<h1 class="text-success fas fa-user">  Users Profile</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard" class="text-decoration-none">Dashboard</a></li>

    <li class="breadcrumb-item active " aria-current="page"> Profile</li>
  </ol>
<?php

$session_user=  $_SESSION['user_login'];

$user_data = "SELECT * FROM users where username='$session_user'";

$result = $conn->query($user_data);

$row = $result->fetch_assoc();






?>
  <div class="row">
    <div class="col-sm-6">
        <table class="table table-striped">
            <tr>
                <td>User ID</td>
                <td><?php echo $row['id'];  ?></td>
            </tr>

            <tr>
                <td>Name</td>
                <td><?php echo ucwords($row['name']);  ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $row['username'];  ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['email'];  ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo ucwords($row['status']);  ?></td>
            </tr>
            <!-- <tr>
                <td>Sign up Date</td>
                <td><?php //echo $row['datetime'];  ?></td>
            </tr> -->
        </table>
        <a href="index.php?page=update-profile" class="btn btn-primary d-table text-end btn-sm">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="">
        <img src="images/<?php echo $row['photo']; ?>" style="width:250px" alt="">
        </a>

    </div>
  </div>