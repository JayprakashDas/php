<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Post Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                    $query = "SELECT * FROM posts";
                                    $select_all_post = mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($select_all_post)){
                                        $post_id=   $row['post_id'];
                                        $post_author=$row['post_author'];
                                        $post_title = $row['post_title'];
                                        $post_category_id= $row['post_category_id'];
                                        $post_date= $row['post_date'];
                                        $post_image= $row['post_image'];
                                        $post_tags=$row['post_tags'];
                                        $post_status=$row['post_status'];
                                        $post_comment_count =$row['post_comment_count'];

                                      echo "<tr>";
                                            echo "<td>$post_id</td>";
                                            echo "<td>$post_author</td>";
                                            echo "<td>$post_title</td>";
                                            ///TO SHOW THE CATEGORY NAME IN THE ADMIN PANEl         
                                            $query = "SELECT * FROM category WHERE id = $post_category_id";
                                            $query = mysqli_query($connection, $query); 
                                            
                                            while($row = mysqli_fetch_assoc($query)){
                                            $id = $row['id'];
                                            $cat_title =$row['cat_title'];
                                            
                                                }
                                            echo "<td>$cat_title</td>";
                                            echo "<td>$post_status</td>";
                                            echo "<td><img width='100' src='../images/$post_image' alt='image'</td>";
                                            echo "<td>$post_tags</td>";
                                            echo "<td>$post_comment_count</td>";
                                            echo "<td>$post_date</td>";
                                            echo "<td><a href='post.php?source=2&edit_id=$post_id'>Edit</a></td>";
                                            echo "<td><a href='post.php?delete=$post_id'>Delete</a></td>";
                                        echo "<tr>";
                                        }
                                     ?>

                                </tr>
                            </tbody>    
                        </table>

                        <?php 

                        if(isset($_GET['delete'])){
                            $post_delete_id=$_GET['delete'];
                            $query = "DELETE FROM posts WHERE post_id = $post_delete_id";
                            $post_delete_query= mysqli_query($connection ,$query);
                            header("Location: post.php");

                            if(!$post_delete_query){
                                die("Query Failed".mysqli_error($connection));
                            }

                        }
                         ?>

                        <?php 
                         if(isset($_GET['edit_id'])){
                          $edit_id = $_GET['edit_id'];
                          
                          include "edit_post.php";

                            }

                        ?>




