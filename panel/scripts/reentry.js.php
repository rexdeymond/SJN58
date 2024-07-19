<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=agenreentry&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
	        columns			: [
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "kota" },
	            { "data": "nostok" },
	            { "data": "tgldaftar" },
	            { "data": "sponsored" },
	        ],
	        "fnDrawCallback": function(oSettings){
				$("#TabelLaporan tbody tr").click(function(){
					ModalDaftar(3,TabelLaporan.rows(this).data()[0]["noid"]);
				})
			},
	    });
		
function previewData()
{
	url = "jsonp.php?t=agenreentry&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&search="+$("input[name=txtfilter]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}
</script>