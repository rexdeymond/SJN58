<?php
	$rslt="Error, silahkan dicoba kembali";
	if(isset($_POST['nostok']))
	{
		$SQLQry="call spCabangDel ('".$_POST['nostok']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>