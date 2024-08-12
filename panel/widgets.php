<?php 
$widgetsPath="widgets";
?>
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 20px; background: rgb(60,75,180);
                                    background: linear-gradient(90deg, rgba(60,75,180,1) 16%, rgba(30,140,240,0.9) 50%, rgba(90,65,250,0.9) 100%);">
                            <div class="row" style="background-color: rgba(50, 50, 50, 0.7);">
                                <div class="col-md-8 panel-body">
                            		<h3 style="font-family:'Courier New';color:white;">
                            			<strong>Informasi</strong>
                            			<span class="pull-right"><?= date('d-m-Y H:i:s'); ?></span>
                            	    </h3>
                                    <marquee style="font-family:'Courier New'; color:white; font-size:20px">
                                            <?php include("$widgetsPath/rostatus.php");?>
                                    </marquee>
                            	</div>
                                <div class="col-md-4 panel-body">
                                    <div class="btn-group btn-group-justified">
                                        <a type="button" class="btn btn-lg btn-default" href="#" onclick="ModalRO('<?=$unoid?>')">
                                            <i class="fa fa-shopping-cart" style="font-size : 20px;"></i><br>
                                            <span class="text-small">RO</span>
                                        </a>
                                        <a type="button" class="btn btn-lg btn-default" href="#" onclick="ModalDaftar(4)">
                                            <i class="fa fa-user" style="font-size : 20px;"></i> <br>
                                            <span class="text-left text-small">Mendaftar</span>
                                        </a>
                                        <a type="button" class="btn btn-lg btn-default" href=".?p=widraw">
                                            <i class="fa fa-usd" style="font-size: 20px;"></i> <br>
                                            <span style="text-align: left; font-size: 14px;">Tarik Dana</span> 
                                        </a>
                                    </div>
                            	</div>     
                            </div>
                        </div> 
					</div>
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
							<?php
								include("$widgetsPath/bonus.php");
							?>
                           <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
 							<?php 
								include("$widgetsPath/member.php");
							?>
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
							<?php 
								include("$widgetsPath/leader.php");
							?>
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
							<?php 
								include("$widgetsPath/prestasi2.php");
							?>
                            
                        </div>
                    </div>
 