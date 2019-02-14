
<?php include 'db.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navigation.php' ?>


    <!-- /////// WORK DONE\\\\\\\\\\\\
    /////////////WORK DONE/////////////
    \\\\\\\\\\\\\\WORK DONE\\\\\\\\\\\ -->



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 
                    if(isset($_GET['category'])){
                      $post_category_id = $_GET['category'];
                    }
                $query = "SELECT * FROM posts WHERE post_category_id=$post_category_id";
                $select_all_post= mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_all_post)){
                    $post_id  = $row['post_id'];
                    $post_title = $row['post_title'];//here post title is coming from db
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['content'];
                    $post_tag = $row['post_tags'];
                    $post_image = $row['post_image'];
                    ?>

                <h1 class="page-header">
                        <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title?></a>
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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               
                <?php
                    }
                 ?>


            </div>

             <?php include 'includes/sidebar.php' ?>

                    </div>
        <hr>
 <?php include 'includes/footer.php' ?>


</html>
