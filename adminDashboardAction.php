<?php 

include 'connection.php';

 
 
function add_Parent_Course($connect, $c_name, $cid, $c_descrip, $course_guide_name, $guide_email, $guide_key, $course_img , $course_duration) {

    $connection = $connect;

    $uploadedFile = $course_img;
    if (isset($uploadedFile) && $uploadedFile["error"] == 0) {
        $targetDir = "C:\\xampp\\htdocs\\testa3\\images\\";
        $targetFile = $targetDir . basename($uploadedFile["name"]);
        $imgName = "images/" . $uploadedFile["name"];
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedFormats = array("jpg", "jpeg", "png" , "gif");
        if (in_array($imageFileType, $allowedFormats)) {
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "Image uploaded.";
            } else {
                echo "Error uploading file.";
                return; // Stop further execution
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
            return; // Stop further execution
        }
    } else {
        echo "No file uploaded.";
        return; // Stop further execution
    }

    // Prepare SQL statement for inserting parent course
    $insert_sql = "INSERT INTO parent_courses (C_Name, Course_Id, Description, Guide_name, Guide_Email, Guide_Key, ImgName, course_duration)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $c_name, $cid, $c_descrip, $course_guide_name, $guide_email, $guide_key, $imgName, $course_duration);

    if (mysqli_stmt_execute($stmt)) {
        echo "Parent Course Added!";
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
        return; // Stop further execution
    }

    mysqli_stmt_close($stmt);

    // Create student table
    $table_name = $c_name . "_students";
    $create_table_sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
        indx INT AUTO_INCREMENT PRIMARY KEY,
        student_name VARCHAR(255),
        student_id VARCHAR(255),
        student_CNIC VARCHAR(255),
        student_gmail VARCHAR(255),
        student_phone VARCHAR(255)
    )";

    if (!mysqli_query($connection, $create_table_sql)) {
        echo "Error creating student table: " . mysqli_error($connection);
    }

    // Create chat box table
    $chat_box_name = $c_name . "_chatBox";
    $create_chat_box = "CREATE TABLE IF NOT EXISTS `$chat_box_name` (
        indx INT AUTO_INCREMENT PRIMARY KEY,
        Sname VARCHAR(255),
        Sid VARCHAR(255),
        MSg VARCHAR(255) 
    )";

    if (!mysqli_query($connection, $create_chat_box)) {
        echo "Error creating chat box table: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}

function add_subcourses($connect, $c_name, $parnt_c_name ,$c_descrip , $course_img  ){

    $table_name = $c_name;
    $connection = $connect;
    $table_name = mysqli_real_escape_string($connection, $table_name);
    
    $uploadedFile = $course_img; // Assign the file array to a variable $_FILES["image"]; 
    if(isset($uploadedFile) && $uploadedFile["error"] == 0) {
        $targetDir = "C:\\xampp\\htdocs\\testa3\\images\\";  // Directory to save uploaded images
        $targetFile = $targetDir . basename($uploadedFile["name"]);
        $imgName = "images/". $uploadedFile["name"];
        echo $imgName . "<br>";
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow only certain image formats
        $allowedFormats = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedFormats)) {
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        echo "No file uploaded.";
    }

    $create_table_sql = "CREATE TABLE IF NOT EXISTS $table_name (
        indx INT AUTO_INCREMENT PRIMARY KEY,
        c_name VARCHAR(255),
        lecture_no INT,
        Lecture_topic VARCHAR(255),
        Lecture_Description VARCHAR(255),
        lecture_outcomes VARCHAR(255),
        video_url VARCHAR(255),
        lesson_pdf VARCHAR(100)
    )";
    

    if (mysqli_query($connection, $create_table_sql)) {
        // echo "Table created successfully!";
    } else {
        // echo "Error creating table: " . mysqli_error($connection);
    }

    $insert_sql = "INSERT INTO sub_courses (C_Name,  Parnt_C_Name , Description,  ImgName)
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $c_name, $parnt_c_name, $c_descrip , $imgName);

    if (mysqli_stmt_execute($stmt)) {
        // echo "Record inserted successfully!";
    } else {
        // echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);


}

