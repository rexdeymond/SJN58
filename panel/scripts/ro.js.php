<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=rolist&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&noid=<?=$_SESSION['sjn58']?>&slckdbrg="+$("select[name=slckdbrg]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
	        columns			: [
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "kodepin" },
	            { "data": "produk" },
	            { "data": "used" },
	        ],
	        "fnDrawCallback": function(oSettings){
				$("#TabelLaporan tbody tr").click(function(){
					ModalRO(TabelLaporan.rows(this).data()[0]["noid"]);
				})
			},
	    });

var    TabelPIN = $('#TabelPIN').DataTable(
		{
	        ajax			: "jsonp.php?t=pinmember&l=10000&search=<?=$_SESSION['sjn58']?>",
	        processing		: true,
	        columns			: [
	            { "data": "produk" },
	            { "data": "kodepin" },
	        ],
	    });

function previewData()
{
	url = "jsonp.php?t=rolist&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&noid=<?=$_SESSION['sjn58']?>&slckdbrg="+$("select[name=slckdbrg]").val()+"&search="+$("input[name=txtfilter]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}
function previewPIN()
{
	url = "jsonp.php?t=pinmember&l=10000&search=<?=$_SESSION['sjn58']?>";
	TabelPIN.ajax.url( url ).load();	
	return false;
}



</script>