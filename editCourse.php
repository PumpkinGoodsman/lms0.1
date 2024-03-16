 
        <div class="parentCourse_div" id="ParentCourse_div" >
                <div class="col-12 text-center">
                    <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"> Edit Parent Course</h3>
                </div>
                <form id="edit_parent_course" style="background-color:  #DDDDDD ; margin-left: 0.5%;"   >
                    <table>
                        <tr>
                            <th  style="color: #333333;">C_Name</th>
                            <th  style="color: #333333;">Course_Id</th>
                            <th  style="color: #333333;">Description</th>
                       
                        </tr>
                        <tr>
                            <td><input type="text" name="P_C_Name"  style="color: #333333;" ></td>
                            <td><input type="text" name="P_Course_Id"  style="color: #333333;"></td>
                            <td><input type="text" name="P_Description"  style="color: #333333;"></td>
                        </tr>
                        <tr>
                            <th style="color: #333333;">Guide_name</th> 
                            <th style="color: #333333;">Guide_Email</th>
                            <th style="color: #333333;">Guide_Key</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="P_Guide_name"  style="color: #333333;"></td>
                            <td><input type="email" name="P_Guide_Email"  style="color: #333333;"></td>
                            <td><input type="text" name="P_Guide_Key"  style="color: #333333;"></td>
                        </tr>
                        <tr>
                            <th  style="color: #333333;">Upload_img</th>
                        </tr>
                        <tr>
                            <td><input type="file" id="image" name="image" accept="image/*"  style="color: #333333;"></td>
                            <td><input type="hidden" name="hiddenField" value="Edit_Parent_Form" style="color: white;"></td>
                        </tr>
                        <tr>
                            <td><button id="edit_parent_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
        </div>   
 
        <div class="subcourse_div" id="subCorse_div"> 
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color: #003366 ; margin-top: 4%; margin-bottom:4%;">Sub Courses</h3>
              </div>
              <form id="edit_Sub_course"  >
                  <table>
                      <tr>
                          <th style="color: #333333;">C_Name</th>
                          <th style="color: #333333;">Parnt_C_Name</th>
                          <th style="color: #333333;">Description</th>
                                                               
                      </tr>
                      <tr>
                          <td><input type="text" name="Sub_C_Name" style="color: #333333;"></td>
                          <td><input type="text" name="Sub_Parnt_C_Name" style="color: #333333;"></td>
                          <td><input type="text" name="Sub_Description" style="color: #333333;"></td>
                          
                      </tr>
                      <tr>
                         <th style="color: #333333;">ImgName</th> 
                      </tr>
                      <tr> 
                           <td><input type="file" id="image2" name="image2" accept="image/*" style="color: #333333;"></td>
                           <td><input type="hidden" name="hiddenField" value="Edit_Sub_Course_Form"></td>
                      </tr>
                      <tr>
                          <td><button id="edit_subcourse_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color:#003366;"> Course Introduction</h3>
              </div>
              <form id="edit_course_info" style="background-color:  #DDDDDD ; margin-left: 0.5%; margin-bottom: 8%;" > <!-- Replace "anotherAction.php" with the appropriate action URL -->
                  <table>
                      <tr>
                          <th style="color: #333333;">C_name</th>
                          <th style="color: #333333;">Description</th>
                          <th style="color: #333333;">Learning_Outcomes</th> 
                                                           
                      </tr>
                      <tr>
                          <td><input type="text" name="descrip_C_name" style="color: #333333;" ></td>
                          <td><input type="text" name="Intro_Description" style="color: #333333;" ></td>
                          <td><input type="text" name="Learning_Outcomes" style="color: #333333;"></td>
                          <td><input type="hidden" name="hiddenField" value="edit_Course_DescriptionForm"></td>
                      </tr>
                      <tr>
                          <th style="color: #333333;">Video_URL</th>  
                      </tr>
                      <tr>
                          <td><input type="text" name="Video_URL" style="color: #333333;"></td>
                      </tr>
                      <tr>
                          <td><button id="edit_corse_info_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
        </div>    
  
    

    
  
   


 

<script>
 
</script>
        