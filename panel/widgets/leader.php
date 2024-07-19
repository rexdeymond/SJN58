<?php 

$sql="SELECT noid,nama,kota,propinsi,tgldaftar,fnGetMemberSponsorCount(noid) sponsor,fnGetMemberPresenterCount(noid) presenter FROM member WHERE noid<>'G-24040001' ORDER BY sponsor DESC,presenter DESC,tgldaftar desc LIMIT 3";
?>
                         <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
<?php
require_once("../include/koneksi.php");
$i=1;
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($data = $rssql->fetch_assoc()){
	$sponsor=$data['sponsor'];$presenter=$data['presenter'];
	$nama=$data['nama'];?>
                                    <div>
                                        <div class="widget-title">TOP LEADER #<?=$i?></div>                                                                        
                                        <div class="widget-subtitle">Jumlah sponsor <?=$sponsor?> Orang, Jumlah Presenter <?=$presenter?> Orang</div>
                                        <div class="widget-title"><?=$nama?></div>
                                    </div>
<?php
	$i++;
}?>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>