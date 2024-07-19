<?php
@session_start();
include("../include/koneksi.php");
require_once("lib/PHPExcel.php");
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Muhammad Zaenudin")
							 ->setLastModifiedBy("Muhammad Zaenudin")
							 ->setTitle("Database Exported Document")
							 ->setSubject("Database Exported Document")
							 ->setDescription("CopyRights by Muhammad Zaenudin.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Classified Document");
			

//-------begin include & queries------------------------
$s=isset($_POST['txtfilter'])?$_POST['txtfilter']:(isset($_GET['txtfilter'])?$_GET['txtfilter']:"");
$t=isset($_GET['t'])?$_GET['t']:"";//table
$w=isset($_GET['w'])?$_GET['w']:"";//where
$o=isset($_GET['o'])?$_GET['o']:"$w";//order by
$ot=isset($_GET['ot'])?strtoupper($_GET['ot']):"";//order type
//$l=isset($_GET['l'])?($_GET['l']>0?$_GET['l']:(isset($_POST['txtlimit'])?($_POST['txtlimit']>0?$_POST['txtlimit']:"100000"):"100000")):"100000";//limit query
$l=isset($_POST['txtlimit'])?($_POST['txtlimit']>0?$_POST['txtlimit']:"100000"):"100000";//limit query

$strw=$w!=""?" WHERE $w LIKE '%".$s."%' ":"";

$xlsPath="json";
$xlsTittle="Data_".$t;
if(file_exists("$xlsPath/$t.json.php"))
{
//	ECHO "$xlsPath/$t.xls.php";
	include("$xlsPath/$t.json.php");
}
else
{
	$q="SELECT * FROM $t $strw ".($o==""?"":("ORDER BY ".$o.($ot=="DESC"?" DESC ":" ASC ")))." ".($l==""?" LIMIT 20":(" LIMIT ".$l));
}
//--------end include & queries--------------------------
$rslt = mysqli_query($conn,$q)  or die(mysqli_error($conn));

$flag = false; 
$b=1;
while ($row = mysqli_fetch_array($rslt)) 
{
	if(!$flag) 
	{ 
		$len=count($row);
		$ll=array_keys($row);
		$aa=0;
		for($a=0;$a<$len;$a++){
			if(!is_numeric($ll[$a])){
				$objPHPExcel->setActiveSheetIndex(0)->setCellValueExplicitByColumnAndRow($aa,$b,is_null($ll[$a])?'':$ll[$a]);
				$aa++;
			}
		}
		$flag = true; 
	}
	$aa=0;
	for($a=0;$a<$len;$a++){
		if(!is_numeric($ll[$a])){
			$xval=strlen($row[$ll[$a]])>=1?str_replace(chr(39),chr(96),str_replace(chr(10),"",str_replace(chr(13),"",$row[$ll[$a]]))):"";
			$objPHPExcel->setActiveSheetIndex(0)->setCellValueExplicitByColumnAndRow($aa,$b+1,$xval);
			$aa++;
		}
	}
	$b++;
}
//$objPHPExcel->setActiveSheetIndex(0)->setCellValueExplicitByColumnAndRow($a,$b+1,$q);
$objPHPExcel->getActiveSheet()->setTitle($xlsTittle."_".date('Ymd'));
$filename = $xlsTittle."_". date('Ymd') . ".xls";

// Redirect output to a client?s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename=\"$filename\"");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
