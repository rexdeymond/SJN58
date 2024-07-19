<?php 
$pagesPath="contents";
if(isset($_GET['p']))
{
	$p=$_GET['p'];
	if(file_exists("$pagesPath/$p.php"))
	{
		$rsAccess=mysqli_query($conn,"SELECT fnGetUserAccess('".$_SESSION['sjn58']."','$p')");
		$isGranted=$rsAccess->fetch_row();
		if($isGranted[0]>0)
			include("$pagesPath/$p.php");
		else if($isGranted[0]<0)
			include("$pagesPath/403-expired.php");
		else include("$pagesPath/403.php");
		
		mysqli_free_result($rsAccess);	
	}
	else include("$pagesPath/404.php");
}
elseif (!isset($_GET['p']))include("$pagesPath/home.php");
?>
