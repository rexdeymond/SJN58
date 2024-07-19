<?php
session_start();
require_once("../../include/koneksi.php");
?>

<div id="ModalDaftar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalDaftarLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" name="frmdaftar" id="frmdaftar" onsubmit="return DaftarMember()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalDaftarLabel">Pendaftaran Member</h4>
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
                                                <label class="col-md-3 control-label">Password</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control"  name="txttgllahir" id="txttgllahir" value="">                                            
                                                    </div>
                                                    <span class="help-block">Sandi Login anda (password)</span>
                                                </div>
                                            </div>
											

                                           <div class="form-group">
                                                <label class="col-md-3 control-label">Telepon</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                        <input type="text" class="form-control" name="txttelp" value=""/>
                                                    </div>
                                                    <span class="help-block">Nomor telepon</span>
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
                                                <label class="col-md-3 control-label">Alamat</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea name="txtalamat" class="form-control" rows="5"></textarea>
                                                    <span class="help-block">Alamat lengkap Anda</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            
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
                                                <label class="col-md-3 control-label">Presenter</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <input type="text" class="form-control" name="txtpresenter" id="txtpresenter" value="<?=$_SESSION['referal']<>""?$_SESSION['referal']:''?>">
                                                    <span class="help-block">ID Presenter</span>
                                                </div>
                                            </div>
										
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Sponsor</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <input type="text" class="form-control" name="txtsponsor" id="txtsponsor" <?=$_SESSION['referal']<>""?' readonly ':''?>value="<?=$_SESSION['referal']<>""?$_SESSION['referal']:''?>">
                                                    <span class="help-block">ID Sponsor</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Upline</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <input type="text" class="form-control" name="txtupline" id="txtupline" value="<?=$_SESSION['referal']<>""?$_SESSION['referal']:''?>">
                                                    <span class="help-block">ID Upline</span>
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
                                            <div class="form-group" id="statusdaftar">
                                                
                                            </div>

                                            <!--div class="form-group">
                                                <label class="col-md-3 control-label">Posisi</label>
                                                <div class="col-md-9">                                                                                            
                                                    <select class="form-control select" name="slcposisi" id="slcposisi" onchange="showJaringan()">
                                                        <option VALUE="1">1</option>
                                                        <option VALUE="2">2</option>
                                                        <option VALUE="3">3</option>
                                                        <option VALUE="4">4</option>
                                                        <option VALUE="5">5</option>
                                                    </select>
                                                    <span class="help-block">Posisi Member di jaringan</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
											<div class="col-md-12"  name="ilustrasi" id="ilustrasi"> 
                                                <img width="100%" src="../img/0.png" />
                                            </div>
											</div-->
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
	//$('#slcposisi').selectpicker('refresh');
	$('#slcbank').selectpicker('refresh');
	//$('#slcposisi').val("<?=$_POST['posisi']?>");
	//$('#slcposisi').selectpicker('refresh');
	//showJaringan();

})
/*
function showJaringan(){
	slcposisi = $("select[name=slcposisi]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/ilusJarAJAX.php",
	chache		:	false,
	data		:	{ slcposisi : slcposisi},
	beforeSend: function()
					{
						$("#ilustrasi").html("<img width='100%' src='../img/0.png' />");
					},
	success		:	function(msg)
					{
						$("#ilustrasi").html(msg);
						
					},
	datatype	:	"html"
});
};
*/

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

function DaftarMember()
{
	var txt="";
	if (!(document.frmdaftar.txtnama.value.length>0))
	{
		txt=txt+"Nama terlalu pendek. ";
	}
	if (!(document.frmdaftar.txttgllahir.value.length>5))
	{
		txt=txt+"Password harus lebih dari 6. ";
	}
	if (!(document.frmdaftar.txtpin.value.length>=12))
	{
		txt=txt+"Pin pendaftaran harus diisi. ";
	}
	if (!(document.frmdaftar.txtpresenter.value.length>9))
	{
		txt=txt+"Presenter harus diisi. ";
	}
	if (!(document.frmdaftar.txtsponsor.value.length>9))
	{
		txt=txt+"Sponsor harus diisi. ";
	}
	if (!(document.frmdaftar.txtupline.value.length>9))
	{
		txt=txt+"Upline harus diisi. ";
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
		url			: "actions.php?a=memberdaftar",
		chache		:	false,
		data		:	$("#frmdaftar").serialize(),
		beforeSend: function()
						{
							$("#statusdaftar").html("<img src='img/loaders/default.gif'> Menyimpan data.... mohon tunggu sebentar....");
						},
		success		:	function(msg)
						{
							$("#statusdaftar").html("");
							if (msg.substring(0,11)=="<h4>Selamat"){
								ModalDialog("Pendaftaran Member Berhasil",msg);
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
$('#txtpresenter').typeahead({
	ajax: {
		url: 'jsone.php?t=memberlist&w=member&search=',
		//method: 'post',
		//display:'kota',
	},
		hint:true,
		triggerLength: 1,
	//onSelect: function(){alert($('#txtsponsor').val());},
});
$('#txtsponsor').typeahead({
	ajax: {
		url: 'jsone.php?t=memberlist&w=member&search=',
		//method: 'post',
		//display:'kota',
	},
		hint:true,
		triggerLength: 1,
	//onSelect: function(){alert($('#txtsponsor').val());},
});
$('#txtupline').typeahead({
	ajax: {
		url: 'jsone.php?t=uplinelist&j=<?=$_SESSION['referal']?>&w=member&search=',
		//method: 'post',
		//display:'kota',
	},
		hint:true,
		triggerLength: 1,
	//onSelect: function(){alert($('#txtsponsor').val());},
});

</script>