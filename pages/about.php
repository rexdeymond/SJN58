                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>About Us</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Pages</a></li>
                                <li class="active">About Us</li>
                            </ul>               
                            <!-- ./breadcrumbs -->
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>
                <!-- ./page content wrapper -->
                
                               
                <!-- page content wrapper -->
                <div class="page-content-wrap">                    
                    <!-- page content holder -->
                    <div class="page-content-holder">
                        
                        <div class="block-heading block-heading-centralized this-animate" data-animate="fadeInDown">
                            <h2 class="heading-underline">Selamat Datang di Satu Jalan</h2>
                            <div class="block-heading-text">
                                <p>Kami adalah komunitas bisnis yang didirikan dengan tujuan untuk membantu penanggulangan kemiskinan melalui perubahan system Ekonomi serta peningkatan kualitas sumber daya manusia melalui bidang usaha.</p><p>Komunitas ini dibangun dari kita untuk kita dengan menjunjung tinggi azas kesamaan dan persamaan bagi seluruh anggota tanpa memandang suku ras dan agama.</p><p>Tujuan komunitas adalah mensejahterakan seluruh anggota yang bergabung di dalamnya.</p>
                            </div>
                        </div>
                        
                    </div>
                    <!-- ./page content holder -->
                </div>
                <!-- ./page content wrapper -->
                

                <!-- page content wrapper -->
                <div class="page-content-wrap">
                    
                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                    
                    
                    <!-- page content holder -->
                    <div class="page-content-holder">                        
                        
                        <div class="block-heading block-heading-centralized this-animate" data-animate="fadeInDown">
                            <h2 class="heading-underline">Team pengurus Satu Jalan</h2>
                            <div class="block-heading-text">
                                Tim professional kami sudah berpengalaman sukses selama puluhan tahun di berbagai macam bidang bisnis di Indonesia.
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeIn">
                                    <!--div class="text-column-image">
                                        <img src="assets/img/users/user3.jpg" alt="Susiloningsih SPt, Msi" class="img-circle">
                                    </div-->
                                    <h5>Sherly Jessica T, S.Pt., S.H., M.T.</h5>
                                    <div class="text-column-subtitle">Ketua</div>
                                    <!--div class="text-column-info">
                                        Founder dari Komunitas Bisnis Sejahtera, Tamariska Tour, dan Komunitas Satu Jalan.
                                    </div-->
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeIn">
                                    <!--div class="text-column-image">
                                        <img src="assets/img/users/user.jpg" alt="Sofwan" class="img-circle">
                                    </div-->
                                    <h5>Susiloningsih, S.Pt, M.Si.</h5>
                                    <div class="text-column-subtitle">Sekretaris</div>
                                    <!--div class="text-column-info">
                                        Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    </div-->
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-3">                  
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeIn">
                                    <!--div class="text-column-image">
                                        <img src="assets/img/users/user2.jpg" alt="Agus" class="img-circle">
                                    </div-->
                                    <h5>Nilasari Susanto, SE, MM.</h5>
                                    <div class="text-column-subtitle">Bendahara</div>
                                    <!--div class="text-column-info">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. 
                                    </div-->
                                </div>                                
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-3">                 
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeIn">
                                    <!--div class="text-column-image">
                                        <img src="assets/img/users/user4.jpg" alt="Suwarli Liman SH" class="img-circle">
                                    </div-->
                                    <h5>Christianto Liman, S.Kom</h5>
                                    <div class="text-column-subtitle">Programmer</div>
                                    <!--div class="text-column-info">
                                        Berpengalaman menjadi direktur dari banyak perusahaan di Indonesia, antara lain PT. Sinar Nusa Indonesia, DT-88, Bio Forever, Komunitas Bisnis Sejahtera, Bio-88, Tabungan Begold, G-Strong, Tamariska, Sinar Trisula, dan Komunitas Satu Jalan.
                                    </div-->
                                </div>                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- ./page content holder -->
                </div>                
                <!-- ./page content wrapper -->
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    
                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>
                    
                    <!-- page content holder -->
                    <div class="page-content-holder">

                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeInLeft">
                                    <div class="text-column-icon">
                                        <span class="fa fa-eye"></span>
                                    </div>
                                    <h4>Visi</h4>
                                    <div class="text-column-info">
<?php 
require_once("include/koneksi.php");

$sqlArt = "SELECT * FROM artikel where judul='VISI' ORDER BY Created DESC LIMIT 1";
//echo $sqlArt;
$rsArt = mysqli_query($conn,$sqlArt);
$Art = $rsArt->fetch_assoc();

?>
                                        <?=$Art['Isi']?> 
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="col-md-3">
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeInUp">
                                    <div class="text-column-icon">
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <h4>Misi</h4>
                                    <div class="text-column-info">
<?php 
//require_once("include/koneksi.php");

$sqlArt = "SELECT * FROM artikel where judul='MISI' ORDER BY Created DESC LIMIT 1";
//echo $sqlArt;
$rsArt = mysqli_query($conn,$sqlArt);
$Art = $rsArt->fetch_assoc();
?>                           
	                                        <?=$Art['Isi']?> 

									</div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeInRight">
                                    <div class="text-column-icon">
                                        <span class="fa fa-pencil"></span>
                                    </div>
                                    <h4>MOTO</h4>
                                    <div class="text-column-info">
<?php 
//require_once("include/koneksi.php");

$sqlArt = "SELECT * FROM artikel where judul='MOTO' ORDER BY Created DESC LIMIT 1";
//echo $sqlArt;
$rsArt = mysqli_query($conn,$sqlArt);
$Art = $rsArt->fetch_assoc();
?>                           
	                                        <?=$Art['Isi']?> 
                                        
                                    </div>
                                </div>
                            </div>
 
							<div class="col-md-3">
                                <div class="text-column text-column-centralized this-animate" data-animate="fadeInRight">
                                    <div class="text-column-icon">
                                        <span class="fa fa-clock-o"></span>
                                    </div>
                                    <h4>Tujuan</h4>
                                    <div class="text-column-info">
<?php 
//require_once("include/koneksi.php");

$sqlArt = "SELECT * FROM artikel where judul='Tujuan' ORDER BY Created DESC LIMIT 1";
//echo $sqlArt;
$rsArt = mysqli_query($conn,$sqlArt);
$Art = $rsArt->fetch_assoc();
?>                           
	                                        <?=$Art['Isi']?> 
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- ./page content holder -->
                </div>
                <!-- ./page content wrapper --> 