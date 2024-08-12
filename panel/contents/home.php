	<!-- START WIDGETS -->                    
	<?php include("widgets.php");?>
	<!-- END WIDGETS -->
    <div class="col-md-8" style="margin-top: 40px;">
        <div class="row panel-body" style="background: rgb(250,50,50,0.7);">           
			<div class="clearfix"></div>
			<ul class="nav nav-tabs" role="tablist">
                <li class="active">
					<a class="btn btn-lg btn-default" href="#btot" role="tab" data-toggle="tab">Komisi Akumulasi</a>
				</li>
                <li>
					<a class="btn btn-lg btn-default" href="#bbulan" role="tab" data-toggle="tab">Komisi Bulanan</a>
				</li>
                <li>
					<a class="btn btn-lg btn-default" href="#pdaf" role="tab" data-toggle="tab">Pin Pendaftaran</a>
				</li>
                <li>
					<a class="btn btn-lg btn-default" href="#pro" role="tab" data-toggle="tab">Pin RO</a>
				</li>
            </ul>              
            <div class="tab-content">
                <div class="tab-pane active" id="btot">
					<div class="panel panel-default" style="margin-top: 20px; background: rgb(20,20,20,0.5);">
						<div class="panel-body">
							<div class="row">
								<?php include("ajax/bonusTable.php"); ?>
							</div>
						</div>
					</div>
				</div>
                <div class="tab-pane" id="bbulan">
					<div class="panel panel-default" style="margin-top: 20px; background: rgb(20,20,20,0.5);">
						<div class="panel-heading">
							<h3 class="panel-title"><strong>Laporan Bulan </strong><?php echo date('M Y'); ?></h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<?php include("widgets/bonustot.php");?>
								<?php include("ajax/allbonusTable.php"); ?>
							</div>
						</div>
					</div>
				</div>
                <div class="tab-pane" id="pdaf">
					<div class="panel panel-default" style="margin-top: 20px; background: rgb(20,20,20,0.5);">
						<div class="panel-body">
							<div class="row">
								<?php include("ajax/pdaftar.php"); ?>
							</div>
						</div>
					</div>
				</div>
                <div class="tab-pane" id="pro">
					<div class="panel panel-default" style="margin-top: 20px; background: rgb(20,20,20,0.5);">
						<div class="panel-body">
							<div class="row">
								<?php include("ajax/pdro.php"); ?>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-top: 40px;">
        <div class="row panel-body" style="background: rgb(20,50,50,0.7);">  
            <?php include("widgets/memberin.php");?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Statistik </strong>Bonus</h3>
				</div>
				<div class="panel-body">
					<div id="chartBonus" style="height:500px"><svg></svg></div>
				</div>
			</div>
        </div>
    </div>