                            <!-- START WIZARD WITH VALIDATION -->
                            <div class="block">
                                <h4>Pendaftaran Anggota</h4>                                
                                <form action="javascript:alert('Validated!');" role="form" class="form-horizontal" id="wizard-validation">
                                <div class="wizard show-submit wizard-validation">
                                    <ul>
                                        <li>
                                            <a href="#step-7">
                                                <span class="stepNumber">1</span>
                                                <span class="stepDesc">PIN<br /><small>Pin Pendaftaran</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-8">
                                                <span class="stepNumber">2</span>
                                                <span class="stepDesc">Data<br /><small>Personal data</small></span>
                                            </a>
                                        </li>                                    
                                        <li>
                                            <a href="#step-9">
                                                <span class="stepNumber">3</span>
                                                <span class="stepDesc">Login<br /><small>Data Login</small></span>
                                            </a>
                                        </li>                                    
                                    </ul>

                                    <div id="step-7">   

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">PIN Pendaftaran</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="pin" placeholder="PIN Pendaftaran"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="step-8">

                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nama</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isilah nama lengkap Anda sesuai KTP</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">No KTP</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor KTP yang masih berlaku</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Propinsi</label>
                                                <div class="col-md-9">                                                                                            
													<select class="form-control select" name="slcpropinsi" onchange="showKota()">
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
                                                    <!--select class="form-control select">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select-->
                                                    <span class="help-block">Pilih Propinsi</span>
                                                </div>
                                            </div>
 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Kota/Kabupaten</label>
                                                <div class="col-md-9">                                                                                            
				<div id="kota">
					<?php
					if(isset($_GET['no']))
					{
					?>
						<select class="form-control select" name="slckota" id="slckota" onchange="showKecamatan()">
							<option value="">Pilih Kota : </option>
							<?php
								$sqlcity = "SELECT kota.kota FROM kota,propinsi WHERE kota.propinsi_id = propinsi.propinsi_id and propinsi.propinsi=\"".$strpropinsi."\" order by SUBSTRING( `kota` , 6 )";
								$execity = mysqli_query($conn,$sqlcity);
								while($rscity = $execity->fetch_assoc())
								{
									if($rscity['kota']==$strkota)
									{
										$selected = "SELECTED";
									}
									else
									{
										$selected = "";
									}
									?>
									<option <?=$selected?> value="<?=$rscity['kota']?>"><?=$rscity['kota']?></option>
									<?php
								}
							?>
						</select>
					<?php
					}
					else
					{
					?>
						<select class="form-control select" name="slckota" id="slckota" onchange="showKecamatan()">
						<option value="">Pilih Kota : </option>
						</select>
					<?php
					}
					?>
				</div>
                                                    <!--select class="form-control select">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select-->
                                                    <span class="help-block">Pilih Kota</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Kecamatan</label>
                                                <div class="col-md-9">                                                                                            
                                                    <div id="kecamatan">
					<?php
					if(isset($_GET['no']))
					{
					?>
						<select class="form-control select" name="slckecamatan" id="slckecamatan" onchange="showDesa()">
							<option value="">Pilih Kecamatan : </option>
							<?php
								$sqlcity = "SELECT kecamatan.kecamatan FROM kota,kecamatan WHERE kota.kota_id = kecamatan.kota_id and kota.kota=\"".$strkota."\" order by kecamatan";
								$execity = mysqli_query($conn,$sqlcity);
								while($rscity = $execity->fetch_assoc())
								{
									if($rscity['kecamatan']==$strkecamatan)
									{
										$selected = "SELECTED";
									}
									else
									{
										$selected = "";
									}
									?>
									<option <?=$selected?> value="<?=$rscity['kecamatan']?>"><?=$rscity['kecamatan']?></option>
									<?php
								}
							?>
						</select>
					<?php
					}
					else
					{
					?>
						<select class="form-control select" name="slckecamatan" id="slckecamatan" onchange="showDesa()">
						<option value="">Pilih Kecamatan : </option>
						</select>
					<?php
					}
					?>
				</div>
												<!--select class="form-control select">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select--->
                                                    <span class="help-block">Pilih Kecamatan</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Alamat</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5"></textarea>
                                                    <span class="help-block">Alamat lengkap Anda</span>
                                                </div>
                                            </div>
                                            

                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Tanggal Lahir</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" value="2014-11-01">                                            
                                                    </div>
                                                    <span class="help-block">Tanggal Lahir Anda (Format YYYY-MM-DD)</span>
                                                </div>
                                            </div>
                                                                                        
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Agama</label>
                                                <div class="col-md-9">                                                                                            
                                                    <select class="form-control select">
                                                        <option>Islam</option>
                                                        <option>Kristen</option>
                                                        <option>Katholik</option>
                                                        <option>Hindu</option>
                                                        <option>Budha</option>
                                                    </select>
                                                    <span class="help-block">Agama Anda</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Jenis Kelamin</label>
                                                <div class="col-md-9">                                                                                            
                                                    <select class="form-control select">
                                                        <option>Pria</option>
                                                        <option>Wanita</option>
                                                    </select>
                                                    <span class="help-block">Jenis Kelamin Anda</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Telepon</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor telepon rumah</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">HP</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor telepon seluler</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">E-Mail</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Alamat e-mail Anda</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">BANK</label>
                                                <div class="col-md-9">                                                                                            
 						<select class="form-control select" name="slcbank" id="slcbank" >
							<option value="">Pilih Bank : </option>
							<?php
								$sqlbank = "SELECT * from bank ";
								$exebank = mysqli_query($conn,$sqlbank);
								while($rsbank = $exebank->fetch_assoc())
								{
									if($rsbank['namabank']==$strbank)
									{
										$selected = "SELECTED";
									}
									else
									{
										$selected = "";
									}
									?>
									<option <?=$selected?> value="<?=$rsbank['namabank']?>"><?=$rsbank['namabank']?></option>
									<?php
								}
							?>
						</select>
                                                    <span class="help-block">Bank</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nomor Rekening</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor Rekening</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Atas Nama</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                        <input type="text" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Atas Nama Rekening</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                                   

                                    </div>                                    
									<div id="step-9">   

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Login</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="aalogin" placeholder="Login"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="password" placeholder="Password" id="password"/>
                                            </div>
                                        </div>             
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Re-Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="repassword" placeholder="Re-Password"/>
                                            </div>
                                        </div>

                                    </div>
                                                                                                            
                                </div>
                                </form>
                            </div>                        
                            <!-- END WIZARD WITH VALIDATION -->
