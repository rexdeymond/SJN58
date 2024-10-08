<?php
session_start();
require_once("../../include/koneksi.php");
$wdnoid=isset($_GET['noid'])?$_GET['noid']:(isset($_POST['noid'])?$_POST['noid']:"");
$tgl=isset($_GET['tgl'])?$_GET['tgl']:(isset($_POST['tgl'])?$_POST['tgl']:"");
$ket=isset($_GET['ket'])?$_GET['ket']:(isset($_POST['ket'])?$_POST['ket']:"");
$nominal=str_replace(",","",isset($_GET['nominal'])?$_GET['nominal']:(isset($_POST['nominal'])?$_POST['nominal']:0));


$sqlwd = "SELECT * FROM bwidraw where tanggal='".$tgl."' AND noid='".$wdnoid."' AND nominal='".$nominal."' ";
$rswd = mysqli_query($conn,$sqlwd);
$wd = $rswd->fetch_assoc();

$bank=$wd['bank']!=''?$wd['bank']:$member['bank'];
$rek=$wd['norek']!=''?$wd['norek']:$member['norek'];
$atasnama=$wd['atasnama']!=''?$wd['atasnama']:$member['atasnama'];
$totbonus=$member['totbonus'];$totwidraw=$member['totwidraw'];
$maxwd=$totbonus-$totwidraw;
?>

<div id="ModalTransaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalTransaksiLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" name="frmTransaksi" id="frmTransaksi" onsubmit="return SimpanWD()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalTransaksiLabel">Penarikan Dana</h4>
        </div>
        <div class="modal-body">

			<p>Penarikan Dana akan ditransfer maksimal H+3 setelah pengajuan.</p>
			<input type="hidden" name="txttgl" value="<?=$tgl?>"/>

			<div class="row">
				
				<div class="col-md-4">					
					<div class="form-group">
						<label class="col-md-3 control-label">Tanggal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<input type="text" class="form-control" name="txttgl" value="<?=$tgl?>" readonly style="color: black;" />
							</div>
							<span class="help-block">Tanggal Pengajuan</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="col-md-3 control-label">NOID</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-tag"></span></span>
								<input type="text" class="form-control" name="txtnoid" value="<?=$wdnoid?>" readonly style="color: black;" />
							</div>
							<span class="help-block">Nomor ID Anggota</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="col-md-3 control-label">Nama</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-tag"></span></span>
								<input type="text" class="form-control" name="txtnama" value="<?=$atasnama?>" readonly style="color: black;" />
							</div>                                            
							<span class="help-block">Nilai Transaksi</span>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">					
					<div class="form-group">
						<label class="col-md-3 control-label">Bank</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-dollar"></span></span>
								<input type="text" class="form-control" name="txtbank" value="<?=$bank?>" readonly style="color: black;" />
							</div>
							<span class="help-block">Bank</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="col-md-3 control-label">Nomor Rekening</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-dollar"></span></span>
								<input type="text" class="form-control" name="txtnorek" value="<?=$rek?>" readonly style="color: black;" />
							</div>
							<span class="help-block">Nomor Rekening</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="col-md-3 control-label">Nominal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-dollar"></span></span>
								<input type="text" class="form-control" name="txtrp" value="<?=$nominal?>" readonly style="color: black;" />
							</div>                                            
							<span class="help-block">Nilai Transaksi</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">					
					<div class="form-group">
						<label class="col-md-1 control-label">Atas Nama</label>
						<div class="col-md-11">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-money"></span></span>
								<input type="text" class="form-control" name="txtan" value="<?=$atasnama?>" readonly style="color: black;"/>
							</div>                                            
							<span class="help-block">Atas Nama Rekening</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">					
					<div class="form-group">
						<label class="col-md-3 control-label">Status</label>
						<div class="col-md-9">                                                                                            
							<select class="form-control select" name="slcstatus" id="slcstatus" >
								<option value="0">Pending </option>
								<option value="1">Diproses </option>
								<option value="2">Ditransfer </option>
								<option value="-1">Gagal </option>
	
							</select>
							<span class="help-block">Status</span>
						</div>
					</div>
				</div>
				<div class="col-md-8">					
					<div class="form-group">
						<label class="col-md-2 control-label">Keterangan</label>
						<div class="col-md-10">                                                                                            
							<input type="text" class="form-control" name="txtket" value="<?=$wd['ket']?>" style="color: black;"/>

							<span class="help-block">Keterangan</span>
						</div>
					</div>
				</div>					
				</div>

			</div>
		<div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
	$('select[name=slcbank]').val("<?=$bank?>");
	$('select[name=slcbank]').selectpicker('refresh');

	$('select[name=slcstatus]').val("<?=$wd['status']?>");
	$('select[name=slcstatus]').selectpicker('refresh');

})

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}


function SimpanWD()
{
	var txt="";
	if (!(document.frmTransaksi.txtnorek.value.length>5))
	{
		txt=txt+"Nomor rekening harus diisi. ";
	}
	if (!(replaceAll(document.frmTransaksi.txtrp.value,',','')>0))
	{
		txt=txt+"Nominal transaksi harus diisi. ";
	}
	if (!(document.frmTransaksi.txtan.value.length>5))
	{
		txt=txt+"Atas nama rekening terlalu pendek. ";
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
		url			: "actions.php?a=widrawproses",
		chache		:	false,
		data		:	$("#frmTransaksi").serialize(),
		beforeSend: function()
						{
							//$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							if (msg.substring(0,7)=="Selamat"){
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								previewData();
								$('#ModalTransaksi').modal('hide');

								//ModalDialog("Transaksi berhasil disimpan",msg);
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
								//noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								//document.frmTransaksi.reset();
							}
						},
		datatype	:	"html"
	});
	}
	return false;
}

</script>