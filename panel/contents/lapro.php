
	<div class="col-md-12">
		
		<form class="form-horizontal" name="lapdaftar" id="lapdaftar" method="post" onsubmit="return previewData()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Status <strong>Belanja </strong> </h3>
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
									<label class="col-md-4 control-label">Awal RO</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateFrom" value=""/>

										</div>                                            
										<span class="help-block">Tanggal awal Repeat Order</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label">Akhir RO</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateTo" value=""/>
										</div>                                            
										<span class="help-block">Tanggal akhir Repeat Order</span>
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
									<label class="col-md-3 control-label">Produk</label>
									<div class="col-md-9">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-apple"></span></span>
											<select class="form-control select" data-live-search="true" name="slcproduk">
												<option value="">Semua Produk</option>
											<?php
											require_once("../include/koneksi.php");
											$sqlprd = "SELECT * FROM produk where publik=1 and register=0 order by id ";
											$rsprd = mysqli_query($conn,$sqlprd);
											while($data = $rsprd->fetch_assoc())
											{
										?>
												<option value="<?=$data["kdbrg"]?>"><?=$data["nama"]?></option>
										<?php
											}
										?>
											</select>

										</div>                                            
										<span class="help-block">Jenis produk RO</span>
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
									<label class="col-md-4 control-label">Cabang</label>
									<div class="col-md-8">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-home"></span></span>
											<select class="form-control select" name="slcnostok" id="slcnostok">
												<?=$uakseslvl>2?'<option value="" >Semua cabang</option>':''?>
											<?php
											require_once("../include/koneksi.php");
											$sqlstokist = "SELECT * FROM stokist where publik=1 ".($uakseslvl<3?("AND noid='".$unoid."' "):"")."order by nostok";
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
										<span class="help-block">Cabang Repeat Order</span>
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
				<h3 class="panel-title">Data <strong>Belanja</strong> </h3>
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
							<th align="center" width="150px">Tanggal RO</th>
							<th width="120px" align="center">NOID</th>
							<th align="center">Nama</th>
							<th align="center" width="250px">Kota</th>
							<th align="center" width="50px">Kode PIN</th>
							<th align="center" width="200px">Produk</th>
							<th align="center" width="100px">Cabang</th>
 						</tr>
					</thead>

				</table>
			</div>
		</div>
	</div>
