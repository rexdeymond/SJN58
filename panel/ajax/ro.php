<?php
require_once("../../include/koneksi.php");
?>


<div id="ModalDaftar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalDaftarLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" name="frmdaftar" id="frmdaftar" onsubmit="return DaftarMhs()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalDaftarLabel">Pendaftaran Mahasiswa</h4>
        </div>
        <div class="modal-body">

                                    <p>Isilah data berikut dengan benar.</p>

                                    <div class="row">
                                        
                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nama</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        <input type="text" class="form-control" name="txtnama" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">Isilah nama lengkap Anda sesuai KTP</span>
                                                </div>
                                            </div>
                                                                                        
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">No KTP</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                                        <input type="text" class="form-control" name="txtnoiden" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor KTP yang masih berlaku</span>
                                                </div>
                                            </div>

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
                                                <label class="col-md-3 control-label">Kota / Kabupaten</label>
                                                <div class="col-md-9">                                                                                            
				<div id="kota">
					<?php
					if(isset($rsprf['noid']))
					{
					?>
						<select class="form-control select" name="slckota" id="slckota" onchange="showKecamatan()">
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
						<select class="form-control select" name="slckota" id="slckota" onchange="showKecamatan()">
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
                                                <label class="col-md-3 control-label">Kecamatan</label>
                                                <div class="col-md-9">                                                                                            
                                                    <div id="kecamatan">
					<?php
					if(isset($rsprf['noid']))
					{
					?>
						<select class="form-control select" name="slckecamatan" id="slckecamatan" onchange="showDesa()">
							<option value="">Pilih Kecamatan : </option>
							<?php
								$sqlcity = "SELECT kecamatan.kecamatan FROM kota,kecamatan WHERE kota.kota_id = kecamatan.kota_id and kota.kota=\"".$rsprf['kota']."\" order by kecamatan";
								$execity = mysqli_query($conn,$sqlcity);
								while($rscity = $execity->fetch_assoc())
								{
									?>
									<option value="<?=$rscity['kecamatan']?>"><?=$rscity['kecamatan']?></option>
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
                                                    <span class="help-block">Pilih Kecamatan</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Alamat</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea name="txtalamat" class="form-control" rows="5"></textarea>
                                                    <span class="help-block">Alamat lengkap Anda</span>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">PIN Pendaftaran</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-key"></span></span>
                                                        <input type="text" class="form-control" name="txtpin" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">PIN Pendaftaran</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Sponsor</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <input type="text" class="form-control" name="txtsponsor" id="txtsponsor" value="">
                                                    <span class="help-block">ID Sponsor</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Tanggal Lahir</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" name="txttgllahir" id="txttgllahir" value="">                                            
                                                    </div>
                                                    <span class="help-block">Tanggal Lahir Anda (Format YYYY-MM-DD)</span>
                                                </div>
                                            </div>
                                                                                        
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Agama</label>
                                                <div class="col-md-9">                                                                                            
                                                    <select class="form-control select" name="slcagama" id="slcagama">
                                                        <option VALUE="Islam">Islam</option>
                                                        <option VALUE="Kristen">Kristen</option>
                                                        <option VALUE="Katholik">Katholik</option>
                                                        <option VALUE="Hindu">Hindu</option>
                                                        <option VALUE="Budha">Budha</option>
                                                    </select>
                                                    <span class="help-block">Agama</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Jenis Kelamin</label>
                                                <div class="col-md-9">                                                                                            
                                                    <select class="form-control select" name="slcjkel" id="slcjkel">
                                                        <option VALUE="L" >Pria</option>
                                                        <option VALUE="P" >Wanita</option>
                                                    </select>
                                                    <span class="help-block">Jenis Kelamin Anda</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Telepon</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                        <input type="text" class="form-control" name="txttelp" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor telepon rumah</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">HP</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                                        <input type="text" class="form-control" name="txthp" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor telepon seluler</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">E-Mail</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                        <input type="text" class="form-control" name="txtemail" value=""/>
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
									?>
									<option value="<?=$rsbank['namabank']?>"><?=$rsbank['namabank']?></option>
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
                                                        <input type="text" class="form-control" name="txtnorek" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">Nomor Rekening</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Atas Nama</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                        <input type="text" class="form-control" name="txtan" value=""/>
                                                    </div>                                            
                                                    <span class="help-block">Atas Nama Rekening</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
		<div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  </div>
</div>
<script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script>
$(document).ready(function(){
	$('#slcpropinsi').selectpicker('refresh');
	$('#slckota').selectpicker('refresh');
	$('#slckecamatan').selectpicker('refresh');
	$('#slcagama').selectpicker('refresh');
	$('#slcjkel').selectpicker('refresh');
	$('#slcposisi').selectpicker('refresh');
	$('#slcbank').selectpicker('refresh');
	$('#txttgllahir').datepicker();
})


function showKota(){
	slcpropinsi = $("select[name=slcpropinsi]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kotaAJAX.php",
	chache		:	false,
	data		:	{ slcpropinsi : slcpropinsi},
	beforeSend: function()
					{
						$("#kota").html("<h3>Loading</h3>");
					},
	success		:	function(msg)
					{
						$("#kota").html(msg);
						$('#slckota').val("<?=isset($rsprf['kota'])?$rsprf['kota']:""?>");
						$('#slckota').selectpicker('refresh');
						
					},
	datatype	:	"html"
});
};

function showKecamatan(){
	slckota		= $("select[name=slckota]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kecamatanAJAX.php",
	chache		:	false,
	data		:	{ slckota : slckota},
	beforeSend: function()
					{
						$("#kecamatan").html("<h3>Loading</h3>");
					},
	success		:	function(msg)
					{
						$("#kecamatan").html(msg);
						$('#slckecamatan').val("<?=isset($rsprf['kecamatan'])?$rsprf['kecamatan']:""?>");
						$('#slckecamatan').selectpicker('refresh');
						//alert("<?=isset($rsprf['kecamatan'])?$rsprf['kecamatan']:""?>");
					},
	datatype	:	"html"
});
};

function showDesa(){
	slckecamatan = $("select[name=slckecamatan]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kelurahanAJAX.php",
	chache		:	false,
	data		:	{ slckecamatan : slckecamatan},
	beforeSend: function()
					{
						$("#kelurahan").html("<h3>Loading</h3>");
					},
	success		:	function(msg)
					{
						$("#kelurahan").html(msg);
						
					},
	datatype	:	"html"
	});
}

