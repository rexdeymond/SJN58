<script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script> 
<script>
$(document).ready(function(){
	$('select[name=slcpropinsi]').val("<?=isset($rsprf['propinsi'])?$rsprf['propinsi']:""?>");
	$('#slcpropinsi').selectpicker('refresh');
//	$('select[name=slcagama]').val("<?=isset($rsprf['agama'])?$rsprf['agama']:""?>");
//	$('#slcagama').selectpicker('refresh');
//	showKota();
//	$('select[name=slckota]').val("<?=isset($rsprf['kota'])?$rsprf['kota']:""?>");
//	$('#slckota').selectpicker('refresh');
//	showKecamatan();
//	$('select[name=slckecamatan]').val("<?=isset($rsprf['kecamatan'])?$rsprf['kecamatan']:""?>");
//	$('#slckecamatan').selectpicker('refresh');
})
function showKota(){
	slcpropinsi = $("select[name=slcpropinsi]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kotaAJAX.php",
	chache		:	false,
	data		:	{ slcpropinsi : slcpropinsi},
	beforeSend: function()
					{
						$("#kota").html("<div class='uk-text-center'><h3>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h3></div>");
					},
	success		:	function(msg)
					{
						$("#kota").html(msg);
						$('#slckota').val("<?=isset($rsprf['kota'])?$rsprf['kota']:""?>");
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
						$('#slckecamatan').val("<?=isset($rsprf['kecamatan'])?$rsprf['kecamatan']:""?>");
						$('#slckecamatan').selectpicker('refresh');
						//alert("<?=isset($rsprf['kecamatan'])?$rsprf['kecamatan']:""?>");
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
function SaveProfil()
{
	var txt="";
	if (!(document.frmprofil.txtnama.value.length>5))
	{
		txt=txt+"Nama terlalu pendek. ";
	}
	if (!(document.frmprofil.txtnoiden.value.length>10))
	{
		txt=txt+"Nomor identitas harus diisi. ";
	}
	if(txt!="")
	{
		noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
		return false;
	}
	else
	{
		$.ajax({
		type 		: "POST",
		url			: "actions.php?a=membersave",
		chache		:	false,
		data		:	$("#frmprofil").serialize(),
		beforeSend: function()
						{
							//UIkit.notify("<div class='uk-text-center'><h1>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h1></div>");
						},
		success		:	function(msg)
						{
							if (msg.substring(0,5)=="Error"){
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								//document.frmprofil.reset();
							}
						},
		datatype	:	"html"
	});
	}
	return false;
}
function scanned()
{
	$.ajax({
		type 		: "POST",
		url			: "ajax/displaypicture.php",
		//contentType	: "application/json",
		data		: { noid : document.frmupload.hdnnoid.value },//request,	//$("#frmmedical").serialize(),//{ pd : reqno , pn : reqname },
		beforeSend: function()
					{
						$("#output").html("<h1>Loading</h1>");
					},
		success		:	function(msg)
					{
						$("#output").html(msg);
					},
		datatype	:	"html"
	});
};
function uploadFile()
{
//$("#fileinput").click(function(){
//	alert("xx");
		if( $("input[name=hdnnoid]").val()=="" )
		{
//	alert("aa");
			noty({text: "Nomor ID Kosong", layout: 'topRight', "timeout":5000, type: 'error'});
			return false;
		}
		else
		{
//	alert("bb");
	// console.log(this);
		var formData = new FormData($(".upload")[0]);
	
		$.ajax({
                type      :   "POST",
                url       :   "actions.php?a=uploadpicture",
                data      :    formData,
                processData: false,
                contentType: false,
                beforeSend : function () {

                    $("#output").html("<h1>Uploading...</h1>");

                },
                success   :     function(msg){

					scanned();
                    noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
					//console.log($("input[name=hdnnoid]").val());
                },
            })
			// $(function(){
				// var txtcode=$("input[name=hdnnoid]").val();
				// var progressbar = $("#progressbar"),
					// bar         = progressbar.find('.progress-bar'),
					// settings    = {

					// action		: 'actions.php?a=uploadpicture', // upload url
					// param		: "pictures",
					// allow		: '*.(jpg|gif|png)', // allow only images
					// filelimit	: 'false',
					// loadstart	: function() {
									// bar.css("width", "0%").text("0%");
									// progressbar.removeClass("hidden");
								// },
					// params		:{hdnnoid: $("input[name=hdnnoid]").val() }, 
					// progress	: function(percent) {
									// percent = Math.ceil(percent);
									// bar.css("width", percent+"%").text(percent+"%");
								// },

					// allcomplete	: function(response) {

									// bar.css("width", "100%").text("100%");

									// setTimeout(function(){
										// progressbar.addClass("hidden");
									// }, 250);
									// noty({text: response, layout: 'topRight', "timeout":5000, type: 'success'});
									// scanned($("input[name=hdnnoid]").val());
									// modal($("input[name=hdnnoid]").val());
								// }
				// };
				// var select = UIkit.uploadSelect($("#upload-select"), settings),
					// drop   = UIkit.uploadDrop($("#upload-drop"), settings);
				
				
			// });
		}
//	});
}
</script>
					