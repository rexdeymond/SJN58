<?php

$noid = isset($_POST['noid'])?$_POST['noid']:(isset($_GET['noid'])?$_GET['noid']:"$unoid");
$upload_dir=isset($_POST['noid'])?"assets/images/users/":"assets/images/users/";
$upload_dir2=isset($_POST['noid'])?"../assets/images/users/":"assets/images/users/";
$validext=array("jpg","jpe","jpeg","jfif","png");
$picturepath="assets/images/users/default.png";

for($i=0;$i<count($validext);$i++){
	if(file_exists(strtolower($upload_dir2."".$noid.".".$validext[$i])))
	{
		$picturepath=strtolower($upload_dir."".$noid.".".$validext[$i]);
	};
}
?>
			<!--img style="cursor:pointer;" src="images.php?f=<?=$picturepath?>&w=500&zzz=<?=rand()?>" title="<?=$upload_dir."".$noid.".".$validext[0]."|".$upload_dir2."".$noid.".".$validext[0]?>" class="col-md-12" /-->
			<img style="cursor:pointer;" src="<?=$picturepath?>" title="<?=$upload_dir."".$noid.".".$validext[0]."|".$upload_dir2."".$noid.".".$validext[0]?>" class="col-md-12" />
