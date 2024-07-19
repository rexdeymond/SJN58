<?php 
	$p=isset($_GET['p'])?$_GET['p']:"home";
	require_once("../include/koneksi.php");
	$sqlmn = "SELECT name FROM menu WHERE link like '?p=$p' LIMIT 1";
	$rsmn = mysqli_query($conn,$sqlmn) or die(mysqli_error($conn));
	$data = $rsmn->fetch_assoc();

?>

                <ul class="breadcrumb">
                    <li><a href=".">Home</a></li>                    
                    <li class="active"><?=$data['name']?></li>
                </ul>
