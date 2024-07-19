<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
?>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Jaringan </strong> Member</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body" style="overflow-x:auto">    
<!---------------------start------------------------>
<?php 
require_once("../../include/koneksi.php");

$SQL="SELECT *,fnGetMemberKodeLvl(noid,0) kodelvl,fnGetMemberLvl(noid,0) lvl FROM member WHERE noid='".$_SESSION['sjn58']."' limit 1";
$rsUser=mysqli_query($conn,$SQL)   or die(mysqli_error($conn));
while($user=$rsUser->fetch_assoc())
{
	$unoid=$user['noid'];
	$unama=$user['nama'];
	$ukdlv=$user['kodelvl'];
	$ulvl=$user['lvl'];
}
mysqli_free_result($rsUser);



if(isset($_POST['kodeLVL']))$l=$_POST['kodeLVL']; else $l=$ukdlv;
$nlv=strlen($l);

if($nlv<$ulvl){$nlv=$ulvl;$l=$ukdlv;}
$kdl1=$l."1";$nl1=strlen($kdl1);
$kdl2=$l."2";$nl2=strlen($kdl2);
$kdl3=$l."3";$nl3=strlen($kdl3);
$kdl4=$l."4";$nl4=strlen($kdl4);
$kdl5=$l."5";$nl5=strlen($kdl5);
$sqlup="SELECT noid,nama,tgldaftar,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl1)='$kdl1') p1,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl2)='$kdl2') p2,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl3)='$kdl3') p3,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl4)='$kdl4') p4,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl5)='$kdl5') p5
 from member where fnGetMemberKodeLvl(noid,0)='$l'";
//echo "$kdli=$l.'0';$nli=strlen($kdli)";

require_once("../../include/koneksi.php");

$rsup = mysqli_fetch_assoc(mysqli_query($conn,$sqlup)) or die(mysqli_error($conn));

?>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="9" align="center">
	<table width="200"  cellspacing="1" cellpadding="2">
      <tr>
        <td align="center" bgcolor="#00acde"><strong>
          <?=$rsup['noid']?>
        </strong></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#C6C6C6">
		<table width="100%" cellpadding="1"  cellspacing="1">
            <tr align="center">
              <td height="30" colspan="5" bgcolor="#aab8c0"><?=$rsup['nama']?></td>
            </tr>
            <tr align="center">
              <td height="30" width="20%" bgcolor="#CCCCCC"><?=$rsup['p1']?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$rsup['p2']?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$rsup['p3']?></td>				
              <td width="20%" bgcolor="#CCCCCC"><?=$rsup['p4']?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$rsup['p5']?></td>				
            </tr>
            <tr align="center" bgcolor="#D7EBFF">
              <td height="20" colspan="5" bgcolor="#FFCCCC"><strong>
                <?=$rsup['tgldaftar']?>
              </strong></td>
            </tr>
        </table>
		</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00acde"><?php if(($nlv>$ulvl)&&$l>1){ ?><button type="button" class="btn btn-primary" onclick="Jaring('<?=substr($l,0,strlen($l)-1)?>')"> UP </button><?php }else{ ?>CURRENT<? }?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="9" align="center"><img src="img/line.png" width="80%" height="31" ></td>
  </tr>
  <tr>
    <td align="center">
	<table width="200"  cellspacing="1" cellpadding="2">
	<?php

$kdl11=$kdl1."1";$nl11=strlen($kdl11);
$kdl12=$kdl1."2";$nl12=strlen($kdl12);
$kdl13=$kdl1."3";$nl13=strlen($kdl13);
$kdl14=$kdl1."4";$nl14=strlen($kdl14);
$kdl15=$kdl1."5";$nl15=strlen($kdl15);
$sqlk1="SELECT noid,nama,tgldaftar,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl11)='$kdl11') p1,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl12)='$kdl12') p2,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl13)='$kdl13') p3,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl14)='$kdl14') p4,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl15)='$kdl15') p5
 from member where fnGetMemberKodeLvl(noid,0)='$kdl1'";

