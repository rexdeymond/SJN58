<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Riwayat Komisi <strong>Bulan - <?php echo date('M Y'); ?></strong></h3>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="TableDtlBonus">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th colspan="2">Komisi/Bonus</th>
                        <th>Ket. Referensi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get the current month and year
                    $currentMonth = date('m');
                    $currentYear = date('Y');

                    // SQL Query (with prepared statement)
                    $sql = "SELECT noid, fnGetMemberNama(noid) nama, tanggal, ref, fnGetMemberNama(ref) namaref, bonus, ket, ketstatus 
                            FROM `vwbonus` 
                            WHERE noid = ? 
                            AND MONTH(tanggal) = ? AND YEAR(tanggal) = ? 
                            ORDER BY tanggal DESC";

                    require_once("../include/koneksi.php");

                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sss", $_SESSION['sjn58'], $currentMonth, $currentYear); 
                    mysqli_stmt_execute($stmt);
                    $rssql = mysqli_stmt_get_result($stmt);

                    $nosp = 0;
                    $tbonus = 0;
                    while ($bonus = $rssql->fetch_assoc()) {
                        $nosp++;
                    ?>
                        <tr>
                            <td><?= $nosp ?></td>
                            <td><?= $bonus['tanggal'] ?></td>
                            <td class="text-bold"><?= $bonus['ket'] ?></td>
                            <td class="text-bold text-right">Rp. <?= number_format($bonus['bonus']) ?>,-</td>
                            <td><?= $bonus['ref'] ?> - <?= $bonus['namaref'] ?></td>
                        </tr>
                    <?php
                        $tbonus += $bonus['bonus'];
                    }
                    mysqli_stmt_close($stmt); 
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total Komisi</td>
                        <td colspan="2" align="right" class="text-bold">Rp. <?= number_format($tbonus) ?>,-</td>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div>
</div>