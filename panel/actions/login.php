<?php
	if(isset($_POST['txtuserid']))
	{
		$noid=strtoupper($_POST['txtuserid']);
		$passwd=$_POST['txtpassword'];
		$passsalt="ganteng";
		$SQLLogin="SELECT k.noid,a.nama FROM `member` a,member_akses k WHERE k.noid=a.noid and MD5(UPPER(k.noid))= MD5(UPPER('$noid')) AND aes_decrypt( k.pass, concat(k.noid,'$passsalt')) = \"$passwd\" ";
		$result=mysqli_query($conn,$SQLLogin);
		//echo $SQLLogin;
		$nlg=$result->num_rows;
 		if($nlg==1)
		{
			$_SESSION['referal']=$noid;
			$_SESSION['sjn58']=$noid;
			$data=$result->fetch_row();
			$SQLLogin="UPDATE `member_akses` SET LastActivity=CurrentActivity,LastIP=CurrentIP,CurrentActivity=NOW(),CurrentIP='".$_SERVER['REMOTE_ADDR']."' WHERE noid='$noid'";
			mysqli_query($conn,$SQLLogin);
			if(isset($_POST['chkRemember'])){
				setcookie('sjn58',$noid,time()+3600*24);
			}
			$rslt="Login Sukses... ";
		}else
		{
			$SQLLogin="SELECT noid FROM `member_akses` WHERE noid = '$noid' ";
			$nusr=mysqli_query($conn,$SQLLogin)->num_rows;
			if($nusr==1){$rslt="Error... Password salah... ";}
			else 
			{
			/*	$SQLLogin="SELECT NoId FROM `member` WHERE NoId = '$noid' and NoId='$passwd'";
				$result=mysqli_query($conn,$SQLLogin);
				$nlg=$result->num_rows;
				if($nlg>0)
				{
					$_SESSION['sjn58']=$noid;
					$rslt="Login Sukses... ";					
				}else
			*/	$rslt="Error... User tidak dikenal... ";
			}
		}
		mysqli_free_result($result);
 	}
	echo $rslt;
	//header("Location:$rslt");
?>