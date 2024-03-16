         
<div class="col-12 text-center">
    <h3 class="mb-4" style="color: #003366 ; margin-top: 4%;"> add Guide</h3>
</div>
<form id="add_guide_myForm" style="background-color:  #DDDDDD ; margin-left: 0.5%;" >
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
            <td><input  style="color: #333333;" type="tel" name="Guide_phone" pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$" placeholder="Enter Pakistani phone number" required ></td>
            <td><input  style="color: #333333;" type="text" name="GuideAdress"></td>
            <td><input  style="color: #333333;" type="password" name="Guide_Password" placeholder="Enter password" required></td>
        </tr>
        <tr>
            <th  style="color: #333333;">Guide_Course</th>
        </tr>
        <tr>
            <td><input type="text" name="Guide_Course"  style="color: #333333;"></td>
            <td><input type="hidden" name="hiddenField" value="Add_Guide"></td>
        </tr>
        <tr>
            <td><button id="add_guide_submitBtn" class="btn custom-btn d-lg-block d-none" style="margin-top: 3%;">Submit</button></td>
        </tr>
    </table>
</form>

 