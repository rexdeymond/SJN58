<script>
function calcBonus()
{
	var txt="";
	if (!(document.runbonus.txtDate.value.length==10))
	{
		txt=txt+"Tanggal harus diisi. ";
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
		url			: "actions.php?a=runbonus",
		chache		:	false,
		data		:	$("#runbonus").serialize(),
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Menghitung Bonus...</h1></div>");
						},
		success		:	function(msg)
						{
							if (msg.substring(0,5)=="Error"){
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								tampilBonus(msg.substr(39, 10)); 
							}
						},
		datatype	:	"html"
	});
	}
	return false;
}


function tampilBonus(tanggal){
	$.ajax({
		type 		: "POST",
		url			: "ajax/runbonusAJAX.php",
		chache		:	false,
		data		:	{tanggal:tanggal},
		beforeSend: function()
						{
							$("#appenddedForm").html("<h1>Loading</h1>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
						},
		datatype	:	"html"
	});
	return false;
}

</script>
