
<?php include "include/header.php" ?>
<?php include "include/footer.php" ?>

    <div id="wrapper">
        <?php include "include/navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to categories 
                            <small><?php echo$_SESSION['username'] ?></small>
                        </h1>
                        <div class="col-xs-6">

                        	<?php 
                        		insert_categories();
                        	 ?>
                        	<label>Add Category</label>
                        	<form action ="" method="post">
                        		<div class = "form-group">
                        			<input class="form-control" type = "text" name ="cat_title" placeholder="Add categories">
                        		</div>
                        		<div class = "form-group">
                        			<input class="btn btn-primary" type = "submit" name ="submit" value="Submit">
                        		</div>
                        	</form>
                        <?php
                        if(isset($_GET['edit'])){
                          $edit_id = $_GET['edit'];
                          
                          include "include/update_category.php";

                            }
                         ?>
                        </div>
                                    <div class= "col-xs-6">
                        	<table class = "table table-bordered table-hover" >
                        		<thead>
                        			<tr>
                        				<th>Id</th>
                        				<th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<tr>
                        				<?php
                                        find_all_categories();
                                          ?>

                                         <?php 
                                         delete_categories();
                                         
                                          ?>
                        			</tr>
                        		</tbody>
                        	</table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->
