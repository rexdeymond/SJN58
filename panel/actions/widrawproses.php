<?php
	$rslt="";
	if(isset($_POST['txtrp']))
	{
		$SQLQry="call spWidrawProses ('".$_POST['txttgl']."','".$_POST['txtnoid']."','".$_POST['txtrp']."','".$_POST['slcstatus']."','".$_POST['txtket']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>