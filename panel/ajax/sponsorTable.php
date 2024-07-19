			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Bonus </strong> Sponsor</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body table-responsive">                                                                        

					<p>Status Pensponsoran & Bonus Sponsor</p>
					<table class="table datatable table-striped table-hover dt-responsive display nowrap" id="TableSponsor">
						<thead>
							<tr align="center">
								<th rowspan="2" width="20px">No</th>
								<th rowspan="2" width="100px">Tanggal</th>
								<th colspan="2">Referensi</th>
								<th rowspan="2" width="60px">Bonus</th>
							</tr>
							<tr align="center">
								<th width="100px">NOID</th>
								<th>Nama</th>
							</tr>
						</thead>
						<tbody>
						<?php
$sql="SELECT noid,fnGetMemberNama(noid) nama,tanggal,ref,fnGetMemberNama(ref) namaref,bonus FROM `bsponsor` where noid='".$_SESSION['sjn58']."'";

require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$nosp=0;$tbspon=0;
while($Sponsor = $rssql->fetch_assoc())
{$nosp++;
?>
							<tr>
								<td><?=$nosp?></td>
								<td><?=$Sponsor['tanggal']?></td>
								<td><?=$Sponsor['ref']?></td>
								<td><?=$Sponsor['namaref']?></td>
								<td align="right"><?=number_format($Sponsor['bonus'])?></td>
							</tr>
<?php 
$tbspon+=$Sponsor['bonus'];

}
?>
						</tbody>
						<tfoot style="font-weight:bold;">
							<tr align="center">
								<td colspan="3">Total<td>
								<td align="right"><?=number_format($tbspon)?></td>
							</tr>
						</tfoot>
					</table>                                
 

				</div>
				<div class="panel-footer">
					<!--button class="btn pull-left" data-toggle="modal" data-target="#ModalDaftar" onclick="ModalDaftar(1)">Daftarkan Mahasiswa</button-->					
					<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalDaftar" onclick="ModalDaftar(0)">Daftarkan Member</button>
				</div>
			</div>


