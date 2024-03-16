<?php
include 'connection.php';
session_start();
function add_lecture($connect, $table_name ,  $lecture_no , $Lecture_topic , $Description , $outcomes , $video_url , $lesson_pdf  ){
    
    $connection = $connect;
     
    $uploadedFile = $lesson_pdf;

    if (isset($uploadedFile) && $uploadedFile["error"] == 0) {
        $targetDir = "C:\\xampp\\htdocs\\festa\\images\\";// Specify your target directory
        $targetFile = $targetDir . basename($uploadedFile["name"]);
        $documentName = "images/" . $uploadedFile["name"];
        echo $documentName . "<br>";
        $documentFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedFormats = array("pdf", "doc", "docx");
        
        if (in_array($documentFileType, $allowedFormats)) {
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Only PDF, DOC, and DOCX files are allowed.";
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }

    $insert_sql = "INSERT INTO $table_name ( lecture_no, Lecture_topic , Lecture_Description , lecture_outcomes , video_url , lesson_pdf  )
    VALUES (?, ?, ?, ? , ? , ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "isssss",   $lecture_no , $Lecture_topic ,$Description , $outcomes , $video_url ,  $documentName   );

    if (mysqli_stmt_execute($stmt)) {
        // echo "Record inserted successfully!";
    } else {
        // echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    
}

function edit_lecture($connect, $table_name, $lecture_no, $lecture_topic, $description, $outcomes, $video_url, $lesson_pdf)
{
    $connection = $connect;

    // Check and handle file upload
    $documentName = null;
    $uploadedFile = $lesson_pdf;

    if (isset($uploadedFile) && $uploadedFile["error"] == 0) {
        // Handle file upload logic here (same as before)
        // ...
    }

    // Build the update SQL query based on the provided fields
    $update_sql = "UPDATE $table_name SET ";
    $update_params = [];
    $update_types = "";

    if (isset($lecture_topic)) {
        $update_sql .= "Lecture_topic=?, ";
        $update_params[] = $lecture_topic;
        $update_types .= "s";
    }

    if (isset($description)) {
        $update_sql .= "Lecture_Description=?, ";
        $update_params[] = $description;
        $update_types .= "s";
    }

    if (isset($outcomes)) {
        $update_sql .= "lecture_outcomes=?, ";
        $update_params[] = $outcomes;
        $update_types .= "s";
    }

    if (isset($video_url)) {
        $update_sql .= "video_url=?, ";
        $update_params[] = $video_url;
        $update_types .= "s";
    }

    if (isset($documentName)) {
        $update_sql .= "lesson_pdf=?, ";
        $update_params[] = $documentName;
        $update_types .= "s";
    }

    // Remove the trailing comma and add the WHERE clause
    $update_sql = rtrim($update_sql, ", ") . " WHERE lecture_no=?";
    $update_params[] = $lecture_no;
    $update_types .= "i";

    // Prepare and bind the parameters dynamically
    $stmt = mysqli_prepare($connection, $update_sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, $update_types, ...$update_params);

        if (mysqli_stmt_execute($stmt)) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}

function create_quiz($conn, $courseName, $quizTitle ,  $totalMarks) {
    // Validate input data
    if (strlen($courseName) > 255 || strlen($quizTitle) > 255 || strlen($totalMarks) > 255) {
        echo "Invalid input data.";
        return;
    }

    // Concatenate course name and quiz title to create table name
    $tableName = $courseName . '_' . $quizTitle;

    // SQL query to create the quiz table using prepared statement
    $createQuery = $conn->prepare("CREATE TABLE $tableName (
        indx INT AUTO_INCREMENT PRIMARY KEY,
        Question VARCHAR(255),
        Option_A VARCHAR(255),
        Option_B VARCHAR(255),
        Option_C VARCHAR(255),
        Option_D VARCHAR(255),
        Correct_Answer VARCHAR(255)
    )");

    // Execute the create table query
    if ($createQuery->execute()) {
        echo "Table $tableName created successfully.";
    } else {
        // Log the error to a file
        error_log("Error creating table: " . $createQuery->error, 3, "error.log");
        // User-friendly message
        echo "An error occurred while creating the quiz table. Please try again later.";
        return;
    }

    $createQuery->close();

    $insert_sql = "INSERT INTO quiz_list (course_Name, quiz_title , total_marks  )
    VALUES (?, ?, ?)";

    $stmt = mysqli_prepare( $conn , $insert_sql);
    mysqli_stmt_bind_param($stmt , "sss", $courseName , $quizTitle,  $totalMarks);

    if (mysqli_stmt_execute($stmt)) {
        // echo "Record inserted successfully!";
    } else {
        // echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
    // Close prepared statements
}

function insert_questions_in_quiz($conn, $courseName, $quizTitle, $question, $Option_A, $Option_B, $Option_C, $Option_D, $Correct_answer) {
    // Validate input data length
    if (strlen($courseName) > 255 || strlen($quizTitle) > 255) {
        echo "Invalid input data.";
        return;
    }

    // Sanitize table name to prevent SQL injection
    $tableName = mysqli_real_escape_string($conn, $courseName . '_' . $quizTitle);

    // SQL query to create the quiz table using prepared statement
    $insert_sql = "INSERT INTO `$tableName` (Question, Option_A, Option_B, Option_C, Option_D, Correct_Answer)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insert_sql);
    if (!$stmt) {
        echo "Error preparing statement: " . mysqli_error($conn);
        return;
    }

    // Specify correct data types for bind_param
    mysqli_stmt_bind_param($stmt, "ssssss", $question, $Option_A, $Option_B, $Option_C, $Option_D, $Correct_answer);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    // Close prepared statements
}

 
 
 
// Function to fetch data from the quiz_list table and directly echo the results
function fetch_quiz_data($connection, $courseName) {
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
        echo '<button id="' . htmlspecialchars($quizTitle, ENT_QUOTES, 'UTF-8') . '" class="btn btn-primary" onclick="loadQuizData(\'' . htmlspecialchars($quizTitle, ENT_QUOTES, 'UTF-8') . '\')">' . $quizTitle . '</button>';  

    }

    // Close the statement
    $stmt->close();

    // Close the connection (optional depending on whether you want to keep the connection open)
    $connection->close();
} 


function load_quiz_questions($connection, $quiz_name, $course_name) {
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

    $form_to_handle = $_POST['hiddenField'];
    if( $form_to_handle == "add_lecture"){
        add_lecture($connection, $_POST['Course_Name'], $_POST['lecture_no'], $_POST['Lecture_topic'], $_POST['Lecture_Description'], $_POST['lecture_outcomes'], $_POST['video_url'], $_FILES["document"]);
    }
    if( $form_to_handle == "edit_lecture_Form"){
        edit_lecture($connection, $_POST['Course_Name'], $_POST['lecture_no'], $_POST['Lecture_topic'], $_POST['Lecture_Description'], $_POST['lecture_outcomes'], $_POST['video_url'], $_FILES["document"]);
    }
    if( $form_to_handle == "Create_Quiz"){
        create_quiz($connection ,  $_POST['C_Name'] , $_POST['quiz_title']  , $_POST['Total_Marks']);
    }
    if( $form_to_handle == "Add_question_to_quiz"){
        insert_questions_in_quiz($connection, $_POST['course_name'], $_POST['quiz_title'], $_POST['Question'], $_POST['Option_A'], $_POST['Option_B'], $_POST['Option_C'],  $_POST['Option_D'], $_POST['Correct_Answer']);
    }
}    

if (isset($_POST['load_Quiz_titles'])) {
 
    fetch_quiz_data($connection , $_POST['C_Name']); 
     
    
} else {
    // If load_Quiz_titles is not set or doesn't have the expected value
    
}

if (isset($_POST['quiz_title'])) {
    // Handle the request based on the value of quiz_title
    
    load_quiz_questions($connection, $_POST['quiz_title'],  $_POST['course_name']);
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