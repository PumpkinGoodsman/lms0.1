 
 <div class="parentCourse_div" id="ParentCourse_div" >
                <div class="col-12 text-center">
                    <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"> Parent Course</h3>
                </div>
                <form id="delete_parent_Course" style="background-color:  #DDDDDD ; margin-left: 0.5%;"  >
                    <table>
                        <tr>
                            <th style="color: #333333;">C_Name</th>
                            <th style="color: #333333;">Course_Id</th>                                                        
                        </tr>
                        <tr>
                            <td><input type="text" name="P_C_Name" style="color: #333333;"></td>
                            <td><input type="text" name="P_Course_Id" style="color: #333333;"></td>
                            <td><input type="hidden" name="hiddenField" value="delete_parent_Course"></td>
                        </tr>
                        <tr>
                            <td><button id="delete_parent_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
         </div>   
 
        <div class="subcourse_div" id="subCorse_div"> 
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color: #003366 ; margin-top: 4%; margin-bottom:4%;">for Sub Courses </h3>
              </div>
              <form id="delete_Sub_course"  >
                  <table>
                      <tr>
                          <th style="color: #333333;">C_Name</th>           
                      </tr>
                      <tr>
                          <td><input type="text" name="Sub_C_Name" style="color: #333333;"></td>
                          <td><input type="hidden" name="hiddenField" value="delete_Sub_course"></td>
 
                      </tr>
                      <tr>
                          <td><button id="delete_subcourse_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
              <div class="col-12 text-center">
                <h3 class="mb-4" style="color: #003366 ; margin-top: 4%; margin-bottom:4%;">Del Course Intro </h3>
              </div>
              <form id="Delete_info"  style="background-color:  #DDDDDD ; margin-left: 0.5%;"  > <!-- Replace "anotherAction.php" with the appropriate action URL -->
                  <table>
                      <tr>
                          <th style="color: #333333;">C_name</th>
                                   
                      </tr>
                      <tr>
                          <td><input type="text" name="descrip_C_name" style="color: #333333;"></td> 
                          <td><input type="hidden" name="hiddenField" value="delete_Course_info"></td>
                      </tr>
                      <tr>
                          <td><button id="delete_corse_info_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                      </tr>
                  </table>
              </form>
        </div>              
  
 
  
    

    
  
   


 

<script>
 
</script>
        