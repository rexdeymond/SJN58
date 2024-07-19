<?php
	$rslt="";
	if(isset($_POST['txtnostok']))
	{
		$SQLQry="call spCabangSave ('".$_POST['txtnostok']."','".$_POST['txtnama']."','".substr($_POST['txtnoid'],0,10)."','".$_POST['txttelp']."','".$_POST['txtmail']."','".$_POST['slcpropinsi']."','".$_POST['slckota']."','".$_POST['txtalamat']."','".$_POST['chkpublik']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>
