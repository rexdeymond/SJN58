                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-dark-gray">
                    <!-- page footer holder -->
                    <div class="page-footer-holder page-footer-holder-main">
                                                
                        <div class="row">
                            
                            <div class="col-md-3">

                            </div>                            
                            <!-- quick links -->
                            <div class="col-md-3">
                                <h3>Quick links</h3>
                                
                                <div class="list-links">
                                    <a href=".">Home</a>                                    
                                    <a href="panel">Virtual Office</a>
                                    <a href="?p=gallery">Galeri</a>
                                </div>                                
                            </div>
                            <!-- ./quick links -->
                            
                            <!-- recent tweets -->
                            <div class="col-md-3">
                                <h3>Artikel Terbaru</h3>
                                
                                <div class="list small">
	<?php
		include("include/koneksi.php");
		$sqlArt = "SELECT * FROM artikel where publik=1 order by updated desc limit 5";
		$rsArt = mysqli_query($conn,$sqlArt);
		while($data = $rsArt->fetch_assoc())
		{
	?>
			<div class="item">
				<div class="text">
					<a href="?p=artikel&i=<?=$data["ID"]?>"><b><?=$data["Judul"]?></b></a>
					<?=substr(strip_tags(strip_tags($data["Isi"])),0,100)?> <b><a href="?p=artikel&i=<?=$data["ID"]?>">[more]</a></b>
				</div>
			</div>
	<?php
		}
	?>

                                </div>
                                
                            </div>
                            <!-- ./recent tweets -->
                            
                            <!-- contacts -->
                            <div class="col-md-3">
                                <h3>Contacts</h3>
                                
                                <div class="footer-contacts">
                                    <div class="fc-row">
                                        <span class="fa fa-home"></span>
                                        Pertokoan Ardi Mulyo<br/>Jl. Ahmad Yani, Kepanjen, Kabupaten Malang
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-phone"></span>
                                        (+62) 8-1665-7589
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-envelope"></span>
                                        <strong>Customer Service</strong><br>
                                        <a href="mailto:cs.alihbelanja@gmail.com">cs.alihbelanja@gmail.com</a>
                                    </div>                                    
                                </div>
                                                                
                            </div-->
                            <!-- ./contacts -->
                            
                        </div>
                        
                    </div>
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-darken-gray">
                    <!-- page footer holder -->
                    <div class="page-footer-holder">
                        
                        <!-- copyright -->
                        <div class="copyright">
                            &copy; 2024 alihbelanja.com Powered by <a href="https://twitter.com/udinmx">Kutu Komputel</a> | All Rights Reserved                            
                        </div>
                        <!-- ./copyright -->
                        
                        <!-- social links -->
                        <div class="social-links">
                            <a href="https://facebook.com/udinmx"><span class="fa fa-facebook"></span></a>
                            <a href="https://twitter.com/udinmx"><span class="fa fa-twitter"></span></a>
                            <a href="https://id.linkedin.com/in/muhammadzaenudin"><span class="fa fa-linkedin"></span></a>
                        </div>                        
                        <!-- ./social links -->
                        
                    </div>
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
