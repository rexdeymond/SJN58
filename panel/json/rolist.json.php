<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query
$ns=isset($_GET['slckdbrg'])?$_GET['slckdbrg']:(isset($_POST['slckdbrg'])?$_POST['slckdbrg']:"");//kdbrg
$n=isset($_GET['noid'])?$_GET['noid']:(isset($_POST['noid'])?$_POST['noid']:"");//noid

//$d1="";
//$d2="";

if ($d1<>"")$sqld1=" AND cast(used as date)>='".$d1."' "; else $sqld1="";
if ($d2<>"")$sqld2=" AND cast(used as date)<='".$d2."' "; else $sqld2="";

$q="
SELECT p.kdbrg,d.nama produk,kodepin,p.noid,fnGetMemberNama(p.noid) nama,used FROM `pin` p,produk d WHERE p.kdbrg=d.kdbrg and d.register=0 and p.noid like '%".$n."%' AND p.kdbrg like '%".$ns."%' AND (fnGetMemberNama(p.noid) like '%".$s."%' or p.noid like '%".$s."%' or p.kodepin like '%".$s."%') $sqld1 $sqld2 ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>