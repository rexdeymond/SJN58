<?php 
$tanggal=isset($_GET['tanggal'])?$_GET['tanggal']:(isset($_POST['tanggal'])?$_POST['tanggal']:"");//Date from query
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Bonus </strong>Total</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body table-responsive">                                                                        
					<table class="table datatable table-striped table-hover dt-responsive display nowrap" id="TableBonus">
						<thead>
							<tr align="center">
								<th width="20px" rowspan="2">No</th>
								<th width="80px" rowspan="2">Periode</th>
								<th rowspan="2">Keterangan</th>
								<th colspan="2">Nominal Bonus</th>
							</tr>
							<tr align="center">
								<th>Pending</th>
								<th>Aktif</th>
							</tr>
						</thead>
						<tbody>
						<?php
$sql="SELECT left(tanggal,7) periode,sum( case when status>0 then 0 else bonus end) pending,sum( case when status>0 then bonus else 0 end) bonus,ket FROM vwbonus WHERE noid='".$_SESSION['sjn58']."' GROUP BY ket,left(tanggal,7) order BY left(tanggal,7) desc,ket"; 
require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$nosp=0;$tbonus=0;$tjbonus=0;$tpending=0;
while($Bonus = $rssql->fetch_assoc())
{$nosp++;
?>
							<tr>
								<td><?=$nosp?></td>
								<td><?=$Bonus['periode']?></td>
								<td><?=$Bonus['ket']?></td>
								<td align="right"><?=number_format($Bonus['pending'])?></td>
								<td align="right"><?=number_format($Bonus['bonus'])?></td>
							</tr>
<?php 
$tbonus+=$Bonus['bonus'];
$tpending+=$Bonus['pending'];
}
?>
						</tbody>
						<tfoot style="font-weight:bold;">
							<tr align="center"> 
								<td colspan="2">Total<td>
								<td align="right"><?=number_format($tpending)?></td>
								<td align="right"><?=number_format($tbonus)?></td>
							</tr>
						</tfoot>
					</table>                                
 

				</div>

			</div>


