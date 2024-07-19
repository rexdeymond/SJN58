<?php 
$tanggal=isset($_GET['tanggal'])?$_GET['tanggal']:(isset($_POST['tanggal'])?$_POST['tanggal']:"");//Date from query
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Bonus </strong></h3>
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
								<th width="20px">No</th>
								<th width="80px">Periode</th>
								<th >Bonus</th>
								<th>Nominal Bonus</th>
							</tr>
						</thead>
						<tbody>
						<?php
$sql="SELECT left(tanggal,7) as periode,ket,sum(bonus) as totbonus FROM vwbonus WHERE left(tanggal,7)=left('$tanggal',7) GROUP BY ket"; 
require_once("../../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$nosp=0;$tbonus=0;
while($Bonus = $rssql->fetch_assoc())
{$nosp++;
?>
							<tr>
								<td><?=$nosp?></td>
								<td><?=$Bonus['periode']?></td>
								<td><?=$Bonus['ket']?></td>
								<td align="right"><?=number_format($Bonus['totbonus'])?></td>
							</tr>
<?php 
$tbonus+=$Bonus['totbonus'];
}
?>
						</tbody>
						<tfoot style="font-weight:bold;">
							<tr align="center"> 
								<td colspan="2">Total<td>
								<td align="right"><?=number_format($tbonus)?></td>
							</tr>
						</tfoot>
					</table>                                
 

				</div>

			</div>


<script>
$(document).ready(function() {
    $('#TableBonus').DataTable({"pageLength": 10});
} );
</script> 