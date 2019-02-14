<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>comments</th>
                                    <th>e-mail</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>In Response to</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                    $query = "SELECT * FROM comments";
                                    $select_all_post = mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($select_all_post)){
                                        $comment_id=   $row['comment_id'];
                                        $comment_post_id=$row['comment_post_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_email= $row['comment_email'];
                                        $comment_content= $row['comment_content'];
                                        $comment_status= $row['comment_status'];
                                        $comment_date=$row['comment_date'];

                                      echo "<tr>";
                                            echo "<td>$comment_id</td>";
                                            echo "<td>$comment_author</td>";
                                            echo "<td>$comment_content</td>";
                                            echo "<td>$comment_email</td>";
                                            echo "<td>$comment_status</td>";
                                            echo "<td>$comment_date</td>";        
                                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                            $post_fetch_query = mysqli_query($connection, $query); 
                                            
                                            while($row = mysqli_fetch_assoc($post_fetch_query)){
                                                $post_id=$row['post_id'];
                                                $post_title = $row['post_title'];
                                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                                }
                                             echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                            echo "<td><a href='comments.php?unapprove=$comment_id'>Unaprove</a></td>";
                                            echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                        echo "<tr>";
                                        }
                                     ?>

                                </tr>
                            </tbody>    
                        </table>

                        <?php 

                        if(isset($_GET['delete'])){
                            $comment_delete_id=$_GET['delete'];

                            $query = "DELETE FROM comments WHERE comment_id = $comment_delete_id";
                            $comment_delete_query= mysqli_query($connection ,$query);
                            header("Location: comments.php");

                            if(!$comment_delete_query){
                                die("Query Failed".mysqli_error($connection));
                            }

                        }
                         ?>

                         <?php
                         if(isset($_GET['approve'])){
                            
                          $comment_id= $_GET['approve'];

                          $query= "UPDATE comments SET comment_status ='Approved' WHERE comment_id= $comment_id ";
                          $result = mysqli_query($connection ,$query);
                          header("Location: comments.php");

                            }

                          ?>
                           <?php
                         if(isset($_GET['unapprove'])){
                            
                          $comment_id= $_GET['unapprove'];

                          $query= "UPDATE comments SET comment_status ='Unapproved' WHERE comment_id= $comment_id  ";
                          $result = mysqli_query($connection ,$query);
                          header("Location: comments.php");

                            }

                          ?>




