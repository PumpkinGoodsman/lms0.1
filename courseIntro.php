
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


if (isset($_GET['courseName'])) {
    $course_name = $_GET['courseName'];
    
}


function show_course_intro($connection, $course_name) {
    $sql = "SELECT course_name, course_description, learning_outcomes, video_url FROM course_descriptions WHERE course_name = '$course_name'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_name = htmlspecialchars($row["course_name"]);
            $course_description = htmlspecialchars($row["course_description"]);
            $learning_outcomes = htmlspecialchars($row["learning_outcomes"]);
            $video_url = htmlspecialchars($row["video_url"]);
            

            echo '
            <div class="video_box"  >
            <iframe width="860" height="415" src="https://www.youtube.com/embed/l1EssrLxt7E?si=HP4kiXKVuzHiiUgy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="course_info">
                <h2 style="color: #006600;">' . $course_name . '</h2>
                <p style="color: #000000;">' . $course_description . '</p>
                <h4 style="color: #006600;">Learning Outcomes:</h4>
                <ul>
                    <li style="color: #000000;">' . $learning_outcomes . '</li>
                </ul>
            </div>';
        }
    }
     
}


function show_course_Topics($connection, $course_name) {
  // Use a prepared statement to prevent SQL injection
  $sql = "SELECT lecture_no, Lecture_topic FROM " . $course_name;
  $stmt = $connection->prepare($sql);

  if (!$stmt) {
      // Handle the error appropriately
      echo "Error: " . $connection->error;
      return;
  }

  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $lecture_no = htmlspecialchars($row["lecture_no"]);
          $lecture_topic = htmlspecialchars($row["Lecture_topic"]);
          echo "<li><a  href='#' onclick='goToSelectedLecture(\"$course_name\", \"$lecture_no\")' >" . $lecture_topic . "</a></li>";
      }
  }
}



?>



<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
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
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
 
    body{
        overflow-x: hidden;
        background-color: #D3D3D3;
    }
   
    .navbar {
       background-color: black;
    }
    .course_details {
      background-color: #f5f5f5;
      padding: 30px;
      border-radius: 10px;
      margin-bottom:20%;
      margin-top: 5%;
      background-image: url("images/edward-unsplash-blur.jpg");
    }

    .course_details .video_box {
      margin-bottom: 20px;

    }
    

    .course_details .course_info {
      line-height: 1.8;
      
    }
 
    .course_details h2 {
      font-size: 24px;
      margin-bottom: 15px;
    }

    .course_details p {
      margin-bottom: 20px;
    }

    .course_details h4 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .course_details ul {
      list-style-type: disc;
      margin-left: 20px;
      margin-bottom: 20px;
    }

    .course_details ul li {
      margin-bottom: 5px;
      
    }

    .course_details ul li a {
      color: #333;
      text-decoration: none;
    }

    .course_details ul li a:hover {
      color: #007bff;
    }
  </style>
</head>

<body class="sub_page" style="background-image: none; background-color:  #D3D3D3;">
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
    <div class="hero_area">
      <!-- header section strats -->
      
      <!-- end header section  idth="100%" height="400" -->
    </div>

    <!-- content section -->
    <section class="content_section layout_padding" >
      <div class="col-12 text-center">
        <h2 class="mb-4" style="margin-top: 5%; color:  #003366;" >Course Introduction</h2>
      </div>
      <div class="container" >
        <div class="row">
          <div class="col-md-9">
            <div class="course_details" style="background-image: none; background-color:  #E0E0E0;  filter: drop-shadow(2px 2px 4px grey);">
                  <?php
                      show_course_intro($connection, $course_name);
                  ?>
                <h4 style="color: #006600;">Topics Included:</h4>
                <ul>
                  <?php
                      show_course_Topics($connection, $course_name);
                  ?>
                  <div class='lesson_navigation'>
                    <?php echo '<a href="#" class="btn btn-primary" onclick="goToFirstLecture(\'' . $course_name . '\', 1)">Go To Lecture</a>'; ?>
                  </div>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'events.php'; ?>
    <?php include 'footer.php'; ?>
  </main>
  <!-- end content section -->

  <!-- footer section -->
 
  <!-- end footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/click-scroll.js"></script>
  <script src="js/custom.js"></script>
  <script>

    function goToSelectedLecture(courseName, lectureNo) {
        // Construct the URL with encoded courseName and lectureNo
        const url = `courseLecture.php?courseName=${encodeURIComponent(courseName)}&lectureNo=${encodeURIComponent(lectureNo)}`;
        
        // Set the window's location to the constructed URL
        window.location.href = url;
    }

    function goToFirstLecture(courseName, lectureNo) {
        
        const url = `courseLecture.php?courseName=${encodeURIComponent(courseName)}&lectureNo=${encodeURIComponent(lectureNo)}`;
        // Use window.location.href to navigate to the specified URL
        window.location.href = url;
    }

    

  </script>
  
</body>

</html>


 