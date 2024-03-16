 
<?php
include 'connection.php';

include 'sessions.php';
function register_student($connect , $student_name ,  $student_id ,  $student_email ,  $student_phone ,  $student_Password  ,  $student_adress   ){
   
    $connection = $connect;
  //  $table_name = $c_name;
    $student_img  = "none";
    /* $uploadedFile =  $student_img;
    if (isset($uploadedFile) && $uploadedFile["error"] == 0) {
        $targetDir = "C:\\xampp\\htdocs\\festa\\images\\";
        $targetFile = $targetDir . basename($uploadedFile["name"]);
        $imgName = "images/" . $uploadedFile["name"];
        echo $imgName . "<br>";
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedFormats = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedFormats)) {
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
            return; // Return to stop further execution
        }
    } else {
        echo "No file uploaded.";
        return; // Return to stop further execution
    }
    */

    $insert_sql = "INSERT INTO student_details (student_name , student_Id , student_email, student_phone , student_Adress , student_Password , student_img   )
    VALUES (?, ?, ?, ?, ?, ?, ? )";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $student_name  , $student_id ,  $student_email, $student_phone , $student_adress ,  $student_Password    ,  $student_img );
    session_start();
    if (mysqli_stmt_execute($stmt)) {
        $is_page_login = true;
        $user_on_page = "student";
        
        $_SESSION["username"] = $student_name;
        $_SESSION["admin_Id"] = $student_id;
        $_SESSION["is_page_login"] = $is_page_login;
        $_SESSION["user_on_page"] = $user_on_page;

        // Redirect to the adminDashboard.PHP page
        header("Location: index.php");
        exit;
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);

}


function check_guide_login($connect, $guide_name, $guide_email, $guide_password) {
    // Use prepared statements to prevent SQL injection

    $connection = $connect;
    $sql = "SELECT Guide_name, Guide_Id, Guide_email FROM guides_details WHERE Guide_name = ? AND Guide_email = ? AND Guide_Password = ?";
    
    // Prepare the statement
    $stmt = $connection->prepare($sql);
    
    // Bind parameters and execute the query
    $stmt->bind_param("sss", $guide_name, $guide_email, $guide_password);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    session_start();
    if ($result->num_rows > 0) {
        // Start a session
        
        while ($row = $result->fetch_assoc()) {
            $guide_name = $row['Guide_name'];
            $Guide_Id = $row['Guide_Id'];
            $Guide_email = $row['Guide_email'];

            $is_page_login = true;
            $user_on_page = "guide";
            $_SESSION["username"] = $guide_name;
            $_SESSION["admin_Id"] = $Guide_Id;
            $_SESSION["is_page_login"] = $is_page_login;
            $_SESSION["user_on_page"] = $user_on_page;

            exit;

        }
    }    
}
 
function check_student_login($connect, $student_name, $student_email, $student_password) {
    // Use prepared statements to prevent SQL injection

    $connection = $connect;
    $sql = "SELECT student_name , student_Id  , student_email  FROM student_details WHERE student_name = ? AND student_email = ? AND student_Password = ?";
    
    // Prepare the statement
    $stmt = $connection->prepare($sql);
    
    // Bind parameters and execute the query
    $stmt->bind_param("sss", $student_name, $student_email, $student_password);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    session_start();
    if ($result->num_rows > 0) {
        // Start a session
        
        while ($row = $result->fetch_assoc()) {
            $student_name = $row['student_name'];
            $student_Id = $row['student_Id'];
            $student_email = $row['student_email'];

            $is_page_login = true;
            $user_on_page = "student";
            $_SESSION["username"] = $student_name;
            $_SESSION["admin_Id"] = $student_Id;
            $_SESSION["is_page_login"] = $is_page_login;
            $_SESSION["user_on_page"] = $user_on_page;
            exit;
          
        }
    }    
}


 
if (isset($_POST['hiddenField'])) {
    $requested_action = $_POST['hiddenField'];

    if ($requested_action == "Sign_up_form") {  
        register_student($connection, $_POST['name'], $_POST['Student_ID'], $_POST['student_email'], $_POST['student_phone'], $_POST['password'], $_POST['adress']);
 
    } 
    if ($requested_action == "teachers_login_form") {  

          check_guide_login($connection,  $_POST['Guide_name'], $_POST['Guide_email'], $_POST['Guide_password']);
    }

    if ($requested_action == "student_login_form") {  
         
         check_student_login($connection, $_POST['student_name'], $_POST['student_email'], $_POST['student_password']);
 
     }
}

 
?>
