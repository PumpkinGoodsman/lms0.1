         
                <div class="col-12 text-center">
                    <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"> Edit Guide </h3>
                </div>
                <form id="edit_Guide_Form" style="background-color:  #DDDDDD ; margin-left: 0.5%;"   >
                    <table>
                        <tr>
                            <th  style="color: #333333;">Guide_name</th>
                            <th  style="color: #333333;">Guide_Id</th>
                            <th  style="color: #333333;">Guide_email</th>


                             
                            
                        </tr>
                        <tr>
                            <td><input type="text" name="Guide_name"  style="color: #333333;" ></td>
                            <td><input type="text" name="Guide_Id"  style="color: #333333;"></td>
                            <td><input type="email" name="Guide_email"  style="color: #333333;"></td>

                             
                        </tr>
                        <tr>
                            <th  style="color: #333333;">Guide_phone</th> 
                            <th  style="color: #333333;">GuideAdress</th>
                            <th  style="color: #333333;">Guide_Password</th>
                        </tr>
                        <tr>
                            <td><input type="tel" name="Guide_phone" pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$" placeholder="Enter Pakistani phone number" required  style="color: #333333;"></td>
                            <td><input type="text" name="GuideAdress"  style="color: #333333;"></td>
                            <td><input type="password" name="Guide_Password" placeholder="Enter password" required  style="color: #333333;"></td>
                        </tr>
                        <tr>
                             <th  style="color: #333333;">Guide_Course</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Guide_Course"  style="color: #333333;"></td>
                            <td><input type="hidden" name="hiddenField" value="edit_Guide"  style="color: #333333;"></td>
                        </tr>
                        <tr>
                            <td><button id="edit_Guide_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
                        </tr>
                    </table>
                </form>
      