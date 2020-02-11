//  Form validation for Login
function checkLoginCredentials(){

    let loginUsername = document.getElementById('username_login').value;
    let loginPassword = document.getElementById('password_login').value;

    if (loginPassword !== "" && loginUsername !== ""){
        sendLoginCredentials(loginUsername, loginPassword);
    }
}

// This function sends a AJAX request for login
function sendLoginCredentials(username, password){

    var httpReq = createRequestObject();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            document.getElementById("loginButtonId").innerHTML = "Login";

            if(this.responseText == true){
                window.location = "index.php";
            }else{
                window.location = "loginRegister.html";
            }

        }else{
            document.getElementById("loginButtonId").innerHTML = "Loading...";
        }
    }
    httpReq.open("GET", "../php/functionCases.php?type=Login&username=" + username + "&password=" + password);
    httpReq.send(null);
}

//  Form validation for Register
function checkRegisterCredentials(){

    //  Taking Form input
    var firstname = document.getElementById("id_firstname").value;
    var lastname = document.getElementById("id_lastname").value;
    var username = document.getElementById("id_username").value;
    var email = document.getElementById("id_email").value;
    var password = document.getElementById("id_password").value;
    var confirmPassword = document.getElementById("id_confirm_password").value;


    if (firstname !== "" && lastname !== "" && username !== "" && email !== "" && password !== "" && confirmPassword !== ""){
        sendRegisterCredentials(firstname, lastname, username, email, password);
    }else{
        alert("Information not good");
    }

}

//  This function sends a AJAX request for Register new user
function sendRegisterCredentials(firstname, lastname, username, email, password){

    var httpReq = createRequestObject();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            document.getElementById("registerButtonId").innerHTML = "Register";
            //  var response = JSON.parse(this.responseText);
            if(this.responseText == true){
                alert("User Registered");
            }else{
                alert("Problems registering a new user");
            }
        }else{
            document.getElementById("registerButtonId").innerHTML = "Loading...";
        }
    }
    httpReq.open("GET", "../php/functionCases.php?type=RegisterNewUser&username=" + username + "&password=" + password + "&firstname=" + firstname + "&lastname=" + lastname + "&email=" + email);
    httpReq.send(null);
}
//  This function will create an object for http request
function createRequestObject(){
    var ajaxSender;
    try {
        ajaxSender = new XMLHttpRequest();
    }catch (e) {
        try {
            ajaxSender = new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e) {
            try{
                ajaxSender = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){
                alert("Your browser broke!");
            }
        }
    }
    return ajaxSender;
}