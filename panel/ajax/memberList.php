	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Daftar </strong> Member</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body table-responsive">                                                                        

				<table id="TabelAgen" class="table datatable table-striped table-hover dt-responsive display nowrap">
					<thead>
						<tr>
							<th width="120px" align="center">NOID</th>
							<th align="left">Nama</th>
							<th align="center" width="150px">Kota</th>
							<th align="center" width="150px">Tgl Daftar</th>
							<th align="center" width="50px">Lihat</th>
						</tr>
					</thead>
					<tbody>
					<?php
					include("../../include/koneksi.php");
					$search=$_POST['txtfilter'];
					$kdlvl=(isset($_POST['kdlvl'])?$_POST['kdlvl']:(isset($_GET['kdlvl'])?$_GET['kdlvl']:"56565")).'%';
					$sqlAg = "SELECT *,fnGetMemberKodeLvl(noid,0) kodelvl FROM `member` where (noid like '%$search%' or nama like '%$search%' or hp like '%$search%' or kota like '%$search%') AND fnGetMemberKodeLvl(noid,0) like '$kdlvl';";
					$RSAg = mysqli_query($conn,$sqlAg);
					while($Ag = $RSAg->fetch_assoc())
					{
					?>
						<tr>
							<td><?=$Ag['noid']?></td>
							<td><?=$Ag['nama']?></td>
							<td><?=$Ag['kota']?></td>
							<td><?=$Ag['tgldaftar']?></td>
							<td>
									<button class="btn btn-primary" title="View" onclick="Jaring('<?=$Ag['kodelvl']?>')"><i class="fa fa-eye"></i></button>
								
							</td>
						</tr>
					<?php
					}
					mysqli_free_result($RSAg);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$("#TabelAgen").dataTable();
	})
	</script>