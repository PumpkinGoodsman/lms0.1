 



 <div class="parentCourse_div" id="ParentCourse_div" >
                <div class="col-12 text-center">
                    <h3 class="mb-4"> Faculty Webinar</h3>
                </div>
                <form id="myForm"   >
                    <table>
                        <tr>
                            <th>EventNAme</th>
                            <th>Topic</th>
                            <th>time</th>
                            <th>Hosted BY</th> 
                            
                        </tr>
                        <tr>
                            <td><input type="text" name="EventNAme" ></td>
                            <td><input type="text" name="Topic"></td>
                            <td><input type="text" name="time"></td>
                            <td><input type="text" name="Hosted BY"></td>
                        </tr>
                        <tr>
                            <td><button id="submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
         </div>   
 
        <div class="subcourse_div" id="subCorse_div"> 
              <div class="col-12 text-center">
                <h3 class="mb-4">Students Webinar </h3>
              </div>
              <form id="myForm2" action="adminPanelAction.php" method="post">
                    <table>
                                <tr>
                                    <th>EventNAme</th>
                                    <th>Topic</th>
                                    <th>time</th>
                                    <th>Hosted BY</th> 
                                    
                                </tr>
                                <tr>
                                    <td><input type="text" name="EventNAme" ></td>
                                    <td><input type="text" name="Topic"></td>
                                    <td><input type="text" name="time"></td>
                                    <td><input type="text" name="Hosted BY"></td>
                                </tr>
                                <tr>
                                    <td><button id="submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                                </tr>
                    </table>
              </form>
              <div class="col-12 text-center">
                <h3 class="mb-4">Upcoming Courses  </h3>
              </div>
              <form id="myForm2" action="adminPanelAction.php" method="post">
                    <table>
                                <tr>
                                    <th>EventNAme</th>
                                    <th>Topic</th>
                                    <th>time</th>
                                    <th>Hosted BY</th> 
                                    
                                </tr>
                                <tr>
                                    <td><input type="text" name="EventNAme" ></td>
                                    <td><input type="text" name="Topic"></td>
                                    <td><input type="text" name="time"></td>
                                    <td><input type="text" name="Hosted BY"></td>
                                </tr>
                                <tr>
                                    <td><button id="submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                                </tr>
                    </table>
              </form>
        </div>    
  
    

    
  
   


 

<script>
        var parentSubmitButton = document.getElementById('submitBtn');
        var countOfSubCourses;

        document.addEventListener('DOMContentLoaded', function() {
            // Bind a click event to the submit button
            document.getElementById('submitBtn').addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the default form submission
                
                // Get form data
                var formElement = document.getElementById('myForm');
                var formData = new FormData(formElement);
                var subCourseCount = formData.get('Sub_courses');
                
                parentSubmitButton.style.backgroundColor = 'green';
                parentSubmitButton.innerText = 'Submitted';
                
                // Send the AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'adminPanelAction.php'); // Change this to the actual PHP file that processes the form

                xhr.onload = function() {
                if (xhr.status === 200) {
                    // Display the response in the resultDiv
                    // document.getElementById('subCourse_div').innerHTML = xhr.responseText;
                   console.log("added");
                } else {
                    // Handle errors if any
                    alert('An error occurred while processing the form.');
                }
                };

                xhr.onerror = function() {
                // Handle errors if any
                alert('An error occurred while processing the form.');
                };

                xhr.send(formData);
            });
        });
</script>
        