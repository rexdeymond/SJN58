<?php  $lampau = date('Y-m-d', strtotime('-30 days'));
    $sql="SELECT noid, nama, tglaktif  FROM `member` WHERE tglaktif >= '$lampau'  ORDER BY tgldaftar DESC LIMIT 10";
?>
<div class="widget widget-default widget-carousel">
    <div class="owl-carousel" id="owl-example">
        <?php
        $i = 1;
        $rssql = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($data = $rssql->fetch_assoc()) { ?>
            <div>
                <div class="widget-title">Selamat Begabung - <small><?= date('d-m-Y', strtotime($data['tglaktif'])); ?></small></div>
                <div class="widget-subtitle"><?= strtoupper($data['nama']); ?></div>
                <div class="widget-title"><?= strtoupper($data['noid']); ?></div>
            </div>
        <?php
            $i++;
        }
        ?>
    </div>
</div>