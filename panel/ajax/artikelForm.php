<?php
if(isset($_POST['pd']))
{
	require_once("../../include/koneksi.php");
	$sqlArt="SELECT * FROM artikel WHERE ID='".$_POST['pd']."'";
	$rsArt=mysqli_query($conn,$sqlArt)->fetch_assoc();
}
?>
<div class="col-md-12">
	
	<form class="form-horizontal" name="frmarticle" id="frmarticle" method="post" onsubmit="return SaveArt()">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong>Tulis </strong> Artikel</h3>
			<ul class="panel-controls">
				<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
				<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
				<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
			</ul>
		</div>
		<div class="panel-body">                                                                        

	<div class="block">
<div class="row">
	<div class="col-md-4">
		<input type="hidden" name="hdnID" value="<?=isset($_POST['pd'])?$_POST['pd']:""?>"/>
		<div class="form-group">
			<label class="col-md-3 control-label">Kategori</label>
			<div class="col-md-9">                                            
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
						<select class="form-control select" name="slcCategory">
						<?php
						require_once("../../include/koneksi.php");
						$sqlkartikel = "SELECT * FROM kartikel";
						$rskartikel = mysqli_query($conn,$sqlkartikel);
						while($data = $rskartikel->fetch_assoc())
						{
					?>
							<option value="<?=$data["id"]?>" <?=isset($_POST['pd'])?(($data["id"]==$rsArt["Category"])?" selected":""):""?> ><?=$data["tipe"]?></option>
					<?php
						}
					?>
						</select>

				</div>                                            
				<span class="help-block">Pilihlah jenis kategori untuk artikel ini</span>
			</div>
		</div>
	</div>
	<div class="col-md-8">

		<div class="form-group">
			<label class="col-md-3 control-label">Judul</label>
			<div class="col-md-9">                                            
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
					<input type="text" class="form-control" name="txtJudul" value="<?=isset($_POST['pd'])?$rsArt["Judul"]:""?>" />
				</div>                                            
				<span class="help-block">Judul Artikel akan ditampilkan di beberapa tempat</span>
			</div>
		</div>
	</div>
</div>
<div class="row">			
		<textarea class="summernote" name="txtArtikel"><?=isset($_POST['pd'])?$rsArt["Isi"]:""?></textarea>
</div>
</div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-default">Batal</button>                                    
			<button class="btn btn-primary pull-right">Simpan</button>
		</div>
	</div>
	</form>
	
</div>
<script>
$(document).ready(function(){
	$(".summernote").summernote()
})
</script>