 <?php
include 'connection.php';
$user_on_page = "unknown";
$user_name ="unknown";
$admin_Id = "unknown";
$is_page_login= "unknown";
$user_on_page=  "unknown";


session_start();
if (isset($_SESSION["user_on_page"])) {
    header("Location: index.php");
  }
function exit_page(){
  header("Location: index.php");
} 
if(!isset($_SESSION["user_on_page"])){
  
}
function check_admin_login($connect, $admin_name, $admin_email, $admin_password) {
    // Use prepared statements to prevent SQL injection
    $connection = $connect;
    $sql = "SELECT Admin_Name, admin_Id, admin_Email FROM admin_info WHERE Admin_Name = ? AND admin_Email = ? AND admin_Password = ?";
    
    // Prepare the statement
    $stmt = $connection->prepare($sql);
    
    // Check for errors in prepared statement preparation
    if (!$stmt) {
        die("Error in SQL statement: " . $connection->error);
    }
    
    // Bind parameters and execute the query
    $stmt->bind_param("sss", $admin_name, $admin_email, $admin_password);
    $stmt->execute();
    
    // Check for errors in query execution
    if ($stmt->error) {
        die("Error executing SQL query: " . $stmt->error);
    }
    
    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Start a session
        session_start();

        while ($row = $result->fetch_assoc()) {
            $admin_name = $row['Admin_Name'];
            $admin_Id = $row['admin_Id'];
            $admin_email = $row['admin_Email'];
            $is_page_login = true;
            $user_on_page = "admin";
            
            $_SESSION["username"] = $admin_name;
            $_SESSION["admin_Id"] = $admin_Id;
            $_SESSION["is_page_login"] = $is_page_login;
            $_SESSION["user_on_page"] = $user_on_page;

            // Redirect to the adminDashboard.PHP page
            header("Location: adminDashboard.php");
            exit; // Make sure to exit to prevent further script execution
        }
    } else {
        // Handle invalid login (e.g., display an error message)
        echo "Invalid login credentials";
    }
}

