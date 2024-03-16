<?php 
    include 'connection.php';

    $course_name = "none";
    $user_on_page = "unknown";
    $user_name ="unknown";
    $admin_Id = "unknown";
    $is_page_login= "unknown";
    $user_on_page=  "unknown";

    session_start();
    if (isset($_SESSION["user_on_page"])) {
      $user_name =  $_SESSION["username"] ;
      $admin_Id = $_SESSION["admin_Id"];
      $is_page_login= $_SESSION["is_page_login"];
      $user_on_page=  $_SESSION["user_on_page"];
  
      }
    function exit_page(){
      header("Location: index.php");
    } 
    if(!isset($_SESSION["user_on_page"])){
       header("Location: index.php");
    }

                                
    if (isset($_GET['parentCourseName'])) {
        $course_name = $_GET['parentCourseName'];
         
    }
    function show_courses($connection ,  $course_name) {
        $sql = "SELECT C_Name, Parnt_C_Name , Description , ImgName FROM sub_courses where Parnt_C_Name =  '$course_name'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_name = htmlspecialchars($row["C_Name"]);
                $Description = htmlspecialchars($row["Description"]);
                $Img_name = htmlspecialchars($row["ImgName"]);

                echo '
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 sub_course_div" style="margin-top: 90px;" >
                    <div class="artists-thumb"  style=" border:0px solid  #150E19; border-radius:20px;  filter: drop-shadow(2px 2px 4px #D3D3D3);">
                        <div class="artists-image-wrap">
                            <img src="' .$Img_name . '" class="artists-image img-fluid">
                        </div>
                        <div class="artists-hover">
                            <p style="color: white;">
                                <strong>Course Name:</strong>
                                ' .  $course_name . '
                            </p style="color: white;">
                            <p style="color: white;">
                                <strong>Description:</strong>
                                ' . $Description . '
                            </p>

                            <hr>
                            <p class="mb-0" style="color: white;">
                                <strong>Go to Course:</strong>
                                <a href = "#"  onclick="goToCourseIntro(\'' . $course_name . '\')" ">Join Course</a>
                            </p>
                        </div>
                    </div>
                </div>';
                
    
            }
            
        } else {
            echo "No results found.";
        }
    }

//<a href = "#" onclick="goToSubCoursesPage(\'' . $course_name . '\')">Join Course</a>
 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Festava Live - Bootstrap 5 CSS Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-festava-live.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">


    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
    <style>
        body{
            overflow-x: hidden;
            background-color: #D3D3D3;
        }
        .navbar{
            background-color: black;
        }
        .Admin_Btn_area{
            width: 13vw;
            height: 90vh;
            margin-left: -5%;
            
        }
        .Admin_Variable_frame{
            width: 68vw;
            display: inline-block; /* Automatically adjust height based on content */
            margin-left: 5%;
            background-color: #F0F0F0;
        }
        tr{
             
            
        }
        tr th{
            color: white;
            width: 5vw;
            background-color: #c7460a;
            border-radius: 7px;
        }
        input{
            width: 7vw;
            border: none;
            border-radius: 7px;
        }
        #dropdown{
            background-color: #c7460a;  
            color: white;
            border: none;
            width: 7vw;
            border-radius: 7px;
        }
        .parent_courses{
            width: 14vw;
            display: inline-block; 
 
        }
        .course_btn{
            background-color: transparent;
            border: transparent;
            border-bottom: 3px solid grey;
            width: 13vw;
            
        }
        .course_btn:hover{
            background-color: white;
        }
        .Control_btn{
            width: 10vw;
        }
        .viewCoursesArea{
            width: 57vw;
            display: flex;
            flex-direction: column;
        }
        .course_div{
            width: 42vw;
            height: 43vh;
            margin-top: 10%;
            
        }
        .row1{
            display: flex;
            flex-direction: row;
            
        }

       #testDiv{
            width: 20vw;
            height: 20vh;
            border: 2px solid red;
       }
       .artists-hover{
            background-color: #808080;
            border:0px solid #D3D3D3;
            color: #FFFFFF;
        }
        h2{
            margin-bottom: 20%;
        }
        .sub_course_div{
            width: 47vw;
            margin-left: 350px;
        }
 
    </style>
</head>

<body>
    <main>
        <?php
            include 'header.php';
            if($user_on_page == "unknown"){
                show_hader_2();
            }
            if($user_on_page == "admin"){
                show_admin_hader_2();
            }
            if($user_on_page == "guide"){
                show_guide_hader_2();
            }
            if($user_on_page == "student"){
                show_student_hader_2();
            }
        ?>
        <section class="artists-section section-padding" id="section_3" style="background-image: none; background-color:  #D3D3D3;">
            <div class="row">
                <div class="col-12 text-center">
                  <h2 class="mb-4" style="color: #003366 ;"><?php echo $course_name ." ". ' Sub Courses'; ?></h2>       
                </div>
                <?php
                  show_courses($connection ,  $course_name);
                ?>
        
            </div>
        </section>
        <?php include 'contactUs.php'; ?>
        <?php include 'footer.php'; ?>
    </main>
</body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function goToCourseIntro( courseName ){      
                const url = `courseIntro.php?courseName=${encodeURIComponent(courseName)}`;
                window.location.href = url;
        }        
    </script>