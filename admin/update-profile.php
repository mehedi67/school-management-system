<h1 class="text-primary fas fa-user-edit"> Update Profile </h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard" class="text-decoration-none">Dashboard</a></li>

    <li class="breadcrumb-item active " aria-current="page">Update Profile</li>
  </ol>
</nav>
<?php
  $session_user=  $_SESSION['user_login'];

  $user_data = "SELECT * FROM users where username='$session_user'";
  
  $result = $conn->query($user_data);
  
  $row = $result->fetch_assoc();
  
  
  
  ?>
     <div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" name="name" placeholder="Student Name" class="form-control" id="name" required value="<?= ucwords($row['name'])?>">
        </div>

        <div class="form-group mb-3">
            <label for="roll" class="form-label">Student Roll</label>
            <input type="text" name="roll" placeholder="Roll" class="form-control" id="roll" pattern="[0-9]{6}" required value="<?= $row['roll']?>">
        </div>

        <div class="form-group mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" placeholder="City" class="form-control" id="city" required value="<?= ucwords($row['city'])?>">
        </div>

        <div class="form-group mb-3">
            <label for="pcontact" class="form-label">Parent Contact</label>
            <input required type="text" name="pcontact" placeholder="Parent Contact" class="form-control" id="pcontact" pattern="01[1|5|6|7|8][0-9]{8}" value="<?= $row['pcontact']?>">
        </div>
        <div class="form-group mb-3">
            <input class="btn btn-success" type="submit" value="Update Student" name="update-student">
        </div>
        
        </form>
    </div>
</div>