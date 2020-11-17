<?php
    require "../Control/Ccourses.php";
    require "../Control/server.php";
    $search = $_POST["inp-search"];
    $command = "SELECT * FROM  add_cour where title like '%$search%'";
    $rst = mysqli_query($con,$command); 
    $cpt = 0;
    while($row = mysqli_fetch_row($rst)){
        echo "
            <div id='$row[0]'>
             <form method='get'>
                <div class='course-slid'>
                    <img src='images/courses/$row[2]' class='pic-course'>
                    <p class='name-course'>$row[1]</p>
                    <p class='title-course'>Course</p>
                    <img src='images/icon/play.png' class='play-course playCour$row[0]' id='$row[0]'>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function(){
                $('.playCour$row[0]').click(function(e){
                    e.preventDefault();
                    alert($(this).attr('id'));
                })
            })
        </script>
        ";  
        $cpt++;
        if($cpt == 5){
            echo "<a href='#'>See All Courses</a>";
            break;
        }
    }
?>