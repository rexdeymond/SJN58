<?php
	$rslt="";
	if(isset($_POST['txtjumlah']))
	{
		$SQLQry="call spGeneratePin ('".$_POST['slcproduk']."','".$_POST['txtjumlah']."','".$_POST['slcnostok']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>