<?php
	$rslt="";
	if(isset($_POST['txttgl']))
	{
		$SQLQry="call spTransaksiSave ('".$_POST['txttgl']."','".$_POST['slcjtrans']."','".$_POST['txtrp']."','".$_POST['txttrans']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>