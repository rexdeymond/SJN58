
	<div class="col-md-12">
		
		<form class="form-horizontal" name="pingenerate" id="pingenerate" method="post" onsubmit="return GeneratePin()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Pin Generator </strong> Produk</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        

					<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Produk</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-apple"></span></span>
										<select class="form-control select" data-live-search="true" name="slcproduk">
										<?php
										require_once("../include/koneksi.php");
										$sqlprd = "SELECT * FROM produk order by nama";
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
									<span class="help-block">Pilih jenis produk</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Pin Awal</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
										<input type="number" class="form-control"  min="0" max="99999" name="txtawal"/>

									</div>                                            
									<span class="help-block">No Serial Pin awal yang akan dibuat</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Pin Akhir</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
										<input type="number" class="form-control" min="0" max="99999" name="txtakhir"/>
									</div>                                            
									<span class="help-block">No Serial Pin terakhir yang akan dibuat</span>
								</div>
							</div>
						</div>
					</div>
			   </div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<button class="btn btn-info pull-right" >Generate</button>
				</div>
			</div>
		</form>
	</div>



					
<hr/>
	<div class="col-md-12">
		
		<form class="form-horizontal" name="pinaktif" id="pinaktif" method="post" onsubmit="return AktifasiPin()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Aktivasi Pin </strong> Produk</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        

					<div class="row">
						<div class="col-md-6">
							<div class="row">

								<div class="form-group">
									<label class="col-md-3 control-label">Pin Awal</label>
									<div class="col-md-9">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="number" class="form-control"  min="0" max="99999" name="txtawal"/>

										</div>                                            
										<span class="help-block">No Serial Pin awal yang akan diaktivasi</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group">
									<label class="col-md-3 control-label">Pin Akhir</label>
									<div class="col-md-9">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="number" class="form-control" min="0" max="99999" name="txtakhir"/>
										</div>                                            
										<span class="help-block">No Serial Pin terakhir yang akan diaktivasi</span>
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
												<option value="" >Pilih cabang</option>
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
									<label class="col-md-3 control-label">Produk</label>
									<div class="col-md-9">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-apple"></span></span>
											<select class="form-control select"  data-live-search="true" name="slcproduk">
											<?php
											require_once("../include/koneksi.php");
											$sqlprd = "SELECT * FROM produk order by nama";
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
										<span class="help-block">Pilih jenis produk</span>
									</div>
								</div>
								</div>

						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<button class="btn btn-primary pull-right">Aktivasi</button>
				</div>
			</div>
		</form>
	</div>
					

<hr/>
		<div class="col-md-12">
			
			<form class="form-horizontal" role="form" name="pindeaktif"  id="pindeaktif" method="post" onsubmit="return DeAktifPin()">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>De-Aktivasi Pin </strong> Produk</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
							<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>
					</div>
					<div class="panel-body">                                                                        
						<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Produk</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-apple"></span></span>
										<select class="form-control select"  data-live-search="true" name="slcproduk">
										<?php
										require_once("../include/koneksi.php");
										$sqlprd = "SELECT * FROM produk order by nama";
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
									<span class="help-block">Pilih jenis produk</span>
								</div>
							</div>
						</div>
							<div class="col-md-4">

								<div class="form-group">
									<label class="col-md-5 control-label">Pin Awal</label>
									<div class="col-md-7">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="number" class="form-control"  min="0" max="99999" name="txtawal"/>

										</div>                                            
										<span class="help-block">No Serial Pin awal yang akan di de-aktivasi</span>
									</div>
								</div>
							</div>
							<div class="col-md-4">

								<div class="form-group">
									<label class="col-md-5 control-label">Pin Akhir</label>
									<div class="col-md-7">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="number" class="form-control" min="0" max="99999" name="txtakhir"/>
										</div>                                            
										<span class="help-block">No Serial Pin terakhir yang akan di de-aktivasi</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default" type="reset">Batal</button>                                    
						<button class="btn btn-warning pull-right">De-Aktivasi</button>
					</div>
				</div>
			</form>
		</div>


		<div class="col-md-12">
			
			<form class="form-horizontal" role="form" name="pindelete" id="pindelete" method="post" onsubmit="return DeletePin()">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Hapus Pin </strong> Produk</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
							<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>
					</div>
					<div class="panel-body">                                                                        

						<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Produk</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-apple"></span></span>
										<select class="form-control select" data-live-search="true" name="slcproduk">
										<?php
										require_once("../include/koneksi.php");
										$sqlprd = "SELECT * FROM produk order by nama";
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
									<span class="help-block">Pilih jenis produk</span>
								</div>
							</div>
						</div>
							<div class="col-md-4">

								<div class="form-group">
									<label class="col-md-5 control-label">Pin Awal</label>
									<div class="col-md-7">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-up"></span></span>
											<input type="number" class="form-control"  min="0" max="99999" name="txtawal"/>

										</div>                                            
										<span class="help-block">No Serial Pin awal yang akan dihapus</span>
									</div>
								</div>
							</div>
							<div class="col-md-4">

								<div class="form-group">
									<label class="col-md-5 control-label">Pin Akhir</label>
									<div class="col-md-7">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-arrow-circle-down"></span></span>
											<input type="number" class="form-control" min="0" max="99999" name="txtakhir"/>
										</div>                                            
										<span class="help-block">No Serial Pin terakhir yang akan dihapus</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default" type="reset">Batal</button>                                    
						<button class="btn btn-danger pull-right">Hapus</button>
					</div>
				</div>
			</form>
		</div>
