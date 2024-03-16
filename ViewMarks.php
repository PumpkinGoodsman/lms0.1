<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fetch Marks</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    h2 {
        text-align: center;
        margin-top: 20px;
    }
    .quiz-table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    .quiz-table th, .quiz-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    .quiz-table th {
        background-color: #f2f2f2;
    }
    .quiz-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .quiz-table tr:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>

<?php
// Function to fetch marks data from the database and echo table data
function fetchAndEchoMarks($connection , $student_name , $student_id) {
    // Prepare SQL query
    $query = "SELECT quiz_name, course_name, student_name, toatl_marks, obtained_marks
              FROM quiz_marks
              WHERE student_name = '$student_name' AND student_id = '$student_id'";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if query execution was successful
    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Echo table header
            echo "<h2>Marks of  $student_name  </h2>";
            echo "<table class='quiz-table'>
                    <tr>
                        <th style='color: black;'>Quiz Name</th>
                        <th style='color: black;'>Course Name</th>
                        <th style='color: black;'>Student Name</th>
                        <th style='color: black;'>Total Marks</th>
                        <th style='color: black;'>Obtained Marks</th>
                    </tr>";
            // Fetch data and echo table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['quiz_name']}</td>
                        <td>{$row['course_name']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['toatl_marks']}</td>
                        <td>{$row['obtained_marks']}</td>
                      </tr>";
            }
            // Close table
            echo "</table>";
        } else {
            // No rows found
            echo "<h2>No marks data found for student $student_name (ID: $student_id)</h2>";
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        // Query execution failed
        echo "<h2>Error: " . mysqli_error($connection) . "</h2>";
    }
}

// Example usage:
// Include connection file
include 'connection.php';

// Example student details
$user_name = "Asad Rehman";
$admin_Id = "s01";

// Call the function and pass the connection
fetchAndEchoMarks($connection, $user_name, $admin_Id);

// Close the database connection
mysqli_close($connection);
?>

</body>
</html>
