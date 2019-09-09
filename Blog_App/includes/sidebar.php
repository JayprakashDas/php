            <div class="col-md-4">
                        <?php 

                        if(isset($_POST['submit']))

                        $search  =  $_POST['search'];
                            $search ="";

                            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                            $search_query = mysqli_query($connection,$query);

                            if(!$search_query){
                                die("QUERY failed". mysqli_error($connection));
                            }

                            $count = mysqli_num_rows($search_query);

                            if($count ==0){
                                echo "no resultfound";
                            }
                            else{

                            }

                         ?>

                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post" > 
                        <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button name="submit" type="submit" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        </div>
                    </form>
                </div>
                <div class="well">
                    <h4>LogIn</h4>
                    <form action="includes/login.php" method="post" > 
                        <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="user">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="root"><br>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Login</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="well">

                    <?php 

                        $query = "SELECT * FROM category LIMIT 10";
                        $select_all_category = mysqli_query($connection, $query);

                     ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                    while($row = mysqli_fetch_assoc($select_all_category)){
                                     $cat_title= $row['cat_title'];
                                      $cat_id= $row['id'];

                                     echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                                    }


                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="well">
                    <h4>The Awesome Assam</h4>
                    <p>Assam is a state in northeastern India known for its wildlife, archeological sites and tea plantations. In the west, Guwahati, Assam’s largest city, features silk bazaars and the hilltop Kamakhya Temple. Umananda Temple sits on Peacock Island in the Brahmaputra river. The state capital, Dispur, is a suburb of Guwahati.</p>
                </div>

            </div>

