<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query

//$d1="";
//$d2="";

if ($d1<>"")$sqld1=" AND cast(tanggal as date)>='".$d1."' "; else $sqld1="";
if ($d2<>"")$sqld2=" AND cast(tanggal as date)<='".$d2."' "; else $sqld2="";

$q="select * from vwwidraw WHERE  (nama LIKE '%$s%' OR noid LIKE '%$s%' OR ket like '%$s%' OR ketstatus like '%$s%') $sqld1 $sqld2 ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>