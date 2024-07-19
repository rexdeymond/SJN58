
<script>
function List(dummy){
	$.ajax({
		type 		: "POST",
		url			: "ajax/memberList.php?kdlvl=<?=$ukdlv?>",
		chache		:	false,
		data		:	$("#frmjar").serialize(),
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
function Jaring(kodeLVL){
	$.ajax({
		type 		: "POST",
//		url			: "ajax/jaringan2AJAX.php",
		url			: "ajax/jaringanAJAX.php",
		chache		:	false,
		data		:	{kodeLVL:kodeLVL},
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