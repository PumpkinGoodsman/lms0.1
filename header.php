 <style>
    .site-header{
        background-color: transparent;
        z-index: 5;
        
    }
    .user_profile{
        background-size: 100% 100%;
        width: 2.9vw;
        height: 5.9vh;
        border-radius: 30px;
        border: 2px solid white ;
        filter: drop-shadow(2px 2px 4px white);
    
    }
    .admin_profile{
        background-size: 100% 100%;
        width: 2.9vw;
        height: 5.9vh;
        border-radius: 30px;
        border: 2px solid white ;
        filter: drop-shadow(2px 2px 4px white);
       
    }
    .admin_profile1{
        background-size: 100% 100%;
        width: 2.9vw;
        height: 5.9vh;
        border-radius: 30px;
        border: 2px solid white ;
        filter: drop-shadow(2px 2px 4px white);
       
    }
    

 
    .student_profile{
        background-size: 100% 100%;
        width: 2.9vw;
        height: 5.9vh;
        border-radius: 30px;
        border: 2px solid white ;
        filter: drop-shadow(2px 2px 4px white);
    
    }
    .nav-item a {
        color: black;
    }
    .navbar{
        background-color: transparent;
    }
    .navbar-scrolled {
        background-color: rgba(255, 255, 255, 1) !important;
        animation: widthExp 0.4s forwards;
        transition: background-color 0.3s ; /* Add a smooth transition effect for both properties */
    }
    @keyframes widthExp {
        0% {
            width: 100vw;
            margin-top: 0%;
        }
        100% {
            width: 80vw;
            border-radius: 30px;
            margin-top: 0.5%;
            opacity: 0.92;
            background-color: rgba(255, 255, 255, 0.9) !important;
        
        }
    }
    @media (max-width: 830px ) and (min-width: 714px){

        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.6) !important;
            animation: widthExp 0.4s forwards;
            transition: background-color 0.3s ; /* Add a smooth transition effect for both properties */
        }
        @keyframes widthExp {
            0% {
                width: 100vw;
                margin-top: 0%;
            }
            100% {
                width: 80vw;
                border-radius: 30px;
                margin-top: 0.5%;
                opacity: 0.92;
                background-color: rgba(255, 255, 255, 0.9) !important;
            
            }
        }
        .user_profile{
            background-size: 100% 100%;
            width: 2.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
        
        }
        .admin_profile{
            background-size: 100% 100%;
            width: 2.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            display: none;
        }
        .admin_profile1{
            background-size: 100% 100%;
            width: 2.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
          
        }
 
        .student_profile{
            background-size: 100% 100%;
            width: 8.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            display: none;
        }
        .guide_profile{
            display: none;
        }
    }    
    @media (max-width: 430px ) and (min-width: 320px){

        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.6) !important;
            animation: widthExp 0.4s forwards;
            transition: background-color 0.3s ; /* Add a smooth transition effect for both properties */
        }
        @keyframes widthExp {
            0% {
                width: 100vw;
                margin-top: 0%;
            }
            100% {
                width: 80vw;
                border-radius: 30px;
                margin-top: 0.5%;
                opacity: 0.92;
                background-color: rgba(255, 255, 255, 0.9) !important;
            
            }
        }
        .user_profile{
            background-size: 100% 100%;
            width: 2.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            display: none;
        
        }
        .admin_profile1{
            background-size: 100% 100%;
            width: 8.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
             
        }
        .admin_profile{
            display: none;
        }
        .guide_profile{
            background-size: 100% 100%;
            width: 8.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            display: block;
        }
        .student_profile{
            background-size: 100% 100%;
            width: 8.9vw;
            height: 3.9vh;
            border-radius: 30px;
            border: 2px solid white ;
            filter: drop-shadow(2px 2px 4px white);
            display: block;
        }
 

    }    


 

 </style>  
 <?php  
 include 'connection.php'; 
 function show_hader(){  
    echo'
            <header class="site-header" style="background-image: none; background-color:  #F9F9F9;"  >
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 d-flex flex-wrap">
                            <p class="d-flex me-4 mb-0">
                                <i class="bi-person custom-icon me-2"></i>
                                <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg" id="myNavbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        
                    </a>

                    <a   class="btn custom-btn d-lg-none ms-auto me-4" onclick="showLoginForm()" >login</a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1"  style="color: #006600;" >Home</a>
                                 
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2"  style="color: #006600;" >About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3"  style="color: #006600;">Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4"  style="color: #006600;">Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5"  style="color: #006600;">Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6"  style="color: #006600;">Contact</a>
                            </li>
 
                            <li class="nav-item">
                                <a  class="btn custom-btn d-lg-none ms-auto me-4" onclick="showSignUpForm()">sign Up</a>
                            </li>
                        </ul>
                        <a class="btn custom-btn d-lg-block d-none" onclick="showLoginForm()" >Login</a>
                        <a class="btn custom-btn d-lg-block d-none" onclick="showSignUpForm()" style="margin-left: 10px; " >Sign in </a>
                        
                    </div>
                </div>
            </nav>';
 }     
 
 function show_hader_2(){  
    echo'
            <header class="site-header" style="background-image: none; background-color:  #F9F9F9;" >
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 d-flex flex-wrap">
                            <p class="d-flex me-4 mb-0">
                                <i class="bi-person custom-icon me-2"></i>
                                <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg" >
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        Cyber Nexus Techid="myNavbar"
                    </a>

                    <a   class="btn custom-btn d-lg-none ms-auto me-4" onclick="showLoginForm()" >login</a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1" onclick="pageNavigation(\'Home\')" style="color: #006600;">Home</a>
                                 
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2" onclick="pageNavigation(\'About\')" style="color: #006600;">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3" onclick="pageNavigation(\'Staff\')" style="color: #006600;">Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4" onclick="pageNavigation(\'Schedule\')" style="color: #006600;">Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5" onclick="pageNavigation(\'Pricing\')" style="color: #006600;">Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6"onclick="pageNavigation(\'Contact\')" style="color: #006600;">Contact</a>
                            </li>
 
                            <li class="nav-item">
                                <a  class="btn custom-btn d-lg-none ms-auto me-4" onclick="showSignUpForm()" style="color: #006600;">sign Up</a>
                            </li>
                        </ul>
                        <a class="btn custom-btn d-lg-block d-none" onclick="showLoginForm()" >Login</a>
                        <a class="btn custom-btn d-lg-block d-none" onclick="showSignUpForm()" style="margin-left: 10px;"   >Sign Up</a>

                    </div>
                </div>
            </nav>';
 }     
 $admin_Img = "none";
 function fetch_admin_details($connection, $admin_name, $admin_id) {
    // Sanitize inputs to prevent SQL injection
    $admin_name = $connection->real_escape_string($admin_name);
    $admin_id = $connection->real_escape_string($admin_id);

    // Corrected SQL query syntax
    $sql = "SELECT Admin_Name, admin_Email, admin_Id, Admin_Img FROM admin_info WHERE Admin_Name = '$admin_name' AND admin_Id = '$admin_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $admin_name = $row["Admin_Name"];
            $admin_Id = $row["admin_Id"];
            $admin_email = $row["admin_Email"];
            $admin_img = $row["Admin_Img"];
            global  $admin_Img;
            $admin_Img = $admin_img ;
           

            // Do something with retrieved values if needed
        }
    } else {
        
    }
}

