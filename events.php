
<?php 
include 'connection.php';


 
function print_faculty_events($connect) {

    $connection = $connect;

    $select_sql = "SELECT EventName, Topic, time, Hosted_By FROM faculty_webinar";

    $result = mysqli_query($connection, $select_sql);

    if ($result) {
        // Fetch and display all records
        while ($row = mysqli_fetch_assoc($result)) {
            $event_name = $row['EventName'];
            $event_topic = $row['Topic'];
            $event_time = $row['time'];
            $event_host = $row['Hosted_By'];
            echo '<td class="table-background-image-wrap" style="background-color: white; border-bottom :0px solid transparent; border-right :0px solid transparent;" >
                    <h3 style=" color: #444444;">' . $event_name . '</h3>
                    <p style=" color: #444444;" class="mb-2">' . $event_topic . '</p>
                    <p style=" color: #444444;" class="mb-2">' . $event_time . '</p>
                    <p style=" color: #444444;" class="mb-2">' . $event_host . '</p>
                    <div class="section-overlay">
                    </div>
                </td>';
        }

        mysqli_free_result($result);
    } else {
        echo "Error fetching records: " . mysqli_error($connection);
    }

     
}

function print_student_events($connect) {

    $connection = $connect;

    $select_sql2 = "SELECT EventNAme ,Topic  , Time, Hosted_By FROM students_webinar";

    $result = mysqli_query($connection, $select_sql2);

    if ($result) {
        // Fetch and display all records
        while ($row = mysqli_fetch_assoc($result)) {
            $event_name = $row['EventNAme'];
            $event_topic = $row['Topic'];
            $event_time = $row['Time'];
            $event_host = $row['Hosted_By'];
            echo ' 
            <td class="table-background-image-wrap"  style="background-color: white; border-bottom :0px solid transparent; border-right :0px solid transparent;" >
                <h3 style=" color:#444444;">' . $event_name . '</h3>
                <p class="mb-2" style=" color:#444444;">' . $event_topic . '</p>
                <p class="mb-2" style=" color:#444444;">' . $event_time . '</p>
                <p class="mb-2" style=" color:#444444;">' . $event_host . '</p>
                <div class="section-overlay">
                </div>
            </td>
           ';
        }

        mysqli_free_result($result);
    } else {
        echo "Error fetching records: " . mysqli_error($connection);
    }

    
}

function print_upcoming_courses($connect) {

    $connection = $connect;

    $select_sql = "SELECT Course_name, Duration , launch_Date , Hosted_By FROM upcoming_courses";

    $result = mysqli_query($connection, $select_sql);

    if ($result) {
        $i = 0 ;
        // Fetch and display all records
        while ($row = mysqli_fetch_assoc($result)) {
            $i = $i+1;
             
            if($i = 2){
                $Course_name = $row['Course_name'];
                $Duration = $row['Duration'];
                $launch_Date = $row['launch_Date'];
                $Hosted_By = $row['Hosted_By'];
                echo '<td class="table-background-image-wrap" style="background-color: white; border-bottom :0px solid transparent; border-right :0px solid transparent;">
                        <h3 style=" color: #444444;">' . $Course_name . '</h3>
                        <p class="mb-2" style=" color: #444444;">' . $Duration . '</p>
                        <p class="mb-2" style=" color: #444444;">' . $launch_Date . '</p>
                        <p class="mb-2" style=" color: #444444;">' . $Hosted_By . '</p>
                        <div class="section-overlay">
                        </div>
                    </td>';
            }
            else{
                echo '<td class="table-background-image-wrap " style="background-color:#150E19" >
                            <h3>' . $Course_name . '</h3>
                            <p class="mb-2">' . $Duration . '</p>
                            <p class="mb-2">' . $launch_Date . '</p>
                            <p class="mb-2">' . $Hosted_By . '</p>
                            <div class="section-overlay">
                            </div>
                     </td>';
            }        
        }

        mysqli_free_result($result);
    } else {
        echo "Error fetching records: " . mysqli_error($connection);
    }

     
}






?>
      
      
        <section class="schedule-section section-padding" id="section_4"  style="background-image: none; background-color:  #D3D3D3;">
            <div class="container">
                <div class="row">

                            <div class="col-12 text-center" style="margin-bottom : 10%;">
                                <h2 class="mb-4" style="color: #003366 ;">Events Schedule</h1>
                            </div>
                            <div class="table-responsive" style="filter: drop-shadow(2px 2px 4px #D3D3D3);" >
                                <table class="schedule-table table table-dark" >
                                    <thead>
                                        <tr>
                                            <th scope="col"  style="background-color:#808080; border-bottom :0.4px solid black; border-right: none;"><h6 style="color: #FFFFFF;"> Event Title </h6></th>

                                            <th scope="col" style="background-color:#808080; border-bottom :0.4px solid black; border-right: none;">Event details</h6> </th>

                                            <th scope="col" style="background-color:#808080; border-bottom :0.4px solid black; border-right: none;">Event details</h6> </th>

                                            <th scope="col" style="background-color:#808080; border-bottom :0.4px solid black; border-right: none;">Event details</h6> </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row" style="background-color: #808080;" > Faculty Events</th>
                                           <?php
                                              print_faculty_events($connection);
                                           ?>
                                        </tr>
                                        <tr> 
                                           <th scope="row" style="background-color: #808080;"> Guide Events</th>
                                           <?php
                                                print_student_events($connection);
                                           ?>
                                        </tr>
                                        <tr> 
                                            <th scope="row" style="background-color: #808080;"> Upcoming Courses Events</th>
                                            <?php
                                               print_upcoming_courses($connection);
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </section>
