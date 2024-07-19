<?php 
session_start();
?>
<div id="ModalTransPIN" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalTransPINLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-m">
      <div class="modal-content">
<?php 
$s=isset($_GET['s'])?$_GET['s']:"1";
require_once("../../include/koneksi.php");
	if($s==3)
	{
		$q="call spTransferPIN('".$_POST['slcnostok']."','".substr($_POST['txtnoid'],0,10)."','".$_POST['slcproduk']."','".$_POST['txtjumlah']."','".$_SESSION['sjn58']."')";
		$rsq=mysqli_query($conn,$q)or die(mysqli_error($conn));
		$data = mysqli_fetch_assoc($rsq) ;
		?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalTransPINLabel">Transfer PIN <?=$s?></h4>
        </div>
        <div class="modal-body">
			<?=$data['Msg']?>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
        </div>
		<?php
	}
	elseif($s==2)
	{

		$sqlprd = "SELECT *,fnGetProdukNama(kdbrg)nama FROM pin where publik=1 and nostok='".$_POST['slcnostok']."' and kdbrg='".$_POST['slcproduk']."' ORDER BY created,`no` limit ".$_POST['txtjumlah'].";";
		$rsprd = mysqli_query($conn,$sqlprd);
		if($rsprd->num_rows==$_POST['txtjumlah']){

?>
		<form class="form-horizontal" name="frmtranspin" id="frmtranspin" onsubmit="return TransferPIN()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalTransPINLabel">Transfer PIN <?=$s?></h4>
        </div>
        <div class="modal-body">

			<p>Klik tombol kirim bila data telah sesuai</p>
			<input type="hidden" name="txtnoid"   id="txtnoid"   value="<?=$_POST['txtnoid']?>">
			<input type="hidden" name="slcproduk" id="slcproduk" value="<?=$_POST['slcproduk']?>">
			<input type="hidden" name="txtjumlah" id="txtjumlah" value="<?=$_POST['txtjumlah']?>">
			<input type="hidden" name="slcnostok" id="slcnostok" value="<?=$_POST['slcnostok']?>">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Cabang</div>
					<div class="col-md-9"><b><?=$_POST['slcnostok']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Member</div>
					<div class="col-md-9"><b><?=$_POST['txtnoid']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Produk</div>
					<div class="col-md-9"><b><?=$_POST['slcproduk']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Jumlah</div>
					<div class="col-md-9"><b><?=$_POST['txtjumlah']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Pin yang akan dikirim :</div>
					<div class="col-md-9">

<?php 
$i=1;
		while($data = $rsprd->fetch_assoc()){
			echo $i. " <b>".$data['kodepin']."</b><br/>";
			$i++;
		}

?>
					</div>
			</div>
		</div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary pull-right">Kirim</button>
        </div>
		</form>
<?php
		} else {
?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalTransPINLabel">Pengiriman PIN Gagal !</h4>
        </div>
        <div class="modal-body">

			<h1>Mohon maaf, produk tidak ada atau stock tidak mencukupi</h1>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Tutup</button>
        </div>
<?php	
		}
	}
	elseif($s==1){
?>
		<form class="form-horizontal" name="frmtranspin" id="frmtranspin" onsubmit="return TransferPIN()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalTransPINLabel">Transfer PIN <?=$s?></h4>
        </div>
        <div class="modal-body">

			<p>Transfer PIN.</p>

			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label">Cabang</label>
					<div class="col-md-8 col-xs-12">                                            
							<select class="form-control select"  name="slcnostok"><?php
								$sqlstok = "SELECT nostok,nama FROM `stokist` WHERE publik=1 and nostok like fnGetUserAksesNostok('".$_SESSION['sjn58']."')";
								$rsstok = mysqli_query($conn,$sqlstok);
								while($dtstok = $rsstok->fetch_assoc())
								{
							?>
									<option value="<?=$dtstok["nostok"]?>"><?=$dtstok["nostok"]." - ".$dtstok["nama"]?></option>
							<?php
								}
							?>
									</select>
							<span class="help-block">Cabang</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label">Produk</label>
					<div class="col-md-8 col-xs-12">
							<select class="form-control select"  name="slcproduk"><?php
								$sqlprd = "SELECT DISTINCT kdbrg,fnGetProdukNama(kdbrg) namabrg FROM `pin` WHERE publik=1 and nostok like fnGetUserAksesNostok('".$_SESSION['sjn58']."')";
								$rsprd = mysqli_query($conn,$sqlprd);
								while($data = $rsprd->fetch_assoc())
								{
							?>
									<option value="<?=$data["kdbrg"]?>"><?=$data["kdbrg"]." - ".$data["namabrg"]?></option>
							<?php
								}
							?>
									</select>
							<span class="help-block">Produk</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label">Jumlah</label>
					<div class="col-md-8 col-xs-12">                                            
							<input type="number" class="form-control" min=1 max=100 name="txtjumlah" id="txtjumlah" value="1" >
							<span class="help-block">Jumlah PIN</span>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label">Member</label>
					<div class="col-md-8 col-xs-12">                                            
							<input type="text" class="form-control" name="txtnoid" id="txtnoid"  value="">
							<span class="help-block">dikirim ke member</span>
					</div>
				</div>
			</div>

		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary pull-right">Selanjutnya</button>
        </div>
		</form>

<?php 
}
?>		
		
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  </div>
</div>
<script>


function TransferPIN()
{
	var txt="";

	if (!(document.frmtranspin.txtjumlah.value>=1))
	{
		txt=txt+"Jumlah pin harus diisi. ";
	}
	if (!(document.frmtranspin.txtnoid.value.length>=12))
	{
		txt=txt+"Noid member harus diisi. ";
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
		url			: "ajax/transpinAJAX.php?s=<?=($s+1)?>",
		chache		:	false,
		data		:	$("#frmtranspin").serialize(),
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalTransPIN').modal('show');
						},
		datatype	:	"html"
	});
	}
	return false;
}
$('#txtnoid').typeahead({
	ajax: {
		url: 'jsone.php?t=memberlist&w=member&search=',
		//method: 'post',
		//display:'kota',
	},
		hint:true,
		triggerLength: 1,
	//onSelect: function(){alert($('#txtnoid').val());},
});

</script>