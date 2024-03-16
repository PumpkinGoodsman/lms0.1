<?php
include 'connection.php';

function show_Guides($connection) {
    $sql = "SELECT Guide_name FROM guides_details";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $guide_name = $row["Guide_name"];
            echo '<button class="course_btn" style="margin-top: 3%;" onclick="getGuideSubjects(\'' . $guide_name . '\');">' . $guide_name . '</button>';
        }
    } else {
        echo "No results found.";
    }
}




?>


<div class="viewCoursesArea" >
    <div class="row1" >
        <div class="parent_courses">
            <div class="col-12 text-center">
                <h5 class="mb-4" style="color: #003366 ; margin-top: 14%;" >Guides List</h5>
            </div>
            <?php
                show_Guides($connection);
            ?>
        </div>
        <div class="course_div" >
            
        </div>
        
    </div>
    <div class="row2"  >
        <div class="subCourses">
            <div class="col-12 text-center">
                <h5 class="mb-4" style="color: #003366 ; margin-top: 4%;">Courses OF Guides  </h5>
            </div>
            <div class="sub_courses_List_area" id="guide_courses_List_area" >
 
            </div>
        </div>
    </div>    
</div> 

<script>

function getGuideSubjects(guideName) {
    var alphaElement = document.getElementById('guide_courses_List_area');
    var xhr = new XMLHttpRequest();

    // Include the guideName variable in the URL
    xhr.open('GET', 'adminDashBoardAction.php?guideName=' + encodeURIComponent(guideName), true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alphaElement.innerHTML = xhr.responseText;
            } else {
                console.error('Error fetching content from PHP');
            }
        }
    };
    xhr.send();
}

</script>