fetch_admin_details($connection, $user_name, $admin_Id );
function show_admin_hader() {
    global $admin_Img;
     
    echo '
    <header class="site-header" style="background-image: none; background-color:  #F9F9F9;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-person custom-icon me-2"></i>
                        <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg" id="myNavbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                
            </a>

             
            <button class="btn custom-btn d-lg-none ms-auto me-4 admin_profile1" style="background-image: url(\'' .$admin_Img . '\')" onclick="goToAdminDashboard()"></button>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1" style="color: #006600;"  >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2" style="color: #006600;" >About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3" style="color: #006600;" >Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4" style="color: #006600;"  >Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5" style="color: #006600;" >Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6" style="color: #006600;" >Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6" style="color: #006600;" >blog</a>
                    </li>
                </ul>
                <button class="admin_profile" style="background-image: url(\'' .$admin_Img . '\')" onclick="goToAdminDashboard()"></button>
            </div>
        </div>
    </nav>';
}
function show_admin_hader_2() {
    global $admin_Img;
     
    echo '
    <header class="site-header" style="background-image: none; background-color:  #F9F9F9;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-person custom-icon me-2"></i>
                        <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg" id="myNavbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                 
            </a>

             
            <button class="btn custom-btn d-lg-none ms-auto me-4 admin_profile" style="background-image: url(\'' .$admin_Img . '\')" onclick="goToAdminDashboard()"></button>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1"  onclick="pageNavigation(\'Home\')" style="color: #006600;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2" onclick="pageNavigation(\'About\')" style="color: #006600;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3" onclick="pageNavigation(\'Staff\')" style="color: #006600;">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4"  onclick="pageNavigation(\'Schedule\')" style="color: #006600;">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5" onclick="pageNavigation(\'Pricing\')" style="color: #006600;">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6"  onclick="pageNavigation(\'Contact\')" style="color: #006600;">Contact</a>
                    </li>
 
                </ul>
                <button class="admin_profile1" style="background-image: url(\'' .$admin_Img . '\')" onclick="goToAdminDashboard()"></button>
            </div>
        </div>
    </nav>';
}
$student_img = "none";
function fetch_student_details($connection, $studetn_name, $studetn_id) {
    // Sanitize inputs to prevent SQL injection
    $studetn_name = $connection->real_escape_string($studetn_name);
    $studetn_id = $connection->real_escape_string($studetn_id);

    // Corrected SQL query syntax
    $sql = "SELECT student_name , student_Id, student_email, student_phone , student_Adress , student_Password , student_img   FROM student_details WHERE student_name = '$studetn_name' AND student_Id = '$studetn_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_name = $row["student_name"];
            $student_Id = $row["student_Id"];
            $student_email = $row["student_email"];
            $student_phone = $row["student_phone"];
            $student_Adress = $row["student_Adress"];
            $student_Password = $row["student_Password"];
            $student_Img = $row["student_img"];
            global  $student_img;
            $student_img = $student_Img;
           

            // Do something with retrieved values if needed
        }
    } else {
        
    }
}

