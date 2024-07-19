<?php
	$rslt="Error silahkan dicoba lagi";
	if(isset($_POST['txtNewPass']))
	{
		$SQLQry="call spPasswordSave('".$_SESSION['sjn58']."','".$_POST['txtOldPass']."','".$_POST['txtNewPass']."')";
	//echo "$SQLQry";
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>