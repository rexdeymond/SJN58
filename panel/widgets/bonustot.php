<?php 

$sql = "SELECT 
            m.noid AS NoID, 
            m.nama AS nama, 
            (SELECT COUNT(DISTINCT sp.ref) FROM bsponsor sp WHERE sp.noid = m.noid AND MONTH(sp.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(sp.tanggal) = YEAR(CURRENT_DATE())) AS qsp, 
            (SELECT COALESCE(SUM(sp.bonus), 0) FROM bsponsor sp WHERE sp.noid = m.noid AND MONTH(sp.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(sp.tanggal) = YEAR(CURRENT_DATE())) AS tsp,
            (SELECT COUNT(DISTINCT pr.ref) FROM bpresenter pr WHERE pr.noid = m.noid AND MONTH(pr.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(pr.tanggal) = YEAR(CURRENT_DATE())) AS qpr,
            (SELECT COALESCE(SUM(pr.bonus), 0) FROM bpresenter pr WHERE pr.noid = m.noid AND MONTH(pr.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(pr.tanggal) = YEAR(CURRENT_DATE())) AS tpr,
            (SELECT COUNT(DISTINCT dag.ref) FROM bdaftar dag WHERE dag.noid = m.noid AND dag.ket = 'GRUP' AND MONTH(dag.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(dag.tanggal) = YEAR(CURRENT_DATE())) AS qdag, 
            (SELECT COALESCE(SUM(dag.bonus), 0) FROM bdaftar dag WHERE dag.noid = m.noid AND dag.ket = 'GRUP' AND MONTH(dag.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(dag.tanggal) = YEAR(CURRENT_DATE())) AS tdag,
            (SELECT COUNT(DISTINCT dao.ref) FROM bdaftar dao WHERE dao.noid = m.noid AND dao.ket = 'GLOBAL' AND MONTH(dao.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(dao.tanggal) = YEAR(CURRENT_DATE())) AS qdao, 
            (SELECT COALESCE(SUM(dao.bonus), 0) FROM bdaftar dao WHERE dao.noid = m.noid AND dao.ket = 'GLOBAL' AND MONTH(dao.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(dao.tanggal) = YEAR(CURRENT_DATE())) AS tdao
        FROM member m
        WHERE m.noid = '{$_SESSION['sjn58']}'"; 

require_once("../include/koneksi.php");
$rssql=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$data = $rssql->fetch_assoc(); // Fetch the single row of results

// Extract variables (no need for a loop since we expect only one row)
$qsp = $data['qsp']; 
$tsp = $data['tsp'];
$qpr = $data['qpr'];
$tpr = $data['tpr'];
$qdag = $data['qdag'];
$tdag = $data['tdag'];
$qdao = $data['qdao'];
$tdao = $data['tdao'];

?>
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="d-flex justify-content-between align-items-center mb-3"> 
						<h5 class="mb-1">Komisi Sponsor<h5>
					</div>
					<div class="d-flex justify-content-between align-items-end">
						<div class="role-heading">
							<h6 class="fw-normal mb-0 text-body">Rp. <?= number_format($tsp) ?>,- </h6>
							<span>dari <?= $qsp ?> member</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="d-flex justify-content-between align-items-center mb-3"> 
						<h5 class="mb-1">Komisi Presenter<h5>
					</div>
					<div class="d-flex justify-content-between align-items-end">
						<div class="role-heading">
							<h6 class="fw-normal mb-0 text-body">Rp. <?= number_format($tpr) ?>,- </h6>
							<span>dari <?= $qpr ?> member</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="d-flex justify-content-between align-items-center mb-3"> 
						<h5 class="mb-1">Komisi GRUP<h5> 
					</div>
					<div class="d-flex justify-content-between align-items-end">
						<div class="role-heading">
						    <h6 class="fw-normal mb-0 text-body">Rp. <?= number_format($tdag) ?>,- </h6>
							<span>dari <?= $dag ?> member</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="d-flex justify-content-between align-items-center mb-3">
					    <h5 class="mb-1">Komisi GLOBAL<h5>
					</div>
					<div class="d-flex justify-content-between align-items-end">
						<div class="role-heading">
							<h6 class="fw-normal mb-0 text-body">Rp. <?= number_format($tdao) ?>,- </h6>
							<span>dari <?= $dao ?> member</span>
						</div>
					</div>
				</div>
			</div> 								
		</div> 
	</div>
