<?php
	$rslt="Error, silahkan dicoba kembali";
	if(isset($_POST['txtuserid']))
	{
// IN `vuserid` varchar(20), IN `vnama` varchar(100), IN `vpass` varchar(100), IN `vgroup` varchar(100), IN `vranting` varchar(100), IN `vket` varchar(100),IN `vuser` varchar(100)
		$SQLQry="call spUserSave('".$_POST['txtuserid']."', '".$_POST['txtnama']."', '".$_POST['txtpass1']."', '".$_POST['slcgroup']."', '".$_POST['slcranting']."', '".$_POST['txtket']."', '".$_SESSION['sjn58']."')";
	//echo "$SQLQry";
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>