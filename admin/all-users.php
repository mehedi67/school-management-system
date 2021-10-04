<h1 class="text-success fas fa-user"> All Users </h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard" class="text-decoration-none">Dashboard</a></li>

    <li class="breadcrumb-item active " aria-current="page"> Users</li>
  </ol>
<div class="table-responsive">
                    <table id="data" class="table table-success table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Photo</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $show = "SELECT * From users";
                                $res = $conn->query($show);

                                while($row = $res->fetch_assoc()){?>

                            <tr>
                                
                                <td><?php echo ucwords($row['name']) ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><img src="images/<?php echo $row['photo']; ?>" style="width:100px" alt=""></td>
                                
                            </tr>
                            <?php
                                    
                                }
                            ?>
                    
                        </tbody>
                    </table>
                    </div>