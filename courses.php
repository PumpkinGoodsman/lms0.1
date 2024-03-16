  <style>

    .artists-hover{
         background-color: #808080;
         border:0px solid #D3D3D3;
         color: #FFFFFF;
    }
    h2{
        margin-bottom: 20%;
    }
 
 </style>

<?php 
 
 
 include 'connection.php';
 
 if (session_status() == PHP_SESSION_NONE) {
     // Check if a session is not already started
     ob_start(); // Start output buffering
     session_start(); // Start the session
 }
 
 $course_name = "none";
 $user_on_page = "unknown";
 $user_name = "unknown";
 $admin_Id = "unknown";
 $is_page_login = "unknown";
 
 if (isset($_SESSION["user_on_page"])) {
     $user_name = $_SESSION["username"];
     $admin_Id = $_SESSION["admin_Id"];
     $is_page_login = $_SESSION["is_page_login"];
     $user_on_page = $_SESSION["user_on_page"];
 }
  
 


 function show_courses($connection) {
    $sql = "SELECT C_Name, Description, Guide_name, Guide_Email, ImgName, course_duration FROM parent_courses";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = htmlspecialchars($row["C_Name"]);
            $Description = htmlspecialchars($row["Description"]);
            $Guide_name = htmlspecialchars($row["Guide_name"]);
            $Guide_Email = htmlspecialchars($row["Guide_Email"]);
            $Img_name = htmlspecialchars($row["ImgName"]);
            $course_duration = htmlspecialchars($row["course_duration"]);

            // Remove global declarations for $user_on_page and $is_page_login if they are not global variables

            echo '
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="artists-thumb" style=" border:0px solid  #150E19; border-radius:20px;  filter: drop-shadow(2px 2px 4px transparent);" >
                        <div class="artists-image-wrap">
                            <img src="' .$Img_name . '" class="artists-image img-fluid">
                        </div>
                        <div class="artists-hover">
                            <p style=" color: white; ">
                                <strong>Course Name:</strong>
                                ' .  $course_name . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Description:</strong>
                                ' . $Description . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Course Duration:</strong>
                                ' . $course_duration . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Guide Name:</strong>
                                ' . $Guide_name . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Guide Email:</strong>
                                ' . $Guide_Email . '
                            </p>
                            <hr>
                            <p class="mb-0">
                                <strong>Go to Course:</strong>
                                <a href="#" onclick="loginMassage()">Join Course</a>
                            </p>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "No results found.";
    }
}

function show_admin_courses($connection) {
    $sql = "SELECT C_Name, Description, Guide_name, Guide_Email, ImgName, course_duration FROM parent_courses";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = htmlspecialchars($row["C_Name"]);
            $Description = htmlspecialchars($row["Description"]);
            $Guide_name = htmlspecialchars($row["Guide_name"]);
            $Guide_Email = htmlspecialchars($row["Guide_Email"]);
            $Img_name = htmlspecialchars($row["ImgName"]);
            $course_duration = htmlspecialchars($row["course_duration"]);

            // Remove global declarations for $user_on_page and $is_page_login if they are not global variables

            echo '
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="artists-thumb" style=" border:0px solid  #150E19; border-radius:20px;  filter: drop-shadow(2px 2px 4px transparent);">
                        <div class="artists-image-wrap">
                            <img src="' .$Img_name . '" class="artists-image img-fluid">
                        </div>
                        <div class="artists-hover">
                            <p style=" color: white; ">
                                <strong>Course Name:</strong>
                                ' .  $course_name . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Description:</strong>
                                ' . $Description . '
                            </p>
                            <p>
                                <strong>Course Duration:</strong>
                                ' . $course_duration . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Guide Name:</strong>
                                ' . $Guide_name . '
                            </p>
                            <p style=" color: white; ">
                                <strong>Guide Email:</strong>
                                ' . $Guide_Email . '
                            </p>
                            <hr>
                            <p class="mb-0">
                                <strong>Go to Course:</strong>
                                <a href="#"  onclick=" adminNavigate(\'' . $course_name . '\')">Join Course</a>
                            </p>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "No results found.";
    }
}

function show_guide_courses($connection ,   $user_name) {
    $sql = "SELECT C_Name, Description, Guide_name, Guide_Email, ImgName, course_duration FROM parent_courses";
    $result = $connection->query($sql);
     
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = htmlspecialchars($row["C_Name"]);
            $Description = htmlspecialchars($row["Description"]);
            $Guide_name = htmlspecialchars($row["Guide_name"]);
            $Guide_Email = htmlspecialchars($row["Guide_Email"]);
            $Img_name = htmlspecialchars($row["ImgName"]);
            $course_duration = htmlspecialchars($row["course_duration"]);

            // Remove global declarations for $user_on_page and $is_page_login if they are not global variables

            echo '
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="artists-thumb"  style=" border:0px solid  #150E19; border-radius:20px;  filter: drop-shadow(2px 2px 4px #219c02);">
                        <div class="artists-image-wrap">
                            <img src="' .$Img_name . '" class="artists-image img-fluid">
                        </div>
                        <div class="artists-hover">
                            <p>
                                <strong>Course Name:</strong>
                                ' .  $course_name . '
                            </p>
                            <p>
                                <strong>Description:</strong>
                                ' . $Description . '
                            </p>
                            <p>
                                <strong>Course Duration:</strong>
                                ' . $course_duration . '
                            </p>
                            <p>
                                <strong>Guide Name:</strong>
                                ' . $Guide_name . '
                            </p>
                            <p>
                                <strong>Guide Email:</strong>
                                ' . $Guide_Email . '
                            </p>
                            <hr>
                            <p class="mb-0">
                                <strong>Go to Course:</strong>
                                <a href="#" onclick="guideNavigate(\'' . $user_name  . '\', \'' . $course_name. '\')">Join Course</a>
                            </p>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "No results found.";
    }
}

