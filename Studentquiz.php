<?php

$course_name = "none";
$user_on_page = "unknown";
$user_name ="unknown";
$admin_Id = "unknown";
$is_page_login= "unknown";
$user_on_page=  "unknown";


if (isset($_SESSION["user_on_page"])) {
$user_name =  $_SESSION["username"] ;
$admin_Id = $_SESSION["admin_Id"];
$is_page_login = $_SESSION["is_page_login"];
$user_on_page =  $_SESSION["user_on_page"];


}

if(!isset($_SESSION["user_on_page"])){

}

function fetch_courses($connection, $guide_name, $guide_id) {
    $sql = "SELECT C_Name FROM parent_courses";
    $result = $connection->query($sql);
 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = $row["C_Name"];
            check_if_registered_already($connection, $course_name, $guide_name, $guide_id);
        }
    } else {
        echo "No results found.";
    }
 }
 
 function check_if_registered_already($connection, $course_name, $guide_name, $guide_id) {
      if ($_SESSION["user_on_page"] = "student"){
            $guide_name = $connection->real_escape_string($guide_name);
            $guide_id = $connection->real_escape_string($guide_id);
            $table_name = $course_name . "_students";
            // Use single quotes around string values in the SQL query
            $sql = "SELECT student_name , student_id  FROM `$table_name` WHERE  student_name = '$guide_name' AND student_id = '$guide_id' ";
            $result = $connection->query($sql);
         
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Registered in " . $course_name . " subject.";
                    print_courses($connection, $course_name);
                }
            } else {
                // Not registered in this course
            }
        } 
 }
 
function print_courses($connection, $courseName) {
    // Sanitize the input to prevent SQL injection
    $course_name = $connection->real_escape_string($courseName);

    $sql = "SELECT C_Name  FROM sub_courses WHERE Parnt_C_Name = '$course_name'";
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

<style>
/* Styles for quiz form */
#quizForm {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.question_row {
    margin-bottom: 20px;
}

.Answer_row {
    background-color: #f0f0f0; /* Light background color for answer row */
    padding: 10px;
    border-radius: 5px;
}

.Answer_row label {
    display: block;
    margin-bottom: 5px;
}

/* Make radio buttons smaller */
.Answer_row input[type="radio"] {
    width: 15px;
    height: 15px;
    margin-right: 5px;
}

/* Responsive styles */
@media screen and (max-width: 768px) {
    #quizForm {
        max-width: 80%;
    }
}

@media screen and (max-width: 480px) {
    .Answer_row label {
        font-size: 14px; /* Adjust font size for smaller screens */
    }
}


</style>


<div class="parentCourse_div" id="ParentCourse_div" >
        <div class="col-12 text-center">
            <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;" > Load Quizes</h3>
        </div>
        <form id="view_Quiz_form" >
            <table>
                <tr>
                    <th  style="color:black;">C_Name</th>
                    
                </tr>
                <tr>
                    <td> 
                        <?php
                            echo '<select id="dropdown" name="C_Name">';
                                fetch_courses($connection, $user_name, $admin_Id);
                            echo '</select>';
                            ?>
                    </td>
                    <td><input type="hidden" name="load_Quiz_titles" value="load_Quiz_title"></td>
                    <td><button id="load_Quiz_sbmt_btn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">load Quizes</button></td>
                     
                </tr>
                <tr> 
 
                    
                </tr>
                <tr>
                   
                </tr>
            </table>
        </form>
</div>  

<div id="testingDiv" class="col-12 text-center" style="margin-top: 20px;">
 
</div>

<div class="Quiz_panel" >
    <div class="quiz_form" >
        <div class="col-12 text-center">
            <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"  id="quiz_heading"> Your Quiz</h3>
        </div>
        <form id="quizForm">
 
        </form>
    </div>
</div>
 
<div id="answers"></div>  
<div id="correct_answers"></div>
<div id="marks_test"></div>


