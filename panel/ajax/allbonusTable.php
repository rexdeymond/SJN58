			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Laporan <strong>Bonus </strong></h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body table-responsive">                                                                        

					<p>Status Bonus</p>
					<table class="table datatable table-striped table-hover dt-responsive display nowrap" id="TableDtlBonus">
						<thead>
							<tr align="center">
								<th rowspan="2" width="20px">No</th>
								<th rowspan="2" width="100px">Tanggal</th>
								<th colspan="2">Referensi</th>
								<th rowspan="2" width="60px">Bonus</th>
								<th rowspan="2" width="200px">Jenis Bonus</th>
								<th rowspan="2" width="100px">Keterangan</th>
							</tr>
							<tr align="center">
								<th width="100px">NOID</th>
								<th>Nama</th>
							</tr>
						</thead>
						<tbody>
						<?php
$sql="SELECT noid,fnGetMemberNama(noid) nama,tanggal,ref,fnGetMemberNama(ref) namaref,bonus,ket,ketstatus FROM `vwbonus` where noid='".$_SESSION['sjn58']."' ORDER BY tanggal DESC";

require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$nosp=0;$tbonus=0;
while($bonus = $rssql->fetch_assoc())
{$nosp++;
?>
							<tr>
								<td><?=$nosp?></td>
								<td><?=$bonus['tanggal']?></td>
								<td><?=$bonus['ref']?></td>
								<td><?=$bonus['namaref']?></td>
								<td align="right"><?=number_format($bonus['bonus'])?></td>
								<td><?=$bonus['ket']?></td>
								<td><?=$bonus['ketstatus']?></td>
							</tr>
<?php 
$tbonus+=$bonus['bonus'];
}
?>
						</tbody>
						<tfoot style="font-weight:bold;">
							<tr align="center">
								<td colspan="3">Total<td>
								<td align="right"><?=number_format($tbonus)?></td>
								<td > <td>
							</tr>
						</tfoot>
					</table>                                
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalDaftar" onclick="ModalDaftar(0)">Daftarkan Member</button>
				</div>
			</div>