function add_Introduction($connect, $c_name , $c_descrip  , $learning_outcomes , $video_URL ){
    
    $connection = $connect;
   /* $table_name = $c_name . "description"; 
    $create_table_sql = "CREATE TABLE IF NOT EXISTS $table_name (
        indx INT AUTO_INCREMENT PRIMARY KEY,
        C_Name VARCHAR(255),
        Description VARCHAR(255),
        learning_outcomes VARCHAR(50),
        video_URL VARCHAR(100)
    )";

    if (mysqli_query($connection, $create_table_sql)) {
        // echo "Table created successfully!";
    } else {
        // echo "Error creating table: " . mysqli_error($connection);
    } */

    $insert_sql = "INSERT INTO course_descriptions (course_name, course_description , learning_outcomes ,  video_url )
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $c_name, $c_descrip , $learning_outcomes , $video_URL);

    if (mysqli_stmt_execute($stmt)) {
        // echo "Record inserted successfully!";
    } else {
        // echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    
}
 
/*
 
}

*/
 

function edit_Parent_Course($connect, $c_name, $cid, $c_descrip, $course_guide_name, $guide_email, $guide_key, $course_img , $course_duration) {

    //$table_name = $c_name;
     $connection = $connect;
    //  $table_name = mysqli_real_escape_string($connection, $table_name);
     
     $uploadedFile = $course_img; // Assign the file array to a variable $_FILES["image"]; 
     if(isset($uploadedFile) && $uploadedFile["error"] == 0) {
         $targetDir = "C:\\xampp\\htdocs\\testa3\\images\\";  // Directory to save uploaded images
         $targetFile = $targetDir . basename($uploadedFile["name"]);
         $imgName = "images/". $uploadedFile["name"];
         echo $imgName . "<br>";
         $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
 
         // Allow only certain image formats
         $allowedFormats = array("jpg", "jpeg", "png");
         if (in_array($imageFileType, $allowedFormats)) {
             if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                 echo "File uploaded successfully.";
             } else {
                 echo "Error uploading file.";
             }
         } else {
             echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
         }
     } else {
         echo "No file uploaded.";
     }
 
     $update_sql = "UPDATE parent_courses SET Course_Id = ?, Description = ?, Guide_name = ?, Guide_Email = ?, Guide_Key = ?, ImgName = ? , course_duration = ? WHERE C_Name = ?";
 
     $stmt = mysqli_prepare($connection, $update_sql);
     mysqli_stmt_bind_param($stmt, "ssssssss", $cid, $c_descrip, $course_guide_name, $guide_email, $guide_key, $imgName, $c_name , $course_duration);
      
     if (mysqli_stmt_execute($stmt)) {
         // echo "Record updated successfully!";
     } else {
         // echo "Error updating record: " . mysqli_stmt_error($stmt);
     }
      
     mysqli_stmt_close($stmt);
     mysqli_close($connection);
 }


 function edit_subcourses($connect, $c_name, $parnt_c_name ,$c_descrip , $course_img  ){

    $table_name = $c_name;
    $connection = $connect;
    $table_name = mysqli_real_escape_string($connection, $table_name);
    
    $uploadedFile = $course_img; // Assign the file array to a variable $_FILES["image"]; 
    if(isset($uploadedFile) && $uploadedFile["error"] == 0) {
        $targetDir = "C:\\xampp\\htdocs\\festa\\images\\";  // Directory to save uploaded images
        $targetFile = $targetDir . basename($uploadedFile["name"]);
        $imgName = "images/". $uploadedFile["name"];
        echo $imgName . "<br>";
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow only certain image formats
        $allowedFormats = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedFormats)) {
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        echo "No file uploaded.";
    }


    $update_sql = "UPDATE sub_courses SET Parnt_C_Name = ?, Description = ?, ImgName = ? WHERE C_Name = ?";

    $stmt = mysqli_prepare($connection, $update_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $parnt_c_name, $c_descrip, $imgName, $c_name);
    
    if (mysqli_stmt_execute($stmt)) {
        // echo "Record updated successfully!";
    } else {
        // echo "Error updating record: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

}

