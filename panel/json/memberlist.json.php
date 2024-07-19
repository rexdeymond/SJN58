<?php
$sq=isset($_POST['query'])?$_POST['query']:(isset($_GET['query'])?$_GET['query']:"");

$q="
SELECT CONCAT(noid,' - ',nama,' | ',kota) member FROM `member` WHERE CONCAT(noid,' - ',nama,' | ',kota) like '%".$sq."%' ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 10":(" LIMIT ".$l));
//echo $q;
?>