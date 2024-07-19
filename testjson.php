<?php
$servername = "localhost";//"mitra.ikip-veteran.ac.id";
$username = "root";
$password = "za3nud_7";//pack('H*', base_convert('1110000011011010110001000110001011101100011001101110100', 2, 16));
$dbname = "ivet";

//echo $servername." - ".$username." - ".$password." - ".$dbname;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$s=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");
$t=isset($_GET['t'])?$_GET['t']:"";//table
$w=isset($_GET['w'])?$_GET['w']:"";//where
$df=isset($_GET['df'])?$_GET['df']:"";//datefield
$dateFrom=isset($_GET['dateFrom'])?$_GET['dateFrom']:"";//date from filter
$dateTo=isset($_GET['dateTo'])?$_GET['dateTo']:"";//date to filter
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
	$data['data'][]=$row;
}
echo json_encode($data);
?>
