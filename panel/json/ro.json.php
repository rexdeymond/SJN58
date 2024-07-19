<?php
$d1=isset($_GET['dateFrom'])?$_GET['dateFrom']:(isset($_POST['txtDateFrom'])?$_POST['txtDateFrom']:"");//Date from query
$d2=isset($_GET['dateTo'])?$_GET['dateTo']:(isset($_POST['txtDateTo'])?$_POST['txtDateTo']:"");//Date from query
$ns=isset($_GET['nostok'])?$_GET['nostok']:(isset($_POST['slcnostok'])?$_POST['slcnostok']:"");//nostok
$tp=isset($_GET['kdbrg'])?$_GET['kdbrg']:(isset($_POST['slckdbrg'])?$_POST['slcproduk']:"");//produk

//$d1="";
//$d2="";

if ($d1<>"")$sqld1=" AND cast(used as date)>='".$d1."' "; else $sqld1="";
if ($d2<>"")$sqld2=" AND cast(used as date)<='".$d2."' "; else $sqld2="";

$q="
SELECT *,fnGetMemberKota(noid) kota,fnGetMemberNama(noid) nama,fnGetMemberPropinsi(noid) propinsi,r.nama produk FROM `pin` p,produk r WHERE p.kdbrg=r.kdbrg AND ifnull(noid,'')<>'' and r.register=0 and p.kdbrg like '%".$tp."%' and (ifnull(nostok,'') like '%".$ns."%') and (fnGetMemberKota(noid) like '%".$s."%' or noid like '%".$s."%' or fnGetMemberNama(noid) like '%".$s."%' or fnGetMemberPropinsi(noid) like '%".$s."%') $sqld1 $sqld2 ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>