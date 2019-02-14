<?php include 'db.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navigation.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php 
                if(isset($_GET['p_id'])){

                    $post_id=$_GET['p_id'];
                }

                $query = "SELECT * FROM posts WHERE post_id=$post_id";
                $select_all_post= mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_all_post)){
                    $post_id  = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['content'];
                    $post_tag = $row['post_tags'];
                    $post_image = $row['post_image'];
                    ?>

                <h1 class="page-header">
                        <a href="#"><?php echo $post_title?></a>
                    <small>The Aswesome Assam</small>
                </h1>

                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?> </a>
                </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                     <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                    <p> <?php echo $post_content ?> </p>
                <hr>

               
                <?php
                    }
                 ?>
                     <?php 
                        if(isset($_POST['create_comment'])){
                            $comment_author=$_POST['comment_author'];
                            $comment_email=$_POST['comment_email'];
                            $comment_content=$_POST['comment_content'];
                            $post_id=$_GET['p_id'];
                            $query= "INSERT INTO comments(comment_author,comment_email,comment_content,comment_date,comment_post_id,comment_status) VALUES('$comment_author','$comment_email','$comment_content',now(),'$post_id','Approved')";
                            $create_comment_query=mysqli_query($connection,$query);
                                if(!$create_comment_query){
                                  die("failed".mysqli_error($connection));
                                  }
                                    $query1= "UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id = $post_id";
                                    $update_comment_count= mysqli_query($connection, $query1);
                        }

                        ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="post.php?p_id=<?php echo $post_id?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author" placeholder="author name">
                        </div>
                        <div class="form-group">
                            <input type="emal" class="form-control" name="comment_email" placeholder="your email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>

                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <?php 
                $query = "SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status ='Approved' ORDER BY comment_id DESC";
                $select_comment_query = mysqli_query($connection, $query);
                if(!$select_comment_query){
                    die("query failed".mysqli_error($connection));
                } 
                while($row=mysqli_fetch_array($select_comment_query)){
                    $comment_author=$row['comment_author'];
                    $comment_content=$row['comment_content'];
                    $comment_email=$row['comment_email'];
                    $comment_date=$row['comment_date'];

                 ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>

               <?php }?>

            </div>

             <?php include 'includes/sidebar.php' ?>

                    </div>
        <hr>
<?php include 'includes/footer.php' ?>
</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
