<?php
 //starting Session For navigation
$user_on_page = "unknown";
$user_name ="unknown";
$admin_Id = "unknown";
$is_page_login= "unknown";
$user_on_page=  "unknown";


session_start();
if (isset($_SESSION["user_on_page"])) {
  $user_name =  $_SESSION["username"] ;
  $admin_Id = $_SESSION["admin_Id"];
  $is_page_login = $_SESSION["is_page_login"];
  $user_on_page =  $_SESSION["user_on_page"];

 

  }
function exit_page(){
  header("Location: index.php");
} 
if(!isset($_SESSION["user_on_page"])){
    
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Festava Live - Bootstrap 5 CSS Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-festava-live.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">

    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
    <style>
        
        @media (max-width: 2280px){
            body{
                overflow-x: hidden;
                background-color: #F9F9F9;

            }
            .Login_forms{
                width: 22vw;
                height: 88vh;
                position: absolute;
                z-index: 10;
                top: 0%;
                left: 74%;
                top: 20%;
                opacity: 0.94;
                display: none;  
                border-radius: 20px;
                
            }
            form{
                height: 70vh;
                background-color: transparent;
            }
            .form-entity{
                height: 5vh;
            }
            #teacher_form{
                display: none;
            }
            #form_table{
                display: flex;
            }
            .select_btn{
                background-color: transparent;
                border-radius: 7px;
                width: 5.6vw;
                border: none;
                border-bottom: 1px solid #0074d9; 

            }
            .target_btn_class{
                border: 1px solid #0074d9;
                box-shadow: 0 0 12px #0074d9; 
            }
            #student_form{
                
            }
            #signUp_form{
                width: 45vw;
                height: 94vh;
                position: absolute;
                z-index: 8;
                left: 50%;
                top: 25%;
                opacity: 0.94;
                border: 2px solid white;
                border-radius: 20px;
                background-color: white;
                display: none;
            }
            #signUp_form  {
                
            }
            #signUp_form tr  input{
               
            }
            .ticket-form-body{
                margin-top: -8%;
            }
            form{
                height: 50vh;
                background-color: transparent;
             
            
            }
            #testDiv{
                width: 20vw;
                height: 20vh;
                border: 2px solid red;
            }
            #button {
                display: inline-block;
                background-color: #FF9800;
                width: 50px;
                height: 50px;
                text-align: center;
                border-radius: 4px;
                position: fixed;
                bottom: 30px;
                right: 30px;
                transition: background-color .3s, 
                opacity .5s, visibility .5s;
                opacity: 0;
                visibility: hidden;
                z-index: 1000;
            }
            #button::after {
                content: "\f077";
                font-family: FontAwesome;
                font-weight: normal;
                font-style: normal;
                font-size: 2em;
                line-height: 50px;
                color: #fff;
            }
            #button:hover {
                cursor: pointer;
                background-color: #333;
            }
            #button:active {
                background-color: #555;
            }
            #button.show {
                opacity: 1;
                visibility: visible;
            }

            /* Styles for the content section */

            .content {
                width: 77%;
                margin: 50px auto;
                font-family: 'Merriweather', serif;
                font-size: 17px;
                color: #6c767a;
                line-height: 1.9;
            }
            .content h1 {
                margin-bottom: -10px;
                color: #03a9f4;
                line-height: 1.5;
            }
            .content h3 {
                font-style: italic;
                color: #96a2a7;
            }
   
        }    

        @media (max-width: 830px) and (min-width: 714px) {
            .Login_forms {
                width: 40vw;
                height: 50vh;
                position: absolute;
                z-index: 8;
                left: 29%;
                top: 20%;
                opacity: 0.94;
                display: none;
                border-radius: 20px;
                
                
            }
            form{
                height: 40vh;
                background-color: transparent;
            
            }
            .select_btn{
                background-color: transparent;
                border-radius: 7px;
                width: 12vw;

            }
            #signUp_form{
                width: 60vw;
                height: 550px;
                position: absolute;
                z-index: 8;
                top: 0%;
                left: 20%;
                top: 20%;
                opacity: 0.94;
                border: 2px solid white;
                border-radius: 20px;
                background-color: white;
                display: none;
                 
            }
            .content {
                width: 43%;
            }
            #button {
                margin: 30px;
            }
    
  
        }
        /* Mobile view styles */
@media (max-width: 713px) {
    .Login_forms {
        width: 80vw;
        height: 60vh;
        position: absolute;
        z-index: 8;
        left: 10%;
        top: 10%;
        opacity: 0.94;
        display: none;
        border-radius: 20px;
    }

    form {
        height: 50vh;
        background-color: transparent;
    }

    .select_btn {
        background-color: transparent;
        border-radius: 7px;
        width: 70%;
        margin: 10px auto;
    }

    #signUp_form {
        width: 80vw;
        height: 600px;
        position: absolute;
        z-index: 8;
        top: 10%;
        left: 10%;
        opacity: 0.94;
        border: 2px solid white;
        border-radius: 20px;
        background-color: white;
        display: none;
    }

    .content {
        width: 80%;
        margin: 0 auto;
    }

    #button {
        margin: 20px;
    }
}

  
    </style>
</head>

