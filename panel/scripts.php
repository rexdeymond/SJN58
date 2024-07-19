
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        
        <script type="text/javascript" src="js/plugins/codemirror/codemirror.js"></script>        
        <script type='text/javascript' src="js/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script type='text/javascript' src="js/plugins/codemirror/mode/xml/xml.js"></script>
        <script type='text/javascript' src="js/plugins/codemirror/mode/javascript/javascript.js"></script>
        <script type='text/javascript' src="js/plugins/codemirror/mode/css/css.js"></script>
        <script type='text/javascript' src="js/plugins/codemirror/mode/clike/clike.js"></script>
        <script type='text/javascript' src="js/plugins/codemirror/mode/php/php.js"></script>    

        <script type="text/javascript" src="js/plugins/summernote/summernote.js"></script>

        <!--script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script-->    
        <script type="text/javascript" src="js/plugins/datatables/pdfmake.min.js"></script>    
        <script type="text/javascript" src="js/plugins/datatables/vfs_fonts.js"></script>    
        <script type="text/javascript" src="js/plugins/datatables/datatables.min.js"></script>    
		<link href="js/plugins/datatables/datatables.min.css" rel="stylesheet">
 
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="js/plugins/typeahead/typeahead.js"></script>

        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

		<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
		<script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
		<script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
		<script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            
		
		<script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->
<script>
function ConfirmDialog(judul,pesan,icon,tipe,action){
	$("#appenddedForm").html('<div class="message-box message-box-'+tipe+' animated fadeIn" data-sound="alert" id="ConfirmDialog"> <div class="mb-container"> <div class="mb-middle"> <div class="mb-title"><span class="fa '+ icon +'"/>'+judul+'?</div> <div class="mb-content"> <p>'+pesan+'</p> </div> <div class="mb-footer"> <div class="pull-right"> <a href="#" class="btn btn-success btn-lg" data-dismiss="modal" onclick="'+action+'">Ya</a> <button class="btn btn-default btn-lg mb-control-close" data-dismiss="modal">Tidak</button> </div> </div> </div> </div> </div>');
	$('#ConfirmDialog').modal('show');
}

function Jaring(kodeLVL){
	$.ajax({
		type 		: "POST",
		url			: "ajax/jaringanAJAX.php",
		chache		:	false,
		data		:	{kodeLVL:kodeLVL},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
						},
		datatype	:	"html"
	});
	return false;
}

function Peta(kodeLVL){
	$.ajax({
		type 		: "POST",
		url			: "ajax/petaAJAX.php",
		chache		:	false,
		data		:	{kodeLVL:kodeLVL},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
						},
		datatype	:	"html"
	});
	return false;
}

function ModalDaftar(tipe,txtnoid){
	$.ajax({
		type 		: "POST",
		url			: "ajax/daftar.php",
		chache		:	false,
		data		:	{tipe:tipe, txtnoid:txtnoid},
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
function ModalRO(txtnoid){
	$.ajax({
		type 		: "POST",
		url			: "ajax/repeatorderAJAX.php",
		chache		:	false,
		data		:	{txtnoid:txtnoid},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalRO').modal('show');
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
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

<?php 
if($_GET['daftar']==1){
?>
$(document).ready(function() {
	ModalDaftar(0);
} );
<?php
}
?>

</script>
<?php
$ScriptPath="scripts";
if(isset($_GET['p']))
{
	$p=$_GET['p'];
	if(file_exists("$ScriptPath/$p.js.php"))
	{
		include("$ScriptPath/$p.js.php");
	}

}
else include("$ScriptPath/home.js.php");

?>
