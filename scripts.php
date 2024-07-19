        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/mixitup/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/plugins/appear/jquery.appear.js"></script>
        
        <script type="text/javascript" src="js/plugins/revolution-slider/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution-slider/jquery.themepunch.revolution.min.js"></script>
        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
        <script type="text/javascript" src="panel/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="panel/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="panel/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.js"></script>

<script>

function Jaring(kodeLVL){
	$.ajax({
		type 		: "POST",
		url			: "panel/ajax/jaringanAJAX.php",
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
		url			: "panel/ajax/petaAJAX.php",
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
		url			: (tipe==1)?"panel/ajax/daftarmhs.php":((tipe==0)?"panel/ajax/daftar.php":"ajax/daftarulang.php"),
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
		url			: "panel/ajax/repeatorderAJAX.php",
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
		url			: "panel/ajax/modalAJAX.php",
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
