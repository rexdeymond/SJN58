<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if(isset($_COOKIE['sjn58'])){$_SESSION['sjn58']=$_COOKIE['sjn58'];}
if(!isset($_SESSION['sjn58'])){header("Location:login.php");exit();}
include("../include/koneksi.php");

$SQL="SELECT *,fnGetMemberKodeLvl(noid,0) kodelvl,fnGetMemberLvl(noid,0) lvl,fnGetUserAksesLvl(noid) akseslvl FROM member WHERE noid='".$_SESSION['sjn58']."' limit 1";
$rsUser=mysqli_query($conn,$SQL)   or die(mysqli_error($conn));
while($user=$rsUser->fetch_assoc())
{
	$unoid=$user['noid'];
	$unama=$user['nama'];
	$ukdlv=$user['kodelvl'];
	$ulvl=$user['lvl'];
	$uakseslvl=$user['akseslvl'];
}
mysqli_free_result($rsUser);

?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Virtual Office - <?=$unoid.' ['.$unama.']'?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../img/logo-small.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
			<?php
			//<!-- START PAGE SIDEBAR -->
			include("sidebar.php");
			//<!-- END PAGE SIDEBAR -->
			?>
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
				<?php 
				//<!-- START X-NAVIGATION VERTICAL -->
				include("navigation.php");
				//<!-- END X-NAVIGATION VERTICAL -->                     
				?>

				<?php
				//<!-- START BREADCRUMB -->
				include("breadcrumb.php");
				//<!-- END BREADCRUMB -->                       
				?>
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
					<?php
					//<!-- START CONTENT -->                    
					include("contents.php");
					//<!-- END CONTENT -->                    
					?>
					<div id="appenddedForm"></div>
                                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Yakin ingin log out dari sistem?</p>                    
                        <p>Pilih Tidak bila Anda ingin melanjutkan. Pilih Ya bila Andsa ingin keluar.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="actions.php?a=logout" class="btn btn-success btn-lg">Ya</a>
                            <button class="btn btn-default btn-lg mb-control-close">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
<?php 
include("scripts.php");
?>
    <!-- END SCRIPTS -->         
    </body>
</html>





