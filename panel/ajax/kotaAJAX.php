<select class="form-control select" name="slckota"  id="slckota" onchange="showKecamatan()">
	<option value="">Pilih Kota : </option>
<?php

if (isset($_POST['slcpropinsi'])){
	include("../../include/koneksi.php");
		$slcpropinsi = $_POST['slcpropinsi'];
		$sqlcity = "SELECT DISTINCT kota.kota FROM kota,propinsi WHERE kota.propinsi_id = propinsi.propinsi_id and propinsi.propinsi=\"".$slcpropinsi."\" order by SUBSTRING( `kota` , 6 )";
		$execity = mysqli_query($conn,$sqlcity);
		while($rscity = $execity->fetch_assoc())
		{
			?>
			<option value="<?=$rscity['kota']?>"><?=$rscity['kota']?></option>
			<?php
		}
}
?>
</select>
