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
 
 
 }
 
 if(!isset($_SESSION["user_on_page"])){
 
 }
 ob_end_flush();
 
 
  
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
     // Sanitize inputs to prevent SQL injection
     $guide_name = $connection->real_escape_string($guide_name);
     $guide_id = $connection->real_escape_string($guide_id);
  
     // Use single quotes around string values in the SQL query
     $sql = "SELECT C_Name, Course_Id, Guide_name, Guide_Key FROM parent_courses WHERE  Guide_name = '$guide_name' AND Guide_Key = '$guide_id' AND C_Name = '$course_name'";
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
 <div class="parentCourse_div" id="ParentCourse_div" >
                <div class="col-12 text-center">
                    <h3 class="mb-4"> Add To Course</h3>
                </div>
                <form id="add_to_guide_course"   >
                    <table>
                        <tr>
                            <th>Course Name </th>
                            <th>lecture_no </th>
                            <th>Lecture_topic</th>
                        </tr>
                        <tr>
                            <td>
                                 <?php
                                    echo '<select id="dropdown" name="Course_Name">';
                                       fetch_courses($connection, $user_name, $admin_Id);
                                    echo '</select>';
                                 ?>
                            </td>
                            <td><input type="text" name="lecture_no"></td>
                            <td><input type="text" name="Lecture_topic"></td>
                        </tr>
                        <tr>
                            <th> Description</th> 
                            <th> outcomes</th>
                            <th>video_url</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Lecture_Description"></td>
                            <td><input type="text" name="lecture_outcomes"></td>
                            <td><input type="text" name="video_url"></td>
                        </tr>
                        <tr>
                            <th>lesson_pdf </th>
                            <th>lectures Count</th>   
                        </tr>
                        <tr>
                            <td><input type="file" id="document" name="document" accept=".pdf, .doc, .docx"></td>
                            <td><input type="text" name="lectures_count"></td>
                            <td><input type="hidden" name="hiddenField" value="add_lecture"></td>
                        </tr> 
                        <tr>
                            <td><button id="add_to_guide_course_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
         </div>  


<script>
 
</script>
        