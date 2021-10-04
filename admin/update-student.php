<h1 class="text-primary fas fa-user-edit"> Update Student </h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard" class="text-decoration-none">Dashboard</a></li>

    <li class="breadcrumb-item"><a href="index.php?page=all-student" class="text-decoration-none">All Student</a></li>

    <li class="breadcrumb-item active " aria-current="page">Update Student</li>
  </ol>
</nav>
<?php
    $id= base64_decode($_GET['id']);
    $upquery = "SELECT * FROM `student_info` WHERE `id`=$id";
    $result = $conn->query($upquery);
    $row = $result->fetch_assoc();

    if(isset($_POST['update-student'])){
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];

        $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id`='$id'";
        $update = $conn->query($query);
        if($upquery){
            header("location: index.php?page=all-student");
        }
   
    }
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
            <label for="class" class="form-label">Class</label>
            <select required name="class" id="class" class="form-select" value="<?= ucwords($row['name'])?>">
                <option value="">Select</option>
                <option <?php echo $row['class']=='1st' ?'selected=""':'';?> value="1st">1st</option>
                <option <?php echo $row['class']=='2nd' ?'selected=""':'';?> value="2nd">2nd</option>
                <option <?php echo $row['class']=='3rd' ?'selected=""':'';?> value="3rd">3rd</option>
                <option <?php echo $row['class']=='4th' ?'selected=""':'';?> value="4th">4th</option>
                <option <?php echo $row['class']=='5th' ?'selected=""':'';?> value="5th">5th</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <input class="btn btn-success" type="submit" value="Update Student" name="update-student">
        </div>
        
        </form>
    </div>
</div>