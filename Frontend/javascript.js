//  Form validation for Login
function checkLoginCredentials(){

    let loginUsername = document.getElementById('username_login').value;
    let loginPassword = document.getElementById('password_login').value;

    if (loginPassword !== "" && loginUsername !== ""){
        sendLoginCredentials(loginUsername, loginPassword);
    }else{
        alert("Please fill in all required fields");
    }
}
// This function sends a AJAX request for login
function sendLoginCredentials(username, password){
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("loginButtonId").innerHTML = "Login";

            if(this.responseText == true){
                alert("Logged in successfully");
                window.location = "profile.php";
            }else{
                alert("Problem logging in.  Please try again");
            }
        }else{
            document.getElementById("loginButtonId").innerHTML = "Loading...";
        }
    };
    httpReq.open("GET", "functions.php?type=Login&username=" + username + "&password=" + password);
    httpReq.send(null);
}

function logout(){
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("logoutButtonId").innerHTML = "Logout";

            if(this.responseText == true){
                alert("Logged out successfully");
                window.location = "index.php";
            }else{
                alert("Problem logging out user.  Please try again");
            }
        }else{
            document.getElementById("loginButtonId").innerHTML = "Loading...";
        }
    };
    httpReq.open("GET", "functions.php?type=Logout");
    httpReq.send(null);
}

//  Form validation for Register
function checkRegisterCredentials(){
    //  Taking Form input
    let firstname = document.getElementById("id_firstname").value;
    let lastname = document.getElementById("id_lastname").value;
    let username = document.getElementById("id_username").value;
    let email = document.getElementById("id_email").value;
    let password = document.getElementById("id_password").value;
    let confirmPassword = document.getElementById("id_confirm_password").value;

    if (firstname !== "" && lastname !== "" && username !== "" && email !== "" && password !== "" && confirmPassword !== ""){
       if (password == confirmPassword) {
           sendRegisterCredentials(firstname, lastname, username, email, password);
       }else{
           alert("Password and Confirm Password must match");
       }
    }else{
        alert("Please fill out all required information");
    }
}

//  This function sends a AJAX request for Register new user
function sendRegisterCredentials(firstname, lastname, username, email, password){
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("registerButtonId").innerHTML = "Register";

            if(this.responseText == true){
                alert("Registered successfully!  You may now login with your new credentials");
                window.location = "index.php";
            }else{
                alert("Problems registering you as a new user.  Please try again");
            }
        }else{
            document.getElementById("registerButtonId").innerHTML = "Loading...";
        }
    };
    httpReq.open("GET", "functions.php?type=Register&username=" + username +
        "&password=" + password + "&firstname=" + firstname + "&lastname=" + lastname + "&email=" + email);
    httpReq.send(null);
}