function DaftarMhs()
{
	var txt="";
	if (!(document.frmdaftar.txtnama.value.length>5))
	{
		txt=txt+"Nama terlalu pendek. ";
	}
	if (!(document.frmdaftar.txtnoiden.value.length>10))
	{
		txt=txt+"Nomor identitas harus diisi. ";
	}
	if (!(document.frmdaftar.txttgllahir.value.length==10))
	{
		txt=txt+"Tanggal lahir harus diisi. ";
	}
	if (!(document.frmdaftar.txtpin.value.length==13))
	{
		txt=txt+"Pin pendaftaran harus diisi. ";
	}
	if (!(document.frmdaftar.txtsponsor.value.length>10))
	{
		txt=txt+"Sponsor harus diisi. ";
	}
	if(txt!="")
	{
		noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
		return false;
	}
	else
	{
		$.ajax({
		type 		: "POST",
		url			: "actions.php?a=mhsdaftar",
		chache		:	false,
		data		:	$("#frmdaftar").serialize(),
		beforeSend: function()
						{
							//$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							if (msg.substring(0,11)=="<h4>Selamat"){
								ModalDialog("Pendaftaran Mahasiswa Berhasil",msg);
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
								//noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								//document.frmdaftar.reset();
							}
						},
		datatype	:	"html"
	});
	}
	return false;
}
$('#txtsponsor').typeahead({
	ajax: {
		url: 'jsone.php?t=agenlist&w=agen&search=',
		//method: 'post',
		//display:'kota',
	},
		hint:true,
		triggerLength: 1,
	//onSelect: function(){alert($('#txtsponsor').val());},
});

</script>