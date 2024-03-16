 
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

function confirm_student_identity($connection, $student_name, $student_id  , $course_name) {
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT student_name FROM " . $course_name . "_students WHERE student_name = ? AND student_id = ?";
    
    // Prepare the statement
    $stmt = $connection->prepare($sql);
    
    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $student_name, $student_id);
        $stmt->execute();
        
        // Bind the result to a variable
        $stmt->bind_result($name);
        
        // Fetch the result
        $stmt->fetch();
        
        if ($name) {
            // Student found, return their name
            $is_registered = true;
            $responseData = array(
                'isRegistered' => $is_registered

            );
    
            // Encode the array as JSON
            $jsonResponse = json_encode($responseData);
    
            // Set the response content type to JSON
            header('Content-Type: application/json');
    
            // Echo the JSON response
            echo $jsonResponse;
        } else {
            // Student not found
            $is_registered = false;
            $responseData = array(
                'isRegistered' => $is_registered

            );
    
            // Encode the array as JSON
            $jsonResponse = json_encode($responseData);
    
            // Set the response content type to JSON
            header('Content-Type: application/json');
    
            // Echo the JSON response
            echo $jsonResponse;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        $is_registered = false;
        $responseData = array(
            'isRegistered' => $is_registered

        );

        // Encode the array as JSON
        $jsonResponse = json_encode($responseData);

        // Set the response content type to JSON
        header('Content-Type: application/json');

        // Echo the JSON response
        echo $jsonResponse;
    }
}

function confirm_guide_identity($connection, $guide_name, $course_name, $guide_Id) {
    // Use placeholders for SQL query to prevent SQL injection
    $sql = "SELECT Guide_name  FROM parent_courses WHERE Guide_name  = ? AND C_Name = ? AND Guide_Key = ?";
    
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        $is_registered = false;
    } else {
        // Bind parameters with appropriate data types
        $stmt->bind_param("sss", $guide_name, $course_name, $guide_Id);

        if ($stmt->execute()) {
            $stmt->bind_result($name);
            $stmt->fetch();
            $is_registered = ($name !== null);
        } else {
            $is_registered = false;
        }

        $stmt->close();
    }

    $responseData = array(
        'isRegistered' => $is_registered
    );

    header('Content-Type: application/json');
    echo json_encode($responseData);
}

 

// Assuming you have a database connection object named $connection
//confirm_student_identity($connection, $student_name, $student_id ,  $course_name);
  /*
function confirm_Guide_identity($connection, $guide_name, $guide_id) {
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT Guide_name FROM guides_details WHERE Guide_name = ? AND Guide_Id = ?";
    
    // Prepare the statement
    $stmt = $connection->prepare($sql);
    
    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $guide_name, $guide_id);
        $stmt->execute();
        
        // Bind the result to a variable
        $stmt->bind_result($name);
        
        // Fetch the result
        $stmt->fetch();
        
        if ($name) {
            // Guide found, return their name
            $is_registered = true;
            $responseData = array(
                'isRegistered' => $is_registered

            );
    
            // Encode the array as JSON
            $jsonResponse = json_encode($responseData);
    
            // Set the response content type to JSON
            header('Content-Type: application/json');
    
            // Echo the JSON response
            echo $jsonResponse;

        } else {
            // Guide not found
            $is_registered = false;
            $responseData = array(
                'isRegistered' => $is_registered

            );
    
            // Encode the array as JSON
            $jsonResponse = json_encode($responseData);
    
            // Set the response content type to JSON
            header('Content-Type: application/json');
    
            // Echo the JSON response
            echo $jsonResponse;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // The query preparation failed, handle the error
        error_log("Error: " . $connection->error);
        return "Error: Unable to check guide identity";
    }
}

$guide_name = "Haji";
$guide_id  = "Aaaa";

confirm_Guide_identity($connection, $guide_name, $guide_id );

*/
 /*
 function printStudentInfo($connect) {
    // Replace with your actual database credentials
    // Create a database connection
    $conn =  $connect;

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define the columns you want to retrieve
    $columns = ['student_name', 'student_CNIC', 'student_gmail', 'Lecture_phone', 'student_id'];

    // Construct the SQL query
    $sql = "SELECT " . implode(', ', $columns) . " FROM qasim_students";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Output the column names
        echo "<strong>Column Names:</strong> " . implode(', ', $columns) . "<br><br>";

        // Output the data
        while ($row = $result->fetch_assoc()) {
            foreach ($columns as $column) {
                echo $column . ": " . $row[$column] . "<br>";
            }
            echo "<br>";
        }
    } else {
        echo "No records found in the qasim_students table.";
    }

    // Close the database connection
    $conn->close();
}

printStudentInfo($connection);
*/
 
 

 

 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['user_on_page']) && $_POST['user_on_page'] === "student") {

        confirm_student_identity($connection, $_POST['userName'] , $admin_Id  , $_POST['courseName']);
    }
    if (isset($_POST['user_on_page']) && $_POST['user_on_page'] === "Guide") {

        confirm_guide_identity($connection, $_POST['userName'], $_POST['courseName'] , $admin_Id) ;
    }
}
 
 
?>
