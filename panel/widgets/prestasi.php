<?php 

$sql="SELECT sp.noid as NoID, fnGetMemberNama(sp.noid) as Nama, COUNT(sp.ref) as TTl
        FROM bsponsor as sp
                LEFT JOIN pin ON pin.kdbrg = 'MBN' AND sp.noid = pin.noid
        WHERE sp.tanggal >= '2024-07-01' AND sp.tanggal <= '2024-07-31' AND pin.noid IS NOT NULL AND sp.noid='".$_SESSION['sjn58']."'
        GROUP BY sp.NOID ORDER BY TTl DESC, sp.tanggal DESC";

require_once("../include/koneksi.php");
$i=1;
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($data = $rssql->fetch_assoc()){
	$tbonus=$data['TTl'];
	if($tbonus>4){ 
	?>         
        <div> Selamat kepada <b><?= $data['Nama'] ?> - <?= $data['NoID'] ?> </b> atas pencapaian prestasi Anda pada bulan Juli di Komunitas SJN58.com! 🎉
                Kami sangat senang mendengar tentang kesuksesan Anda dan ingin mengucapkan selamat atas kerja keras dan dedikasi Anda. 
                Sebagai bentuk apresiasi, kami dengan bangga memberikan bonus tambahan kepada Anda berupa BONUS PRESTASI !
        </div>
	<?php
	}
	}?>
