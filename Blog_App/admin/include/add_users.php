

<?php 

if(isset($_POST['create_user'])){

	$username = $_POST['username'];
    $firstname =$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_email = $_POST['email'];
    $user_role= $_POST['role'];
    $user_password = $_POST['password'];
    



	move_uploaded_file($user_image_temp, "../images/$user_image");

	$query = "INSERT INTO users(username,user_firstname, user_lastname, user_image,
	 user_email, password,user_role)";
    $query.= "VALUES('$username','$firstname', '$lastname','$user_image',
    	'$user_email', '$user_password','$user_role')";
	
	$creat_user_query= mysqli_query($connection ,$query);

	if(!$creat_user_query){
		die("faied".mysqli_error($connection));
	}
	echo "User Created: ". " "."<a href = 'users.php'>view user</a>";

}


 ?>




<form  action = "" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Username</label>
		<input type="text" class="form-control" name="username" placeholder="Enter your username here">
	</div>
	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" name="firstname" placeholder="Enter your firstname here">
	</div>
	<div class="form-group">
		<label for="title">Lastname</label>
		<input type="text" class="form-control" name="lastname" placeholder="Enter your lastname here">
	</div>

	<div class="form-group">
		<label for="post_image">User Image</label>
		<input type="file" name="user_image">
	</div>
	<div class="form-group">
		<label for="title">e-mail</label>
		<input type="email" class="form-control" name="email" placeholder="Enter your e-mail here">
	</div>
	<div class="form-group">
		<select name="role">
			<option value="suscriber">SELECT OPTION</option>
			<option value="admin">Admin</option>
			<option value="suscriber">Suscriber</option>
		</select>
	</div>
	<div class="form-group">
		<label for="title">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Enter your password here">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Create User">
	</div>
	<div class="form-group">
		<a class="btn btn-primary" href="./users.php">view users</a>
	</div>
</form>