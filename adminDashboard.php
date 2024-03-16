<?php
  include 'connection.php'; 

  $user_on_page = "unknown";
  $user_name ="unknown";
  $admin_Id = "unknown";
  $is_page_login= "unknown";
  $user_on_page=  "unknown";


  session_start();
  if (isset($_SESSION["user_on_page"])) {
    $user_name =  $_SESSION["username"] ;
    $admin_Id = $_SESSION["admin_Id"];
    $is_page_login= $_SESSION["is_page_login"];
    $user_on_page=  $_SESSION["user_on_page"];

    }
  function exit_page(){
    header("Location: index.php");
  } 
  if(!isset($_SESSION["user_on_page"])){
     header("Location: index.php");
  }

  $img = "none";
  function fetch_user_details($connection, $admin_name, $admin_id) {
    // Sanitize inputs to prevent SQL injection
    $admin_name = $connection->real_escape_string($admin_name);
    $admin_id = $connection->real_escape_string($admin_id);

    // Corrected SQL query syntax
    $sql = "SELECT Admin_Name, admin_Email, admin_Id, Admin_Img FROM admin_info WHERE Admin_Name = '$admin_name' AND admin_Id = '$admin_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $admin_name = $row["Admin_Name"];
            $admin_Id = $row["admin_Id"];
            $admin_email = $row["admin_Email"];
            $admin_img = $row["Admin_Img"];
            global  $img;
            $img = $admin_img ;
           

            // Do something with retrieved values if needed
        }
    } else {
        echo "No records found";
    }
}
fetch_user_details($connection, $user_name, $admin_Id );
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        if (!isset($_SESSION["user_on_page"])) {
            echo '<meta http-equiv="refresh" content="5">';
        }
    ?>
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

    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
