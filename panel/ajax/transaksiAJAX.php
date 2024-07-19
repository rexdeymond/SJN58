<?php
require_once("../../include/koneksi.php");
$tgl=isset($_GET['tgl'])?$_GET['tgl']:(isset($_POST['tgl'])?$_POST['tgl']:"");
$ket=isset($_GET['ket'])?$_GET['ket']:(isset($_POST['ket'])?$_POST['ket']:"");
$nominal=isset($_GET['nominal'])?$_GET['nominal']:(isset($_POST['nominal'])?$_POST['nominal']:0);
if($nominal>0)
{$tipe="D";}
else
{$tipe="K";$nominal=$nominal*-1;}

?>

<div id="ModalTransaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalTransaksiLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" name="frmTransaksi" id="frmTransaksi" onsubmit="return SimpanTransaksi()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalTransaksiLabel">Input Transaksi Lainnya</h4>
        </div>
        <div class="modal-body">

			<p>Input transaksi rutin.</p>

			<div class="row">
				
				
				<div class="col-md-4">					
					<div class="form-group">                                        
						<label class="col-md-3 control-label">Tanggal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" name="txttgl" id="txttgl" <?=$tgl<>""?"readonly":""?> value="<?=$tgl?>" />                                            
							</div>
							<span class="help-block">Tanggal (Format YYYY-MM-DD)</span>
						</div>
					</div>
				</div>
					
					
				<div class="col-md-4">					
					<div class="form-group">
						<label class="col-md-3 control-label">Jenis</label>
						<div class="col-md-9">
							<select class="form-control select" name="slcjtrans" id="slcjtrans">
								<option VALUE="D" >Debet</option>
								<option VALUE="K" >Kredit</option>
							</select>
							<span class="help-block">Jenis Transaksi</span>
						</div>
					</div>
				</div>


				<div class="col-md-4">					
					<div class="form-group">
						<label class="col-md-3 control-label">Nominal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
								<input type="text" class="form-control" name="txtrp" value="<?=$nominal?>" onfocus="this.value=replaceAll(this.value,',','')" onblur="this.value=addCommas(this.value)"/>
							</div>                                            
							<span class="help-block">Nilai Transaksi</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">					
					<div class="form-group">
						<label class="col-md-1 control-label">Keterangan</label>
						<div class="col-md-11">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
								<input type="text" class="form-control" name="txttrans"  <?=$tgl<>""?"readonly":""?> value="<?=$ket?>"/>
							</div>                                            
							<span class="help-block">Penjelasan tentang transaksi</span>
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
	$('select[name=slcjtrans]').val("<?=$tipe?>");
	$('#slcjtrans').selectpicker('refresh');
	<?=$tgl<>""?"":"$('#txttgl').datepicker();"?>
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


function SimpanTransaksi()
{
	var txt="";
	if (!(document.frmTransaksi.txttgl.value.length==10))
	{
		txt=txt+"Tanggal transaksi harus diisi. ";
	}
	if (!(replaceAll(document.frmTransaksi.txtrp.value,',','')>0))
	{
		txt=txt+"Nominal transaksi harus diisi. ";
	}
	if (!(document.frmTransaksi.txttrans.value.length>5))
	{
		txt=txt+"Keterangan transaksi terlalu pendek. ";
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
		url			: "actions.php?a=transaksi",
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