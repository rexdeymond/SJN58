<?php
	$rslt="";
	if(isset($_POST['txtpin']))
	{

		$SQLQry="call spDaftarMember ('".$_POST['txtnama']."','".$_POST['txtnoiden']."','','','".$_POST['txttgllahir']."' ,'','".$_POST['txtalamat']."','','".$_POST['slckota']."','".$_POST['slcpropinsi']."','' ,'".$_POST['txttelp']."','','".$_POST['txtemail']."','','0','','','".$_POST['txtnorek']."','".$_POST['txtan']."','".$_POST['slcbank']."','".$_POST['txtpin']."','".substr($_POST['txtpresenter'],0,10)."','".substr($_POST['txtsponsor'],0,10)."','".substr($_POST['txtupline'],0,10)."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>