	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Daftar </strong> Artikel</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body">                                                                        

				<table id="TabelArtikel" class="table datatable">
					<thead>
						<tr>
							<th width="80px" align="center">ID</th>
							<th align="center">Judul</th>
							<th align="center" width="150px">Category</th>
							<th align="center" width="100px">Creator</th>
							<th align="center" width="150px">Created Date</th>
							<th align="center" width="200px">Edit</th>
						</tr>
					</thead>
					<tbody>
					<?php
					include("../../include/koneksi.php");
					$sqlArt = "SELECT *,fnGetArtikelCategory(ID) Cat FROM `artikel`;";
					$RSArt = mysqli_query($conn,$sqlArt);
					while($Art = $RSArt->fetch_assoc())
					{
					?>
						<tr>
							<td><?=$Art['ID']?></td>
							<td><?=$Art['Judul']?></td>
							<td><?=$Art['Cat']?></td>
							<td><?=$Art['Created_By']?></td>
							<td><?=$Art['Created']?></td>
							<td><div class="btn-group btn-group-xs">
									<button class="btn btn-warning" title="<?=($Art['Publik']==1?"Publik":"Non-Publik")?>" onclick="ConfirmDialog(&quot;<?=($Art['Publik']==1?"Non-Publikasi":"Publikasi")?> Artikel?&quot;,&quot; Ingin <?=($Art['Publik']==1?"menon-publikasikan":"mempublikasikan")?> Artikel <?=$Art['ID']?> - <?=$Art['Judul']?>?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-flag&quot;,&quot;waning&quot;,&quot;publikArtikel('<?=$Art['ID']?>')&quot;)"><i class="<?=($Art["Publik"]==1?"fa fa-check-square-o":"fa fa-square-o")?>"></i></button>
									<button class="btn btn-primary" title="Edit Artikel" onclick="reform('<?=$Art['ID']?>')"><i class="fa fa-pencil"></i></button>
									<button class="btn btn-danger" title="Hapus Artikel" onclick="ConfirmDialog(&quot;Hapus Artikel?&quot;,&quot; Yakin ingin menghapus Artikel '<?=$Art['ID']?>' - '<?=$Art['Judul']?>'?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;delArtikel('<?=$Art['ID']?>')&quot;)"><i class="fa fa-trash-o"></i></button>
								</div>
							</td>
						</tr>
					<?php
					}
					mysqli_free_result($RSArt);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$("#TabelArtikel").dataTable();
	})
	</script>