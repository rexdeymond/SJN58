<?php
$q="SELECT `ID`,`Judul`,fnGetArtikelCategory(ID) `Category`,`Created`,`Updated`,`Created_By`,`Updated_By`,`Publik` FROM artikel WHERE judul like '%".$s."%' or category like '%".$s."%' ORDER BY judul ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 1000":(" LIMIT ".$l));
?>
