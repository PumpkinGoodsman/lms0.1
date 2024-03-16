<?php

include 'connection.php'; 
/*
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
 

*/
 
 
    


echo "<br>";
echo "<br>";
echo "<br>";
function fetchQuestionsAndAnswers($conn) {
    $sql = "SELECT Question, optionA, optionB, optionC, optionD FROM lesson2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $i = 1; // Initialize the question number
        while ($row = $result->fetch_assoc()) {
            echo '<div class="question_row">';
            echo '<h6 style="color:white; margin-top:20px;">Question ' . $i . ': ' . htmlspecialchars($row["Question"]) . '</h6>';
            echo '</div>';

            echo '<div class="Answer_row">';
            echo '<label style="color:white"><input type="radio" name="' . $i . '[]" value="' . htmlspecialchars($row["optionA"]) . '"> ' . htmlspecialchars($row["optionA"]) . '</label>';
            echo '<label style="color:white"><input type="radio" name="' . $i . '[]" value="' . htmlspecialchars($row["optionB"]) . '"> ' . htmlspecialchars($row["optionB"]) . '</label>';
            echo '<label style="color:white"><input type="radio" name="' . $i . '[]" value="' . htmlspecialchars($row["optionC"]) . '"> ' . htmlspecialchars($row["optionC"]) . '</label>';
            echo '<label style="color:white"><input type="radio" name="' . $i . '[]" value="' . htmlspecialchars($row["optionD"]) . '"> ' . htmlspecialchars($row["optionD"]) . '</label>';
            echo '</div>';

            $i++; // Increment the question number for the next iteration
        }
    } else {
        echo "No questions found.";
    }
}




 
function fetchCorrectAnswers($conn) {
    $sql = "SELECT Correct_answer FROM lesson2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<input type="hidden" name="correct_answers[]" value="' . htmlspecialchars($row["Correct_answer"]) . '">';
        }
    } else {
        echo "No correct answers found.";
    }
}











?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self-Submitting Form</title>
    <style>
                                .Quiz_panel{
                           width: 65vw;
                           height: 90vh;
                           
                        }
                        .question_row{
                          width: 65vw;
                          height: 12vh;
                          border: 2px solid #219c02;
                          filter: drop-shadow(2px 2px 4px #219c02); 
                          border-radius: 30px;
                          background-color:  #101E14;
                          text-align: center;
                        }
                        .Answer_row{
                           width: 65vw;
                           height: 20vh;
                           display: flex;
                           background-color:  #101E14;
                           flex-direction: column;
                           margin-top: 7px;
                           margin-bottom: 7px;
                           border-radius: 30px;
                        }
                        .Answer_row input{
                           width: 4vw;
                           height: 2vh;
                        }
                  
    </style>
</head>

<body>
  <!--  <form method="post" action="<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="question_row">
              <h6 style="color:white; margin-top:20px;">1 : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h6>
        </div>
        <div class="Answer_row">
              <label style="color:black"><input type="radio" name="1[]" value="Haji"> Haji</label>
              <label style="color:black"><input type="radio" name="1[]" value="ahsan"> ahsan</label>
              <label style="color:black"><input type="radio" name="1[]" value="dojacat"> dojacat</label>
              <label style="color:black"><input type="radio" name="1[]" value="2pac"> 2pac</label>
              <label style="color:black;"><input type="checkbox" name="Correct_answer[]" value="Haji"> Correct Answer</label> 
        </div>
        <div class="Answer_row">
              <label style="color:black"><input type="radio" name="2[]" value="Haji2"> Haji2</label>
              <label style="color:black"><input type="radio" name="2[]" value="ahsan2"> ahsan2</label>
              <label style="color:black"><input type="radio" name="2[]" value="dojacat2"> dojacat2</label>
              <label style="color:black"><input type="radio" name="2[]" value="2pac2"> 2pac2</label>
              <label style="color:black;"><input type="checkbox" name="Correct_answer[]" value="ahsan2"> Correct Answer</label>  
        </div>
        <div class="Answer_row">
              <label style="color:black"><input type="radio" name="3[]" value="Haji3"> Haji3</label>
              <label style="color:black"><input type="radio" name="3[]" value="ahsan3"> ahsan3</label>
              <label style="color:black"><input type="radio" name="3[]" value="dojacat3"> dojacat3</label>
              <label style="color:black"><input type="radio" name="3[]" value="2pac3"> 2pac3</label>
             <label style="color:black;"><input type="checkbox" name="Correct_answer[]" value="dojacat3"> Correct Answer</label> 
        </div>
        <div class="Answer_row">
              <label style="color:black"><input type="radio" name="4[]" value="Haji4"> Haji4</label>
              <label style="color:black"><input type="radio" name="4[]" value="ahsan4"> ahsan4</label>
              <label style="color:black"><input type="radio" name="4[]" value="dojacat4"> dojacat4</label>
              <label style="color:black"><input type="radio" name="4[]" value="2pac4"> 2pac4</label>
              <label style="color:black;"><input type="checkbox" name="Correct_answer[]" value="2pac4"> Correct Answer</label> 
        </div>
        <div class="Answer_row">
              <label style="color:black"><input type="radio" name="5[]" value="Haji5"> Haji5</label>
              <label style="color:black"><input type="radio" name="5[]" value="ahsan5"> ahsan5</label>
              <label style="color:black"><input type="radio" name="5[]" value="dojacat5"> dojacat5</label>
              <label style="color:black"><input type="radio" name="5[]" value="2pac995"> 2pac995</label>
              <label style="color:black;"><input type="checkbox" name="Correct_answer[]" value="2pac995"> Correct Answer</label> 
        </div>
        <div>
           <input type="hidden" name="no_of_questions" value="5">
        </div>
        <input type="submit" value="Submit"> 
    </form>  -->

    <div class="col-12 text-center">
                                 <h3 class="mb-4" style="color:white;"> Your Quiz</h3>
     </div>
     <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
         <?php
              fetchQuestionsAndAnswers($connection);
              fetchCorrectAnswers($connection);
         ?>
         <input type="hidden" name="no_of_questions" value="10">
         <input type="submit" value="Submit"> 
     </form> 

 

<?php
    $userInputsArray = array(); // Array to store user inputs
    $correctAnswersArray = array(); // Array to store correct answers
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $userInputs = "none";
        $count = $_POST["no_of_questions"];
        echo $count;
        $intcount = (int)$count;
        for ($i = $intcount ; $i >=  1; $i--) {
            $userInputs = $_POST[$i];
            if (is_array($userInputs)) {
                foreach ($userInputs as $input) {
                    $userInputsArray[] = htmlspecialchars($input);
                }
            } else {
                echo "User Input: " . htmlspecialchars($userInputs) . "<br>";
            }
        }
    
    }
    
    if(isset($_POST["Correct_answer"])) {
        $correct_answers = $_POST["Correct_answer"];
        foreach ($correct_answers as $input) {
            $correctAnswersArray[] = htmlspecialchars($input);
        }
    } else {
        echo "No correct answers submitted.";
    }
    
    echo "User Inputs: ";
    print_r($userInputsArray);
    
    // Print correct answers array
    echo "Correct Answers: ";
    print_r($correctAnswersArray);
    echo "<br>";
    
    $matchedValues = array_intersect($userInputsArray, $correctAnswersArray);
    
    echo (count($matchedValues));

?>


 