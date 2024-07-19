            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="..">Alihbelanja</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
					<?php
					$pathimg="assets/images/users/";
					$imgmfile=$pathimg."default.png";
					if(isset($_SESSION['sjn58']))
					{
						$validext=array("jpg","jpe","jpeg","jfif","gif","png");
						for($i=0;$i<count($validext);$i++)
						if(file_exists(strtolower($pathimg.$_SESSION['sjn58'].".".$validext[$i])))
						{
							$imgmfile=strtolower($pathimg.$_SESSION['sjn58'].".".$validext[$i]);
						}
					}
					?>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <!--img src="images.php?f=<?=$imgmfile?>&w=100&h=100&zzz=<?=rand()?>" alt="<?=$_SESSION['sjn58'].">>".$pathimg.".".$_SESSION['sjn58'].".".$validext[0]?>"/-->
                            <img src="<?=$imgmfile?>" alt="<?=$_SESSION['sjn58'].">>".$pathimg.".".$_SESSION['sjn58'].".".$validext[0]?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <!--img src="images.php?f=<?=$imgmfile?>&w=500&h=500&zzz=<?=rand()?>" alt="<?=$_SESSION['sjn58']?>"/-->
                                <img src="<?=$imgmfile?>" alt="<?=$_SESSION['sjn58']?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?=$unoid?></div>
                                <div class="profile-data-title"><?=$unama?></div>
                            </div>
                        </div>                                                                        
                    </li>
                   
                    <li class="xn-title">Navigation</li>
					
					<?php
					include("../include/koneksi.php");
					$SQL="SELECT DISTINCT menu.MenuID,Name,Link,Icon,fnGetSubMenuCount(menu.MenuID) Sub FROM menu,usermenu WHERE level='1' AND active=1 and  ((menu.menuID=usermenu.menuID and (usermenu.userid='".$_SESSION['sjn58']."' OR usermenu.userid=fnGetUsergroup('".$_SESSION['sjn58']."'))) OR menu.Public=1) ORDER BY seq";
					//echo $SQL;
					$rsMenu=mysqli_query($conn,$SQL)   or die(mysqli_error($conn));
					while($data=$rsMenu->fetch_row())
					{
					?>
                    <li class="<?=$data[4]>0?"xn-openable":""?>">
                        <a href="<?=$data[2]==""?"#":$data[2]?>"><span class="<?=$data[3]?>"></span> <span class="xn-text"><?=$data[1]?></span></a>
						<?php 
						if($data[4]>0)
						{
						?>
                        <ul>
						<?php
							$SQLSub="SELECT DISTINCT menu.MenuID,Name,Link,Icon,fnGetSubMenuCount(menu.MenuID) Sub FROM menu,usermenu WHERE LEFT(menu.menuID,2)='".$data[0]."' AND LEVEL='2' AND active=1  and  ((menu.menuID=usermenu.menuID and (usermenu.userid= '".$_SESSION['sjn58']."' OR usermenu.userid=fnGetUsergroup('".$_SESSION['sjn58']."'))) OR menu.Public=1) ORDER BY seq";
							//echo $SQLSub;
							$rsSub=mysqli_query($conn,$SQLSub)  or die(mysqli_error($conn));
							while($dataSub=$rsSub->fetch_row())
							{
							?>
                            <li class="<?=$dataSub[4]>0?"xn-openable":""?>">
                                <a href="<?=$dataSub[2]==""?"#":$dataSub[2]?>"><span class="<?=$dataSub[3]?>"></span> <?=$dataSub[1]?></a>
								<?php 
								if($dataSub[4]>0)
								{
								?>
                                <ul>
								<?php
									$SQLSub2="SELECT DISTINCT menu.MenuID,Name,Link,Icon,fnGetSubMenuCount(menu.MenuID) Sub FROM menu,usermenu WHERE LEFT(menu.menuID,4)='".$dataSub[0]."' AND LEVEL='3' AND active=1  and (( menu.menuID=usermenu.menuID and (usermenu.userid= '".$_SESSION['sjn58']."' OR usermenu.userid=fnGetUsergroup('".$_SESSION['sjn58']."'))) OR menu.Public=1) ORDER BY seq";
									//echo $SQLSub2;
									$rsSub2=mysqli_query($conn,$SQLSub2)  or die(mysqli_error($conn));
									while($dataSub2=$rsSub2->fetch_row())
									{
									?>
									<li class="<?=$dataSub2[4]>0?"xn-openable":""?>">
										<a href="<?=$dataSub2[2]==""?"#":$dataSub2[2]?>"><span class="<?=$dataSub2[3]?>"></span> <?=$dataSub2[1]?></a>
                                    </li>
									<?php
									}
									mysqli_free_result($rsSub2);								
									?>
									</ul>
								<?php
								}
								?> 
                            </li>
							<?php
							}
							mysqli_free_result($rsSub);								

						?>
                        </ul>
 						
						<?php
						}
						?>
                    </li>
					
					<?php 
					}
					mysqli_free_result($rsMenu);								

					?> 
                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
