<?php
	require "../Control/Cuser.php";
	require "../Control/server.php";
	session_start();
	$user_friend = new userinfo();
	$id_user = $user_friend->SelectIdUser($con,$_SESSION["user"]);
	$row = $user_friend->SelectUserId($con,$_POST["id_friends"]);
	$_SESSION["friend"] = $row[0];
?>
<div class="slid-active-chat">
	<form method="post">
		<div class="top-slid-chat" id="<?php echo $row[0]; ?>">
			<img src="../../images/profil/<?php echo $row[10];?>" class="pic-friend-chatActive">
			<p class="name-friend-chatActive"><?php echo $row[1]." ".$row[2];?></p>
			<img src="../../images/icon/cancel-button.png" class="refuse-chat">
		</div>
		<div class="reload-all-massege">
			
			
		</div>
		<div class="bottom-slid-chat" id="<?php echo $id_user; ?>">
			<textarea name="text" class="inp-slid-chat" placeholder="Massege..." rows="1"></textarea>
			<input type="button" name="submit" value="submit" class="btn-slid-chat">
		</div>
	</form>
</div>
<script type="text/javascript">
	var text;
	var cpt=0;
	$(document).ready(function(){
		$(".refuse-chat").click(function(e){
			$(".slid-active-chat").hide(600);
		})
		function ajaxChat(){
				var id_friend = $(".top-slid-chat").attr("id");
				$.ajax({
					url : "../Control/LoadMassegeControl.php",
					datatype : "html",
					success : function(e){
						text += e;
						$(".reload-all-massege").html(e);
					}
				})
				
		}
		ajaxChat();
		
		$(".btn-slid-chat").click(function(e){
			e.preventDefault();

			var id_friend = $(".top-slid-chat").attr("id");
			var id_user = $(".bottom-slid-chat").attr("id");
			var massege = $(".inp-slid-chat").val();
			ajaxChat();
			$.ajax({
				url : "../Control/StartChatControl.php",
				method : "post",
				data : {
					id_friend : id_friend,
					id_user : id_user,
					massege : massege
				},
				success : function(e){
					alert(e);
				}
			})
			cpt = 1;

		})
		
	})
</script>