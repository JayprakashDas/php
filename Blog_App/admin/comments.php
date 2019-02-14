
<?php include "include/header.php" ?>
<?php include "include/footer.php" ?>
    <div id="wrapper">
        <?php include "include/navigation.php" ?>

       
        <div id="page-wrapper" >
            
            <div class="container-fluid" >

                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome to Comments 
                            <small><?php echo$_SESSION['username'] ?></small>
                        </h1>

                        <?php 
                        if(isset($_GET['source'])){
                        $source = $_GET['source'];
                        }
                        else{
                            $source = '';
                        }
                        
                        switch($source){
                            case 1;
                            include "include/add_post.php";
                            break;

                            case 2;
                            include "include/edit_post.php";
                            break;

                            default;
                            include "include/view_all_comments.php";
                            break;
                        }
                         ?>

                    </div>
                </div>
            </div>

        </div>