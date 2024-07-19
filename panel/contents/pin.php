
	<div class="col-md-12">
		
		
			<div class="panel panel-default tabs">
				<!--div class="panel-heading">
					<h3 class="panel-title"><strong>Pin Generator </strong> Produk</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div-->
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a href="#pingenerate" data-toggle="tab"><b>Buat Pin</b></a></li>
					<li><a href="#pinviewdel" data-toggle="tab"><b>Lihat / Hapus Pin</b></a></li>
				</ul>
				<div class="panel-body tab-content">                                                                        

			<!-- START JUSTIFIED TABS -->

					<div class="tab-pane active" id="pingenerate">
						<form class="form-horizontal" name="frmpingen" id="frmpingen" method="post" onsubmit="return GeneratePin()">
							<div class="row">
							<div class="col-md-6">
								<div class="row">

									<div class="form-group">
										<label class="col-md-3 control-label">Pin</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-apple"></span></span>
												<select class="form-control select" data-live-search="true" name="slcproduk">
												<option value="">- Pilih Pin -</option>
											<?php
											require_once("../include/koneksi.php");
											$sqlprd = "SELECT * FROM produk where publik=1 order by id ";
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
											<span class="help-block">Produk yang dipilih</span>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Jumlah</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
												<input type="number" class="form-control" min="0" max="99999" name="txtjumlah"/>
											</div>                                            
											<span class="help-block">Jumlah Pin yang akan dibuat</span>
										</div>
									</div>
								</div>

							</div>
							<div class="col-md-6">

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Cabang</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-home"></span></span>
												<select class="form-control select" name="slcnostok" id="slcnostok">
													<option value="" >- Pilih cabang -</option>
												<?php
												require_once("../include/koneksi.php");
												$sqlstokist = "SELECT * FROM stokist where publik=1 order by nostok";
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
											<span class="help-block">Pin ini untuk digunakan dicabang</span>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="panel-footer">
							<button class="btn btn-default" type="reset">Batal</button>                                    
							<button class="btn btn-info pull-right" >Generate</button>
						</div>
					
						</form>
					</div>
					<div class="tab-pane" id="pinviewdel">
						<form class="form-horizontal" name="pinview" id="pinview" method="post" onsubmit="return previewData(document.pinview.txttgl.value,document.pinview.txttgl.value,document.pinview.slcproduk.value,document.pinview.slcnostok.value,document.pinview.txtjumlah.value,0)">
							<div class="row">
							<div class="col-md-6">

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Tanggal</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												<input type="text" class="form-control datepicker" name="txttgl" value="<?=date("Y-m-d")?>" />
											</div>                                            
											<span class="help-block">Tanggal pembuatan Pin</span>
										</div>
									</div>
								</div>

								<div class="row">

									<div class="form-group">
										<label class="col-md-3 control-label">Pin</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-apple"></span></span>
												<select class="form-control select" data-live-search="true" name="slcproduk">
												<option value="">- Pilih Pin -</option>
											<?php
											require_once("../include/koneksi.php");
											$sqlprd = "SELECT * FROM produk where publik=1 order by id ";
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
											<span class="help-block">Produk yang dipilih</span>
										</div>
									</div>
								</div>
								

							</div>
							<div class="col-md-6">

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Cabang</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-home"></span></span>
												<select class="form-control select" name="slcnostok" id="slcnostok">
													<option value="ytuytg" >- Pilih cabang -</option>
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
											<span class="help-block">Pin ini untuk digunakan dicabang</span>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Jumlah</label>
										<div class="col-md-9">                                            
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
												<input type="number" class="form-control" min="0" max="99999" name="txtjumlah" value="99999"/>
											</div>                                            
											<span class="help-block">Jumlah Pin yang ditampilkan</span>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="panel-footer">
							<button class="btn btn-default" type="reset">Batal</button>                                    
							<div class="btn-group pull-right">
								<a class="btn btn-danger" onclick="ConfirmDialog(&quot;Hapus PIN?&quot;,&quot; Yakin ingin menghapus PIN &quot;+document.pinview.slcproduk.value+&quot; sebanyak &quot;+document.pinview.txtjumlah.value+&quot;?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;DelPin()&quot;)" >Delete</a>
								<button class="btn btn-info" >View</button>
								<a class="btn btn-success" onclick="showXLS()" >Excel</a>
							</div>
						</div>
					
						</form>
					</div>                        

			<!-- END JUSTIFIED TABS -->

			</div>

			</div>
		
	</div>

<hr/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Data PIN </strong></h3>
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
							<th align="center" width="120px">Harga</th>
							<th align="center" width="150px">Cabang</th>
							<th align="center" width="150px">Nomor ID</th>
 						</tr>
					</thead>

				    <tfoot>
						<tr>
							<th colspan="3" style="text-align:right">Total </th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>

				</table>
			</div>
		</div>
	</div>
