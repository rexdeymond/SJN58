{"data":[
<?php
include("../include/koneksi.php");
$s=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:(isset($_POST['txtfilter'])?$_POST['txtfilter']:(isset($_GET['txtfilter'])?$_GET['txtfilter']:"")));
$t=isset($_GET['t'])?$_GET['t']:"";//table
$w=isset($_GET['w'])?$_GET['w']:"";//where
$o=isset($_GET['o'])?$_GET['o']:"$w";//order by
$ot=isset($_GET['ot'])?strtoupper($_GET['ot']):"";//order type
$l=isset($_GET['l'])?($_GET['l']>0?$_GET['l']:""):"";//limit query

if($l=='undefined')$l=10000;

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
while ($row = $rs->fetch_assoc()) 
{
	$len=count($row);
	$ll=array_keys($row);
	if($b>0)echo",";
	?>{<?php
	for($a=0;$a<$len;$a++){
		if($a>0)echo",";
		?>"<?=$ll[$a]?>":"<?=is_numeric(trim(preg_replace('/\s+/'," ",$row[$ll[$a]])))?(trim(preg_replace('/\s+/'," ",$row[$ll[$a]]))<=100000000?number_format(trim(preg_replace('/\s+/'," ",$row[$ll[$a]]))):trim(preg_replace('/\s+/'," ",$row[$ll[$a]]))):trim(preg_replace('/\s+/'," ",$row[$ll[$a]]))?>"<?php
	}
	$b++;
	?>}<?php
}
?>
]
}