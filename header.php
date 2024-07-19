<?php 
$ref=isset($_POST['ref'])?$_POST['ref']:(isset($_GET['ref'])?$_GET['ref']:'');
include("include/koneksi.php");
$sqlRef = "SELECT * FROM member where noid='$ref' LIMIT 1";
$rsRef = mysqli_query($conn,$sqlRef);
$dtRef = $rsRef->fetch_assoc();
if($dtRef['nama']<>""){$_SESSION['referal']=$dtRef['noid'].' - '.$dtRef['nama'];}

?>
                <!-- page header holder -->
                <div class="page-header-holder">
                    
                    <!-- page logo -->
                    <div class="logo">
                        <a href=".">Komunitas Satu Jalan</a>
                    </div>
                    <!-- ./page logo -->
                    

                    <!-- search -->
                    <!--div class="search">
                        <div class="search-button"><a href="panel"><span class="fa fa-lock" tittle="Virtual Office"></span></a></div>
                    </div-->
                    <!-- ./search -->

                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    
                    <!-- navigation -->
                    <ul class="navigation">
                        <li>
                            <?php if($_SESSION['referal']<>"") {?><a href="."><?=$_SESSION['referal']?></a><?php } else 
							{
								?><a href=".">Home</a><?php 
							}
								?>
                        </li>
                        <li>
                            <a href="#">Sistem</a>
                            <ul>
							<?php
							include("include/koneksi.php");
							$sqlSis = "SELECT * FROM artikel where publik=1 AND Category=3";
							$rsSis = mysqli_query($conn,$sqlSis);
							while($data = $rsSis->fetch_assoc())
							{	?>
                                <li><a href="?p=sistem&title=<?=$data["Judul"]?>"><?=$data["Judul"]?></a></li>
						<?php
							}
						?>
                             </ul>
                        </li>
                        <li>
                            <a href="#">Produk</a>
                            <ul> 
							<?php
							include("include/koneksi.php");
							$sqlProd = "SELECT * FROM artikel where publik=1 AND Category=2";
							$rsProd = mysqli_query($conn,$sqlProd);
							while($data = $rsProd->fetch_assoc())
							{
						?>
                                <li><a href="?p=product&title=<?=$data["Judul"]?>"><?=$data["Judul"]?></a></li>
						<?php
							}
						?>
                            </ul>
                        </li>
                        <li>
                            <a href="?p=download">Download</a>
                        </li>

                        <!--li>
                            <a href="?p=bonus">Bonus</a>
                            <ul>
                                <li><a href="?p=bonus&i=1">Fee Agency</a></li>
                                <li><a href="?p=bonus&i=1">Dana Pensiun</a></li>
                                <li><a href="#">Bonus K-IVET</a>
									<ul>
										<li><a href="?p=bonus&i=1">Fresh Cash</a></li>
										<li><a href="?p=bonus&i=1">Bunga Jaringan</a></li>
										<li><a href="?p=bonus&i=1">Reward</a></li>
										<li><a href="?p=bonus&i=1">Re-entry</a></li>
										<li><a href="?p=bonus&i=1">Royalti</a></li>
										<li><a href="?p=bonus&i=1">RO</a></li>
									</ul>
								</li>
                            </ul>
                        </li >
                        <li><a href="?p=gallery">Gallery</a></li-->
						<li>
                            <a href='<?=$_SESSION['sjn58']<>""?"panel/?daftar=1":"panel/login.php?daftar=1"?>'>Daftar</a> 
                        </li>
                        <li>
                            <a href="panel">Member Area</a>
                        </li>
                        <li><a href="?p=about">Tentang Kami</a></li>
                    </ul>
                    <!-- ./navigation -->                        

                    
                </div>
                <!-- ./page header holder -->
