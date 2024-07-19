<?php
	$rslt="";
	if(isset($_POST['txtJudul']))
	{
		if($_POST['hdnID']>0)
			$SQLQry="UPDATE `artikel` SET Category='".$_POST['slcCategory']."',judul='".$_POST['txtJudul']."',isi='".$_POST['txtArtikel']."',Updated=NOW(),Updated_By='".$_SESSION['sjn58']."' WHERE id='".$_POST['hdnID']."';";
		else
			$SQLQry="INSERT INTO `artikel` (Category,Judul,Isi,Created,Created_By)values('".$_POST['slcCategory']."','".$_POST['txtJudul']."','".$_POST['txtArtikel']."',NOW(),'".$_SESSION['sjn58']."');";
		//echo $SQLQry;
		$RSQry=mysqli_query($conn,$SQLQry) or die(mysqli_error($conn));
	}
	echo "Artikel telah disimpan";
?>