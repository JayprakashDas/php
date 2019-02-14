<?php 

if(isset($_GET['edit_id'])){
	$edit_id=$_GET['edit_id'];
}

 $query = "SELECT * FROM posts WHERE post_id = $edit_id";
 $select_post_id = mysqli_query($connection,$query);

  while($row=mysqli_fetch_assoc($select_post_id)){
  	$post_id=   $row['post_id'];
   	$post_author=$row['post_author'];
    $post_title = $row['post_title'];
   	$post_category_id= $row['post_category_id'];
  	$post_date= $row['post_date'];
    $post_image= $row['post_image'];
    $post_tags=$row['post_tags'];
    $post_status=$row['post_status'];
    $post_content = $row['content'];
    $post_comment_count =$row['post_comment_count'];

	}
 ?>


<?php 

if(isset($_POST['edit_post'])){


   	$post_author=$_POST['author'];
    $post_title = $_POST['title'];
   	$post_category_id= $_POST['post_category'];
    $post_tags=$_POST['post_tags'];
    $post_status=$_POST['post_status'];
    $post_content = $_POST['content'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)){
    	$query = "SELECT * FROM posts WHERE post_id = $edit_id";
    	$select_image = mysqli_query($connection ,$query);

    	while($row=mysqli_fetch_array($select_image)){
    		$post_image=$row['post_image'];
    	}
    }

    $edit_post = "UPDATE posts SET post_title = '$post_title', post_author = '$post_author', post_category_id = '$post_category_id', post_tags = '$post_tags', content= '$post_content',post_date = now() , post_image = '$post_image', post_status='$post_status' WHERE post_id = $edit_id ";
    

   	$result = mysqli_query( $connection,$edit_post);
   	if(!$result){
   		die("query failed".mysqli_error($connection));
   	}

	echo "<h5>Post Updated: ". " "."    "."<a href = '../post.php?p_id = $edit_id'>View post</a>"."  "."<a href = 'post.php'>More posts</a><h5>";
}

 ?>




<form  action = "" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $post_title ?>">
	</div>

	<div class="form-group">
		<label for="title">Select Category</label>
		<select name="post_category">
			<?php
			//to SHOW THE CATEGORY FROM THE CATEGORY TABLE 
				$query = "SELECT * FROM category";
	            $query = mysqli_query($connection, $query);               
	            while($row = mysqli_fetch_assoc($query)){
	            	$id = $row['id'];
	            	$cat_title =$row['cat_title'];

	            echo "<option value='$id'>$cat_title</option>";

            	}
            
			 ?>
		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" class="form-control" name="author" value="<?php echo $post_author ?>">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label><br>
		<img src="../images/<?php echo $post_image ?>" alt="image" width="100">
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="title">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
	</div>

	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea value="" class="form-control" name="content" id="body" cols="30" rows="10"><?php echo $post_content ?>
		</textarea>
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		 ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
	});
		
	</script>

	<div class="form-group">
		<label for="title">Post Status: </label>
		<select name = "post_status">
			<option value="<?php echo $post_status ?>">Select option</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_post" value="update post">
	</div>
	<div class="form-group">
		<a class="btn btn-primary" href="./post.php">VIEW ALL POSTS</a>
	</div>

</form>