<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query
$st=isset($_GET['status'])?$_GET['status']:(isset($_POST['slcstatus'])?$_POST['slcstatus']:"");//bonus

//$d1="";
//$d2="";

if ($d1<>"")$sqld1=" AND cast(tanggal as date)>='".$d1."' "; else $sqld1="";
if ($d2<>"")$sqld2=" AND cast(tanggal as date)<='".$d2."' "; else $sqld2="";

if ($st<>"")$sqlst=" AND status='".$st."' "; else $sqlst="";

$q="select * from vwwidraw WHERE  (fnGetMemberNama(noid) LIKE '%$s%' OR noid LIKE '%$s%') $sqlst $sqld1 $sqld2 ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>