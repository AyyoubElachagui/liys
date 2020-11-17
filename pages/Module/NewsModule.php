<?php
    require "../Control/server.php";
    require "../Control/Cuser.php";
    session_start();
    $user = new userinfo();
    if($_SESSION['login'] == 'user'){
    
        
        $id_user = $user->SelectIdUser($con,$_SESSION["user"]);
        $command = "SELECT news.`id`, news.`id_user`, news.`id_formateur`, news.`statut`, news.`picture`, news.`date_` FROM news,friends where (($id_user = id_request or $id_user = id_response ) and status_ = 1) and ((id_user = id_request or id_user = id_response ) and status_ = 1) group by id order by id desc ";
        $result = mysqli_query($con,$command);
        if($result){
        while($row = mysqli_fetch_row($result)){
        $user_info = $user->SelectUserId($con,$row[1]);

    
?>
            <form method='get'>
				<div class='news-slid slid<?php echo $row[0]; ?>'>
                    <img src="images/icon/cancel-button.png" class="cancel-news Cancel<?php echo $row[0]; ?>">
                    <table>
                       <tr>
                           <td><img src="images/profil/<?php echo $user_info[10]; ?>" class="pic-news"></td>
                            <td>
                                <p class="name-news"><?php echo $user_info[1]."&nbsp;".$user_info[2]; ?> <font style="font-size: 0.6rem;padding-left:0.5rem;color : rgb(23,123,141); "><?php echo $row[5]; ?></font></p>
                                <hr style="margin-left: 1rem;">
                                <p class="title-news"><?php echo $row[3]; ?></p><br>
                                <?php if($row[4] != ""){?>
                                <img src="images/UploadPic/<?php echo $row[4]; ?>" class="picture-news">
                                <?php } ?>
                            </td>
                            <td>
                                <!---<input type="submit" name="like" class="like" value="like">
                                <input type="submit" name="dislike" class="dislike" value="dislike">
                                <input type="text" name="comment" class="comment" placeholder="comment...">--->
                            </td>
                        </tr>
                    </table>
				</div>
            </form>
<?php
            
        
            }
        }

}elseif($_SESSION['login'] == "formers"){
        $command = "SELECT * FROM news order by id desc";
        $result = mysqli_query($con,$command);
        if($result){
        while($row = mysqli_fetch_row($result)){
        $user_info = $user->SelectUserId($con,$row[1]);

    
?>
            <form method='get'>
                <div class='news-slid slid<?php echo $row[0]; ?>'>
                    <img src="images/icon/cancel-button.png" class="cancel-news Cancel<?php echo $row[0]; ?>">
                    <table>
                       <tr>
                           <td><img src="images/profil/<?php echo $user_info[10]; ?>" class="pic-news"></td>
                            <td>
                                <p class="name-news"><?php echo $user_info[1]."&nbsp;".$user_info[2]; ?> <font style="font-size: 0.6rem;padding-left:0.5rem;color : rgb(23,123,141); "><?php echo $row[5]; ?></font></p>
                                <hr style="margin-left: 1rem;">
                                <p class="title-news"><?php echo $row[3]; ?></p><br>
                                <?php if($row[4] != ""){?>
                                <img src="images/UploadPic/<?php echo $row[4]; ?>" class="picture-news">
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
<?php
            
        
            }
        }
}
?>