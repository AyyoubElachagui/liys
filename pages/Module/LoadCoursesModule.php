<?php
    require "../Control/Ccourses.php";
    require "../Control/server.php";
    $courses = new Courses();
    $cours = $courses->LoadCouses($con);
    $cpt = 0;
    while($row = mysqli_fetch_row($cours)){
        echo "
            <div id='$row[0]'>
             <form method='get'>
                <div class='course-slid'>
                    <img src='images/courses/$row[2]' class='pic-course'>
                    <p class='name-course name-course$row[0]'>$row[1]</p><br>
                    <p class='title-course'>Course</p>
                    <img src='images/icon/play.png' class='play-course playCour$row[0]' id='$row[0]'>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function(){
                    var v = $('.name-course$row[0]').text().length;
                    if(v > 10  ){
                        $('.name-course$row[0]').css('font-size','0.7rem');
                    }
                $('.playCour$row[0]').click(function(e){
                    e.preventDefault();
                    var id = $('.playCour$row[0]').attr('id');
                    $.ajax({
                        url : 'pages/Control/Start_Learning.php',
                        method : 'get',
                        data : { id : id },
                        success : function(e){
                            window.location = '/LIYS/pages/Courses/$row[3]';
                            }
                        })
                    
                })
            })
        </script>
        ";  
        $cpt++;
        if($cpt == 5){
            echo "<a href='pages/Courses/AllCourses.php'>See All Courses</a>";
            break;
        }
    }
?>
