<?php 
require_once("../include/koneksi.php");

$SQL="SELECT *,fnGetMemberKodeLvl(noid,0) kodelvl,fnGetMemberLvl(noid,0) lvl FROM member WHERE noid='".$_SESSION['sjn58']."' limit 1";
$rsUser=mysqli_query($conn,$SQL)   or die(mysqli_error($conn));
while($user=$rsUser->fetch_assoc())
{
	$unoid=$user['noid'];
	$unama=$user['nama'];
	$ukdlv=$user['kodelvl'];
	$ulvl=$user['lvl'];
}
?>
	<div class="col-md-12">
		
		<form class="form-horizontal" name="frmjar" id="frmjar" method="post" onsubmit="return List()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Peta </strong> Jaringan</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        

					<div class="row">
						<div class="col-md-12">

							<div class="row">
								<div class="form-group">
									<label class="col-md-2 control-label">Filter</label>
									<div class="col-md-10">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-home"></span></span>
											<input type="text" class="form-control" name="txtfilter" placeholder="Filter untuk NOID, Nama, atau Kota"/>
										</div>                                            
										<span class="help-block">Filter Pencarian</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<button class="btn btn-primary pull-right">Tampilkan</button>
				</div>
			</div>
		</form>
	</div>
