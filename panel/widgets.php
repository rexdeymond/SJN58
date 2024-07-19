<?php 
$widgetsPath="widgets";
?>
                    <div class="row">
                        <div class="col-md-12">
 							<?php 
								include("$widgetsPath/rostatus.php");
							?>
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
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col" title='Belanja'>
                                        <a href="#" onclick="ModalRO('<?=$unoid?>')" ><span class="fa fa-shopping-cart"></span></a>
                                    </div>
                                    <div class="col" title='Daftarkan member'>
                                        <a href="#" onclick="ModalDaftar(4)" ><span class="fa fa-user"></span></a>
                                    </div>
                                    <div class="col" title='Penarikan Dana'>
                                        <a href=".?p=widraw" ><span class="fa fa-usd"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
 