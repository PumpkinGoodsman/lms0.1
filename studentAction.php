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

function check_course_id($connection, $student_name, $student_id, $course_name, $course_id ,$student_cnic ) {
    // Sanitize inputs to prevent SQL injection
    $student_name = $connection->real_escape_string($student_name);
    $student_id = $connection->real_escape_string($student_id);
    $course_name = $connection->real_escape_string($course_name);
    $course_id = $connection->real_escape_string($course_id);

    // SQL query to check if the course exists
    $sql = "SELECT C_Name, Course_Id FROM parent_courses WHERE C_Name = '$course_name' AND Course_Id = '$course_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo "done";
           echo "<br>";
           echo $course_name;
           echo "<br>";
           fetch_student_details($connection, $student_name, $student_id  , $student_cnic , $course_name );
        }
    } else {
        echo "Not done";
    }

}

//$is_valid_Cid =   check_course_id($connection, "haji", "443322", "Machine_learning", "machione443");
 

function fetch_student_details($connection, $student_name, $student_id  , $student_cnic , $course_name ) {
    // Sanitize inputs to prevent SQL injection
    $student_name = $connection->real_escape_string($student_name);
    $student_id = $connection->real_escape_string($student_id);

    // Corrected SQL query syntax
    $sql = "SELECT student_name, student_Id, student_email, student_phone FROM student_details WHERE student_name = '$student_name' AND student_Id = '$student_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_name = $row["student_name"];
            $student_Id = $row["student_Id"];
            $student_email = $row["student_email"];
            $student_phone = $row["student_phone"]; // Assuming "C_Name" is a column in the result set
            // Do something with $course_name if needed
           echo  $student_name  ;
           echo "<br>";
           echo   $student_Id  ;
           echo "<br>";
           echo  $student_email  ;
           echo "<br>";
           echo  $student_phone ;
           echo "<br>";
           echo "<br>";
           echo $course_name;
           echo "<br>";
           $course_name_lower = strtolower($course_name);
           register_student($connection, $course_name_lower, $student_name, $student_id, $student_cnic, $student_email, $student_phone);
        }
    } else {
        echo "No results found.";
    }
}
 
 
function register_student($connection, $tablename, $student_name, $student_id, $student_CNIC, $student_gmail, $student_phone) {
    // Construct the table name using concatenation
    $table_name = $tablename . "_students";
    
    // SQL query with placeholders
    $sql = "INSERT INTO `$table_name` (student_name, student_id, student_CNIC, student_gmail, student_phone) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssss", $student_name, $student_id, $student_CNIC, $student_gmail, $student_phone);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Student registered successfully.";
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    } 
} 




  

 /*
 function register_student($connection) {
    // Construct the table name using concatenation
     // Remove spaces from table name
    $student_name = "Asad rehman";
    $student_CNIC = "alpha beta";
    $student_gmail = "abcdef";
    $student_id = "4433";
    $student_phone = "8899";
    $table_name = "mern stack_students";
    $sql = "INSERT INTO `$table_name` (student_name, student_id, student_CNIC, student_gmail, student_phone) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssss", $student_name, $student_id, $student_CNIC, $student_gmail, $student_phone);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Student registered successfully.";
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
}
*/
/*
function fetch_and_print_students($connection) {
    // Query to select all data from the table
    $table_name = "pythion_students";
    $sql = "SELECT * FROM $table_name";

    // Perform the query
    $result = mysqli_query($connection, $sql);

    // Check if query was successful
    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch and print each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Student Name: " . $row['student_name'] . "<br>";
                echo "Student ID: " . $row['student_id'] . "<br>";
                echo "Student CNIC: " . $row['student_CNIC'] . "<br>";
                echo "Student Gmail: " . $row['student_gmail'] . "<br>";
                echo "Student Phone: " . $row['student_phone'] . "<br><br>";
            }
        } else {
            echo "No records found";
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

*/

