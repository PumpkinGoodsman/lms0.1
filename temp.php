 



<?php
include 'connection.php'; 
function chk_attempted_quiz($connection, $quiz_title, $course_name, $student_name, $student_id) {
    // Prepare SQL query
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
        mysqli_free_result($result);
    } else {
        // Query execution failed
        return false;
    }
}

// Example usage:
 

// Example student details
$quiz_title = "quiz2";
$course_name = "PhotoShop";
$student_name = "Asad rehman";
$student_id = "s01";


// Check if attempted quiz record exists
if (chk_attempted_quiz($connection, $quiz_title, $course_name, $student_name, $student_id)  ) {
    echo "Record exists";
} 
 
else {
    echo "Record not found";
}

// Close the database connection
mysqli_close($connection);
?>




 






