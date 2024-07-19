<?php
session_start();
include("../include/koneksi.php");
$s=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:((isset($_GET['query'])?$_GET['query']:"")));
$f=isset($_GET['f'])?$_GET['f']:"";//format
$t=isset($_GET['t'])?$_GET['t']:"";//table
$w=isset($_GET['w'])?$_GET['w']:"";//where
$o=isset($_GET['o'])?$_GET['o']:"$w";//order by
$ot=isset($_GET['ot'])?strtoupper($_GET['ot']):"";//order type
$l=isset($_GET['l'])?($_GET['l']>0?$_GET['l']:""):"";//limit query

$strw=$w!=""?" WHERE $w LIKE '%".$s."%' ":"";

$jsonPath="json";

if(file_exists("$jsonPath/$t.json.php"))
{
//	ECHO "$jsonPath/$t.json.php";
	include("$jsonPath/$t.json.php");
}
else
{
	$q="SELECT * FROM $t $strw ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 20":(" LIMIT ".$l));
}
//echo $q;
//exit();
$rs=mysqli_query($conn,$q)  or die(mysqli_error($conn));
$b=0;
while ($row = mysqli_fetch_assoc($rs)) 
{
	if($f=="f"){
		$data[]=$row;	
	}
	else
	{
		$data[]=$row[$w];
	}
}
echo json_encode($data);
?>
