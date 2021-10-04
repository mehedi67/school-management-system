<h1 class="text-success fas fa-tachometer-alt"> Dashboard <small class="text-dark">Statistics Overview</small></h1>
 <ol class="breadcrumb">
<li class="breadcrumb-item active fas fa-tachometer-alt" aria-current="page"> Dashboard</li>
 </ol>

<?php 

$count_query = $conn->query("SELECT * FROM student_info");
$total_student = $count_query->num_rows;

$count_query = $conn->query("SELECT * FROM users");
$total_users = $count_query->num_rows;


?>
                    <div class="row">
                        <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-success"> 
                                        <div class="d-flex w-100 justify-content-between">
                                        <i class="fas fa-users fa-5x text-light"></i>
                                        <div class="">
                                        <h3 class="text-light"><?= $total_student?> </h3>
                                        <p class="text-light">All Students</p>
                                        </div>
                                    
                                        </div>
                                   
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex w-100 justify-content-between">
                                        <p> <a href="index.php?page=all-student" class=" text-decoration-none text-dark"> All Students </a></p>
                                        <p><a href="#" class=" text-decoration-none text-dark"><i class="fas fa-arrow-circle-right"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>

                        <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-success"> 
                                        <div class="d-flex w-100 justify-content-between">
                                        <i class="fas fa-users fa-5x text-light"></i>
                                        <div class="">
                                        <h3 class="text-light"><?= $total_users?> </h3>
                                        <p class="text-light"> Users</p>
                                        </div>
                                    
                                        </div>
                                   
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex w-100 justify-content-between">
                                        <p> <a href="index.php?page=all-users" class=" text-decoration-none text-dark"> All Users </a></p>
                                        <p><a href="#" class=" text-decoration-none text-dark"><i class="fas fa-arrow-circle-right"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                    <hr>
                    <h1>New Students</h1>
                    <div class="table-responsive text-center">
                    <table id="data" class="table table-success table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $show = "SELECT * From student_info";
                                $res = $conn->query($show);

                                while($row = $res->fetch_assoc()){?>

                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo ucwords($row['name']) ?></td>
                                <td><?php echo $row['roll'] ?></td>
                                <td><?php echo ucwords($row['city']) ?></td>
                                <td><?php echo $row['pcontact'] ?></td>
                                <td><img src="student_images/<?php echo $row['photo']; ?>" style="width:100px" alt=""></td>
                            </tr>
                            <?php
                                    
                                }
                            ?>
                    
                        </tbody>
                    </table>
                    </div>