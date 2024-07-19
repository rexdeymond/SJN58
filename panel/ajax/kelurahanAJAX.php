<select class="form-control select" name="slckelurahan">
	<option value="">Pilih Kelurahan : </option>
<?php


if (isset($_POST['slckecamatan'])){
	include("../../include/koneksi.php");
		$slckecamatan = $_POST['slckecamatan'];
		$sqlcity = "SELECT DISTINCT desa.desa FROM desa,kecamatan WHERE desa.kecamatan_id = kecamatan.kecamatan_id and kecamatan.kecamatan=\"".$slckecamatan."\" order by desa";
		$execity = mysqli_query($conn,$sqlcity);
		while($rscity = $execity->fetch_assoc())
		{
			?>
			<option value="<?=$rscity['desa']?>"><?=$rscity['desa']?></option>
			<?php
		}
}
?>
</select>
