<?php 

if(isset($_GET['edit_id'])){
	$edit_id=$_GET['edit_id'];
}

 $query = "SELECT * FROM users WHERE user_id = $edit_id";
 $select_user_id = mysqli_query($connection,$query);

  while($row=mysqli_fetch_assoc($select_user_id)){
    $user_id=  $row['user_id'];
    $username=$row['username'];
  	$user_firstname = $row['user_firstname'];
    $user_lastname= $row['user_lastname'];
    $user_email= $row['user_email'];
    $user_role= $row['user_role'];
    $user_image=$row['user_image'];
	}
 ?>


<?php 

if(isset($_POST['edit_user'])){
   	$username = $_POST['username'];
    $firstname =$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_email = $_POST['email'];
    $user_role= $_POST['role'];
    $password = $_POST['password'];
    echo "<div>Successfully edited the user</div>";

    //password ENCRYPT while update
     $query = "SELECT randSalt FROM users";
        $select_randSalt_query = mysqli_query($connection,$query);

        if(!$select_randSalt_query){
            die("Quary failed".mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randSalt_query);
        $salt = $row['randSalt'];
        //password ENCRYPT
        $hashed_password = crypt($password,$salt);


    move_uploaded_file($user_image_temp, "../images/$user_image");
    
    if(empty($user_image)){
    	$query = "SELECT * FROM users WHERE user_id = $edit_id";
    	$select_image = mysqli_query($connection ,$query);

    	while($row=mysqli_fetch_array($select_image)){
    		$user_image=$row['user_image'];
    	}
    }

	$update_query = "UPDATE users SET username = '$username', user_firstname ='$firstname', user_lastname= '$lastname', user_image='$user_image', user_email='$user_email', user_role='$user_role', password='$hashed_password' WHERE user_id=$edit_id";	
   	$result = mysqli_query( $connection,$update_query);
   	if(!$result){
   		die("query failed".mysqli_error($connection));
   	}

	
}

 ?>

<form  action = "" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username ?>">
	</div>
	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname ?>">
	</div>
	<div class="form-group">
		<label for="title">Lastname</label>
		<input type="text" class="form-control" name="lastname" value="<?php echo $user_lastname ?>">
	</div>

	<div class="form-group">
		<label for="post_image">User Image</label><br>
		<?php echo "<img width='100' src='../images/$user_image' alt='image'>" ?>
		<input type="file" name="user_image">
	</div>
	<div class="form-group">
		<label for="title">e-mail</label>
		<input type="email" class="form-control" name="email" value="<?php echo $user_email ?>">
	</div>
	<div class="form-group">
		<select name="role">
			<option value="suscriber">SELECT OPTION</option>
			<option value="Admin">Admin</option>
			<option value="suscriber">Suscriber</option>
		</select>
	</div>
	<div class="form-group">
		<label for="title">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Enter your password here">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update user">
	</div>
	<div class="form-group">
		<a class="btn btn-primary" href="./users.php">View Users</a>
	</div>
</form>