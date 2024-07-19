<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query
$s=isset($_GET['search'])?$_GET['search']:(isset($_POST['search'])?$_POST['search']:"");//nostok
$st=isset($_GET['status'])?$_GET['status']:(isset($_POST['slcstatus'])?$_POST['slcstatus']:"");//status
$kd=isset($_GET['kdbrg'])?$_GET['kdbrg']:(isset($_POST['slcproduk'])?$_POST['slcproduk']:"");//kdbrg
$jm=isset($_GET['l'])?$_GET['l']:(isset($_POST['txtjumlah'])?$_POST['txtjumlah']:"0");//jml

$q="
SELECT *,fnGetProdukNama(kdbrg) produk FROM `pin` WHERE publik=2 and ownedby='".$s."' ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>