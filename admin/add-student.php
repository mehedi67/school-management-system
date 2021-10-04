<h1 class="text-success fa fa-user-plus"> Add Student <small class="text-dark">Add New Student</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard" class="text-decoration-none">Dashboard</a></li>
    <li class="breadcrumb-item active " aria-current="page">Add Student</li>
  </ol>
</nav>
<?php
if(isset($_POST['add-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];


    $picture = explode('.',$_FILES['picture']['name']);
    $picture_ex = end($picture);

    $picture_name = $roll.'.'.$picture_ex;

    $addquery = "INSERT INTO student_info VALUES(NULL,'$name','$roll', '$class', '$city', '$pcontact','$picture_name',Null)";
   
    $result = $conn->query($addquery);
    if($result){
        $success = "Data Insert Success";
        move_uploaded_file($_FILES['picture']['tmp_name'],'student_images/'.$picture_name);
    }else{
        $error = "Wrong";
    }

    
}
?>
<?php if(isset($success)){echo '<p class="alert alert-success w-50">'.$success.'</p>';}  ?>

<?php if(isset($error)){echo '<p class="alert alert-danger w-50">'.$error.'</p>';}  ?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" name="name" placeholder="Student Name" class="form-control" id="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="roll" class="form-label">Student Roll</label>
            <input type="text" name="roll" placeholder="Roll" class="form-control" id="roll" required>
        </div>

        <div class="form-group mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" placeholder="City" class="form-control" id="city" required>
        </div>

        <div class="form-group mb-3">
            <label for="pcontact" class="form-label">Parent Contact</label>
            <input required type="text" name="pcontact" placeholder="Parent Contact" class="form-control" id="pcontact" >
        </div>

        <div class="form-group mb-3">
            <label for="class" class="form-label">Class</label>
            <select required name="class" id="class" class="form-select">
                <option value="">Select</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
                <option value="5th">5th</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input required type="file" name="picture" class="form-control" id="picture">
        </div>
        <div class="form-group mb-3">
            <input class="btn btn-success" type="submit" value="Add Student" name="add-student">
        </div>
        
        </form>
    </div>
</div>