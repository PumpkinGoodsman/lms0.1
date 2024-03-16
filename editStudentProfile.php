 
          
<div class="col-12 text-center">
<h3 class="mb-4"  style="color: #003366 ; margin-top: 4%;"> Edit Your Profile</h3>
</div>
<form id="Edit_Student_myForm" style="background-color:  #DDDDDD ; margin-left: 0.5%; margin-bottom: 10%;"   >
<table>
    <tr>
        <th style="color: #333333;">Your Name</th>
        <th style="color: #333333;">Your Id</th>
        
    </tr>
    <tr>
        <td><input type="text" name="sudent_name" style="color: #333333;" ></td>
        <td><input type="text" name="Student_Id" style="color: #333333;"></td>
         
    </tr>
    <tr>
        <th  style="color: #333333;">Your phone</th> 
        <th  style="color: #333333;">Your Adress</th>
        <th  style="color: #333333;">Your Password</th>
    </tr>
    <tr>
        <td><input style="color: #333333;" type="tel" name="Student_phone" pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$" placeholder="Enter Pakistani phone number" required ></td>
        <td><input style="color: #333333;" type="text" name="Student_adress"></td>
        <td><input style="color: #333333;" type="password" name="Student_Password" placeholder="Enter password" required></td>
    </tr>
    <tr>
        <th style="color: #333333;">Your email</th>
    </tr>
    <tr>
        <td><input type="text" name="student_email" style="color: #333333;"></td>
        <td><input type="hidden" name="hiddenField" value="Edit_Student_profile"></td>
    </tr>
    <tr>
        <th style="color: #333333;">Edit Image</th>
    </tr>
    <tr>
        <td><input type="file" id="image" name="image" accept="image/*" class="file-input" style="color: #333333;"></td>
    </tr>
    <tr>
        <td><button id="Edit_Student_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
    </tr>
</table>
</form>


 