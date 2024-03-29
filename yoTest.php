<?php

include 'connection.php';
$course_name = "none";
$user_on_page = "unknown";
$user_name ="unknown";
$admin_Id = "unknown";
$is_page_login= "unknown";
$user_on_page=  "unknown";

ob_start();
session_start();
if (isset($_SESSION["user_on_page"])) {
$user_name =  $_SESSION["username"] ;
$admin_Id = $_SESSION["admin_Id"];
$is_page_login = $_SESSION["is_page_login"];
$user_on_page =  $_SESSION["user_on_page"];

echo $user_name;
echo '<br>';
echo $admin_Id ;
echo '<br>';
echo $is_page_login;
echo '<br>';
echo  $user_on_page;
echo '<br>';

}

if(!isset($_SESSION["user_on_page"])){

}
ob_end_flush();


function fetch_courses($connection , $student_name, $student_id) {
    $sql = "SELECT C_Name FROM parent_courses";
    $result = $connection->query($sql);
 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = $row["C_Name"];
 
             echo $course_name;
             echo "<br>";
             echo  $student_name;
             echo "<br>";
             echo  $student_id;
             check_if_registered_already($connection, $course_name, $student_name, $student_id);
        }
    } else {
        echo "No results found.";
    }
 }

 function check_if_registered_already($connection, $course_name, $student_name, $student_id) {
    // Sanitize inputs to prevent SQL injection
    $student_name = $connection->real_escape_string($student_name);
    $student_id = $connection->real_escape_string($student_id);

    // Concatenate course name with "_students" and use backticks around table and column names, and single quotes around string values in the SQL query
    $table_name = $course_name . "_students";
    $sql = "SELECT student_name, student_id, student_gmail FROM `$table_name` WHERE student_name = '$student_name' AND student_id = '$student_id'";
    $result = $connection->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Registered in " . $course_name . " subject.";
                echo "<br>";
                show_student_courses($connection, $course_name);
                
               
            }
        } else {
            echo "Not registered in this course.";
        }
    } else {
        // Handle query execution error
        echo "Error: " . $connection->error;
    }
}

function show_student_courses($connection, $cname) {
    $cname = $connection->real_escape_string($cname); // Sanitize input to prevent SQL injection
 
    $sql = "SELECT C_Name, Description, Guide_name, Guide_Email, ImgName, course_duration FROM parent_courses WHERE C_Name = '$cname'";
    $result = $connection->query($sql);
 
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_name = htmlspecialchars($row["C_Name"]);
                $Description = htmlspecialchars($row["Description"]);
                $Guide_name = htmlspecialchars($row["Guide_name"]);
                $Guide_Email = htmlspecialchars($row["Guide_Email"]);
                $Img_name = htmlspecialchars($row["ImgName"]);
                $course_duration = htmlspecialchars($row["course_duration"]);
 
                echo '
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="artists-thumb" style="border: 0px solid #150E19; border-radius: 20px; filter: drop-shadow(2px 2px 4px #219c02);">
                            <div class="artists-image-wrap">
                                <img src="' . $Img_name . '" class="artists-image img-fluid">
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
                                    <a href="#" onclick="adminNavigate(\'' . $course_name . '\')">Join Course</a>
                                </p>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error in the SQL query: " . $connection->error;
    }
 }
 
 
?>

 
            <div class="col-12 text-center">
                <h2 class="mb-4" style="color:white;  filter: drop-shadow(2px 2px 4px #219c02);" >Your Courses</h1>
            </div>
            <?php
                fetch_courses($connection, $user_name, $admin_Id);
            ?>