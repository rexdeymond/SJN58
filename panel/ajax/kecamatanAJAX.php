<select class="form-control select" name="slckecamatan" id="slckecamatan" onchange="showDesa()">
	<option value="">Pilih Kecamatan : </option>
<?php
if (isset($_POST['slckota'])){
	include("../../include/koneksi.php");
		$slckota = $_POST['slckota'];
		$sqlcity = "SELECT DISTINCT kecamatan.kecamatan FROM kota,kecamatan WHERE kota.kota_id = kecamatan.kota_id and kota.kota=\"".$slckota."\" order by kecamatan";
		$execity = mysqli_query($conn,$sqlcity);
		while($rscity = $execity->fetch_assoc())
		{
			?>
			<option value="<?=$rscity['kecamatan']?>"><?=$rscity['kecamatan']?></option>
			<?php
		}
}
?>
</select>