require_once("../../include/koneksi.php");
$xk1=mysqli_query($conn,$sqlk1)or die(mysqli_error($conn));
$nk1=$xk1->num_rows;
if($nk1>0)
	$rsk1 = mysqli_fetch_assoc($xk1) ;


	?>
      <tr>
        <td align="center" bgcolor="#00acde" class="isi"><strong>
          <?=$nk1>0?$rsk1['noid']:"&nbsp;"?>
        </strong></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#C6C6C6">
		<table width="100%"  cellspacing="1" cellpadding="1">
            <tr align="center">
              <td height="30" colspan="5" bgcolor="#aab8c0"><?=$nk1>0?$rsk1['nama']:""?></td>
              </tr>
            <tr align="center">
              <td width="20%" height="30" bgcolor="#CCCCCC"><?=$nk1>0?$rsk1['p1']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk1>0?$rsk1['p2']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk1>0?$rsk1['p3']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk1>0?$rsk1['p4']:""?></td>              
              <td width="20%" bgcolor="#CCCCCC"><?=$nk1>0?$rsk1['p5']:""?></td>
            </tr>
            <tr align="center" bgcolor="#D7EBFF">
              <td height="20" colspan="5" bgcolor="#FFCCCC"><strong>
                <?=$nk1>0?$rsk1['tgldaftar']:""?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00acde"><?php if($nk1>0){  ?><button type="button" class="btn btn-primary" onclick="Jaring('<?=$kdl1?>')">Down </button><?php  }else{ ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDaftar"  onclick="			
		$('#txtsponsor').val('<?=$_SESSION['sjn58']?>');
		$('#txtupline').val('<?=$rsup['noid']?>');
		$('#slcposisi').val('1');
		$('#slcposisi').selectpicker('refresh');
		showJaringan();
		">Register </button><?php }?></td>
      </tr>
    </table>
	</td>
    <td>&nbsp;</td>
    <td align="center">
	<table width="200"  cellspacing="1" cellpadding="2">
	<?php

$kdl21=$kdl2."1";$nl21=strlen($kdl21);
$kdl22=$kdl2."2";$nl22=strlen($kdl22);
$kdl23=$kdl2."3";$nl23=strlen($kdl23);
$kdl24=$kdl2."4";$nl24=strlen($kdl24);
$kdl25=$kdl2."5";$nl25=strlen($kdl25);
$sqlk2="SELECT noid,nama,tgldaftar, 
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl21)='$kdl21') p1,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl22)='$kdl22') p2,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl23)='$kdl23') p3,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl24)='$kdl24') p4,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl25)='$kdl25') p5
 from member where fnGetMemberKodeLvl(noid,0)='$kdl2'";

require_once("../../include/koneksi.php");
$xk2=mysqli_query($conn,$sqlk2)or die(mysqli_error($conn));
$nk2=$xk2->num_rows;
if($nk2>0)
	$rsk2 = mysqli_fetch_assoc($xk2) ;


	?>
      <tr>
        <td align="center" bgcolor="#00acde" class="isi"><strong>
          <?=$nk2>0?$rsk2['noid']:"&nbsp;"?>
        </strong></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#C6C6C6">
		<table width="100%"  cellspacing="1" cellpadding="1">
            <tr align="center">
              <td height="30" colspan="5" bgcolor="#aab8c0"><?=$nk2>0?$rsk2['nama']:""?></td>
              </tr>
            <tr align="center">
              <td width="20%" height="30" bgcolor="#CCCCCC"><?=$nk2>0?$rsk2['p1']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk2>0?$rsk2['p2']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk2>0?$rsk2['p3']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk2>0?$rsk2['p4']:""?></td>              
              <td width="20%" bgcolor="#CCCCCC"><?=$nk2>0?$rsk2['p5']:""?></td>
            </tr>
            <tr align="center" bgcolor="#D7EBFF">
              <td height="20" colspan="5" bgcolor="#FFCCCC"><strong>
                <?=$nk2>0?$rsk2['tgldaftar']:""?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00acde"><?php if($nk2>0){  ?><button type="button" class="btn btn-primary" onclick="Jaring('<?=$kdl2?>')">Down </button><?php  }else{ ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDaftar"  onclick="			
		$('#txtsponsor').val('<?=$_SESSION['sjn58']?>');
		$('#txtupline').val('<?=$rsup['noid']?>');
		$('#slcposisi').val('2');
		$('#slcposisi').selectpicker('refresh');
		showJaringan();
		">Register </button><?php }?></td>
      </tr>
    </table>
	</td>
    <td>&nbsp;</td>
	<td align="center">
	<table width="200"  cellspacing="1" cellpadding="2">
	<?php

