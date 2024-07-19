<?php 

$sql="SELECT fnGetMemberRoBln(noid,NOW(),'') robln,LEFT(tanggal,7) periode,sum(case WHEN `status`>0 THEN 0 ELSE bonus END) pending,sum(case WHEN `status`>0 THEN bonus ELSE 0 END) bonus,noid FROM `vwbonus` 
WHERE 
	LEFT(tanggal,7)=LEFT(NOW(),7) AND
	noid='".$_SESSION['sjn58']."'
GROUP BY noid,LEFT(tanggal,7)";

require_once("../include/koneksi.php");
$i=1;
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($data = $rssql->fetch_assoc()){
	$pending=$data['pending'];
	$tbonus=$data['pending']+$data['bonus'];
	$robln=$data['robln'];
	if($tbonus>0){ 
	?>                         <div class="widget widget-default widget-carousel" style="min-height: 1px;<?=$robln==0?"background: linear-gradient(to bottom, #ff0000 0%, #f5f5f5 100%);":"background: linear-gradient(to bottom, #00ff00 0%, #ffff00 100%);"?>">
                                <div class="owl-carousel" id="owl-example">

                                    <div <?=$robln==0?("title='Klik untuk belanja' style='cursor: pointer;' onclick='ModalRO(&quot;".$unoid."&quot;)'"):"" ?> >
                                        <div class="widget-title"><?=$robln==0?(" Bonus anda bulan ini Rp. ".number_format($pending)." masih ditahan."):("Anda mendapatkan bonus Rp. ".number_format($tbonus)." bulan ini.")?></div>                                                                        
                                        <div class="widget-subtitle"><?=$robln==0?("Anda belum belanja bulan ini silahkan melakukan pembelanjaan agar bonus pending Rp. ".number_format($pending)." dapat keluar"):("Terimakasih sudah melakukan belanja bulan ini")?></div>
                                    </div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>
							<?php
	}
	}?>
