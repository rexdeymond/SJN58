<?php
	$rslt="";
	$c=isset($_POST['hdnnoid'])?$_POST['hdnnoid']:(isset($unoid)?$unoid:"");
	// echo $_POST['hdnnoid'].'---------';
//	if(strlen($c)>6){
		$upload_dir="assets/images/users/";
		$rslt=$_FILES['pictures']['error'];
		$validext=array("jpg","jpe","jpeg","jfif","gif","png");
//		print_r($_FILES['pictures'])."<br/>";
		$tmp=explode(".",$_FILES['pictures']['name']);$s=count($tmp)-1;$ext=strtolower($tmp[$s]);
		if(in_array($ext,$validext)){
			$filename=$upload_dir."".$c.".".$ext;
			for($i=0;$i<count($validext);$i++){
				$filetmp="$c.".$validext[$i];
				if(file_exists(strtolower($upload_dir."$filetmp")))
				{
					unlink(strtolower($upload_dir."$filetmp"));
				}
				if(copy($_FILES['pictures']['tmp_name'],strtolower($filename))){
					$rslt="Upload Sukses $filename";
				};
			}
			//echo "<br/>".$filename;
		}
		else
		{
			$rslt="Upload Gagal";
		}
/*	}
 	else{
		$rslt="Kode tidak boleh kosong. silahkan isi tanggal dan badge number terlebih dahulu";
	 }
*/
	echo $rslt;
?>