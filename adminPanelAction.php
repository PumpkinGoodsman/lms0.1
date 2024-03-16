 <?php
   


 /*
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'lms';


function addToDataBase($a , $b , $c , $d ){
// Replace these credentials with your actual database credentials
  $aA =  $a;
  $bB  = $b;
  $cC  = $c;
  $dD  =   $d;
  

// Create a connection to the database
$connection = mysqli_connect($aA , $bB, $cC, $dD);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to create the table
$sql = "CREATE TABLE IF NOT EXISTS python3 (
    indx INT AUTO_INCREMENT PRIMARY KEY,
    C_Name VARCHAR(255),
    Course_Id VARCHAR(50),
    Description VARCHAR(255),
    Guide_name VARCHAR(100),
    Guide_Email VARCHAR(100),
    Guide_Key VARCHAR(50),
    ImgName VARCHAR(100)
)";

// Execute the query and check for errors
if (mysqli_query($connection, $sql)) {
   // echo "Table 'python3' created successfully!";
} else {
   // echo "Error creating table: " . mysqli_error($connection);
}

// Insert dummy values into the 'python3' table
$dummy_values = array(
    array('Course 1', 'CS101', 'Introduction to Python', 'John Doe', 'john@example.com', 'abc123', 'image1.jpg'),
    array('Course 2', 'CS202', 'Advanced Python', 'Jane Smith', 'jane@example.com', 'xyz456', 'image2.jpg'),
    array('Course 3', 'CS303', 'Python Projects', 'Bob Johnson', 'bob@example.com', 'pqr789', 'image3.jpg')
);

foreach ($dummy_values as $values) {
    $sql_insert = "INSERT INTO python3 (C_Name, Course_Id, Description, Guide_name, Guide_Email, Guide_Key, ImgName)
                   VALUES ('{$values[0]}', '{$values[1]}', '{$values[2]}', '{$values[3]}', '{$values[4]}', '{$values[5]}', '{$values[6]}')";

    if (mysqli_query($connection, $sql_insert)) {
      //  echo "<br>Record inserted successfully!";
    } else {
       // echo "<br>Error inserting record: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
 
}

addToDataBase($host ,$user  , $password, $database  );

*/

        

/*
 
$TablePrint = new PrintTables();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the variable from the AJAX request
    $variable = $_POST["variable"];
    if($variable == "AddToCourse"){
        $TablePrint->PrintParentCourse();
    $TablePrint->PrintSubCourse();
      
    }
    if($variable == "subCourseDiv"){
       
    }
    // Process the variable (you can do whatever you want here)
    // $result = "You sent: " . $variable;

    // Send the result back to the AJAX request
   //  echo $result;
}
 /*
// processForm.php
$TablePrint = new PrintTables();
$TablePrint->PrintParentCourse();
// Handle the form data here
// You can access the form data using $_POST superglobal array
// For example:
$C_Name = $_POST['C_Name'];
$Course_Id = $_POST['Course_Id'];
$Description = $_POST['Description'];
$Guide_name = $_POST['Guide_name'];
$Guide_Email = $_POST['Guide_Email'];
$Guide_Key = $_POST['Guide_Key'];
$ImgName = $_POST['ImgName'];

// Perform any data validation or processing if required

// Assuming you have a database connection here (similar to the previous PHP code)

// Insert the form data into the 'python3' table (you can modify this part according to your database configuration)
// For example:
 

// Execute the SQL query and handle any errors if necessary

// After successful insertion, you can display the data or any other response you want to send back
// For example, you can echo the data back as HTML:
function testing($a ,  $b, $c ){
    $c = $a;
    $d = $b;
    $e = $c;
 
echo "<p>C_Name: $c</p>";
echo "<p>Course_Id:  $d</p>";
echo "<p>Description:  $e</p>";
 
} 

echo testing($C_Name ,  $Course_Id , $Description );
*/
?>


<script>
 
</script>