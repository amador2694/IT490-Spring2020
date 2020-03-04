
<?php 

	require_once('../rabbitmqphp_example/path.inc');
	require_once('../rabbitmqphp_example/get_host_info.inc');
	require_once('../rabbitmqphp_example/rabbitMQLib.inc');
	
	require_once('../rabbitmqphp_example/dbFunctions.php');
	
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	ini_set('log_errors', 'on'); 
	
	function requestProcessor($request){
		echo "received request".PHP_EOL;
		echo $request['type']; 
		var_dump($request); 
		
		if(!isset($request['type'])){
			return array('message'=>"ERROR: Message not found");
		}
		switch($request['type']){

		case "Login":
		       echo "<br>in login";	
		       $response_msg = doLogin($request['username'],$request['password']); 
		     echo "Result: ". $response_msg;  
			break;
		case "CheckUsernamne":
			echo "<br>in Checkusername";
			$response_msg = checkUsername($request['username']); 
			echo "Result: ". $response_msg; 
			break; 

		case "CheckEmail":
			echo "<br>in CheckEmail";
			$response_msg = checkEmail($request['email']); 
			break; 

		case "SendEmail":
			echo "<br>in CheckEmail";
			$response_msg = sendEmail($request['email']); 
			break; 

		case "Register":
			echo "<br>in register";
			$response_msg = register($request['username'], $request['email'], $request['password'], $request['firstname'], $request['lastname']); 
			break;

		case "LoadCategories":
			echo "<br>in LoadCategories"; 
			$response_msg = LoadCategories(); 
			break; 

		case "CreateCategories":
                        echo "<br>in Create Categories";
                        $response_msg = CreateCategories($request['cat_name'], $request['cat_description']);
			break; 

		case "LoadTopics":
                        echo "<br>in LoadTopics";
                        $response_msg = LoadTopics($request['cat_id']); 
			break; 

		case "CreateTopics":
                        echo "<br>in Create Topics";
                        $response_msg = CreateTopics($request['topic_subject'], $request['topic_cat']);
			break;

		case "LoadPosts":
                        echo "<br>in LoadPosts";
                        $response_msg = LoadPosts($request['topic_id']);
			break; 

		case "CreatePosts":
			echo "<br>in Create Posts";
			$response_msg = CreateTopics($request['post_content'], $request['topic_id'], $request['username']); 
			break; 

		case "Search":
			echo "<br in Search";
			$response_msg = createClientRequest($request); 
			break; 



	
		}


		echo $response_msg; 
		return $response_msg; 
	}

	$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_db.ini', 'testServer'); 

	$server->process_requests('requestProcessor');

	

?>

			
		 
		
	


