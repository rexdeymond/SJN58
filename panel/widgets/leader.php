<?php 

$sql="SELECT noid,nama,kota,propinsi,tgldaftar,fnGetMemberSponsorCount(noid) sponsor,fnGetMemberPresenterCount(noid) presenter 
        FROM member WHERE noid<>'SJ24000001' 
        ORDER BY sponsor DESC,presenter DESC,tgldaftar desc LIMIT 4";
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
                                        <div class="widget-title">TOP LEADER SJN58</div>                                                                        
                                        <div class="widget-title"> <?=$i?>. <?=$nama?></div>
                                        <div class="widget-subtitle">berhasil <b>sponsor <?=$sponsor?></b> member, dan <b>Presenter <?=$presenter?></b> member</div>
                                    </div>
<?php
	$i++;
}?>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>