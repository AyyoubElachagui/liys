<?php
	require "../Control/Cuser.php";
	require "../Control/server.php";
	session_start();
	$user = new userinfo();
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
	$invit_request = $user->ResponseInvit($con,$id_user);
	for ($i=0; $i < count($invit_request); $i++) { 
		# code...
		$row = $user->SelectUserId($con,$invit_request[$i]);
?>
		<form method='post'>
			<div class='div-invit-notification <?php echo $row[0]; ?>' id='<?php echo $row[0]; ?>'>
	            	<img src='../../images/profil/<?php echo $row[10]; ?>' class='pic-invit-notification'>
		            <p class='name-invit-notification'><?php echo $row[1].'&nbsp;'.$row[2]; ?></p>
		            <div class='accepte-invit'>
		            	<input type='submit' name='accepte' class='<?php echo $row[0]; ?>' id='Accepte<?php echo $row[0]; ?>' value='Accepte'>
		            </div>
		            <div class='refuse-invit'>
		            	<input type='submit' name='refuse' class='<?php echo $row[0]; ?>' id='Refuse<?php echo $row[0]; ?>' value='Refuse'>
		            </div>
        	</div>
		</form>
        <script type='text/javascript'>
        	$(document).ready(function(){
        		$('#Accepte<?php echo $row[0]; ?>').click(function(e){
				    e.preventDefault();
				    var id_slid = $('.<?php echo $row[0]; ?>').attr('id');
				    var id_friend = $(this).attr('class');
				    $.ajax({
				    	url : '../Control/AccepteResponseInvitation.php',
				    	method : 'POST',
				    	data : {idAccepte : id_friend},
				    	datatype : 'text',
				    	success : function(e){
				    		if(e == 'nice'){
				    			alert('Accepte Has SuccessFul');
				    			$('#'+id_slid).hide(500);
				    			}else alert(e);
				    	}

				    })
			   })
        		$('#Refuse<?php echo $row[0]; ?>').click(function(e){
				    e.preventDefault();
				    var id_slid = $('.<?php echo $row[0]; ?>').attr('id');
				    var id_friend = $(this).attr('class');
				    $.ajax({
				    	url : '../Control/RefuseResponseInvitation.php',
				    	method : 'POST',
				    	data : {idAccepte : id_friend},
				    	datatype : 'text',
				    	success : function(e){
				    		if(e == 'block'){
				    			alert('Block Has SuccessFul');
				    			$('#'+id_slid).hide(500);
				    		}
				    		else
				    			alert(e);
				    	}

				    })
			   })
        	})
        </script>
<?php
	}
?>