$kdl31=$kdl3."1";$nl31=strlen($kdl31);
$kdl32=$kdl3."2";$nl32=strlen($kdl32);
$kdl33=$kdl3."3";$nl33=strlen($kdl33);
$kdl34=$kdl3."4";$nl34=strlen($kdl34);
$kdl35=$kdl3."5";$nl35=strlen($kdl35);
$sqlk3="SELECT noid,nama,tgldaftar, 
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl31)='$kdl31') p1,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl32)='$kdl32') p2,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl33)='$kdl33') p3,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl34)='$kdl34') p4,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl35)='$kdl35') p5
 from member where fnGetMemberKodeLvl(noid,0)='$kdl3'";

require_once("../../include/koneksi.php");
$xk3=mysqli_query($conn,$sqlk3)or die(mysqli_error($conn));
$nk3=$xk3->num_rows;
if($nk3>0)
	$rsk3 = mysqli_fetch_assoc($xk3) ;


	?>
      <tr>
        <td align="center" bgcolor="#00acde" class="isi"><strong>
          <?=$nk3>0?$rsk3['noid']:"&nbsp;"?>
        </strong></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#C6C6C6">
		<table width="100%"  cellspacing="1" cellpadding="1">
            <tr align="center">
              <td height="30" colspan="5" bgcolor="#aab8c0"><?=$nk3>0?$rsk3['nama']:""?></td>
              </tr>
            <tr align="center">
              <td width="20%" height="30" bgcolor="#CCCCCC"><?=$nk3>0?$rsk3['p1']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk3>0?$rsk3['p2']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk3>0?$rsk3['p3']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk3>0?$rsk3['p4']:""?></td>              
              <td width="20%" bgcolor="#CCCCCC"><?=$nk3>0?$rsk3['p5']:""?></td>
            </tr>
            <tr align="center" bgcolor="#D7EBFF">
              <td height="20" colspan="5" bgcolor="#FFCCCC"><strong>
                <?=$nk3>0?$rsk3['tgldaftar']:""?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00acde"><?php if($nk3>0){  ?><button type="button" class="btn btn-primary" onclick="Jaring('<?=$kdl3?>')">Down </button><?php  }else{ ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDaftar"  onclick="			
		$('#txtsponsor').val('<?=$_SESSION['sjn58']?>');
		$('#txtupline').val('<?=$rsup['noid']?>');
		$('#slcposisi').val('3');
		$('#slcposisi').selectpicker('refresh');
		showJaringan();
		">Register </button><?php }?></td>
      </tr>
    </table>
	</td>
    <td>&nbsp;</td>
	<td align="center">
	<table width="200"  cellspacing="1" cellpadding="2">
	<?php

$kdl41=$kdl4."1";$nl41=strlen($kdl41);
$kdl42=$kdl4."2";$nl42=strlen($kdl42);
$kdl43=$kdl4."3";$nl43=strlen($kdl43);
$kdl44=$kdl4."4";$nl44=strlen($kdl44);
$kdl45=$kdl4."5";$nl45=strlen($kdl45);
$sqlk4="SELECT noid,nama,tgldaftar, 
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl41)='$kdl41') p1,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl42)='$kdl42') p2,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl43)='$kdl43') p3,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl44)='$kdl44') p4,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl45)='$kdl45') p5
 from member where fnGetMemberKodeLvl(noid,0)='$kdl4'";

