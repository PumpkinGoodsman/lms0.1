 

 

 <div class="parentCourse_div" id="ParentCourse_div" >
                <div class="col-12 text-center">
                  <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;">Parent Course</h3>
                </div>
                <form id="myForm" style="background-color:  #DDDDDD ; margin-left: 0.5%;"  >
                    <table>
                        <tr>
                            <th style="color: #333333;">C_Name</th>
                            <th style="color: #333333;">Course_Id</th>
                            <th style="color: #333333;">Description</th>

                        </tr>
                        <tr>
                            <td><input type="text" name="P_C_Name" style="color: #333333;"></td>
                            <td><input type="text" name="P_Course_Id" style="color: #333333;"></td>
                            <td><input type="text" name="P_Description" style="color: #333333;"></td>

                        </tr>
                        <tr>
                            <th style="color: #333333;">Guide_name</th> 
                            <th style="color: #333333;">Guide_Email</th>
                            <th style="color: #333333;">Guide_Key</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="P_Guide_name" style="color: #333333;"></td>
                            <td><input type="email" name="P_Guide_Email" style="color: #333333;"></td>
                            <td><input type="text" name="P_Guide_Key" style="color: #333333;"></td>
                        </tr>
                        <tr>
                            <th style="color: #333333;">Upload_img</th>
                            <th style="color: #333333;">Duration</th>
                            <th style="color: #333333;">SubCourses</th>
                        </tr>
                        <tr>
                            <td><input type="file" id="image" name="image" accept="image/*" class="file-input"></td>
                            <td><input type="text" name="course_duration"></td>
                            <td>
                                <select id="dropdown" name="Sub_courses">
                                    <option value="1" style="color: #333333;">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="9">10</option>
                                </select>
                            </td>
                            <td><input type="hidden" name="hiddenField" value="ParentForm"></td>
                        </tr>
                        <tr>
                            <td><button id="submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
         </div>   
 
        <div class="subcourse_div" id="subCorse_div"> 
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color: #003366 ; margin-top: 4%; margin-bottom:4%;">Sub Courses</h3>
              </div>
              <form id="myForm2"  >
                  <table>
                      <tr>
                          <th style="color: #333333;" >C_Name</th>
                          <th style="color: #333333;">Parnt_C_Name</th>
                          <th style="color: #333333;">Description</th>
                                                               
                      </tr>
                      <tr>
                          <td><input type="text" name="Sub_C_Name" style="color: #333333;"></td>
                          <td><input type="text" name="Sub_Parnt_C_Name" style="color: #333333;"></td>
                          <td><input type="text" name="Sub_Description" style="color: #333333;"></td>

                      </tr>
                      <tr>
                           <th style="color: #333333;" >ImgName</th> 
                      </tr>
                      <tr>
                          <td><input type="file" id="image2" name="image2" accept="image/*" style="color: #333333;"></td>
                          <td><input type="hidden" name="hiddenField" value="SubForm" style="color: #333333;"></td> 
                      </tr>
                      <tr>
                          <td><button id="submitBtn2" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color:#003366;"> Course Introduction</h3>
              </div>
              <form id="myForm3" style="background-color:  #DDDDDD ; margin-left: 0.5%; margin-bottom: 8%;">  
                  <table>
                      <tr>
                          <th style="color: #333333;">C_name</th>
                          <th style="color: #333333;">Description</th>
                          <th style="color: #333333;">Learning_Outcomes</th> 
                                                            
                      </tr>
                      <tr>
                          <td><input type="text" name="descrip_C_name" style="color: #333333;"></td>
                          <td><input type="text" name="Intro_Description" style="color: #333333;"></td>
                          <td><input type="text" name="Learning_Outcomes" style="color: #333333;"></td>

                      </tr>
                      <tr>
                          <th style="color: #333333;" >Video_URL</th> 
                      </tr>
                      <tr>
                          <td><input type="text" name="Video_URL" style="color: #333333;"></td>
                          <td><input type="hidden" name="hiddenField" value="DescriptionForm"></td>
                      </tr>
                      <tr>
                          <td><button id="submitBtn3" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
        </div>    
  
    

    
  
   


 

<script>
 
</script>
        