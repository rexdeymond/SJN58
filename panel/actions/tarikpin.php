<?php
	$rslt="Error, silahkan dicoba kembali";
	if(isset($_POST['kodepin']))
	{

		$SQLQry="call spTarikPIN('".$_POST['kodepin']."','".$_POST['noid']."','".$_SESSION['sjn58']."')";
	//echo "$SQLQry";
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>