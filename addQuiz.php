 
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
                    <h3 class="mb-4" style="color:white;"> Create Quiz</h3>
                </div>
                <form id="Create_Quiz_form"   >
                    <table>
                        <tr>
                            <th>C_Name</th>
                            <th>quiz title </th>
                        </tr>
                        <tr>
                            <td> 
                                <?php
                                    echo '<select id="dropdown" name="C_Name">';
                                       fetch_courses($connection, $user_name, $admin_Id);
                                    echo '</select>';
                                 ?>
                            </td>
                            <td><input type="text" name="quiz_title" style="color: white;"></td>
                        </tr>
                        <tr>
                            <th>student name </th> 
                            <th>student id</th>
                            
                        </tr>
                        <tr>
                            <td><input type="text" name="student_name" style="color: white;"></td>
                            <td><input type="email" name="student_id" style="color: white;"></td>
                            
                        </tr>
                        <tr>
                            <th>Total Marks</th>
                        </tr>
                        <tr> 
                            <td>
                                <select id="dropdown" name="Total_Marks">
                                    <option value="10">10 * 1</option>
                                    <option value="20">10 * 2</option>
                                    <option value="30">10 * 3</option>
                                    <option value="40">10 * 4</option>
                                    <option value="50">10 * 5</option>
                                    <option value="60">10 * 6</option>
                                    <option value="70">10 * 7</option>
                                    <option value="80">10 * 8</option>
                                    <option value="90">10 * 9</option>
                                    <option value="100">10 * 10</option>
                                </select>
                            </td>
                            <td><input type="hidden" name="hiddenField" value="Create_Quiz"></td>
                        </tr>
                        <tr>
                            <td><button id="Create_Quiz_sbmt_btn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
         </div>   
 
        <div class="subcourse_div" id="subCorse_div"> 
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color:white;">Add Questions</h3>
              </div>
              <form id="Add_questions_to_quiz_form"  >
                  <table>
                      <tr>
                          <th>Question</th>
                          <th>Option A</th>
                          <th>Option B</th>                          
                      </tr>
                      <tr>
                          <td><input type="text" name="Question" style="color: white;"></td>
                          <td><input type="text" name="Option_A" style="color: white;"></td>
                          <td><input type="text" name="Option_B" style="color: white;"></td>
                      </tr>
                      <tr>
                          <th>Option C</th>
                          <th>Option D</th> 
                      </tr>
                      <tr>
                          <td><input type="text" name="Option_C" style="color: white;"></td>
                          <td><input type="text" name="Option_D" style="color: white;"></td>
                      </tr>
                      <tr>
                          <th>Correct Answer</th>
                          
                      </tr>
                      <tr>
                          <td><input type="text" name="Correct_Answer" style="color: white;"></td>
                          <td><input type="hidden" name="hiddenField" value="Add_question_to_quiz"></td>
                      </tr>
                      <tr>
                          <td><button id="Add_questions_to_quiz_Btn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
        </div>    
  
<script>
 
</script>
        