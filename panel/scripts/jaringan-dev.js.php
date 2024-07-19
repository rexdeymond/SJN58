<style>
.highcharts-figure,
.highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

#container h4 {
    text-transform: none;
    font-size: 14px;
    font-weight: normal;
}

#container p {
    font-size: 13px;
    line-height: 16px;
}

@media screen and (max-width: 600px) {
    #container h4 {
        font-size: 2.3vw;
        line-height: 3vw;
    }

    #container p {
        font-size: 2.3vw;
        line-height: 3vw;
    }
}
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
		url			: "ajax/jaringan2AJAX.php",
//		url			: "ajax/jaringanAJAX.php",
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