<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=member&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&tipe="+$("select[name=slctipe]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
	        columns			: [
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "nostok" },
	            { "data": "tgldaftar" },
	            { "data": "propinsi" },
	            { "data": "kota" },
	        ]
	    });
		
function previewData()
{
	url = "jsonp.php?t=member&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&tipe="+$("select[name=slctipe]").val()+"&search="+$("input[name=txtfilter]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}

</script>
