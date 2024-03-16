<?php
include 'connection.php';

$user_on_page = "unknown";
$user_name = "unknown";
$admin_Id = "unknown";
$is_page_login = "unknown";
$user_on_page = "unknown";

// Check if a session is already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user_on_page"])) {
    $user_name =  $_SESSION["username"];
    $admin_Id = $_SESSION["admin_Id"];
    $is_page_login = $_SESSION["is_page_login"];
    $user_on_page =  $_SESSION["user_on_page"];
} else {
    header("Location: index.php");
}


function fetch_courses($connection , $student_name, $student_id) {
    $sql = "SELECT C_Name FROM parent_courses";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name= $row["C_Name"];
            check_if_registered_already($connection,  $course_name, $student_name, $student_id);
        }
    } else {
        echo "No results found.";
    }
}

function check_if_registered_already($connection, $course_name, $student_name, $student_id) {
    // Sanitize inputs to prevent SQL injection
    $course_name = $connection->real_escape_string($course_name);
    $student_name = $connection->real_escape_string($student_name);
    $student_id = $connection->real_escape_string($student_id);

    $sql = "SELECT student_name, student_id FROM " . $course_name . "_students WHERE student_name = '$student_name' AND student_id = '$student_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Student is registered in the course
        while ($row = $result->fetch_assoc()) {
            // Do something with the registered student data if needed
        }
    } else {
        // Student is not registered in the course, print available courses
        print_courses($connection, $course_name);
    }
}

 
function print_courses($connection, $courseName) {
    // Sanitize the input to prevent SQL injection
    $course_name = $connection->real_escape_string($courseName);

    $sql = "SELECT C_Name FROM parent_courses WHERE C_Name = '$course_name'";
    $result = $connection->query($sql);

    // Check for SQL errors
    if (!$result) {
        die("Error executing the query: " . $connection->error);
    }

    // Start the dropdown menu
     

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = $row["C_Name"];
            // Output the option value and text properly
            echo '<option value="' . $course_name . '">' . $course_name . '</option>';
        }
    } else {
        
    }

    // Close the dropdown menu
 

    // Free the result set
    $result->free_result();
}

?>
<div class="col-12 text-center">
    <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"> Register To A course</h3>
</div>
<form id="register_to_course_Form" style="background-color:  #DDDDDD ; margin-left: 0.5%; margin-bottom:10%;" >
    <table>

         <tr>
            <th style="color: #333333;">Available Courses</th>
         </tr>
         <tr>
            <td>
                <?php
                     echo '<select id="dropdown" name="Course_Name">';
                       fetch_courses($connection , $user_name, $admin_Id);
                     echo '</select>';
                ?>
            </td>
         </tr>
         <tr>
            <th style="color: #333333;">Course Id</th>
         </tr>
         <tr>
            <td><input type="text" name="Course_id" style="color: white;"></td>
         </tr>
         <tr>
            <th style="color: #333333;">Student CNIC</th>
         </tr>
         <tr>
            <td><input type="text" name="Student_CNIC" style="color: white;"></td>
         </tr>
         
        <tr>
            <td><input type="hidden" name="hiddenField" value="course_registeration"></td>
        </tr>
        <tr>
            <td><button id="course_register_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
        </tr>
    </table>
</form>

 