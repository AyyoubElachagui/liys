<?php
	require "../Control/CFormateur.php";
	require "../Control/server.php";
	session_start();
	$id_former = 0;
	$formers = new formers();
	if($_SESSION["login"] == "formers")
		$id_former = $formers->SelectIdFormers($con,$_SESSION["user"]);
	$cmd = "SELECT * FROM formateur where status_ = 1 and id <> $id_former ";
	$rst = mysqli_query($con,$cmd);
	while ($row = mysqli_fetch_row($rst)) {
		# code...
	
?>
<form method='get'>
				<div class='formateur-slid' id="slid<?php echo $row[0]; ?>">
                    <img src="images/formers/<?php echo $row[12]; ?>" class="pic-formateur">
                    <p class="name-formateur"><?php echo $row[1]."<br>".$row[2]; ?></p>
                    <p class="title-formateur"><?php echo "Sipnneret :".$row[7]; ?></p>
                    <img src="images/icon/add-button.png" class="add-formateur formateur<?php echo $row[0]; ?>" id="<?php echo $row[0]; ?>">
                    <img src="images/icon/icon.png" class="refuse-formateur">
				</div>
            </form>
            <script type="text/javascript">
            	$(document).ready(function(){
            		$('.formateur<?php echo $row[0]; ?>').click(function(e){
            			e.preventDefault();
            			var id = $(this).attr('id');
            			$.ajax({
            				url : 'pages/Control/InvitFormersControl.php',
            				method : 'get',
            				data : { id : id },
            				success : function(e){
            					if(e == "Invit Formers Has SuccesFul") $("#slid<?php echo $row[0]; ?>").hide(300);
            					else alert(e);
            				}
            			})
            		})
            	})
            </script>

<?php

}
?>
