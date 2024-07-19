
	<div class="col-md-12">
		
		<form class="form-horizontal" name="lapdaftar" id="lapdaftar" method="post" onsubmit="return previewData()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Laporan <strong>PIN RO</strong> </h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        

					<div class="row">
						<div class="col-md-4">
							<div class="row">

								<div class="form-group">
									<label class="col-md-2 control-label">Awal</label>
									<div class="col-md-10">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateFrom" value=""/>

										</div>                                            
										<span class="help-block">Tanggal awal Pembuatan PIN</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-2 control-label">Akhir</label>
									<div class="col-md-10">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="text" class="form-control datepicker" name="txtDateTo" value=""/>
										</div>                                            
										<span class="help-block">Tanggal akhir Pembuatan PIN</span>
									</div>
								</div>
							</div>

						</div>
						
						<div class="col-md-4">

							<div class="row">
								<div class="form-group">
									<label class="col-md-2 control-label">Produk</label>
									<div class="col-md-10">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-apple"></span></span>
											<select class="form-control select" data-live-search="true" name="slcproduk">
											<?php
											require_once("../include/koneksi.php");
											$sqlprd = "SELECT * FROM produk where publik=1 AND register=0 order by id ";
											$rsprd = mysqli_query($conn,$sqlprd);
											while($data = $rsprd->fetch_assoc())
											{
										?>
												<option value="<?=$data["kdbrg"]?>"><?=$data["nama"]?></option>
										<?php
											}
										?>
												<option value="">Semua Produk</option>
											</select>

										</div>                                            
										<span class="help-block">Jenis produk RO</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-2 control-label">Cabang</label>
									<div class="col-md-10">                                            
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
						
						<div class="col-md-4">


							<div class="row">
								<div class="form-group">
									<label class="col-md-2 control-label">Status</label>
									<div class="col-md-10">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-code-fork"></span></span>
											<select class="form-control select" name="slcstatus">
												<option value="0">Belum terpakai</option>
												<option value="1">Sudah dipakai</option>
												<option value="2">Sudah dikirim</option>
												<option value="">Semua</option>
											</select>
										</div>                                            
										<span class="help-block">Data untuk pin yang telah terpakai</span>
                                            
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-2 control-label">Max Pencarian</label>
									<div class="col-md-10">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-home"></span></span>
											<input type="number" class="form-control" name="txtlimit" min="0"/>
										</div>                                            
										<span class="help-block">Maksimal pencarian</span>
									</div>
								</div>
							</div>							
						</div>

					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<div class="btn-group  pull-right">
                        <a class="btn btn-info" onclick="ModalTransPIN()">Kirim PIN</a>
						<button class="btn btn-primary">Tampilkan</button>
                        <!--a class="btn btn-success" onclick="showXLS()">Excel</a-->
                    </div>
				</div>
			</div>
		</form>
	</div>
					

<hr/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Data<strong> PIN RO</strong></h3>
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
							<th width="180px" align="center">Tanggal Pembuatan</th>
							<th width="100px" align="center">Produk</th>
							<th align="center">Kode Pin</th>
							<th align="right" width="120px">Harga</th>
							<th align="center" width="150px">Cabang</th>
							<th width="180px" align="center">Tanggal Penggunaan</th>
							<th align="center" width="150px">Nomor ID</th>
 						</tr>
					</thead>
				   <tfoot>
						<tr>
							<th colspan="3" style="text-align:right">Total </th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>

				</table>
			</div>
		</div>
	</div>
