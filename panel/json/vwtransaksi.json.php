<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");


if ($d1<>"")$sqld1=" AND tanggal>='".$d1."' "; else $sqld1="";
if ($d2<>"")$sqld2=" AND tanggal<='".$d2."' "; else $sqld2="";

$q="
SELECT *,case when nominal>=0 then FORMAT(nominal,0) else null end debet,case when nominal<0 then FORMAT((nominal*-1),0) else null end kredit FROM `vwtransaksi` WHERE ket like '%".$s."%' ".$sqld1." ".$sqld2." ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));

 //echo $q.'('.$d1.'-'.$d2.')';
?>