 
 
     
<div class="Login_forms" id="Login_form" style="background-image: none; background-color:  #E0E0E0;  filter: drop-shadow(2px 2px 4px grey);">
     <h3 class="text-center mb-4"  style="color: #333333; margin :7%;">login</h3>
    <table id="form_table" > 
        <tr>  
            <td><button class="select_btn target_btn_class" id="student_btn" style="margin-left: 42px; color:#333333;" onclick="showStudentForm()" >Student</button></td>
            <td><button class="select_btn" id="teacher_btn" style="margin-left: 42px; color:#333333;" onclick="showTeacherForm()">Teacher</button></td>
        </tr>
    </table>
    <form class="custom-form ticket-form mb-5 mb-lg-0" id="teacher_form"  style="background-image: none; background-color:  #E0E0E0; " >
        <div class="ticket-form-body"  >
            <table> 
                <tr>
                    <td><h9 style="color: #333333;">Guide Name :</h9><input type="text" name="Guide_name" id="ticket-form-name"   class="form-control" placeholder="Full name" required></td>
                </tr>
                <tr>
                    <td><h9 style="color: #333333;">Email :</h9><input type="text" name="Guide_email" id="ticket-form-name"   class="form-control" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><h9 style="color: #333333;">Password :</h9><input type="password" name="Guide_password" id="ticket-form-name"   class="form-control" placeholder="Password" required></td>
                </tr>
                <tr>
                    
                    <td><button type="submit" class="form-control" id="teacher_form_btn" >Login</button> </td>
                    <td><input type="hidden" name="hiddenField" value="teachers_login_form"></td>
                </tr>
            </table>
        </div>
    </form>
    <form class="custom-form ticket-form mb-5 mb-lg-0" id="student_form" style="background-image: none; background-color:  #E0E0E0; "  >
        <div class="ticket-form-body"  >
            <table> 
                <tr>
                    <td><h9 style="color:#333333;" >Student Name</h9><input type="text" name="student_name" id="ticket-form-name"   class="form-control" placeholder="Full name" required></td>
                </tr>
                <tr>
                    <td><h9 style="color:#333333;" >Email</h9><input type="email" name="student_email" id="ticket-form-name"   class="form-control" placeholder="email" required></td>
                </tr>
                <tr>
                    <td><h9 style="color:#333333;">Password</h9><input type="password" name="student_password" id="ticket-form-name"   class="form-control" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td><button type="submit" class="form-control" id="student_form_btn" style="text-align: center;" >Login</button> </td>
                    <td><input type="hidden" name="hiddenField" value="student_login_form"></td>
                </tr>
            </table>
        </div>
    </form>
    
</div>
 