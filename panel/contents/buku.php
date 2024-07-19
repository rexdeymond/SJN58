
	<div class="col-md-12">
		
		<form class="form-horizontal" name="lapdaftar" id="lapdaftar" method="post" onsubmit="return previewData()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Pembukuan</strong></h3>
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
										<span class="help-block">Tanggal awal transaksi pembukuan</span>
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
										<span class="help-block">Tanggal akhir transaksi pembukuan</span>
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


						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<div class="btn-group  pull-right">
						<a class="btn btn-info" onclick="ModalTransBuku('','','0')">Tambah Transaksi</a>
                        <button class="btn btn-primary">Tampilkan</button>
                        <a class="btn btn-success" onclick="showXLS()">Excel</a>
                    </div>
				</div>
			</div>
		</form>
	</div>
					

<hr/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Data </strong> Transaksi</h3>
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
							<th width="150px" align="center">Tanggal</th>
							<th align="center">Keterangan</th>
							<th align="right" width="150px">Debet</th>
							<th align="right" width="150px">Kredit</th>
							<th align="center" width="120px">Aksi</th>
 						</tr>
					</thead>
				   <tfoot>
						<tr>
							<th colspan="2" style="text-align:right">Total </th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="panel-footer">
				<button class="btn btn-info pull-right" onclick="ModalTransBuku('','','0')">Tambah Transaksi</button>
			</div>
		</div>
	</div>