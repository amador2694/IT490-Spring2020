<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');

//  This function starts session
session_start();

$type = $_GET["type"];
//  determines what kind of data was sent via javascript.js
switch ($type) {
    case "Login":
        $username = $_GET["username"];
        $password = $_GET["password"];
        $response = login($username, $password);
        echo $response;
        break;

    case "Logout":
        session_destroy();
        $response = true;
        echo $response;
        break;

    case "Register":
        $firstname = $_GET["firstname"];
        $lastname = $_GET["lastname"];
        $username = $_GET["username"];
        $email = $_GET["email"];
        $password = $_GET["password"];
        $response = register($firstname, $lastname, $username, $email, $password);
        echo $response;
        break;
}
//  This function will send a login request message to Db through RabbitMQ
function login($username, $password)
{
    $request = array();
    $request['type'] = "Login";
    $request['username'] = $username;
    $request['password'] = $password;

    $returnedValue = createClientRequest($request);

    if ($returnedValue == true) {
        $_SESSION["username"] = $username;
        $_SESSION["loggedIn"] = true;
    } else {
        session_destroy();
    }

    return $returnedValue;
}
//  This function will send register request to RabbitMQ
function register($firstname, $lastname, $username, $email, $password)
{
    $request = array();

    $request['type'] = "Register";
    $request['firstname'] = $firstname;
    $request['lastname'] = $lastname;
    $request['username'] = $username;
    $request['password'] = $password;
    $request['email'] = $email;

    $returnedValue = createClientRequest($request);

    return $returnedValue;
}
//  creates rabbitMq client request
function createClientRequest($request){
    $client = new rabbitMQClient("../rabbitmqphp_example/rabbitMQ_db.ini", "testServer");
    $response = $client->send_request($request);

    return $response;
}
?>