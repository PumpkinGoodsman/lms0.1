<?php
 
  
 function fetch_courses($connection, $user_name, $user_id) {
    if ($_SESSION["user_on_page"] = "guide"){
        $sql = "SELECT C_Name FROM parent_courses";
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_name = $row["C_Name"];
                check_if_registered_already($connection, $course_name, $user_name, $user_id);
            }
        } else {
            echo "No results found.";
        }
    }

 }
 
 function check_if_registered_already($connection, $course_name, $guide_name, $guide_id) {

    if ($_SESSION["user_on_page"] = "student"){
        $guide_name = $connection->real_escape_string($guide_name);
        $guide_id = $connection->real_escape_string($guide_id);
        $table_name = $course_name . "_students";
        // Use single quotes around string values in the SQL query
        $sql = "SELECT student_name , student_id  FROM `$table_name` WHERE  student_name = '$guide_name' AND student_id = '$guide_id' ";
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
    if ($_SESSION["user_on_page"] = "guide"){
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
     
 }
 
function print_courses($connection, $courseName) {
    // Sanitize the input to prevent SQL injection
    $course_name = $connection->real_escape_string($courseName);

    $sql = "SELECT C_Name  FROM parent_courses WHERE C_Name = '$course_name'";
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

    $result->free_result();
}

?> 
<style>
    .chat_box{
        width: 40vw;
        height: 70vh;
        margin-left: 19%;
        margin-top: 5%;
        margin-bottom: 5%;
        border-radius: 40px;
        border: 1px solid #808080;;
        background-color: #DDDDDD;
        display: flex;
        flex-direction: column;
        filter: drop-shadow(2px 2px 2px  #808080); 
    }
    .chat_head{
        width: 39.8vw;
        height: 10vh;
        border-radius: 40px 40px 0px 0px;
        background-color:  #808080;   
    }
    .massage_area{
        width: 40vw;
        height: 50vh;
        overflow-y: auto;
        overflow-x: hidden
    }
    .msg_body{
        width: 38vw;
        height: auto;  
        display: flex;
        flex-direction: column; 
        margin-top: 5%;
        margin-bottom: 25px;
        
    }
    .curret_usr_msg_body{
        width: 38vw;
        height: auto;  
        display: flex;
        flex-direction: column; 
        margin-top: 18px;
        margin-bottom: 20px;
        margin-left: 110px;
    }
    .sender_info{
        width: 10vw;
        height: auto;
        display: flex;
        flex-direction: row;
        background-color: transparent;
        margin-left: 2%;
        margin-bottom: 3px;
        border-radius: 0px 0px  0px  0px;
        font-size: x-small ;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        justify-content:  space-around ;
      /*  color:  #003366; */
        color:  black; 
        overflow-y: hidden;

    }
    .curret_sender_info{
        width: 10vw;
        height: auto;
        display: flex;
        flex-direction: column;
        background-color: transparent;
        margin-left: 67%;
        margin-bottom: 1%;
        border-radius: 0px 0px  0px  0px;
        font-size: x-small ;
        font-weight: bold;
        justify-content:  space-around ;
        color:  black;
        overflow-y: hidden;
    }
    .sender_pic{
        width: 1.5vw;
        height: 3vh;
        border-radius: 60px;
        background-color: white;
        
    }
    .sender_name{
        width: 7vw;
        height: 2.5vh;
        margin-top: 2px;
       
    }
    .msg{
        width: 18vw;
        height: auto;
        background-color:  #CCCCCC; 
        margin-left: 2%;
        display: flex;
        color: #003366;
        border-radius:  4px    4px  4px  4px;
        text-align: center;
        
    }
    .msg  h8 {
        margin-left: 3%;
    }
    .curret_sender_msg{
        width: 18vw;
        height: auto;
        background-color: #003366;
        margin-left: 28%;
        display: flex;
        color: white;
        border-radius:  4px   4px 4px 4px;
        text-align: center;
         
    }
    .chat_footer{
        width: 39.8vw;
        height: 10vh;
        border-radius:  0px  0px 40px 40px;
        background-color:  #808080;
        display: flex;
    }
    .input_area{
        width: 29.8vw;
        height: 7vh;
        align-self: center;
        margin-left: 12%;
    }
    form{
        width: 29.8vw;
        height: 7vh;
        align-self: center;
        display: flex;
        flex-direction: row;
    }
    input{
        width: 19.8vw;
        height: 6vh;
        overflow-y: auto;
        border: 2px solid silver;
        color: white;
        border-radius:  40px   0px  40px 40px;
    }
    button{
        width:  3vw;
        height: 5vh;
        border-radius: 60px;
        align-self: center;
        margin-left: 5%;
        background-image: url("python.JPG");
        background-size: 100% 100%;
    }
    #button2{
        width:  3vw;
        height: 4vh;
        border-radius:  0px;
    }
    #dropdown2{
         width: 5vw;
         height: 5vh;
         margin-left: 5%;
         margin-top: 1%;
         
    }

    @media (max-width: 830px ) and (min-width: 714px){

        .chat_box{
            width: 40vw;
            height: 45vh;
            margin-left: 19%;
            margin-top: 5%;
            margin-bottom: 5%;
            border-radius: 40px;
            background-color: #DDDDDD;
            display: flex;
            flex-direction: column;
            filter: drop-shadow(2px 2px 2px  #808080); 
 
        }
        .chat_head{
            width: 39.8vw;
            height: 8vh;
            border-radius: 40px 40px 0px 0px;
            background-color:  #808080; 
               
        }
        .massage_area{
            width: 39vw;
            height: 38vh;
            overflow-y: auto;
            overflow-x: hidden;
             
        }
        .msg_body{
            width: 38vw;
            height: auto;  
            display: flex;
            flex-direction: column; 
            margin-top: 5px;
            margin-bottom: 5px;
           
            
        }
        .curret_usr_msg_body{
            width: 38vw;
            height: auto;  
            display: flex;
            flex-direction: column; 
            margin-top: 18px;
            margin-bottom: 20px;
            margin-left : 68px;
            
        }
        .sender_info{
            width: 14vw;
            height: auto;
            display: flex;
            flex-direction: row;
            background-color: transparent;
            margin-left: 2%;
            margin-bottom: 3px;
            border-radius: 20px 20px 20px 0px;
            font-size: x-small ;
            font-weight: bold;
            display: flex;
            flex-direction: row;
            justify-content:  space-around ;
            color:  #003366;
            overflow-y: hidden;

        }
        .curret_sender_info{
            width: 14vw;
            height: auto;
            display: flex;
            flex-direction: row;
            background-color: #002040;
            margin-left : 118px;
            margin-bottom: 1%;
            border-radius: 20px 20px  0px  20px;
            font-size: x-small ;
            font-weight: bold;
            display: flex;
            flex-direction: row;
            justify-content:  space-around ;
            color:  #003366;
            overflow-y: hidden;
        }
        .sender_pic{
            width: 4.5vw;
            height: 3vh;
            border-radius: 60px;
    
        }
        .sender_name{
            width: 7vw;
            height: 2.5vh;
            text-align: center;
            margin-top: 2px;
            
        }
        .msg{
            width: 28vw;
            height: auto;
            background-color: #A6A6A6;
            margin-left: 2%;
            display: flex;
            color: #003366;
            border-radius:  0px   20px 20px 20px;
            text-align: center;
        }
        .curret_sender_msg{
            width: 28vw;
            height: auto;
            background-color: #A6A6A6;
            margin-left: 2%;
            display: flex;
            color:#003366;
            border-radius:  20px   0px 20px 20px;
            text-align: center;
        }
        .chat_footer{
            width: 39.8vw;
            height: 8vh;
            border-radius:  0px  0px 40px 40px;
            background-color:  #808080;
            display: flex;
           
        }
        .input_area{
            width: 29.8vw;
            height: 6vh;
            align-self: center;
            margin-left: 12%;
           
        }
        form{
            width: 29.8vw;
            height: 6vh;
            align-self: center;
            display: flex;
            flex-direction: row;
            
        }
        input{
            width: 19.8vw;
            height: 4vh;
            margin-top: 4%;
            overflow-y: auto;
            border: 2px solid silver;
            color: white;
            border-radius:  20px   0px  20px 20px;
        }
        button{
            width:  6vw;
            height: 4vh;
            border-radius: 60px;
            align-self: center;
            margin-left: 5%;
            background-image: url("python.JPG");
            background-size: 100% 100%;
        }

    }    
    @media (max-width: 430px ) and (min-width: 320px){
        
        .chat_box{
            width: 52vw;
            height: 54vh;
            margin-left: 5%;
            margin-top: 5%;
            margin-bottom: 5%;
            border-radius: 40px;
            background-color: #DDDDDD;
            display: flex;
            flex-direction: column;
            filter: drop-shadow(2px 2px 2px  #808080);
        }
        .chat_head{
            width: 52vw;
            height: 7vh;
            border-radius: 40px 40px 0px 0px;
            background-color:  #808080; 
               
        }
        .massage_area{
            width: 52vw;
            height: 40vh;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .msg_body{
            width: 48vw;
            height: auto;  
            display: flex;
            flex-direction: column; 
            margin-top: 5px;
            margin-bottom: 5px;
          
        }
        .curret_usr_msg_body{
            width: 48vw;
            height: auto;  
            display: flex;
            flex-direction: column; 
            margin-top: 18px;
            margin-bottom: 20px;
            margin-left : 8px;
          
        }
        .sender_info{
            width: 36vw;
            height: auto;
            display: flex;
            flex-direction: row;
            background-color: #A6A6A6;
            margin-left: 2%;
            margin-bottom: 3px;
            border-radius: 20px 20px 20px 0px;
            font-size: x-small ;
            font-weight: bold;
            display: flex;
            flex-direction: row;
            justify-content:  space-around ;
            color:  #003366;
            overflow-y: hidden;
          

        }
        .curret_sender_info{
            width: 36vw;
            height: auto;
            display: flex;
            flex-direction: row;
            background-color: #A6A6A6;
            margin-left : 38px;
            margin-bottom: 1%;
            border-radius: 20px 20px  0px  20px;
            font-size: x-small ;
            font-weight: bold;
            display: flex;
            flex-direction: row;
            justify-content:  space-around ;
            color:  #003366;
            overflow-y: hidden;
        }
        .sender_pic{
            width: 6.5vw;
            height: 3vh;
            border-radius: 60px;
            background-color: white;
        }
        .sender_name{
            width: 20vw;
            height: 2.5vh;
            text-align: center;
            margin-top: 2px;
          
            
        }
        .msg{
            width: 44vw;
            height: auto;
            background-color: #A6A6A6;
            margin-left: 2%;
            display: flex;
            color: #003366;
            border-radius:  0px   20px 20px 20px;
            text-align: center;
        }
        .curret_sender_msg{
             width: 44vw;
            height: auto;
            background-color: #A6A6A6;
            margin-left: 2%;
            display: flex;
            color:#003366;
            border-radius:  20px   0px 20px 20px;
            text-align: center;
        }
        .chat_footer{
            width: 52vw;
            height: 7vh;
            border-radius:  0px  0px 40px 40px;
            background-color:  #808080;
            display: flex;
           
        }
        .input_area{
            width: 39.8vw;
            height: 6vh;
            align-self: center;
            margin-left: 12%;
            
        }
        form{
            width: 39.8vw;
            height: 6vh;
            align-self: center;
            display: flex;
            flex-direction: row;
            
        }
        input{
            width: 28.8vw;
            height: 4vh;
            margin-top: 4%;
            overflow-y: auto;
            border: 2px solid silver;
            color: white;
            border-radius:  20px   0px  20px 20px;
        }
        button{
            width:  7vw;
            height: 3vh;
            border-radius: 60px;
            align-self: center;
            margin-left: 5%;
            background-image: url("python.JPG");
            background-size: 100% 100%;
        }

    }    

 
    
</style>


    <div class="chat_box" >
        <div class="chat_head">
            <div class="col-12 text-center">
              <h5 class="mb-4" style="margin-top: 3% ; color: white; " id="chat_title" >  Chat Boat</h5>
            </div>
        </div>
        <div class="massage_area" id="testDiv6"  >
    
 
        </div>
        <div class="chat_footer">
            <div class="input_area">
                <form id="myForm11">
                    <input type="text" name="message">
                    <input type="hidden" name="form_to_process" value="teachers_login_form"> 
                    <button type="submit" id="Login_form6" ></button>
                    <?php
                        echo '<select id="dropdown2" name="Course_Name">';
                            fetch_courses($connection, $user_name, $admin_Id);
                        echo '</select>';
                    ?>
                    
                </form>
                 
            </div>
        </div>    
    </div>

    <script>
 
 
    var isScrollToBottomDiable = false;
 
    


    function scrollToBottom() {
        if( isScrollToBottomDiable  === false ){
            var massageArea = document.getElementById('testDiv6');
            massageArea.scrollTop = massageArea.scrollHeight;
        }
    }

    function disablescrollToBottom(){
        isScrollToBottomDiable = true;
    }

    function enablescrollToBottom(){
        isScrollToBottomDiable = false;
    }
    
    document.addEventListener('DOMContentLoaded', function () {
         
        var studentSubmitBtnx = document.getElementById('Login_form6');
        var form_11 = document.getElementById('myForm11');
        var messageInput = document.querySelector('#myForm11 input[name="message"]');
        
        studentSubmitBtnx.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formElement = form_11;
            var formData = new FormData(formElement);
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'chatBoxAction.php'); // Change this to the actual PHP file that processes the form

            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Display the response in the resultDiv
                    enablescrollToBottom();
                    scrollToBottom();
                    document.getElementById('testDiv6').innerHTML = xhr.responseText;
                    messageInput.value = '';
  
                } else {
                    // Handle errors if any
                    alert('Error: ' + xhr.statusText);
                }
            };

            xhr.onerror = function () {
                // Handle errors if any
                alert('An error occurred while processing the form.');
            };

            xhr.send(formData);
            
        });
    });

    
    document.addEventListener('DOMContentLoaded', function () {
    
        // Define a function to make the AJAX request
        function makeAjaxRequest() {

            
            var form = document.getElementById('myForm11');
            var formData = new FormData(form);
            var loadChat = 'loadChat'; // Assuming loadChat is a specific identifier for your chat load request
            formData.append('load_chat', loadChat);
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'chatBoxAction.php');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    document.getElementById('testDiv6').innerHTML = response;       
                    var dropdownValue = document.getElementById("dropdown2").value;
                    var chatTitle = document.getElementById('chat_title');
                    chatTitle.innerHTML = dropdownValue + " " + "Chat Box"; 

                    scrollToBottom();

                } else {
                    alert('Error: ' + xhr.status); // Display the status code for debugging
                }
            };

            xhr.onerror = function () {
                alert('An error occurred while processing the form.');
            };

            xhr.send(formData);
        }

        // Call the function initially
        makeAjaxRequest();

        // Call the function every 5 seconds
        var intervalId = setInterval(makeAjaxRequest, 2000);

    });





    document.addEventListener('DOMContentLoaded', function () {
        var testDiv6 = document.getElementById('testDiv6');

        testDiv6.addEventListener('scroll', function (e) {
            disablescrollToBottom( );
        });
    });
     
        

</script>
