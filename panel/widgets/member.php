<?php 

$sql="SELECT noid,nama,fnKodeLvlCntJar(fnGetMemberKodeLvl(noid,0),0,'')-1 jar,fnKodeLvlCntJar(fnGetMemberKodeLvl(noid,1),1,'')-1 jargl,fnGetMemberSponsorCount(noid) sponsor,fnGetMemberPresenterCount(noid) presenter FROM member WHERE noid='".$_SESSION['sjn58']."'";

require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($data = $rssql->fetch_assoc()){
	$sponsor=$data['sponsor'];
	$presenter=$data['presenter'];
	$jar=$data['jar'];
	$jargl=$data['jargl'];
}

?>                         <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>
                                        <div class="widget-title">Jaringan</div>                                                                        
                                        <div class="widget-subtitle">jumlah member di jaringan pribadi</div>
                                        <div class="widget-int"><?=number_format($jar)?></div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Jaringan Global</div>
                                        <div class="widget-subtitle">jumlah member di jaringan global</div>
                                        <div class="widget-int"><?=number_format($jargl)?></div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Sponsor</div>
                                        <div class="widget-subtitle">total sponsor</div>
                                        <div class="widget-int"><?=number_format($sponsor)?></div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Presenter</div>
                                        <div class="widget-subtitle">total presenter</div>
                                        <div class="widget-int"><?=number_format($presenter)?></div>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>
