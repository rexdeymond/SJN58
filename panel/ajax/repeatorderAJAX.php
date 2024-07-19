
<div id="ModalRO" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalROLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
<?php 
$s=isset($_GET['s'])?$_GET['s']:"0";
if (isset($_POST['txtproduk'])){
	if($s==0){$s=1;}
	require_once("../../include/koneksi.php");
	if($s==2)
	{
		$q="call spROMember('".substr($_POST['txtnoid'],0,10)."','".$_POST['txtproduk']."')";
		$rsq=mysqli_query($conn,$q)or die(mysqli_error($conn));
		$data = mysqli_fetch_assoc($rsq) ;
		?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalROLabel">Repeat Order Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">
			<?=$data['Msg']?>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
        </div>
		<?php
	}
	elseif($s==1)
	{
		$qa="SELECT * FROM member WHERE noid='".substr($_POST['txtnoid'],0,10)."' LIMIT 1";
		$qp="SELECT p.*,fnGetProdukNama(p.kdbrg) produk FROM `pin` p,produk k WHERE k.kdbrg=p.kdbrg AND k.publik=1 AND k.register=0 AND IFNULL(nostok,'')<>'' AND IFNULL(noid,'')='' AND kodepin='".$_POST['txtproduk']."'";
		$rsqa=mysqli_query($conn,$qa)or die(mysqli_error($conn));
		$rsqp=mysqli_query($conn,$qp)or die(mysqli_error($conn));
		$nqa=$rsqa->num_rows;
		$nqp=$rsqp->num_rows;
		if($nqa>0&&$nqp>0)
		{
			$data = mysqli_fetch_assoc($rsqa) ;
			$datp = mysqli_fetch_assoc($rsqp) ;

?>
		<form class="form-horizontal" name="frmro" id="frmro" onsubmit="return RepeatOrder()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalROLabel">Repeat Order Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">

			<p>Yakin akan melakukan Repeat Order untuk :</p>
			<input type="hidden" name="txtnoid"   id="txtnoid"   value="<?=$data['noid']?>">
			<input type="hidden" name="txtproduk" id="txtproduk" value="<?=$datp['kodepin']?>">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">NOID</div>
					<div class="col-md-9"><b><?=$data['noid']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Nama</div>
					<div class="col-md-9"><b><?=$data['nama']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Kota</div>
					<div class="col-md-9"><b><?=$data['kota']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">PIN</div>
					<div class="col-md-9"><b><?=$datp['kodepin']?></b></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">Produk</div>
					<div class="col-md-9"><b><?=$datp['produk']?></b></div>
				</div>
			</div>
			
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Repeat Order</button>
        </div>
		</form>

	<?php
		}else{
?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalROLabel">Repeat Order Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">

			<h5>Maaf Repeat Order Gagal.<br/> 
			<?=$nqa==0?"Member dengan data '".$_POST['txtnoid']."' tidak ada.":""?>
			<?=$nqp==0?"PIN Produk '".$_POST['txtproduk']."' tidak valid.":""?>
			</h5>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
	<?php		
		}
	}
}else{
?>
		<form class="form-horizontal" name="frmro" id="frmro" onsubmit="return RepeatOrder()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalROLabel">Repeat Order Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">

			<p>Pilih No ID yang akan di Repeat Order.</p>

			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label">NOID</label>
					<div class="col-md-8 col-xs-12">                                            
							<input type="text" class="form-control" name="txtnoid" id="txtnoid" value="<?=$_POST['txtnoid']?>">
							<span class="help-block">Silahkan isi NOID</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label">PIN Produk</label>
					<div class="col-md-8 col-xs-12">                                            
							<input type="text" class="form-control" name="txtproduk" id="txtproduk" value="">
							<span class="help-block">Isi Kode PIN</span>
					</div>
				</div>
			</div>
			
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Selanjutnya</button>
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

function RepeatOrder()
{
	var txt="";

	if (!(document.frmro.txtnoid.value.length>=10))
	{
		txt=txt+"NOID harus diisi. ";
	}
	if (!(document.frmro.txtproduk.value.length>=13))
	{
		txt=txt+"PIN Produk harus diisi. ";
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
		url			: "ajax/repeatorderAJAX.php?s=<?=($s+1)?>",
		chache		:	false,
		data		:	$("#frmro").serialize(),
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalRO').modal('show');
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