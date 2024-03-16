 



<div class="parentCourse_div" id="ParentCourse_div" >
    <div class="col-12 text-center">
        <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"> Faculty Webinar</h3>
    </div>
    <form id="add_event_myForm"  style="background-color:  #DDDDDD ; margin-left: 0.5%;" >
        <table>
            <tr>
                <th style="color: #333333;">Event Name</th>
                <th style="color: #333333;">Topic</th>
                <th style="color: #333333;">time</th>
               
                
            </tr>
            <tr>
                <td><input type="text" name="Event_name" style="color: #333333;" ></td>
                <td><input type="text" name="Topic" style="color: #333333;"></td>
                <td><input type="text" name="time" style="color: #333333;"></td>
            </tr>
            <tr>
                <th style="color: #333333;">Hosted BY</th> 
            </tr>
            <tr>
                <td><input type="text" name="Hosted_BY" style="color: #333333;"></td>
                <td><input type="hidden" name="hiddenField" value="add_faculty_event" ></td>
            </tr>
            <tr>
                <td><button id="add_event_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
            </tr>
        </table>
    </form>
</div>   

<div class="subcourse_div" id="subCorse_div"> 
    <div class="col-12 text-center">
    <h3 class="mb-4" style="color: #003366 ; margin-top: 4%; margin-bottom:4%;">Students Webinar </h3>
    </div>
    <form id="add_event_myForm2" action="adminPanelAction.php" method="post">
        <table>
                    <tr>
                        <th style="color: #333333;">EventNAme</th>
                        <th style="color: #333333;">Topic</th>
                        <th style="color: #333333;">time</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="Event_name" style="color: #333333;" ></td>
                        <td><input type="text" name="Topic" style="color: #333333;"></td>
                        <td><input type="text" name="time" style="color: #333333;"></td>
                    </tr>
                    <tr>
                         <th >Hosted BY</th> 
                    </tr>
                    <tr>
                        <td><input type="text" name="Hosted_bY" style="color: #333333;"></td>
                        <td><input type="hidden" name="hiddenField" value="add_student_event"></td>
                    </tr>
                    <tr>
                        <td><button id="add_event_submitBtn2" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                    </tr>
        </table>
    </form>
    <div class="col-12 text-center">
    <h3 class="mb-4" style="color:#003366;" >Upcoming Courses  </h3>
    </div>
    <form id="add_event_myForm3" style="background-color:  #DDDDDD ; margin-left: 0.5%; margin-bottom: 8%;">
        <table>
                    <tr>
                        <th style="color: #333333;">Course name</th>
                        <th style="color: #333333;">Duration</th>
                        <th style="color: #333333;">launch Date</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="Course_name" style="color: #333333;"></td>
                        <td><input type="text" name="Duration" style="color: #333333;"></td>
                        <td><input type="text" name="launch_Date" style="color: #333333;"></td>

                    </tr>
                    <tr>
                        <th style="color: #333333;">Hosted BY</th> 
                    </tr>
                    <tr>
                        <td><input type="text" name="Hosted_bY" style="color: #333333;"></td>
                        <td><input type="hidden" name="hiddenField" value="add_courses_event"></td>
                    </tr>
                    <tr>
                        <td><button id="add_event_submitBtn3" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
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
        