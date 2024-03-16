<?php
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
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        if (!isset($_SESSION["user_on_page"])) {
            echo '<meta http-equiv="refresh" content="5">';
        }
    ?>
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

    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
    <style>
        body{
            overflow-x: hidden;
        }
        .ticket-section{
            
            
        }
        .navbar{

        }
        .site-header{
            background-color: #269524;
        }
        .Admin_Btn_area{
            width: 13vw;
            height: auto;
            margin-left: -0%;
            background-image: none; 
            background-color:  #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
            
        }
        .pic_area{
            width: 11vw;
            height: 15vh;
            border-radius: 50%;
            
             
        }
        .img{
            width: 11vw;
            height: 16vh;
            position: relative;
            border-radius: 50%;
            border: 4px solid #269524;
            margin-top: 4%;
        }
        .Admin_Variable_frame{
            width: 75vw;
            display: inline-block; /* Automatically adjust height based on content */
            margin-left: 5%;
            background-image: none; 
            background-color:   #D3D3D3; 
            filter: drop-shadow(2px 2px 4px grey);
        }
        tr{
           
            
        }
        tr th{
            color: white;
            width: 15vw;
            background-color: transparent;
            border-radius: 0px;
        }
        td{
            height: 10vh;
        }
        input{
            width: 15vw;
            height: 10vh;
            border: none;
            border-radius: 0px;
            background-color: transparent;
            border-left: 1px solid #269524;
            border-bottom: 1px solid #269524;

        }
        .file-input{
            background-color: greenyellow;
        }
  
        #dropdown{
            background-color: #269524;  
            color: white;
            border: none;
            width: 15vw;
            border-radius: 7px;
            border-left: 1px solid #269524;
            border-bottom: 1px solid #269524;
 
        }
 
        .parent_courses{
            width: 14vw;
            display: inline-block; 
 
        }
        .course_btn{
            background-color: transparent;
            border: transparent;
            width: 15vw;
        }
        .course_btn:hover{
            background-color: white;
        }
        .Control_btn{
            margin-top: 0%; 
            border-radius: 0px; 
            width: 11vw;
            border-top: 0.5px solid #150E19;
            background-color: #269524;
        }
        .Control_btn:hover{
            background-color: #101E14;
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
       
       }
       .site-footer-top{
         background-color: #269524;
       }
 
    </style>
</head>

<body>

    <main>
         <button onclick="HelloWorld()" ></button>
    </main>
</body>      
<script>
    function HelloWorld(){
        alert("hello World");
    }
</script>  