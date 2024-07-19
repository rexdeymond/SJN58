<?php
require_once("include/koneksi.php");
$id=isset($_GET['i'])?$_GET['i']:"";
if($id<>"") $strId="AND ID='$id'"; else $strId="";
?>
				<!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Artikel</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href=".">Home</a></li>
                                <li class="active"><a href=".?p=artikel">Artikel</a></li>
                            </ul>               
                            <!-- ./breadcrumbs -->
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>
                <!-- ./page content wrapper -->
<?php
$sqlArt = "SELECT * FROM artikel where publik=1 $strId";
//echo $sqlArt;
$rsArt = mysqli_query($conn,$sqlArt);
while($Art = $rsArt->fetch_assoc())
{
?>
	<!-- page content wrapper -->
	<div class="page-content-wrap">                    
		<!-- page content holder -->
		<div class="page-content-holder padding-v-30">

			<div class="row">                        
				<div class="col-md-12">
					<div class="blog-content">
                        <div class="block-heading this-animate" data-animate="fadeInDown">
                            <h1 class="heading"><?=$Art['Judul']?></h1>
							<div class="block-heading-text ck-content">
                                <?=$Art['Isi']?>
                            </div>

                        </div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./page content holder -->
	</div>
	<!-- ./page content wrapper -->
                
<?php
}
?>

