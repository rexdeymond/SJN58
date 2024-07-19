
<div id="ModalDaftar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalDaftarLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
<?php 
$s=isset($_GET['s'])?$_GET['s']:"0";
if (isset($_POST['txtnoid'])){
	if($s==0){$s=1;}
	require_once("../../include/koneksi.php");
	if($s==2)
	{
		$q="call spReEntryAgen('".substr($_POST['txtnoid'],0,10)."')";
		$rsq=mysqli_query($conn,$q)or die(mysqli_error($conn));
		$data = mysqli_fetch_assoc($rsq) ;
		?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalDaftarLabel">RE-Entry Agen Langkah <?=$s?></h4>
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
		$q="SELECT * FROM agen WHERE noid='".substr($_POST['txtnoid'],0,10)."' LIMIT 1";
		$rsq=mysqli_query($conn,$q)or die(mysqli_error($conn));
		$nq=$rsq->num_rows;
		if($nq>0)
		{
			$data = mysqli_fetch_assoc($rsq) ;

?>
		<form class="form-horizontal" name="frmdaftar" id="frmdaftar" onsubmit="return ReEntry()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalDaftarLabel">RE-Entry Agen Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">

			<p>Yakin akan melakukan RE-Entry untuk :</p>

			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">NOID</div>
					<div class="col-md-9"><b><?=$data['noid']?></b><input type="hidden" class="form-control" name="txtnoid" id="txtnoid" value="<?=$data['noid']?>"></div>
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
					<div class="col-md-3">Alamat</div>
					<div class="col-md-9"><b><?=$data['alamat']?></b></div>
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
					<div class="col-md-3">Propinsi</div>
					<div class="col-md-9"><b><?=$data['propinsi']?></b></div>
				</div>
			</div>
			
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">RE-Entry</button>
        </div>
		</form>

	<?php
		}else{
?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalDaftarLabel">RE-Entry Agen Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">

			<h4>Maaf Re Entry Gagal. Agen dengan data <?=$_POST['txtnoid']?> tidak ada.</h4>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
	<?php		
		}
	}
}else{
?>
		<form class="form-horizontal" name="frmdaftar" id="frmdaftar" onsubmit="return ReEntry()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="ModalDaftarLabel">RE-Entry Agen Langkah <?=$s?></h4>
        </div>
        <div class="modal-body">

			<p>Pilih No ID yang akan di RE-Entry.</p>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">NOID</label>
					<div class="col-md-9 col-xs-12">                                            
							<input type="text" class="form-control" name="txtnoid" id="txtnoid" value="<?isset($_POST['txtnoid'])?$_POST['txtnoid']:""?>">
							<span class="help-block">Silahkan isi NOID</span>
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

function ReEntry()
{
	var txt="";

	if (!(document.frmdaftar.txtnoid.value.length>=10))
	{
		txt=txt+"NOID harus diisi. ";
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
		url			: "ajax/daftarulang.php?s=<?=($s+1)?>",
		chache		:	false,
		data		:	$("#frmdaftar").serialize(),
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalDaftar').modal('show');
						},
		datatype	:	"html"
	});
	}
	return false;
}
$('#txtnoid').typeahead({
	ajax: {
		url: 'jsone.php?t=agenlist&w=agen&search=',
		//method: 'post',
		//display:'kota',
	},
		hint:true,
		triggerLength: 1,
	//onSelect: function(){alert($('#txtnoid').val());},
});

</script>