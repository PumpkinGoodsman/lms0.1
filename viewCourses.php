<?php
include 'connection.php';
 
 
function show_courses($connection) {
    $sql = "SELECT C_Name FROM parent_courses";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseName = $row["C_Name"];
            echo '<button class="course_btn" style="margin-top: 3%;" onclick="showSubCourses(\'' . $courseName . '\');">' . $courseName . '</button>';
        }
    } else {
        echo "No results found.";
    }
}




?>

<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>

<div class="viewCoursesArea">
    <div class="row1">
        <div class="parent_courses">
            <div class="col-12 text-center">
                <h5 class="mb-4" style="color: #003366 ; margin-top: 4%;">Parent Courses List</h5>
            </div>
            <div class="parent_courses_List_area">
                <?php
                 show_courses($connection);
                ?>
            </div>
        </div>
        <div class="course_div" id="alpha" >
            <!-- Populate this div with sub-courses using JavaScript -->
        </div>
    </div>

    <div class="row2">
        <div class="subCourses">
            <div class="col-12 text-center">
                <h5 class="mb-4" style="color:#EE5007;">Sub Courses List</h5>
            </div>
            <div class="sub_courses_List_area" id="sub_corses_List_area" >
        
            </div>
        </div>
    </div>
</div>

<script>

function showSubCourses(subject) {
    var alphaElement = document.getElementById('sub_corses_List_area');
    var xhr = new XMLHttpRequest();

    // Include the subject variable in the URL
    xhr.open('GET', 'adminDashBoardAction.php?subject=' + encodeURIComponent(subject), true);

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

function alertFun( courseName){
    var alphaElement = document.getElementById('alpha');
    var xhr = new XMLHttpRequest();

    // Include the courseName variable in the URL
    xhr.open('GET', 'adminDashBoardAction.php?courseName=' + encodeURIComponent(courseName), true);

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
</body>
</html>
