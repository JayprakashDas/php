<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>image</th>
                                    <th>email</th>
                                    <th>Role</th>
                                    <th>Make Admin</th>
                                    <th>Make Suscriber</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                    $query = "SELECT * FROM users";
                                    $select_all_users = mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($select_all_users)){
                                        $user_id=   $row['user_id'];
                                        $username=$row['username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname= $row['user_lastname'];
                                        $user_email= $row['user_email'];
                                        $user_role= $row['user_role'];
                                        $user_image=$row['user_image'];

                                      echo "<tr>";
                                            echo "<td>$user_id</td>";
                                            echo "<td>$username</td>";
                                            echo "<td>$user_firstname</td>";
                                            echo "<td>$user_lastname</td>";
                                            echo "<td><img width='100' src='../images/$user_image' alt='image'></td>";
                                            echo "<td>$user_email</td>";
                                            echo "<td>$user_role</td>";
                                            echo "<td><a href='users.php?change_to_admin=$user_id'>Make Admin</a></td>";
                                            echo "<td><a href='users.php?change_to_suscriber=$user_id'>Make Suscriber</a></td>";
                                            echo "<td><a href='users.php?source=2&edit_id=$user_id'>Edit</a></td>";
                                            echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                      echo "<tr>";
                                        }
                                     ?>

                                </tr>
                            </tbody>    
                        </table>

                        <?php 

                        if(isset($_GET['delete'])){
                            $user_delete_id=$_GET['delete'];

                            $query = "DELETE FROM users WHERE user_id = $user_delete_id";
                            $user_delete_query= mysqli_query($connection ,$query);
                            header("Location: users.php");

                            if(!$user_delete_query){
                                die("Query Failed".mysqli_error($connection));
                            }

                        }
                         ?>


                         <?php
                         if(isset($_GET['change_to_admin'])){
                            
                          $user_id= $_GET['change_to_admin'];

                          $query= "UPDATE users SET user_role ='Admin' WHERE user_id= $user_id ";
                          $result = mysqli_query($connection ,$query);
                          header("Location: users.php");

                            }

                          ?>
                           <?php
                         if(isset($_GET['change_to_suscriber'])){

                          $user_id= $_GET['change_to_suscriber'];
                          $query= "UPDATE users SET user_role ='Suscriber' WHERE user_id= $user_id";
                          $result = mysqli_query($connection ,$query);
                          header("Location: users.php");

                            }

                          ?>

                        <?php 
                         if(isset($_GET['edit_id'])){
                          $edit_id = $_GET['edit_id'];
                          include "edit_users.php";

                          }

                          ?>














