<h1 class="text-success fas fa-user"> All Students </h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard" class="text-decoration-none">Dashboard</a></li>

    <li class="breadcrumb-item active " aria-current="page"> Students</li>
  </ol>
<div class="table-responsive">
                    <table id="data" class="table table-success table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Photo</th>
                                <th>Action</th>
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
                                <td><?php echo $row['class'] ?></td>
                                <td><?php echo ucwords($row['city']) ?></td>
                                <td><?php echo $row['pcontact'] ?></td>
                                <td><img src="student_images/<?php echo $row['photo']; ?>" style="width:100px" alt=""></td>
                                <td>
                                    <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']) ?>" class="btn btn-warning btn-sm fas fa-pencil-alt"> Edit</a> 

                                    <a href="delete_student.php?id=<?php echo base64_encode($row['id']) ?>" class="btn btn-danger btn-sm fas fa-trash-alt"> Delete</a>
                                    
                                </td>
                            </tr>
                            <?php
                                    
                                }
                            ?>
                    
                        </tbody>
                    </table>
                    </div>