<?php
$sq=isset($_POST['query'])?$_POST['query']:(isset($_GET['query'])?$_GET['query']:"");
$j=isset($_GET['j'])?$_GET['j']:(isset($_POST['j'])?$_POST['j']:"");//jaringan
$vnoid=substr(trim($j),0,10);
$sqlRef = "SELECT * FROM member where noid='$vnoid' LIMIT 1";
$rsRef = mysqli_query($conn,$sqlRef);
$dtRef = $rsRef->fetch_assoc();
if($dtRef['nama']<>""){$vnoid=$dtRef['noid'];}else{$vnoid='';}


$q="
SELECT CONCAT(noid,' - ',nama,' | ',kota) member FROM `member` WHERE fnGetMemberJDown(noid,0)<5 and fnGetMemberKodeLvl(noid,0) like concat(IFNULL(fnGetMemberKodeLvl('$vnoid',0),''),'%') and CONCAT(noid,' - ',nama,' | ',kota) like '%".$sq."%' ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 10":(" LIMIT ".$l));
//echo $q;
?>