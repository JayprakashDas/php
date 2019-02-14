
<?php include "include/header.php" ?>

    <div id="wrapper">
        <?php include "include/navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           
                            Welcome Admin
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                        $query = "SELECT * FROM posts";
                                        $result = mysqli_query($connection, $query);
                                        $post_counts= mysqli_num_rows($result);
                                        echo "<div class='huge'>$post_counts</div>";
                                         ?>
                                  
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./post.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                        $query = "SELECT * FROM comments";
                                        $result = mysqli_query($connection, $query);
                                        $comment_counts= mysqli_num_rows($result);
                                        echo "<div class='huge'>$comment_counts</div>";
                                         ?>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                        $query = "SELECT * FROM users";
                                        $result = mysqli_query($connection, $query);
                                        $user_counts= mysqli_num_rows($result);
                                        echo "<div class='huge'>$user_counts</div>";
                                         ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.<?php  ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                        $query = "SELECT * FROM category";
                                        $result = mysqli_query($connection, $query);
                                        $category_count= mysqli_num_rows($result);
                                        echo "<div class='huge'>$category_count</div>";
                                         ?>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                $query = "SELECT * FROM posts WHERE post_status ='draft' ";
                $result = mysqli_query($connection, $query);
                $post_draft_counts= mysqli_num_rows($result);
                $query = "SELECT * FROM posts WHERE post_status ='published' ";
                $result = mysqli_query($connection, $query);
                $post_published_counts= mysqli_num_rows($result);

                $query = "SELECT * FROM comments WHERE comment_status = 'Unapproved' ";
                $result = mysqli_query($connection, $query);
                $comment_unapproved_counts= mysqli_num_rows($result);

                $query = "SELECT * FROM users WHERE user_role='suscriber' ";
                $result = mysqli_query($connection, $query);
                $user_role_counts= mysqli_num_rows($result);


                 ?>

                <div class="row">
                <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Data', 'Count'],
                      <?php 
                      $element_text =['Active Post', 'Published Post', 'Draft Post', 'Categories','Users','Suscriber', 'Comments','UnapprovedComments'];
                      $element_count=[$post_counts,$post_published_counts,$post_draft_counts, $category_count, $user_counts,$user_role_counts, $comment_counts,$comment_unapproved_counts];
                      for($i=0; $i<8; $i++){
                        echo "['{$element_text[$i]}' ". "," . "{$element_count[$i]}],";
                      } 
                       ?>

                    ]);

                    var options = {
                      chart: {
                        title: 'Website Performance',
                        subtitle: 'Active Post, Comments, Users, and caegory: 2018-2019',
                      }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                  }
                </script>
                <div id="columnchart_material" style="width: 1000px; height: 500px;"></div>
                </div>
            </div>
        </div>
<?php include "include/footer.php" ?>
