<?php
	$rslt="";
	if(isset($_POST['hdnnoid']))
	{
		$SQLQry="call spSaveMember ('".$_POST['hdnnoid']."','".$_POST['txtnama']."','".$_POST['txtnoiden']."','".$_POST['slcagama']."','".$_POST['slcjkel']."','".$_POST['txttgllahir']."' ,'','".$_POST['txtalamat']."','".$_POST['slckecamatan']."','".$_POST['slckota']."','".$_POST['slcpropinsi']."','' ,'".$_POST['txttelp']."','".$_POST['txthp']."','".$_POST['txtemail']."','','0','','','".$_POST['txtnorek']."','".$_POST['txtan']."','".$_POST['slcbank']."','');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>