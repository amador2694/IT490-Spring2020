<?php 

	require_once('../rabbitmqphp_example/path.inc');
	require_once('../rabbitmqphp_example/get_host_info.inc');
	require_once('../rabbitmqphp_example/rabbitMQLib.inc'); 
	require_once('rabbitMQClient.php'); 
	require('dbConnection.php'); 
	
	error_reporting(E_ALL); 
	
	ini_set('display_errors', 'off'); 
	ini_set('log_errors', 'on'); 
	
	
	function doLogin($username, $password){
		
		$connection = dbConnection(); 
		
		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = $connection->query($query);
		if($result){
			if($result->num_rows == 0){
				return false;
			}//else{
			//	while ($row = $result->fetch_assoc()){
				//	$salt = $row['salt'];
				//	$h_password = hashPassword($password, $salt);
				//	if ($row['h_password'] == $h_password){
				//		return true; 
				//	}else{
				//		return false;
				//	}
			//	}
		}
		return true; 
		}
	
	
	function checkUsername($username){
	
		$connection = dbConnection();
		
		$check_username = "SELECT * FROM users WHERE username = '$username'";
		$check_result = $connection->query($check_username);
		
		if($check_result){
			if($check_result->num_rows == 0){
				return true;
			}elseif($check_result->num_rows == 1){
				return false;
				}
	}
}

function checkEmail($email){
	
	$connection = dbConnection();
	
	$check_email = "SELECT * FROM users WHERE email = '$email' "; 
	$check_result = $connection->query($check_email); 
	
	if($check_result){
		if($check_result->num_rows == 0){
			return true; 
		}elseif($check_result->num_rows == 1){
			return false; 
		}
	}
}

function get_credentials($email){
	
	$connection = dbConnection();
	
	$credentials_query = "SELECT username FROM users WHERE email = '$email'";
	$credentials_query_result = $connection->query($credentials_query);
	
	$row = $credentials_query_result->fetch_assoc(); 
	$user = $row['username']; 
	return $user; 
}

function register($username, $email, $password, $firstname, $lastname){

	$connection = dbConnection(); 

//	$salt = randomString(29); 

//	$h_password = hashPassword($password, $salt); 

	$newuser_query = "INSERT INTO users (username, email, firstname, lastname, password) VALUES ('$username', '$email', '$firstname', '$lastname', '$password')"; 

	$result = $connection->query($newuser_query); 

	return true; 
} 


function LoadCategories(){

	$connection = dbConnection();

	$sql = "SELECT * FROM categories"; 

	$result = mysqli_query($connection,$sql);
	
	if(!$result)
	{
		echo 'The categories could not be displayed, please try again later.';
	}
	else
	{
		if(mysqli_num_rows($result) == 0)
		{
			echo 'No categories defined yet.';
		}
		else
		{

		//	echo '<table border="1">
		//		<tr>
			//	<th>Category</th> 
			/*	<th>Last topic</th>
				</tr>'; 
			 */
			                     $tempString = "";
                        $tempString.=   '<table class="table table-hover table-dark">';
            $tempString.= '<thead>';
           $tempString.=' <tr>';
           $tempString.='     <th colspan="6"><span class="tableTitle">Categories</span></th>';
           $tempString.=' </tr>';
           $tempString.=' </thead>';
           $tempString.=' <tbody>';

			while($row = mysqli_fetch_assoc($result))
			{ 
				 
				
		
           $tempString.= ' <tr>';
               $tempString.= ' <td><a href="categories.php?id=' . $row['cat_id'] . '"><span class="categoryTitle">' . $row['cat_name'] . '</span></a></td>';
	   $tempString.= '  <td>' . $row['cat_description'] . '</td>';	          
	   $tempString.= ' </tr>';
            

				 	 

			} 
		      $tempString.= ' </tbody>';
       			$tempString.= '</table>'; 
			return $tempString;
		}
	}

}

function CreateCategories($cat_name, $cat_description){

	$connection = dbConnection(); 

	$sqlCategory = "INSERT INTO categories(cat_name, cat_description) VALUES('$cat_name', '$cat_description')"; 

	$result = $connection->query($sqlCategory); 

	return true; 
}
	?>
