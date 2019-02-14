<?php 

function insert_categories(){
	global $connection;

if(isset($_POST['submit'])){
      $title=	$_POST['cat_title'];
       if($title == "" || empty($title)){
        echo "<strong><i>This Field canot be empty</i></strong>.<br>";
    }
       else{
  		$query = "INSERT INTO category(cat_title) VALUES('$title')";
        $create_category = mysqli_query($connection ,$query);

       if(!$create_category){
      	die("WORNG QUERY".mysqli_error($connection));
        }
       }
     }

}

function find_all_categories(){
	global $connection;
	$query = "SELECT * FROM category";
     $result = mysqli_query($connection, $query); 
     if(!$result){
       die("wrong query");
       } 
	while($row = mysqli_fetch_assoc($result)){
     $id = $row['id'];
     $title =$row['cat_title'];
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$title</td>";
        echo "<td><a href='categories.php?delete=$id'>Delete</a></td>";
        echo "<td><a href='categories.php?edit=$id'>Edit</a></td>";
        echo "</tr>";
                        					}
                     

}

function delete_categories(){
		global $connection;
		if(isset($_GET['delete'])){
          $delete_id = $_GET['delete'];
			$query="DELETE FROM category WHERE id=$delete_id";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");

        }


}
function user_online(){

  if(isset($_GET['useronline'])){
    global $connection;
    if(!$connection){
      session_start();
      include("../db.php");
        $session= session_id();
        $time = time();
        $time_out_in_seconds = 10;
        $time_out= $time-$time_out_in_seconds;

        $query="SELECT *from user_online WHERE session='$session' ";
        $send_query = mysqli_query($connection,$query);
        $count = mysqli_num_rows($send_query);

          if($count==NULL){
              mysqli_query($connection,"INSERT INTO user_online(session,time) VALUES ('$session','$time')");
          }
          else{
              mysqli_query($connection,"UPDATE user_online SET time= '$time' WHERE session = '$session' ");
          }

          $user_online = mysqli_query($connection,"SELECT * FROM user_online WHERE time >'$time_out' ");
          echo $count_online_user = mysqli_num_rows($user_online);


      }

    }
}

user_online();



 ?>