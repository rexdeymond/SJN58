
	<div class="col-md-12">
		
		<form class="form-horizontal" name="runbonus" id="runbonus" method="post" onsubmit="return calcBonus()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Penghitungan </strong> Bonus Bulanan</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-4 control-label">Periode Bonus</label>
								<div class="col-md-8">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
										<input type="text" class="form-control datepicker" name="txtDate" value=""/>

									</div>                                            
									<span class="help-block">Tanggal periode bonus</span>
								</div>
							</div>
						</div>

						<div class="col-md-6">
<?php
$sql="SELECT *,year(tanggalakhir)thn,month(tanggalakhir)bln FROM `runbns` ORDER BY tanggalakhir DESC LIMIT 1";

require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$data = $rssql->fetch_assoc();
?>
									<span>Periode Pengitungan Bonus Terakhir <strong><?=$data['tanggalawal'].'-'.$data['tanggalakhir']?><strong> pada <?=$data['timestamp']?> </span>
									<span class="help-block">Bonus yang dihitung bulanan hanya Bonus Sharing Profit</span>
						</div>

					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<button class="btn btn-primary pull-right">Hitung Bonus</button>
				</div>
			</div>
		</form>
	</div>