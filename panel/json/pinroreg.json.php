<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query
$s=isset($_GET['nostok'])?$_GET['nostok']:(isset($_POST['slcnostok'])?$_POST['slcnostok']:"");//nostok
$st=isset($_GET['status'])?$_GET['status']:(isset($_POST['slcstatus'])?$_POST['slcstatus']:"");//status
$kd=isset($_GET['kdbrg'])?$_GET['kdbrg']:(isset($_POST['slcproduk'])?$_POST['slcproduk']:"");//kdbrg
$jm=isset($_GET['l'])?$_GET['l']:(isset($_POST['txtjumlah'])?$_POST['txtjumlah']:"0");//jml
$tp=isset($_GET['tp'])?$_GET['tp']:(isset($_POST['tp'])?$_POST['tp']:"");//tipe

$q="CALL `spViewPinROREG`('".$d1."','".$d2."','".$tp."','".$kd."','".$s."','".$jm."','".$st."','".$_SESSION['sjn58']."');";
//echo $q;
?>