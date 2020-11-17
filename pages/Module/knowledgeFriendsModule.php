<?php
	require "../Control/Cuser.php";
	require "../Control/server.php";
	session_start();
    $user = new userinfo();
	$cpt = 0;
    $tst = 0;
	if($_SESSION["login"] == "user"){
        $id_user = $user->SelectIdUser($con,$_SESSION["user"]);
        $rst = $user->knowledgeFriends($con,$id_user);
        $friends = $user->TableFriends($con,$id_user);
        while($row = mysqli_fetch_row($rst)){
            for ($i=0; $i < count($friends); $i++) { 
                # code...
                if($row[0] == $friends[$i] ){
                    $tst = 1;
                    break;
                    }
                }
                if($tst == 1){
                    $tst = 0;
                }else{
                    
    ?>
                <form method='get'>
                    <div class='course-slid course-slid<?php echo $row[0];?>'>
                        <img src="images/profil/<?php echo $row[10] ?>" class="pic-friends">
                        <p class="name-friends"><?php echo $row[1]."<br>".$row[2]."<br>"."Sipnneret :".$row[6]; ?></p>
                        <img src="images/icon/add-button.png" class="add-friends add<?php echo $row[0];?>" id="<?php echo $row[0];?>">
                        <img src="images/icon/icon.png" class="refuse-friends refuse<?php echo $row[0];?>">
                    </div>
                </form>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(".add<?php echo $row[0];?>").click(function(e){
                            e.preventDefault();
                            var id = $(this).attr("id");
                            $.ajax({
                                url : "pages/Control/InvitFriendsControl.php",
                                method : "get",
                                data : { id : id },
                                success : function(e){
                                    if(e == "nice") $(".course-slid<?php echo $row[0];?>").hide(400);
                                    else alert("Error !! \n try again ");
                                }
                            })
                        })
                        $('.refuse<?php echo $row[0];?>').click(function(e){
                            e.preventDefault();
                            $(".course-slid<?php echo $row[0];?>").hide(400);
                        })
                    })
                </script>
                <?php
                        

                     } 
                     $cpt++;
                     if($cpt>5) break;      
                  }

            
          }elseif($_SESSION["login"] == "formers"){
            $cpt = 0;
            $rst = $user->AllUsers($con);
            while($row = mysqli_fetch_row($rst)){
                $cpt++;
            ?>
                <form method='get'>
                    <div class='course-slid course-slid<?php echo $row[0];?>'>
                        <img src="images/profil/<?php echo $row[10] ?>" class="pic-friends">
                        <p class="name-friends"><?php echo $row[1]."<br>".$row[2]."<br>"."Sipnneret :".$row[6]; ?></p>
                        <img src="images/icon/add-button.png" class="add-friends add<?php echo $row[0];?>" id="<?php echo $row[0];?>">
                        <img src="images/icon/icon.png" class="refuse-friends refuse<?php echo $row[0];?>">
                    </div>
                </form>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(".add<?php echo $row[0];?>").click(function(e){
                            e.preventDefault();
                            var id = $(this).attr("id");
                            $.ajax({
                                url : "pages/Control/InvitFriendsControl.php",
                                method : "get",
                                data : { id : id },
                                success : function(e){
                                    if(e == "nice") $(".course-slid<?php echo $row[0];?>").hide(400);
                                    else alert(e);//+"Error !! \n try again "
                                }
                            })
                        })
                        $('.refuse<?php echo $row[0];?>').click(function(e){
                            e.preventDefault();
                            $(".course-slid<?php echo $row[0];?>").hide(400);
                        })
                    })
                </script>
            <?php
                if($cpt >4){
                    echo "<a href='#'>See All Stagiaire</a> ";
                    break;
                }
            }
          }
    ?>