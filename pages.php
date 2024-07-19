<?php 
$pagesPath="pages";
if(isset($_GET['p']))
{
	$p=$_GET['p'];
	if(file_exists("$pagesPath/$p.php"))
	{
		include("$pagesPath/$p.php");
	}
	else include("$pagesPath/404.php");

}
elseif (!isset($_GET['p']))include("$pagesPath/login.php");


?>