if(isset($_POST['Guide_name'])){
    check_admin_login($connection, $_POST['Guide_name'], $_POST['Guide_email'], $_POST['Guide_password']);
}

 
 

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <title>Festava Live - Bootstrap 5 CSS Template</title>
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-festava-live.css" rel="stylesheet">
    <!-- CSS FILES -->
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">

    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
    <style>
        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;   
        }

        body{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            background: #8396a4;
        }
       .Login_forms{
            width: 32vw;
            height: 70vh;
            position: absolute;
            z-index: 8;
            top: 20%;
            left: 52%;
            opacity: 0.94;
            border-radius: 20px;
            font-family: Helvetica Neue ;
             
             
        }
        .custom-form{
             
        }
        .ticket-form-body{
            
            width: 27vw;
            height: 40vh;
            position: relative;
            left: -7%;
        }
        form{
          height: 20vh;
          background-color: transparent;
           
          
    
        }
        #teacher_form{
             
            
        }
        .form-control{
                height: 6vh;
                width: 26vw;
        }
        #form_table{
            display: flex;
        }
        .select_btn{
            background-color: transparent;
            border-radius: 7px;
            width: 6vw;

        }
        .target_btn_class{
            border: 1px solid #219c02;
            box-shadow: 0 0 8px #219c02; 
        }
        #student_form{
            
        }
        #signUp_form{
            width: 45vw;
            height: 80vh;
            position: absolute;
            z-index: 8;
            top: 0%;
            left: 30%;
            top: 20%;
            opacity: 0.94;
            border: 2px solid white;
            border-radius: 20px;
            
            
        }
        form{
          height: 50vh;
          background-color: transparent;
          
        }
        form input{
            border-radius: 5px;
            border: transparent;
        }
        form input:focus {
            border-color: lightblue;
            box-shadow: 0 0 20px lightblue; /* Increase the shadow size when in focus */
        }
        #testDiv{
            width: 20vw;
            height: 20vh;
            border: 2px solid red;
        }
         
 


        .card{
            position: relative;
            height: 270px;
            width: 420px;
            border-radius: 30px;
            perspective: 2000px;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            right: 80%;
        }

        /* Card_Front_Part_Style:Start */
        .front{
            position: absolute;
            padding-top: 50px;
            height: 100%;
            text-align: center;
            font-size: 1em;
            border-radius: 30px;
            color: #FFF;
        }

        .front .column{
            margin-bottom: 40px;
        }

        .front .column .logo img{
            width: 60px;
        }

        .front .column .title{
            font-weight: 300;
            letter-spacing: 2px;
            word-spacing: 2px;
        }

        .front .column .description{
            font-size: 0.6em;
            margin-top: -3px;
        }

        .front .row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            height: 80px;
            width: 420px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            font-size: 0.8em;
            font-weight: 500;
            color: #0E1C2C;
            background: #FFF;
        }

        .front .row p{
            padding: 0 20px;
            margin-top: 15px;
        }

        .front .row p:nth-child(1),
        .front .row p:nth-child(2){
            border-right: 2px solid rgba(14, 28, 44, 0.8);
        }

        .front .column .item{
            position: absolute;
            height: 20px;
            width: 420px;
            top: 190px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            
            background: #374C5D;
        }

        .front .column .item::before{
            content: "";
            display: block;
            height: 20px;
            width: 250px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px ;
            margin: -20px auto 0;
            background: rgba(255, 0, 21, 0.9);
        }

        .card:hover .front{
            transform: rotateY(180deg);
        }
        /* Card_Front_Part_Style:End */

        /* Card_Back_Part_Style:Start */
        .back{
            position: absolute;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
            height: 100%;
            width: 100%;
            border-radius: 30px;
            color: #FFF;
            transform: rotateY(180deg);
        }

        .back .left{
            flex-basis: 45%;
            text-align: center;
        }

        .back .left .title{
            font-size: 1.4em;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .back .left .description{
            margin: -5px auto 0;
            padding-bottom: 5px;
            width: 110px;
            font-size: 0.7em;
        }

        .back hr{
            margin-left: auto;
            margin-right: auto;
            height: 1.6px;
            width: 70px;
            border: none;
            border-radius: 20px;

            background: #FFF;
        }

        .back .right{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            flex-basis: 52%;
            height: 100%;
            font-size: 0.7em;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #0E1C2C;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;

            background: #FFF;
        }

        .back .right p:first-child{
            margin-top: 0px;
        }

        .back .right p{
            margin-top: 18px;
            margin-left: 45px;
        }

        .back .item{
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            margin-left: 200px;
            width: 40px;
            height: 100%;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;

            background: #374C5D;
        }

        .back .item::before{
            content: "";
            display: block;
            transform: translateX(-33px);
            width: 25px;
            height: 180px;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;

            background: rgba(255, 0, 21, 0.9);
        }

        .back .logo{
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            position: absolute;
            width: 25px;
            height: 140px;
            font-size: 1.3em;
            color: #0E1C2C;
            border-radius: 30px;

            background: #FFF;
        }

        .card:hover .back{
            transform: rotateY(360deg);
        }
        /* Card_Back_Part_Style:End */

        .front, .back{
            transition: 1s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            backface-visibility: hidden;

            background: #0E1C2C;
        }




    </style>
</head>

<body style="background-image: none; background-color: tranparent  ;" >

   
    <main>
        <div class="card">

            <div class="front">
            <div class="column">
                <div class="logo">
                <img src="https://i.postimg.cc/0j4P8S0t/icons8-logo-500.png"  alt="logo atom">
                </div>
                <div class="title">Cyber Nexus Tech</div>
                <div class="description">Empowering Future</div>
                <div class="item"></div>
            </div>
            <div class="row">
                <p>Cyber  </p>
                <p>Nexus</p>
                <p>Tech</p>
            </div>
            </div>

            <div class="back">
            <div class="left">
                <div class="title">Cyber Nexus Tech</div>
                <div class="description">Artificial Intelligence</div>
                <hr>
            </div>
            <div class="right">
                <p>123 Dummy, Lorem Ipsum</p>
                <p>+00 1234 5XXX 9012</p>
                <p>your email space</p>
                <p>website address here</p>
            </div>
            <div class="item">
                <div class="logo">
                <ion-icon name="location"></ion-icon>
                <ion-icon name="call"></ion-icon>
                <ion-icon name="mail"></ion-icon>
                <ion-icon name="link"></ion-icon>
                </div>
            </div>
            </div>

        </div>
        <div class="Login_forms" id="Login_form" style="background-image: none; background-color:  #E0E0E0;  filter: drop-shadow(2px 2px 4px grey);">
            <h3 class="text-center mb-4"  style="color: #333333; margin-left: 37%;  margin-top: 2%;">Login</h3>
            <form class="custom-form ticket-form mb-5 mb-lg-0" id="admin_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="background-image: none; background-color:  #E0E0E0;  " >
                <div class="ticket-form-body"   >
                    <table> 
                        <tr>
                            <td><h9 style="color: #333333;">Guide Name :</h9><input type="text" name="Guide_name" id="ticket-form-name"   class="form-control" placeholder="Full name" required></td>
                        </tr>
                        <tr>
                            <td><h9 style="color: #333333;">Email : </h9><input type="text" name="Guide_email" id="ticket-form-name"   class="form-control" placeholder="Email" required></td>
                        </tr>
                        <tr>
                            <td><h9 style="color: #333333;">Password : </h9><input type="password" name="Guide_password" id="ticket-form-name"   class="form-control" placeholder="password" required></td>
                        </tr>
                        <tr>
                            
                            <td><button type="submit" class="form-control" id="teacher_form_btn" >Login</button> </td>
                            <td><input type="hidden" name="hiddenField" value="teachers_login_form"></td>
                        </tr>
                    </table>
                </div>
            </form>
 
        </div>  
    </main>
        <!--

T e m p l a t e M o

-->

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>