<?php 
$tanggal=isset($_GET['tanggal'])?$_GET['tanggal']:(isset($_POST['tanggal'])?$_POST['tanggal']:"");//Date from query
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Pin </strong>RO</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body table-responsive">                                                                        
						<table class="table table-striped" id="TableBonus">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Stokis</th>
									<th colspan="2">Pin</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT pin.kodepin AS pin, pin.publik AS sts, stokist.nama AS stok, produk.nama as produk
										FROM pin 
										JOIN produk ON pin.kdbrg = produk.kdbrg AND produk.publik = '1'
										JOIN stokist ON pin.nostok = stokist.nostok 
										WHERE pin.kdbrg NOT IN ('REG') AND pin.publik = '1' AND ownedby = ? ORDER BY pin.created ASC";

								require_once("../include/koneksi.php");
								$stmt = $conn->prepare($sql);

								if (!$stmt) {
									die("Error preparing statement: " . $conn->error);
								}

								$stmt->bind_param("s", $_SESSION['sjn58']);

								$stmt->execute();

								$result = $stmt->get_result();

								$i = 1;
								while ($pin = $result->fetch_assoc()) {
									$status = match ($pin['sts']) {
										'1' => 'Belum di pakai',
										'2' => 'Sudah digunakan',
										default => 'Pin Tidak terdaftar',
									};
									?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $pin['stok'] ?></td>
										<td><?= $pin['produk'] ?></td>
										<td><?= $pin['pin'] ?></td>
										<td>Belum digunakan</td>
									</tr>
									<?php
									$i++;
								}

								$stmt->close();
								?>
							</tbody>
						</table>
				</div>
			</div>


