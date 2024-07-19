<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include("../include/koneksi.php");
$act=$_GET['a'];
$actionsPath="actions";
//echo "$actionsPath/$act.php";

$SQL="INSERT INTO akses_log(noid,aksi,`timestamp`,ip) SELECT '".(isset($_SESSION['sjn58'])?$_SESSION['sjn58']:$_POST['txtuserid'])."','[".$act."]',NOW(),'".$_SERVER['REMOTE_ADDR']."'";
mysqli_query($conn,$SQL);

//===>>Login----------------------------------------------------------------------------------------------------------------------
if ($act=="login")
{
	include("$actionsPath/login.php");
}
//===>>Logout---------------------------------------------------------------------------------------------------------------------
elseif ($act=="logout")
{
	session_destroy();
	setcookie("sjn58", "", time() - 3600);
	header("Location:.");
}
//===>>Pendaftaran boleh tanpa login
elseif ($act=="memberdaftar")
{
	include("$actionsPath/$act.php");
}
else
	// DEVELOPMENT ONLY --- VULNERABLE TO INJECTION
	if(file_exists("$actionsPath/$act.php")&&$_SESSION['sjn58']){
		include("$actionsPath/$act.php");
	}
?>
