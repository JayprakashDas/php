				     	<form action ="" method="post">
					    	<div class = "form-group">
				     			<label>Edit Category</label>
                            <?php 
                            if(isset($_GET['edit'])){

                                $edit_id = $_GET['edit'];
                            

                             $query = "SELECT * FROM category WHERE id = $edit_id";
                             $query = mysqli_query($connection, $query); 
                             
                              while($row = mysqli_fetch_assoc($query)){
                              $id = $row['id'];
                              $cat_title =$row['cat_title'];
                             ?>
                             <input value=" <?php if(isset($cat_title)){echo $cat_title; } ?>" class="form-control" type = "text" name ="cat_title">
                         
                           	 <?php }} ?>

                             <?php 

                             if(isset($_POST['update'])){        
                                $the_cat_title = $_POST['cat_title'];

                                $edit_query= "UPDATE category SET cat_title = '$the_cat_title' WHERE id = {$edit_id}";
                                $result= mysqli_query($connection, $edit_query);
                                if(!$result){
                                	die("Query failed".mysqli_error($connection));
                                }

                              }
                              ?>
						        <input class="btn btn-primary" type = "submit" name ="update" value="submit">
					   		</div>
							</form>

                             
					
		