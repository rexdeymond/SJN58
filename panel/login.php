<?php
//header("Location: https://sjn58.store/panel/off.php");
session_start();
date_default_timezone_set('Asia/Jakarta');
if(isset($_COOKIE['sjn58'])){$_SESSION['sjn58']=$_COOKIE['sjn58'];}
if(isset($_SESSION['sjn58'])){header("Location:.");exit();}
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>SJN58.com - Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../img/logo-small.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
		<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        

		<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
		<script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
		<script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
		<script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            
		
		<script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
		<script type='text/javascript' src='../js/general.js'></script>

		<script>
		function SubmitLogin()
		{
			var txt="";
			if (document.frmlogin.txtuserid.value.length<3)
			{
				txt=txt+"Username harus diisi. ";
			}
			if(document.frmlogin.txtpassword.value.length<1)
			{
				txt=txt+"Password harus diisi. ";
			}
			if(txt!="")
			{
				noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
				//UIkit.notify(txt,{pos:'top-center',status:'danger'});
				return false;
			}
			else
			{
				//alert("login");
				xmlhttpPost2("actions.php?a=login","frmlogin","index.php","Login... Please wait...");

			}
			return false;
		}
		</script>

    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <a href=".."><div class="login-logo"></div></a>
                <div class="login-body">
                    <div class="login-title" style="text-shadow: #000000 0px 0px 30px;"><strong>Log In</strong> to your account</div>
                    <form action="#" class="form-horizontal" name="frmlogin" method="post" onsubmit="return SubmitLogin();">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="txtuserid" placeholder="User ID"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="txtpassword" id="txtpassword" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6" style="text-shadow: #000000 0px 0px 20px;">
                            <label class="login-footer"><input type="checkbox" name="chkshowpas" onclick="ShowPass()"> Show Password</label>
                        </div>

                        <div class="col-md-6" style="text-shadow: #000000 0px 0px 20px;">
                            <label class="login-footer"><input type="checkbox" name="chkRemember" value="1"> Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6" style="position: static;">
							<div class="login-subtitle"> Sudah punya akun?
								<button type="submit" class="btn btn-info btn-block">Log In</button>
							</div>
                         </div>
						 					<!--div class="login-or ">Atau</div-->
                        <div class="col-md-6" style="position: static;">
							<div class="login-subtitle">
								Belum punya akun? <a class="btn btn-block btn-google pull-right" data-target="#ModalDaftar" onclick="ModalDaftar(4)" style="color:white;">Daftar</a>
							</div>
                        </div>
                    </div>

                    <!--div class="form-group">
                        <div class="col-md-6">
                            <a class="btn btn-block btn-success" data-target="#ModalDaftar" onclick="ModalDaftar(1)"><span class="fa fa-book"></span> Mahasiswa</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-block btn-google pull-right" data-target="#ModalDaftar" onclick="ModalDaftar(0)"><span class="fa fa-users"></span> Member</a>
                        </div>
                    </div-->
                    </form>
                </div>
                <div class="login-footer" style="text-shadow: #000000 0px 0px 30px;">
                    <div class="pull-left">
                        &copy; 2024 sjn58.com
                    </div>
                    <div class="pull-right">
                        <a href="..">Home</a> |
                        <a href="#">Privacy</a> |
                        <a href="http://twitter.com/udinmx">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>

		<div id="appenddedForm"></div>
       
    </body>
</html>
<script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
<script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
<script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
<script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            

<script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
<script type="text/javascript" src="js/plugins/typeahead/typeahead.js"></script>

<script>
function ModalDaftar(posisi){
	$.ajax({
		type 		: "POST",
		url			: "ajax/daftar.php",
		chache		:	false,
		data		:	{posisi:posisi},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalDaftar').modal('show');
						},
		datatype	:	"html"
	});
	return false;
}

function ModalDialog(title,content){
	$.ajax({
		type 		: "POST",
		url			: "ajax/modalAJAX.php",
		chache		:	false,
		data		:	{title:title, content:content},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#DialogModal').modal('show');
						},
		datatype	:	"html"
	});
	return false;
}
function ShowPass() {
  var x = document.getElementById("txtpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
<?php
if($_GET['daftar']==1){
	?>
	$( document ).ready(function() {ModalDaftar(0);});
	<?php
	
}
?>
</script>






