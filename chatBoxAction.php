<?php
include 'connection.php';
session_start();
$page_user = $_SESSION["username"]; 
$page_user_id = $_SESSION["admin_Id"];

$message = "  special here  not checking " ;
function printChatMessages($connection, $page_user , $chat_box_name)
{   
    $chat_name = $chat_box_name . "_chatbox";
     
    // Fetch data from the chatbox table
    $query = "SELECT Sname, MSg FROM `$chat_name`";
    $result = $connection->query($query);

    // Check if the query was successful
    if ($result) { 
        // Initialize current user variables
        $msg_body_class = '';
        $sender_info_class = '';
        $sender_msg_class  = '';
           
        // Print the fetched data 	
        while ($row = $result->fetch_assoc()) {
            $Sname = $row['Sname'];
            $MSg = $row['MSg'];

            if ($Sname === $page_user) {
                // Determine the class names based on conditions
                $msg_body_class = 'curret_usr_msg_body';
                $sender_info_class = 'curret_sender_info';
                $sender_msg_class  = 'curret_sender_msg';
                

            } else {
                $msg_body_class = 'msg_body';
                $sender_info_class = 'sender_info';
                $sender_msg_class  = 'msg';
            }

            echo
            '<div class="' . $msg_body_class . '">
                <div class="' . $sender_info_class . '">
                    <div class="sender_pic"></div>
                    <div class="sender_name">
                        <h9>' . $Sname . '</h9>
                    </div>
                </div>
                <div class="' . $sender_msg_class . '">
                    <h8>' . $MSg . '</h8>
                </div>
            </div>';
        }    
        $result->free();
    } else {
        // Print an error message if the query fails
        echo "Error: " . $connection->error;
        return null;
    }
}    

function insertChatMessage($connection, $page_user, $page_user_id, $message, $chat_box_name)
{   
    $chat_name = $chat_box_name . "_chatbox";
    // Prepare the SQL statement to insert the message
    $query = "INSERT INTO `$chat_name` (Sname, Sid, MSg) VALUES (?, ?, ?)";
    
    // Prepare the statement
    $statement = $connection->prepare($query);
    
    // Bind parameters and execute the statement
    $statement->bind_param("sss", $page_user, $page_user_id, $message);
    $result = $statement->execute();
    
    // Check if the query was successful
    if ($result) {
        // Return true if the message is inserted successfully
        return true;
    } else {
        // Return false if there's an error
        return false;
    }
}


//printChatMessages($connection, $page_user);
/*
if (isset($_POST['message'])) {
   
    $message = $_POST['message'];
    insertChatMessage($connection, $page_user, $page_user_id, $message);
    echo $_POST['Course_Name'];
}    */
if (isset($_POST['load_chat'])){
    
    printChatMessages($connection, $page_user ,$_POST['Course_Name'] );
}
if (!isset($_POST['load_chat'])){
    insertChatMessage($connection, $page_user, $page_user_id, $_POST['message'] ,$_POST['Course_Name'] ); 
}

?>