function show_student_courses($connection ,  $user_name) {
    $sql = "SELECT C_Name, Description, Guide_name, Guide_Email, ImgName, course_duration FROM parent_courses";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = htmlspecialchars($row["C_Name"]);
            $Description = htmlspecialchars($row["Description"]);
            $Guide_name = htmlspecialchars($row["Guide_name"]);
            $Guide_Email = htmlspecialchars($row["Guide_Email"]);
            $Img_name = htmlspecialchars($row["ImgName"]);
            $course_duration = htmlspecialchars($row["course_duration"]);

            // Remove global declarations for $user_on_page and $is_page_login if they are not global variables

            echo '
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="artists-thumb" style=" border:2px solid  #150E19; border-radius:20px;  filter: drop-shadow(2px 2px 4px #219c02);">
                        <div class="artists-image-wrap">
                            <img src="' .$Img_name . '" class="artists-image img-fluid">
                        </div>
                        <div class="artists-hover">
                            <p>
                                <strong>Course Name:</strong>
                                ' .  $course_name . '
                            </p>
                            <p>
                                <strong>Description:</strong>
                                ' . $Description . '
                            </p>
                            <p>
                                <strong>Course Duration:</strong>
                                ' . $course_duration . '
                            </p>
                            <p>
                                <strong>Guide Name:</strong>
                                ' . $Guide_name . '
                            </p>
                            <p>
                                <strong>Guide Email:</strong>
                                ' . $Guide_Email . '
                            </p>
                            <hr>
                            <p class="mb-0">
                                <strong>Go to Course:</strong>
                                <a href="#"  onclick=" studentNavigate(\'' . $user_name  . '\', \'' . $course_name. '\')">Join Course</a>
                            </p>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "No results found.";
    }
}



//<a href = "#" onclick="goToSubCoursesPage(\'' . $course_name . '\')">Join Course</a>
 
?>
 
 
        <section class="artists-section section-padding" id="section_3"  style="background-image: none; background-color:  #D3D3D3;">
            <div class="row">
                <div class="col-12 text-center" style="margin-bottom : 10%;">
                    <h2 class="mb-4" style="color: #003366 ;">Our Courses</h1>
                </div>
                <?php
                if($user_on_page =="admin" ){
                    show_admin_courses($connection);
                     
                } 
                if($user_on_page =="guide" ){
                    show_guide_courses($connection ,  $user_name);
                } 
                if($user_on_page =="student" ){
                    show_student_courses($connection ,  $user_name);
                }
                if($user_on_page =="unknown" ){
                    show_courses($connection);
                }
                ?>
        
            </div>
        </section>

<script>
    
 
    function loginMassage( ){
     //   alert("kindly login on page");
    }
    function adminNavigate(courseName) {
        
        var parentCourseName = courseName;
        const url = `subCourses.php?parentCourseName=${encodeURIComponent(parentCourseName)}`;
        window.location.href = url;

    }
    function guideNavigate(userName , courseName) {

            var formElement = [userName, courseName];
            var formData = new FormData();
            var UserOnPage = "Guide";
            // Assuming you want to send userName and courseName as form data
            formData.append('userName', userName);
            formData.append('courseName', courseName);
            formData.append('user_on_page', UserOnPage);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'courseAction.php'); // Change this to the actual PHP file that processes the form

            xhr.onload = function () {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    // Access individual variables
                    var isRegistered = response.isRegistered;
                   
                    if(isRegistered === true){
                           var parentCourseName = courseName;
                           const url = `subCourses.php?parentCourseName=${encodeURIComponent(parentCourseName)}`;
                           window.location.href = url;
                    }
                    if(isRegistered === false){
                            alert("hello World");
                    }

                } else {
                    // Handle errors if any
                    alert('An error occurred while processing the form.');
                }
            };

            xhr.onerror = function () {
                // Handle errors if any
                alert('An error occurred while processing the form.');
            };

            xhr.send(formData);


    }
    function studentNavigate(userName , courseName) {
         //   var parentCourseName = courseName;
         //   const url = `subCourses.php?parentCourseName=${encodeURIComponent(parentCourseName)}`;
         //   window.location.href = url;


            var formElement = [userName, courseName];
            var formData = new FormData();
            var UserOnPage = "student";
            // Assuming you want to send userName and courseName as form data
            formData.append('userName', userName);
            formData.append('courseName', courseName);
            formData.append('user_on_page', UserOnPage);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'courseAction.php'); // Change this to the actual PHP file that processes the form

            xhr.onload = function () {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    // Access individual variables
                    var isRegistered = response.isRegistered;
                   
                    if(isRegistered === true){
                           var parentCourseName = courseName;
                           const url = `subCourses.php?parentCourseName=${encodeURIComponent(parentCourseName)}`;
                           window.location.href = url;
                    }
                    if(isRegistered === false){
                            alert("hello World");
                    }
                } else {
                    // Handle errors if any
                    alert('An error occurred while processing the form.');
                }
            };

            xhr.onerror = function () {
                // Handle errors if any
                alert('An error occurred while processing the form.');
            };

            xhr.send(formData);
    }
</script>