function edit_Introduction($connect, $c_name , $c_descrip  , $learning_outcomes , $video_URL ){
    
    $connection = $connect;

    $update_sql = "UPDATE course_descriptions SET course_description = ?, learning_outcomes = ?, video_url = ? WHERE course_name = ?";

    $stmt = mysqli_prepare($connection, $update_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $c_descrip, $learning_outcomes, $video_URL, $c_name);
    
    if (mysqli_stmt_execute($stmt)) {
        // echo "Record updated successfully!";
    } else {
        // echo "Error updating record: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    
    
}


/*
function delete_Parent_Course($connect, $c_name, $cid) {
    $connection = $connect;
    $table_name = $c_name;
     // Initialize an empty array

   /* // Delete from parent_courses table
    $delete_parent_sql = "DELETE FROM parent_courses WHERE C_Name = ? AND Course_Id = ?";
    $parent_stmt = mysqli_prepare($connection, $delete_parent_sql);
    mysqli_stmt_bind_param($parent_stmt, "ss", $c_name, $cid);
    if (mysqli_stmt_execute($parent_stmt)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_stmt_error($parent_stmt)
    }
    mysqli_stmt_close($parent_stmt);
     
    */

    /*
    $query = "SELECT C_Name FROM sub_courses WHERE Parnt_C_Name = '$c_name'";
    $result = $connection->query($query);
    
    $sub_course_names = []; // Initialize the array
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sub_course_names[] = $row['C_Name'];
        }
    }
    
    for ($i = count($sub_course_names) - 1; $i >= 0; $i--) {
        echo $sub_course_names[$i] . "<br>";
    }
    
    /*
    // Delete from sub_courses table
    $delete_sub_sql = "DELETE FROM sub_courses WHERE Parnt_C_Name = ?";
    $sub_stmt = mysqli_prepare($connection, $delete_sub_sql);
    mysqli_stmt_bind_param($sub_stmt, "s", $c_name);
    if (mysqli_stmt_execute($sub_stmt)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_stmt_error($sub_stmt)
    }
    mysqli_stmt_close($sub_stmt);
    
    $drop_table_sql = "DROP TABLE IF EXISTS $table_name";
    if (mysqli_query($connection, $drop_table_sql)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_error($connection)
    }

    mysqli_stmt_close($sub_stmt);
    */
 /*   mysqli_close($connection);
 
}
*/


function delete_Parent_Course($connect, $c_name, $cid) {
   // $sub_course_names = [];
    $connection = $connect; // Redundant assignment
  //  $table_name = $c_name;
/*
    // It's better to use parameterized queries to prevent SQL injection
    $query = "SELECT C_Name FROM sub_courses WHERE Parnt_C_Name = '$c_name'";
    $result = $connection->query($query); // Query execution
    // Initialize the array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sub_course_names[] = $row['C_Name']; // Collect sub-course names
        }
    }
    // Output sub-course names in reverse order
    for ($i = count($sub_course_names) - 1; $i >= 0; $i--) {
        echo $sub_course_names[$i] . "<br>";
    }
  */
    $delete_parent_sql = "DELETE FROM parent_courses WHERE C_Name = ? AND Course_Id = ?";
    $parent_stmt = mysqli_prepare($connection, $delete_parent_sql);
    mysqli_stmt_bind_param($parent_stmt, "ss", $c_name, $cid);
    if (mysqli_stmt_execute($parent_stmt)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_stmt_error($parent_stmt)
    }
    mysqli_stmt_close($parent_stmt);
    /*
    // Delete from sub_courses table
    $delete_sub_sql = "DELETE FROM sub_courses WHERE Parnt_C_Name = ?";
    $sub_stmt = mysqli_prepare($connection, $delete_sub_sql);
    mysqli_stmt_bind_param($sub_stmt, "s", $c_name);
    if (mysqli_stmt_execute($sub_stmt)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_stmt_error($sub_stmt)
    }
    mysqli_stmt_close($sub_stmt);

    // Deleting  sub_courses table
    for ($i = count($sub_course_names) - 1; $i >= 0; $i--) {  
        $drop_table_sql = "DROP TABLE IF EXISTS $sub_course_names[$i]";
        if (mysqli_query($connection, $drop_table_sql)) {
            // Log or report success
        } else {
            // Log or report error: mysqli_error($connection)
        }
    }

    for ($i = count($sub_course_names) - 1; $i >= 0; $i--) { 
        // Delete from corse_info table
        $delete_sub_sql = "DELETE FROM course_descriptions WHERE course_name = ?";
        $corse_info_stmt = mysqli_prepare($connection, $delete_sub_sql);
        mysqli_stmt_bind_param($corse_info_stmt, "s", $sub_course_names[$i]);
        echo $sub_course_names[$i] . "<br>";
        if (mysqli_stmt_execute($corse_info_stmt)) {
            // Log or report success
        } else {
            // Log or report error: mysqli_stmt_error($corse_info_stmt)
        }
        mysqli_stmt_close($corse_info_stmt);
    }*/
    
    mysqli_close($connection); // Close the connection
}

function delete_sub_Course($connect, $c_name ) {
    $connection = $connect;
    $table_name = $c_name;

    // Delete from sub_courses table
    $delete_sub_sql = "DELETE FROM sub_courses WHERE  C_Name = ?";
    $sub_stmt = mysqli_prepare($connection, $delete_sub_sql);
    mysqli_stmt_bind_param($sub_stmt, "s", $c_name);

    if (mysqli_stmt_execute($sub_stmt)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_stmt_error($sub_stmt)
    }

    mysqli_stmt_close($sub_stmt);
    
    $drop_table_sql = "DROP TABLE IF EXISTS $table_name";
    if (mysqli_query($connection, $drop_table_sql)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_error($connection)
    }
   
    // Delete from course_descriptions table
 

    mysqli_close($connection);
}

function delete_Course_intro($connect, $c_name ) {
    $connection = $connect;
    
    // Delete from sub_courses table
    $delete_sub_sql = "DELETE FROM course_descriptions WHERE course_name = ?";
    $sub_stmt = mysqli_prepare($connection, $delete_sub_sql);
    mysqli_stmt_bind_param($sub_stmt, "s", $c_name);
    if (mysqli_stmt_execute($sub_stmt)) {
        // Log or report success
    } else {
        // Log or report error: mysqli_stmt_error($sub_stmt)
    }
    mysqli_stmt_close($sub_stmt);

    mysqli_close($connection);
}


function add_Guide($connect, $Guide_name, $Guide_Id, $Guide_email, $Guide_phone, $GuideAdress, $Guide_Password, $Guide_Course) {
    $connection = $connect;
    $guide_img = "images/code1.JPG";
    $insert_sql = "INSERT INTO guides_details (Guide_name, Guide_Id, Guide_email, Guide_phone, GuideAdress, Guide_Password, Guide_Course, guide_image)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $Guide_name, $Guide_Id, $Guide_email, $Guide_phone, $GuideAdress, $Guide_Password, $Guide_Course, $guide_img);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}


function edit_Guide($connect, $Guide_name, $Guide_Id, $Guide_email, $Guide_phone, $GuideAdress, $Guide_Password, $Guide_Course) {
    $connection = $connect;

    $update_sql = "UPDATE guides_details SET Guide_name  = ?, Guide_Id  = ?, Guide_email  = ?, Guide_phone  = ?, GuideAdress = ?, Guide_Password = ? , Guide_Course  = ?  WHERE Guide_name  = ?";

    $stmt = mysqli_prepare($connection, $update_sql);
    if (!$stmt) {
        echo "Error preparing statement: " . mysqli_error($connection);
        return;
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $Guide_name, $Guide_Id, $Guide_email, $Guide_phone, $GuideAdress, $Guide_Password, $Guide_Course, $Guide_name);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}


function add_faculty_event($connect, $Event_name, $Topic, $time, $Hosted_bY) {
    $connection = $connect;
 
    $insert_sql = "INSERT INTO faculty_webinar (EventNAme, Topic , time , Hosted_By)
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $Event_name, $Topic, $time, $Hosted_bY);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

function add_student_event($connect, $Event_name, $Topic, $time, $Hosted_bY) {
    $connection = $connect;

    $insert_sql = "INSERT INTO students_webinar (EventNAme , Topic, Time , Hosted_By )
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $Event_name, $Topic, $time, $Hosted_bY);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

function add_courses_event($connect, $Course_name, $Duration , $launch_Date , $Hosted_bY) {
    $connection = $connect;

    $insert_sql = "INSERT INTO upcoming_courses (Course_name , Duration , launch_Date ,Hosted_By )
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $Course_name, $Duration, $launch_Date, $Hosted_bY);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}





function show_sub_courses($connection, $parent_course_name) {
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT C_Name FROM sub_courses WHERE Parnt_C_Name = '$parent_course_name'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseName = $row["C_Name"];
            echo '<button class="course_btn" style="margin-top: 3%;" onclick="alertFun(\'' . $courseName . '\');">' . $courseName . '</button>';
        }
    } else {
        echo "No results found.";
    }
}