<body >

    <main >
         <?php include 'header.php'; ?>
         <?php
            if($user_on_page == "unknown"){
                show_hader();
            }
            if($user_on_page == "admin"){
                show_admin_hader();
            }
            if($user_on_page == "guide"){
                show_guide_hader_2();
            }
            if($user_on_page == "student"){
                show_student_hader();
            }
         ?>
         <?php include 'intro.php'; ?>
         <?php include 'loginForm.php'; ?>
         <?php include 'signUp.php'; ?>
         <?php include 'about.php'; ?>
         <?php include 'staff.php'; ?>
         <?php include 'courses.php'; ?>
         <?php include 'events.php'; ?>
         <?php include 'packages.php'; ?>
         <?php include 'contactUs.php'; ?>
         <a id="button"></a>
         <?php include 'footer.php'; ?>
 
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script>

        var formElement = document.getElementById('Login_form');
        var showStudentBtn = document.getElementById('student_btn');
        var showTeacherBtn = document.getElementById('teacher_btn');
        var studentform = document.getElementById('student_form');
        var teacherForm = document.getElementById('teacher_form');
        var studentSubmitBtn = document.getElementById('student_form_btn');
        var TeacherSubmitBtn = document.getElementById('teacher_form_btn');
        
        var signUpformElement = document.getElementById('signUp_form');
        var signUpForm = document.getElementById('Sign_up_form');
        var signUpBtn = document.getElementById('Sign_up_form_btn');
         

        function hideLoginForm(){
            formElement.style.display = 'none';
            signUpformElement.style.display = 'none';
        }

        function showLoginForm(){
            formElement.style.display = 'block'; // or 'inline' or any other valid display value
            signUpformElement.style.display = 'none';
            scrollThePage();
        }
        function showStudentForm(){
            studentform.style.display = 'block';
            showStudentBtn.classList.add('target_btn_class');
            teacherForm.style.display = 'none';
            showTeacherBtn.classList.remove('target_btn_class');
        }
        function showTeacherForm(){
            teacherForm.style.display = 'block';
            showTeacherBtn.classList.add('target_btn_class');
            studentform.style.display = 'none';
            showStudentBtn.classList.remove('target_btn_class');

        }
        function showSignUpForm(){

            formElement.style.display = 'none';
            signUpformElement.style.display = 'block';
            scrollThePage();

        }

        function scrollThePage() {
            const section = document.getElementById('section_1');
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function refreshPage() {
            // No need for the yValue parameter as you are navigating to a specific section
            const url = 'index.php';
            window.location.href = url;
        }

        document.addEventListener('DOMContentLoaded', function() {
                 
                studentSubmitBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    // Get form data
                    var formElement = studentform;
                    var formData = new FormData(formElement);
                
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'loginAction.php'); // Change this to the actual PHP file that processes the form
                    
                    xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response in the resultDiv
                         refreshPage();
                         var response = JSON.parse(xhr.responseText);
                         document.getElementById('testDiv').innerHTML = xhr.responseText;
                        
                    
                    } else {
                        // Handle errors if any
                        alert('Wrong Information');
                    }
                    };

                    xhr.onerror = function() {
                    // Handle errors if any
                    alert('An error occurred while processing the form.');
                    };

                    xhr.send(formData);
                    
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit buttonm
                TeacherSubmitBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    // Get form data
                    var formElement = teacherForm;
                    var formData = new FormData(formElement);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'loginAction.php'); // Change this to the actual PHP file that processes the form

                    xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response in the resultDiv
                        //var response = JSON.parse(xhr.responseText);
                        document.getElementById('testDiv').innerHTML = xhr.responseText;
                        hideLoginForm();
                    
                    } else {
                        // Handle errors if any
                        alert('An error occurred while processing the form.');
                    }
                    };

                    xhr.onerror = function() {
                    // Handle errors if any
                    alert('An error occurred while processing the form.');
                    };

                    xhr.send(formData);
                    
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit buttonm
                signUpBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    // Get form data
                    var formElement =  signUpForm ;
                    var formData = new FormData(formElement);
                    var password = formData.get('password');
                    var confrmPassword = formData.get('confrm_password');
                    if(password ===  confrmPassword ){
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'loginAction.php'); // Change this to the actual PHP file that processes the form

                        xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Display the response in the resultDiv
                            //var response = JSON.parse(xhr.responseText);
                            document.getElementById('testDiv').innerHTML = xhr.responseText;
                            signUpBtn.style.backgroundColor = 'green';
                            signUpBtn.innerText = 'Submitted'; 
                            hideLoginForm();
                        
                        } else {
                            // Handle errors if any
                            alert('An error occurred while processing the form.');
                        }
                        };

                        xhr.onerror = function() {
                        // Handle errors if any
                        alert('An error occurred while processing the form.');
                        };

                        xhr.send(formData);
                    }
                    else{
                        alert("password dosent Match");
                    }    
                    
                });
            });
            // Function to get and log Y-axis position of mouse
// Add event listener for mousemove event on the document
        document.addEventListener("mousemove", function(event) {
            // Get Y-axis position of mouse
            var yPosition = event.clientY;

            // Log the Y-axis position to the console
            console.log("Y-axis position: " + yPosition);
        });

        var btn = $('#button');

        $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
        });

        btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
        });


 
    </script>

</body>

</html>