
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Input </strong> Cabang</h3>
                <ul class="panel-controls">
                    <li title="Fullscreen" ><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li title="Minimize" ><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li title="Close" ><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">                                                                        
            <form class="form-horizontal" name="frmcabang" id="frmcabang" method="post" onsubmit="return SaveCabang()">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Kode Cabang</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-key"></span></span>
                            <input type="text" class="form-control" name="txtnostok" id="txtnostok" value="">
                        </div>
                        <span class="help-block">Kode cabang</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Nama Cabang</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-tag"></span></span>
                            <input type="text" class="form-control" name="txtnama" id="txtnama" value="">
                        </div>                                            
                        <span class="help-block">Nama Cabang</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Nomor ID</label>
                    <div class="col-md-9">                                                                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-money"></span></span>
                            <input type="text" class="form-control" id="txtnoid" name="txtnoid" value=""/>
                        </div>
                        <span class="help-block">Nomor ID Penanggungjawab</span>
                    </div>
                </div>

               <div class="form-group">
                    <label class="col-md-3 control-label">Telp</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                            <input type="text" class="form-control" name="txttelp" id="txttelp" value="">
                        </div>                                            
                        <span class="help-block">Nomor Telepon Cabang</span>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-3 control-label">E-Mail</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                            <input type="text" class="form-control" name="txtmail" id="txtmail" value="">
                        </div>                                            
                        <span class="help-block">E-Mail Cabang</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                    <label class="col-md-3 control-label">Propinsi</label>
                    <div class="col-md-9">  
													<select class="form-control select" name="slcpropinsi" id="slcpropinsi" onchange="showKota()">
													<option value=""><i>Pilih Provinsi : </i></option>
														<?php
														$sqlstate = "select * from propinsi order by propinsi";
														$execstate = mysqli_query($conn,$sqlstate);
														while($rsstate = $execstate->fetch_assoc())
														{
															?>
															<option value="<?=$rsstate['propinsi']?>"><?=$rsstate['propinsi']?></option>
															<?php
														}
														?>
													</select>
                                                    <span class="help-block">Pilih Propinsi</span>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-3 control-label">Kota</label>
                    <div class="col-md-9">  
				<div id="kota">
					<?php
					if(isset($rsprf['noid']))
					{
					?>
						<select class="form-control select" name="slckota" id="slckota">
							<option value="">Pilih Kota : </option>
							<?php
								$sqlcity = "SELECT kota.kota FROM kota,propinsi WHERE kota.propinsi_id = propinsi.propinsi_id and propinsi.propinsi=\"".$rsprf['propinsi']."\" order by SUBSTRING( `kota` , 6 )";
								$execity = mysqli_query($conn,$sqlcity);
								while($rscity = $execity->fetch_assoc())
								{
									?>
									<option value="<?=$rscity['kota']?>"><?=$rscity['kota']?></option>
									<?php
								}
							?>
						</select>
					<?php
					}
					else
					{
					?>
						<select class="form-control select" name="slckota" id="slckota">
						<option value="">Pilih Kota : </option>
						</select>
					<?php
					}
					?>
				</div>

                                                    <span class="help-block">Pilih Kota</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Alamat</label>
                    <div class="col-md-9 col-xs-12">                                            
                        <textarea name="txtalamat" id="txtalamat" class="form-control" rows="5"></textarea>
                        <span class="help-block">Alamat kantor cabang</span>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-3 control-label">Publik</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <input type="checkbox" name="chkpublik" id="chkpublik" value="1">
                        </div>                                            
                        <span class="help-block">Cabang Aktif </span>
                    </div>
                </div>                
            </div>                       
        </div>
                <div class="panel-footer">
                    <button type="reset" class="btn btn-default" >Batal</button>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
            </form>
    </div>
</div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>List </strong> Cabang</h3>
                <ul class="panel-controls">
                    <li title="Fullscreen" ><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li title="Refresh" onclick="previewData()"><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li title="Minimize" ><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li title="Close" ><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body table-responsive">                                                                        
                <table id="TabelCabang" class="table datatable table-striped table-hover dt-responsive display nowrap">
                    <thead>
                        <tr>
                            <th width="120px" align="center">Kode</th>
                            <th width="120px" align="center">Nama</th>
                            <th width="120px" align="center">Noid</th>
                            <th align="center">Kota</th>
                            <th align="center">Propinsi</th>
                            <th align="center" width="120px">Jumlah Member</th>
                            <th align="center" width="120px">Stock Pin</th>
                            <th align="center" width="120px">Pin Terpakai</th>
                            <th align="center" width="120px">Aksi</th>
                        </tr>
                    </thead>

                </table>
            </div>
            <div class="panel-footer">
            </div>          

        </div>
    </div>
