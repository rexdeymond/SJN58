<?php
$s=isset($_GET['nostok'])?$_GET['nostok']:(isset($_POST['slcnostok'])?$_POST['slcnostok']:"");//nostok

$q="SELECT s.nostok,s.noid,nama,alamat,propinsi,kota,telp,email,publik,(SELECT COUNT(*) FROM member m WHERE m.nostok=s.nostok) jmlmember,(SELECT COUNT(*) FROM pin p WHERE p.nostok=s.nostok AND IFNULL(noid,'')='') stockpin,(SELECT COUNT(*) FROM pin p WHERE p.nostok=s.nostok AND IFNULL(noid,'')<>'') pinterpakai FROM `stokist` s WHERE (nama like '%".$s."%' or noid like '%".$s."%' or kota like '%".$s."%' or propinsi like '%".$s."%') ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
//echo $q;
?>