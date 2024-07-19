	<div class="col-md-12">
		<form class="form-horizontal" name="frmPassword" id="frmPassword" method="post" onsubmit="return savePassword()">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Update </strong>Password</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        
					<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">UserID</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-male"></span></span>
										<input type="text" class="form-control" name="txtUserID" disabled="disabled"  value="<?=$unoid." - ".$unama?>" />

									</div>                                            
									<span class="help-block">User ID</span>
								</div>
							</div>
						</div>
						<div class="col-md-8">


						</div>


					</div>
					<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Old Password</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-star"></span></span>
										<input type="password" class="form-control" name="txtOldPass"  />

									</div>                                            
									<span class="help-block">Ketik password lama Anda</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">New Password</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-star-half-o"></span></span>
										<input type="password" class="form-control" name="txtNewPass"  />

									</div>                                            
									<span class="help-block">Ketik password baru Anda</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">

							<div class="form-group">
								<label class="col-md-3 control-label">Confirm Password</label>
								<div class="col-md-9">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-star-o"></span></span>
										<input type="password" class="form-control" name="txtNewPass2"  />

									</div>                                            
									<span class="help-block">Ketik sekali lagi password baru Anda</span>
								</div>
							</div>
						</div>
					</div>
	
				</div>
				<div class="panel-footer">
					<button class="btn btn-default" type="reset">Batal</button>                                    
					<button class="btn btn-primary pull-right">Simpan</button>
				</div>
			</div>
		</form>
	</div>