function edit_Parent_Course($connect, $student_name, $student_id, $Student_phone, $Student_Adress, $Student_Password, $Student_email, $Student_img) {
    // File upload code
    $uploadedFile = $Student_img;
    $targetDir = "C:\\xampp\\htdocs\\testa3\\images\\";
    $targetFile = $targetDir . basename($uploadedFile["name"]);
    $imgName = "images/" . $uploadedFile["name"];

    if(isset($uploadedFile) && $uploadedFile["error"] == 0) {
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedFormats = array("jpg", "jpeg", "png");

        if (in_array($imageFileType, $allowedFormats)) {
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
                return;
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
            return;
        }
    } else {
        echo "No file uploaded.";
        return;
    }

    // SQL update code
    $update_sql = "UPDATE student_details SET student_name=?, student_Id=?, student_email=?, student_phone=?, student_Adress=?, student_Password=?, student_img=? WHERE student_name=? AND student_Id=?";
    
    $stmt = mysqli_prepare($connect, $update_sql);
    
    mysqli_stmt_bind_param($stmt, "sssssssss", $student_name, $student_id, $Student_email, $Student_phone, $Student_Adress, $Student_Password, $imgName, $student_name, $student_id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}

// Example usage:
// $connect = mysqli_connect("hostname", "username", "password", "database_name");
// edit_Parent_Course($connect, $student_name, $student_id, $Student_phone, $Student_Adress, $Student_Password, $Student_email, $_FILES["image"]);
 
function fetch_quiz_data($connection, $courseName  , $student_name, $student_id ) {
    // Query to fetch data
    $query = "SELECT quiz_title, total_marks FROM quiz_list WHERE course_Name = ?";

    // Prepare the statement
    $stmt = $connection->prepare($query);

    // Check if statement preparation succeeded
    if (!$stmt) {
        echo "Error: " . $connection->error;
        return;
    }

    // Bind the parameter
    $stmt->bind_param("s", $courseName);

    // Execute the statement
    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($quizTitle, $totalMarks);

    // Fetch the rows and echo the results
    while ($stmt->fetch()) {
        $result = chk_attempted_quiz($connection, $quizTitle, $courseName, $student_name, $student_id);
        if (chk_attempted_quiz($connection, $quizTitle, $courseName, $student_name, $student_id)) {
            echo '<button id="' . htmlspecialchars($quizTitle, ENT_QUOTES, 'UTF-8') . '" class="btn btn-primary" style="background-color:black" onclick="loadQuizData(\'' . htmlspecialchars($quizTitle, ENT_QUOTES, 'UTF-8') . '\')">' . $quizTitle . '</button>';  
        } else {
            echo '<button id="' . htmlspecialchars($quizTitle, ENT_QUOTES, 'UTF-8') . '" class="btn btn-primary" onclick="loadQuizData(\'' . htmlspecialchars($quizTitle, ENT_QUOTES, 'UTF-8') . '\')">' . $quizTitle . '</button>';  
        }  
        
    }

    // Close the statement
    $stmt->close();

    // Close the connection (optional depending on whether you want to keep the connection open)
    $connection->close();
} 

function chk_attempted_quiz($connection, $quiz_title, $course_name, $student_name, $student_id) {
      
    $query = "SELECT * FROM quiz_marks 
              WHERE quiz_name = '$quiz_title' 
              AND course_name = '$course_name' 
              AND student_name = '$student_name' 
              AND student_id = '$student_id'";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if query execution was successful
    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Record found
            return true;
        } else {
            // No record found
            return false;
        }
        // Free result set
         
    } else {
        // Query execution failed
        return false;
    }  
    
}


