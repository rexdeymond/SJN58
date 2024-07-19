        <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        
        <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.js"></script>
        <!-- END PAGE PLUGINS -->
<script>

function showKota(){
	slcpropinsi = $("select[name=slcpropinsi]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kotaAJAX.php",
	chache		:	false,
	data		:	{ slcpropinsi : "'"+slcpropinsi+"'"},
	beforeSend: function()
					{
						$("#kota").html("<div class='uk-text-center'><h3>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h3></div>");
					},
	success		:	function(msg)
					{
						$("#kota").html(msg);
						$('#slckota').selectpicker('refresh');
						
					},
	datatype	:	"html"
});
};

function showKecamatan(){
	slckota		= $("select[name=slckota]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kecamatanAJAX.php",
	chache		:	false,
	data		:	{ slckota : slckota},
	beforeSend: function()
					{
						$("#kecamatan").html("<div class='uk-text-center'><h3>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h3></div>");
					},
	success		:	function(msg)
					{
						$("#kecamatan").html(msg);
						$('#slckecamatan').selectpicker('refresh');
						
					},
	datatype	:	"html"
});
};

function showDesa(){
	slckecamatan = $("select[name=slckecamatan]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kelurahanAJAX.php",
	chache		:	false,
	data		:	{ slckecamatan : slckecamatan},
	beforeSend: function()
					{
						$("#kelurahan").html("<div class='uk-text-center'><h3>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h3></div>");
					},
	success		:	function(msg)
					{
						$("#kelurahan").html(msg);
						
					},
	datatype	:	"html"
	});
}
</script>