<style>
        
        body{
            overflow-x: hidden;
             
            animation: loading 0.5s linear;
             
        }
        @keyframes loading {
            0% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        .ticket-section{
            
            
        }
        .navbar{

        }
        .site-header{
            background-color: #269524;
        }
        .Admin_Btn_area{
            width: 13vw;
            height: auto;
            margin-left: -4%;
            background-image: none; 
            background-color:  #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
            
        }
        .pic_area{
            width: 8vw;
            height: 15vh;
            border-radius: 50%;
            
             
        }
        .img{
            width: 8vw;
            height: 16vh;
            position: relative;
            border-radius: 50%;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            margin-top: 4%;
            margin-left: 18%;
        }
        .Admin_Variable_frame{
            width: 70vw;
            display: inline-block; /* Automatically adjust height based on content */
            margin-left: 2%;
            background-image: none; 
            background-color:   #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
        }
        tr{
           
            
        }
        tr th{
            color: white;
            width: 15vw;
            background-color: transparent;
            border-radius: 0px;
        }
        td{
            height: 10vh;
        }
        input{
            width: 15vw;
            height: 10vh;
            border: none;
            border-radius: 0px;
            background-color: transparent;
            border-left: 1px solid #269524;
            border-bottom: 1px solid #269524;

        }
        .file-input{
            background-color: greenyellow;
        }
  
        #dropdown{
            background-color: #269524;  
            color: white;
            border: none;
            width: 15vw;
            border-radius: 7px;
            border-left: 1px solid #269524;
            border-bottom: 1px solid #269524;
 
        }
 
        .parent_courses{
            width: 14vw;
            display: inline-block; 
 
        }
        .course_btn{
            background-color: greenyellow;
            border: transparent;
            width: 12vw;
        }
        .course_btn:hover{
            background-color: white;
        }
        .Control_btn{
            margin-top: 0%; 
            border-radius: 0px; 
            width: 11vw;
            border-top: 0.5px solid white;
            background-color:  #D3D3D3;
            color:#150E19; 
        }
        .Control_btn:hover{
            background-color: white;
            color:#333333;
        }
        .viewCoursesArea{
            width: 64vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
             
           
        }
        .parent_courses{
            width: 14vw;
            height: 60vh;
            display: flex;
            flex-direction: column;
             
        }
        .course_div{
            width: 75vw;
            height: 58vh;
            margin-top: 10%;
            
            
        }
        .col-md-6{
             width: 40vw;
             margin-left: 50px;
        }
        .row1{
            display: flex;
            flex-direction: row;
            
            
        }

       #testDiv{
        width: 20vw;
        height: 20vh;'
      border: 2px solid red;
       }
       .site-footer-top{
         background-color: #269524;
       }

       @media (max-width: 830px ) and (min-width: 714px){

            .Admin_Btn_area{
                width: 18vw;
                height: auto;
                margin-left: -4%;
                background-image: none; 
                background-color:  #D3D3D3; 
                filter: drop-shadow(2px 2px 4px grey);
            
                
            }
            .pic_area{
                width: 8vw;
                height: 6vh;
                border-radius: 50%;
            }
            .img{
                width: 8vw;
                height: 6vh;
                position: relative;
                border-radius: 50%;
                border: 2px solid white ;
                filter: drop-shadow(2px 2px 4px white);
                margin-top: 4%;
                margin-left: 23%;
            }
            .Admin_Variable_frame {
                width: 68vw;
                display: inline-block; /* Automatically adjust height based on content */
                margin-left: 5%;
                background-image: none; 
                background-color:   #D3D3D3; 
                filter: drop-shadow(2px 2px 4px grey);
                overflow-y: scroll;
            
                
            }
            .course_btn{
                background-color: greenyellow;
                border: 2px soid red;
                width: 17vw;
            }
            .course_btn:hover{
                background-color: white;
            }
            .Control_btn{
                margin-top: 0%; 
                border-radius: 0px; 
                width: 11vw;
                border-top: 0.5px solid white;
                background-color:  #D3D3D3;
                color:#150E19; 
            }
            form{
                
                
            }
            tr th{
                color: white;
                width: 15vw;
                background-color: transparent;
                border-radius: 0px;
                
            }
            td{
                height: 2vh;
            }
            input{
                width: 20vw;
                height: 4vh;
                border: none;
                border-radius: 0px;
                background-color: transparent;
                border-left: 1px solid #269524;
                border-bottom: 1px solid #269524;

            }
        }

 
    </style>
</head>

