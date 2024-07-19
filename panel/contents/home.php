					<!-- START WIDGETS -->                    
					<?php 
						include("widgets.php");
					?>
					<!-- END WIDGETS -->                    
                    
                    <div class="row">
                        <div class="col-md-10">
							<div class="row">
								<div class="col-md-6">
									
									<!-- START BONUS BLOCK -->
									<?php
									include("ajax/bonusTable.php");
									?>
									<!-- END BONUS BLOCK -->
									
								</div>
							
								<div class="col-md-6">
									<!-- START REGULAR PIE CHART -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><strong>Statistik </strong>Bonus</h3>
											<ul class="panel-controls">
												<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
												<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
											</ul>
										</div>
										<div class="panel-body">
											<div id="chartBonus" style="height:450px"><svg></svg></div>
										</div>
									</div>
									<!-- END REGULAR PIE CHART -->

								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<!-- START BONUS BLOCK -->
									<?php
									include("ajax/sponsorTable.php");
									?>
									<!-- END BONUS BLOCK -->
								</div>
								<div class="col-md-6">
									<!-- START BONUS BLOCK -->
									<?php
									include("ajax/presenterTable.php");
									?>
									<!-- END BONUS BLOCK -->
								</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								
								<!-- START BONUS BLOCK -->
								<?php
								include("ajax/allbonusTable.php");
								?>
								<!-- END BONUS BLOCK -->
							</div>
                        </div>
                            
</div>						
						<div class="col-md-2">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Member</h3>
                                        <span>Member Terbaru</span>
                                    </div>                                    
									<ul class="panel-controls">
										<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
										<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
										<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
									</ul>
                                </div>
                                <div class="panel-body list-group list-group-contacts">     
<marquee behavior="scroll" direction="up" scrollamount="2" height="400">
<?php 
$sql="SELECT * FROM `member` ORDER BY tgldaftar DESC LIMIT 30";

require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));									
while($data = $rssql->fetch_assoc()){
	
	$pathimg="assets/images/users/";
	$imgmfile=$pathimg."default.png";
	if(isset($data['noid']))
	{
		$validext=array("jpg","jpe","jpeg","jfif","gif","png");
		for($i=0;$i<count($validext);$i++)
		if(file_exists(strtolower($pathimg.$data['noid'].".".$validext[$i])))
		{
			$imgmfile=strtolower($pathimg.$data['noid'].".".$validext[$i]);
		}
	}
?>
                                    <a href="#" class="list-group-item">                                    
                                        <img src="<?=$imgmfile?>" class="pull-left" alt="<?=$data['nama']?>"/>
                                        <span class="contacts-title"><?=$data['noid']?></span>
                                        <p><div class="profile-data-title"><?=$data['kota']?><br><small><?=$data['tgldaftar']?></small></DIV></p>                                    
                                    </a>
<?php 
}
?>
</marquee>  								
                               </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                    </div>
