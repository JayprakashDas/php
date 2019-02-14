
<?php
 

if(isset($_POST['create_post'])){

	$post_title = $_POST['title'];
    $post_author =$_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status =$_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['content'];
    $post_date = date('d-m-y');
	//$post_comment_count = 4;



	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "INSERT INTO posts(post_category_id,post_title, post_author, post_date,
	 post_image, content, post_tags, post_comment_count,post_status)";
    $query.= "VALUES('$post_category_id','$post_title', '$post_author', now() ,'$post_image',
    	'$post_content', '$post_tags','','$post_status')";
	
	$creat_query= mysqli_query($connection ,$query);

	if(!$creat_query){
		die("faied".mysqli_error($connection));
	}
	echo "<h4 class='bg-success'>Post Created: ". " "."  "."<a href = '../post.php?p_id=<?php echo $post_id?>'>View posts</a>".  "<a href = 'post.php'>More posts</a></h4>";


}


 ?>




<form  action = "" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="title">Select Category</label>
		<select name="post_category_id">
			<?php 
				$query = "SELECT * FROM category";
	            $query = mysqli_query($connection, $query);               
	            while($row = mysqli_fetch_assoc($query)){
	            	$id = $row['id'];
	            	$cat_title = $row['cat_title'];
	            	
	            echo "<option value='$id'>$cat_title</option>";

            	}
            
			 ?>
		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="title">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea  class="form-control" name="content" id="body" cols="30" rows="50" >
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
			<option value="draft">Select option</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="publish post">
	</div>
	<div class="form-group">
		<a class="btn btn-primary" href="./post.php">VIEW ALL POSTS</a>
	</div>
</form>