<body>

    <main>
         <?php include 'header.php'; 
           show_admin_hader_2();
         ?>
         
         <section class="ticket-section section-padding" style="background-image: none; background-color: white;">
            <div class="section-overlay"  ></div>
            <div class="container"  >
                <div class="row">
                    <div class="Admin_Btn_area">
                         <div class="pic_area"  >
                         <?php
                                echo '<img class="img" src="' . $img . '" alt="">';
                         ?>
                         </div>
                         <div class="col-12 text-center">
                           <h5 class="mb-4" style="margin-top: 9% ; color: #003366; margin-top:20%; ">  <?php echo $user_name ?>  </h5>
                         </div>
                         <button  class=" Control_btn btn custom-btn d-lg-block d-none"  onclick="includeAdminFiles('Add Course')"  >Add Course</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('EditCourse')"   >EditCourse</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Del Course')">Del Course</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('View Courses')">View Courses</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Add Guide')">Add Guide</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Edit Guide')">Edit Guide</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('View Guides')">View Guides</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Add Event')">Add Event</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Edit Event')">Edit Event</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Delete Events')">Delete Events</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Add Blog')">Add Blog</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('View Blogs')">View Blogs</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Delete Blog')">Delete Blog</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('VideoConfrence')">VideoConfrence</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="endSession('log Out')" style="color:red;"  >log Out</button>

                    </div>
                    <div class="Admin_Variable_frame" id="resultDiv"   >
                         
                        <?php 
                            $currentFormOnPage ="nothing";
                            if (!isset($_GET['formToLoad'])){
                                include 'animation.php';
                            }
                            
                            if (isset($_GET['formToLoad'])) {
                                $currentFormOnPage = $_GET['formToLoad'];
                                if( $currentFormOnPage == "nothing"){
                                    include 'animation.php';

                                }
                                if( $currentFormOnPage == "Add Course"){
                                    include 'addCourse.php';

                                }
                                if( $currentFormOnPage == "EditCourse"){
                                    include 'editCourse.php';
                                }
                                if( $currentFormOnPage == "Del Course"){
                                    include 'deleteCourse.php';
                                }
                                if( $currentFormOnPage == "View Courses"){
                                    include 'viewCourses.php';
                                }
                                if( $currentFormOnPage == "Add Guide"){
                                    include 'addGuide.php';
                                }
                                if( $currentFormOnPage == "Edit Guide"){
                                    include 'editGuide.php';
                                }
                                if( $currentFormOnPage == "View Guides"){
                                    include 'viewGuides.php';
                                }
                                if( $currentFormOnPage == "Add Event"){
                                    include 'addEvent.php';
                                }
                                if( $currentFormOnPage == "Edit Event"){
                                    include 'editEvent.php';
                                }
                                if( $currentFormOnPage == "Delete Events"){
                                    include 'deleteEvent.php';
                                }
                                if( $currentFormOnPage == "Add Blog"){
                                    include 'deleteEvent.php';
                                }
                                if( $currentFormOnPage == "View Blogs"){
                                    
                                }
                                if( $currentFormOnPage == "Delete Blog"){
                                    
                                }
                                if( $currentFormOnPage == "VideoConfrence"){
                                         
                                    include 'videoConference.php';
                                }
                                if( $currentFormOnPage == "log Out"){
                                     
                                    session_start();

                                    // Unset all session variables
                                    $_SESSION = array();
                                    
                                    // Destroy the session
                                    session_destroy();
                                    
                                    // Redirect to index.php
                                    
                                     
                                    exit;
                                
                                }

                            }  
                           
                        ?>   
 
                    </div>
                    <div id="testDiv" ></div>
                </div>
            </div>    
        </section>
        <?php include 'footer.php'; ?>
    </main>
        <!--

T e m p l a t e M o

