<?php 

$sql="SELECT  sp.noid AS NoID, fnGetMemberNama(sp.noid) AS Nama, COUNT(sp.ref) AS QQ FROM bsponsor AS sp 
        LEFT JOIN pin ON pin.kdbrg = 'MBN' AND sp.noid = pin.noid
        WHERE sp.tanggal BETWEEN '2024-07-01' AND '2024-07-31' AND pin.noid IS NOT NULL 
        GROUP BY sp.noid HAVING QQ > 4
        ORDER BY QQ DESC, sp.tanggal DESC LIMIT 10;";
?>
                         <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
<?php
require_once("../include/koneksi.php");
$i=1;
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($data = $rssql->fetch_assoc()){

	$nama=$data['Nama'];?>
                                    <div>
                                        <div class="widget-title">TOP Member PRESTASI  <?= date('M Y', strtotime('-1 month'))?></div>                                                                        
                                        <div class="widget-title"><?=$i?>. <small>- <?= $nama ?></small></div>
                                        <div class="widget-subtitle"><b>berhasil Sponsor <?=$data['QQ']?></b> member</div>
                                    </div>
<?php
	$i++;
}?>
                                </div>
                            </div>