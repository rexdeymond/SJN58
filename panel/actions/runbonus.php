<?php
	$rslt="";
	if(isset($_POST['txtDate']))
	{
		$SQLQry="SET STATEMENT max_statement_time=1000 FOR call spCalcBonusBulanan ('".$_POST['txtDate']."','".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
		$rs=$RSQry->fetch_row();
		$rslt=$rs[0];		
	}
	echo $rslt;
?>