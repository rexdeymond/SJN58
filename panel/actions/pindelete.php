<?php
	$rslt="";
	if(isset($_POST['txttgl']))
	{
		$SQLQry="CALL `spDeletePin`('".$_POST['txttgl']."','".$_POST['txttgl']."','".$_POST['slcproduk']."','".$_POST['slcnostok']."','".$_POST['txtjumlah']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>