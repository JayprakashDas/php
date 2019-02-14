
<?php include 'db.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navigation.php' ?>

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                $query = "SELECT * FROM posts LIMIT";
                $select_all_post= mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_all_post)){
                    $post_id  = $row['post_id'];
                    $post_title = $row['post_title'];//here post title is coming from db
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = substr($row['content'],0,50); 
                    $post_tag = $row['post_tags'];
                    $post_image = $row['post_image'];
                    $post_status=$row['post_status'];
                    if($post_status!=='published'){
                        echo "no post to display";
                    }
                    else{

                    
                    ?>

                <h1 class="page-header">
                        Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <!-- TO SHOW THE PARTICULAR POST WHEN CLICK ITS TITLE -->
                    <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p> <?php echo $post_content ?> </p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               
                <?php
                   } }
                 ?>

                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

             <?php include 'includes/sidebar.php' ?>

                    </div>
        <!-- /.row -->
        <hr>
 <?php include 'includes/footer.php' ?>


</html>