function load_quiz_questions($connection, $quiz_name, $course_name , $student_name, $student_id) {
    // Construct the quiz title
  
    $quiz_title = $course_name . "_" . $quiz_name;  
  
    // Query to fetch data
    $query = "SELECT indx, Question, Option_A, Option_B, Option_C, Option_D, Correct_Answer FROM `$quiz_title`";

    // Prepare the statement
    $stmt = $connection->prepare($query);

    // Check if statement preparation succeeded
    if (!$stmt) {
        echo "Error preparing statement: " . $connection->error;
        return;
    }

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error executing statement: " . $stmt->error;
        $stmt->close();
        return;
    }

    // Bind the result variables
    $stmt->bind_result($indx, $question, $optionA, $optionB, $optionC, $optionD, $correctAnswer);

    // Start form
    echo '<form id="quizForm">';

    // Fetch the rows and echo the results
    while ($stmt->fetch()) {
        $name = "question_" . $indx ;
        $correct_answer_name = "correct_answer_" . $indx;
        echo '<div class="question_row">';
        echo '<h6 style="color:#006600; margin-top:20px;">' . $indx . ': ' . $question . '</h6>';
        echo '<div class="Answer_row">';
        echo '<label style="color: #333333;"><input type="radio" name="' . $name . '" value="' . $optionA . '"> ' . $optionA . '</label>';
        echo '<label style="color: #333333;"><input type="radio" name="' . $name . '" value="' . $optionB . '"> ' . $optionB . '</label>';
        echo '<label style="color: #333333;"><input type="radio" name="' . $name . '" value="' . $optionC . '"> ' . $optionC . '</label>';
        echo '<label style="color: #333333;"><input type="radio" name="' . $name . '" value="' . $optionD . '"> ' . $optionD . '</label>';
        echo '<input type="hidden" name="' . $correct_answer_name . '" value="' . $correctAnswer . '">';
        echo '</div>'; // Close Answer_row
        echo '</div>'; // Close question_row
    } 

    // Close form
    echo '<button type="submit" id="submitBtn">Submit</button>';
    echo '</form>';

    // Close the statement
    $stmt->close();
}


function add_quiz_marks($connection, $quiz_name, $course_name, $student_name, $student_id, $total_marks, $obtained_marks) {
    // Convert $total_marks and $obtained_marks to integers
    $total_marks_int = intval($total_marks);
    $obtained_marks_int = intval($obtained_marks);

    // Prepare SQL statement
    $sql = "INSERT INTO quiz_marks (quiz_name, course_name, student_name, student_id, toatl_marks , obtained_marks) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $connection->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssii", $quiz_name, $course_name, $student_name, $student_id, $total_marks_int, $obtained_marks_int);

    // Execute the statement
    if ($stmt->execute()) {
        return true; // Insertion successful
    } else {
        return false; // Insertion failed
    }
}

if (isset($_POST['hiddenField'])) {

    $rrrr = $_POST['hiddenField'];
    if($rrrr == "course_registeration"){
       check_course_id($connection, $user_name, $admin_Id, $_POST['Course_Name'], $_POST['Course_id'] ,$_POST['Student_CNIC'] );      
    }
    if($rrrr == "Edit_Student_profile"){

      edit_Parent_Course($connection, $user_name , $admin_Id, $_POST['Student_phone'], $_POST['Student_adress'], $_POST['Student_Password'], $_POST['student_email'], $_FILES["image"]);
      
    }
}

if (isset($_POST['load_Quiz_titles'])) {
 
    fetch_quiz_data($connection , $_POST['C_Name'] , $user_name , $admin_Id ); 
     
    
} else {
    // If load_Quiz_titles is not set or doesn't have the expected value
    
}

if (isset($_POST['quiz_title'])) {
    // Handle the request based on the value of quiz_title
    
    load_quiz_questions($connection, $_POST['quiz_title'],  $_POST['course_name']  , $user_name , $admin_Id);
    // Perform different actions based on the value of quiz_title
    //echo $_POST['C_Name'];
 
} else {
    // If quiz_title is not set
    
}
if (isset($_POST['total_marks'])) {
 echo $_POST['quiz_name'];
 echo "<br>";
 echo $_POST['course_name'];
 echo "<br>";
 echo $_POST['total_marks'];
 echo "<br>";
 echo $_POST['obtained_marks'];
 add_quiz_marks($connection, $_POST['quiz_name'], $_POST['course_name'], $_SESSION["username"], $_SESSION["admin_Id"], $_POST['total_marks'], $_POST['obtained_marks']);
 
} else {
    
    
}


?>