
	<div class="col-md-12">
		
		<form class="form-horizontal" name="lapdaftar" id="lapdaftar" method="post" onsubmit="return previewData()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Laporan </strong> Member</h3>
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
									<label class="col-md-4 control-label">Pendaftaran Awal</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateFrom" value="<?=date('Y-m-d')?>"/>

										</div>                                            
										<span class="help-block">Tanggal awal Pendaftaran</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label">Pendaftaran Akhir</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateTo" value="<?=date('Y-m-d')?>"/>
										</div>                                            
										<span class="help-block">Tanggal akhir Pendaftaran</span>
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
											$sqlstokist = "SELECT * FROM stokist";
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
											<input type="number" class="form-control" name="txtlimit" min="0" value="10"/>
										</div>                                            
										<span class="help-block">Maksimal pencarian</span>
									</div>
								</div>
							</div>

							<!--div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label">Jenis Paket Member</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-code-fork"></span></span>
											<select class="form-control select"  name="slctipe">
												<option value="">Semua</option>
												<option value="A">Paket A</option>
												<option value="B">Paket B</option>
											</select>
										</div>                                            
										<span class="help-block">Pilih Tipe Member</span>
									</div>
								</div>
							</div-->

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
				<h3 class="panel-title"><strong>Data </strong> Member</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
					<li onclick="previewData()"><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body table-responsive">
				<table id="TabelLaporan" class="table datatable table-striped table-hover dt-responsive display nowrap">
					<thead>
						<tr>
							<th width="120px" align="center">NOID</th>
							<th align="center">Nama</th>
							<th align="center" width="100px">Cabang</th>
							<th align="center" width="150px">Tanggal Daftar</th>
							<th align="center" width="200px">Propinsi</th>
							<th align="center" width="250px">Kota</th>
							<th align="center" width="50px">Edit</th>
 						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
