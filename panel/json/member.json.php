<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query
$ns=isset($_GET['nostok'])?$_GET['nostok']:(isset($_POST['slcnostok'])?$_POST['slcnostok']:"");//nostok
$tp=isset($_GET['tipe'])?$_GET['tipe']:(isset($_POST['slctipe'])?$_POST['slctipe']:"");//paket

//$d1="";
//$d2="";

if ($d1<>"")$sqld1=" AND cast(tgldaftar as date)>='".$d1."' "; else $sqld1="";
if ($d2<>"")$sqld2=" AND cast(tgldaftar as date)<='".$d2."' "; else $sqld2="";

$q="
SELECT * FROM `member` WHERE  (ifnull(nostok,'') like '%".$ns."%') and (nama like '%".$s."%' or noid like '%".$s."%' or kota like '%".$s."%' or propinsi like '%".$s."%') $sqld1 $sqld2 ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>