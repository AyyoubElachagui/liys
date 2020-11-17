<?php
	require "server.php";
	require "Cuser.php";
	session_start();
	$user = new userinfo();
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
	$id_friend = $_SESSION["friend"];
	$cpt = 0;
				$cmd = "SELECT * from chat_friend  ";
				if($rst = mysqli_query($con,$cmd)){
					while($row = mysqli_fetch_row($rst)) {
						# code...
						$cpt++;
						if($row[1] == $id_user && $row[2] == $id_friend && $row[3] != ""){
						?>
						
						<p class="user-massege" ><?php echo $row[3];?><br><font style="background: #F2F2F2;font-size: 0.5rem;margin-top:0.5rem;padding-left:0.5rem;color : rgb(23,123,141); " id="<?php echo $cpt;?>"><?php echo $row[4]; ?></font></p>
						<?php
						}
						if($row[2] == $id_user && $row[1] == $id_friend && $row[3] != ""){
						?>
						<p class="friend-massege" ><?php echo $row[3];?><br><font style="font-size: 0.5rem;margin-top:0.5rem;padding-left:0.5rem;color : rgb(229,240,255); " id="<?php echo $cpt;?>"><?php echo $row[4]; ?></font></p>
						
						<?php
						}
						
					}
				}
			?>
			<script type="text/javascript">
				var of = $('p').last().offset().top;
				$('.reload-all-massege').animate({scrollTop : of+1000000},1000);
			</script>