function show_Guide_courses($connection, $guide_name) {
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT C_Name FROM parent_courses WHERE Guide_name  = '$guide_name'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseName = $row["C_Name"];
            echo '<button class="course_btn" style="margin-top: 3%;" onclick="alertFun(\'' . $courseName . '\');">' . $courseName . '</button>';
        }
    } else {
        echo "No results found.";
    }
}


function show_courses($connection ,  $course_name) {
   $sql = "SELECT C_Name, Parnt_C_Name , Description , ImgName FROM sub_courses where C_Name  =  '$course_name'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = htmlspecialchars($row["C_Name"]);
            $Description = htmlspecialchars($row["Description"]);
            $Img_name = htmlspecialchars($row["ImgName"]);

            echo '
            <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top: 10px;" >
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

                        <hr>
                        <p class="mb-0">
                            <strong>Go to Course:</strong>
                            <a href = "#"  onclick="goToCourseIntro(\'' . $course_name . '\')" ">Join Course</a>
                        </p>
                    </div>
                </div>
            </div>';
            

        }
        
    } else {
        echo "No results found.";
    }
}

  

 
if (isset($_POST['hiddenField'])) {

    $form_to_handle = $_POST['hiddenField'];
    if($form_to_handle == "ParentForm"){

        add_Parent_Course ($connection, $_POST['P_C_Name'], $_POST['P_Course_Id'], $_POST['P_Description'], $_POST['P_Guide_name'], $_POST['P_Guide_Email'], $_POST['P_Guide_Key'], $_FILES["image"] , $_POST['course_duration']);
    }
    if($form_to_handle == "SubForm"){

        add_subcourses($connection ,$_POST['Sub_C_Name']  ,$_POST['Sub_Parnt_C_Name'] ,$_POST['Sub_Description'] ,$_FILES["image2"]  );
    }
    if($form_to_handle == "DescriptionForm"){

        add_Introduction($connection ,$_POST['descrip_C_name'] ,$_POST['Intro_Description'] ,$_POST['Learning_Outcomes'] ,$_POST['Video_URL']);
    }
    if($form_to_handle == "Edit_Parent_Form"){
        
        edit_Parent_Course($connection, $_POST['P_C_Name'], $_POST['P_Course_Id'], $_POST['P_Description'], $_POST['P_Guide_name'], $_POST['P_Guide_Email'], $_POST['P_Guide_Key'], $_FILES["image"] , $_POST['course_duration']);
    }
    if($form_to_handle == "Edit_Sub_Course_Form"){
        
       edit_subcourses($connection ,$_POST['Sub_C_Name']  ,$_POST['Sub_Parnt_C_Name'] ,$_POST['Sub_Description'] ,$_FILES["image2"]  );
    }
    if($form_to_handle == "edit_Course_DescriptionForm"){
    
       edit_Introduction($connection ,$_POST['descrip_C_name'] ,$_POST['Intro_Description'] ,$_POST['Learning_Outcomes'] ,$_POST['Video_URL']);
    }
    if($form_to_handle == "delete_parent_Course"){
        
        delete_Parent_Course($connection,$_POST['P_C_Name'], $_POST['P_Course_Id']);
    }
    if($form_to_handle == "delete_Sub_course"){
       
        delete_sub_Course($connection,$_POST['Sub_C_Name']); 
    }
    if($form_to_handle == "delete_Course_info"){
        
        delete_Course_intro($connection,$_POST['descrip_C_name']);
    }
    if($form_to_handle == "Add_Guide"){
         
        add_Guide ($connection, $_POST['Guide_name'], $_POST['Guide_Id'], $_POST['Guide_email'], $_POST['Guide_phone'], $_POST['GuideAdress'], $_POST['Guide_Password'], $_POST["Guide_Course"]);
    
    }
    if($form_to_handle == "edit_Guide"){

        edit_Guide ($connection, $_POST['Guide_name'], $_POST['Guide_Id'], $_POST['Guide_email'], $_POST['Guide_phone'], $_POST['GuideAdress'], $_POST['Guide_Password'], $_POST["Guide_Course"]);
    }
    if($form_to_handle == "edit_Guide"){

        edit_Guide ($connection, $_POST['Guide_name'], $_POST['Guide_Id'], $_POST['Guide_email'], $_POST['Guide_phone'], $_POST['GuideAdress'], $_POST['Guide_Password'], $_POST["Guide_Course"]);
    }
    if($form_to_handle == "add_faculty_event"){
         
         add_faculty_event($connection , $_POST['Event_name'] , $_POST['Topic'] , $_POST['time'] , $_POST['Hosted_BY']); 
    }
    if($form_to_handle == "add_student_event"){
          
        add_student_event($connection , $_POST['Event_name'] , $_POST['Topic'] , $_POST['time'] , $_POST['Hosted_bY']); 
    }
    if($form_to_handle == "add_courses_event"){
         
       add_courses_event($connection , $_POST['Course_name'] , $_POST['Duration'] , $_POST['launch_Date'] , $_POST['Hosted_bY']); 
    }



}

if (isset($_GET['subject'])) {
    $parent_course =$_GET['subject'];    
    if($parent_course == "graphic Design"){
        show_sub_courses($connection, $parent_course ) ;
    }
    if($parent_course == "illustrator"){
        
    }
}

if (isset($_GET['subject'])) {
   $parent_course = $_GET['subject'];    
    show_sub_courses($connection, $parent_course);
}

if (isset($_GET['guideName'])) {
    $guide_name =$_GET['guideName'];    
    show_Guide_courses($connection, $guide_name );
}

if (isset($_GET['courseName'])) {
    $course_name =$_GET['courseName'];    
   // show_Guide_courses($connection, $course_name ) ;
   show_courses($connection ,  $course_name);
    
}


 



    
?>



 