require_once("../../include/koneksi.php");
$xk4=mysqli_query($conn,$sqlk4)or die(mysqli_error($conn));
$nk4=$xk4->num_rows;
if($nk4>0)
	$rsk4 = mysqli_fetch_assoc($xk4) ;


	?>
      <tr>
        <td align="center" bgcolor="#00acde" class="isi"><strong>
          <?=$nk4>0?$rsk4['noid']:"&nbsp;"?>
        </strong></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#C6C6C6">
		<table width="100%"  cellspacing="1" cellpadding="1">
            <tr align="center">
              <td height="30" colspan="5" bgcolor="#aab8c0"><?=$nk4>0?$rsk4['nama']:""?></td>
              </tr>
            <tr align="center">
              <td width="20%" height="30" bgcolor="#CCCCCC"><?=$nk4>0?$rsk4['p1']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk4>0?$rsk4['p2']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk4>0?$rsk4['p3']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk4>0?$rsk4['p4']:""?></td>              
              <td width="20%" bgcolor="#CCCCCC"><?=$nk4>0?$rsk4['p5']:""?></td>
            </tr>
            <tr align="center" bgcolor="#D7EBFF">
              <td height="20" colspan="5" bgcolor="#FFCCCC"><strong>
                <?=$nk4>0?$rsk4['tgldaftar']:""?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00acde"><?php if($nk4>0){  ?><button type="button" class="btn btn-primary" onclick="Jaring('<?=$kdl4?>')">Down </button><?php  }else{ ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDaftar"  onclick="			
		$('#txtsponsor').val('<?=$_SESSION['sjn58']?>');
		$('#txtupline').val('<?=$rsup['noid']?>');
		$('#slcposisi').val('4');
		$('#slcposisi').selectpicker('refresh');
		showJaringan();
		">Register </button><?php }?></td>
      </tr>
    </table>
	</td>
    <td>&nbsp;</td>
    <td align="center">
	<table width="200"  cellspacing="1" cellpadding="2">
	<?php

$kdl51=$kdl5."1";$nl51=strlen($kdl51);
$kdl52=$kdl5."2";$nl52=strlen($kdl52);
$kdl53=$kdl5."3";$nl53=strlen($kdl53);
$kdl54=$kdl5."4";$nl54=strlen($kdl54);
$kdl55=$kdl5."5";$nl55=strlen($kdl55);
$sqlk5="SELECT noid,nama,tgldaftar, 
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl51)='$kdl51') p1,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl52)='$kdl52') p2,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl53)='$kdl53') p3,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl54)='$kdl54') p4,
(select count(*) from member where left(fnGetMemberKodeLvl(noid,0),$nl55)='$kdl55') p5
 from member where fnGetMemberKodeLvl(noid,0)='$kdl5'";

require_once("../../include/koneksi.php");
$xk5=mysqli_query($conn,$sqlk5)or die(mysqli_error($conn));
$nk5=$xk5->num_rows;
if($nk5>0)
	$rsk5 = mysqli_fetch_assoc($xk5) ;


	?>
      <tr>
        <td align="center" bgcolor="#00acde" class="isi"><strong>
          <?=$nk5>0?$rsk5['noid']:"&nbsp;"?>
        </strong></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#C6C6C6">
		<table width="100%"  cellspacing="1" cellpadding="1">
            <tr align="center">
              <td height="30" colspan="5" bgcolor="#aab8c0"><?=$nk5>0?$rsk5['nama']:""?></td>
              </tr>
            <tr align="center">
              <td width="20%" height="30" bgcolor="#CCCCCC"><?=$nk5>0?$rsk5['p1']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk5>0?$rsk5['p2']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk5>0?$rsk5['p3']:""?></td>
              <td width="20%" bgcolor="#CCCCCC"><?=$nk5>0?$rsk5['p4']:""?></td>              
              <td width="20%" bgcolor="#CCCCCC"><?=$nk5>0?$rsk5['p5']:""?></td>
            </tr>
            <tr align="center" bgcolor="#D7EBFF">
              <td height="20" colspan="5" bgcolor="#FFCCCC"><strong>
                <?=$nk5>0?$rsk5['tgldaftar']:""?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#00acde"><?php if($nk5>0){  ?><button type="button" class="btn btn-primary" onclick="Jaring('<?=$kdl5?>')">Down </button><?php  }else{ ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDaftar"  onclick="			
		$('#txtsponsor').val('<?=$_SESSION['sjn58']?>');
		$('#txtupline').val('<?=$rsup['noid']?>');
		$('#slcposisi').val('5');
		$('#slcposisi').selectpicker('refresh');
		showJaringan();
		">Register </button><?php }?></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td colspan="9" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" align="center">&nbsp;</td>
  </tr>
</table>


<!---------------------end------------------------>
			</div>
		</div>
	</div>
	
<?php 
include("daftar.php");
?>