fetch_student_details($connection, $user_name, $admin_Id );
 function show_student_hader(){  
    global  $student_img;
    echo'
            <header class="site-header" style="background-image: none; background-color:  #F9F9F9;" >
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 d-flex flex-wrap">
                            <p class="d-flex me-4 mb-0">
                                <i class="bi-person custom-icon me-2"></i>
                                <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg" id="myNavbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        
                    </a>

                   
                    <button class="btn custom-btn d-lg-none ms-auto me-4 user_profile" style="background-image: url(\'' .$student_img . '\')"  onclick="goToStudentDashboard()" > </button>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1" style="color: #006600;" >Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2" style="color: #006600;" >About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3" style="color: #006600;" >Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4" style="color: #006600;" >Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5" style="color: #006600;" >Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6" style="color: #006600;" >Contact</a>
                            </li>
 
                        </ul>
                         
                        <button class="student_profile" style="background-image: url(\'' .$student_img . '\')"  onclick="goToStudentDashboard()" > </button>
                    </div>
                </div>
            </nav>';
 } 
 function show_student_hader_2(){  
    global  $student_img;
    echo'
            <header class="site-header" style="background-image: none; background-color:  #F9F9F9;" >
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 d-flex flex-wrap">
                            <p class="d-flex me-4 mb-0">
                                <i class="bi-person custom-icon me-2"></i>
                                <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg" id="myNavbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        
                    </a>

                   
                    <button class="btn custom-btn d-lg-none ms-auto me-4 user_profile" style="background-image: url(\'' .$student_img . '\')"  onclick="goToStudentDashboard()" > </button>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1" onclick="pageNavigation(\'Home\')"style="color: #006600;">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2" onclick="pageNavigation(\'About\')"style="color: #006600;">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3" onclick="pageNavigation(\'Staff\')"style="color: #006600;">Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4" onclick="pageNavigation(\'Schedule\')" style="color: #006600;">Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5" onclick="pageNavigation(\'Pricing\')" style="color: #006600;">Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6" onclick="pageNavigation(\'Contact\')" style="color: #006600;">Contact</a>
                            </li>
 
                        </ul>
                         
                        <button class="user_profile" style="background-image: url(\'' .$student_img . '\')"  onclick="goToStudentDashboard()" > </button>
                    </div>
                </div>
            </nav>';
 } 
$guide_img = "none";
function fetch_guide_details($connection, $guide_name, $guide_id) {
    // Sanitize inputs to prevent SQL injection
    $guide_name = $connection->real_escape_string($guide_name);
    $guide_id = $connection->real_escape_string($guide_id);

    // Corrected SQL query syntax
    $sql = "SELECT Guide_name , Guide_Id , Guide_email, Guide_phone , GuideAdress  , Guide_Password , guide_image   FROM guides_details WHERE Guide_name = '$guide_name' AND Guide_Id  = '$guide_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $guide_name = $row["Guide_name"];
            $guide_Id = $row["Guide_Id"];
            $guide_email = $row["Guide_email"];
            $guide_phone = $row["Guide_phone"];
            $guide_Password = $row["Guide_Password"];
            $guide_Img = $row["guide_image"];
            global  $guide_img;
            $guide_img = $guide_Img;
    
            // Do something with retrieved values if needed
        }
    } else {
        
    }
}

 fetch_guide_details($connection, $user_name, $admin_Id );
 
 function show_guide_hader(){  
    global  $guide_img;
    echo'
    <header class="site-header" style="background-image: none; background-color:  #F9F9F9;">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 d-flex flex-wrap">
                            <p class="d-flex me-4 mb-0">
                                <i class="bi-person custom-icon me-2"></i>
                                <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg" id="myNavbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        Cyber Nexus Tech
                    </a>

                   
                    <button  class=" btn  d-lg-none ms-auto me-4 user_profile" style="background-image: url(\'' .$guide_img . '\')"  onclick="goToGuideDashboard()" >   </button>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php" style="color: #006600;"  >Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2" style="color: #006600;" >About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3" style="color: #006600;" >Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4" style="color: #006600;" >Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5" style="color: #006600;"  >Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6" style="color: #006600;" >Contact</a>
                            </li>
                            
                        </ul>
                         
                         
                    </div>
                </div>
            </nav>';
 } 

 function show_guide_hader_2(){  
    global  $guide_img;
    echo'
    <header class="site-header" style="background-image: none; background-color:  #F9F9F9;">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 d-flex flex-wrap">
                            <p class="d-flex me-4 mb-0">
                                <i class="bi-person custom-icon me-2"></i>
                                <strong class="text-dark">Welcome to Cyber Nexus Tech</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg" id="myNavbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        Cyber Nexus Tech
                    </a>

                   
                    <button class=" btn custom-btn d-lg-none ms-auto me-4 user_profile" style="background-image: url(\'' .$guide_img . '\')"  onclick="goToGuideDashboard()" >   </button>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php" onclick="pageNavigation(\'Home\')" style="color: #006600;" >Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2" onclick="pageNavigation(\'About\')" style="color: #006600;">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3" onclick="pageNavigation(\'Staff\')" style="color: #006600;">Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4" onclick="pageNavigation(\'Schedule\')"style="color: #006600;" >Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5" onclick="pageNavigation(\'Pricing\')" style="color: #006600;">Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6" onclick="pageNavigation(\'Contact\')" style="color: #006600;">Contact</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6" onclick="pageNavigation(\'Contact\')" style="color: #006600;">Contact</a>
                            </li>
 
                        </ul>
                         
                        <button class="guide_profile user_profile" style="background-image: url(\'' .$guide_img . '\')"  onclick="goToGuideDashboard()" >   </button>
                    </div>
                </div>
            </nav>';
 } 

?>        


<script>
    
    function goToAdminDashboard(){
            const url = `adminDashboard.php`;
            window.location.href = url;
    }
    function goToStudentDashboard(){
            const url = `studentDashboard.php`;
            window.location.href = url;
    }

    function  goToGuideDashboard(){
            const url = `guideDashboard.php`;
            window.location.href = url;
    }
 

    function pageNavigation(sectionName) {
        nameOfSection = sectionName;
        if (nameOfSection == "Home") {
            // No need for the yValue parameter as you are navigating to a specific section
            const url = 'index.php';
            window.location.href = url;
        }
        if (nameOfSection == "About") {
            const url = 'index.php#section_2';
            window.location.href = url; 
        }
        if (nameOfSection == "Staff") {
            const url = 'index.php#section_3';
            window.location.href = url;  
        }
        if (nameOfSection == "Schedule") {
            const url = 'index.php#section_4';
            window.location.href = url; 
        }
        if (nameOfSection == "Pricing") {
            const url = 'index.php#section_5';
            window.location.href = url; 
        }
        if (nameOfSection == "Contact") {
            const url = 'index.php#section_6';
            window.location.href = url; 
        
        }
        if (nameOfSection == "blog") {
            alert("jhule Laal"); 
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
    var navbar = document.getElementById("myNavbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            navbar.classList.add("navbar-scrolled");
        } else {
            navbar.classList.remove("navbar-scrolled");
        }
    });
});
</script>
 
