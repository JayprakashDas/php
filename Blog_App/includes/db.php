<?php 

$db['db_host'] = "gk90usy5ik2otcvi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$db['db_user'] = "w6v5cku5v5o0kpjx";
$db['db_pass'] = "az5anj8yi44pk4k8";
$db['db_name'] = "unv7w3jplhr6odqn";

foreach($db as $key => $value){
	//here key is db and all this to make it constant

	define(strtoupper($key),$value);
}




$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($connection){

	// echo "databse connected";
}




 ?>