-->

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    
    <script>

        var currentFormOnPage = <?php echo json_encode($currentFormOnPage); ?>;
        var canBeExecuted = false;
        var canSubmitParentCourse = true; 
        var canSubmitSubCourse = false; 
        var canSubmitIntro = false;  
        var countOfSubCourses = 0 ;     
        var submitButn_1 = document.getElementById('submitBtn');
        var submitButn_2 = document.getElementById('submitBtn2');
        var submitButn_3 = document.getElementById('submitBtn3');
        var form_1 = document.getElementById('myForm');
        var form_2 = document.getElementById('myForm2');
        var form_3 = document.getElementById('myForm3');


        if(currentFormOnPage === "Add Course" ){

            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit buttonm
                submitButn_1.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    if(  canSubmitParentCourse === true){
                        // Get form data
                        var formElement = form_1;
                        var formData = new FormData(formElement);
                        var subCourseCount = formData.get('Sub_courses');
                        var subCourseCountInt = parseInt(subCourseCount, 10); // The second argument (10) specifies the base (decimal) for parsing
                        countOfSubCourses = subCourseCountInt;                             
                        submitButn_1.style.backgroundColor = 'green';
                        submitButn_1.innerText = 'Submitted';
                        canSubmitSubCourse = true;    
                        // Send the AJAX request
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'adminDashboardAction.php'); // Change this to the actual PHP file that processes the form

                        xhr.onload = function() {
                        if (xhr.status === 200) { 
                            // Display the response in the resultDiv
                            document.getElementById('testDiv').innerHTML = xhr.responseText;
                        
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
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit button
                submitButn_2.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    if( canSubmitSubCourse === false &&  countOfSubCourses <= 0  &&  canSubmitParentCourse === true ){
                        alert("First Submit The Parent Course");
                    }
                    if( canSubmitSubCourse === false &&  countOfSubCourses > 0 && canSubmitIntro === true ){
                        alert("please Submit Course Intro First");
                    }
                    if( canSubmitSubCourse === true  &&  countOfSubCourses > 0 ){
                        // Get form data
                        submitButn_1.style.backgroundColor = 'blue';
                        var formElement = form_2;
                        var formData = new FormData(formElement);
                        countOfSubCourses = countOfSubCourses - 1;
                        canSubmitParentCourse = false;
                        canSubmitSubCourse  = false;
                        canSubmitIntro = true;                  
                        // Send the AJAX request
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'adminDashboardAction.php'); // Change this to the actual PHP file that processes the form

                        xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Display the response in the resultDiv
                            document.getElementById('testDiv').innerHTML = xhr.responseText;
                        
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
                        
                    }  
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit button
                submitButn_3.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    if( canSubmitIntro === true ){
                        // Get form data
                        if(countOfSubCourses <= 0 ){
                            canSubmitParentCourse = false; 
                            canSubmitSubCourse = false; 
                            canSubmitIntro = false;  
                            submitButn_2.style.backgroundColor = 'green';
                            submitButn_2.innerText = 'Submission Complete';
                            submitButn_3.style.backgroundColor = 'green';
                            submitButn_3.innerText = 'Submission Complete';
                            alert("You Have Submitted all the Subcourses");
                        }
                        canSubmitSubCourse = true; 
                        var formElement = form_3;
                        var formData = new FormData(formElement);
                        // Send the AJAX request
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'adminDashboardAction.php'); // Change this to the actual PHP file that processes the form

                        xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Display the response in the resultDiv
                            document.getElementById('testDiv').innerHTML = xhr.responseText;
                        
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
                        alert("please Fill above Forms");
                    }  
                });
            });
        }

        else{
            /*
            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit buttonm
                submitButn_1.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                     
                    // Get form data
                    var formElement = form_1;
                    var formData = new FormData(formElement);
                    // The second argument (10) specifies the base (decimal) for parsing                             
                    submitButn_1.style.backgroundColor = 'green';
                    submitButn_1.innerText = 'Submitted';  
                    // Send the AJAX request
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'adminPanelAction.php'); // Change this to the actual PHP file that processes the form

                    xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response in the resultDiv
                        // document.getElementById('subCourse_div').innerHTML = xhr.responseText;
                        console.log("Submitted Form 1");
                    
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
                // Bind a click event to the submit button
                submitButn_2.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                        // Get form data
                    var formElement = form_2;
                    var formData = new FormData(formElement);
                    submitButn_2.style.backgroundColor = 'green';
                    submitButn_2.innerText = 'Submitted'; 
                    // Send the AJAX request
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'adminPanelAction.php'); // Change this to the actual PHP file that processes the form

                    xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response in the resultDiv
                        document.getElementById('subCourse_div').innerHTML = xhr.responseText;
                    
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
                // Bind a click event to the submit button
                submitButn_3.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                        // Get form data
                    var formElement = form_3;
                    var formData = new FormData(formElement);
                    submitButn_3.style.backgroundColor = 'green';
                    submitButn_3.innerText = 'Submitted'; 
                    // Send the AJAX request
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'adminPanelAction.php'); // Change this to the actual PHP file that processes the form

                    xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response in the resultDiv
                        document.getElementById('subCourse_div').innerHTML = xhr.responseText;
                    
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

         */
        }
        if(currentFormOnPage === "EditCourse"    ){

            submitButn_1 = document.getElementById('edit_parent_submitBtn');
            submitButn_2 = document.getElementById('edit_subcourse_submitBtn');
            submitButn_3 = document.getElementById('edit_corse_info_submitBtn');
            form_1 = document.getElementById('edit_parent_course');
            form_2 = document.getElementById('edit_Sub_course');
            form_3 = document.getElementById('edit_course_info');
            canBeExecuted = true;
        }
        if(currentFormOnPage === "Del Course"    ){

            submitButn_1 = document.getElementById('delete_parent_submitBtn');
            submitButn_2 = document.getElementById('delete_subcourse_submitBtn');
            submitButn_3 = document.getElementById('delete_corse_info_submitBtn');
            form_1 = document.getElementById('delete_parent_Course');
            form_2 = document.getElementById('delete_Sub_course');
            form_3 = document.getElementById('Delete_info');
            canBeExecuted = true;
        }
        if(currentFormOnPage === "Add Guide"){

            submitButn_1 = document.getElementById('add_guide_submitBtn');
            form_1 = document.getElementById('add_guide_myForm');
            canBeExecuted = true;
        }
        if(currentFormOnPage === "Edit Guide" ){

            submitButn_1 = document.getElementById('edit_Guide_submitBtn');
            form_1 = document.getElementById('edit_Guide_Form');
            canBeExecuted = true;
        }
        if(currentFormOnPage === "Add Event" ){
             
            submitButn_1 = document.getElementById('add_event_submitBtn');
            submitButn_2 = document.getElementById('add_event_submitBtn2');
            submitButn_3 = document.getElementById('add_event_submitBtn3');
            form_1 = document.getElementById('add_event_myForm');
            form_2 = document.getElementById('add_event_myForm2');
            form_3 = document.getElementById('add_event_myForm3');
            canBeExecuted = true;
 
        }
        if( canBeExecuted  === true){
    
            document.addEventListener('DOMContentLoaded', function() {
                // Bind a click event to the submit buttonm
                submitButn_1.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    
                    // Get form data
                    var formElement = form_1;
                    var formData = new FormData(formElement);
                    var subCourseCount = formData.get('Sub_courses');                            
                    submitButn_1.style.backgroundColor = 'green';
                    submitButn_1.innerText = 'Submitted';  
                    // Send the AJAX request
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'adminDashboardAction.php'); // Change this to the actual PHP file that processes the form

                    xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Display the response in the resultDiv
                        document.getElementById('testDiv').innerHTML = xhr.responseText;
                    
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
                // Bind a click event to the submit button
                submitButn_2.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                        // Get form data
                        submitButn_2.style.backgroundColor = 'green';
                        var formElement = form_2;
                        var formData = new FormData(formElement);               
                        // Send the AJAX request
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'adminDashboardAction.php'); // Change this to the actual PHP file that processes the form

                        xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Display the response in the resultDiv
                            document.getElementById('testDiv').innerHTML = xhr.responseText;
                        
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
                // Bind a click event to the submit button
                submitButn_3.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                        submitButn_3.style.backgroundColor = 'green';
                        canSubmitSubCourse = true; 
                        var formElement = form_3;
                        var formData = new FormData(formElement);
                        // Send the AJAX request
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'adminDashboardAction.php'); // Change this to the actual PHP file that processes the form
                        xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Display the response in the resultDiv
                            document.getElementById('testDiv').innerHTML = xhr.responseText;
                        
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

        }
        
        function getCourse(courseName){
            var alphaElement = document.getElementById('sub_corses_List_area');
            var xhr = new XMLHttpRequest();

            // Include the subject variable in the URL
            xhr.open('GET', 'adminDashboardAction.php?subject=' + encodeURIComponent(subject), true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alphaElement.innerHTML = xhr.responseText;
                    } else {
                        console.error('Error fetching content from PHP');
                    }
                }
            };
            xhr.send();
        }
        
        function includeAdminFiles (val) {
            var formToLoad = val;
            const url = `adminDashboard.php?formToLoad=${encodeURIComponent(formToLoad)}`;
            window.location.href = url;
           
        }
 
        function endSession (val){
            var formToLoad = val;
            const url = `adminDashboard.php?formToLoad=${encodeURIComponent(formToLoad)}`;
            window.location.href = url;
            
        }

        function goToCourseIntro( courseName ){   
            const url = `courseIntro.php?courseName=${encodeURIComponent(courseName)}`;
            window.location.href = url;
        }
 
    </script>
</body>

</html>