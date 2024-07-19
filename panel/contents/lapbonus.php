
	<div class="col-md-12">
		
		<form class="form-horizontal" name="lapdaftar" id="lapdaftar" method="post" onsubmit="return previewData()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Laporan </strong> Bonus</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        

					<div class="row">
						<div class="col-md-3">
							<div class="row">

								<div class="form-group">
									<label class="col-md-4 control-label">Tanggal Awal</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateFrom" value=""/>

										</div>                                            
										<span class="help-block">Tanggal awal bonus</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label">Tanggal Akhir</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateTo" value=""/>
										</div>                                            
										<span class="help-block">Tanggal akhir bonus</span>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-6">

							<div class="row">
								<div class="form-group">
									<label class="col-md-3 control-label">Filter Pencarian</label>
									<div class="col-md-9">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-search"></span></span>
											<input type="text" class="form-control" name="txtfilter" />
										</div>                                            
										<span class="help-block">Filter Pencarian</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<label class="col-md-3 control-label">Cabang</label>
									<div class="col-md-9">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-home"></span></span>
											<select class="form-control select" name="slcnostok" id="slcnostok">
												<option value="" >Semua cabang</option>
											<?php
											require_once("../include/koneksi.php");
											$sqlstokist = "SELECT * FROM stokist WHERE publik=1";
											$rsstokist = mysqli_query($conn,$sqlstokist);
											while($data = $rsstokist->fetch_assoc())
											{
										?>
												<option value="<?=$data["nostok"]?>" ><?=$data["nostok"]?> - <?=$data["nama"]?></option>
										<?php
											}
										?>
											</select>
										</div>                                            
										<span class="help-block">Cabang Pendaftaran</span>
									</div>
								</div>
							</div>


						</div>
						<div class="col-md-3">

							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label">Max Pencarian</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-home"></span></span>
											<input type="number" class="form-control" name="txtlimit" min="0"/>
										</div>                                            
										<span class="help-block">Maksimal pencarian</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label">Jenis Bonus</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-code-fork"></span></span>
											<select class="form-control select"  name="slctipe">
												<option value="">Semua</option>
											<?php
											require_once("../include/koneksi.php");
											$sqltipe = "SELECT distinct ket FROM vwbonus";
											$rstipe = mysqli_query($conn,$sqltipe);
											while($data = $rstipe->fetch_assoc())
											{
										?>
												<option value="<?=$data["ket"]?>" ><?=$data["ket"]?></option>
										<?php
											}
										?>
											</select>
										</div>                                            
										<span class="help-block">Pilih Tipe Bonus</span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<button class="btn btn-primary pull-right">Tampilkan</button>
				</div>
			</div>
		</form>
	</div>
					

<hr/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Data </strong> Bonus</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body table-responsive">                                                                        

				<table id="TabelLaporan" class="table datatable table-striped table-hover dt-responsive display nowrap">
					<thead>
						<tr>
							<th align="center" width="150px">Tanggal Bonus</th>
							<th width="120px" align="center">NOID</th>
							<th align="center">Nama</th>
							<th align="center">Referensi</th>
							<th align="center" width="100px">Bonus</th>
							<th align="center" width="100px">Status</th>
							<th align="center" width="250px">Keterangan</th>
 						</tr>
					</thead>
				    <tfoot>
						<tr>
							<th colspan="4" style="text-align:right">Total </th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>

				</table>
			</div>
		</div>
	</div>
