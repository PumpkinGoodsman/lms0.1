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
 
if(!isset($_SESSION["user_on_page"])){
   header("Location: index.php");
}

$student_img = "none";
function get_student_details($connection, $studetn_name, $studetn_id) {
    // Sanitize inputs to prevent SQL injection
    $studetn_name = $connection->real_escape_string($studetn_name);
    $studetn_id = $connection->real_escape_string($studetn_id);

    // Corrected SQL query syntax
    $sql = "SELECT student_name , student_Id, student_email, student_phone , student_Adress , student_Password , student_img   FROM student_details WHERE student_name = '$studetn_name' AND student_Id = '$studetn_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_name = $row["student_name"];
            $student_Id = $row["student_Id"];
            $student_email = $row["student_email"];
            $student_phone = $row["student_phone"];
            $student_Adress = $row["student_Adress"];
            $student_Password = $row["student_Password"];
            $student_Img = $row["student_img"];
            global  $student_img;
            $student_img = $student_Img;
           

            // Do something with retrieved values if needed
        }
    } else {
        
    }
}

get_student_details($connection, $user_name, $admin_Id );

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

    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
<style>
        body{
            overflow-x: hidden;
        }
        .ticket-section{
            
            
        }
        .navbar{
           background-color: white;
        }
        .site-header{
            
        }
        .Admin_Btn_area{
            width: 13vw;
            height: auto;
            margin-left: -8%;
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
        .Admin_Variable_frame {
            width: 65vw;
            display: inline-block; /* Automatically adjust height based on content */
            margin-left: 5%;
            background-image: none; 
            background-color:   #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
            overflow-y: scroll;
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
        height: 90vh;
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
    @media (max-width: 430px ) and (min-width: 320px){

        .Admin_Btn_area{
            width: 32vw;
            height: auto;
            margin-left: 2%;
            background-image: none; 
            background-color:  #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
          
            
        }
        .Admin_Variable_frame {
            width: 60vw;
            display: inline-block; /* Automatically adjust height based on content */
            margin-left: 2%;
            background-image: none; 
            background-color:   #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
            overflow-y: scroll;
           
        }
        .row{
            
             
        }
        .Control_btn{
            width: 27vw;
        }
        .pic_area{
            width:18vw;
            height: 6vh;
            margin-left: 17%;
            margin-top: 8%;
            border-radius: 50%;
            
        }
        .img{
            width:18vw;
            height: 6vh;
            position: relative;
            border-radius: 50%;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            margin-left: 5%;
            margin-top: 1%;
 
        }
    }    
       
 
    </style>
</head>

<body>

    <main>
        <?php include 'header.php'; 
            show_student_hader_2();
        ?>
        <section class="ticket-section section-padding" style="background-image: none; background-color: white;" >
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="Admin_Btn_area">
                         <div class="pic_area"  >
                         <?php
                                echo '<img class="img" src="' . $student_img . '" alt="">';
                         ?>
                         </div>
                         <div class="col-12 text-center">
                           <h5 class="mb-4" style="margin-top: 9% ; color: #003366; margin-top:20%; "><?php echo $user_name ?> </h5>
                         </div>

                         <button class=" Control_btn btn custom-btn d-lg-block d-none"  onclick="includeAdminFiles('view Courses')"  >view Courses</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Attempt Quiz')"   >Attempt Quiz</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Join Confrence')">JoinConfrence</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Chat Box')">Chat Box</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Add Guide')">view Grades</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"  onclick="includeAdminFiles('Register To Course')"  >Register To Course</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('Edit Profile')">Edit Profile</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"   onclick="includeAdminFiles('View Marks')">View Marks</button>
                         <button class=" Control_btn btn custom-btn d-lg-block d-none"    onclick="endSession('log Out')" style="color:red;">log Out</button>
                    </div>
                    <div class="Admin_Variable_frame" id="resultDiv">
                        <?php 
                                $currentFormOnPage ="nothing";
                            
                            if (isset($_GET['formToLoad'])) {
                                $currentFormOnPage = $_GET['formToLoad'];
                                if( $currentFormOnPage == "view Courses"){
                                    include 'studentCourses.php';
                                    
                                }
                                if( $currentFormOnPage == "Attempt Quiz"){
                                  //  include 'quiz.php';
                                  include 'Studentquiz.php';
                                  
                                }
                                if( $currentFormOnPage == "View Marks"){
                                    //  include 'quiz.php';
                                    include 'ViewMarks.php';
                                    
                                  }
                                if( $currentFormOnPage == "Join Confrence"){
                                    include 'videoConference.php';
                                }
                                if( $currentFormOnPage == "Chat Box"){
                                    include 'ChatBox.php';
                                }
                                if( $currentFormOnPage == "Register To Course"){
                                    include 'registerToCourse.php';
                                }
                                if( $currentFormOnPage == "Edit Profile"){
                                    include 'editStudentProfile.php';
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
        var countOfLectures = 0 ;     
        var isFirstLecture = true; 
        var  quizTitle = "none";
        var  nameOfCourse = "none";
        var quizHeading = document.getElementById('quiz_heading');
         

        if(currentFormOnPage === "Register To Course" ){

            submitButn = document.getElementById('course_register_submitBtn');
            form_1 = document.getElementById('register_to_course_Form');
            canBeExecuted = true;
            if( canBeExecuted  === true){
                document.addEventListener('DOMContentLoaded', function() {
                    // Bind a click event to the submit button
                submitButn .addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent the default form submission
                            // Get form data
                            submitButn .style.backgroundColor = 'green';
                            var formElement = form_1 ;
                            var formData = new FormData(formElement);               
                            // Send the AJAX request
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'studentAction.php'); // Change this to the actual PHP file that processes the form

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

        }
        if(currentFormOnPage === "Edit Profile" ){

            submitButn = document.getElementById('Edit_Student_submitBtn');
            form_1 = document.getElementById('Edit_Student_myForm');
            canBeExecuted = true;
            if( canBeExecuted  === true){
                document.addEventListener('DOMContentLoaded', function() {
                    // Bind a click event to the submit button
                submitButn .addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent the default form submission
                            // Get form data
                            submitButn .style.backgroundColor = 'green';
                            var formElement = form_1 ;
                            var formData = new FormData(formElement);               
                            // Send the AJAX request
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'studentAction.php'); // Change this to the actual PHP file that processes the form

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

        }
        if(currentFormOnPage === "Attempt Quiz"){
            document.getElementById("load_Quiz_sbmt_btn").addEventListener("click", function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Get the form data
                var form = document.getElementById("view_Quiz_form");
                var formData = new FormData(form);

                // Create an XMLHttpRequest object
                var xhr = new XMLHttpRequest();
                var url = "studentAction.php";

                // Define the function to handle the response
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Success: update the inner HTML of testDiv with the response
                            document.getElementById("testingDiv").innerHTML = xhr.responseText;
                        } else {
                            // Error: handle the error
                            console.error("XHR request failed with status " + xhr.status);
                        }
                    }
                };

                // Open the XHR request
                xhr.open("POST", url, true);

                // Send the form data
                xhr.send(formData);
            });

            function loadQuizData(quiz_title) {
                    var xhr = new XMLHttpRequest();
                    var url = "studentAction.php"; // Get the current page URL
                    var course_name = document.getElementById("dropdown").value;
                    // Define the parameters to be sent in the XHR request
                    var params = 'quiz_title=' + encodeURIComponent(quiz_title) + '&course_name=' + encodeURIComponent(course_name);
                    quizHeading.innerHTML = quiz_title;
                    // Configure the XHR request
                    xhr.open('POST', url, true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    // Define the callback function to handle the response
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Success: update the inner HTML of testingDiv2 with the response
                                document.getElementById("quizForm").innerHTML = xhr.responseText;
                            } else {
                                // Error: handle the error
                                console.error("XHR request failed with status " + xhr.status);
                            }
                        }
                };

                // Send the XHR request with the parameters
                xhr.send(params);
            }

        } 

        function includeAdminFiles (val) {
            var formToLoad = val;
            const url = `studentDashboard.php?formToLoad=${encodeURIComponent(formToLoad)}`;
            window.location.href = url;
           
        }
        function endSession (val){
            var formToLoad = val;
            const url = `studentDashboard.php?formToLoad=${encodeURIComponent(formToLoad)}`;
            window.location.href = url;
            
        }

        function goToCourseIntro( courseName ){   
            const url = `courseIntro.php?courseName=${encodeURIComponent(courseName)}`;
            window.location.href = url;
        }
 
    </script>
        <script>
    document.getElementById("quizForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
         
        var answersArray = [];
        var correctAnswerArray = [];

        // Find all questions and their corresponding answers
        var questions = document.querySelectorAll(".question_row");
        questions.forEach(function(question, index) {
            var questionText = question.querySelector("h6").textContent;
            var answers = question.querySelectorAll("input[type='radio']");
            var correctAnswer = question.querySelector("input[type='hidden']").value;

            var selectedAnswer = "";
            answers.forEach(function(answer) {
                if (answer.checked) {
                    selectedAnswer = answer.value; // Use 'value' instead of 'textContent'
                }
            });

            answersArray.push({ question: questionText, answer: selectedAnswer });
            correctAnswerArray.push({ question: questionText, correctAnswer: correctAnswer });
        });

        // Display answers and correct answers
        displayResults(  answersArray, correctAnswerArray);
    });

    function displayResults(  answersArray, correctAnswerArray) {
        var resultsHTML = "<h6>Results:</h6><br>";
        var totalMarks = correctAnswerArray.length;
        var marksObtained = 0; 
            
        for (var i = 0; i < answersArray.length; i++) {
            resultsHTML += "<span style='border-bottom: 1px solid #888; display: block; padding-bottom: 5px;'>"; // Adding border bottom style
            resultsHTML += "Question " + (i + 1) + ": <br>"; // Corrected syntax
            resultsHTML += "Selected Answer - " + answersArray[i].answer + ", <br>"; // Corrected syntax
            resultsHTML += "<span style='color: green;'>Correct Answer - " + correctAnswerArray[i].correctAnswer + "</span><br>";
            if (answersArray[i].answer === correctAnswerArray[i].correctAnswer) {
                resultsHTML += "<span style='color: green;'>&#10004;</span> - Correct<br>";
                marksObtained++;
            } else {
                resultsHTML += "<span style='color: red;'>&#10008;</span> - Incorrect<br>";
            }
            resultsHTML += "</span>"; // Closing the span for each iteration
        }

        // Adding total marks and marks obtained
        resultsHTML += "<br>Total Marks: " + totalMarks + "<br>";
        resultsHTML += "Marks Obtained: " + marksObtained + "<br>";
        var quiz_title =  quizHeading.innerHTML;
        
        document.getElementById("answers").innerHTML = resultsHTML;
        AddQuizMarks(quiz_title, totalMarks, marksObtained );
         
    }

    function AddQuizMarks(quiz_name, totalMarks, marksObtained ) {
        var xhr = new XMLHttpRequest();
         
        var url = "studentAction.php"; // Get the current page URL
        var course_name = document.getElementById("dropdown").value;
        // Define the parameters to be sent in the XHR request
        var params = 'quiz_name=' + encodeURIComponent(quiz_name) + '&total_marks=' + encodeURIComponent(totalMarks) + '&course_name=' + encodeURIComponent(course_name) + '&obtained_marks=' + encodeURIComponent(marksObtained);
        // Assuming quizHeading is a valid element, update its inner HTML
        

        // Configure the XHR request
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Define the callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Success: update the inner HTML of testingDiv2 with the response
                    document.getElementById("marks_test").innerHTML = xhr.responseText;
                } else {
                    // Error: handle the error
                    console.error("XHR request failed with status " + xhr.status);
                }
            }
        };

        // Send the XHR request with the parameters
        xhr.send(params);
    }






</script>
</body>

</html>