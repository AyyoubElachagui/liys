
<?php
    require "../Control/Cuser.php";
    require "../Control/server.php";
    session_start();
    $_SESSION["cpt"]=0;
    $user = new userinfo();
    $id_user = $user->SelectIdUser($con,$_SESSION["user"]);

    $friends = $user->SelectFriendsAsso($con,$id_user);
    for ($i=0; $i < count($friends); $i++) { 
        # code...
        $row = $user->SelectUserId($con,$friends[$i]);
?>
            <form method="post">
                <?php 
                    if($row[11] == 1){
                ?>
                    <div class="online-non"></div>
                <?php
                    }
                ?>
                    
                <div class="slid-friends-chat slid-friends-chat<?php echo $row[0]; ?>" id="<?php echo $row[0]; ?>">
                 <table>
                    <tr>
                        <td>
                            <img src="images/profil/<?php echo $row[10]; ?>" class="pic-friend-chat">
                        </td>
                        <td>
                             <p class="name-friend-chat"><?php echo $row[1]."&nbsp;".$row[2]; ?></p>
                        </td>
                     </tr>
                 </table>
                </div>
            </form>
             
             <script type="text/javascript">
                 $(".slid-friends-chat<?php echo $row[0]; ?>").click(function(e){
                    e.preventDefault();
                    var id_friends = $(this).attr("id");
                   $.ajax({
                        url : "pages/Module/ActiveChatFriendModule.php",
                        method : "post",
                        data :  {id_friends : id_friends},
                        success : function(e){
                            $(".active-chat-friend").html(e);
                        }
                    })
                   $.ajax({
                        url : "pages/Module/LoadMassegeModule.php",
                        method : "post",
                        data :  {id_friends : id_friends},
                        success : function(e){
                        }
                    })
                 })
             </script>
<?php
    }
?>
        