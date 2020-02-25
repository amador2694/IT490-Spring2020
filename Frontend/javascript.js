
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

function logout() {
    if (confirm('Are you sure you want log out?')) {
        let httpReq = new XMLHttpRequest();
        httpReq.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("logoutButtonId").innerHTML = "Logout";

                if (this.responseText == true) {
                    alert("Logged out successfully");
                    window.location = "index.php";
                } else {
                    alert("Problem logging out user.  Please try again");
                }
            } else {
                document.getElementById("loginButtonId").innerHTML = "Loading...";
            }
        };
        httpReq.open("GET", "functions.php?type=Logout");
        httpReq.send(null);
    } else {
        //cancels login request
    }
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

function loadCategories() {
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("categoriesTable").innerHTML = this.responseText;
        }
        httpReq.open("GET", "functions.php?type=LoadCategories");
        httpReq.send(null);
    }
}
function loadTopics() {
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("topicssTable").innerHTML = this.responseText;
        }
        httpReq.open("GET", "functions.php?type=LoadTopics&cat_id=" + cat_id);
        httpReq.send(null);
    }
}
function loadPosts() {
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("postsTable").innerHTML = this.responseText;
        }
        httpReq.open("GET", "functions.php?type=LoadPosts&topic_id=" + topic_id);
        httpReq.send(null);
    }
}
function checkCategoryFields(){

    let catName = document.getElementById('category_name').value;
    let catDesc = document.getElementById('category_desc').value;

    if (catName !== "" && catDesc !== ""){
        createCategory(catName, catDesc);
    }else{
        alert("Please fill in all required fields");
    }
}
function createCategory(catName, catDesc) {
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            if(this.responseText == true){
                alert("New category created successfully!");
                window.location = "forum.php";
            }else{
                alert("Problems creating new category.  Please try again");
            }

        }
        httpReq.open("GET", "functions.php?type=CreateCategory&catName=" + catName + "&catDesc=" + catDesc);
        httpReq.send(null);
    }
}
function checkTopicFields(){

    let topicName = document.getElementById('topic_name').value;
    let dropdown = document.getElementById("selectCategory");
    let topicCategory = dropdown.options[dropdown.selectedIndex].value;
    let topicDesc = document.getElementById('topic_desc').value;

    if (topicName !== "" && topicDesc !== ""){
        createTopic(topicName, topicCategory, topicDesc);
    }else{
        alert("Please fill in all required fields");
    }
}
function createTopic(topicName, topicCategory, topicDesc) {
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            if(this.responseText == true){
                alert("New category created successfully!");
                window.location = "forum.php";
            }else{
                alert("Problems creating new category.  Please try again");
            }

        }
        httpReq.open("GET", "functions.php?type=CreateTopic&topicName=" + topicName + "&topicCategory=" + topicCategory +  "&topicDesc=" + topicDesc);
        httpReq.send(null);
    }
}

function checkPostFields(){

    let postText = document.getElementById('post_desc').value;

    if (postText !== ""){
        createPost(postText);
    }else{
        alert("Please fill in all required fields");
    }
}
function createPost(postText) {
    let httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            if(this.responseText == true){
                alert("New category created successfully!");
                window.location = "forum.php";
            }else{
                alert("Problems creating new category.  Please try again");
            }

        }
        httpReq.open("GET", "functions.php?type=CreatePost&postText=" + postText);
        httpReq.send(null);
    }
}
